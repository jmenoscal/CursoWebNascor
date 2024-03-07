<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUNCION DE ARRAYS</title>
</head>
<body>
<?php
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

// Ejemplo de uso
$cantidad = 5;
$maximo = 100;
$arrayAleatorio = generarArrayAleatorio($cantidad, $maximo);
echo "Generados $cantidad números aleatorios únicos entre 0 y $maximo: ";
echo implode(", ", $arrayAleatorio);
?>    

</body>
</html>