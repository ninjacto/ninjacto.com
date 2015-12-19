onmessage = function(event) {
    importScripts('js/highlight.pack.js');
    var result = self.hljs.highlightAuto(event.data);
    postMessage(result.value);
}