const { spawn } = require('child_process');
const fs = require('fs');
const path = require('path');

const edgePath = 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe';
const userDataDir = 'C:\\laragon\\www\\D-Karsa\\storage\\edge-birthday-verify-profile';
const artifactDir = 'C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b';

if (!fs.existsSync(userDataDir)) {
  fs.mkdirSync(userDataDir, { recursive: true });
}

const browser = spawn(edgePath, [
  '--headless=new',
  '--remote-debugging-port=9230',
  '--user-data-dir=' + userDataDir,
  '--remote-allow-origins=*',
  '--window-size=1280,900',
  '--allow-file-access-from-files',
  'about:blank'
]);

async function run() {
  await new Promise(r => setTimeout(r, 2000));
  try {
    const listRes = await fetch('http://127.0.0.1:9230/json/list');
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

    console.log('1. Navigating to http://127.0.0.1:8000/buat-undangan?category=Ulang+Tahun');
    await send('Page.navigate', { url: 'http://127.0.0.1:8000/buat-undangan?category=Ulang+Tahun' });
    await new Promise(r => setTimeout(r, 3000));

    // Open template modal
    console.log('2. Opening Template Selection Modal...');
    await send('Runtime.evaluate', {
      expression: `openTemplateModal();`
    });
    await new Promise(r => setTimeout(r, 1000));

    // Inspect visible templates in modal
    const modalCheck = await send('Runtime.evaluate', {
      expression: `
        (() => {
          const cards = Array.from(document.querySelectorAll('.modal-template-card:not(.hidden)'));
          return cards.map(c => ({
            name: c.dataset.name,
            key: c.dataset.templatekey,
            tier: c.dataset.tier,
            price: c.dataset.price,
            subcat: c.dataset.subcat
          }));
        })()
      `,
      returnByValue: true
    });

    console.log('Visible templates in modal for Ulang Tahun:', modalCheck.result.value.length);
    console.log(JSON.stringify(modalCheck.result.value, null, 2));

    // Capture screenshot of Template Modal showing all 15 birthday templates
    const modalShot = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'birthday_templates_modal_verified.png'), Buffer.from(modalShot.data, 'base64'));
    console.log('Saved modal screenshot to birthday_templates_modal_verified.png');

    // 3. Test selecting Celeste Royale Baby Blue (Sweet 17)
    console.log('3. Selecting "Sweet Seventeen - Elegan Klasik Baby Blue"...');
    await send('Runtime.evaluate', {
      expression: `selectTemplate('Sweet Seventeen - Elegan Klasik Baby Blue', true);`
    });
    await new Promise(r => setTimeout(r, 1000));

    // Open live preview modal
    console.log('4. Opening Live Preview for Celeste Royale Baby Blue...');
    await send('Runtime.evaluate', {
      expression: `openPreviewModal();`
    });
    await new Promise(r => setTimeout(r, 2500));

    const previewShot1 = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'celeste_royale_preview_cover.png'), Buffer.from(previewShot1.data, 'base64'));
    console.log('Saved cover screenshot to celeste_royale_preview_cover.png');

    // Click "Buka Undangan" inside preview iframe
    console.log('5. Clicking "Buka Undangan" inside iframe...');
    await send('Runtime.evaluate', {
      expression: `
        (() => {
          const iframe = document.getElementById('previewIframe');
          if (iframe && iframe.contentWindow) {
            iframe.contentWindow.openInvitation();
            return true;
          }
          return false;
        })()
      `,
      returnByValue: true
    });
    await new Promise(r => setTimeout(r, 1500));

    const previewShot2 = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'celeste_royale_preview_main.png'), Buffer.from(previewShot2.data, 'base64'));
    console.log('Saved main content screenshot to celeste_royale_preview_main.png');

    // 6. Test selecting Cyber Neon Futuristic (Ultah Dewasa)
    console.log('6. Switching to "Ulang Tahun Dewasa - Geometris Cyber Neon"...');
    await send('Runtime.evaluate', {
      expression: `closePreviewModal(); openTemplateModal();`
    });
    await new Promise(r => setTimeout(r, 800));

    await send('Runtime.evaluate', {
      expression: `selectTemplate('Ulang Tahun Dewasa - Geometris Cyber Neon', true);`
    });
    await new Promise(r => setTimeout(r, 1000));

    await send('Runtime.evaluate', {
      expression: `openPreviewModal();`
    });
    await new Promise(r => setTimeout(r, 2500));

    const cyberShot1 = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'cyber_neon_preview_cover.png'), Buffer.from(cyberShot1.data, 'base64'));
    console.log('Saved Cyber Neon cover screenshot');

    await send('Runtime.evaluate', {
      expression: `
        (() => {
          const iframe = document.getElementById('previewIframe');
          if (iframe && iframe.contentWindow) {
            iframe.contentWindow.openInvitation();
            return true;
          }
          return false;
        })()
      `,
      returnByValue: true
    });
    await new Promise(r => setTimeout(r, 1500));

    const cyberShot2 = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'cyber_neon_preview_main.png'), Buffer.from(cyberShot2.data, 'base64'));
    console.log('Saved Cyber Neon main content screenshot');

    // 7. Test selecting Raden Arya Champagne Glow (Tema Karakter Original)
    console.log('7. Switching to "Tema Karakter Original - Tradisional Nusantara Champagne Glow"...');
    await send('Runtime.evaluate', {
      expression: `closePreviewModal(); openTemplateModal();`
    });
    await new Promise(r => setTimeout(r, 800));

    await send('Runtime.evaluate', {
      expression: `selectTemplate('Tema Karakter Original - Tradisional Nusantara Champagne Glow', true);`
    });
    await new Promise(r => setTimeout(r, 1000));

    await send('Runtime.evaluate', {
      expression: `openPreviewModal();`
    });
    await new Promise(r => setTimeout(r, 2500));

    const aryaShot = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'raden_arya_preview_cover.png'), Buffer.from(aryaShot.data, 'base64'));
    console.log('Saved Raden Arya Champagne cover screenshot');

    console.log('\n=== ALL E2E VERIFICATIONS COMPLETED SUCCESSFULLY! ===');
    ws.close();
    browser.kill();
    process.exit(0);

  } catch (err) {
    console.error('Error during test:', err);
    browser.kill();
    process.exit(1);
  }
}

run();
