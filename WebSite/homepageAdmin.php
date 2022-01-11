<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Admin Page";
$templateParams["titoloHeader"] = "Admin Dashboard";
$templateParams["sottotitoloHeader"] = "";
$templateParams["specificTemplate"] = "template/adminDashboard.php";
$templateParams["specificNavbar"] = null;
$templateParams["checkNotifiche"] = true;
$templateParams["modals"] = array("cambio", "nuovoFornitore");
$templateParams["usaGrafici"] = true;
$templateParams["usaTabelle"] = true;
require 'template/base.php';
?>