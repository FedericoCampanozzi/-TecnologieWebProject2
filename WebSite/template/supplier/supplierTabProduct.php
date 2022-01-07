<div class="table-caption">
    Grafico Vendite
</div>
<div class="container">
    <canvas id="graficoVenditeProdUser" height="200">
    </canvas>
    <div class="table-description">
        In questa tabella ci sono tutti i prodotti che l'azienda vende, con la possibilit&agrave; di aggiungerne di nuovi
    </div>
</div>
<div class="scrollable-content">
    <form action="utils/insert.php" method="get">
        <input type="hidden" name="obj_to_insert" value="prodotto">
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
                            <td><img alt="" src="<?php echo UPLOAD_PRODUCT_DIR . $p["ImagePath"]; ?>" width="64" height="64"></td>
                            <td><?php echo $p["Descrizione"]; ?></td>
                            <td class="grid-input-big"><?php echo $p["Prezzo"]; ?>&euro;</td>
                            <td><?php echo $p["NomeC"]; ?></td>
                            <td> </td>
                        </tr>
                    <?php
                    endforeach
                    ?>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
                        </td>
                        <td>

                        </td>
                        <td>
                            <textarea name="desc" id="desc" placeholder="Descrizione" class="md-textarea form-control gfx-not-resizable" rows="4"></textarea>
                        </td>
                        <td>
                            <input type="text" class="form-control inline-table-text grid-input-big" name="prezzo" id="prezzo" placeholder="Prezzo"> &euro;
                        </td>
                        <td>
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
                            <button type="submit" class="custom-btn btn-grid-1">Aggiungi</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>