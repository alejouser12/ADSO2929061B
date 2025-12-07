<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Detalles del Pokémon</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" />
</head>
<body class="p-10">

  <div class="max-w-lg mx-auto card bg-base-200 shadow-xl p-6">
    
    <h1 class="text-3xl font-bold mb-4">Detalles del Pokémon</h1>

    <h2 class="text-xl font-semibold mb-2">Información general</h2>

    <p><strong>ID:</strong> <?= $pokemon['id'] ?></p>
    <p><strong>Nombre:</strong> <?= $pokemon['name'] ?></p>
    <p><strong>Tipo:</strong> <?= $pokemon['type'] ?></p>

    <hr class="my-4">

    <h2 class="text-xl font-semibold mb-2">Estadísticas</h2>

    <p><strong>Strength:</strong> <?= $pokemon['strength'] ?></p>
    <p><strong>Stamina:</strong> <?= $pokemon['stamina'] ?></p>
    <p><strong>Speed:</strong> <?= $pokemon['speed'] ?></p>
    <p><strong>Accuracy:</strong> <?= $pokemon['accuracy'] ?></p>

    <hr class="my-4">

    <h2 class="text-xl font-semibold mb-2">Entrenador</h2>

    <?php if ($pokemon['trainer_id']) : ?>
        <p><strong>Nombre:</strong> <?= $pokemon['trainer_name'] ?></p>
        <p><strong>Nivel:</strong> <?= $pokemon['trainer_level'] ?></p>
    <?php else: ?>
        <p>No tiene entrenador asignado.</p>
    <?php endif; ?>

    <hr class="my-4">

    <h2 class="text-xl font-semibold mb-2"> Gimnasio</h2>

    <?php if ($pokemon['gym_name']) : ?>
        <p><strong>Gimnasio:</strong> <?= $pokemon['gym_name'] ?></p>
    <?php else: ?>
        <p>Este entrenador no pertenece a ningún gimnasio.</p>
    <?php endif; ?>

    <div class="mt-6">
      <a href="/18-mvc/index.php" class="btn btn-neutral w-full">Volver</a>
    </div>

  </div>

</body>
</html>
