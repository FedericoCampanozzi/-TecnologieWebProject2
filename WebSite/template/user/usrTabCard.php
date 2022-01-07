<div class="p-5 table-responsive">
            <table id="tbl_carte_utente" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Data di scadenza</th>
                        <th>Tipo</th>
                        <th>CCV</th>
                        <th>Disponibilit&agrave;</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $carte = $dbh->get_carte($_SESSION["IdUtente"]);
                    for ($i = 0; $i < sizeof($carte); $i++) {
                        echo "
                                                        <tr>
                                                            <td>" . $carte[$i]["Numero"] . "</td>
                                                            <td>" . $carte[$i]["DataScadenza"] . "</td>
                                                            <td>" . $carte[$i]["Tipo"] . "</td>
                                                            <td> *** </td>
                                                            <td> " . $carte[$i]["Disponibilita"] . " &euro; </td>
                                                            <td> 
                                                                <form action=\"utils/update.php\" method=\"post\">
                                                                    <input type=\"hidden\" name=\"obj_to_update\" value=\"denaro\">
                                                                    <input type=\"hidden\" name=\"numero_carta\" value=\"" . $carte[$i]["Numero"] . "\">
                                                                    <button type=\"submit\" class=\"custom-btn btn-grid-3\"> +100 &euro;</button>
                                                                </form>
                                                            </td>
                                                        </tr>";
                    }
                    ?>
                    <tr>
                        <td>
                            <input type="text" class="form-control grid-input-so-big" name="numero" id="numero" placeholder="Numero">
                        </td>
                        <td>
                            <input type="date" class="form-control" name="datascadenza" id="datascadenza">
                        </td>
                        <td>
                            <select class="form-control grid-input-big" id="tipo_carta" name="tipo_carta">
                                <option value="Visa">Visa</option>
                                <option value="Mastercard">Mastercard</option>
                                <option value="Altro">Altro</option>
                            </select>
                        </td>
                        <td>
                            <input type="password" class="form-control grid-input-big" name="ccv" id="ccv" maxlength="3" placeholder="CCV">
                        </td>
                        <td></td>
                        <td>
                            <button class="custom-btn btn-grid-1" id="addCard">Aggiungi</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>