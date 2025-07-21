<?php
include './config.php';

if (isset($_POST['submit'])) {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Cet email est déjà utilisé.";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);
        $stmt->execute();
        header("Location: login.php?success=1");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un compte</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="max-w-md mx-auto mt-20 bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-xl font-bold mb-4 text-center">Créer un compte</h1>

    <?php if (isset($error)) { echo "<p class='text-red-500 mb-4'>$error</p>"; } ?>

    <form method="POST" action="register.php">
        <input type="text" name="firstName" placeholder="Prénom" required class="mb-4 w-full border rounded px-3 py-2">
        <input type="text" name="lastName" placeholder="Nom" required class="mb-4 w-full border rounded px-3 py-2">
        <input type="email" name="email" placeholder="Email" required class="mb-4 w-full border rounded px-3 py-2">
        <input type="password" name="password" placeholder="Mot de passe" required class="mb-6 w-full border rounded px-3 py-2">
        <button type="submit" name="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
            S'inscrire
        </button>
    </form>
    <p class="mt-4 text-sm text-center">
        Déjà inscrit ? <a href="login.php" class="text-indigo-600 hover:underline">Connexion</a>
    </p>
</div>
</body>
</html>
