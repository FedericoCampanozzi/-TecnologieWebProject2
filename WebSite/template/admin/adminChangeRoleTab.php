<div class="p-5 table-responsive">
    <div class="table-caption">
        Ruoli Utente
    </div>
    <div class="table-description">
        In questa tabella ci sono i ruoli di ciascun utente, premendo "supervisore" si cambiare il ruolo dell'utente in amministratore.
        Premendo su "cambia" si cambia il ruolo selezionato nella combobox. Per il ruolo di "fattorino" e "fornitore" serve la partiva iva di
        un fornitore presente sul sito web.
    </div>
    <table id="tbl_ruoli_utente" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Username</th>
                <th>Ruolo</th>
                <th>Azienda P. IVA</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = $dbh->get_users();
            $all_role = $dbh->get_role();
            $all_az = $dbh->get_fornitori();
            for ($i = 0; $i < sizeof($users); $i++) : ?>
                <tr>
                    <td><?php echo $users[$i]["Username"]; ?></td>
                    <td>
                        <label class="hidden-field" for="ruolo_<?php echo $i; ?>" >Ruolo:</label>
                        <select class="form-control" id="ruolo_<?php echo $i; ?>" name="ruolo_<?php echo $i; ?>">
                            <?php
                            foreach ($all_role as $r) :
                                if ($users[$i]["IdRuolo"] == $r["ID"]) :
                                ?>
                                <option value="<?php echo $r["ID"]; ?>" selected><?php echo $r["Nome"]; ?></option>
                                <?php else :?>
                                <option value="<?php echo $r["ID"]; ?>"><?php echo $r["Nome"]; ?></option>
                            <?php endif;
                            endforeach ?>
                        </select>
                    </td>
                    <td> 
                        <label class="hidden-field" for="forn_<?php echo $i; ?>" >Fornitore:</label>
                        <select class="form-control" id="forn_<?php echo $i; ?>" name="forn_<?php echo $i; ?>">
                            <option value="NULL"> NULL </option>
                            <?php
                            foreach ($all_az as $az) :
                                if (isset($az["PIVA"]) && $users[$i]["PIVA"] == $az["PIVA"]) : ?>
                                    <option value="<?php echo $az["PIVA"]; ?>" selected><?php echo $az["RagioneSociale"]; ?></option>
                                <?php else : ?>
                                    <option value="<?php echo $az["PIVA"]; ?>"><?php echo $az["RagioneSociale"]; ?></option>
                            <?php endif;
                            endforeach;
                            ?>
                        </select> 
                    </td>
                    <td>
                        <input type="hidden" id="IdUtente_<?php echo $i; ?>" value="<?php echo $users[$i]["ID"]; ?>">
                        <button class="custom-btn btn-9 change_ruolo" id="cambia_<?php echo $i; ?>">Cambia</button>
                    </td>
                </tr>
            <?php
            endfor
            ?>
        </tbody>
    </table>
</div>