<?php
session_start();
require 'actions/config.php';

if (!isset($_SESSION['user_Id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['Id']) || empty($_GET['Id'])) {
    die("Aucune demande sélectionnée.");
}

$demande_Id = intval($_GET['Id']);

$stmt = $conn->prepare("SELECT * FROM demandes WHERE Id = ?");
$stmt->bind_param("i", $demande_Id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Aucune demande trouvée.");
}

$demande = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Voir la demande</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-900 via-black to-gray-800 text-white min-h-screen flex">

    <?php include 'includes/menu.php'; ?>

    <main class="flex-1 p-8 flex justify-center items-center">
        <div class="w-full max-w-3xl bg-blue-500 text-gray-900 shadow-2xl rounded-xl p-8">
            <h1 class="text-3xl font-extrabold border-b pb-4 mb-6 text-black">
                Détails de la demande #<?= htmlspecialchars($demande['Id']) ?>
            </h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border">
                    <p class="text-sm text-black">Nom</p>
                    <p class="font-semibold"><?= htmlspecialchars($demande['nom']) ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border">
                    <p class="text-sm text-black">Email</p>
                    <p class="font-semibold"><?= htmlspecialchars($demande['email']) ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border">
                    <p class="text-sm text-black">Téléphone</p>
                    <p class="font-semibold"><?= htmlspecialchars($demande['telephone']) ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border">
                    <p class="text-sm text-black">Brend</p>
                    <p class="font-semibold"><?= htmlspecialchars($demande['brend']) ?></p>
                </div>
            </div>

            <div class="mt-6">
                <p class="text-sm text-black mb-2">Message</p>
                <div class="bg-gray-50 border rounded-lg p-5 shadow-sm">
                    <?= nl2br(htmlspecialchars($demande['demande'])) ?>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <a href="demandes.php"
                    class="px-5 py-2 bg-black text-white font-medium rounded-lg shadow hover:bg-gray-800 transition">
                    Retour à la liste
                </a>
            </div>
        </div>
    </main>

</body>

</html>