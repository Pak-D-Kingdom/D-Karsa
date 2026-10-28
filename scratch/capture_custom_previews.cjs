const { spawn } = require('child_process');
const fs = require('fs');
const path = require('path');

const edgePath = 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe';
const userDataDir = 'C:\\laragon\\www\\D-Karsa\\storage\\edge-custom-profile';
const artifactDir = 'C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b';

if (!fs.existsSync(userDataDir)) {
  fs.mkdirSync(userDataDir, { recursive: true });
}

const browser = spawn(edgePath, [
  '--headless=new',
  '--remote-debugging-port=9227',
  '--user-data-dir=' + userDataDir,
  '--remote-allow-origins=*',
  '--window-size=412,915',
  '--allow-file-access-from-files',
  'about:blank'
]);

async function run() {
  await new Promise(r => setTimeout(r, 2000));
  try {
    const listRes = await fetch('http://127.0.0.1:9227/json/list');
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

    const templates = [
      {
        key: 'formal-corporate',
        openFunc: 'if (typeof openInvitation === "function") openInvitation();',
        scrollTarget: 'itineraryContainer'
      },
      {
        key: 'rustic-coral-peach',
        openFunc: 'if (typeof openInvitation === "function") openInvitation();',
        scrollTarget: 'agenda-section'
      },
      {
        key: 'floral-midnight-navy',
        openFunc: 'if (typeof triggerOpenEnvelope === "function") triggerOpenEnvelope();',
        scrollTarget: 'agenda-acara'
      }
    ];

    for (const t of templates) {
      console.log(`Processing ${t.key}...`);
      const fileUrl = `file:///C:/laragon/www/D-Karsa/scratch/preview_${t.key}.html`;
      await send('Page.navigate', { url: fileUrl });
      await new Promise(r => setTimeout(r, 2000));

      // 1. Capture Cover Screenshot
      const coverShot = await send('Page.captureScreenshot', { format: 'png' });
      const coverPath = path.join(artifactDir, `custom_${t.key}_cover.png`);
      fs.writeFileSync(coverPath, Buffer.from(coverShot.data, 'base64'));
      console.log(`Saved cover to ${coverPath}`);

      // 2. Click Open Invitation
      await send('Runtime.evaluate', { expression: t.openFunc });
      await new Promise(r => setTimeout(r, 2000));

      // 3. Scroll to Agenda/Details
      await send('Runtime.evaluate', {
        expression: `
          const el = document.getElementById('${t.scrollTarget}');
          if (el) el.scrollIntoView({ behavior: 'instant', block: 'start' });
        `
      });
      await new Promise(r => setTimeout(r, 1200));

      // 4. Capture Opened/Agenda Screenshot
      const openedShot = await send('Page.captureScreenshot', { format: 'png' });
      const openedPath = path.join(artifactDir, `custom_${t.key}_opened.png`);
      fs.writeFileSync(openedPath, Buffer.from(openedShot.data, 'base64'));
      console.log(`Saved opened view to ${openedPath}`);
    }

    console.log('ALL SCREENSHOTS CAPTURED SUCCESSFULLY!');
  } catch (err) {
    console.error('Error during capture:', err);
  } finally {
    browser.kill();
    process.exit(0);
  }
}

run();
