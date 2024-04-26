<?php

if (!isset($_POST["id"]) || !isset($_POST["titulo"])){
    $mensaje = "ERROR: Faltan parámetros requeridos <a href='index.php'>Volver</a>";
    echo $mensaje;
    exit;
}
$host = "localhost";
    $user = "administrador@wayhoy.com";
    $password = "ablaracurcix";
    $database = "noticias";
    // Conexión
    $conexion = mysqli_connect($host, $user, $password) or die ("No se puede conectar con el servidor");
    //
    // Seleccionamos la base de datos
    mysqli_select_db($conexion, $database) or die ("No se puede seleccionar la base de datos");

$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$categoria = $_POST['categoria'];
$imagen = $_POST['imagen'];
$id = $_POST['id'];
$q="UPDATE noticias SET titulo='$titulo',texto='$texto',categoria='$categoria', imagen='$imagen' WHERE id='$id'";
if (!$result = mysqli_query($conexion,$q)){
    $mensaje = "ERROR al modificar <a href='noticia.php?id=$id'>Volver</a>";
    echo $mensaje;
    exit;
}
$referer = $_SERVER['HTTP_REFERER'];
header("location:$referer");
exit;