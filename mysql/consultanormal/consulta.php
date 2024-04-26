<?php

$servidor ="localhost";
$usuario="usuario_erp";
$password="servitec27";

$conexion = mysqli_connect ($servidor, $usuario, $password)
   or die ("No se puede conectar con el servidor");
   echo "La conexion se ha establecido<br>";
    $database = "noticias";

//seleccionamos la base de datos    
   mysqli_select_db($conexion, $database) or die("No se puede utilizar la base de datos");
   echo "Hemos seleccionado la base de datos $database <br>";
//realizamos consulta a base de datos
$selecT= "SELECT * FROM noticia";
$resultado = mysqli_query($conexion, $selecT) or die("Fallo en la consulta");
//mostramos que tabla hemos seleccionado
$consultaT = mysqli_query($conexion, "SHOW TABLES");
// Imprime las tablas en una lista
echo "Tablas en la base de datos $database:<br>";
//recupera una fila de datos del conjunto de resultados y la devuelve como un array enumerado.
while ($fila = mysqli_fetch_row($consultaT)) {  
    $tabla =$fila[0];
}
echo "La Tabla seleccionada es: $tabla <br>";
//Obtener y procesar los resultados: mysqli_num_rows(), mysqli_fetch_array()
/*En el caso de que la instrucción enviada produzca unos resultados, mysqli_query() devuelve las filas de la tabla afectadas por la instrucción
mysqli_num_rows() devuelve el número de filas afectadas
Para obtener las distintas filas del resultado se utiliza la función mysqli_fetch_array(), que obtiene una fila del resultado en un array asociativo cada vez que se invoca
*/
$nfilas = mysqli_num_rows ($resultado); //obtiene la cantidad de resultados
//$fila = mysqli_fetch_array ($resultado);
mysqli_close ($conexion); // Cerramos la conexión


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTAS EN PHP DESDE MYSQL</title>
</head>
<body>
<h1>CONSULTAS EN PHP DESDE MYSQL</h1>
<?php
echo  "Tenemos $nfilas usuarios<hr>";
   while ($row = mysqli_fetch_array($resultado)) {
   /*    $fecha = strtotime($row["fecha"]);
       $fecha = date('m/d/Y', $fecha);*/
       echo
      // "id: ".$row["id"]."<br>
       "Título: <b>" .$row["titulo"]."</b><br>
       Texto: <b>" .$row["texto"]."</b><br>
       Categoría: <b>" .$row["categoria"]."</b><br>
       Fecha de publicación: <b>" .$row["fecha"]."</b><br>
       <img src='" .$row["imagen"]."' width='120'>
       <hr>"
       ;
   }
   
   ?>

</body>
</html>