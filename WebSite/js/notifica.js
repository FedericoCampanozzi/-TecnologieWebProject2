$(document).ready(function() {
    $("#sendNotifica").click(function() {
        const id_parts = $(this).attr("id").split("_");
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
        });
    });
    $("#sendNotifica").click(function() {
        const id_parts = $(this).attr("id").split("_");
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
        });
    });
    $(".collapse").click(function() {
        const id_parts = $(this).attr("id").split("_");
        $.post('utils/update.php', {
            codiceUpdate: "notifica"
        }, function(response) {

        });
    });
});