const { spawn } = require('child_process');
const edgePath = 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe';
const userDataDir = 'C:\\laragon\\www\\D-Karsa\\storage\\edge-debug-orange';
const browser = spawn(edgePath, [
  '--headless=new',
  '--remote-debugging-port=9234',
  '--user-data-dir=' + userDataDir,
  '--remote-allow-origins=*',
  'about:blank'
]);

setTimeout(async () => {
  try {
    const tabs = await (await fetch('http://127.0.0.1:9234/json/list')).json();
    const ws = new WebSocket(tabs[0].webSocketDebuggerUrl);
    let id = 1;
    const send = (m, p={}) => new Promise(res => {
      const curId = id++;
      const h = e => {
        const d = JSON.parse(e.data);
        if (d.id === curId) { ws.removeEventListener('message', h); res(d.result); }
      };
      ws.addEventListener('message', h);
      ws.send(JSON.stringify({ id: curId, method: m, params: p }));
    });
    ws.onopen = async () => {
      ws.addEventListener('message', e => {
        const d = JSON.parse(e.data);
        if (d.method === 'Runtime.exceptionThrown') {
          console.error('Browser JS Exception:', d.params.exceptionDetails);
        }
      });
      await send('Runtime.enable');
      await send('Page.enable');
      await send('Page.navigate', { url: 'http://127.0.0.1:8000/demo/orange-energy' });
      setTimeout(async () => {
        const info = await send('Runtime.evaluate', {
          expression: '({ href: window.location.href, title: document.title, bodyLength: document.body ? document.body.innerHTML.length : 0 })',
          returnByValue: true
        });
        console.log('Page info:', info.result?.value);
        const eval1 = await send('Runtime.evaluate', {
          expression: 'typeof window.openInvitation',
          returnByValue: true
        });
        console.log('typeof window.openInvitation:', eval1.result?.value);
        const eval2 = await send('Runtime.evaluate', {
          expression: 'try { window.openInvitation(); "invoked"; } catch(e) { e.toString(); }',
          returnByValue: true
        });
        console.log('invoke result:', eval2.result?.value);
        setTimeout(async () => {
          const eval3 = await send('Runtime.evaluate', {
            expression: 'document.getElementById("invitation-cover").outerHTML.substring(0, 200)',
            returnByValue: true
          });
          console.log('cover HTML:', eval3.result?.value);
          const eval4 = await send('Runtime.evaluate', {
            expression: 'document.getElementById("main-invitation-wrapper").className',
            returnByValue: true
          });
          console.log('main-invitation-wrapper classes:', eval4.result?.value);
          browser.kill();
          process.exit(0);
        }, 1000);
      }, 2000);
    };
  } catch(e) {
    console.error(e);
    browser.kill();
    process.exit(1);
  }
}, 1000);
