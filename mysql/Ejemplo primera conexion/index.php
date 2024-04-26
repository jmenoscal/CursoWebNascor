<?php
// INI
$host = "localhost";
$user = "usuario_erp";
$password = "servitec27";

// Conexión
$conexion = mysqli_connect($host, $user, $password) or die ("No se puede conectar con el servidor");

//
// Seleccionamos la base de datos
$database = "noticias";
mysqli_select_db($conexion, $database) or die ("No se puede seleccionar la base de datos");

//echo "Hemos seleccionado la base de datos $database";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexión a Mysql</title>
</head>
<body>
    <?php
        echo "La conexión se ha establecido\n";
        echo "Hemos seleccionado la base de datos $database";
    ?>
</body>
</html>