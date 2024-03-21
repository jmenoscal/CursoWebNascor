<?php

$servidor ="localhost";
$usuario="usuario_erp";
$password="servitec";

$conexion = mysqli_connect ($servidor, $usuario, $password)
   or die ("No se puede conectar con el servidor");
   echo "La conexion se ha establecido<br>";
    $database = "noticias";
   mysqli_select_db($conexion, $database) or die("No se puede utilizar la base de datos");

   echo "Hemos seleccionado la base de datos $database";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSQL</title>
</head>
<body>

</body>
</html>