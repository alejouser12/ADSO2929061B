<?php
$tittle = "09 - Calcular Edad";
$description = "Formulario para ingresar la fecha de nacimiento y mostrar la edad.";
include 'template/header.php';

echo '<section>';
?>

<form method="post">
    <label for="fecha">Ingresa tu fecha de nacimiento:</label><br>
    <input type="date" name="fecha" id="fecha" required>
    <button type="submit">Calcular edad</button>
</form>

<?php
if (isset($_POST['fecha'])) {
    $fechaNacimiento = $_POST['fecha'];

    $hoy = new DateTime();
    $nacimiento = new DateTime($fechaNacimiento);
    $edad = $hoy->diff($nacimiento)->y;

    echo "<p>Tu fecha de nacimiento es: <strong>$fechaNacimiento</strong></p>";
    echo "<p>Tienes <strong>$edad</strong> años.</p>";
}
?>

<?php
include 'template/footer.php';
?>
