<?php
// listeIns.php
session_start();
require 'conxDB.php';

if (!isset($_SESSION['user'])) {
    header("Location: connEmp.php");
    exit;
}

$employee = $_SESSION['user'];
$dateVoy = $_POST['dateVoy'] ?? '';

$stmt = $conn->prepare("SELECT * FROM inscription WHERE employee = :employee AND dateVoy LIKE :dateVoy");
$stmt->bindParam(':employee', $employee);
$stmt->bindParam(':dateVoy', $dateVoy);
$stmt->execute();
$inscriptions = $stmt->fetchAll();
?>
<form method="POST" action="">
    Filter by Date: <input type="date" name="dateVoy">
    <input type="submit" value="Filter">
</form>
<table>
    <tr>
        <th>Code d'inscription</th>
        <th>Date de Voyage</th>
        <th>Nombre de Personnes</th>
        <th>Total à Payer</th>
    </tr>
    <?php foreach ($inscriptions as $inscription): ?>
    <tr>
        <td><?php echo $inscription['codeIns']; ?></td>
        <td><?php echo $inscription['dateVoy']; ?></td>
        <td><?php echo $inscription['nbrePers']; ?></td>
        <td><?php echo $inscription['totalPayer']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
