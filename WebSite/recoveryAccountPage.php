<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "E-Plant Login";
$templateParams["titoloHeader"] = "<strong>Welcome</strong> in E-Plant";
$templateParams["sottotitoloHeader"] = "the best flower and plant e-commerce";
$templateParams["specificTemplate"] = "recoveryAccountForm.php";
$templateParams["checkNotifiche"] = true;
$templateParams["usaGrafici"] = false;
$templateParams["usaTabelle"] = false;
require 'template/base.php';
?>