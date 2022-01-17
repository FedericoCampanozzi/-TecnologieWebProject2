$(document).ready(function(){
    $('body').css('overflow','hidden');
    $('div.my-alert button').click(function () {
        $(".my-alert").hide();
        $(".alt-backpanel").hide();
        $('body').css('overflow','auto');
    });
});