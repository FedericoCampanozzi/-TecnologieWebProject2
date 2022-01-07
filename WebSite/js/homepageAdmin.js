$(document).ready(function() {
    $('#tbl_categorie').DataTable();
    $('#tbl_ruoli_utente').DataTable();
    $(".change_to_admin").click(function() {
        const id_parts = $(this).attr("id").split("_");
        $.post("utils/update.php", {
            obj_to_update: "usr_ruolo",
            IdUtenteCambio: document.getElementById("IdUtente_" + id_parts[1]).value,
            IdNuovoRuolo: 3,
            P_IVA: null
        }, function(response) {
            console.log("Response: " + response);
            location.reload();
        });
    });

    $(".change_ruolo").click(function() {
        const id_parts = $(this).attr("id").split("_");
        const new_idr = parseInt(document.getElementById("ruolo_" + id_parts[1]).value);
        let piva = null;
        $.post('utils/update.php', {
            obj_to_update: "usr_ruolo",
            IdUtenteCambio: document.getElementById("IdUtente_" + id_parts[1]).value,
            IdNuovoRuolo: new_idr,
            P_IVA: piva
        }, function(response) {
            console.log("Response: " + response);
            location.reload();
        });
    });
});