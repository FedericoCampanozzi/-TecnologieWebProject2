<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Pagamento";
$templateParams["titoloHeader"] = "Pagamento";
$templateParams["sottotitoloHeader"] = null;
$templateParams["specificTemplate"] = "template/user/pagamentoForm.php";
$templateParams["modals"] = array("soldi", "errGen");
$templateParams["usaGrafici"] = false;
$templateParams["usaTabelle"] = true;
require 'template/base.php';
?>