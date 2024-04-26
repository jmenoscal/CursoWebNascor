<?php
// modificar.php
session_start();

$servidor ="localhost";
$usuario="usuario_erp";
$password="servitec27";
$database = "noticias";

$conexion = mysqli_connect ($servidor, $usuario, $password)
   or die ("No se puede conectar con el servidor");

mysqli_select_db($conexion, $database) or die("No se puede utilizar la base de datos");

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $texto= $_POST['texto'];
    $categoria= $_POST['categoria'];

    $q="UPDATE noticia SET titulo='$titulo', texto='$texto', categoria='$categoria' WHERE id='$id'";
    $update=mysqli_query($conexion, $q);

    if($update){
        echo "Noticia modificada con éxito.";
        $selecT= "SELECT * FROM noticia WHERE id='$id'";
        $resultado = mysqli_query($conexion, $selecT) or die("Fallo en la consulta");
        if($noticia = mysqli_fetch_assoc($resultado)){
            echo "<h1>" . $noticia["titulo"] . "</h1>";
            echo "<p>" . $noticia["texto"] . "</p>";
            echo "<p>Categoría: " . $noticia["categoria"] . "</p>";
        }
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
