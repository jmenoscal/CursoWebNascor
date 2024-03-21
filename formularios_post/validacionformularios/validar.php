<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALIDACION DE FORMULARIOS</title>
</head>
<body>
<?php

$nombre = $email = $cursos = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $cursos = $_POST["cursos"];

    if (empty($nombre)) {
        echo "El campo nombre está vacío.";
    } elseif (!preg_match("/^[A-Za-z\s]+$/", $nombre)) {
        echo "El campo nombre debe contener solo letras y espacios.";
    }

    if (empty($email)) {
        echo "El campo email está vacío.";
    }

    if (empty($cursos)) {
        echo "No se seleccionó ningún curso.";
    } else {
        echo "Has seleccionado los siguientes cursos: ";
        foreach ($cursos as $curso) {
            echo $curso . ", ";
        }
    }
}
?>

</body>
</html>
