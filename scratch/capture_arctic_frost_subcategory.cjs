const { spawn } = require('child_process');
const fs = require('fs');
const path = require('path');

const edgePath = 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe';
const userDataDir = 'C:\\laragon\\www\\D-Karsa\\storage\\edge-subcat-profile';
const artifactDir = 'C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b';

if (!fs.existsSync(userDataDir)) {
  fs.mkdirSync(userDataDir, { recursive: true });
}

const browser = spawn(edgePath, [
  '--headless=new',
  '--remote-debugging-port=9228',
  '--user-data-dir=' + userDataDir,
  '--remote-allow-origins=*',
  '--window-size=412,915',
  '--allow-file-access-from-files',
  'about:blank'
]);

async function run() {
  await new Promise(r => setTimeout(r, 2000));
  try {
    const listRes = await fetch('http://127.0.0.1:9228/json/list');
    const tabs = await listRes.json();
    const pageTab = tabs.find(t => t.type === 'page');
    if (!pageTab) {
      console.error('Page tab not found');
      browser.kill();
      process.exit(1);
    }

    const ws = new WebSocket(pageTab.webSocketDebuggerUrl);
    let msgId = 1;
    function send(method, params = {}) {
      return new Promise((resolve, reject) => {
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

    await new Promise(resolve => { ws.onopen = resolve; });
    await send('Page.enable');
    await send('Runtime.enable');
    await send('Emulation.setDeviceMetricsOverride', {
      width: 412,
      height: 915,
      deviceScaleFactor: 2,
      mobile: true
    });

    const targetUrl = 'http://127.0.0.1:8000/demo/arctic-frost?sub_category=Ulang+tahun+dewasa&groom_name=Aria';
    console.log(`Navigating to: ${targetUrl}`);
    await send('Page.navigate', { url: targetUrl });
    await new Promise(r => setTimeout(r, 2500));

    // Click "Buka Undangan"
    await send('Runtime.evaluate', {
      expression: `(function() {
        const btn = document.getElementById('open-invitation-btn');
        if (btn) btn.click();
      })()`
    });
    await new Promise(r => setTimeout(r, 1500));

    // Scroll to celebrant card where the badge is located
    await send('Runtime.evaluate', {
      expression: `(function() {
        const badge = document.getElementById('previewSubCategoryBadge');
        if (badge) badge.scrollIntoView({ behavior: 'instant', block: 'center' });
      })()`
    });
    await new Promise(r => setTimeout(r, 1000));

    const snapResult = await send('Page.captureScreenshot', { format: 'png' });
    const snapPath = path.join(artifactDir, 'arctic_frost_subcat_opened.png');
    fs.writeFileSync(snapPath, Buffer.from(snapResult.data, 'base64'));
    console.log(`Saved screenshot to: ${snapPath}`);

    // Verify badge text in DOM
    const badgeEval = await send('Runtime.evaluate', {
      expression: `(function() {
        const badge = document.getElementById('previewSubCategoryBadge');
        return badge ? badge.innerText : null;
      })()`
    });
    console.log('Badge innerText in browser DOM:', badgeEval.result.value);

    ws.close();
  } catch (err) {
    console.error('Error during execution:', err);
  } finally {
    browser.kill();
    process.exit(0);
  }
}

run();
