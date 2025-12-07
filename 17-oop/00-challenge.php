<?php

    $tittle = "00 - High Cohesion & Low Coupling";
    $descripcion = "lorem ipsum dolor sit amet";

include 'template/header.php';
    echo '<section>';
    class Series {
        public $title;
        public $seasons;
        public $episodes;
        public $genre;

        public function __construct($title, $seasons, $episodes, $genre) {
            $this->title = $title;
            $this->seasons = $seasons;
            $this->episodes = $episodes;
            $this->genre = $genre;
        }
    }

    class Library {
        private $seriesList = [];

        public function addSeries(Series $series) {
            $this->seriesList[] = $series;
        }

        public function displaySeries() {
            foreach ($this->seriesList as $series) {
                echo "<h2>{$series->title}</h2>";
                echo "<p>Seasons: {$series->seasons}</p>";
                echo "<p>Episodes: {$series->episodes}</p>";
                echo "<p>Genre: {$series->genre}</p>";
                echo "<hr>";
            }
        }
    }

    echo '</section>';

include 'template/footer.php';
