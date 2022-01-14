<?php
$products = $dbh->get_products();
for ($i = 0; $i < sizeof($products); $i++) : 
    $g = 0;
    if(isset($products[$i]["Giacenza"])) $g = $products[$i]["Giacenza"];
    ?>
    <div class="product-container">
        <input type="hidden" id="IdProdtto_<?php echo $i; ?>" value="<?php echo $products[$i]["ID"]; ?>">
        <div class="nome-prodotto"><?php echo $products[$i]["Nome"]; ?></div>
        <div class="immagine">
            <img alt="" src="<?php echo UPLOAD_PRODUCT_DIR . $products[$i]["ImagePath"] ?>" width="176" height="176">
        </div>
        <div class="giacenza">
            Pezzi Rimanenti : <span id="giacenza_<?php echo $i; ?>"><?php echo $g; ?></span>
        </div>
        <div class="prezzo"><?php echo $products[$i]["Prezzo"]; ?>&euro;</div>
        <?php
        if ($products[$i]["Giacenza"] > 0) :
        ?>
        <div class="acquista">
            <button type="submit" class="custom-btn btn-17 bg-white add-product" id="add_<?php echo $i; ?>"> Aggiungi </button>
        </div>
        <?php
        endif
        ?>
        <a class="dettaglio" target="_blank" href="productDetails.php?id=<?php echo $products[$i]["ID"]; ?>">dettaglio</a>
    </div>
<?php
endfor
?>
<script src="js/homepageUser.js"></script>