<?php
//  1. Définition des info de BDD
// nom du serveur de base de donnée
$db_host = "127.0.0.1";
// port de BDD
$db_port ="3306";
//nom de l'utilsateur de la bdd
$db_user ="root";
// mot de passe de l'utilisateur de la BDD
$db_pass="";
// Nom de la BDD
$db_schema="webpizza";

/**
 * 2. connection à la BD
 */
$db_type="mysql";
// $db_info="mysql:host=127.0.0.1;dbname=webpizza";
$db_info= "$db_type:host=$db_host;dbname=$db_schema";

try {
    $db = new PDO($db_info,$db_user,$db_pass);
} catch (PDOException $e) {
    print "Erreur!:".$e->getMessage()."<br>";
    echo __FILE__."a la ligne".__LINE__;
    die();
}

