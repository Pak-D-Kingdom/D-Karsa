const { spawn } = require('child_process');
const fs = require('fs');
const path = require('path');

const edgePath = 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe';
const userDataDir = 'C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b\\edge-builder-profile';
const artifactDir = 'C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b';

if (!fs.existsSync(userDataDir)) {
  fs.mkdirSync(userDataDir, { recursive: true });
}

const browser = spawn(edgePath, [
  '--headless=new',
  '--remote-debugging-port=9241',
  '--user-data-dir=' + userDataDir,
  '--remote-allow-origins=*',
  '--window-size=1280,900',
  '--allow-file-access-from-files',
  'about:blank'
]);

async function run() {
  await new Promise(r => setTimeout(r, 2000));
  try {
    const listRes = await fetch('http://127.0.0.1:9241/json/list');
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

    await new Promise(r => ws.addEventListener('open', r));
    await send('Page.enable');
    await send('Runtime.enable');
    await send('DOM.enable');

    console.log('Navigating to http://127.0.0.1:8000/buat-undangan?category=Ulang+Tahun');
    await send('Page.navigate', { url: 'http://127.0.0.1:8000/buat-undangan?category=Ulang+Tahun' });
    await new Promise(r => setTimeout(r, 3000));

    // Open template modal
    console.log('Opening template modal...');
    await send('Runtime.evaluate', { expression: `openTemplateModal();` });
    await new Promise(r => setTimeout(r, 1000));

    const modalTemplates = await send('Runtime.evaluate', {
      expression: `
        (() => {
          const cards = Array.from(document.querySelectorAll('.modal-template-card:not(.hidden)'));
          return cards.map(c => c.dataset.name);
        })()
      `,
      returnByValue: true
    });
    console.log('Templates in modal:', modalTemplates.result.value.length);
    console.log(modalTemplates.result.value);

    // Capture screenshot of builder modal
    const shot = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'builder_template_modal_verified.png'), Buffer.from(shot.data, 'base64'));
    console.log('Saved builder_template_modal_verified.png');

    ws.close();
    browser.kill();
    process.exit(0);
  } catch (e) {
    console.error('Error:', e);
    browser.kill();
    process.exit(1);
  }
}

run();
