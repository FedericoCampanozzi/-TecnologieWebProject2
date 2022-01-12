$(document).ready(function() {
    $(".add-to-cart").click(function() {
        const id_parts = $(this).attr("id").split("_");
        $.post("utils/insert.php", {
            codiceInsert: "rc_usr_prof",
            product_id: document.getElementById("IdProdtto_" + id_parts[1]).value
        }, function(response) {
            console.log("Response: " + response);
            let qta = parseInt(document.getElementById("Qta_" + id_parts[1]).innerHTML);
            let pu = parseFloat(document.getElementById("PrezzoU_" + id_parts[1]).innerHTML);
            let tr = parseFloat(document.getElementById("PrezzoTotale_" + id_parts[1]).innerHTML);
            let tc = parseFloat(document.getElementById("totaleCarrello").innerHTML);
            qta = qta + 1;
            document.getElementById("Qta_" + id_parts[1]).innerHTML = qta;
            document.getElementById("PrezzoTotale_" + id_parts[1]).innerHTML = (tr + pu) + "&euro;";
            document.getElementById("totaleCarrello").innerHTML = (tc + pu) + "&euro;";
        });
        return false;
    });
    $(".remove-from-cart").click(function() {
        const id_parts = $(this).attr("id").split("_");
        $.post("utils/delete.php", {
            codiceDelete: "riga_carrello",
            product_id: document.getElementById("IdProdtto_" + id_parts[1]).value
        }, function(response) {
            console.log("Response: " + response);
            let qta = parseInt(document.getElementById("Qta_" + id_parts[1]).innerHTML);
            let pu = parseFloat(document.getElementById("PrezzoU_" + id_parts[1]).innerHTML);
            let tr = parseFloat(document.getElementById("PrezzoTotale_" + id_parts[1]).innerHTML);
            let tc = parseFloat(document.getElementById("totaleCarrello").innerHTML);
            qta = qta - 1;
            if (qta < 0) {
                $(this).attr("disabled", "disabled");
                return;
            }
            document.getElementById("Qta_" + id_parts[1]).innerHTML = qta;
            document.getElementById("PrezzoTotale_" + id_parts[1]).innerHTML = (tr - pu) + "&euro;";
            document.getElementById("totaleCarrello").innerHTML = tc - pu;
        });
        return false;
    });
    $("#tbl_carrello_utente").DataTable();
    $("#tbl_carte_utente").DataTable();
    $("#tbl_recapiti_utente").DataTable();
});