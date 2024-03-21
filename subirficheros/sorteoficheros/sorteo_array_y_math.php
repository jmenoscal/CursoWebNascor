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
    
    // Definir la cantidad de premios
    $cantidadPremios = 3;
    //Llamamos a la función. Con la cantidad de premios y la cantidad de participantes
    $indicesGanadores = generarArrayAleatorio($cantidadPremios, count($nombres));
    function generarArrayAleatorio($cantidad, $maximo)
    {
        $premiados = array();
        while (count($premiados) < $cantidad) {
            $numero = rand(0, $maximo - 1);
            if (!in_array($numero, $premiados)) {
                array_push($premiados, $numero);
            }
        }
        return $premiados;
    }
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