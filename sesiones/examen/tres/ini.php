<?php
// ini.php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once 'db_utils.php';

// Comprobamos si recibimos datos por post para insertarlos en la base de datos. 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) { // Comprueba si se ha enviado un valor para 'email' 'password' en la solicitud POST.
    $conexion = connect_to_db(); // Establece una conexión con la base de datos.
    $email = ''; // Inicializa la variable $email con una cadena vacía.
    $password = ''; // Inicializa la variable $password con una cadena vacía.
    $email = escape_string($conexion, $_POST['email']); // Asigna el valor enviado para 'email' a la variable $email, después de escapar cualquier carácter especial para prevenir inyecciones SQL.
    $password = escape_string($conexion, $_POST['password']); // Asigna el valor enviado para 'email' a la variable $email, después de escapar cualquier carácter especial para prevenir inyecciones SQL.
}

//registro para un usuario nuevo en la bbdd
if (isset($_POST['register'])) {
    // Registro de usuario
    $nombre = escape_string($conexion, $_POST['nombre']);
    if (user_exists($conexion, $nombre, $email)) {
        $_SESSION['error'] = "El usuario o correo electrónico ya existen. Por favor, prueba con otros.";
    } else {
        $q = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
        $result = mysqli_query($conexion, $q);
        if ($result) {
            $_SESSION['message'] = "<h1>El usuario $nombre se ha registrado con éxito.</h1><br>Si deseas Iniciar sesion Introduce tus credenciasles";
        } else {
            $_SESSION['error'] = "Error al registrar el usuario.";
        }
    }
    header("Location: login.php"); // Redirige de vuelta a login.php
    exit;
} elseif (isset($_POST['login'])) {
    // Inicio de sesión
    $q = "SELECT * FROM usuarios WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conexion, $q);

    if ($user = fetch_array($result)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['nombre'];
        $_SESSION['user_id'] = $user['id']; // Almacena el id del usuario en la variable de sesión
        header("Location: noticias.php");
        exit;
    } else {
        $_SESSION['error'] = "Email o contraseña incorrectos.";
        http_response_code(400);
        header("Location: login.php");
        exit;
    }
} elseif (isset($_POST['logout'])) {
    // Cierre de sesión
    header("Location: logout.php");
    exit;
} elseif (isset($_POST['profile'])) {
    // Página de perfil
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }
    header("Location: profile.php");
    exit;
} elseif (isset($_POST['noticia_completa'])) {
    // Página de noticia completa
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }
    header("Location: noticia_completa.php");
    exit;
} elseif (isset($_POST['modificar'])) {
    // Página de modificación de noticias
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }
    header("Location: modificar.php");
    exit;
}
