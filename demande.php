<?php
include 'actions/config.php';
include 'actions/demandeAction.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Contact NEXTORA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            background-color: #0b0b0b;
            font-family: Arial, sans-serif;
            color: white;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .form-card {
            background-color: #1f1f1f;
            border: 1px solid #333;
            z-index: 10;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.8);
        }

        input,
        textarea {
            background-color: #292929;
        }

        input:focus,
        textarea:focus {
            background-color: #1e1e1e;
        }
    </style>
</head>

<body>
    <?php
    $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789,?;!@#$%^&*()_+[]{}|;':\",./<>¨?£¤éàèçàâêîôûazertyuiopqsdfghjklmwxcvbn";
    $count = 150;

    echo '<style>
.falling-letter {
    position: absolute;
    color: red;
    font-weight: bold;
    animation: fall linear infinite;
    user-select: none;
    pointer-events: none;
}

@keyframes fall {
    0% {
        transform: translateY(0px) translateX(0px) rotate(0deg);
    }
    100% {
        transform: translateY(300vh) translateX(20px) rotate(360deg);
    }
}
</style>';

    for ($i = 0; $i < $count; $i++) {
        $char = $letters[random_int(0, strlen($letters) - 1)];
        $left = rand(0, 100);
        $top = rand(-200, 0);
        $duration = rand(5, 15);
        $opacity = rand(30, 100) / 100;
        $fontSize = rand(12, 20);

        echo "<div class='falling-letter' style='
        left: {$left}vw;
        top: {$top}px;
        animation-duration: {$duration}s;
        opacity: {$opacity};
        font-size: {$fontSize}px;
    '>{$char}</div>";
    }
    ?>


    <?php include 'includes/navebar.php'; ?>

    <section class="min-h-screen flex items-center justify-center px-4 relative z-10">
        <div class="w-full max-w-2xl form-card rounded-2xl shadow-xl p-8">

            <div class="text-center mb-8">
                <img src="public/NEXTORA.png" alt="NEXTORA" class="mx-auto w-32 mb-4">
                <h1 class="text-3xl font-bold text-red-600">Contactez NEXTORA</h1>
                <p class="text-gray-400 mt-2">Expliquez-nous votre projet, nous vous répondrons rapidement.</p>
            </div>

            <?php if (isset($message)) {
                echo "<p class='mb-4 text-center text-green-500 font-semibold'>$message</p>";
            } ?>

            <form method="POST" action="">
                <div class="space-y-3">
                    <input type="text" name="nom" placeholder="Nom" required class="w-full border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-500">
                    <input type="text" name="prenom" placeholder="Prénom" required class="w-full border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-500">
                    <input type="email" name="email" placeholder="Email" required class="w-full border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-500">
                    <textarea name="demande" placeholder="Votre demande..." required rows="4" class="w-full border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-500"></textarea>
                    <input type="text" name="telephone" placeholder="Téléphone (facultatif)" class="w-full border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-500">
                    <input type="text" name="brend" placeholder="Votre marque / entreprise (facultatif)" class="w-full border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-500">
                </div>

                <button type="submit" name="submit" class="mt-6 w-full bg-red-600 hover:bg-red-700 rounded-xl px-4 py-3 font-bold transition">
                    Envoyer ma demande
                </button>
            </form>
        </div>
    </section>

</body>

</html>