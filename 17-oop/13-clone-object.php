<?php

    $tittle = "13 - Clone Object";
    $descripcion = "Creating a new object as a copy of an existing one.";

include 'template/header.php';
    echo '<section>';

    class Dragon {
    private $name;
    private $weight;

    public function __construct($name, $weight) {
        $this->name   = $name;
        $this->weight = $weight;
    }

    public function getInfoDragon() {
        return "<li> Name: {$this->name} - Weight: {$this->weight} kg </li>";
    }
}

$dragon  = new Dragon("Spyro", 3000);
$cloneDragon = clone($dragon);
echo $cloneDragon->getInfoDragon();

    echo '</section>';

include 'template/footer.php';
