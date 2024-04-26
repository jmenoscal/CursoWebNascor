<?php
// login.php
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require 'db_utils.php';

if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']); // Borra el mensaje de error después de mostrarlo
}

if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']); // Borra el mensaje de éxito después de mostrarlo
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login y Registro</title>
    <link rel="stylesheet" href="estilos_login.css">
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form method="POST" action="ini.php" class="login-form">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="login" value="Iniciar sesión" class="submit-button">
    </form>

    <p>¿No tienes una cuenta? <button id="registerButton">Date de alta</button></p>

    <div id="registerForm" style="display: none;">
        <h2>Registro</h2>
        <form method="POST" action="ini.php" class="register-form">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" name="register" value="Registrar" class="submit-button"><br><br>
        </form>
    </div>

    <script>
        document.getElementById('registerButton').addEventListener('click', function() {
            document.getElementById('registerForm').style.display = 'block';
        }); //Cuando haces clic en el botón, el código dentro de la función se ejecuta. Este código obtiene el elemento con el id registerForm 
        //(el formulario de registro) y cambia su propiedad de estilo display a 'block'. Esto hace que el formulario de registro, que inicialmente está oculto, se muestre en la página.
    </script>
 
</body>
</html>
