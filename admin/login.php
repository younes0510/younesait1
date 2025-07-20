<?php
session_start();  // Démarrer la session

include '../config.php';  // Inclure la connexion à la base de données

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);  // Hachage du mot de passe (à améliorer en production)

    // Vérifier l'utilisateur dans la base de données
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // L'utilisateur est authentifié
        $_SESSION['username'] = $username;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Younes A. Abdel-Malek</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="max-w-sm mx-auto mt-20 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center mb-4">Connexion</h1>

        <?php if (isset($error)) { echo "<p class='text-red-500 text-center'>$error</p>"; } ?>

        <form method="POST" action="login.php">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <button type="submit" name="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700">Se connecter</button>
        </form>
    </div>

</body>
</html>
