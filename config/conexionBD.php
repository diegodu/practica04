<?php
$servename = "localhost";
$username = "root";
$password = "";
$dbname = "practica4";

$conn = new mysqli($servename, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
?>