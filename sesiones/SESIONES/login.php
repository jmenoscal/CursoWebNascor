<?php
session_start();
if (isset($_GET['logout'])){
    session_destroy();
    }
define("email", "mimail@mimail.com");
define("password", "123456");
$email = $nombre = "";
if (isset($_POST['email']) && isset($_POST['password'])) {
    if (isset($_POST['email'] )== email && isset($_POST['password']) == password) {
        $_SESSION['user'] = $_POST['nombre'];
        $_SESSION['datosUsuario'] = $_POST;
        //   header("Location: contenido.php"); 
        /*  $_SESSION['datosUsuario'] = $_POST;
          echo "Bienvenido" .$_SESSION['datosUsuario']['nomre'];*/
    }
}
//copy('https://cdn.pixabay.com/photo/2023/08/11/04/51/fireworks-8182800_1280.jpg', 'miimagenEEEEE.jpg');
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php if (isset ($_SESSION['user'])) { 
        
        //header('location: contenido.php');
        ?>

        <h1>Bienvenido
            <?php echo $_SESSION['user'];

            ?>
            Tu email es:
            <?php echo $_SESSION['datosUsuario']['email'];

            ?>
            Mira que foto más chula:<br>
            <img src="https://cdn.pixabay.com/photo/2023/08/11/04/51/fireworks-8182800_1280.jpg" width=70%>

        <?php } else { ?>
            <h1>Bienvenido! Loguéate</h1>
            <form action="login.php" method="post">
                Nombre: <input type="text" name="nombre" required>
                Email: <input type="email" name="email" required>
                Passw: <input type="password" name="password" required>
                <input type="submit" value="Enviar">
            </form>
            <a href="login.php?logout=true">
        <?php } ?>

        
</body>
</html>