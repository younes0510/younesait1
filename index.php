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
        transform: translateY(95vh) translateX(20px) rotate(360deg);
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
                    d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582" />
            </svg>

            <a href="https://www.nextora.com" target="_blank" class="text-white hover:underline">
                www.nextora.com
            </a>
        </div>
        <!-- SECTION RÉSEAUX SOCIAUX -->
        <div class="mt-12 flex justify-center space-x-6 text-white text-2xl bg-black p-3  rounded-lg shadow-lg">
            <!-- GitHub -->
            <a href="https://github.com/younes0510" target="_blank" title="GitHub" class="hover:text-red-500 transition">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 .5C5.65.5.5 5.65.5 12a11.5 11.5 0 008 11c.6.1.8-.25.8-.55v-2c-3.3.7-4-1.6-4-1.6-.5-1.3-1.2-1.7-1.2-1.7-1-.7.1-.7.1-.7 1.1.1 1.7 1.1 1.7 1.1 1 .1 1.5.7 1.8 1 .1-.8.4-1.3.8-1.6-2.7-.3-5.6-1.4-5.6-6a4.6 4.6 0 011.2-3.2c-.1-.3-.5-1.5.1-3.2 0 0 1-.3 3.3 1.2a11.4 11.4 0 016 0c2.3-1.5 3.3-1.2 3.3-1.2.6 1.7.2 2.9.1 3.2a4.6 4.6 0 011.2 3.2c0 4.6-2.9 5.7-5.6 6 .4.3.8 1 .8 2v3c0 .3.2.6.8.5A11.5 11.5 0 0023.5 12c0-6.35-5.15-11.5-11.5-11.5z" />
                </svg>
            </a>

            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/in/younes-ait-482385326/" target="_blank" title="LinkedIn" class="hover:text-red-500 transition">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20.447 20.452h-3.554v-5.569c0-1.327-.026-3.037-1.852-3.037-1.853 0-2.136 1.444-2.136 2.937v5.669H9.352V9h3.415v1.561h.049c.476-.899 1.637-1.848 3.367-1.848 3.599 0 4.263 2.368 4.263 5.452v6.287zM5.337 7.433a2.06 2.06 0 11.002-4.12 2.06 2.06 0 01-.002 4.12zM6.813 20.452H3.862V9h2.951v11.452z" />
                </svg>
            </a>

            <!-- Twitter -->
            <a href="https://x.com/YounesA07041044" target="_blank" title="Twitter" class="hover:text-red-500 transition">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.953 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.724a9.855 9.855 0 01-3.127 1.195 4.916 4.916 0 00-8.38 4.482A13.944 13.944 0 011.671 3.149a4.822 4.822 0 001.523 6.574 4.902 4.902 0 01-2.229-.616c-.054 2.28 1.581 4.415 3.949 4.89a4.935 4.935 0 01-2.224.084 4.936 4.936 0 004.604 3.417A9.867 9.867 0 010 19.539a13.94 13.94 0 007.548 2.209c9.057 0 14.01-7.496 14.01-13.986 0-.21 0-.423-.016-.634A10.012 10.012 0 0024 4.59z" />
                </svg>
            </a>

            <!-- Email -->
            <a href="mailto:aa0244453@gmail.com" title="Me contacter" class="hover:text-red-500 transition ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                    <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                </svg>

            </a>


</body>

</html>