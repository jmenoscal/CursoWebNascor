<?php
// eliminar.php
require_once 'ini.php';
require_once 'db_utils.php';

$conexion = connect_to_db();

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $q="DELETE FROM noticia WHERE id ='$id'";
        $update=mysqli_query($conexion, $q);

        if($update){
            echo "<script>
                    alert('Noticia eliminada con éxito.');
                    window.location.href='noticias.php';
                  </script>";
        } else {
            echo "<script>alert('Error al eliminar la noticia.');</script>";
        }
    } else {
        echo "ID no proporcionado.";
    }
} else {
    echo "Debes iniciar sesión para eliminar una noticia.";
}

echo '<a href="noticias.php">Volver a las noticias</a><br/><br/>';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    echo '<a href="logout.php">Cerrar sesión</a>';
} else {
    echo '<a href="login.php">Iniciar sesión</a>';
}
?>

