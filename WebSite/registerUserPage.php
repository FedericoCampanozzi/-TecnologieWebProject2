<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Account";
$templateParams["titoloHeader"] = "Create yuor Account";
$templateParams["sottotitoloHeader"] = null;
$templateParams["specificTemplate"] = "registration/registerUserForm.php";
$templateParams["modals"] = array("newUser");
$templateParams["usaGrafici"] = false;
$templateParams["usaTabelle"] = false;
$templateParams["IdRuolo"] = 4;
require 'template/base.php';
?>