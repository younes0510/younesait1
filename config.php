<?php
$host = "localhost"; // Hôte de la base de données
$user = "root"; // Utilisateur de la base de données
$password = ""; // Mot de passe
$dbname = "portfolio"; // Nom de la base de données

// Connexion à la base de données
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
