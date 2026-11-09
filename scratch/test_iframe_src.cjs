const jsdom = require('jsdom');
const { JSDOM } = jsdom;

const dom = new JSDOM(`<!DOCTYPE html><html><body><iframe id="builderLivePreviewIframe" src="/demo/chibi-red?preview=1"></iframe></body></html>`, { url: "http://127.0.0.1:8000/buat-undangan" });
const document = dom.window.document;

const iframe = document.getElementById('builderLivePreviewIframe');
console.log('1. Initial getAttribute("src"):', iframe.getAttribute('src'));
console.log('1. Initial iframe.src:', iframe.src);

const targetUrl = "/demo/chibi-red?preview=1&category=Pernikahan";

console.log('2. Compare getAttribute("src") !== targetUrl:', iframe.getAttribute('src') !== targetUrl);

// Assign iframe.src = targetUrl
iframe.src = targetUrl;
console.log('3. After iframe.src = targetUrl:');
console.log('   getAttribute("src"):', iframe.getAttribute('src'));
console.log('   iframe.src:', iframe.src);
console.log('   Compare getAttribute("src") !== targetUrl:', iframe.getAttribute('src') !== targetUrl);
console.log('   Compare iframe.src !== targetUrl:', iframe.src !== targetUrl);
