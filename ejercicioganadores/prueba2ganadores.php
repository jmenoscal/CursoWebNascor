<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Enlaza tu hoja de estilos CSS aquí -->
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .column {
            flex: 1;
            padding: 10px;
        }
        /* Estilos para el formulario */
        form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        /* Estilos para la lista de ganadores */
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        /* Media queries para dispositivos */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .column {
                width: 100%;
            }
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="column">
            <!-- Formulario para ingresar los nombres de los concursantes -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
                <input type="submit" value="Agregar concursante">
            </form>
        </div>
        <div class="column">
            <!-- Formulario para ingresar los premios -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="premio1">Premio 1 (en euros):</label>
                <input type="number" id="premio1" name="premio1" required>
                <label for="premio2">Premio 2 (en euros):</label>
                <input type="number" id="premio2" name="premio2" required>
                <label for="premio3">Premio 3 (en euros):</label>
                <input type="number" id="premio3" name="premio3" required>
                <label for="cantidad">Cantidad de premios:</label>
                <input type="number" id="cantidad" name="cantidad" required>
                <input type="submit" value="Asignar premios">
            </form>
        </div>
        <div class="column">
            <!-- Aquí se mostrarán los ganadores y sus premios -->
            <?php
// Función para obtener índices aleatorios únicos
function obtenerIndicesAleatoriosUnicos($total, $cantidad) {
    $indices = [];
    while (count($indices) < $cantidad) {
        $indiceAleatorio = rand(0, $total - 1);
        if (!in_array($indiceAleatorio, $indices)) {
            $indices[] = $indiceAleatorio;
        }
    }
    return $indices;
}

// Función para obtener premio aleatorio sin repeticiones
function obtenerPremioAleatorio($premiosDisponibles, $premiosAsignados) {
    $premio = array_diff($premiosDisponibles, $premiosAsignados);
    return $premio[array_rand($premio)];
}

// Función para verificar si hay ganadores repetidos
function noHayGanadoresRepetidos($ganadores) {
    $nombres = array_column($ganadores, 'nombre');
    return count($nombres) === count(array_unique($nombres));
}

// Lista completa de concursantes
$listadoCompleto = [
    ['nombre' => 'Ana'],
    ['nombre' => 'Carlos'],
    ['nombre' => 'David'],
    ['nombre' => 'Elena'],
    ['nombre' => 'Fernando'],
    ['nombre' => 'Gloria']
];

// Agregar el nuevo concursante si se envió el formulario
if (isset($_POST['name'])) {
    $nuevoConcursante = ['nombre' => $_POST['name']];
    $listadoCompleto[] = $nuevoConcursante;
}

// Mostrar la lista completa de concursantes
echo "<h2>Lista de concursantes:</h2>";
echo "<ul>";
foreach ($listadoCompleto as $concursante) {
    echo "<li>{$concursante['nombre']}</li>";
}
echo "</ul>";

// Comprobar si se enviaron los premios
if (isset($_POST['premio1']) && isset($_POST['premio2']) && isset($_POST['premio3']) && isset($_POST['ganadores'])) {
    $premiosDisponibles = ['Premio A', 'Premio B', 'Premio C'];
    $premiosAsignados = [];
    $ganadores = [];

    // Obtener índices aleatorios únicos para los premios
    $indicesPremios = obtenerIndicesAleatoriosUnicos(count($premiosDisponibles), count($_POST['ganadores']));

    // Asignar premios a los ganadores
    foreach ($_POST['ganadores'] as $indiceGanador) {
        $premio = obtenerPremioAleatorio($premiosDisponibles, $premiosAsignados);
        $premiosAsignados[] = $premio;
        $ganadores[] = [
            'nombre' => $listadoCompleto[$indiceGanador]['nombre'],
            'premio' => $premio
        ];
    }

    // Mostrar los ganadores y sus premios
    echo "<h2>Ganadores y premios:</h2>";
    echo "<ul>";
    foreach ($ganadores as $ganador) {
        echo "<li>{$ganador['nombre']} - {$ganador['premio']}</li>";
    }
    echo "</ul>";

    // Mostrar la lista completa de concursantes nuevamente
    echo "<h2>Lista completa de concursantes (incluyendo nuevos participantes):</h2>";
    echo "<ul>";
    foreach ($listadoCompleto as $concursante) {
        echo "<li>{$concursante['nombre']}</li>";
    }
    echo "</ul>";
}
?>
