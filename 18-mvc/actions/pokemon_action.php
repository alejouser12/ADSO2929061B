<?php
// actions/pokemon_action.php
// Manejador CRUD robusto para pokemones (add, edit, update, delete, view, list).
// Usa la conexión que provee application/database.php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// ------------- 1) Cargar la conexión (ajusta ruta si tu application está en otro lugar)
require_once __DIR__ . '/../application/database.php';

// DataBase::connect() debería devolver un PDO. Si tu proyecto usa otro nombre,
// puedes adaptar la llamada aquí.
try {
    $conn = DataBase::connect();
} catch (Exception $e) {
    // Mensaje claro si la conexión falla
    die("ERROR: no se pudo conectar a la base de datos. " . $e->getMessage());
}

// ------------- 2) Determinar nombre real de la tabla (soporte pokemones / pokemons)
$possible_tables = ['pokemones', 'pokemons', 'pokemon'];
$tabla = null;
foreach ($possible_tables as $t) {
    try {
        $res = $conn->query("SHOW TABLES LIKE " . $conn->quote($t));
        if ($res && $res->fetch()) {
            $tabla = $t;
            break;
        }
    } catch (Exception $e) {
        // ignore and continue
    }
}
if ($tabla === null) {
    // No se encontró tabla: notificamos pero no rompemos con fatal error
    die("ERROR: No se encontró la tabla de pokemones. Busqué: " . implode(', ', $possible_tables));
}

// helper para redirigir
function go_home($msg = null) {
    $url = '../index.php';
    if ($msg) $url .= '?mensaje=' . urlencode($msg);
    header("Location: $url");
    exit;
}

$action = $_GET['action'] ?? null;

// ================= LIST (default) =================
if ($action === null || $action === 'list') {
    try {
        $stmt = $conn->query("SELECT * FROM `$tabla` ORDER BY id ASC");
        $pokemones = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die("SQL error list: " . $e->getMessage());
    }
    // Si quieres una vista de lista, incluye aquí; por defecto volvemos al index
    // include __DIR__ . '/../views/pokemon_list_view.php';
    header("Location: ../index.php");
    exit;
}

// ================= ADD (form POST) =================
if ($action === 'add') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name'] ?? '');
        $type = trim($_POST['type'] ?? '');
        $strength = intval($_POST['strength'] ?? 0);
        $stamina = intval($_POST['stamina'] ?? 0);
        $speed = intval($_POST['speed'] ?? 0);
        $accuracy = intval($_POST['accuracy'] ?? 0);
        $trainer_id = isset($_POST['trainer_id']) && $_POST['trainer_id'] !== '' ? intval($_POST['trainer_id']) : null;

        // Validación mínima
        if ($name === '' || $type === '') {
            go_home('Faltan campos obligatorios');
        }

        $sql = "INSERT INTO `$tabla` (name, type, strength, stamina, speed, accuracy, trainer_id)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        try {
            $stmt = $conn->prepare($sql);
            // si trainer_id es null, pasar null explícitamente
            $params = [$name, $type, $strength, $stamina, $speed, $accuracy, $trainer_id];
            $stmt->execute($params);
            go_home('Pokemon agregado');
        } catch (Exception $e) {
            die("SQL error add: " . $e->getMessage());
        }
    }

    // Si se desea mostrar un formulario desde aquí:
    if (file_exists(__DIR__ . '/../views/add.php')) {
        include __DIR__ . '/../views/add.php';
        exit;
    } else {
        go_home();
    }
}

// ================= EDIT (mostrar formulario) =================
if ($action === 'edit') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (!$id) go_home('ID inválido para editar');

    try {
        $stmt = $conn->prepare("SELECT * FROM `$tabla` WHERE id = ?");
        $stmt->execute([$id]);
        $pokemon = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die("SQL error edit(select): " . $e->getMessage());
    }

    if (!$pokemon) go_home('Pokémon no encontrado');

    // cargar lista de trainers para el select (si existe tabla trainers)
    $trainers = [];
    try {
        $res = $conn->query("SHOW TABLES LIKE 'trainers'");
        if ($res && $res->fetch()) {
            $tstmt = $conn->query("SELECT id, name FROM trainers ORDER BY name");
            $trainers = $tstmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (Exception $e) {
        // ignore
    }

    // incluir vista de edición
    if (file_exists(__DIR__ . '/../views/pokemon_edit_view.php')) {
        include __DIR__ . '/../views/pokemon_edit_view.php';
        exit;
    } else {
        go_home('Vista de edición no encontrada');
    }
}

// ================= UPDATE (guardar POST) =================
if ($action === 'update') {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') go_home();

    $id = intval($_POST['id'] ?? 0);
    if (!$id) go_home('ID inválido al actualizar');

    $name = trim($_POST['name'] ?? '');
    $type = trim($_POST['type'] ?? '');
    $strength = intval($_POST['strength'] ?? 0);
    $stamina = intval($_POST['stamina'] ?? 0);
    $speed = intval($_POST['speed'] ?? 0);
    $accuracy = intval($_POST['accuracy'] ?? 0);
    $trainer_id = isset($_POST['trainer_id']) && $_POST['trainer_id'] !== '' ? intval($_POST['trainer_id']) : null;

    if ($name === '' || $type === '') go_home('Faltan campos');

    $sql = "UPDATE `$tabla`
            SET name = ?, type = ?, strength = ?, stamina = ?, speed = ?, accuracy = ?, trainer_id = ?
            WHERE id = ?";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $type, $strength, $stamina, $speed, $accuracy, $trainer_id, $id]);
        go_home('Pokemon actualizado');
    } catch (Exception $e) {
        die("SQL error update: " . $e->getMessage());
    }
}

// ================= DELETE =================
if ($action === 'delete') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (!$id) go_home('ID inválido al eliminar');

    try {
        $stmt = $conn->prepare("DELETE FROM `$tabla` WHERE id = ?");
        $stmt->execute([$id]);
        go_home('Pokemon eliminado');
    } catch (Exception $e) {
        die("SQL error delete: " . $e->getMessage());
    }
}

// ================= VIEW =================
if ($action === 'view') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (!$id) go_home('ID inválido');

    // Traer pokemon + trainer + gym (LEFT JOIN)
    $sql = "
        SELECT p.*,
               t.id AS trainer_id, t.name AS trainer_name, t.level AS trainer_level, t.gym_id AS trainer_gym_id,
               g.id AS gym_id, g.name AS gym_name
        FROM `$tabla` p
        LEFT JOIN trainers t ON p.trainer_id = t.id
        LEFT JOIN gyms g ON t.gym_id = g.id
        WHERE p.id = ?
        LIMIT 1
    ";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $pokemon = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die("SQL error view: " . $e->getMessage());
    }

    if (!$pokemon) go_home('Pokémon no encontrado');

    if (file_exists(__DIR__ . '/../views/pokemon_view.php')) {
        include __DIR__ . '/../views/pokemon_view.php';
        exit;
    } else {
        go_home('Vista detalle no encontrada');
    }
}

// Si llega aquí, volver al index
go_home();
