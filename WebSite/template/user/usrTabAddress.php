<form action="utils/insert.php" method="get">
    <input type="hidden" name="codiceInsert" value="recapito">
    <div class="p-5 table-responsive">
        <table id="tbl_recapiti_utente" class="table table-striped table-bordered tbl tbl-green-1">
            <thead>
                <tr>
                    <th>Via</th>
                    <th>Numero Civico</th>
                    <th>Citt&agrave;</th>
                    <th class="text-small-2">Interno (Opzionale)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $recapiti = $dbh->get_recapiti($_SESSION["IdUtente"]);
                foreach ($recapiti as $r) :
                    $interno = "mancante";
                    if (isset($r["Interno"])) $interno = $r["Interno"];
                ?>
                    <tr>
                        <td><?php echo $r["Via"]; ?></td>
                        <td><?php echo $r["NumeroCivico"]; ?></td>
                        <td><?php echo $r["Citta"]; ?></td>
                        <td><?php echo $interno; ?></td>
                        <td></td>
                    </tr>
                <?php
                endforeach
                ?>
                <tr class="reset-row">
                    <td>
                        <label class="hidden-field" for="via">Via:</label>
                        <input type="text" class="form-control" name="via" id="via" placeholder="Via">
                    </td>
                    <td>
                        <label class="hidden-field" for="nc">Numero Civico:</label>
                        <input type="text" class="form-control" name="nc" id="nc" placeholder="Numero Civico">
                    </td>
                    <td>
                        <label class="hidden-field" for="citta">Citt&agrave;:</label>
                        <input type="text" class="form-control" name="citta" id="citta" placeholder="Citta">
                    </td>
                    <td>
                        <label class="hidden-field" for="interno">Interno:</label>
                        <input type="text" class="form-control" name="interno" id="interno" placeholder="Interno">
                    </td>
                    <td>
                        <button type="submit" class="custom-btn">Aggiungi</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</form>