<?php
/**
 * Modification des données d'un article
 */

// Configuration de l'application
include_once "config.php";


$title = null;
$content = null;
$category_id = null;

// -- AFFICHAGE DE L'ARTICLE DANS LE FORM (pt.1)

//Récupération de l'ID de l'article
$article_id = isset($_GET['id']) ? trim($_GET['id']) : null;

// Test l'ID de l'article
if (empty($article_id)) {
    echo "L'ID de l'article n'est pas défini..";
    exit;
}

// -- TRAITEMENT DU FORM

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


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

        // MAJ de la BDD
        $query = $db->prepare("UPDATE articles SET `title`=:title, `content`=:content, `category_id`=:category_id WHERE id=:id");
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':content', $content, PDO::PARAM_STR);
        $query->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $query->bindValue(':id', $article_id, PDO::PARAM_INT);

        $query->execute();

        header("location: read.php?id=".$article_id);
        exit;

    }
}

// -- AFFICHAGE DE L'ARTICLE DANS LE FORM (pt.2)

// Récupération de l'article
$query = $db->prepare("SELECT title, content, category_id FROM articles WHERE id=:id");
$query->bindValue(':id', $article_id, PDO::PARAM_INT);
$query->execute();

$article = $query->fetch(PDO::FETCH_ASSOC);

if ($article) {
    $title = $article['title'];
    $content = $article['content'];
    $category_id = $article['category_id'];
}

?>

<h1>Modification d'un article</h1>

<?php include_once "form.php" ?>
