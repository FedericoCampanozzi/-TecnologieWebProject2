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
                        <select class="form-control" id="ruolo_<?php echo $i; ?>">";
                            <?php
                            foreach ($all_role as $r) :
                                if ($users[$i]["IdRuolo"] == $all_role[$j]["ID"]) :
                                ?>
                                <option value="<?php echo $r["ID"]; ?>" selected><?php echo $r["Nome"]; ?></option>
                                <?php else :?>
                                <option value="<?php echo $r["ID"]; ?>"><?php echo $r["Nome"]; ?></option>
                            <?php endif;
                            endforeach ?>
                        </select>
                    </td>
                    <td> 
                        <select class="form-control" id="forn_<?php echo $i; ?>">
                            <option value="NULL"> NULL </option>
                            <?php
                            foreach ($all_az as $az) :
                                if (isset($all_az[$j]["PIVA"]) && $users[$i]["PIVA"] == $all_az[$j]["PIVA"]) : ?>
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
<form action="utils/insert.php" method="get">
    <input type="hidden" name="obj_to_insert" value="categoria">
    <div class="p-5 table-responsive">
        <div class="table-caption">
            Categorie
        </div>
        <table id="tbl_categorie" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th></th>
                </tr>
            </thead>
            <?php
            $cat = $dbh->get_categoria();
            foreach ($cat as $c) : ?>
                <tr>
                    <td><?php echo $c["Nome"]; ?></td>
                    <td><?php echo $c["Descrizione"]; ?></td>
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
                    <textarea class="form-control gfx-not-resizable" name="desc" id="desc" placeholder="Descrizione" rows="3"> </textarea>
                </td>
                <td>
                    <button type="submit" class="custom-btn btn-grid-1">Inserisce</button>
                </td>
            </tr>
            <tbody>
            </tbody>
        </table>
    </div>
</form>
<div class="container">
    <form action="utils/insert.php" method="get">
        <input type="hidden" name="codiceInsert" value="fornitore">
        <div class="form-group">
            <label for="p_iva">Partita IVA (16 caratteri) : </label>
            <input type="text" class="form-control" name="p_iva" id="p_iva" placeholder="Partita IVA">
        </div>
        <div class="form-group">
            <label for="ragione_sociale">Ragione Sociale : </label>
            <input type="text" class="form-control" name="ragione_sociale" id="ragione_sociale" placeholder="Ragione Sociale">
        </div>
        <div class="form-group">
            <label for="via">Via : </label>
            <input type="text" class="form-control" name="via" id="via" placeholder="Via">
        </div>
        <div class="form-group">
            <label for="numero_civico">Numero Civico : </label>
            <input type="text" class="form-control" name="numero_civico" id="numero_civico" placeholder="Numero Civico">
        </div>
        <div class="form-group">
            <label for="citta">Citt&agrave; : </label>
            <input type="text" class="form-control" name="citta" id="citta" placeholder="citt&agrave;">
        </div>
        <button type="submit" class="custom-btn btn-6 text-small">
            Aggiungi Fornitore
        </button>
    </form>
</div>
<aside class="gfx-link">
    Clicca <a href="logoutPage.php">qui</a> per effettuare il logout
</aside>
<script src='js/homepageAdmin.js'></script>