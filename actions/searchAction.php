<?php
require 'actions/config.php';


if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $searchTerm = '%' . trim($_GET['search']) . '%';
    $stmt = $conn->prepare("SELECT Id, firstName, email, type FROM users  WHERE firstName LIKE ? OR lastName LIKE ? OR email LIKE ? ORDER BY Id DESC");
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $resultUsers = $stmt->get_result();
} else {
    $resultUsers = $conn->query("SELECT Id, firstName, email, type FROM users ORDER BY Id DESC");
}
