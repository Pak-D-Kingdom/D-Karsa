const { spawn } = require('child_process');
const fs = require('fs');
const path = require('path');

const edgePath = 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe';
const artifactDir = 'C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b';
const userDataDir = path.join(artifactDir, 'edge-batak-test');

if (!fs.existsSync(userDataDir)) {
  fs.mkdirSync(userDataDir, { recursive: true });
}

const browser = spawn(edgePath, [
  '--headless=new',
  '--remote-debugging-port=9231',
  '--user-data-dir=' + userDataDir,
  '--remote-allow-origins=*',
  '--window-size=1280,800',
  'about:blank'
]);

async function run() {
  await new Promise(r => setTimeout(r, 2000));
  try {
    const listRes = await fetch('http://127.0.0.1:9231/json/list');
    const tabs = await listRes.json();
    const pageTab = tabs.find(t => t.type === 'page');

    const ws = new WebSocket(pageTab.webSocketDebuggerUrl);
    let msgId = 1;
    function send(method, params = {}) {
      return new Promise((resolve) => {
        const id = msgId++;
        const handler = (event) => {
          const data = JSON.parse(event.data);
          if (data.id === id) {
            ws.removeEventListener('message', handler);
            resolve(data.result);
          }
        };
        ws.addEventListener('message', handler);
        ws.send(JSON.stringify({ id, method, params }));
      });
    }

    await new Promise(res => { ws.onopen = res; });
    await send('Page.enable');
    await send('Runtime.enable');

    // 1. Test standalone mobile view (390 x 780 standard phone, and 360 x 540 preview chassis)
    console.log('Testing mobile view 360x540 (chassis size)...');
    await send('Emulation.setDeviceMetricsOverride', {
      width: 360,
      height: 540,
      deviceScaleFactor: 2,
      mobile: true
    });
    await send('Page.navigate', { url: 'http://127.0.0.1:8000/demo/batak-heritage?preview=1' });
    await new Promise(r => setTimeout(r, 2500));

    // Capture initial cover before click
    const shot1 = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'batak_heritage_cover_360x540.png'), Buffer.from(shot1.data, 'base64'));
    console.log('Saved batak_heritage_cover_360x540.png');

    // Check button visibility and position
    const evalBtn = await send('Runtime.evaluate', {
      expression: `(function() {
        const btn = document.getElementById('open-invitation-btn');
        if (!btn) return { found: false };
        const rect = btn.getBoundingClientRect();
        return {
          found: true,
          top: rect.top,
          bottom: rect.bottom,
          height: rect.height,
          windowHeight: window.innerHeight,
          isWithinScreen: rect.bottom <= window.innerHeight,
          btnText: btn.innerText.trim()
        };
      })()`,
      returnByValue: true
    });
    console.log('Button check result:', evalBtn.result.value);

    // Click Buka Undangan button
    console.log('Clicking Buka Undangan button...');
    await send('Runtime.evaluate', {
      expression: `(function() {
        const btn = document.getElementById('open-invitation-btn');
        if (btn) btn.click();
      })()`
    });
    await new Promise(r => setTimeout(r, 1200));

    const shot2 = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'batak_heritage_opened_360x540.png'), Buffer.from(shot2.data, 'base64'));
    console.log('Saved batak_heritage_opened_360x540.png');

    // 2. Test inside builder Live Smartphone Preview modal
    console.log('Testing inside Buat Undangan Live Smartphone Preview modal...');
    await send('Emulation.clearDeviceMetricsOverride');
    await send('Page.navigate', { url: 'http://127.0.0.1:8000/buat-undangan' });
    await new Promise(r => setTimeout(r, 3000));

    await send('Runtime.evaluate', {
      expression: `(function() {
        if (typeof switchTemplate === 'function') {
          switchTemplate('batak-heritage');
        } else {
          const el = document.querySelector('[data-template="batak-heritage"]');
          if (el) el.click();
        }
        setTimeout(() => {
          if (typeof openLivePreviewModal === 'function') {
            openLivePreviewModal();
          }
        }, 500);
      })()`
    });
    await new Promise(r => setTimeout(r, 3000));

    const shot3 = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'batak_heritage_in_builder_modal.png'), Buffer.from(shot3.data, 'base64'));
    console.log('Saved batak_heritage_in_builder_modal.png');

  } catch(e) {
    console.error('Error:', e);
  } finally {
    browser.kill();
  }
}
run();
