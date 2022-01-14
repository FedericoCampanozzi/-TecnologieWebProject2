<?php
    $info = $dbh->get_products_byid($_GET["id"]);
?>
<section class="container top-40">
    <div class="product-dtl-container">
        <div class="nome-prodotto">
            <span><?php echo $info[0]["Nome"] ?></span>
        </div>
        <div>
            <img alt="" src="<?php echo UPLOAD_PRODUCT_DIR . $info[0]["ImagePath"] ?>" width="256" height="256">
        </div>
        <div class="categoria">
            Categoria : <span><?php echo $info[0]["NomeC"] ?></span>
        </div>
        <div class="descrizione">
            Descrizione : <span><?php echo $info[0]["Descrizione"] ?></span>
        </div>
        <div class="fornitore">
            Fornitore : <span><?php echo $info[0]["RagioneSociale"] ?></span>
        </div>
        <div class="prezzo">
            Prezzo : <span><?php echo $info[0]["Prezzo"] ?></span> &euro;
        </div>
        <div class="giacenza">
            Pezzi Rimanenti : <span><?php echo $info[0]["Giacenza"] ?></span>
        </div>
    </div>
</section>
<section class="container top-40">
    clicca <a href="homepageUser.php">qui</a> per tornare alla homepage
</section>