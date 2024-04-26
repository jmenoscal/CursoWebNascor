<?php
// modificar.php
require_once 'ini.php';
require_once 'db_utils.php';

$conexion = connect_to_db();

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $texto= $_POST['texto'];
    $categoria= $_POST['categoria'];

    $q="UPDATE noticia SET titulo='$titulo', texto='$texto', categoria='$categoria' WHERE id='$id'";
    $update=mysqli_query($conexion, $q);

    if($update){
        // Redirige a noticia_completa.php después de modificar la noticia
        header("Location: noticia_completa.php?id=$id");
        exit;
    } else {
        echo "Error al modificar la noticia.";
    }
} else {
    echo "Debes iniciar sesión para modificar una noticia.";
}

echo '<a href="noticias.php">Volver a las noticias</a><br/><br/>';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    echo '<a href="logout.php">Cerrar sesión</a>';
} else {
    echo '<a href="login.php">Iniciar sesión</a>';
}
?>
