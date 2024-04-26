<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticia Completa</title>
    <link rel="stylesheet" href="noticias_completas.css">
</head>
<body>
<?php
// noticia_completa.php
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once 'db_utils.php';

$conexion = connect_to_db();
// Muestra la noticia completa en una tabla
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $selecT= "SELECT noticia.*, usuarios.nombre AS username FROM noticia INNER JOIN usuarios ON noticia.user_id = usuarios.id WHERE noticia.id='$id'";
    $resultado = mysqli_query($conexion, $selecT) or die("Fallo en la consulta");
    if($noticia = mysqli_fetch_assoc($resultado)){
        echo "<div class='news-container'>";
        echo "<h1>" . $noticia["titulo"] . "</h1>";
        echo "<img class='news-image' src='" . $noticia['imagen'] . "'>";
        echo "<p>Categoría: " . $noticia["categoria"] . "</p>";
        echo "<p>" . $noticia['fecha'] . "</p>";
        echo "<p>" . $noticia["texto"] . "</p>";
   

        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
            echo "<p>ID: " . $noticia["id"] . ", Usuario: " . $noticia["username"] . "</p>";?>

            <form name="form" action="modificar.php" method="post" class='news-form'>
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
            echo '<a class="logout-link" href="logout.php">Cerrar sesión</a><br><br>';
        } else {
            echo "<p>Autor: " . $noticia["username"] . "</p>";
            echo 'Para modificar la noticia, debes estar registrado o <a href="login.php">Iniciar sesión</a><br> <br>';
        }
        echo "</div>";
    } else {
        echo "Noticia no encontrada.";
    }
} else {
    echo "ID no proporcionado.";
}
// si el usuario no esta autenticado puede seguir viendo las noticias y noticias completas y será redirigido a index.php , ya que solo necesita estar logueado para poder modificar o insertar una noticia
echo '<div class="back-link-container"><a class="back-link" href="index.php">Volver a las noticias</a></div><br><br>';

?>

</body>
</html>

