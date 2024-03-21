<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Sorteo</title>
</head>
<form action="index.php" method="POST">
    <input type="number" name="cantidadPremios">
    <input type="number" name="premio1">
    <input type="number" name="premio2">
    <input type="number" name="premio3">
    <input type="submit" value="enviar">
</form>
<body>

    <?php
   
    if (isset($_POST['cantidadPremios'])) {
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

        function creaListaaleatorios($premios, $cantNombres)
        {
            
            $ganadores = array();

            $indiceParticipantes = $cantNombres - 1;
            while (count($ganadores) < $premios) {
                $ganador = rand(0, $indiceParticipantes);
                if (!in_array($ganador, $ganadores)) {
                    $ganadores[] = array($ganador, $_POST['premio' . count($ganadores)+1]);
                }
            }
            return $ganadores;
        }
        $premios = $_POST['cantidadPremios'];
        $cantNombres = count($nombres); // 10
        $listaGanadores = creaListaaleatorios($premios, $cantNombres);

        foreach ($listaGanadores as $ganador) {
            echo $nombres[$ganador[0]] . "<br>";
            echo $ganador[1] . "<br>";
        }
        exit;
    } else {
        echo "Cubre el formulario<br>";
    }
    ?>
</body>

</html>