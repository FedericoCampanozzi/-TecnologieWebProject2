<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()) header("Location: index.php");
$templateParams["titolo"] = "Homepage";
$templateParams["titoloHeader"] = "Homepage Delivery Man";
$templateParams["sottotitoloHeader"] = "";
$templateParams["specificTemplate"] = "template/deliveryMan/deliveryManTabs.php";
$templateParams["specificNavbar"] = null;
$templateParams["checkNotifiche"] = true;
$templateParams["usaGrafici"] = true;
$templateParams["usaTabelle"] = true;
require 'template/base.php';
?>