<?php
/**
 * Lecture d'un article
 */

// Configuration de l'application
include_once "config.php";

//Récupération de l'ID de l'article
$article_id = isset($_GET['id']) ? trim($_GET['id']) : null;

// Test l'ID de l'article
if (empty($article_id)) {
    echo "L'ID de l'article n'est pas défini..";
    exit;
}

// Récupération de l'article
$query = $db->prepare("SELECT  t1.title AS title,  t1.content AS content,  t2.name AS categ FROM  articles AS t1 INNER JOIN categories AS t2 ON t2.id=t1.category_id WHERE  t1.id=:id");
$query->bindValue(':id', $article_id, PDO::PARAM_INT);
$query->execute();

$article = $query->fetch(PDO::FETCH_ASSOC);
?>

<h1>Lecture d'un article</h1>

<!-- Test le résultat de la BDD -->
<?php if ($article == false): ?>
    <div>Aucun article</div>
<?php else: ?>
    <h2><?= $article['title'] ?></h2>
    <div>Categorie : <?= $article['categ'] ?></div>
    <div><?= $article['content'] ?></div>

    <hr>
    <a href="update.php?id=<?= $article_id ?>">Modifier l'article</a><br>
    <a href="delete.php?id=<?= $article_id ?>">Supprimer l'article</a><br>
<?php endif; ?>
