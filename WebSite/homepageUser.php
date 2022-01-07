<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Homepage";
$templateParams["titoloHeader"] = "Lista Prodotti";
$templateParams["sottotitoloHeader"] = "";
$templateParams["specificTemplate"] = "template\user\listaProdotti.php";
$templateParams["specificNavbar"] = "template\user\userNavbar.php";
$templateParams["checkNotifiche"] = true;
$templateParams["usaGrafici"] = false;
$templateParams["usaTabelle"] = false;
require 'template/base.php';
?>