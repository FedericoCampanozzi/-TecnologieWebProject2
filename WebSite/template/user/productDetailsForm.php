<?php
    $info = $dbh->get_products_byid($_GET["id"]);
?>
<section>
    <div class="product-dtl-container">
        <div class="nome-prodotto">
            <span><?php echo $info[0]["Nome"] ?></span>
        </div>
        <img alt="" src="<?php echo UPLOAD_PRODUCT_DIR . $info[0]["ImagePath"] ?>" class="responsive" >
        <p><strong>Categoria</strong> : <span><?php echo $info[0]["NomeC"] ?></span></p>
        <p><strong>Fornitore</strong> : <span><?php echo $info[0]["RagioneSociale"] ?></span>
        <div class="descrizione">
            Descrizione : <p><?php echo $info[0]["Descrizione"] ?></p>
        </div>
        <hr>
        <div class="magazzino">
            Pezzi in magazzino : <span><?php if(!isset($info[0]["Giacenza"])) echo "0"; else echo $info[0]["Giacenza"]; ?></span>
        </div>
        <div class="magazzino">
            Pezzi Venduti : <span><?php if(!isset($info[0]["PezziVenduti"])) echo "0"; else echo $info[0]["PezziVenduti"]; ?></span>
        </div>
        <div class="prezzo">
            Prezzo : <span><?php echo $info[0]["Prezzo"] ?></span> &euro;
        </div>
        <form action="utils/insert.php" method="post">
            <input type="hidden" name="codiceInsert" value="rc_dlt">
            <input type="hidden" name="product_id" value="<?php echo $products[$i]["ID"]; ?>">
            <button type="submit" class="custom-btn">Aggiungi al carello</button>
        </form>
    </div>
</section>
<section class="container top-40 bot-40">
    clicca <a href="homepageUser.php">qui</a> per tornare alla homepage
</section>