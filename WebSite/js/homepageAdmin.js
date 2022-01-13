$(document).ready(function() {
    $('#tbl_categorie').DataTable();
    $('#tbl_ruoli_utente').DataTable();
    $(".change_ruolo").click(function() {
        const id_parts = $(this).attr("id").split("_");
        const new_idr = parseInt(document.getElementById("ruolo_" + id_parts[1]).value);
        let piva = document.getElementById("forn_" + id_parts[1]).value;
        if ((new_idr == 5 || new_idr == 6) && piva == "NULL") {
            console.log("SELEZIONARE PARTITA IVA");
            return;
        }
        $.post('utils/update.php', {
            codiceUpdate: "usr_ruolo",
            IdUtenteCambio: document.getElementById("IdUtente_" + id_parts[1]).value,
            IdNuovoRuolo: new_idr,
            P_IVA: piva
        }, function(response) {
            console.log("Response: " + response);
            //location.reload();
        });
        return false;
    });
});