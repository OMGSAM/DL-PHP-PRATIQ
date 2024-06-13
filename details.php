<?php
// details.php
require 'conxDB.php';

if (isset($_GET['codeIns'])) {
    $codeIns = $_GET['codeIns'];
    
    $stmt = $conn->prepare("SELECT * FROM inscription WHERE codeIns = :codeIns");
    $stmt->bindParam(':codeIns', $codeIns);
    $stmt->execute();
    $details = $stmt->fetch();
}
?>
<table>
    <tr><td>Date de Voyage:</td><td><?php echo $details['dateVoy']; ?></td></tr>
    <tr><td>Ville de Départ:</td><td><?php echo $details['villeD']; ?></td></tr>
    <tr><td>Ville d'Arrivée:</td><td><?php echo $details['villeA']; ?></td></tr>
    <tr><td>Heure de Départ:</td><td><?php echo $details['heureDepart']; ?></td></tr>
    <tr><td>Heure d'Arrivée:</td><td><?php echo $details['heureArrivee']; ?></td></tr>
</table>
