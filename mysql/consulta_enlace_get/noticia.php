<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilosnoticia.css">
    <title>Document</title>    
</head>
<body>
    
<div class="cuadro">
<?php

$servidor ="localhost";
$usuario="usuario_erp";
$password="servitec27";
$database = "noticias";
// Conexión a la base de datos

if (!isset ($_GET["id"]) && !isset($_POST['id'])) {
    $mensaje = "<h3 style='color:red'>Error. Faltan parámetros necesarios</h3>";
    exit;
} else {
$conexion = mysqli_connect ($servidor, $usuario, $password)
   or die ("No se puede conectar con el servidor");
   echo "<p class='texto'>La conexion se ha establecido con éxito</p>";
   //seleccionamos la base de datos    
mysqli_select_db($conexion, $database) or die("No se puede utilizar la base de datos");
if (isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = $_POST['id'];
}}
//realizamos consulta a base de datos
$selecT= "SELECT * FROM noticia";
$resultado = mysqli_query($conexion, $selecT) or die("Fallo en la consulta");
//consultamos la tabla de una lista de la base de datos
$consultaT = mysqli_query($conexion, "SHOW TABLES");
// Imprime la base de datos seleccionada
echo "<p class='texto'>La base de datos seleccionada es: <strong>$database</strong></p>";
//mostramos que tabla hemos seleccionado
//recupera una fila de datos del conjunto de resultados y la devuelve como un array enumerado.
while ($fila = mysqli_fetch_row($consultaT)) {  
    $tabla =$fila[0];
}
// Imprime la TABLA de base de datos seleccionada
echo "<p class='texto'>La Tabla seleccionada es: <strong>$tabla</strong></p>";
?>
</div>

<?php
// Obtén el ID de la noticia desde la URL
//$id = $_GET['id'];
// conectamos a la bd y … 

// Muestra la noticia completa en una tabla
$consulta = "SELECT * FROM noticia WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$noticia = mysqli_fetch_array($resultado);
$titulo = $noticia["titulo"];
$texto = $noticia['texto'];
$categoria = $noticia['categoria'];
$fecha = $noticia['fecha'];
$imagen = $noticia['imagen'];
$mensaje = "$titulo";

// Cierra la conexión a la base de datos
mysqli_close($conexion);

?>
<div class="contenedor-noticia">
       <h2 class="title">
           <?php echo $mensaje; ?>
       </h2>
       <div class="image">
           <img src="<?php echo $noticia['imagen']; ?>">
       </div>
       <p class="date">Publicado
           <?php echo $noticia['fecha']; ?>
       </p>
       <div class="text">
           <p>
               <?php echo $noticia['texto']; ?>
           </p>
       </div>
</div>

</body>
</html>