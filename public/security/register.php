<?php
/**
 * Page d'inscription
 */

// Ajout de la config
include_once "config.php";

$firstname = null;
$lastname = null;
$email = null;

// - Récupération des données du formulaire

// On test la méthode
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $isValid = true;

    // Récupération des données 
    $firstname      = isset($_POST['firstname']) ? trim($_POST['firstname']) : null;
    $lastname       = isset($_POST['lastname']) ? trim($_POST['lastname']) : null;
    $email          = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password_text  = isset($_POST['password']) ? $_POST['password'] : null;
    $password_hash  = password_hash($password_text, PASSWORD_DEFAULT);
    // http://php.net/manual/fr/function.password-hash.php
    

    // Controle du formulaire
    // if (xxxx) {
    //     $isValid = false;
    // }


    // Verification de l'unicité de l'utilisateur
    $q = $db->prepare("SELECT id FROM users WHERE email=:email");
    $q->bindValue(':email', $email, PDO::PARAM_STR);
    $q->execute();
    
    $r = $q->fetchAll();

    // Si $r contient au moins un résultat, on stop le processus d'inscription
    if (!empty($r)) {
        $isValid = false;
    }


    // Enregistrement des données dans la BDD
    if ($isValid) {
        // Préparation de la requete
        $q = $db->prepare("INSERT INTO users (`firstname`, `lastname`, `email`, `password`) 
                                 VALUES (:firstname , :lastname , :email , :password)");
        $q->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $q->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $q->bindValue(':email', $email, PDO::PARAM_STR);
        $q->bindValue(':password', $password_hash, PDO::PARAM_STR);

        // Execution de la requete
        $r = $q->execute();

        // Si la requete est un succès
        if ($r) { // $r === true
            header("location: login.php");
            exit;
        }
        else {
            echo "oops, les données n'ont pas été enregistrées dans la BDD !";
            exit;
        }
    }
    else {
        echo "oops, erreur sur le form !";
        // exit;
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
    <form method="post" class="container" novalidate>
        <div class="row">
            <div class="col-4 offset-4">
            
                <!-- Champ Prénom -->
                <div class="form-group">
                    <input class="form-control" type="text" name="firstname" placeholder="Votre Prénom" value="<?= $firstname ?>">
                </div>

                <!-- Champ NOM -->
                <div class="form-group">
                    <input class="form-control" type="text" name="lastname" placeholder="Votre Nom" value="<?= $lastname ?>">
                </div>

                <!-- Champ Email -->
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Votre adresse email" value="<?= $email ?>">
                </div>

                <!-- Champ Mot de passe -->
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Votre nouveau mot de passe">
                </div>

                <button class="btn btn-success btn-block">Valider</button>

                <a href="login.php">J'ai deja un compte</a>

            </div>
        </div>
    </form>

</body>
</html>