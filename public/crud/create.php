<?php
/**
 * Formulaire de création d'un article
 */

// Configuration de l'application
include_once "config.php";

$title = null;
$content = null;
$category_id = null;

// Traitement du formulaire de création de l'article
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $isValid = true;

    // Récupération des données
    $title          = isset($_POST['title']) ? trim($_POST['title']) : null;
    $content        = isset($_POST['content']) ? trim($_POST['content']) : null;
    $category_id    = isset($_POST['category']) ? trim($_POST['category']) : null;

    // Controle des données
    // if (valeur pas OK) {
    //     $isValid = false;
    // }

    if ($isValid) {

        // Ajout des données à la BDD
        $query = $db->prepare("INSERT INTO articles (`title`, `content`, `category_id`) 
                                             VALUES (:title , :content , :category_id)");
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':content', $content, PDO::PARAM_STR);
        $query->bindValue(':category_id', $category_id, PDO::PARAM_INT);

        $query->execute();

        // Récupération de la derniere clé primaire crée par l'instance de PDO
        $article_id = $db->lastInsertId();

        // Redirige l'utilisateur vers la page de l'article 
        header("location: read.php?id=".$article_id);
        exit;
    }


    print_r( $_POST );

}

?>

<h1>Création d'un article</h1>

<?php include_once "form.php" ?>