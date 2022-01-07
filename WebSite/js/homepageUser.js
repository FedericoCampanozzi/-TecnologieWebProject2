$(document).ready(function() {
    $(".add-product").click(function() {
        const id_parts = $(this).attr("id").split("_");
        $.post("utils/insert.php", {
            obj_to_insert: "rc_usr_hp",
            product_id: document.getElementById("IdProdtto_" + id_parts[1]).value
        }, function(response) {
            console.log("Response: " + response);
            let n_pezzi = parseInt(document.getElementById("giacenza_" + id_parts[1]).innerText);
            n_pezzi = n_pezzi - 1;
            if (n_pezzi <= 0) {
                $(this).attr("disabled", "disabled");
            }
            document.getElementById("giacenza_" + id_parts[1]).textContent = n_pezzi;
        });
        return false;
    });
});