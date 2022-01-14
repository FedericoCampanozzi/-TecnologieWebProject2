<?php
require_once '../bootstrap.php';
$dbg = false;
if ($dbg) {
    var_dump($_SESSION);
    ?> <br> <br> <?php
    var_dump($_REQUEST);
    ?> <br> <br> <?php
    var_dump($_FILES);
    ?> <br> <br> <?php
}
$codice = $_REQUEST["codiceInsert"];
switch ($codice) {
    case ("categoria"):
        if ($dbh->insert_categoria($_REQUEST["nome"], $_REQUEST["desc"]))
            show_in_next_page("categoria inserito correttamente", "categoria", "homepageAdmin.php?showTab=categorie", MsgType::Successfull, $dbg);
        else
            show_in_next_page("<strong> categoria non inserito</strong>", "categoria", "homepageAdmin.php?showTab=categorie", MsgType::Error, $dbg);
        break;
    case ("fornitore"):
        if ($dbh->insert_fornitore($_REQUEST["p_iva"], $_REQUEST["ragione_sociale"], $_REQUEST["via"], $_REQUEST["numero_civico"], $_REQUEST["citta"]))
            show_in_next_page("fornitore inserito correttamente", "nuovoFornitore", "homepageAdmin.php?showTab=addFornitore", MsgType::Successfull, $dbg);
        else
            show_in_next_page("<strong> fornitore non inserito</strong>", "nuovoFornitore", "homepageAdmin.php?showTab=addFornitore", MsgType::Error, $dbg);
        break;
    case ("fornitura"):
        if ($dbh->insert_fornitura($_REQUEST["qta"], $_REQUEST["az_prodotto"], $_SESSION["PIVA_Azienda"]))
            show_in_next_page("fornitura inserita correttamente", "forniture",
            "homepageSupplier.php?showTab=forniture", MsgType::Successfull, $dbg);
        else
            show_in_next_page("fornitura non inserita correttamente", "forniture",
            "homepageSupplier.php?showTab=forniture", MsgType::Error, $dbg);
        break;
    case ("notifica"):
        $dbh->insert_notifica($_SESSION["IdUtente"], $_REQUEST["To"], $_REQUEST["Messaggio"], $_REQUEST["Titolo"]);
        break;
    case ("notifica_broadcast"):
        $dbh->insert_notifica_broadcast($_SESSION["IdUtente"], $_REQUEST["Messaggio"], $_REQUEST["Titolo"]);
        break;
    case ("prodotto"):
        list($result, $msg) = uploadImage(UPLOAD_PRODUCT_DIR, $_FILES["Immagine"]);
        if ($result) {
            if ($dbh->insert_prodotto($_REQUEST["nome"], $_REQUEST["desc"], $_REQUEST["prezzo"], $_SESSION["PIVA_Azienda"], $msg, $_REQUEST["categoria"]))
            show_in_next_page("prodotto inserito correttamente", "addProduct", "homepageSupplier.php?showTab=product", MsgType::Successfull, $dbg);
            else
                show_in_next_page("prodotto non inserito", "addProduct", "homepageSupplier.php?showTab=product", MsgType::Error, $dbg);
        } else {
            show_in_next_page("Immagine non caricata per il seguente motivo : <br>" . $msg, "addProduct", "homepageSupplier.php?showTab=product", MsgType::Error, $dbg);
        }
        break;
    case ("user"):
        if ($dbh->insert_user($_REQUEST["username"], $_REQUEST["psw"], $_REQUEST["nome"], $_REQUEST["cognome"], $_REQUEST["dataNascita"], $_REQUEST["email"], $_REQUEST["telefono"]))
            show_in_next_page("<strong>Complimenti !!!</strong> ti sei registrato al nostro webstore", "newUser", "index.php", MsgType::Successfull, $dbg);
        else
            show_in_next_page("C'&egrave; stato un problema inaspettato<br>Riprova pi&ugrave; tardi oppure contatta il servizio clienti", "newUser", "newUser.php", MsgType::Error, $dbg);
        break;
    case ("carta"):
        $dbh->insert_carta($_REQUEST["numero"], $_REQUEST["datascadenza"], $_REQUEST["ccv"], $_REQUEST["tipo_carta"], $_SESSION["IdUtente"]);
        break;
    case ("recapito"):
        if ($dbh->insert_recapito($_REQUEST["via"], $_REQUEST["nc"], $_REQUEST["citta"], $_REQUEST["interno"], $_SESSION["IdUtente"]))
            show_in_next_page("recapito inserito correttamente", "address", "userProfile.php?showTab=address", MsgType::Successfull, $dbg);
        else
            show_in_next_page("<strong>recapito non inserito</strong>", "address", "userProfile.php?showTab=address", MsgType::Error, $dbg);
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
                // USO CARTA --> CONTROLLO SE IL CCV E' CORRETTO
                if ($dbh->check_ccv($_REQUEST["select_carta"], $_REQUEST["CCV"])) {
                    // CONTROLLO SE CI SONO I SOLDI
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
                            show_in_next_page("ordine inserito", "pag", "homepageUser.php", MsgType::Successfull, $dbg);
                        } else {
                            show_in_next_page("<strong>ordine non inserito</strong>", "pag", "pagamento.php", MsgType::Error, $dbg);
                        }
                    } else {
                        show_in_next_page("Non ci sono soldi", "pag", "pagamento.php", MsgType::Warning, $dbg);
                    }
                }
                else {
                    show_in_next_page("il codice CCV &egrave; errato", "pag", "pagamento.php", MsgType::Warning, $dbg);
                }
            } else {
                // USO CONTANTI --> INSERISCO L'ORDINE
                if ($dbh->insert_ordine(true, $_REQUEST["note"], $_SESSION["IdUtente"], $_REQUEST["select_add"], $_REQUEST["select_carta"])) {
                    $id_ordine = $dbh->last_ordine($_SESSION["IdUtente"]);
                    // --> AGGIORNO IL CARRELLO
                    for ($i = 0; $i < sizeof($usr_cart); $i++) {
                        $dbh->update_riga_carrello($_SESSION["IdUtente"], $usr_cart[$i]["IdProdotto"], $id_ordine);
                    }
                    show_in_next_page("ordine inserito", "pagamento.php", "pagamento.php", MsgType::Successfull, $dbg);
                } else {
                    show_in_next_page("<strong>ordine non inserito</strong>", "pagamento.php", "pagamento.php", MsgType::Error, $dbg);
                }
            }
        } else {
            show_in_next_page("siamo spiacenti ma il prodotto " . $usr_cart[$i]["Nome"] . "non &egrave; pi&ugrave; disponibile", "pagamento.php", "pagamento.php", MsgType::Warning, $dbg);
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