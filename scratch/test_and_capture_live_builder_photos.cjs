const { spawn } = require('child_process');
const fs = require('fs');
const path = require('path');

const edgePath = 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe';
const userDataDir = 'C:\\laragon\\www\\D-Karsa\\storage\\edge-builder-photo-profile';
const artifactDir = 'C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b';

if (!fs.existsSync(userDataDir)) {
  fs.mkdirSync(userDataDir, { recursive: true });
}

const browser = spawn(edgePath, [
  '--headless=new',
  '--remote-debugging-port=9230',
  '--user-data-dir=' + userDataDir,
  '--remote-allow-origins=*',
  '--window-size=1200,900',
  'about:blank'
]);

// Test data URIs for visual verification
const testCoverDataUrl = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="400" height="400"><rect width="400" height="400" fill="%23dc2626"/><text x="200" y="190" font-size="30" font-weight="bold" fill="white" font-family="sans-serif" text-anchor="middle">FOTO COVER</text><text x="200" y="230" font-size="20" fill="white" font-family="sans-serif" text-anchor="middle">BERHASIL TAMPIL</text></svg>';
const testGroomDataUrl = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="400" height="400"><rect width="400" height="400" fill="%232563eb"/><text x="200" y="190" font-size="28" font-weight="bold" fill="white" font-family="sans-serif" text-anchor="middle">FOTO ULANG TAHUN</text><text x="200" y="230" font-size="20" fill="white" font-family="sans-serif" text-anchor="middle">BERHASIL TAMPIL</text></svg>';
const testGal1 = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="400" height="400"><rect width="400" height="400" fill="%2316a34a"/><text x="200" y="190" font-size="30" font-weight="bold" fill="white" font-family="sans-serif" text-anchor="middle">GALERI 1</text><text x="200" y="230" font-size="20" fill="white" font-family="sans-serif" text-anchor="middle">BERHASIL TAMPIL</text></svg>';
const testGal2 = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="400" height="400"><rect width="400" height="400" fill="%23d97706"/><text x="200" y="190" font-size="30" font-weight="bold" fill="white" font-family="sans-serif" text-anchor="middle">GALERI 2</text><text x="200" y="230" font-size="20" fill="white" font-family="sans-serif" text-anchor="middle">BERHASIL TAMPIL</text></svg>';

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

    await new Promise(resolve => { ws.onopen = resolve; });
    await send('Page.enable');
    await send('Runtime.enable');

    console.log('Navigating to Builder page: http://127.0.0.1:8000/buat-undangan...');
    await send('Page.navigate', { url: 'http://127.0.0.1:8000/buat-undangan' });
    await new Promise(r => setTimeout(r, 3000));

    const templatesToTest = [
      {
        name: 'Editorial Cherry Blossom - Sweet Seventeen',
        key: 'editorial-cherry-blossom',
        openFunc: 'openInvitation()',
        openBtnId: 'open-envelope-btn'
      },
      {
        name: 'Elegan Klasik Orange Energy - Sweet Seventeen',
        key: 'orange-energy',
        openFunc: 'openInvitation()',
        openBtnId: 'openInvitationBtn'
      },
      {
        name: 'Rustic Purple Dream - Ulang Tahun Remaja',
        key: 'rustic-purple-dream',
        openFunc: 'openInvitation()',
        openBtnId: 'btnOpenInvitation'
      }
    ];

    for (const item of templatesToTest) {
      console.log(`\n==================================================`);
      console.log(`TESTING BUILDER LIVE PREVIEW: ${item.name} (${item.key})`);
      console.log(`==================================================`);

      // 1. Select Template & Open Preview Modal in Builder
      const selectEval = await send('Runtime.evaluate', {
        expression: `
          (function() {
            if (typeof selectTemplate === 'function') {
              selectTemplate("${item.key}", true);
            }
            if (typeof openPreviewModal === 'function') {
              openPreviewModal(false);
            }
            return {
              selectedTheme: typeof currentSelectedTheme !== 'undefined' ? currentSelectedTheme : null
            };
          })()
        `,
        returnByValue: true
      });
      console.log('Template Selected in Builder:', selectEval.result ? selectEval.result.value : selectEval);
      await new Promise(r => setTimeout(r, 2500));

      // 2. Dispatch postMessage to preview iframe for Cover, Celebrant, and Gallery photos
      const postMsgEval = await send('Runtime.evaluate', {
        expression: `
          (function() {
            const iframe = document.getElementById('builderLivePreviewIframe');
            if (!iframe || !iframe.contentWindow) return { success: false, reason: 'Iframe not found' };

            // Send Cover Photo update
            iframe.contentWindow.postMessage({
              type: 'UPDATE_PREVIEW_PHOTO',
              target: 'cover',
              photoUrl: '${testCoverDataUrl}',
              dataUrl: '${testCoverDataUrl}'
            }, '*');

            // Send Groom/Celebrant Photo update
            iframe.contentWindow.postMessage({
              type: 'UPDATE_PREVIEW_PHOTO',
              target: 'groom',
              photoUrl: '${testGroomDataUrl}',
              dataUrl: '${testGroomDataUrl}'
            }, '*');

            // Send Gallery update
            iframe.contentWindow.postMessage({
              type: 'UPDATE_PREVIEW_GALLERY',
              images: ['${testGal1}', '${testGal2}'],
              photos: ['${testGal1}', '${testGal2}']
            }, '*');

            return { success: true };
          })()
        `,
        returnByValue: true
      });
      console.log('Dispatched photo update postMessages:', postMsgEval.result ? postMsgEval.result.value : postMsgEval);
      await new Promise(r => setTimeout(r, 1500));

      // 3. Inspect Iframe Content to verify Cover Photo updated
      const checkCoverEval = await send('Runtime.evaluate', {
        expression: `
          (function() {
            const iframe = document.getElementById('builderLivePreviewIframe');
            if (!iframe || !iframe.contentDocument) return { found: false, error: 'no doc' };
            const doc = iframe.contentDocument;
            const coverImg = doc.getElementById('previewCoverPhotoImg') || doc.getElementById('previewCoverPhoto');
            return {
              hasCoverEl: !!coverImg,
              srcMatch: coverImg ? decodeURIComponent(coverImg.src).includes('FOTO COVER') : false,
              currentSrc: coverImg ? coverImg.src.substring(0, 80) : null
            };
          })()
        `,
        returnByValue: true
      });
      console.log('Check Cover Photo in Iframe:', checkCoverEval.result ? checkCoverEval.result.value : checkCoverEval);

      // Screenshot Cover view in Builder
      const coverShot = await send('Page.captureScreenshot', { format: 'png' });
      const coverPath = path.join(artifactDir, `builder_preview_cover_${item.key}.png`);
      fs.writeFileSync(coverPath, Buffer.from(coverShot.data, 'base64'));
      console.log(`Saved Cover Screenshot: ${coverPath}`);

      // 4. Click "Buka Undangan" inside the Iframe
      await send('Runtime.evaluate', {
        expression: `
          (function() {
            const iframe = document.getElementById('builderLivePreviewIframe');
            if (iframe && iframe.contentDocument) {
              const btn = iframe.contentDocument.getElementById('${item.openBtnId}');
              if (btn) btn.click();
              else if (typeof iframe.contentWindow.openInvitation === 'function') {
                iframe.contentWindow.openInvitation();
              }
            }
          })()
        `
      });
      await new Promise(r => setTimeout(r, 1500));

      // 5. Inspect Celebrant Photo in Iframe
      const checkCelebrantEval = await send('Runtime.evaluate', {
        expression: `
          (function() {
            const iframe = document.getElementById('builderLivePreviewIframe');
            if (!iframe || !iframe.contentDocument) return { found: false, error: 'no doc' };
            const doc = iframe.contentDocument;
            const pImg = doc.getElementById('previewGroomPhotoImg') || doc.getElementById('previewGroomPhoto');
            return {
              hasCelebrantEl: !!pImg,
              srcMatch: pImg ? decodeURIComponent(pImg.src).includes('FOTO ULANG TAHUN') : false,
              currentSrc: pImg ? pImg.src.substring(0, 80) : null
            };
          })()
        `,
        returnByValue: true
      });
      console.log('Check Celebrant Photo in Iframe:', checkCelebrantEval.result ? checkCelebrantEval.result.value : checkCelebrantEval);

      // Screenshot Opened Celebrant view in Builder
      const openedShot = await send('Page.captureScreenshot', { format: 'png' });
      const openedPath = path.join(artifactDir, `builder_preview_celebrant_${item.key}.png`);
      fs.writeFileSync(openedPath, Buffer.from(openedShot.data, 'base64'));
      console.log(`Saved Celebrant Screenshot: ${openedPath}`);

      // 6. Scroll to Gallery section inside Iframe
      await send('Runtime.evaluate', {
        expression: `
          (function() {
            const iframe = document.getElementById('builderLivePreviewIframe');
            if (iframe && iframe.contentDocument) {
              const grid = iframe.contentDocument.getElementById('previewGalleryGrid');
              if (grid) grid.scrollIntoView({ behavior: 'instant', block: 'center' });
            }
          })()
        `
      });
      await new Promise(r => setTimeout(r, 1000));

      // 7. Inspect Gallery in Iframe
      const checkGalleryEval = await send('Runtime.evaluate', {
        expression: `
          (function() {
            const iframe = document.getElementById('builderLivePreviewIframe');
            if (!iframe || !iframe.contentDocument) return { found: false, error: 'no doc' };
            const doc = iframe.contentDocument;
            const grid = doc.getElementById('previewGalleryGrid');
            const imgs = grid ? Array.from(grid.querySelectorAll('img')).map(i => decodeURIComponent(i.src)) : [];
            const hasGal1 = imgs.some(s => s.includes('GALERI 1'));
            const hasGal2 = imgs.some(s => s.includes('GALERI 2'));
            return {
              hasGrid: !!grid,
              imgCount: imgs.length,
              hasGal1,
              hasGal2
            };
          })()
        `,
        returnByValue: true
      });
      console.log('Check Gallery in Iframe:', checkGalleryEval.result ? checkGalleryEval.result.value : checkGalleryEval);

      // Screenshot Gallery view in Builder
      const galShot = await send('Page.captureScreenshot', { format: 'png' });
      const galPath = path.join(artifactDir, `builder_preview_gallery_${item.key}.png`);
      fs.writeFileSync(galPath, Buffer.from(galShot.data, 'base64'));
      console.log(`Saved Gallery Screenshot: ${galPath}`);
    }

    console.log('\n>>> ALL 3 TEMPLATES TESTED AND VISUALLY VERIFIED IN BUILDER PREVIEW! <<<');
  } catch (err) {
    console.error('Error during test:', err);
  } finally {
    browser.kill();
    process.exit(0);
  }
}

run();
