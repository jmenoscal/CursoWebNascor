<?php
// insert.php
require_once 'ini.php';
require_once 'db_utils.php';

// Comprueba si el usuario está logueado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}


$conexion = connect_to_db();

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['titulo']) && isset($_POST['texto']) && isset($_POST['categoria']) && isset($_POST['user_id'])) {
    $titulo = escape_string($conexion, $_POST['titulo']);
    $texto = escape_string($conexion, $_POST['texto']);
    $categoria = escape_string($conexion, $_POST['categoria']);
    $user_id = escape_string($conexion, $_POST['user_id']); // Usa el id del usuario del formulario
    $imagen = "img/default.jpg"; // Tratamiento de imagen
    if (isset($_FILES["file"]) && $_FILES['file']['size'] > 0) {
        $imagePath = "img/" . $_FILES["file"]["name"];
        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $imagePath)) {
            echo "<script>alert('ERROR: No se ha subido la noticia'); window.location.href='index.php';</script>";
            exit;
        }
        $imagen = $imagePath;
    }
    $q = "INSERT INTO noticia SET titulo='$titulo', texto='$texto', categoria='$categoria', imagen='$imagen', user_id='$user_id'";
    $insert=mysqli_query($conexion, $q);
   
    $selecT= "SELECT * FROM noticia";
    $resultado = mysqli_query($conexion, $selecT) or die("Fallo en la consulta");

    if($insert){
        echo "<script>alert('Noticia subida con éxito.'); window.location.href='noticias.php';</script>";
    } else {
        echo "<script>alert('Error al subir la noticia.'); window.location.href='noticias.php';</script>";
    }
}





