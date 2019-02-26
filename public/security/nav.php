<nav>
    <a href="a.php">A</a>
    <a href="b.php">B</a>
    <a href="c.php">C</a>

    <?php if ( isset($_SESSION['user']) && !empty($_SESSION['user']) ): ?>

    <!-- Menu Utilisateur -->
    <a href="account.php"><?= $_SESSION['user']['fullname'] ?></a>
    <a href="logout.php">Deconnexion</a>

    <?php else: ?>

    <!-- Menu d'identification -->
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>

    <?php endif; ?>
</nav>