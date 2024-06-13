<?php
// dashboard.php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: connEmp.php");
    exit;
}
?>
<p>Welcome, <?php echo $_SESSION['user']; ?>!</p>
<ul>
    <li><a href="Sinscrire.php">S’inscrire</a></li>
    <li><a href="listeIns.php">Liste de Voyages</a></li>
    <li><a href="logout.php">Se déconnecter</a></li>
</ul>
