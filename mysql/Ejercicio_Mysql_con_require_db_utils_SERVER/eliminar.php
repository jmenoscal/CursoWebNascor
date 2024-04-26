<?php
require("db_utils.php");

if (!isset($_POST['id'])){
    $mensaje = "ERROR: Faltan parámetros requeridos <a href='index.php'>Volver</a>";
    echo $mensaje;
    exit;
}

$imagen = $_POST['imagen'];
$id = $_POST['id'];

$q="DELETE FROM noticia WHERE id ='$id'";
$referrer = $_SERVER['HTTP_REFERER'];
if (!consulta($q)){
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