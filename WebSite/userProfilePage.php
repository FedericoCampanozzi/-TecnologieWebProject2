<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Homepage";
$templateParams["titoloHeader"] = "Profilo Utente";
$templateParams["sottotitoloHeader"] = null;
$templateParams["specificTemplate"] = "template\user\usrTabs.php";
$templateParams["specificNavbar"] = "template\user\userNavbar.php";
$templateParams["modals"] = array("datiAgg","pswErr");
$templateParams["usaGrafici"] = false;
$templateParams["usaTabelle"] = true;
require 'template/base.php';
?>