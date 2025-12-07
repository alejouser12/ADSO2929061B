<?php
$tittle = "15 - Loop While";
$description = "A loop that repeats code while a condition is true"; // usar $description

include 'template/header.php';

echo '<section style="display: flex; gap: 0.2rem;">';

$i = 1;

while ($i <= 10) {
    echo "<p style='padding: 0.4rem; border: 1px solid #0006;'> $i </p>";
    $i++;
}

echo '</section>';

include 'template/footer.php';
?>
