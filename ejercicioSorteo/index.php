<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Sorteo</title>
</head>
<body>
    
<?php
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

function creaListaaleatorios($premios,$cantNombres){
    $ganadores = Array();
    $indiceParticipantes = $cantNombres - 1;
    while (count($ganadores) < $premios){
        $ganador = rand(0,$indiceParticipantes);
        if (!in_array($ganador, $ganadores)){
            $ganadores[] = $ganador;
        }
    }
    return $ganadores;
}
$premios = 3;
$cantNombres = count($nombres); // 10
$listaGanadores = creaListaaleatorios($premios,$cantNombres);

foreach($listaGanadores as $numOrden){
    echo $nombres[$numOrden] ."<br>";
}
exit;
?>
</body>
</html>