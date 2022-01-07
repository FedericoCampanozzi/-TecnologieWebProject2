<form action="utils/insert.php" method="get">
            <input type="hidden" name="obj_to_insert" value="recapito">
            <div class="p-5 table-responsive">
                <table id="tbl_recapiti_utente" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Via</th>
                            <th>Numero Civico</th>
                            <th>Citt&agrave;</th>
                            <th>Interno*</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $recapiti = $dbh->get_recapiti($_SESSION["IdUtente"]);
                        for ($i = 0; $i < sizeof($recapiti); $i++) {
                            $interno = "mancante";
                            if (isset($recapiti[$i]["Interno"])) {
                                $interno = $recapiti[$i]["Interno"];
                            }
                            echo "
                                                        <tr>
                                                            <td>" . $recapiti[$i]["Via"] . "</td>
                                                            <td>" . $recapiti[$i]["NumeroCivico"] . "</td>
                                                            <td>" . $recapiti[$i]["Citta"] . "</td>
                                                            <td>" . $interno . "</td>
                                                            <td></td>
                                                        </tr>";
                        }
                        ?>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="via" id="via" placeholder="Via">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="nc" id="nc" placeholder="Numero Civico">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="citta" id="citta" placeholder="Citta">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="interno" id="interno" placeholder="Interno">
                            </td>
                            <td>
                                <button type="submit" class="custom-btn btn-grid-1">Aggiungi</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>