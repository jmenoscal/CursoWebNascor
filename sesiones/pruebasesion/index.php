<!DOCTYPE html>
<html lang="es">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo"><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena"><br>

        <input type="submit" value="Registrarse">
    </form>

<?php
session_start();

// Datos de inicio de sesión predefinidos
define("EMAIL_CORRECTO", "email@email.com");
define("CONTRASENA_CORRECTA", "1234");

// Verificar si el usuario ya está logueado
if (isset($_SESSION['usuario'])) {
    // Redirigir a la página de contenido
    header("Location: contenido.php");
    exit; // Detener la ejecución del script
}

// Recuperar los datos del formulario
// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST['nombre'] ?? ''; // Usamos el operador de fusión null para manejar valores no definidos
    $correo = $_POST['correo'] ?? ''; // Usamos el operador de fusión null para manejar valores no definidos
    $contrasena = $_POST['contrasena'] ?? ''; // Usamos el operador de fusión null para manejar valores no definidos

// Validar los datos 
if (empty($nombre) || empty($correo) || empty($contrasena)) {
    echo "Por favor, rellena todos los campos.";
} else {
    // Verificar si los datos coinciden con los predefinidos
    if ($correo === EMAIL_CORRECTO && $contrasena === CONTRASENA_CORRECTA) {
        // Iniciar sesión 
        $_SESSION['usuario'] = $nombre;
        echo "¡Sesión iniciada correctamente! Bienvenido, $nombre. <br/>";
        // Muestra la imagen 
        echo '<img src="foto.jpg" alt="Sesión iniciada">';
        // Redirigir a la página de contenido
        //header("Location: contenido.php");
        exit; // Detener la ejecución del script
    } else {
        echo "Credenciales incorrectas. Por favor, verifica tu correo y contraseña.";
    }
}
}
?>

</body>
</html>
