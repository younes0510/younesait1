<?php

session_start();
include './config.php';

if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];  

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['firstName'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Email ou mot de passe incorrect.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="max-w-md mx-auto mt-20 bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-xl font-bold mb-4 text-center">Connexion</h1>

    <?php if (isset($_GET['success'])) { echo "<p class='text-green-600 mb-4'>Compte créé avec succès. Connecte-toi maintenant.</p>"; } ?>
    <?php if (isset($error)) { echo "<p class='text-red-500 mb-4'>$error</p>"; } ?>

    <form method="POST" action="login.php">
        <input type="email" name="email" placeholder="Email" required class="mb-4 w-full border rounded px-3 py-2">
        <input type="password" name="password" placeholder="Mot de passe" required class="mb-6 w-full border rounded px-3 py-2">
        <button type="submit" name="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
            Se connecter
        </button>
    </form>

    <p class="mt-4 text-sm text-center">
        Pas encore inscrit ? <a href="register.php" class="text-indigo-600 hover:underline">Créer un compte</a>
    </p>
</div>
</body>
</html>
