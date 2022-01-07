<?php
require_once '../bootstrap.php';
$dbg = false;
if($dbg){
    var_dump($_SESSION);
    ?> <br> <br> <br> <?php
    var_dump($_REQUEST);
}
$obj = $_REQUEST["codiceDelete"];
switch($obj){
    case("riga_carrello"):
        $dbh->delete_rc($_REQUEST["product_id"], $_SESSION["IdUtente"]);
        break;
    default : die("codice inserimento non trovato");
    break;
}
?>