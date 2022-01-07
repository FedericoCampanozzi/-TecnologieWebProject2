$(document).ready(function() {
    $("#carta_div").css("visibility", "hidden");
    $("#usaContanti").change(function() {
        $("#carta_div").css("visibility", "hidden");
    });
    $("#usaCarte").change(function() {
        $("#carta_div").css("visibility", "visible");
    });
    $("#tbl_riepilogo").DataTable();
});