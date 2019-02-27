<?php
/**
 * Fichier de configuration de l'app
 */

// Connexion à la BDD
try {
    $db = new PDO("mysql:host=127.0.0.1;port=3306;dbname=site_a;charset=utf8", "root", "myosw3sql");
} catch (PDOExecption $e) {
    echo $e->getMessage();
    die;
}