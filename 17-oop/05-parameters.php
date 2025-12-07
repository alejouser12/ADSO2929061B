<?php

    $tittle = "05 - Parameters";
    $descripcion = "Values passed into a function to customize its operation.";

include 'template/header.php';
    echo '<section>';

    class Country {
        public $name;
        public function __construct($name) {
            $this->name = $name;
        }
    }

    class fifaWorldCup {
        private $country;
        private $year;
        private $winner;
        # Country & year are mandatory
        # Winner is opcional
        public function __construct($country, $year, $winner = 'Brazil') {
            $this->country = $country;
            $this->year    = $year;
            $this->winner  = $winner;
        }

        public function showEvents() {
            echo "<ul>
                    <li style='display:flex; flex-direction: column;'>
                         <span><b>Country:</b> {$this->country->name}</span>
                         <span><b>Year:</b> {$this->year}</span>
                         <span><b>Winner:</b> {$this->winner}</span>
                    </li>
                </ul>";
        }
    }

$country = new Country('Italy');
$worldCup = new fifaWorldCup($country, 1990, 'Germany');
$worldCup->showEvents();

$country = new Country('USA');
$worldCup = new fifaWorldCup($country, 1994);
$worldCup->showEvents();

$country = new Country('France');
$worldCup = new fifaWorldCup($country, 1998, 'France');
$worldCup->showEvents();

$country = new Country('Korea & Japan');
$worldCup = new fifaWorldCup($country, 2002);
$worldCup->showEvents();

$country = new Country('Germany');
$worldCup = new fifaWorldCup($country, 2006, 'Italy');
$worldCup->showEvents();

    echo '</section>';

include 'template/footer.php';
