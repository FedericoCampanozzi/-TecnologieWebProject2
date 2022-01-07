$(document).ready(function() {
    $(".add-to-cart").click(function() {
        const id_parts = $(this).attr("id").split("_");
        $.post("utils/insert.php", {
            obj_to_insert: "rc_usr_prof",
            product_id: document.getElementById("IdProdtto_" + id_parts[1]).value
        }, function(response) {
            console.log("Response: " + response);
        });
        return false;
    });
    $(".remove-from-cart").click(function() {
        const id_parts = $(this).attr("id").split("_");
        $.post("utils/delete.php", {
            obj_to_delete: "riga_carrello",
            product_id: document.getElementById("IdProdtto_" + id_parts[1]).value
        }, function(response) {
            console.log("Response: " + response);
        });
        return false;
    });
    $("#tbl_carrello_utente").DataTable();
    $("#tbl_carte_utente").DataTable();
    $("#tbl_recapiti_utente").DataTable();
});