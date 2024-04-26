<?php
// noticias.php
session_start();

$servidor ="localhost";
$usuario="usuario_erp";
$password="servitec27";
$database = "noticias";

$conexion = mysqli_connect ($servidor, $usuario, $password)
   or die ("No se puede conectar con el servidor");

mysqli_select_db($conexion, $database) or die("No se puede utilizar la base de datos");

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    $titulo = $_POST['titulo'];
    $texto= $_POST['texto'];
    $categoria= $_POST['categoria'];
    $user_id = $_POST['user_id']; // Usa el id del usuario del formulario

    $q="INSERT INTO noticia SET titulo='$titulo', texto='$texto', categoria='$categoria', user_id='$user_id'";
    $insert=mysqli_query($conexion, $q);
}

$selecT= "SELECT * FROM noticia";
$resultado = mysqli_query($conexion, $selecT) or die("Fallo en la consulta");

?>
<h1>Noticias</h1>
<?php
while ($row = mysqli_fetch_array($resultado)) {
    echo "<h2>" . $row["titulo"] . "</h2>";
    $texto = substr($row["texto"], 0, 100) . "...";
    echo "<p>" . $texto . "<a href='noticia_completa.php?id=" . $row["id"] . "'>Leer más</a></p>";
    echo "<p>Categoría: " . $row["categoria"] . "</p>";
    echo "<hr>";
}

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    ?>
    <form name="form" action="" method="post" >
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo"><br>
        <label for="texto">Texto:</label><br>
        <textarea id="texto" name="texto"></textarea><br>
        <label for="categoria">Categoría:</label><br>
        <input type="text" id="categoria" name="categoria"><br>
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"><br> <!-- Campo de entrada oculto para el id del usuario -->
        <input type="submit" value="Submit">
    </form>
    <?php
    echo '<a href="logout.php">Cerrar sesión</a>';
} else {
    echo '<a href="login.php">Iniciar sesión</a>';
}
?>






