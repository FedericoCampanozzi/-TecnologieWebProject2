$(document).ready(function() {
    $(".add-product").click(function() {
        let thisBtn = $(this);
        thisBtn.attr("disabled", "disabled");
        const id_parts = $(this).attr("id").split("_");
        $.post("utils/insert.php", {
            codiceInsert: "rc_usr_hp",
            product_id: document.getElementById("IdProdtto_" + id_parts[1]).value
        }, function(response) {
            console.log("Response: " + response);
            let n_pezzi = parseInt(document.getElementById("usr_cart_items").innerText);
            n_pezzi = n_pezzi + 1;
            document.getElementById("usr_cart_items").textContent = n_pezzi;
            thisBtn.removeAttr("disabled");
        });
        return false;
    });
    $("#minPrezzo").on('input', function() {
        let valoreMassimo = parseFloat($("#maxPrezzo").val());
        let valoreMinimo  = parseFloat($("#minPrezzo").val());
        if(valoreMinimo >= valoreMassimo){
            let vOk = valoreMinimo+0.1;
            $("#maxPrezzo").val(vOk);
            $("#maxPrezzoOutput").text(vOk.toFixed(1));
        }
        $("#minPrezzoOutput").text(valoreMinimo);
    });
    $("#maxPrezzo").on('input', function() {
        let valoreMassimo = parseFloat($("#maxPrezzo").val());
        let valoreMinimo  = parseFloat($("#minPrezzo").val());
        if(valoreMassimo <= valoreMinimo){
            let vOk = valoreMassimo-0.1;
            $("#minPrezzo").val(vOk);
            $("#minPrezzoOutput").text(vOk.toFixed(1));
        }
        $("#maxPrezzoOutput").text(valoreMassimo);
    });
    $("#searchButton").click(function(){
        let url = new URL(window.location.href);
        url.searchParams.set('maxPrezzo', $("#maxPrezzo").val());
        url.searchParams.set('minPrezzo', $("#minPrezzo").val());
        url.searchParams.set('nomeProdotto', $("#ricercaNome").val());
        url.searchParams.set('idCategoria', $("#categoria").val());
        window.location.href = url.href;
    });
});