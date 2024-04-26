<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Login Usuario</title>
</head>

</head>
<body>
    <!-- Formulario -->
    <div id="registerForm">
    <h1>Formulario de Login</h1>
        <form method="POST" action="contenido.php" class="register-form">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" name="enviar" value="enviar" class="submit-button"><br><br>
        </form>
    </div>
</body>

</html>