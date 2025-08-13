<?php
require 'actions/config.php';

if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $searchTerm = '%' . trim($_GET['search']) . '%';
    $stmt = $conn->prepare("SELECT Id, nom, email, brend, type FROM demandes  WHERE nom LIKE ? OR email LIKE ? OR brend LIKE ?  ORDER BY FIELD(type, 'en-cours', 'terminé', 'archivé'), Id DESC ");
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $resultUsers = $stmt->get_result();
} else {
    $resultUsers = $conn->query("SELECT * FROM demandes ORDER BY FIELD(type, 'en-cours', 'terminé', 'archivé'), Id DESC ");
}
