<?php
session_start();
include './actions/config.php';

if (!isset($_SESSION['user_Id'])) {
    header("Location: index.php");
    exit();
}
require 'actions/searchdemandAction.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['demande_Id'], $_POST['nouveau_type'])) {
    $demandeId = intval($_POST['demande_Id']);
    $nouveauType = $_POST['nouveau_type'];

    if (in_array($nouveauType, ['en-cours', 'archivé', 'terminé'])) {
        $stmt = $conn->prepare("UPDATE demandes SET type = ? WHERE Id = ?");
        $stmt->bind_param("si", $nouveauType, $demandeId);
        $stmt->execute();

        header("Location: demandes.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>demandes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white min-h-screen">
    <div class="flex">
        <?php include 'includes/menu.php'; ?>
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-6">Liste des demandes</h1>

            <!-- Formulaire de recherche -->
            <form method="GET" class="mb-6 flex flex-wrap gap-4 items-center justify-end">
                <input type="search" name="search" placeholder="Rechercher une demande..."
                    value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>"
                    class="border border-gray-300 px-4 py-2 rounded-lg w-64 text-black" />
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                    Rechercher
                </button>
            </form>

            <!-- Tableau -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <table class="w-full table-auto text-left">
                    <thead>
                        <tr class="bg-[#3b82f6] text-white">
                            <th class="px-4 py-2">Nom</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">brend</th>
                            <th class="px-4 py-2">voir</th>
                            <th class="px-4 py-2">statut</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($resultUsers && $resultUsers->num_rows > 0): ?>
                            <?php while ($row = $resultUsers->fetch_assoc()): ?>
                                <tr class="border-b border-gray-700">
                                    <td class="px-4 py-2"><?= htmlspecialchars($row['nom']); ?></td>
                                    <td class="px-4 py-2"><?= htmlspecialchars($row['email']); ?></td>
                                    <td class="px-4 py-2">
                                        <?= htmlspecialchars($row['brend']); ?>
                                    </td>
                                    <td class="px-4 py-2">
                                        <a href="voir-demande.php?Id=<?= $row['Id']; ?>" class="text-blue-500 hover:underline"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td class="px-4 py-2">
                                        <form method="POST" action="" class="flex items-center">
                                            <input type="hidden" name="demande_Id" value="<?= $row['Id']; ?>">
                                            <select name="nouveau_type" class="bg-gray-700 text-white px-2 py-1 rounded">
                                                <option value="en-cours" <?= ($row['type'] === 'en-cours') ? 'selected' : ''; ?>>En cours</option>
                                                <option value="terminé" <?= ($row['type'] === 'terminé') ? 'selected' : ''; ?>>Terminé</option>
                                                <option value="archivé" <?= ($row['type'] === 'archivé') ? 'selected' : ''; ?>>Archivé</option>
                                            </select>
                                            <button type="submit" class="ml-2 bg-green-600 px-3 py-1 rounded hover:bg-green-700">
                                                Valider
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-gray-400 py-4">Aucun demande trouvé.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>