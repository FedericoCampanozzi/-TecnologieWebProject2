<?php
require_once '../bootstrap.php';
$dbg = false;
if ($dbg) {
    var_dump($_SESSION);
    ?> <br> <br> <br> <?php
    var_dump($_REQUEST);
}
$codice = $_REQUEST["codiceUpdate"];
switch ($codice) {
    case ("fornitore"):
        if ($dbh->update_fornitore($_SESSION["PIVA_Azienda"],$_REQUEST["via"],$_REQUEST["numero_civico"],$_REQUEST["citta"],$_REQUEST["pecMail"],$_REQUEST["infoMail"],$_REQUEST["tell"],$_REQUEST["fax"]))
            show_in_next_page("i dati sono stati aggiornati correttamente", 
            "datiAggiornati", "homepageSupplier?showTab=supp_profile", MsgType::Successfull, $dbg);
        else
            show_in_next_page("i dati non sono stati aggiornati", 
            "datiAggiornati", "homepageSupplier?showTab=supp_profile", MsgType::Error, $dbg);
        break;
    case ("password"):
        if ($dbh->find_login($_SESSION["IdUtente"], $_REQUEST["old_psw"]))
            if ($dbh->update_user_psw($_SESSION["IdUtente"], $_REQUEST["new_psw"]))
                show_in_next_page("i dati sono stati aggiornati correttamente", 
                "datiAggiornati", "userProfilePage.php?showTab=usr_profile", MsgType::Successfull, $dbg);
            else
                show_in_next_page("dati non aggiornati", 
                "datiAggiornati", "userProfilePage.php?showTab=usr_profile", MsgType::Error, $dbg);
        else
            show_in_next_page("le password non corrispondono", 
            "userProfilePage.php?showTab=usr_profile", "usr_profile", MsgType::Error, $dbg);
        break;
    case ("user"):
        //$img_msg = uploadImage(UPLOAD_USER_DIR, $_FILES["Immagine"]);
        //if(strlen($img_msg[0]) > 0){
        //    show_in_next_page("Non &egrave; stao possibile caricare l'immagine per i seguenti motivi : </br> ".$img_msg, "userProfile.php?showTab=usr_profile", "error_img", MsgType::Warning, $dbg);
        //}
        if ($dbh->update_user($_SESSION["IdUtente"], $_REQUEST["username"], $_REQUEST["email"], $_REQUEST["tell"]))
            show_in_next_page("dati aggiornati", "userProfile.php?showTab=usr_profile", "usr_profile", MsgType::Successfull, $dbg);
        else
            show_in_next_page("dati non aggiornati", "userProfile.php?showTab=usr_profile", "usr_profile", MsgType::Error, $dbg);
        break;
    case ("login"):
        if ($dbh->find_user_from_username($_REQUEST["user"])) {
            if ($dbh->find_login($_REQUEST["user"], $_REQUEST["password"])) {
                $login = $dbh->get_login($_REQUEST["user"], $_REQUEST["password"]);
                registerUser($login);
                if (isset($login[0]["PIVA"])) {
                    registerSupplier($login);
                }
                if(!$dbg) header("Location: ../".$login[0]["Homepage"]);
            } else {
                show_in_next_page("password non corrispondente", "index.php", "index.php", MsgType::Error, $dbg);
            }
        } else {
            show_in_next_page("utente non trovato", "index.php", "index.php", MsgType::Error, $dbg);
        }
        break;
    case ("account"):
        if ($dbh->find_user_from_username($_REQUEST["user"])) {
            $newPsw = "";
            $seed = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()');
            shuffle($seed);
            foreach (array_rand($seed, 10) as $k) $newPsw .= $seed[$k];
            var_dump($newPsw);
            $dbh->update_user_psw($_REQUEST["user"], $newPsw);
            $login = $dbh->get_login($_REQUEST["user"], $newPsw);
            show_in_next_page("abbiamo cambiato la password per l'utente " . $login[0]["Username"] . " con e-mail : " . $login[0]["EMail"] . " in " . $newPsw,"recuperaAccount.php","acc_recuperato",MsgType::Information,$dbg);
        } else {
            show_in_next_page("utente non trovato", "recuperaAccount.php", "acc_non_recuperato", MsgType::Error, $dbg);
        }
        break;
    case ("ordine"):
        if ($dbh->update_ordine($_SESSION["IdUtente"], $_REQUEST["id_ordine"]))
            show_in_next_page("Consegna registrata correttamente", "homepageDeliveryMan.php", "homepageDeliveryMan.php", MsgType::Successfull, $dbg);
        else
            show_in_next_page("Consegna errata", "homepageDeliveryMan.php", "homepageDeliveryMan.php", MsgType::Error, $dbg);
        break;
    case ("usr_ruolo"):
        if ($dbh->update_user_ruolo($_REQUEST["IdUtenteCambio"], $_REQUEST["IdNuovoRuolo"], $_REQUEST["P_IVA"]))
            ajax_response("Consegna registrata correttamente", "", "homepageAdmin.php", MsgType::Successfull, $dbg);
        else
            ajax_response("Consegna registrata correttamente", "", "homepageAdmin.php", MsgType::Successfull, $dbg);
        break;
    case ("denaro"):
        if ($dbh->update_conto($_REQUEST["numero_carta"], 100.0))
            show_in_next_page("transazione avvenuta corretamente", "userProfile.php?showTab=card", "card-denaro", MsgType::Successfull, $dbg);
        else
            show_in_next_page("c'&egrave; stato un problema inaspettato, <br> <strong>transazione annullata</strong>", "userProfile.php?showTab=card", "card-denaro", MsgType::Error, $dbg);
        break;
    default:
        die("codice inserimento non trovato");
        break;
}