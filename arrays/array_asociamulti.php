<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento.</title>
</head>
<body>
<?php
    //creacion de un array asociativo
    $array_asociativo = array("modelo"=>"Mustang", "marca"=>"ford", "color"=>"rojo");
        echo $array_asociativo["modelo"] . "<br>";
        $array_asociativo["modelo"]="seat";
        $cambio=["seat"];
        echo $array_asociativo["modelo"] . "<br>";
    //añadir un nuevo elemento al array asociativo
    $array_asociativo["año"]=2024;
    echo $array_asociativo["año"]. "<br>";
    //mostrar todos los elementos del array asociativo
    foreach ($array_asociativo as $clave => $valor) {
        echo "$clave: $valor ";
    }
    //eliminar un elemento del array asociativo
    unset($array_asociativo["modelo"]);
   echo "<br>";
    foreach ($array_asociativo as $clave => $valor) {
        echo "$clave: $valor ";
    }
    //ordenar el array por su clave
    asort($array_asociativo);
    echo "<br>";
    foreach ($array_asociativo as $clave => $valor) {
        echo "$clave: $valor ";
    }

    //ordenar el array por su valor
    ksort($array_asociativo);
    echo "<br>";
    foreach ($array_asociativo as $clave => $valor) {
        echo "$clave: $valor ";
    }



    ?>
</body>
</html>