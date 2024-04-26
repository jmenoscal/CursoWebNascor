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



// Si se ha hecho clic en el enlace de cierre de sesión
if (isset($_GET['logout'])) {
    // Destruir la sesión
    session_unset();
    session_destroy();

    header("Location: login.php");
    exit;

}
?>






