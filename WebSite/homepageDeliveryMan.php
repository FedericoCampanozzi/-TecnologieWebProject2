<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Homepage";
$templateParams["titoloHeader"] = "Homepage Delivery Man";
$templateParams["sottotitoloHeader"] = "";
$templateParams["specificTemplate"] = "template/deliveryMan/deliveryManTabs.php";
$templateParams["specificNavbar"] = null;
$templateParams["checkNotifiche"] = true;
$templateParams["usaGrafici"] = true;
$templateParams["usaTabelle"] = true;
$templateParams["fixedFooter"] = true;
require 'template/base.php';
?>