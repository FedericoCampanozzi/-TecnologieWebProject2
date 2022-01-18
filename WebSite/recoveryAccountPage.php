<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "E-Plant Login";
$templateParams["titoloHeader"] = "Recupera il tuo Account";
$templateParams["sottotitoloHeader"] = null;
$templateParams["specificTemplate"] = "recoveryAccountForm.php";
$templateParams["modals"] = array("usrErr");
$templateParams["usaGrafici"] = false;
$templateParams["usaTabelle"] = false;
require 'template/base.php';
?>