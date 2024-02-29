<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

$nombre="Joel";
$apellido="Menoscal";
$edad=39;

echo "<h1>Hola " .$nombre. " " .$apellido." </h1>
<h2>Tu edad es:  $edad</h2>";

?>

<?php
function mostrarDatos() {
    global $nombre , $apellido , $edad ;
    echo "<h1>Hola " .$nombre. " " .$apellido." </h1>
    <h2>Tu edad es:  $edad</h2>";
}
mostrarDatos();

?>

</body>
</html>