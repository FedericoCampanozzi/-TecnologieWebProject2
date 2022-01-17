<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Homepage";
$templateParams["titoloHeader"] = "Lista Prodotti";
$templateParams["sottotitoloHeader"] = "";
$templateParams["specificTemplate"] = "template\user\listaProdotti.php";
$templateParams["specificNavbar"] = "template\user\userNavbar.php";
$templateParams["modals"] = array("pag","errCar", "ordAnnullato");
$templateParams["usaGrafici"] = false;
$templateParams["usaTabelle"] = false;
require 'template/base.php';
?>