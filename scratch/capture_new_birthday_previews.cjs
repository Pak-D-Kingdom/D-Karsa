const { spawn } = require('child_process');
const fs = require('fs');
const path = require('path');

const edgePath = 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe';
const userDataDir = 'C:\\laragon\\www\\D-Karsa\\storage\\edge-birthday-profile';
const artifactDir = 'C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b';

if (!fs.existsSync(userDataDir)) {
  fs.mkdirSync(userDataDir, { recursive: true });
}

const browser = spawn(edgePath, [
  '--headless=new',
  '--remote-debugging-port=9229',
  '--user-data-dir=' + userDataDir,
  '--remote-allow-origins=*',
  '--window-size=412,915',
  '--allow-file-access-from-files',
  'about:blank'
]);

async function run() {
  await new Promise(r => setTimeout(r, 2000));
  try {
    const listRes = await fetch('http://127.0.0.1:9229/json/list');
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

    const birthdayTemplates = [
      {
        key: 'editorial-cherry-blossom',
        openFunc: 'if (typeof openInvitation === "function") openInvitation();',
        openBtn: 'open-envelope-btn'
      },
      {
        key: 'orange-energy',
        openFunc: 'if (typeof openInvitation === "function") openInvitation();',
        openBtn: 'openInvitationBtn'
      },
      {
        key: 'rustic-purple-dream',
        openFunc: 'if (typeof openInvitation === "function") openInvitation();',
        openBtn: 'btnOpenInvitation'
      }
    ];

    for (const t of birthdayTemplates) {
      const url = `http://127.0.0.1:8000/demo/${t.key}`;
      console.log(`Navigating to ${url}...`);
      await send('Page.navigate', { url });
      await new Promise(r => setTimeout(r, 2500));

      // 1. Capture Envelope Cover
      const coverShot = await send('Page.captureScreenshot', { format: 'png' });
      const coverPath = path.join(artifactDir, `bday_${t.key}_cover.png`);
      fs.writeFileSync(coverPath, Buffer.from(coverShot.data, 'base64'));
      console.log(`Saved: ${coverPath}`);

      // 2. Open Invitation
      await send('Runtime.evaluate', {
        expression: `
          (function() {
            const btn = document.getElementById("${t.openBtn}");
            if (btn) {
              btn.click();
            } else {
              ${t.openFunc}
            }
          })()
        `
      });
      await new Promise(r => setTimeout(r, 1500));

      // 3. Capture Opened Hero / Main
      const openedShot = await send('Page.captureScreenshot', { format: 'png' });
      const openedPath = path.join(artifactDir, `bday_${t.key}_opened.png`);
      fs.writeFileSync(openedPath, Buffer.from(openedShot.data, 'base64'));
      console.log(`Saved: ${openedPath}`);

      // 4. Scroll to Venue Section and capture
      await send('Runtime.evaluate', {
        expression: `
          (function() {
            const v = document.getElementById('previewVenueNameMain') || document.querySelector('a[href*="maps.google.com"]');
            if (v) {
              v.scrollIntoView({ behavior: 'instant', block: 'center' });
            }
          })()
        `
      });
      await new Promise(r => setTimeout(r, 1000));
      const venueShot = await send('Page.captureScreenshot', { format: 'png' });
      const venuePath = path.join(artifactDir, `bday_${t.key}_venue.png`);
      fs.writeFileSync(venuePath, Buffer.from(venueShot.data, 'base64'));
      console.log(`Saved: ${venuePath}`);
    }

    // 5. Test Home Page Modal Preview
    console.log('Testing Home page modal preview...');
    await send('Page.navigate', { url: 'http://127.0.0.1:8000' });
    await new Promise(r => setTimeout(r, 2500));

    for (const t of birthdayTemplates) {
      await send('Runtime.evaluate', {
        expression: `openThemePreviewModal("${t.key}")`
      });
      await new Promise(r => setTimeout(r, 2000));

      const modalShot = await send('Page.captureScreenshot', { format: 'png' });
      const modalPath = path.join(artifactDir, `home_modal_${t.key}.png`);
      fs.writeFileSync(modalPath, Buffer.from(modalShot.data, 'base64'));
      console.log(`Saved: ${modalPath}`);
    }

    console.log('All visual screenshots captured successfully!');
  } catch (err) {
    console.error('Error in capture:', err);
  } finally {
    browser.kill();
    process.exit(0);
  }
}

run();
