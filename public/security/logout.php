<?php

include_once "config.php";

// Desctruction de la lsession
session_destroy();

// Redirection de l'utilisateur
header("location: a.php");
exit;