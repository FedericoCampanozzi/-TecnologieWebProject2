<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()) header("Location: index.php");
$templateParams["titolo"] = "Homepage";
$templateParams["titoloHeader"] = "Profilo Utente";
$templateParams["sottotitoloHeader"] = null;
$templateParams["specificTemplate"] = "template\user\usrTabs.php";
$templateParams["specificNavbar"] = "template\user\userNavbar.php";
$templateParams["modals"] = array("datiAgg","pswErr","ImgAgg","denaro", "address", "card");
$templateParams["usaGrafici"] = false;
$templateParams["usaTabelle"] = true;
require 'template/base.php';
?>