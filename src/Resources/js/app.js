import ClipboardJS from "./libs/clipboard";

window.ClipboardJS = ClipboardJS

window.createClipboard = function createClipboard(element) {
    new ClipboardJS('#'+element.getAttribute('id')).on('success', function(e) {
        e.clearSelection();
        e.trigger.classList.add('tooltip-shown');
        setTimeout(() => {
            e.trigger.classList.remove('tooltip-shown');
        }, 500)
    });
}
