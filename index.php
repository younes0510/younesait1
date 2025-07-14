<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A.Younes - Accueil</title>
  <link href="output.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-900">

  <?php require "navbar.php"; ?>


  <section class="bg-white py-20">
    <div class="max-w-6xl mx-auto px-4 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">
        Bienvenue chez A.Younes
      </h1>
      
      <a href="/produit.php" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full font-semibold transition">
        Voir nos produits
      </a>
    </div>
  </section>


  <section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
      <h2 class="text-3xl font-bold text-center mb-12">Nos gammes de cuisines</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
          <h3 class="text-xl font-semibold mb-2">Cuisine Moderne</h3>
          <p class="text-gray-600">Lignes épurées, matériaux contemporains, et design tendance.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
          <h3 class="text-xl font-semibold mb-2">Cuisine Classique</h3>
          <p class="text-gray-600">Chaleur et authenticité avec des finitions élégantes.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
          <h3 class="text-xl font-semibold mb-2">Cuisine Intelligente</h3>
          <p class="text-gray-600">Solutions connectées et rangement optimisé pour votre quotidien.</p>
        </div>
      </div>
    </div>
  </section>


  <?php require "footer.php"; ?>

</body>

</html>