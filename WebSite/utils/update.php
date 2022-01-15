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
$codice = $_REQUEST["codiceUpdate"];
switch ($codice) {
    case ("fornitore"):
        if ($dbh->update_fornitore($_SESSION["PIVA_Azienda"],$_REQUEST["via"],$_REQUEST["numero_civico"],$_REQUEST["citta"],$_REQUEST["pecMail"],$_REQUEST["infoMail"],$_REQUEST["tell"],$_REQUEST["fax"])){
            registerSupplier($dbh->get_login_by_id($_SESSION["IdUtente"]));
            show_in_next_page("i dati sono stati aggiornati correttamente", "datiAgg", "homepageSupplier.php", MsgType::Successfull, $dbg);
        }
        else
            show_in_next_page("i dati non sono stati aggiornati", "datiAgg", "homepageSupplier.php", MsgType::Error, $dbg);
        break;
    case ("password"):
        if ($_REQUEST["conf_psw"] == $_REQUEST["new_psw"])
            if($_SESSION["IdUtente"] == $dbh->get_id_utente($_SESSION["usr_un"], $_REQUEST["old_psw"])){
                if ($dbh->update_user_psw($_SESSION["IdUtente"], $_REQUEST["new_psw"]))
                    show_in_next_page("i dati sono stati aggiornati correttamente", "datiAgg", "userProfilePage.php", MsgType::Successfull, $dbg);
                else
                    show_in_next_page("dati non aggiornati", "datiAgg", "userProfilePage.php", MsgType::Error, $dbg);
            }else{
                show_in_next_page("la vecchia password non corrisponde", "datiAgg", "userProfilePage.php", MsgType::Error, $dbg);
            }
        else
            show_in_next_page("le password non corrispondono", "datiAgg", "userProfilePage.php", MsgType::Error, $dbg);
        break;
    case("immagine"):
        list($result, $msg) = uploadImage("../".UPLOAD_USER_DIR, $_FILES["Immagine"]);
        if($result && $dbh->update_image_user($_SESSION["IdUtente"], $msg)) {
            registerUser($dbh->get_login_by_id($_SESSION["IdUtente"]));
            show_ajax_next_page("Immagine aggiornata", "ImgAgg", MsgType::Successfull, $dbg);
        }else{
            show_ajax_next_page("Immagine non aggiornata per il seguente motivo : <br>".$msg, "ImgAgg", MsgType::Warning, $dbg);
        }
        break;
    case ("user"):
        if ($dbh->update_user($_SESSION["IdUtente"], $_REQUEST["username"], $_REQUEST["email"], $_REQUEST["tell"])) {
            registerUser($dbh->get_login_by_id($_SESSION["IdUtente"]));
            show_in_next_page("dati aggiornati", "datiAgg", "userProfilePage.php", MsgType::Successfull, $dbg);
        } else
            show_in_next_page("dati non aggiornati", "datiAgg", "userProfilePage.php", MsgType::Error, $dbg);
        break;
    case ("login"):
        if ($dbh->find_user_from_username($_REQUEST["user"])) {
            if ($dbh->find_login($_REQUEST["user"], $_REQUEST["password"])) {
                $login = $dbh->get_login($_REQUEST["user"], $_REQUEST["password"]);
                registerUser($login);
                if (isset($login[0]["PIVA"])) {
                    registerSupplier($login);
                }
                header("Location: ../".$login[0]["Homepage"]);
            } else {
                show_in_next_page("password non corrispondente", "pswErr", "index.php", MsgType::Error, $dbg);
            }
        } else {
            show_in_next_page("utente non trovato", "userErr", "index.php", MsgType::Error, $dbg);
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
            show_in_next_page("abbiamo cambiato la password per l'utente \"" . $login[0]["Username"] . "\" con e-mail : \"" . $login[0]["EMail"] . "\" in \"" . $newPsw,"\" accRec", "index.php", MsgType::Information, $dbg);
        } else {
            show_in_next_page("utente non trovato", "accRec", "recoveryAccountPage.php", MsgType::Error, $dbg);
        }
        break;
    case ("ordine"):
        if ($dbh->update_ordine($_SESSION["IdUtente"], $_REQUEST["id_ordine"]))
            show_in_next_page("Consegna registrata correttamente", "cons", "homepageDeliveryMan.php", MsgType::Successfull, $dbg);
        else
            show_in_next_page("Consegna errata", "cons", "homepageDeliveryMan.php", MsgType::Error, $dbg);
        break;
    case ("usr_ruolo"):
        $dbh->update_user_ruolo($_REQUEST["IdUtenteCambio"], $_REQUEST["IdNuovoRuolo"], $_REQUEST["P_IVA"]);
        break;
    case ("denaro"):
        if ($dbh->update_conto($_REQUEST["numero_carta"], 100.0))
            show_in_next_page("Transazione avvenuta corretamente", "denaro", "userProfilePage.php?showTab=card", MsgType::Successfull, $dbg);
        else
            show_in_next_page("<strong>Transazione annullata</strong>", "denaro", "userProfilePage.php?showTab=card", MsgType::Error, $dbg);
        break;
    case("notifica"):
        $dbh->update_notica($_REQUEST["idNotifica"]);
        break;
    default:
        die("codice inserimento non trovato");
        break;
}