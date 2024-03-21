<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
//session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Sorteo</title>
</head>
<form action="sorteo_con_sesiones.php" method="POST">
    Nuevo concursante: <br>
    <input name="concursante">
    <input type="submit" value="enviar">
</form>
<hr>
Crear cocurso:<br>
<form action="sorteo_con_sesiones.php" method="POST">
    Cantidad de premios:<br>
    <input type="number" name="cantidadPremios"><br>
    Nombres concursantes:<br>
    <input type="number" name="premio1">
    <input type="number" name="premio2">
    <input type="number" name="premio3">

    <input type="submit" value="enviar">
</form>

<body>

    <?php
    if (isset($_POST['cantidadPremios'])) {
        $nombres = $_SESSION['nombres'];
    /*    $archivoLista = file_get_contents('lista.txt');
        $nombres = explode("<br>", $archivoLista);*/
        echo "Concursantes<br>";
        foreach ($nombres as $nombre){
            echo $nombre;
        }
        
        function creaListaaleatorios($premios, $cantNombres)
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
        echo ' - - - - - ' . $premios . ' - - - - - - - ';
        $cantNombres = count($nombres); // 10
        $listaGanadores = creaListaaleatorios($premios, $cantNombres);

        foreach ($listaGanadores as $ganador) {
            echo $nombres[$ganador[0]] . "<br>";
            echo $ganador[1] . "<br>";
        }
        exit;
    } else if (isset($_POST['concursante'])) {
        
       /* $archivoLista = fopen('lista.txt', 'a');
        if (!$archivoLista) {
        fwrite($archivoLista, $_POST['concursante'] . '<br>');
        $lista = file_get_contents('lista.txt');
        fclose($archivoLista);
        echo $lista;
        */
        if (!isset($_SESSION['nombres'])){
            $_SESSION['nombres']=array();
        }
        array_push($_SESSION['nombres'], $_POST['concursante']);
        
        foreach ($_SESSION['nombres'] as $concursante) {
            echo $concursante."<br>";
        }
       
    } else {
        echo "Cubre el formulario<br>";
    }
    ?>
</body>

</html>