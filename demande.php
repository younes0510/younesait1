<?php
include './config.php';

if (isset($_POST['submit'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $demande = htmlspecialchars($_POST['demande']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $brend = htmlspecialchars($_POST['brend']);

    $stmt = $conn->prepare("INSERT INTO demandes (nom, prenom, email, demande, telephone, brend) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nom, $prenom, $email, $demande, $telephone, $brend);

    if ($stmt->execute()) {
        $message = "Votre demande a bien été envoyée.";
    } else {
        $message = "Erreur lors de l'envoi.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Envoyer une demande</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="max-w-lg mx-auto bg-white p-6 mt-10 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Envoyer une demande</h1>

        <?php if (isset($message)) {
            echo "<p class='mb-4 text-green-600'>$message</p>";
        } ?>

        <form method="POST" action="">
            <input type="text" name="nom" placeholder="Nom" required class="w-full border mb-4 px-3 py-2 rounded">
            <input type="text" name="prenom" placeholder="Prénom" required class="w-full border mb-4 px-3 py-2 rounded">
            <input type="email" name="email" placeholder="Email" required class="w-full border mb-4 px-3 py-2 rounded">
            <textarea name="demande" placeholder="Votre demande..." required class="w-full border mb-4 px-3 py-2 rounded"></textarea>
            <input type="text" name="telephone" placeholder="Téléphone" class="w-full border mb-4 px-3 py-2 rounded">
            <input type="text" name="brend" placeholder="Brend (facultatif)" class="w-full border mb-4 px-3 py-2 rounded">
            <button type="submit" name="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Envoyer
            </button>
        </form>
    </div>

</body>

</html>