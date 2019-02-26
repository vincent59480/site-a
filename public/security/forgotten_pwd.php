<?php
/**
 * Page de récup du mot de passe
 */

// Ajout de la config
include_once "config.php";



// - Récupération des données du formulaire

// On test la méthode
if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    // Recup la donnée du formulaire
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;

    // Est ce que l'adresse email existe dans la BDD
    $q = $db->prepare("SELECT id FROM users WHERE email=:email");
    $q->bindValue(':email', $email, PDO::PARAM_STR);
    $q->execute();

    $r = $q->fetchAll(PDO::FETCH_ASSOC);

    // Si l'adresse email a ete trouvée, l'utilisateur existe
    if (!empty($r)) {
        // On demarre le processus de renouvellement de mot de passe

        // Generation du token
        $token = md5( $email.microtime(true) );

        // Association du $token à l'utilisateur
        $q = $db->prepare("UPDATE users SET pwd_token=:token WHERE id=:id");
        $q->bindValue(':token', $token, PDO::PARAM_STR);
        $q->bindValue(':id', $r[0]['id'], PDO::PARAM_INT);
        $q->execute();

        // Generation de l'email
        $url = "http://site-a.local/security/renew_pwd.php?t=".$token;

        // Envois de l'email
        // mail($to, $subject, $body, $header);
        // mail($email, "Renouvellement du MDP", "Bla bla bla\n".$url);

        echo '<a href="'.$url.'">'.$url.'</a>';
        
        exit;
    }

    // Si l'adresse email n'a pas été trouvée, on affiche un message d'erreur
    else {
        echo "Ooops, aucun compte ne correspond à cette adresse email";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgotten Password</title>
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

                <button class="btn btn-success btn-block">Recup le MDP</button>

                <a href="login.php">C'est bon, je me souvient de mon Mot de passe.....</a><br>

            </div>
        </div>
    </form>
</body>
</html>