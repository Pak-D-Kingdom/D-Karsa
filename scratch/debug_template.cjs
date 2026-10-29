const { spawn } = require('child_process');
const path = require('path');

const template = process.argv[2] || 'tahlilan-khusyuk';

const edge = spawn('C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe', [
  '--headless=new',
  '--remote-debugging-port=9236',
  '--remote-allow-origins=*',
  '--user-data-dir=C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b\\edge-debug-profile2',
  'about:blank'
]);

setTimeout(async () => {
  try {
    const listRes = await fetch('http://127.0.0.1:9236/json/list');
    const tabs = await listRes.json();
    const pageTab = tabs.find(t => t.type === 'page');

    const ws = new WebSocket(pageTab.webSocketDebuggerUrl);
    let id = 1;
    const send = (method, params = {}) => new Promise(res => {
      const curId = id++;
      const handler = event => {
        const parsed = JSON.parse(event.data);
        if (parsed.id === curId) {
          ws.removeEventListener('message', handler);
          res(parsed.result);
        }
      };
      ws.addEventListener('message', handler);
      ws.send(JSON.stringify({ id: curId, method, params }));
    });

    ws.addEventListener('open', async () => {
      await send('Emulation.setDeviceMetricsOverride', { width: 360, height: 520, deviceScaleFactor: 2, mobile: true });
      await send('Page.navigate', { url: `http://127.0.0.1:8000/demo/${template}?preview=1` });
      await new Promise(r => setTimeout(r, 1500));

      const evalRes = await send('Runtime.evaluate', {
        expression: `(() => {
          const cover = document.getElementById('coverScreen') || document.getElementById('envelopeScreen') || document.getElementById('invitation-cover');
          if (!cover) return { error: 'No cover found' };
          
          const children = Array.from(cover.children).map(c => ({
            tag: c.tagName,
            id: c.id,
            className: (c.className || '').substring(0, 50),
            rect: c.getBoundingClientRect(),
            scrollH: c.scrollHeight,
            clientH: c.clientHeight
          }));

          const section = cover.querySelector('section');
          const sectionChildren = section ? Array.from(section.children).map(c => ({
            tag: c.tagName,
            className: (c.className || '').substring(0, 50),
            rect: c.getBoundingClientRect(),
            scrollH: c.scrollHeight,
            text: (c.innerText || '').substring(0, 40)
          })) : [];

          return {
            cover: { scrollH: cover.scrollHeight, clientH: cover.clientHeight },
            sectionChildren
          };
        })()`,
        returnByValue: true
      });

      console.log(JSON.stringify(evalRes.result.value, null, 2));
      ws.close();
      edge.kill();
      process.exit(0);
    });
  } catch (err) {
    console.error(err);
    edge.kill();
    process.exit(1);
  }
}, 1200);
