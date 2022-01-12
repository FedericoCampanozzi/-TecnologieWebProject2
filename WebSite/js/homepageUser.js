$(document).ready(function() {
    $(".add-product").click(function() {
        const id_parts = $(this).attr("id").split("_");
        $.post("utils/insert.php", {
            codiceInsert: "rc_usr_hp",
            product_id: document.getElementById("IdProdtto_" + id_parts[1]).value
        }, function(response) {
            console.log("Response: " + response);
            let n_pezzi = parseInt(document.getElementById("usr_cart_items").innerText);
            n_pezzi = n_pezzi + 1;
            document.getElementById("usr_cart_items").textContent = n_pezzi;
        });
        return false;
    });
});