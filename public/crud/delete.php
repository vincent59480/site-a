<?php
/**
 * Suppression d'un article
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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $query = $db->prepare("DELETE FROM articles WHERE id=:id");
    $query->bindValue(':id', $article_id, PDO::PARAM_INT);
    $query->execute();

    header("location: index.php");
    exit;
}


// Récupération de l'article
$query = $db->prepare("SELECT title, content FROM articles WHERE id=:id");
$query->bindValue(':id', $article_id, PDO::PARAM_INT);
$query->execute();

$article = $query->fetch(PDO::FETCH_ASSOC);

?>

<h1>Suppression d'un article</h1>

<?php if ($article == false): ?>
    <div>Aucun article</div>
<?php else: ?>
    <div>Confirmer la suppression de l'article : <strong><?= $article['title'] ?></strong></div>

    <form method="post">
        <button type="button" onclick="window.location.href='read.php?id=<?= $article_id ?>'">Non</button>
        <button type="submit">Oui</button>
    </form>
<?php endif; ?>