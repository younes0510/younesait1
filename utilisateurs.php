<?php

include './actions/config.php';


if (!isset($_SESSION['user_Id'])) {
    header("Location: index.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'], $_POST['nouveau_type'])) {
    $userId = intval($_POST['user_id']);
    $nouveauType = $_POST['nouveau_type'];

    if (in_array($nouveauType, ['admin', 'employe'])) {
        $stmt = $conn->prepare("UPDATE users SET type = ? WHERE Id = ?");
        $stmt->bind_param("si", $nouveauType, $userId);
        $stmt->execute();

        header("Location: utilisateurs.php");
        exit();
    }
}


$resultUsers = $conn->query("SELECT Id, firstName, email, type FROM users ORDER BY Id DESC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Utilisateurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen">
    <div class="flex">

        <?php include 'includes/menu.php'; ?>

       
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-6">Liste des utilisateurs</h1>

            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <table class="w-full table-auto text-left">
                    <thead>
                        <tr class="bg-[#3b82f6] text-white">
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
                                   
                                    <td class="px-4 py-2">
                                        <form method="POST" action="" class="flex items-center">
                                            <input type="hidden" name="user_id" value="<?php echo $row['Id']; ?>">
                                            <select name="nouveau_type" class="bg-gray-700 text-white px-2 py-1 rounded">
                                                <option value="admin" <?php if ($row['type'] === 'admin') echo 'selected'; ?>>Admin</option>
                                                <option value="employe" <?php if ($row['type'] === 'employe') echo 'selected'; ?>>Employé</option>
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
                                <td colspan="4" class="text-center text-gray-400 py-4">
                                    Aucun utilisateur trouvé.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
