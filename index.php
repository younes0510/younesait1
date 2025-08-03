<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>NEXTORA - Younes A. Abdel-Malek</title> 
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

       

        .content {
            position: relative;
            z-index: 10;
        }
    </style>
</head>
<body>
 <?php
$letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789,?;!@#$%^&*()_+[]{}|;':\",./<>¨?£¤éàèçàâêîôû";
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
        transform: translateY(120vh) translateX(20px) rotate(360deg);
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

<script>
 
    document.addEventListener('DOMContentLoaded', () => {
        const titleText = "Younes Ait Abdel-Malek";
        const paragraphText = "Développeur Web Full-Stack spécialisé en PHP, MySQL, JavaScript, MongoDB, React et Next.js. Je conçois des sites modernes, performants et adaptés aux besoins de chaque client.";

        let titleIndex = 0;
        let paragraphIndex = 0;

        function typeTitle() {
            if (titleIndex < titleText.length) {
                document.getElementById("typewriter-title").innerHTML += titleText.charAt(titleIndex);
                titleIndex++;
                setTimeout(typeTitle, 100);
            } else {
                typeParagraph();
            }
        }

        function typeParagraph() {
            if (paragraphIndex < paragraphText.length) {
                document.getElementById("typewriter-text").innerHTML += paragraphText.charAt(paragraphIndex);
                paragraphIndex++;
                setTimeout(typeParagraph, 40);
            }
        }

        typeTitle();
    });
</script>

<div class="content">

    <?php include 'includes/navebar.php'; ?>

    <div class="flex justify-around mt-8 mx-20">
        <img src="public/dev.jpg" alt="Image développeur"
            class="w-1/2 h-96 rounded-xl shadow-lg object-cover">

        <div>
            <img src="public/NEXTORA.png" alt="Logo NEXTORA"
                 class="w-1/2 h-44 rounded-xl shadow-lg object-cover mb-4 mx-10">

            <h1 id="typewriter-title" class="text-3xl font-bold mb-2"></h1>
            <p id="typewriter-text" class="text-white text-lg max-w-md"></p>
        </div>
    </div>

    <div class="flex items-center mt-8 mx-36 space-x-2 text-lg">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor" class="w-6 h-6 text-red-600">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582"/>
        </svg>

        <a href="https://www.nextora.com" target="_blank" class="text-white hover:underline">
            www.nextora.com
        </a>
    </div>

</div>

</body>
</html>
