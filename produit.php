<?php

$response = file_get_contents('https://dummyjson.com/products');
$data = json_decode($response, true);
$produits = $data['products'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Produits </title>
  <link href="output.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-900">

  <?php require "navbar.php"; ?>

  <section class="max-w-6xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold text-center mb-12">Produits </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <?php foreach ($produits as $produit): ?>
        <div class="bg-white rounded-lg shadow p-4 hover:shadow-lg transition ">
          <img src="<?=  htmlspecialchars($produit['thumbnail']) ?>" alt="<?= htmlspecialchars($produit['title']) ?>" class="w-full h-48 object-cover rounded-md mb-4">
          <h2 class="text-xl font-semibold mb-2"><?= htmlspecialchars($produit['title']) ?></h2>
          <p class="text-gray-600 mb-2"><?= htmlspecialchars($produit['description']) ?></p>
          <p class="text-blue-500 font-bold mb-2"><?= $produit['price'] ?> $</p>
          <span class="text-sm text-gray-500 ">Catégorie : <?= htmlspecialchars($produit['category']) ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <?php require "footer.php"; ?>
</body>

</html>