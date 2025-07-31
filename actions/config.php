<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$host = "localhost";
$user = "root";
$password = "";
$dbname = "younes";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
