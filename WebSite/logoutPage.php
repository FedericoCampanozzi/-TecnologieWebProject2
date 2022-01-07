<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Logout";
$templateParams["titoloHeader"] = "Grazie e Arrivederci";
$templateParams["sottotitoloHeader"] = null;
$templateParams["specificTemplate"] = "template/logoutForm.php";
$templateParams["checkNotifiche"] = false;
$templateParams["usaGrafici"] = false;
$templateParams["usaTabelle"] = false;
require 'template/base.php';
$_SESSION = array();
session_destroy();
?>