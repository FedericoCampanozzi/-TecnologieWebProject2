<div class="table-caption">
    Grafico Vendite
</div>
<div class="container">
    <canvas id="graficoVenditeProdUser" height="200">
    </canvas>
    <div class="table-description">
        In questo grafico sono rappresentate, per ogni prodotto <?php if ($_SESSION["IdRuolo"] == 3) : echo "di ogni azienda";
                                                                endif; ?>, il numero di articoli venduti
    </div>
</div>
<?php if ($_SESSION["IdRuolo"] == 5) : ?>
    <form action="utils/insert.php" method="post" enctype="multipart/form-data" id="formLoadImage">
        <input type="hidden" name="codiceInsert" value="prodotto">
        <div class="container">
            <div class="table-caption">
                Elenco Prodotti
            </div>
            <div class="table-description">
                In questa tabella ci sono tutti i prodotti che l'azienda vende, con la possibilit&agrave; di aggiungerne di nuovi
            </div>
        </div>
        <div class="p-5 table-responsive">
            <table id="tbl_prodotti" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th>Descrizione</th>
                        <th class="grid-input-big">Prezzo</th>
                        <th>Categoria</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($product as $p) :
                    ?>
                        <tr>
                            <td><?php echo $p["Nome"]; ?></td>
                            <td><img alt="" src="<?php echo UPLOAD_PRODUCT_DIR . $p["ImagePath"]; ?>" height="136" width="136"></td>
                            <td>
                                <div class="grid-input-restrict"><?php echo $p["Descrizione"]; ?></div>
                            </td>
                            <td class="grid-input-big"><?php echo $p["Prezzo"]; ?>&euro;</td>
                            <td><?php echo $p["NomeC"]; ?></td>
                            <td> </td>
                        </tr>
                    <?php
                    endforeach
                    ?>
                    <tr>
                        <td>
                            <label class="hidden-field" for="nome">Nome:</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
                        </td>
                        <td>
                            <input class="hidden-field" type="file" name="Immagine" id="Immagine" title="Immagine" accept="image/*" />
                            <img id="loadImage" alt="" src="<?php echo UPLOAD_PRODUCT_DIR."default.png"; ?>" height="136" width="136" >
                        </td>
                        <td>
                            <label class="hidden-field" for="desc">Descrizione:</label>
                            <textarea name="desc" id="desc" placeholder="Descrizione" class="md-textarea form-control gfx-not-resizable" rows="4"></textarea>
                        </td>
                        <td>
                            <label class="hidden-field" for="prezzo">Prezzo:</label>
                            <input type="text" class="form-control inline-table-text grid-input-big" name="prezzo" id="prezzo" placeholder="Prezzo"> &euro;
                        </td>
                        <td>
                            <label class="hidden-field" for="categoria">Categoria:</label>
                            <select id="categoria" name="categoria" class="form-control">
                                <?php
                                $categorie = $dbh->get_categoria();
                                foreach ($categorie as $c) :
                                ?>
                                    <option value="<?php echo $c["ID"]; ?>"><?php echo $c["Nome"]; ?></option>
                                <?php
                                endforeach
                                ?>
                            </select>
                        </td>
                        <td>
                            <a class="custom-btn btn-grid-1">Aggiungi</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
<?php endif; ?>