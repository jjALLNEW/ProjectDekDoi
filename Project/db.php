<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobboard"; // หรือชื่อ db ของน้อง

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
