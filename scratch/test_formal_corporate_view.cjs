const { spawn } = require('child_process');
const fs = require('fs');

const path = require('path');
const artifactDir = 'C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b';
const userDataDir = path.join(artifactDir, 'edge-test-profile');
const edgePath = 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe';

if (!fs.existsSync(userDataDir)) {
  fs.mkdirSync(userDataDir, { recursive: true });
}

const browser = spawn(edgePath, [
  '--headless=new',
  '--remote-debugging-port=9229',
  '--user-data-dir=' + userDataDir,
  '--remote-allow-origins=*',
  '--window-size=1280,800',
  'about:blank'
]);

async function run() {
  await new Promise(r => setTimeout(r, 2000));
  try {
    const listRes = await fetch('http://127.0.0.1:9229/json/list');
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

    console.log('Navigating to buat-undangan...');
    await send('Page.navigate', { url: 'http://127.0.0.1:8000/buat-undangan' });
    await new Promise(r => setTimeout(r, 2500));

    // Select formal-corporate template
    await send('Runtime.evaluate', {
      expression: `
        if (typeof switchTemplate === 'function') {
          switchTemplate('formal-corporate');
        } else {
          const el = document.querySelector('[data-template="formal-corporate"]');
          if (el) el.click();
        }
        if (typeof openLivePreviewModal === 'function') {
          openLivePreviewModal();
        }
      `
    });

    await new Promise(r => setTimeout(r, 3000));

    const shot1 = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(artifactDir + '/verify_formal_corporate_full_modal.png', Buffer.from(shot1.data, 'base64'));
    console.log('Saved verify_formal_corporate_full_modal.png');

    // Standalone mobile test
    await send('Emulation.setDeviceMetricsOverride', {
      width: 390,
      height: 844,
      deviceScaleFactor: 2,
      mobile: true
    });
    await send('Page.navigate', { url: 'http://127.0.0.1:8000/demo/formal-corporate' });
    await new Promise(r => setTimeout(r, 2000));
    const shot2 = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(artifactDir + '/verify_formal_corporate_mobile_standalone.png', Buffer.from(shot2.data, 'base64'));
    console.log('Saved verify_formal_corporate_mobile_standalone.png');

    // Click open invitation button on mobile
    await send('Runtime.evaluate', {
      expression: `
        const btn = document.getElementById('open-invitation-btn');
        if (btn) btn.click();
      `
    });
    await new Promise(r => setTimeout(r, 1200));
    const shot3 = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(artifactDir + '/verify_formal_corporate_mobile_opened.png', Buffer.from(shot3.data, 'base64'));
    console.log('Saved verify_formal_corporate_mobile_opened.png');

  } catch(e) {
    console.error('Error:', e);
  } finally {
    browser.kill();
  }
}
run();
