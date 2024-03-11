<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados del Formulario OK</title>
</head>
<body>
    <h1>Resultados del Formulario</h1>
<?php
 /*   Este código muestra el resultado del formulario y luego verifica 
    los campos “name” y “email” antes de imprimirlos en pantalla. 
    La función test_input se utiliza para limpiar y validar los datos ingresados por el usuario, 
    eliminando espacios en blanco, caracteres especiales y posibles ataques maliciosos.*/

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);

        echo "Nombre: " . $name . "<br>";
        echo "Correo electrónico: " . $email . "<br>";
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
</body>
</html>
