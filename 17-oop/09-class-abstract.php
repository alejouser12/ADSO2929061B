<?php

    $tittle = "09 - Class Abstract";
    $descripcion = "A class that cannot be instantiated, only extended from.";

include 'template/header.php';
    echo '<section>';

abstract class DataBase {
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $dbName = 'pokeadso';
    protected $conx;

    public function connect() {
        try {
        $this->conx = new Pdo(
            "mysql:host=$this->host;dbname=$this->dbName",
            $this->user,
            $this->password
        );
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

    public function desconnect() {
        $this->conx = null;
    }

    public function executeQuery($query) {
        $stmt = $this->conx->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class Pokemon extends DataBase {
    public $id;
    public $name;
    public $type;

    public function __construct($id = null, $name = null, $type = null) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
    }

    public function listPokemon() {
        $this->connect();
        $query = "SELECT * FROM pokemons";
        $results = $this->executeQuery($query);
        $this->desconnect();
        return $results;
    }
}

 $List = new Pokemon();
 $pokemons = $List->listPokemon();
 echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
        </tr>";
foreach ($pokemons as $poke) {
    echo "<tr>
            <td>{$poke['id']}</td>
            <td>{$poke['name']}</td>
            <td>{$poke['type']}</td>
          </tr>";
}
echo "</table>";

    echo '</section>';

include 'template/footer.php';
