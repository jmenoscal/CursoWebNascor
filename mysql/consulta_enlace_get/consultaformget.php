<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>CONSULTAS EN PHP DESDE MYSQL CON ENLACE</title>
</head>
<body>
<div class="cuadro">
<?php

$servidor ="localhost";
$usuario="usuario_erp";
$password="servitec27";
$database = "noticias";

$conexion = mysqli_connect ($servidor, $usuario, $password)
   or die ("No se puede conectar con el servidor");
   echo "<p class='texto'>La conexion se ha establecido con éxito</p>";

   //seleccionamos la base de datos    
mysqli_select_db($conexion, $database) or die("No se puede utilizar la base de datos");
//comprobamos si recibimos datos de POST para insertarlos en la base de datos.
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    $titulo = $_POST['titulo'];
    $texto= $_POST['texto'];
    $categoria= $_POST['categoria'];
    $q="INSERT INTO noticia SET titulo='$titulo', texto='$texto', categoria='$categoria'";
    // Procedemos a insertar los datos.
    $insert=mysqli_query($conexion, $q);
    echo "$insert";
        // Redirige a una página de confirmación o resultados
    //evita la duplicación de datos cuando se reenvia la solicitud POST después de enviar el formulario o se actualiza o se vuelve atrás.
    header("Location: consultaformget.php");
    exit;
 }

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
//Obtener y procesar los resultados: mysqli_num_rows(), mysqli_fetch_array()
/*En el caso de que la instrucción enviada produzca unos resultados, mysqli_query() devuelve las filas de la tabla afectadas por la instrucción
mysqli_num_rows() devuelve el número de filas afectadas
Para obtener las distintas filas del resultado se utiliza la función mysqli_fetch_array(), que obtiene una fila del resultado en un array asociativo cada vez que se invoca
*/
$nfilas = mysqli_num_rows ($resultado); //obtiene la cantidad de resultados
//$fila = mysqli_fetch_array ($resultado);
mysqli_close ($conexion); // Cerramos la conexión
?>
</div>
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
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["titulo"] . "</td>";
       //echo "<td>" . $row["texto"] . "</td>";
        $strFinal = substr($row["texto"], 0, 100);
        echo "<td>" . $strFinal ;
           if ($strFinal < $row["texto"]){
           echo " ... ";
                }
        echo "<br><a href='noticia.php?id=" . $row['id'] ."'>Ir a la noticia completa -></a>";
        // echo " <a href='noticia.php?id=" . $row['id'] ."&update=true'>Modificar noticia -></a>";
        echo "</td>";
        echo "<td>" . $row["categoria"] . "</td>";
        echo "<td>" . $row["fecha"] . "</td>";
        echo "<td><img src='" . $row["imagen"] . "' width='120'></td>";
        echo "</tr>";
    }
    ?>

</table>
</div> 
<div class="formulario">
<h1>Introduce una Noticia</h1>
    <form name="form" action="" method="post" >
        <label for="nombre">Titulo:</label>
        <input type="text" id="titulo" name="titulo" >
        <br>
        <label for="texto">Texto:</label>
        <textarea cols="50" rows="5" name="texto" id="texto" placeholder="Escribe aquí tu Noticia..."></textarea>  
        <br>
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" >
        <br>
        <input type="submit" value="Enviar">
    </form>  
</div>  

</body>
</html>