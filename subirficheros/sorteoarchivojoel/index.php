<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Sorteo</title>
</head>

<body>
    <form action="index.php" method="POST">
        <input name="concursante">
        <input type="submit" value="enviar">
    </form>

    <form action="index.php" method="POST">
        <input type="number" name="cantidadPremios">
        <input type="number" name="premio1">
        <input type="number" name="premio2">
        <input type="number" name="premio3">
        <input type="submit" value="enviar">
    </form>

    <?php
    if (isset($_POST['cantidadPremios'])) {
        $archivoLista = file_get_contents('lista.txt');
        $nombres = explode("<br>", $archivoLista);
        echo "Concursantes:<br>";
        foreach ($nombres as $nombre) {
            echo $nombre . "<br>";
        }

        function creaListaAleatorios($premios, $cantNombres)
        {
            $ganadores = array();
            $indiceParticipantes = $cantNombres - 1;
            while (count($ganadores) < $premios) {
                $ganador = rand(0, $indiceParticipantes);
                if (!in_array($ganador, $ganadores)) {
                    $ganadores[] = array($ganador, $_POST['premio' . count($ganadores) + 1]);
                }
            }
            return $ganadores;
        }

        $premios = $_POST['cantidadPremios'];
        $cantNombres = count($nombres);
        $listaGanadores = creaListaAleatorios($premios, $cantNombres);

        foreach ($listaGanadores as $ganador) {
            echo $nombres[$ganador[0]] . " - Premio: " . $ganador[1] . "<br>";
        }
        exit;
    } else if (isset($_POST['concursante'])) {
        $archivoLista = fopen('lista.txt', 'a');
        if (!$archivoLista) {
            $archivoLista = fopen('lista.txt', 'w');
        }
        fwrite($archivoLista, $_POST['concursante'] . '<br>');
        fclose($archivoLista);
    }
    ?>
</body>

</html>
