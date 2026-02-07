<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>

<h1>Welcome Dashboard</h1>
<a href="logout.php">Logout</a>
