<?php
// Sinscrire.php
session_start();
require 'conxDB.php';

if (!isset($_SESSION['user'])) {
    header("Location: connEmp.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $villeD = $_POST['villeD'];
    $villeA = $_POST['villeA'];
    $dateVoy = $_POST['dateVoy'];
    $nbrePers = $_POST['nbrePers'];
    
    $stmt = $conn->prepare("INSERT INTO inscription (villeD, villeA, dateVoy, nbrePers) VALUES (:villeD, :villeA, :dateVoy, :nbrePers)");
    $stmt->bindParam(':villeD', $villeD);
    $stmt->bindParam(':villeA', $villeA);
    $stmt->bindParam(':dateVoy', $dateVoy);
    $stmt->bindParam(':nbrePers', $nbrePers);
    $stmt->execute();
    
    echo "Inscription réussie";
}

// Fetch cities for dropdown
$cities = $conn->query("SELECT DISTINCT ville FROM voyages")->fetchAll();
?>
<form method="POST" action="">
    Ville de départ: 
    <select name="villeD">
        <?php foreach ($cities as $city): ?>
            <option value="<?php echo $city['ville']; ?>"><?php echo $city['ville']; ?></option>
        <?php endforeach; ?>
    </select>
    Ville d'arrivée: 
    <select name="villeA">
        <?php foreach ($cities as $city): ?>
            <option value="<?php echo $city['ville']; ?>"><?php echo $city['ville']; ?></option>
        <?php endforeach; ?>
    </select>
    Date de voyage: <input type="date" name="dateVoy" required>
    Nombre de personnes: <input type="number" name="nbrePers" required>
    <input type="submit" value="S'inscrire">
</form>
