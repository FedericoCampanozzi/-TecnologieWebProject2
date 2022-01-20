$(document).ready(function() {    
    $(document).ready(function() {
        $("#carta_div").css("visibility", "hidden");
        $("#contanti").on('change',function() {
            $("#carta_div").css("visibility", "hidden");
        });
        $("#carte").on('change',function() {
            $("#carta_div").css("visibility", "visible");
        });
        $("#annulla-btn").click(function(){
            $.get('utils/update.php', {
                codiceUpdate: "annulla_ordine"
            }, function(response) {
                console.log("Response : " + response);
                window.location.href = "homepageUser.php";
            });
        });
    });
});