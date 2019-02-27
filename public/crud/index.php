<?php
/**
 * Liste des Articles
 */

// Configuration de l'application
include_once "config.php";


// Requete de recup de la liste des articles
$query = $db->query("SELECT id, title, content FROM articles");
$results = $query->fetchAll(PDO::FETCH_ASSOC);

// print_r( $results );
?>

<h1>Liste des articles</h1>

<!-- Affiche la liste des article --> 
<?php if ($results): ?>
    <?php foreach($results as $article): ?>
    <h3><?= $article['title'] ?></h3>
    <div>
        <a href="read.php?id=<?= $article['id'] ?>">
            <?php
            $max = 150;
            $strlen = strlen($article['content']);
            echo substr($article['content'],0,$max);
            if ($strlen > $max) {
                echo "...";
            }
            ?>
        </a>
    </div>
    <?php endforeach; ?>
<?php else: ?>
    <div>Aucun article dans la BDD</div>
<?php endif; ?>

<a href="create.php">Ajouter un article</a>