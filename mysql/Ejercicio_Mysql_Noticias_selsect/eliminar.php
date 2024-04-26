<?php
// INI archivo.ini
$host = "localhost";
$user = "usuario_erp";
$password = "servitec27";
$database = "noticias";
$conexion = mysqli_connect($host, $user, $password) or die ("No se puede conectar con el servidor");
//
// Seleccionamos la base de datos

mysqli_select_db($conexion, $database) or die ("No se puede seleccionar la base de datos");

if (!isset($_POST['id'])){
    $mensaje = "ERROR: Faltan parámetros requeridos <a href='index.php'>Volver</a>";
    echo $mensaje;
    exit;
}

$imagen = $_POST['imagen'];
$id = $_POST['id'];

$q="DELETE FROM noticia WHERE id ='$id'";

$referrer = $_SERVER['HTTP_REFERER'];
if (!$result=mysqli_query($conexion,$q)){
    $mensaje = "ERROR: Faltan parámetros requeridos <a href='$referrer'>Volver</a>";
    echo $mensaje;
    exit;
}
if (!unlink($imagen)){
    $mensaje = "ERROR: La imagen no se ha borrado, el post si";
    echo $mensaje;
}
header("location: $referrer");
exit;