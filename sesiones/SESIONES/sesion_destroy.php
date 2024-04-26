<?php
session_start();

// declaramos las variables vacías que se van a imprimir
$error=$email="";

// Verificar si estamos recibiendo el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar credenciales
    $email = "usuario@email.es"; 
    $password = "123"; 

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
        <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?logout=true">Cerrar sesión</a>


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
            <input type="text" name="email" value="<?php echo $email;?>"><br>
            Contraseña:<br>
            <input type="password" name="password"><br>
            <input type="submit" value="Entrar">
        </form>
    <?php 
       
        } 

        // Si se ha hecho clic en el enlace de cierre de sesión
        if (isset($_GET['logout'])) {
            session_unset();
            session_destroy();
        }
    ?>

</body>

</html>
