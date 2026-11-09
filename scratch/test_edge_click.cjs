const { spawn } = require('child_process');
const fs = require('fs');

const edgePath = 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe';
const userDataDir = 'C:\\Users\\Fondaendana_\\.gemini\\antigravity\\brain\\7e07fa27-ab19-4b20-b120-d2da5688123b\\edge-test-click-profile';
const testHtml = 'file:///C:/Users/Fondaendana_/.gemini/antigravity/brain/7e07fa27-ab19-4b20-b120-d2da5688123b/test_solaris.html?preview=1';

if (!fs.existsSync(userDataDir)) {
  fs.mkdirSync(userDataDir, { recursive: true });
}

const browser = spawn(edgePath, [
  '--headless=new',
  '--remote-debugging-port=9241',
  '--user-data-dir=' + userDataDir,
  '--remote-allow-origins=*',
  '--window-size=375,812',
  '--allow-file-access-from-files',
  'about:blank'
]);

async function run() {
  await new Promise(r => setTimeout(r, 2000));
  try {
    const listRes = await fetch('http://127.0.0.1:9241/json/list');
    const tabs = await listRes.json();
    const pageTab = tabs.find(t => t.type === 'page');
    if (!pageTab) throw new Error('No page tab');

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

    ws.addEventListener('message', (e) => {
      const data = JSON.parse(e.data);
      if (data.method === 'Runtime.consoleAPICalled') {
        console.log('[BROWSER CONSOLE]', data.params.type, data.params.args.map(a => a.value || a.description).join(' '));
      }
      if (data.method === 'Runtime.exceptionThrown') {
        console.error('[BROWSER EXCEPTION]', data.params.exceptionDetails.text, data.params.exceptionDetails.exception?.description);
      }
    });

    await new Promise(r => ws.addEventListener('open', r));
    await send('Page.enable');
    await send('Runtime.enable');

    console.log('Navigating to', testHtml);
    await send('Page.navigate', { url: testHtml });
    await new Promise(r => setTimeout(r, 2000));

    // Check cover visibility before click
    const evalBefore = await send('Runtime.evaluate', {
      expression: `({
        coverDisplay: document.getElementById('invitation-cover')?.style.display,
        coverClasses: document.getElementById('invitation-cover')?.className,
        hasOpenFn: typeof openInvitation,
        btnExists: !!document.getElementById('open-invitation-btn')
      })`,
      returnByValue: true
    });
    console.log('Before click:', evalBefore.result.value);

    // Click Buka Undangan
    console.log('Clicking button...');
    const clickRes = await send('Runtime.evaluate', {
      expression: `(() => {
        const btn = document.getElementById('open-invitation-btn') || document.querySelector('button[onclick*="openInvitation"]');
        if (!btn) return 'NO_BUTTON';
        btn.click();
        return 'CLICKED';
      })()`,
      returnByValue: true
    });
    console.log('Click result:', clickRes.result.value);

    await new Promise(r => setTimeout(r, 1500));

    // Check cover visibility after click
    const evalAfter = await send('Runtime.evaluate', {
      expression: `({
        coverDisplay: document.getElementById('invitation-cover')?.style.display,
        coverClasses: document.getElementById('invitation-cover')?.className,
        bodyClasses: document.body.className
      })`,
      returnByValue: true
    });
    console.log('After click:', evalAfter.result.value);

    await send('Page.navigate', { url: 'about:blank' });
  } catch (err) {
    console.error('Error:', err);
  } finally {
    browser.kill();
    process.exit(0);
  }
}

run();
