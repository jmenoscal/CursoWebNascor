<?php
// login.php
session_start();

$servidor ="localhost";
$usuario="usuario_erp";
$password="servitec27";
$database = "noticias";

$conexion = mysqli_connect ($servidor, $usuario, $password)
   or die ("No se puede conectar con el servidor");

mysqli_select_db($conexion, $database) or die("No se puede utilizar la base de datos");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $q="SELECT * FROM usuarios WHERE email='$email' AND password='$password'";
    $result=mysqli_query($conexion, $q);

    if($user = mysqli_fetch_assoc($result)){
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['nombre'];
        $_SESSION['user_id'] = $user['id']; // Almacena el id del usuario en la variable de sesión
        header("Location: noticias.php");
        exit;
    } else {
        echo "Email o contraseña incorrectos.";
    }
}
?>
<form name="login" action="" method="post">

    <h2>Login</h2>
    <form class="login-form" action="index.php" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" name="email" placeholder="Correo electrónico">
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password"><br>
        <button type="submit">Iniciar sesión</button>
    </form>


</form>



