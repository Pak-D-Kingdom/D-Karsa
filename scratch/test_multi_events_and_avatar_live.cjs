const { spawn } = require('child_process');
const fs = require('fs');
const path = require('path');

const edgePath = 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe';
const userDataDir = 'C:\\laragon\\www\\D-Karsa\\storage\\edge-events-test-profile';
const artifactDir = 'C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b';

if (!fs.existsSync(userDataDir)) {
  fs.mkdirSync(userDataDir, { recursive: true });
}

const browser = spawn(edgePath, [
  '--headless=new',
  '--remote-debugging-port=9232',
  '--user-data-dir=' + userDataDir,
  '--remote-allow-origins=*',
  '--window-size=430,932',
  'about:blank'
]);

async function run() {
  await new Promise(r => setTimeout(r, 2000));
  try {
    const listRes = await fetch('http://127.0.0.1:9232/json/list');
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

    const templates = [
      { key: 'editorial-cherry-blossom', name: 'Editorial Cherry Blossom', btnId: 'open-envelope-btn' },
      { key: 'orange-energy', name: 'Elegan Klasik Orange Energy', btnId: 'openInvitationBtn' },
      { key: 'rustic-purple-dream', name: 'Rustic Purple Dream', btnId: 'btnOpenInvitation' }
    ];

    for (const tmpl of templates) {
      console.log(`\n=== Testing Template: ${tmpl.name} (${tmpl.key}) ===`);
      const targetUrl = `http://127.0.0.1:8000/demo/${tmpl.key}`;
      await send('Page.navigate', { url: targetUrl });
      await new Promise(r => setTimeout(r, 2000));

      // Click "Buka Undangan" with specific button ID or window.openInvitation
      await send('Runtime.evaluate', {
        expression: `
          if (typeof window.openInvitation === 'function') {
            window.openInvitation();
          } else {
            const btn = document.getElementById('${tmpl.btnId}');
            if (btn) btn.click();
          }
        `
      });
      await new Promise(r => setTimeout(r, 1500));

      // Check header avatar on editorial-cherry-blossom
      if (tmpl.key === 'editorial-cherry-blossom') {
        const customCelebrantSvg = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"><circle cx="50" cy="50" r="50" fill="%23e11d48"/><text x="50" y="55" font-size="14" font-weight="bold" fill="white" font-family="sans-serif" text-anchor="middle">Valerie</text></svg>';
        await send('Runtime.evaluate', {
          expression: `
            window.postMessage({
              type: 'UPDATE_PREVIEW_PHOTO',
              target: 'groom',
              photoUrl: '${customCelebrantSvg}'
            }, '*');
          `
        });
        await new Promise(r => setTimeout(r, 400));
        await send('Runtime.evaluate', { expression: `window.scrollTo(0, 0);` });
        await new Promise(r => setTimeout(r, 400));
        const shotHeader = await send('Page.captureScreenshot', { format: 'png' });
        fs.writeFileSync(path.join(artifactDir, 'avatar_header_editorial-cherry-blossom.png'), Buffer.from(shotHeader.data, 'base64'));
        console.log(`Saved screenshot: avatar_header_editorial-cherry-blossom.png`);
      }

      // PostMessage 3 dynamic events
      console.log('Dispatching UPDATE_PREVIEW_EVENTS with 3 events via postMessage...');
      await send('Runtime.evaluate', {
        expression: `
          window.postMessage({
            type: 'UPDATE_PREVIEW_EVENTS',
            events: [
              {
                title: 'Sesi 1: Sunset Welcome & Cocktails',
                date: 'Sabtu, 28 November 2026',
                start_time: '17:00 WIB',
                end_time: '18:30 WIB',
                venue_name: 'Garden Terrace Level 1',
                address: 'Penyambutan tamu, photobooth, & mocktails.',
                maps_url: 'https://maps.google.com'
              },
              {
                title: 'Sesi 2: Sweet 17 Wishes & Cake Cutting',
                date: 'Sabtu, 28 November 2026',
                start_time: '18:30 WIB',
                end_time: '20:30 WIB',
                venue_name: 'Grand Ballroom Stage',
                address: 'Prosesi tiup lilin 17 tahun & jamuan makan malam.',
                maps_url: 'https://maps.google.com'
              },
              {
                title: 'Sesi 3: After Party & Live Acoustic DJ',
                date: 'Sabtu, 28 November 2026',
                start_time: '20:30 WIB',
                end_time: '22:30 WIB',
                venue_name: 'Starlight Poolside Lounge',
                address: 'Pesta dansa, live music band & doorprize.',
                maps_url: 'https://maps.google.com'
              }
            ]
          }, '*');
        `
      });
      await new Promise(r => setTimeout(r, 600));

      // Scroll to itineraryContainer and capture screenshot
      await send('Runtime.evaluate', {
        expression: `
          const el = document.getElementById('itineraryContainer');
          if (el) el.scrollIntoView({ behavior: 'instant', block: 'center' });
        `
      });
      await new Promise(r => setTimeout(r, 600));
      const shotEvents = await send('Page.captureScreenshot', { format: 'png' });
      fs.writeFileSync(path.join(artifactDir, `events_preview_${tmpl.key}.png`), Buffer.from(shotEvents.data, 'base64'));
      console.log(`Saved screenshot: events_preview_${tmpl.key}.png`);
    }

    console.log('\nAll interactive tests and screenshots completed successfully!');
    ws.close();
    browser.kill();
    process.exit(0);
  } catch (err) {
    console.error('Error during execution:', err);
    browser.kill();
    process.exit(1);
  }
}

run();
