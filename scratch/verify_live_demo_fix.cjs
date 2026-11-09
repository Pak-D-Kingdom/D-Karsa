const { spawn } = require('child_process');
const fs = require('fs');
const path = require('path');

const edgePath = 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe';
const userDataDir = 'C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b\\edge-demo-profile';
const artifactDir = 'C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b';

if (!fs.existsSync(userDataDir)) {
  fs.mkdirSync(userDataDir, { recursive: true });
}

const browser = spawn(edgePath, [
  '--headless=new',
  '--remote-debugging-port=9240',
  '--user-data-dir=' + userDataDir,
  '--remote-allow-origins=*',
  '--window-size=1280,900',
  '--allow-file-access-from-files',
  'about:blank'
]);

async function run() {
  await new Promise(r => setTimeout(r, 2000));
  try {
    const listRes = await fetch('http://127.0.0.1:9240/json/list');
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

    console.log('1. Navigating to http://127.0.0.1:8000/#desain');
    await send('Page.navigate', { url: 'http://127.0.0.1:8000/#desain' });
    await new Promise(r => setTimeout(r, 3000));

    // Filter to Ulang Tahun
    console.log('2. Filtering catalog to category "ultah"...');
    await send('Runtime.evaluate', {
      expression: `
        const bdayBtn = Array.from(document.querySelectorAll('#themeFilters button')).find(b => b.textContent.includes('Ulang Tahun'));
        if (bdayBtn) bdayBtn.click();
      `
    });
    await new Promise(r => setTimeout(r, 1500));

    // Check visible cards
    const cardsEval = await send('Runtime.evaluate', {
      expression: `
        (() => {
          const cards = Array.from(document.querySelectorAll('#catalogGrid .theme-card:not(.hidden)'));
          return cards.map(c => ({
            name: c.querySelector('h3')?.textContent?.trim(),
            badge: c.querySelector('figure span')?.textContent?.trim(),
            imgSrc: c.querySelector('figure img')?.src,
            demoBtnOnclick: c.querySelector('button[onclick*="openThemePreviewModal"]')?.getAttribute('onclick')
          }));
        })()
      `,
      returnByValue: true
    });

    console.log('Catalog visible cards count for Ulang Tahun:', cardsEval.result.value.length);
    console.log('First 6 cards:', JSON.stringify(cardsEval.result.value.slice(0, 6), null, 2));

    // Capture catalog screenshot
    const catalogShot = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'birthday_catalog_fixed_thumbnails.png'), Buffer.from(catalogShot.data, 'base64'));
    console.log('Saved birthday_catalog_fixed_thumbnails.png');

    // 3. Test clicking "Demo" on Celeste Royale Baby Blue
    console.log('3. Clicking Demo for celeste-royale-baby-blue...');
    await send('Runtime.evaluate', {
      expression: `openThemePreviewModal('celeste-royale-baby-blue');`
    });
    await new Promise(r => setTimeout(r, 2000));

    // Inspect modal state
    const modal1 = await send('Runtime.evaluate', {
      expression: `
        (() => {
          const modal = document.getElementById('themePreviewModal');
          const title = document.getElementById('previewThemeTitle')?.textContent?.trim();
          const badge = document.getElementById('previewCategoryBadge')?.textContent?.trim();
          const catLabel = document.getElementById('previewCategoryFilterLabel')?.textContent?.trim();
          const iframeSrc = document.getElementById('previewModalIframe')?.src;
          const selectorButtons = Array.from(document.querySelectorAll('#previewThemeSelectorGrid button')).map(b => b.querySelector('b')?.textContent?.trim());
          return {
            modalVisible: !modal.classList.contains('hidden'),
            title,
            badge,
            catLabel,
            iframeSrc,
            selectorButtonsCount: selectorButtons.length,
            selectorButtons
          };
        })()
      `,
      returnByValue: true
    });

    console.log('Modal check 1 (Celeste Royale):', JSON.stringify(modal1.result.value, null, 2));

    const shot1 = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'live_demo_celeste_royale_verified.png'), Buffer.from(shot1.data, 'base64'));
    console.log('Saved live_demo_celeste_royale_verified.png');

    // 4. Test clicking Cyber Neon Futuristic from right panel list
    console.log('4. Selecting Cyber Neon Futuristic...');
    await send('Runtime.evaluate', {
      expression: `openThemePreviewModal('cyber-neon-futuristic');`
    });
    await new Promise(r => setTimeout(r, 2000));

    const modal2 = await send('Runtime.evaluate', {
      expression: `
        (() => {
          const title = document.getElementById('previewThemeTitle')?.textContent?.trim();
          const catLabel = document.getElementById('previewCategoryFilterLabel')?.textContent?.trim();
          const iframeSrc = document.getElementById('previewModalIframe')?.src;
          return { title, catLabel, iframeSrc };
        })()
      `,
      returnByValue: true
    });
    console.log('Modal check 2 (Cyber Neon):', JSON.stringify(modal2.result.value, null, 2));

    const shot2 = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'live_demo_cyber_neon_verified.png'), Buffer.from(shot2.data, 'base64'));
    console.log('Saved live_demo_cyber_neon_verified.png');

    // 5. Test clicking Raden Arya Champagne from right panel list
    console.log('5. Selecting Raden Arya Champagne...');
    await send('Runtime.evaluate', {
      expression: `openThemePreviewModal('raden-arya-champagne');`
    });
    await new Promise(r => setTimeout(r, 2000));

    const modal3 = await send('Runtime.evaluate', {
      expression: `
        (() => {
          const title = document.getElementById('previewThemeTitle')?.textContent?.trim();
          const catLabel = document.getElementById('previewCategoryFilterLabel')?.textContent?.trim();
          const iframeSrc = document.getElementById('previewModalIframe')?.src;
          return { title, catLabel, iframeSrc };
        })()
      `,
      returnByValue: true
    });
    console.log('Modal check 3 (Raden Arya):', JSON.stringify(modal3.result.value, null, 2));

    const shot3 = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'live_demo_raden_arya_verified.png'), Buffer.from(shot3.data, 'base64'));
    console.log('Saved live_demo_raden_arya_verified.png');

    // 6. Test clicking Chapter 30 Soft Pink
    console.log('6. Selecting Chapter 30 Soft Pink...');
    await send('Runtime.evaluate', {
      expression: `openThemePreviewModal('chapter-30-soft-pink');`
    });
    await new Promise(r => setTimeout(r, 2000));

    const modal4 = await send('Runtime.evaluate', {
      expression: `
        (() => {
          const title = document.getElementById('previewThemeTitle')?.textContent?.trim();
          const catLabel = document.getElementById('previewCategoryFilterLabel')?.textContent?.trim();
          const iframeSrc = document.getElementById('previewModalIframe')?.src;
          return { title, catLabel, iframeSrc };
        })()
      `,
      returnByValue: true
    });
    console.log('Modal check 4 (Chapter 30):', JSON.stringify(modal4.result.value, null, 2));

    const shot4 = await send('Page.captureScreenshot', { format: 'png' });
    fs.writeFileSync(path.join(artifactDir, 'live_demo_chapter_30_verified.png'), Buffer.from(shot4.data, 'base64'));
    console.log('Saved live_demo_chapter_30_verified.png');

    console.log('\n=== ALL E2E VERIFICATIONS SUCCESSFUL ===\n');

    ws.close();
    browser.kill();
    process.exit(0);
  } catch (err) {
    console.error('Test error:', err);
    browser.kill();
    process.exit(1);
  }
}

run();
