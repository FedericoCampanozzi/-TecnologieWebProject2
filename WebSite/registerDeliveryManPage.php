<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Account";
$templateParams["titoloHeader"] = "Create yuor Account";
$templateParams["sottotitoloHeader"] = null;
$templateParams["specificTemplate"] = "registration/registerUserForm.php";
$templateParams["messages"] = array("newUser");
$templateParams["usaGrafici"] = false;
$templateParams["usaTabelle"] = false;
$templateParams["fixedFooter"] = true;
$templateParams["IdRuolo"] = 6;
require 'template/base.php';
?>