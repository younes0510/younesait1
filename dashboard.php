<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="max-w-3xl mx-auto mt-20 bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Bienvenue, <?= htmlspecialchars($_SESSION['user_name']) ?> 👋</h1>
    <p class="mb-4">Tu es connecté avec succès.</p>
    <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Se déconnecter</a>
</div>
</body>
</html>
