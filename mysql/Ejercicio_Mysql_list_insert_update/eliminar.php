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

$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$categoria = $_POST['categoria'];
$imagen = $_POST['imagen'];
$id = $_POST['id'];

$q="DELETE noticia SET titulo='$titulo',texto='$texto',imagen='$imagen', categoria='$categoria' WHERE id ='$id'";

$referrer = $_SERVER['HTTP_REFERER'];
if (!$result=mysqli_query($conexion,$q)){
    $mensaje = "ERROR: Faltan parámetros requeridos <a href='$referrer'>Volver</a>";
    echo $mensaje;
    exit;
}

header("location: $referrer");
exit;