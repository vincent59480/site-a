<nav>
 <a href="a.php">Fichier A</a>
 <a href="b.php">Fichier B</a>
 <a href="c.php">Fichier C</a>
 <?php if(isset($_SESSION["name"]) && !empty($_SESSION["name"])):?>
 <a href="d.php">Fichier de déconnection</a>
 <?php endif ?>
</nav>