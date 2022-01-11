<?php
$info = $dbh->get_products_byid($_GET["id"]);
echo $info[0]["ID"]."<br>";
echo $info[0]["Nome"]."<br>";
echo $info[0]["Descrizione"]."<br>";
echo $info[0]["Prezzo"]."<br>";
echo $info[0]["PIVA_Fornitore"]."<br>";
echo $info[0]["RagioneSociale"]."<br>";
echo $info[0]["NomeC"]."<br>";
echo $info[0]["Giacenza"]."<br>";
?>
<div class="immagine">
<img alt="" src="<?php echo UPLOAD_PRODUCT_DIR . $info[0]["ImagePath"] ?>" width="256" height="256">
</div>
clicca <a href="homepageUser.php">qui</a> per tornare alla homepage