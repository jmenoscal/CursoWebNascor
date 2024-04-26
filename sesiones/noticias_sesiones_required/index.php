
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>NOTICIAS</title>
</head>

<body>
<?php
// index.php
require 'db_utils.php';
require 'ini.php';

// Verificar si el usuario ha iniciado sesión
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header("Location: noticias.php");
    exit;
}

$resultado = get_table('noticia');  // le paso a la funcion de query el nombre de la tabla como argumento  
$news_count = get_news_count();

?>
<h1>Noticias del momento</h1>

<?php 
$tiempo = tiempo();
echo "$tiempo Hay un total de $news_count noticias.";
?> 

<div class="contenedor">
<h1>CONSULTAS EN PHP DESDE MYSQL</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Texto</th>
        <th>Categoría</th>
        <th>Fecha de publicación</th>
        <th>Imagen</th>
    </tr>

            <?php
            while ($row = mysqli_fetch_array($resultado)) {
                $username = get_username($row['user_id']);
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["titulo"] . "</td>";
                $strFinal = substr($row["texto"], 0, 100);
                echo "<td>" . $strFinal;
                if ($strFinal < $row["texto"]) {
                    echo " ... ";
                }
                echo "<br><a href='noticia_completa.php?id=" . $row['id'] . "'>Ir a la noticia completa -></a>";
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo " <a href='noticia_completa.php?id=" . $row['id'] . "&modificar=true'>Modificar noticia -></a>";
                }
                echo "</td>";
                echo "<td>" . $row["categoria"] . "</td>";
                echo "<td>" . $row["fecha"] . "</td>";
                echo "<td><img src='" . $row["imagen"] . "' width='120'></td>";
                echo "</tr>";
            }
            ?>
</table>
</div> 

<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    echo '<a href="logout.php">Cerrar sesión</a>';
} else {
    echo '<a href="login.php">Iniciar sesión o registrate</a>';
}
?>
</body>
</html>