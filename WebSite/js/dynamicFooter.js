$(document).ready(function() {
    resizeEvent();
    window.addEventListener("resize", resizeEvent);
    setInterval(resizeEvent, 5);
});

function resizeEvent() {
    let scrolls = document.getElementsByClassName("scrollable-item");
    let primaDelMain = $("#primaDelMain");
    let dopoIlMain = $("#dopoIlMain");
    for(let i=0;i<scrolls.length;i++){
      scrolls[i].style.height = (dopoIlMain.offset().top - primaDelMain.offset().top) + "px"; 
    }
}
