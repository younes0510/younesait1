<?php

include 'actions/config.php';

if (!isset($_SESSION['user_Id'])) {
    header("Location: index.php");
    exit();
}

$countResult = $conn->query("SELECT COUNT(*) AS total FROM demandes");
$countData = $countResult->fetch_assoc();

$countUsers = $conn->query("SELECT COUNT(*) AS total FROM users");
$countUsersData = $countUsers->fetch_assoc();


$result = $conn->query("SELECT * FROM demandes ORDER BY FIELD(type, 'en-cours', 'terminé', 'archivé'), Id DESC  LIMIT 5 ");
$resultUsers = $conn->query("SELECT firstName, email, type FROM users ORDER BY id DESC LIMIT 5");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-black text-white flex">

    <?php include 'includes/menu.php'; ?>

    <main class="flex-1 p-10">
        <div class="bg-white shadow rounded-lg p-6 mb-6 text-black">
            <h1 class="text-2xl font-bold">
                Salut, <?php echo htmlspecialchars($_SESSION['user_firstName']); ?>
            </h1>
            <p class="text-gray-600 mt-2">
                Bienvenue dans ton tableau de bord.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-indigo-500 text-white p-6 rounded-lg shadow-lg">
                <h2 class="text-lg font-bold">Total des demandes</h2>
                <p class="text-3xl mt-2"><?php echo $countData['total']; ?></p>
            </div>
            <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg">
                <h2 class="text-lg font-bold">Utilisateurs</h2>
                <p class="text-3xl mt-2"><?php echo $countUsersData['total']; ?></p>
            </div>

        </div>
        <div class="flex flex-col lg:flex-row lg:space-x-6 space-y-6 lg:space-y-0">


            <div class="bg-gray-800 text-white shadow rounded-lg p-6 w-full lg:w-1/2">
                <h2 class="text-xl font-bold mb-4">Dernières demandes</h2>
                <table class="w-full table-auto text-left">
                    <thead>
                        <tr class="bg-red-500 text-white">
                            <th class="px-4 py-2">Nom</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr class="border-b border-gray-700">
                                    <td class="px-4 py-2"><?php echo htmlspecialchars($row['nom']); ?></td>
                                    <td class="px-4 py-2"><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td class="px-4 py-2"><?php echo htmlspecialchars($row['type']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="px-4 py-2 text-center text-gray-400">
                                    Aucune demande trouvée.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>


            <div class="bg-gray-800 text-white shadow rounded-lg p-6 w-full lg:w-1/2">
                <h2 class="text-xl font-bold mb-4">Utilisateurs</h2>
                <table class="w-full table-auto text-left">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="px-4 py-2">Nom</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($resultUsers && $resultUsers->num_rows > 0): ?>
                            <?php while ($row = $resultUsers->fetch_assoc()): ?>
                                <tr class="border-b border-gray-700">
                                    <td class="px-4 py-2"><?php echo htmlspecialchars($row['firstName']); ?></td>
                                    <td class="px-4 py-2"><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td class="px-4 py-2"><?php echo htmlspecialchars($row['type']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="px-4 py-2 text-center text-gray-400">
                                    Aucun utilisateur trouvé.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>

    </main>
</body>

</html>