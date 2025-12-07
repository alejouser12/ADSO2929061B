<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Agregar Pokemon</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" />
</head>
<body class="p-8">
  <div class="max-w-md mx-auto card p-6">
    <h1 class="text-2xl mb-4">Agregar Pokémon</h1>

    <form method="POST" action="/18-mvc/actions/pokemon_action.php?action=add">
      <input name="name" type="text" placeholder="Nombre" class="input input-bordered w-full mb-3" required>

      <select name="type" class="select select-bordered w-full mb-3" required>
        <option value="Water">Water</option>
        <option value="Fire">Fire</option>
        <option value="Grass">Grass</option>
        <option value="Electric">Electric</option>
        <option value="Normal">Normal</option>
        <option value="Poison">Poison</option>
        <option value="Ghost">Ghost</option>
        <option value="Dragon">Dragon</option>
        <option value="Rock">Rock</option>
      </select>

      <button class="btn btn-success w-full" type="submit">Guardar</button>
    </form>

    <div class="mt-4">
      <a href="/18-mvc/index.php" class="link">Volver</a>
    </div>
  </div>
</body>
</html>
