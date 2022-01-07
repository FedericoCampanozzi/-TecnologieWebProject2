<?php
session_start();
define("UPLOAD_USER_DIR", "./upload/user-profile/");
define("UPLOAD_PRODUCT_DIR", "./upload/product/");
require_once("utils/enum.php");
require_once("utils/msgTypeClass.php");
require_once("utils/functions.php");
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "plant", 3306);
?>