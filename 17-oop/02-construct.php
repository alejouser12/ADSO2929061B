<?php

    $tittle = "02 - Construct";
    $descripcion = "Special method that initializes a new object upon creation.";

include 'template/header.php';
    echo '<section>';

        class PlayList {
        public $name;
        public $artist = array();
        public $genre = array();
        public $image = array();
        public $year = array();

        public function __construct($name){
            $this->name = $name;
        }
        public function setPlayList($artist, $genre, $image, $year) {
            $this->artist[] = $artist;
            $this->genre[] = $genre;
            $this->image[] = $image;
            $this->year[] = $year;
        }

        public function getPlayList() {
            echo "<echoh2>Playlist: $this->name</h2>
            <div style='display: flex; gap: 0.4rem; flex-column: column;'>";
            foreach($this->artist as $i => $artist) {
                echo "<div style='display: flex; gap: 0.4rem; border: 2px solid #0009'>
                    <img src='{$this->image[$i]} width='160px'>
                    <div>
                        <h4>{$artist}</h4>
                        <h5>Genre: {$this->genre[$i]}</h5>
                        <h5>Year: {$this->year[$i]}</h5>
                        </div>
                    </div>";
            }
            echo "</div>";
        }

    }

    $pl = new PlayList(name: 'Merry Christmas');
    $pl->setPlayList('Mariah Carey', 'Pop-Holiday', 'https://shorturl.at/usv3E', 1994);
    $pl->setPlayList('Wham!', 'Pop', 'https://shorturl.at/kfQAj', 1984);
    $pl->setPlayList('Brenda Lee', 'Holiday', 'https://shorturl.at/OGBZI', 1958);
    $pl->getPlayList();

    echo '</section>';

include 'template/footer.php';
