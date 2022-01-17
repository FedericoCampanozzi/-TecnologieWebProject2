<?php
$maxPrezzo = 20;
$minPrezzo = 0;
$nomeProdotto = "";
$idCategoria = -1;
if(isset($_REQUEST["maxPrezzo"])) $maxPrezzo = $_REQUEST["maxPrezzo"];
if(isset($_REQUEST["minPrezzo"])) $minPrezzo = $_REQUEST["minPrezzo"];
if(isset($_REQUEST["nomeProdotto"])) $nomeProdotto = $_REQUEST["nomeProdotto"];
if(isset($_REQUEST["idCategoria"])) $idCategoria = $_REQUEST["idCategoria"];
?>
<div id="search-panel">
    <div class="card">
        <div class="card-header" id="search">
            <h5 class="mb-0">
                <button class="btn btn-link c-black" data-toggle="collapse" data-target="#advSearch" aria-expanded="false" aria-controls="advSearch">
                    Ricerca Avanzata 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" viewBox="0 0 16 16" class="ml-20">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </h5>
        </div>
        <div id="advSearch" class="collapse" aria-labelledby="search" data-parent="#search-panel">
            <div class="card-body fancy-collapse">
                <div class="row">
                    <div class="col-md-4">
                        <label for="ricercaNome">Ricerca :</label>
                        <input type="text" id="ricercaNome" name="ricercaNome" class="form-control" placeholder="Nome" value="<?php echo $nomeProdotto; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="minPrezzo" class="form-label">Prezzo Minimo : </label>
                        <input type="range" class="form-range" min="0" max="19.9" step="0.1" id="minPrezzo" value="<?php echo $minPrezzo; ?>">
                        <p id="minPrezzoOutput"><?php echo $minPrezzo; ?></p>
                        <label for="maxPrezzo" class="form-label">Prezzo Massimo : </label>
                        <input type="range" class="form-range" min="0.1" max="20" step="0.1" id="maxPrezzo"  value="<?php echo $maxPrezzo; ?>">
                        <p id="maxPrezzoOutput"><?php echo $maxPrezzo; ?></p>
                    </div>
                    <div class="col-md-4">
                        <label for="categoria">Categoria:</label>
                        <select id="categoria" name="categoria" class="form-control">
                            <option value="-1">-- TUTTE --</option>
                            <?php
                            $categorie = $dbh->get_categoria();
                            foreach ($categorie as $c) :
                                if($c["ID"] == $idCategoria):?>
                                <option value="<?php echo $c["ID"]; ?>" selected><?php echo $c["Nome"]; ?></option>
                                <?php
                                else :
                            ?>
                                <option value="<?php echo $c["ID"]; ?>"><?php echo $c["Nome"]; ?></option>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button id="searchButton" class="custom-btn full-center">cerca</button>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hidden-x">
    <?php
    $products = $dbh->get_products($maxPrezzo, $minPrezzo, $nomeProdotto, $idCategoria);
    for ($i = 0; $i < sizeof($products); $i++) :
        if ($i % 3 == 0) :
    ?>
            <div class="row">
            <?php
        endif;
            ?>
            <div class="col-lg-4">
                <div class="product-container">
                    <input type="hidden" id="IdProdtto_<?php echo $i; ?>" value="<?php echo $products[$i]["ID"]; ?>">
                    <div class="nome-prodotto"><?php echo $products[$i]["Nome"]; ?></div>
                    <img alt="" src="<?php echo UPLOAD_PRODUCT_DIR . $products[$i]["ImagePath"] ?>">
                    <div class="prezzo">Prezzo : <span><?php echo $products[$i]["Prezzo"]; ?></span> &euro;</div>
                    <?php
                    if ($products[$i]["Giacenza"] > 0) :
                    ?>
                        <button class="add-product" id="add_<?php echo $i; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg>
                        </button>
                    <?php
                    endif
                    ?>
                    <p>for more info click <a href="productDetails.php?id=<?php echo $products[$i]["ID"]; ?>">here</a></p>
                </div>
            </div>
            <?php
            if ($i % 3 == 2) :
            ?>
            </div>
        <?php
            endif;
        endfor;
        if ($i % 3 != 0) :
            while ($i % 3 == 0) : ?>
            <div class="col-lg-4">
            </div>
    <?php
                $i++;
            endwhile;
            echo "</div>";
        endif;
    ?>
    <script src="js/homepageUser.js"></script>
</div>