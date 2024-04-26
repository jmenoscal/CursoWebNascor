<?php
require("db_utils.php");

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

$q="UPDATE noticia SET titulo='$titulo',texto='$texto',imagen='$imagen', categoria='$categoria' WHERE id ='$id'";

$referrer = $_SERVER['HTTP_REFERER'];
if (!consulta($q)){
    $mensaje = "ERROR:  <a href='$referrer'>Volver</a>";
    echo $mensaje;
    exit;
}

header("location: $referrer");
exit;