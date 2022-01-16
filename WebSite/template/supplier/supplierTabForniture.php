<div class="container">
    <div class="table-caption">
        Grafico Forniture
    </div>
    <canvas id="graficoForniture" height="200">
    </canvas>
    <div class="table-description">
        In questa grafico sono riportate le consegne mensili suddivise per prodotto.
    </div>
</div>
<form action="utils/insert.php" method="get">
    <input type="hidden" name="codiceInsert" value="fornitura">
    <div class="my-table-container table-responsive">
        <div class="table-caption">
            Dettaglio Forniture
        </div>
        <table id="tbl_forniture" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nome Prodotto</th>
                    <th class="grid-input-so-big">Data Consegna Merce</th>
                    <th class="grid-input-so-small">Qta</th>
                    <th class="text-small">Prezzo</th>
                    <th class="text-small">Costo Totale</th>
                    <th class="grid-input-small"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $forniture = $dbh->get_forniture($_SESSION["PIVA_Azienda"]);
                foreach ($forniture as $f) :
                ?>
                    <tr>
                        <td><?php echo $f["Nome"]; ?></td>
                        <td><?php echo $f["DataConsegnaMerce"]; ?></td>
                        <td><?php echo $f["Qta"]; ?></td>
                        <td><?php echo $f["Prezzo"]; ?>&euro;</td>
                        <td><?php echo $f["CostoTotale"]; ?>&euro;</td>
                        <td></td>
                    </tr>
                <?php
                endforeach
                ?>
                <tr>
                    <td>
                        <label class="hidden-field" for="az_prodotto">Prodotto:</label>
                        <select class="form-control grid-input-so-big" id="az_prodotto" name="az_prodotto">
                            <?php
                            $product = $dbh->get_products_forn($_SESSION["PIVA_Azienda"]);
                            foreach ($product as $p) :
                            ?> <option value="<?php echo $p["ID"]; ?>"><?php echo $p["Nome"]; ?></option><?php
                                                                                                                endforeach
                                                                                                                    ?>
                        </select>
                    </td>
                    <td></td>
                    <td class="grid-input-so-small">
                        <label class="hidden-field" for="qta">Quantit&agrave;:</label>
                        <input type="range" class="form-range" id="qta" name="qta">
                        <p id="qta_out"></p>
                    </td>
                    <td></td>
                    <td></td>
                    <td class="grid-input-small">
                        <button type="submit" class="custom-btn btn-grid-1">Inserisci</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</form>