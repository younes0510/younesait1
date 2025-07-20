<?php
session_start();
include '../config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$messages = $conn->query("SELECT * FROM messages ORDER BY date_envoi DESC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Younes A. Abdel-Malek</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="max-w-7xl mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Messages des Visiteurs</h1>
            <a href="logout.php" class="text-indigo-600 hover:text-indigo-800">Se déconnecter</a>
        </div>

        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="border-b">
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nom</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Message</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while($message = $messages->fetch_assoc()): ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm"><?= $message['id'] ?></td>
                        <td class="px-4 py-2 text-sm"><?= htmlspecialchars($message['nom']) ?></td>
                        <td class="px-4 py-2 text-sm"><?= htmlspecialchars($message['email']) ?></td>
                        <td class="px-4 py-2 text-sm"><?= htmlspecialchars($message['message']) ?></td>
                        <td class="px-4 py-2 text-sm"><?= $message['date_envoi'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
