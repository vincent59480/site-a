<?php
/**
 * Formulaire commun aux parties :
 * - Create
 * - Update
 */

// Récupération de la liste des catégories depuis la BDD
$categ_query = $db->query("SELECT id, name FROM categories ORDER BY name ASC");
$categ_results = $categ_query->fetchAll(PDO::FETCH_ASSOC);
?>

<form method="post">

    <div>
        <label for="title">Titre de l'article</label><br>
        <input type="text" name="title" id="title" placeholder="Titre de l'article" value="<?= $title ?>">
    </div>

    <div>
        <label for="content">Contenu de l'article</label><br>
        <textarea name="content" id="content" cols="30" rows="10"><?= $content ?></textarea>
    </div>

    <div>
        <label for="category">Catégorie de l'article</label><br>
        <select name="category" id="category">
        <!-- Boucle sur la liste $categ_results  -->
        <?php foreach($categ_results as $categ): ?>
            <option value="<?= $categ['id'] ?>" <?= ($category_id == $categ['id'] ? "selected" : null) ?>>
                <?= $categ['name'] ?>
            </option>
        <?php endforeach; ?>
        </select>
    </div>

    <button type="submit">Valider</button>

</form>