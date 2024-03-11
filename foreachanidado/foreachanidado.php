<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOREACH ANIDADO</title>
</head>
<body>
    <h1>FOREACH ANIDADO</h1>
<?php   

$laberinto = array(
           array("#", "#", "#", "#", "#"),
           array("#", ".", ".", ".", "#"),
           array("#", ".", "#", ".", "#"),
           array("#", ".", ".", ".", "#"),
           array("#", "#", "#", "#", "#")
       );

// Inicializamos el contador de puntos
$cuenta_puntos = 0;

// Iteramos sobre las filas del laberinto
foreach ($laberinto as $fila) {
    // Iteramos sobre los elementos de la fila
    foreach ($fila as $elemento) {
        if ($elemento === ".") {
            // Si encontramos un punto, incrementamos el contador
            $cuenta_puntos++;
        }
    }
}

echo "Cantidad de puntos en el laberinto: " . $cuenta_puntos . "<br><br>";

echo "OTRA FORMA DE HACERLO<br>";

// Creamos un array plano con todos los elementos del laberinto
$elementos = array_merge(...$laberinto);

// Contamos cuántos puntos hay
$cuenta_puntos = array_count_values($elementos)["."];

echo "Cantidad de puntos en el laberinto: " . $cuenta_puntos . "<br>";



?>
</body>
</html>