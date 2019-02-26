<?php

// Demarrer la session PHP
session_start();

// Les données de l'utilisateur identifié, seront stockées dans l'index
// $_SESSION['user']


// Connexion à la BDD
try {
    $db = new PDO('mysql:host=127.0.0.1;port=3306;dbname=webpizza;charset=utf8', 'root', '');
} catch( PDOException $e ) {
    echo $e->getMessage();
    die();
}