<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Enlaza tu hoja de estilos CSS aquí -->
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

// Función para mostrar los ganadores
function mostrarGanadores($ganadores) {
    echo "<h2>Ganadores:</h2>";
    echo "<ul>";
    foreach ($ganadores as $ganador) {
        echo "<li>{$ganador['nombre']} - Premio: {$ganador['premio']}</li>";
    }
    echo "</ul>";
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
if (isset($_POST['premio1']) && isset($_POST['premio2']) && isset($_POST['premio3']) && isset($_POST['cantidad'])) {
    $premio1 = $_POST['premio1'];
    $premio2 = $_POST['premio2'];
    $premio3 = $_POST['premio3'];
    $cantidad = $_POST['cantidad'];

    // Verificar que haya suficientes concursantes para asignar premios
    if (count($listadoCompleto) < $cantidad) {
        echo "No hay suficientes concursantes para asignar $cantidad premios.";
    } else {
        // Generar índices aleatorios únicos para los ganadores
        $ganadoresIndices = obtenerIndicesAleatoriosUnicos(count($listadoCompleto), $cantidad);

        // Asignar premios a los ganadores
        $ganadoresConPremio = [];
        $premiosDisponibles = [$premio1, $premio2, $premio3];
        foreach ($ganadoresIndices as $indice) {
            $ganador = $listadoCompleto[$indice];
            $premioAleatorio = obtenerPremioAleatorio($premiosDisponibles, array_column($ganadoresConPremio, 'premio'));
            $ganadoresConPremio[] = ['nombre' => $ganador['nombre'], 'premio' => $premioAleatorio];
        }

        // Verificar si hay ganadores repetidos
        if (noHayGanadoresRepetidos($ganadoresConPremio)) {
            echo "¡Felicidades a los ganadores!";
            mostrarGanadores($ganadoresConPremio);
        } else {
            echo "Hubo un problema al asignar los premios.";
        }
    }
}


// Función para mostrar el participante agregado
function mostrarParticipanteAgregado($nuevoConcursante) {
    echo "<h2>Participante Agregado:</h2>";
    echo "<p>{$nuevoConcursante['nombre']}</p>";
}

// ...

// Agregar el nuevo concursante si se envió el formulario
if (isset($_POST['name'])) {
    $nuevoConcursante = ['nombre' => $_POST['name']];
    $listadoCompleto[] = $nuevoConcursante;
    mostrarParticipanteAgregado($nuevoConcursante);
}


?>
