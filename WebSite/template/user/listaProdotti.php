<?php
$products = $dbh->get_products();

for ($i = 0; $i < sizeof($products); $i++) :
    if ($products)
?>
    <div class="product-container">
        <input type="hidden" id="IdProdtto_<?php echo $i; ?>" value="<?php echo $products[$i]["ID"]; ?>">
        <div class="nome-prodotto"><?php echo $products[$i]["Nome"]; ?></div>
        <div class="giacenza">
            Pezzi Rimanenti : <span id="giacenza_<?php echo $i; ?>"><?php echo $products[$i]["Giacenza"]; ?></span>
        </div>
        <div class="immagine">
            <img alt="" src="<?php echo UPLOAD_PRODUCT_DIR . $products[$i]["ImagePath"] ?>" width="156" height="156">
        </div>
        <div class="prezzo"><?php echo $products[$i]["Prezzo"]; ?>&euro;</div>
        <?php
        if ($products[$i]["Giacenza"] > 0) :
        ?>
        <div class="add-btn">
            <button type="submit" class="custom-btn btn-17 bg-white add-product" id="add_<?php echo $i; ?>"> Aggiungi </button>
        </div>
        <?php
        endif
        ?>
    </div>
<?php
endfor
?>
<script src="js/homepageUser.js"></script>