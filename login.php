<?php

include './actions/config.php';
include './actions/loginAction.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-indigo-700">Connexion</h1>

        <?php if (isset($error)) : ?>
            <p class="mb-4 text-red-600 text-sm text-center"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" required
                       class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring focus:ring-indigo-200">
            </div>
            <div>
                <label class="block text-gray-700">Mot de passe</label>
                <input type="password" name="password" required
                       class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring focus:ring-indigo-200">
            </div>
            <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">
                Se connecter
            </button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-4">
            Pas encore inscrit ?
            <a href="register.php" class="text-indigo-600 hover:underline">Créer un compte</a>
        </p>
    </div>

</body>
</html>
