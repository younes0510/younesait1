<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_Id'])) {
    $user_Id = intval($_POST['user_Id']);

    $query = "SELECT Id FROM users WHERE Id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_Id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $delete_query = "DELETE FROM users WHERE Id = ?";
        $delete_stmt = $conn->prepare($delete_query);
        $delete_stmt->bind_param("i", $user_Id);

        if ($delete_stmt->execute()) {
            header("Location: utilisateurs.php");
            exit();
        } else {
            echo "Erreur lors de la suppression.";
        }
        $delete_stmt->close();
    } else {
        echo "Utilisateur introuvable.";
    }
    $stmt->close();
} else {
    echo "Requête invalide.";
}
