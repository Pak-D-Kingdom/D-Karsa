const { spawn } = require('child_process');
const fs = require('fs');
const path = require('path');

const edgePath = 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe';
const artifactDir = 'C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b';
const userDataDir = path.join(artifactDir, 'edge-all-covers-profile');
const coversDir = path.join(artifactDir, 'cover_audits');

if (!fs.existsSync(userDataDir)) {
  fs.mkdirSync(userDataDir, { recursive: true });
}
if (!fs.existsSync(coversDir)) {
  fs.mkdirSync(coversDir, { recursive: true });
}

// All 33 templates in D-Karsa
const templates = [
  'chibi-red',
  'wildflower-pink',
  'botanical-emerald',
  'javanese-royal',
  'batak-heritage',
  'minimalist-floral',
  'snowfall-white',
  'tahlilan-khusyuk',
  'wisuda-sarjana',
  'golden-birthday',
  'baby-aqiqah',
  'formal-corporate',
  'halal-bihalal',
  'walimatul-khitan',
  'walimatul-khitan-sahaja',
  'kids-birthday',
  'syukuran-rumah',
  'cheerful-birthday',
  'little-prince',
  'royal-tasmiyah',
  'green-mosque',
  'walimatus-safar',
  'modern-graduate',
  'scholar-luxury',
  'clean-seminar',
  'reuni-akbar',
  'floral-midnight-navy',
  'rustic-coral-peach',
  'arctic-frost',
  'editorial-cherry-blossom',
  'orange-energy',
  'rustic-purple-dream'
];

const browser = spawn(edgePath, [
  '--headless=new',
  '--remote-debugging-port=9230',
  '--user-data-dir=' + userDataDir,
  '--remote-allow-origins=*',
  '--window-size=400,800',
  'about:blank'
]);

async function run() {
  await new Promise(r => setTimeout(r, 2000));
  try {
    const listRes = await fetch('http://127.0.0.1:9230/json/list');
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

    // Set mobile preview chassis viewport standard (360 x 520 - inside builder preview chassis)
    await send('Emulation.setDeviceMetricsOverride', {
      width: 360,
      height: 520,
      deviceScaleFactor: 2,
      mobile: true
    });

    const report = [];

    for (const t of templates) {
      console.log(`Checking template: ${t}...`);
      await send('Page.navigate', { url: `http://127.0.0.1:8000/demo/${t}?preview=1` });
      await new Promise(r => setTimeout(r, 1200));

      // Inspect cover element dimensions and layout
      const evalRes = await send('Runtime.evaluate', {
        expression: `(function() {
          const cover = document.getElementById('coverScreen') || 
                        document.getElementById('invitation-cover') || 
                        document.getElementById('envelopeScreen') || 
                        document.getElementById('envelope-cover') ||
                        document.querySelector('.fixed.inset-0.z-50');
          if (!cover) return { found: false };
          
          const rect = cover.getBoundingClientRect();
          const computed = window.getComputedStyle(cover);
          
          // Check child card if floating
          const firstChild = cover.querySelector('.max-w-sm, .max-w-md, .vip-ticket, .gorga-border');
          let childInfo = null;
          if (firstChild) {
            const cRect = firstChild.getBoundingClientRect();
            const cComp = window.getComputedStyle(firstChild);
            childInfo = {
              width: cRect.width,
              height: cRect.height,
              top: cRect.top,
              bottom: cRect.bottom,
              hasRounded: cComp.borderRadius !== '0px',
              borderRadius: cComp.borderRadius,
              marginTop: cComp.marginTop,
              marginBottom: cComp.marginBottom
            };
          }

          // Check button visibility
          const btn = cover.querySelector('#open-invitation-btn, #btnOpenInvitation, #openInvitationBtn, footer button, [onclick*="open"], [onclick*="buka"], .pulse-btn, button');
          let btnInfo = null;
          if (btn) {
            const bRect = btn.getBoundingClientRect();
            btnInfo = {
              text: btn.innerText.trim().replace(/\\n/g, ' '),
              top: bRect.top,
              bottom: bRect.bottom,
              height: bRect.height,
              isOffscreen: bRect.bottom > window.innerHeight,
              isVisible: bRect.height > 0 && bRect.width > 0 && bRect.bottom <= window.innerHeight
            };
          }

          return {
            found: true,
            coverBg: computed.backgroundColor,
            isBlackBackdrop: computed.backgroundColor.includes('rgba(0, 0, 0') || computed.backgroundColor === 'rgb(0, 0, 0)',
            hasFixedInset0: computed.position === 'fixed' && computed.top === '0px' && computed.bottom === '0px',
            viewportHeight: window.innerHeight,
            viewportWidth: window.innerWidth,
            childInfo: childInfo,
            btnInfo: btnInfo,
            scrollHeight: cover.scrollHeight,
            hasScrollOverflow: cover.scrollHeight > window.innerHeight + 10
          };
        })()`,
        returnByValue: true
      });

      const data = evalRes.result ? evalRes.result.value : null;

      // Capture screenshot
      const shot = await send('Page.captureScreenshot', { format: 'png' });
      fs.writeFileSync(path.join(coversDir, `cover_${t}.png`), Buffer.from(shot.data, 'base64'));

      report.push({ template: t, ...data });
    }

    fs.writeFileSync(path.join(artifactDir, 'all_covers_report.json'), JSON.stringify(report, null, 2));
    console.log('Saved all_covers_report.json');

  } catch (err) {
    console.error('Error:', err);
  } finally {
    browser.kill();
  }
}

run();
