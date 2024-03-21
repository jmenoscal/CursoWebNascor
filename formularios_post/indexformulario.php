<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
</head>
<body>

<form id="form" action="indexformulario.php" method="GET">
   Nombre: <input type="text" name="name" value=""><br>
   Correo electrónico: <input type="text" name="email"><br>
   <input type="submit">
</form>

<?php
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['name']) && isset($_GET['email'])) {
   echo "Bienvenido, " . htmlspecialchars($_GET["name"]) . "<br>";
   echo "Tu correo electrónico es: " . htmlspecialchars($_GET["email"]);
} else {
   echo "Por favor, rellena el formulario.";
}
?>

</body>
</html>
