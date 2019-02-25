<?php
include_once "config.php";
if(isset($_SESSION["name"])){
    unset($_SESSION["name"]);
}
header("location: a.php");
$fp=fopen("data.txt","w");
fwrite($fp,"on ecrit le fichier");
fclose($fp);