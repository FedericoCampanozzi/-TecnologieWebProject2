<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "E-Plant Login";
$templateParams["titoloHeader"] = "<strong>Welcome</strong> in E-Plant";
$templateParams["sottotitoloHeader"] = "the best flower and plant e-commerce";
$templateParams["specificTemplate"] = "loginForm.php";
$templateParams["modals"] = array("pswErr", "userErr", "accRec");
$templateParams["usaGrafici"] = false;
$templateParams["usaTabelle"] = false;
require 'template/base.php';
?>