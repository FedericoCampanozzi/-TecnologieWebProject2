let stopUpdateFooter = false;

$(document).ready(function() {
    resizeEvent();
    window.addEventListener("resize", resizeEvent);
    setInterval(resizeEvent, 5);
    $('.collapse').on('transitionstart', function(e) {
        stopUpdateFooter = true;
    });
    $('.collapse').on('transitionend', function(e) {
        stopUpdateFooter = false;
    });
});

function resizeEvent() {
    if(stopUpdateFooter) return;

    let footer = document.getElementsByTagName("footer")[0].getBoundingClientRect();
    let footerNoFix = document.getElementById("footerNoFix").getBoundingClientRect();
    let footerFix = document.getElementById("footerFix").getBoundingClientRect();
    let javascriptPadding = document.getElementById("javascriptPadding");
    if (footerNoFix.top < footerFix.top) javascriptPadding.style.height = (footerFix.top - footerNoFix.bottom - footer.height) + "px";
    else javascriptPadding.style.height = "0px";
}