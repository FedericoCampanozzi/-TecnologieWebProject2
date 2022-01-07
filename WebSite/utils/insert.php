<?php
require_once '../bootstrap.php';
$dbg = true;
if ($dbg) {
    var_dump($_SESSION);
    ?> <br> <br> <br> <?php
    var_dump($_REQUEST);
}
$codice = $_REQUEST["codiceInsert"];
switch ($codice) {
    case ("categoria"):
        if ($dbh->insert_categoria($_REQUEST["nome"], $_REQUEST["desc"]))
            $msg->show_in_next_page("categoria inserito correttamente", "homepageAdmin.php", "homepageAdmin.php", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("c'&egrave; stato un problema inaspettato, <br> <strong> categoria non inserito</strong>", "homepageAdmin.php", "homepageAdmin.php", MsgType::Error, $dbg);
        break;
    case ("fornitore"):
        if ($dbh->insert_fornitore($_REQUEST["p_iva"], $_REQUEST["ragione_sociale"], $_REQUEST["via"], $_REQUEST["numero_civico"], $_REQUEST["citta"]))
            $msg->show_in_next_page("fornitore inserito correttamente", "homepageAdmin.php", "homepageAdmin.php", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("c'&egrave; stato un problema inaspettato, <br> <strong> fornitore non inserito</strong>", "homepageAdmin.php", "homepageAdmin.php", MsgType::Error, $dbg);
        break;
    case ("fornitura"):
        if ($dbh->insert_fornitura($_REQUEST["qta"], $_REQUEST["az_prodotto"], $_SESSION["PIVA_Azienda"]))
            $msg->show_in_next_page("fornitura inserita correttamente", "homepageSupplier.php?showTab=forniture", "forniture", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("dasda", "homepageSupplier.php?showTab=forniture", "forniture", MsgType::Error, $dbg);
        break;
    case ("prodotto"):
        if ($dbh->insert_prodotto($_REQUEST["nome"], $_REQUEST["desc"], $_REQUEST["prezzo"], $_SESSION["PIVA_Azienda"], 'cactus.jpg', $_REQUEST["categoria"]))
            $msg->show_in_next_page("prodotto inserito correttamente", "homepageSupplier.php?showTab=product", "product", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("dasda", "homepageSupplier.php?showTab=product", "product", MsgType::Error, $dbg);
        break;
    case ("user"):
        if ($dbh->insert_user($_REQUEST["username"], $_REQUEST["psw"], $_REQUEST["nome"], $_REQUEST["cognome"], $_REQUEST["dataNascita"], $_REQUEST["email"], $_REQUEST["telefono"]))
            $msg->show_in_next_page("<strong>Complimenti !!!</strong> ti sei registrato al nostro webstore", "newUser.php", "newUser", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("C'&egrave; stato un problema inaspettato<br>Riprova pi&ugrave; tardi oppure contatta il servizio clienti", "newUser.php", "newUser", MsgType::Error, $dbg);
        break;
    case ("carta"):
        if ($dbh->insert_carta($_REQUEST["numero"], $_REQUEST["datascadenza"], $_REQUEST["ccv"], $_REQUEST["tipo_carta"], $_SESSION["IdUtente"]))
            $msg->show_in_next_page("carta inserita correttamente", "userProfile.php?showTab=card", "card", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("c'&egrave; stato un problema inaspettato, <br> <strong> carta di pagamento non inserito</strong>", "userProfile.php?showTab=card", "card", MsgType::Error, $dbg);
        break;
    case ("recapito"):
        if ($dbh->insert_recapito($_REQUEST["via"], $_REQUEST["nc"], $_REQUEST["citta"], $_REQUEST["interno"], $_SESSION["IdUtente"]))
            $msg->show_in_next_page("recapito inserito correttamente", "userProfile.php?showTab=address", "address", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("c'&egrave; stato un problema inaspettato, <br> <strong>recapito non inserito</strong>", "userProfile.php?showTab=address", "address", MsgType::Error, $dbg);
        break;
    case ("ordine"):
        $usr_cart = $dbh->get_carrello($_SESSION["IdUtente"]);
        $disp = true;
        $i = 0;
        for (; $i < sizeof($usr_cart); $i++) {
            if ($dbh->qta_giacenza_prodotto($usr_cart[$i]["IdProdotto"]) < $usr_cart[$i]["Qta"]) {
                $disp = false;
                break;
            }
        }
        if ($disp) {
            if ($_REQUEST["useContanti"] == "NO") {
                // USO CARTA --> CONTROLLO SE CI SONO I SOLDI
                if ($dbh->denaro_carta($_REQUEST["select_carta"]) > $_REQUEST["totale"]) {
                    //  --> INSERISCO L'ORDINE
                    if ($dbh->insert_ordine(false, $_REQUEST["note"], $_SESSION["IdUtente"], $_REQUEST["select_add"], $_REQUEST["select_carta"])) {
                        $id_ordine = $dbh->last_ordine($_SESSION["IdUtente"]);
                        // --> AGGIORNO IL CARRELLO
                        for ($i = 0; $i < sizeof($usr_cart); $i++) {
                            $dbh->update_riga_carrello($_SESSION["IdUtente"], $usr_cart[$i]["IdProdotto"], $id_ordine);
                        }
                        // --> AGGIORNO LA CARTA
                        $dbh->update_conto($_REQUEST["select_carta"], -$_REQUEST["totale"]);
                        $msg->show_in_next_page("ordine inserito", "pagamento.php", "pagamento.php", MsgType::Successfull, $dbg);
                    } else {
                        $msg->show_in_next_page("c'&egrave; stato un problema inaspettato, <br> <strong>ordine non inserito</strong>", "pagamento.php", "pagamento.php", MsgType::Error, $dbg);
                    }
                } else {
                    $msg->show_in_next_page("Non ci sono soldi", "pagamento.php", "pagamento.php", MsgType::Warning, $dbg);
                }
            } else {
                // USO CONTANTI --> INSERISCO L'ORDINE
                if ($dbh->insert_ordine(true, $_REQUEST["note"], $_SESSION["IdUtente"], $_REQUEST["select_add"], $_REQUEST["select_carta"])) {
                    $id_ordine = $dbh->last_ordine($_SESSION["IdUtente"]);
                    // --> AGGIORNO IL CARRELLO
                    for ($i = 0; $i < sizeof($usr_cart); $i++) {
                        $dbh->update_riga_carrello($_SESSION["IdUtente"], $usr_cart[$i]["IdProdotto"], $id_ordine);
                    }
                    $msg->show_in_next_page("ordine inserito", "pagamento.php", "pagamento.php", MsgType::Successfull, $dbg);
                } else {
                    $msg->show_in_next_page("c'&egrave; stato un problema inaspettato, <br> <strong>ordine non inserito</strong>", "pagamento.php", "pagamento.php", MsgType::Error, $dbg);
                }
            }
        } else {
            $msg->show_in_next_page("siamo spiacenti ma il prodotto " . $usr_cart[$i]["Nome"] . "non &egrave; pi&ugrave; disponibile", "pagamento.php", "pagamento.php", MsgType::Warning, $dbg);
        }
        break;
    case ("rc_usr_hp"):
        $dbh->insert_rc($_REQUEST["product_id"], $_SESSION["IdUtente"]);
        break;
    case ("rc_usr_prof"):
        $dbh->insert_rc($_REQUEST["product_id"], $_SESSION["IdUtente"]);
        break;
    default:
        die("codice inserimento non trovato");
        break;
}