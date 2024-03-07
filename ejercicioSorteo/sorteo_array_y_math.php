<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Math</title>
</head>
<body>
    <?php
    // Definir los nombres de los participantes
    $nombres = array(
        "Juan Pérez",
        "María García",
        "Pedro López",
        "Ana Martínez",
        "Sofía González",
        "Miguel Rodríguez",
        "Laura Fernández",
        "David García",
        "Elena Pérez",
        "Alberto López"
    );
    // Función para generar un array aleatorio con los índices de los ganadores
    function generarArrayAleatorio($cantidad, $maximo)
    {
        $premiados = array();
        while (count($premiados) < $cantidad) {
            $numero = rand(0, $maximo);
            if (!in_array($numero, $premiados)) {
                $premiados[] = $numero;
            }
        }
        return $premiados;
    }
    // Definir la cantidad de premios
    $cantidadPremios = 3;
    //Llamamos a la función. Con la cantidad de premios y la cantidad de participantes
    $indicesGanadores = generarArrayAleatorio($cantidadPremios, count($nombres));

    // Mostrar los nombres de los ganadores
    echo "
        <h2>¡¡Felicidades a los ganadores!!</h2>
        <ol>
    ";
    foreach ($indicesGanadores as $indice) {
        echo "<li>" . $nombres[$indice] . "</li>";
    }
    echo "</ol>";
    ?>
</body>
</html>