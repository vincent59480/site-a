<?php
/**
 * Page d'identification
 */

// Ajout de la config
include_once "config.php";

// - Récupération des données du formulaire

// On test la méthode
if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    $isValid = true;

    // Récup des données
    $email          = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password_text  = isset($_POST['password']) ? $_POST['password'] : null;

    // Est ce que un utilisateur correspond à l'adresse $email
    $q = $db->prepare("SELECT id, fullname, email, password FROM users WHERE email=:email");
    $q->bindValue(':email', $email, PDO::PARAM_STR);
    $q->execute();

    $r = $q->fetchAll(PDO::FETCH_ASSOC);


    // Si $r est un tableau vide, => L'UTILISATEUR N'EST PAS ENREGISTRE DANS LA BDD
    if (empty($r)) {
        $isValid = false;
    }

    // Si l'utilisateur a ete trouvé dans la BDD
    // On compare le mot de passe saisi et celui de la BDD
    if ($isValid) 
    {
        if (password_verify( $password_text, $r[0]['password'] )) 
        {
            // Suppression du MDP du resultat de la requete
            unset($r[0]['password']);

            // Ajouter les informations utilisateur dans la $_SESSION
            $_SESSION['user'] = $r[0];

            // Redirige l'utilisateur
            header("location: a.php");
            exit;

        }
        else {
            $isValid = false;
        }
    }

    if (!$isValid) {
        echo "oops, mauvais identifiants....";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
<form method="post" class="container" novalidate>
        <div class="row">
            <div class="col-4 offset-4">
            
                <!-- Champ Email -->
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Votre adresse email">
                </div>

                <!-- Champ Mot de passe -->
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Votre nouveau mot de passe">
                </div>

                <button class="btn btn-success btn-block">Login</button>

                <a href="register.php">Je n'ai pas encore de compte</a><br>
                <a href="forgotten_pwd.php">J'ai oublié mon mot de passe</a>

            </div>
        </div>
    </form>

</body>
</html>