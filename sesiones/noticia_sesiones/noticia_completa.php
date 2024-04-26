<?php
// noticia_completa.php
session_start();

$servidor ="localhost";
$usuario="usuario_erp";
$password="servitec27";
$database = "noticias";

$conexion = mysqli_connect ($servidor, $usuario, $password)
   or die ("No se puede conectar con el servidor");

mysqli_select_db($conexion, $database) or die("No se puede utilizar la base de datos");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $selecT= "SELECT * FROM noticia WHERE id='$id'";
    $resultado = mysqli_query($conexion, $selecT) or die("Fallo en la consulta");
    if($noticia = mysqli_fetch_assoc($resultado)){
        ?>
        <h1><?php echo $noticia["titulo"]; ?></h1>
        <p><?php echo $noticia["texto"]; ?></p>
        <p>Categoría: <?php echo $noticia["categoria"]; ?></p>
        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
            ?>
            <form name="form" action="modificar.php" method="post" >
                <input type="hidden" id="id" name="id" value="<?php echo $noticia['id']; ?>"><br> <!-- Campo de entrada oculto para el id de la noticia -->
                <label for="titulo">Título:</label><br>
                <input type="text" id="titulo" name="titulo" value="<?php echo $noticia['titulo']; ?>"><br>
                <label for="texto">Texto:</label><br>
                <textarea id="texto" name="texto"><?php echo $noticia['texto']; ?></textarea><br>
                <label for="categoria">Categoría:</label><br>
                <input type="text" id="categoria" name="categoria" value="<?php echo $noticia['categoria']; ?>"><br>
                <input type="submit" value="Modificar">
            </form>
            <?php
        }
    } else {
        echo "Noticia no encontrada.";
    }
} else {
    echo "ID no proporcionado.";
}

echo '<a href="index.php">Volver a las noticias</a><br><br>';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    echo '<a href="logout.php">Cerrar sesión</a>';
} else {
    echo '<a href="login.php">Iniciar sesión</a>';
}
?>
