<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()) header("Location: index.php");
$templateParams["titolo"] = "Dettaglio";
$templateParams["titoloHeader"] = "Dettaglio Prodotto";
$templateParams["sottotitoloHeader"] = null;
$templateParams["specificTemplate"] = "template/user/productDetailsForm.php";
$templateParams["usaGrafici"] = false;
$templateParams["usaTabelle"] = false;
require 'template/base.php';
?>