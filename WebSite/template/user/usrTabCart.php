<div class="p-5 table-responsive">
    <table id="tbl_carrello_utente" class="table table-striped table-bordered tbl tbl-green-1">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Fornitore</th>
                <th>Qt.&agrave;</th>
                <th>Prezzzo Unitario</th>
                <th>Prezzo Totale</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $usr_cart = $dbh->get_carrello($_SESSION["IdUtente"]);
            $tot = 0;
            for ($i = 0; $i < sizeof($usr_cart); $i++) : ?>
                <tr>
                    <td><img src="<?php echo UPLOAD_PRODUCT_DIR . $usr_cart[$i]["ImagePath"]; ?>" alt="" width="64" height="64"></td>
                    <td><?php echo $usr_cart[$i]["Nome"]; ?></td>
                    <td><?php echo $usr_cart[$i]["RagioneSociale"]; ?></td>
                    <td id="Qta_<?php echo $i; ?>"><?php echo $usr_cart[$i]["Qta"]; ?></td>
                    <td id="PrezzoU_<?php echo $i; ?>"><?php echo $usr_cart[$i]["PrezzoUnitario"]; ?>&euro;</td>
                    <td id="PrezzoTotale_<?php echo $i; ?>"><?php echo $usr_cart[$i]["PrezzoTotale"]; ?>&euro;</td>
                    <td>
                        <input type="hidden" id="IdProdtto_<?php echo $i; ?>" value="<?php echo $usr_cart[$i]["IdProdotto"]; ?>">
                        <button type="submit" class="custom-grid-btn add-to-cart bg-white" id="addToCart_<?php echo $i; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 16 16">
                                <path fill="rgb(0, 255, 0)" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                            </svg>
                        </button>
                    </td>
                    <td>
                        <button type="submit" class="custom-grid-btn remove-from-cart bg-white" id="removeFromCart_<?php echo $i; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 16 16">
                                <path fill="rgb(255, 0, 0)" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM6.5 7h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1 0-1z" />
                            </svg>
                        </button>
                    </td>
                </tr>
            <?php
                $tot += $usr_cart[$i]["PrezzoTotale"];
            endfor;
            if ($tot <> 0) :
            ?>
                <tr>
                    <td class="bold" colspan="5"> Totale : </td>
                    <td class="bold" id="totaleCarrello"> <?php echo number_format($tot,2); ?>&euro;</td>
                    <td colspan="2">
                        <form action="pagamento.php" method="get">
                            <button type="submit" class="custom-btn btn-grid-1 bg-white">Acquista</button>
                        </form>
                    </td>
                </tr>
            <?php
            endif
            ?>
        </tbody>
    </table>
</div>