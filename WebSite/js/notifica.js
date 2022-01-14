$(document).ready(function() {
    $("#sendNotificaBroadcast").click(function() {
        $.get('utils/insert.php', {
            codiceInsert: "notifica_broadcast",
            Titolo: document.getElementById("titolo").value,
            Messaggio: document.getElementById("testo").value
        }, function(response) {
            console.log("Response : " + response);
            document.getElementById("to").selectedIndex = "0"
            document.getElementById("titolo").value = ""
            document.getElementById("testo").value = ""
            var url = new URL(window.location.href);
            url.searchParams.set('showTab', 'notifiche');
            window.location.href = url.href;
        });
    });
    $("#sendNotifica").click(function() {
        $.get('utils/insert.php', {
            codiceInsert: "notifica",
            To: document.getElementById("to").value,
            Titolo: document.getElementById("titolo").value,
            Messaggio: document.getElementById("testo").value
        }, function(response) {
            console.log("Response : " + response);
            document.getElementById("to").selectedIndex = "0"
            document.getElementById("titolo").value = ""
            document.getElementById("testo").value = ""
            var url = new URL(window.location.href);
            url.searchParams.set('showTab', 'notifiche');
            window.location.href = url.href;
        });
    });
    $(".btn-leggi").click(function() {
        if (typeof $(this).attr("data-target") != 'undefined') {
            let el = $(this);
            let dt = el.attr("data-target");
            let id = dt.split("_")[2];
            $.post('utils/update.php', {
                codiceUpdate: "notifica",
                idNotifica: id
            }, function(response) {
                console.log("Response : " + response);
                let classes = el.parent().parent().parent().attr("class").split(" ");
                if (classes.indexOf("notifica-non-letta") > -1) {
                    el.parent().parent().parent().removeClass("notifica-non-letta");
                    $("span.m-badge-notifiche").addClass("hidden-field");
                }
            });
        }
    });
});