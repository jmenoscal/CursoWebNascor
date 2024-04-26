<?php
// profiles.php
require_once 'db_utils.php';
require_once 'ini.php';

function get_user_details($user_id) {
    $conexion = connect_to_db();
    $q="SELECT * FROM usuarios WHERE id='$user_id'";
    $result=mysqli_query($conexion, $q);

    if($user = fetch_array($result)){
        return $user;
    } else {
        return null;
    }
}

function print_user_details($user) {
    if($user){
        echo "Nombre: " . $user['nombre'] . "<br>";
        echo "Email: " . $user['email'] . "<br>";
        echo "ID: " . $user['id'] . "<br>";
        echo "Contraseña: " . $user['password'] . "<br>";
    } else {
        echo "Error al obtener los detalles del usuario.";
    }
}

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("Location: login.php");
    exit;
}
//solo se imprimirán cuando esté en la página profiles.php
if (basename($_SERVER['PHP_SELF']) == 'profiles.php') {
    $user = get_user_details($_SESSION['user_id']);
    print_user_details($user);
    echo '<a href="noticias.php">Volver a las noticias</a><br><br>';
}
?>
