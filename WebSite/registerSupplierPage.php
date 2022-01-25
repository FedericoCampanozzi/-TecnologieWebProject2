<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Account";
$templateParams["titoloHeader"] = "Create yuor Account";
$templateParams["sottotitoloHeader"] = null;
$templateParams["specificTemplate"] = "registration/registerSupplierForm.php";
$templateParams["modals"] = array("newUser");
$templateParams["usaGrafici"] = false;
$templateParams["usaTabelle"] = false;
require 'template/base.php';
?>