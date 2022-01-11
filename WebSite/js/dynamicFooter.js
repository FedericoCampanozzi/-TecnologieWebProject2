$(document).ready(function() {
    resizeEvent();
    window.addEventListener("resize", resizeEvent);
    setInterval(resizeEvent, 5);
});

function resizeEvent() {
    const body = document.getElementsByTagName("body")[0].getBoundingClientRect();
    const footer = document.getElementsByTagName("footer")[0];
    if (body.height < screen.height && !footer.classList.contains("fix-on-bot")) {
        footer.classList.add("fix-on-bot");
    }
    if (body.height > screen.height && footer.classList.contains("fix-on-bot")) {
        footer.classList.remove("fix-on-bot");
    }
}