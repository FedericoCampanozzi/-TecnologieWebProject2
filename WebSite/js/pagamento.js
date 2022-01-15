$(document).ready(function() {
    var rgTipoPagamento = new RadioGroup(document.getElementById('rgTipoPagamento'));
    rgTipoPagamento.init();
    $("#carta_div").css("visibility", "hidden");
    $("#contanti").attr("aria-checked", "true");
    $("#usaContanti").val("si");
    $("#contanti").click(function() {
        $("#carta_div").css("visibility", "hidden");
        $("#usaContanti").val("si");
    });
    $("#carta").click(function() {
        $("#carta_div").css("visibility", "visible");
        $("#usaContanti").val("no");
    });
    $("#tbl_riepilogo").DataTable();
});