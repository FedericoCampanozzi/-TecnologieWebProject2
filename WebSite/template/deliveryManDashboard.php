<section class="container">
    <div class="table-caption">
        Consegne
    </div>
    <div class="table-description">
        In questa tabella sono elencate le consegne da fare. Appena un pacco viene consegnato all'utente premere su "consegnato".
    </div>
    </div>
    <div class="p-5 table-responsive">
        <table id="tbl_consegne" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Tipo Pagamento</th>
                    <th>Indirizzo</th>
                    <th>Note</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $consegne  = $dbh->get_open_ordini();
                foreach ($consegne as $pacco) :
                    $tp = "";
                    if ($pacco["SceltaContanti"] == 1) $tp = "Contanti";
                    else $tp = "Carta";
                ?>
                    <tr>
                        <td><?php echo $pacco["ID"]; ?></td>
                        <td><?php echo $pacco["Nome"]; ?></td>
                        <td><?php echo $pacco["Cognome"]; ?></td>
                        <td><?php echo $tp; ?></td>
                        <td><?php echo $pacco["Via"] . "," . $pacco["NumeroCivico"] . " - " . $pacco["Citta"] ?></td>
                        <td><?php echo $pacco["Note"]; ?></td>
                        <td>
                            <form action="utils/update.php" method="get">
                                <input type="hidden" name="codiceUpdate" value="ordine">
                                <input type="hidden" name="id_ordine" value="<?php echo $pacco["ID"]; ?>">
                                <button type="submit" class="custom-btn btn-11">
                                    Consegnato
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
</section>
<section>
    Clicca <a href="logoutPage.php">qui</a> per effettuare il logout
</section>
<script src="./js/homepageDeliveryMan.js"></script>