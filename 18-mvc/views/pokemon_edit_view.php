<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Editar Pokémon</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" />
</head>
<body class="p-8">
  <div class="max-w-md mx-auto card p-6 bg-base-100">
    <h1 class="text-2xl mb-4">Editar Pokémon</h1>

    <form method="POST" action="/18-mvc/actions/pokemon_action.php?action=update">
      <input type="hidden" name="id" value="<?= htmlspecialchars($pokemon['id']) ?>">

      <label class="block mb-2">Nombre</label>
      <input type="text" name="name" class="input input-bordered w-full mb-3" value="<?= htmlspecialchars($pokemon['name']) ?>" required>

      <label class="block mb-2">Tipo</label>
      <select name="type" class="select select-bordered w-full mb-4" required>
        <?php
          $tipos = ['Water','Grass','Fire','Electric','Normal','Poison','Ghost','Dragon','Rock'];
          foreach ($tipos as $t) {
              $sel = ($pokemon['type'] === $t) ? 'selected' : '';
              echo "<option value=\"".htmlspecialchars($t)."\" $sel>".htmlspecialchars($t)."</option>";
          }
        ?>
      </select>

      <button type="submit" class="btn btn-success w-full">Guardar cambios</button>
    </form>

    <div class="mt-4">
      <a href="/18-mvc/index.php" class="link">Volver</a>
    </div>
  </div>
</body>
</html>
