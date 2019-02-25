<?php
include_once "config.php";
include_once "menu.php";

if(isset($_SESSION["test"])){
    unset($_SESSION["test]"]);
}



?>
<h1>Fichier C</h1>
Bonjour <?= $_SESSION["name"]?>
