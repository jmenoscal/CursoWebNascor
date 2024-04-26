<?php
// index.php
session_start();

$servidor ="localhost";
$usuario="usuario_erp";
$password="servitec27";
$database = "noticias";

$conexion = mysqli_connect ($servidor, $usuario, $password)
   or die ("No se puede conectar con el servidor");

mysqli_select_db($conexion, $database) or die("No se puede utilizar la base de datos");

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

mysqli_close ($conexion);

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    echo '<a href="logout.php">Cerrar sesión</a>';
} else {
    echo '<a href="login.php">Iniciar sesión</a>';
}
?>

