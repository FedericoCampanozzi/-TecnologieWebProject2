<?php
function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function getIdFromName($name){
    return preg_replace("/[^a-z]/", '', strtolower($name));
}

function isUserLoggedIn(){
    return !empty($_SESSION['idautore']);
}

function registerUser($user){
    $_SESSION["IdUtente"] = $user[0]["ID"];
    $_SESSION["usr_un"] = $user[0]["Username"];
    $_SESSION["usr_nome"] = $user[0]["Nome"];
    $_SESSION["usr_cognome"] = $user[0]["Cognome"];
    $_SESSION["usr_dn"] = $user[0]["DataDiNascita"];
    $_SESSION["usr_email"] = $user[0]["EMail"];
    $_SESSION["usr_email"] = $user[0]["EMail"];
    $_SESSION["usr_tell"] = $user[0]["Telefono"];
    $_SESSION["usr_image"] = $user[0]["ImagePath"];
}

function registerSupplier($user){
    $_SESSION["PIVA_Azienda"] = $user[0]["PIVA"];
    $_SESSION["RagioneSociale"] = $user[0]["RagioneSociale"];
    $_SESSION["ViaF"] = $user[0]["ViaF"];
    $_SESSION["NumeroCivicoF"] = $user[0]["NumeroCivicoF"];
    $_SESSION["CittaF"] = $user[0]["CittaF"];
    $_SESSION["InfoMail"] = $user[0]["InfoMail"];
    $_SESSION["PecMail"] = $user[0]["PecMail"];
    $_SESSION["Fax"] = $user[0]["Fax"];
    $_SESSION["TelefonoF"] = $user[0]["TelefonoF"];
}

function getEmptyArticle(){
    return array("idarticolo" => "", "titoloarticolo" => "", "imgarticolo" => "", "testoarticolo" => "", "anteprimaarticolo" => "", "categorie" => array());
}

function getAction($action){
    $result = "";
    switch($action){
        case 1:
            $result = "Inserisci";
            break;
        case 2:
            $result = "Modifica";
            break;
        case 3:
            $result = "Cancella";
            break;
    }

    return $result;
}

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}

function show_next_page($page_to, $dgb)
{
    if (!$dgb) header($page_to);
}

function show_in_next_page($msg, $page_to, $page_from, $msg_type, $dgb)
{
    $_SESSION["upd"] = true;
    $_SESSION["msg"] = $msg;
    $_SESSION["cur_page"] = $page_to;
    $_SESSION["last_page"] = $page_from;
    $_SESSION["msg_type"] = $msg_type;
    if (!$dgb) header($page_to);
}

function ajax_response($msg, $page_from, $msg_type)
{
    echo json_decode("{

    }");
}

function generate_js_array($phpArray, $propName)
{
    for ($i = 0; $i < sizeof($phpArray); $i++) {
        if ($i == sizeof($phpArray) - 1) echo "\"" . $phpArray[$i][$propName] . "\"";
        else echo "\"" . $phpArray[$i][$propName] . "\",";
    }
}

function generate_js_array_2($phpArray, $propArrName)
{
    for ($i = 0; $i < sizeof($phpArray); $i++) {
        $res = "";
        for ($j = 0; $j < sizeof($propArrName); $j++) {
            if ($j == sizeof($propArrName) - 1) $res .= $phpArray[$i][$propArrName[$j]];
            else  $res .= $phpArray[$i][$propArrName[$j]] . " ";
        }
        if ($i == sizeof($phpArray) - 1) echo "\"" . $res . "\"";
        else echo "\"" . $res . "\",";
    }
}
?>