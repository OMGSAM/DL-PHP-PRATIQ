<?php
// connEmp.php
session_start();
require 'conxDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    
    $stmt = $conn->prepare("SELECT * FROM employees WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':password', $pwd);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
    } else {
        echo "Invalid credentials";
    }
}
?>
<form method="POST" action="">
    Username: <input type="text" name="user" required>
    Password: <input type="password" name="pwd" required>
    <input type="submit" value="Login">
</form>
