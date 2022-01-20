$(document).ready(function() {
    $("#qta_out").text($("#qta").val());
    $("#qta").on('input', function() {
        $("#qta_out").text($(this).val())
    });

    $("#loadImage").click(function(){
        document.getElementById("Immagine").click();
    });

    $("a.btn-grid-1").click(function(){
        let formData = new FormData($("#formLoadImage")[0]);
        jQuery.ajax({
            url: 'utils/insert.php',
            type: "POST",
            data: formData,
            success: function(data) {
                let url = new URL(window.location.href);
                url.searchParams.set('showTab', 'product');
                window.location.href = url.href;
            },
            error: function(data) {
                let url = new URL(window.location.href);
                url.searchParams.set('showTab', 'product');
                window.location.href = url.href;
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    });
    $("#tbl_forniture").DataTable();
});