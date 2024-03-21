<?php
session_start();

// declaramos las variables vacías que se van a imprimir
$error=$email="";

// Verificar si estamos recibiendo el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar credenciales
    $email = "usuario@email.es"; 
    $password = "mipass"; 

    if ($_POST["email"] == $email && $_POST["password"] == $password) {
        // Correcto, almacenar el nombre de usuario en la sesión
        $_SESSION["usuario"] = $email;
    } else {
        $error = "Email o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Usuario</title>
</head>

<body>

    <?php 
    // Si hay $_SESSION['user'];  escribimos imagen
    if (isset($_SESSION["usuario"])) { ?>


        <h1>BIENVENIDO 
            <?php echo $_SESSION['usuario']; ?>!!
        </h1>
        <img src="imagen.png" alt="Imagen de Usuario">


    <?php  } 
        // Si no hay $_SESSION['user']; Mostramos formulario, 
        // con el error si lo hay, y con el email escrito si lo hay 
        // si no en blanco
        else {  ?>

            <!-- Formulario -->
        <h1>Iniciar Sesión</h1>
            <?php echo $error; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            Email:<br>
            <input type="text" name="email" vsalue="<?php echo $email;?>"><br>
            Contraseña:<br>
            <input type="password" name="password"><br>
            <input type="submit" value="Entrar">
        </form>
    <?php 
        // Cierro else
        } 

        //session_destroy();
    ?>

</body>

</html>