<?php // 
function conexion()
{
    // INI archivo.ini
    $servidor = "localhost";
    $usuario = "usuario_erp";
    $password = "servitec27";
    $database = "noticias";

    // Conexión
    $conexion = mysqli_connect($servidor, $usuario, $password) or die("No se puede conectar con el servidor");
    // Seleccionamos la base de datos
    echo "<p class='texto'>La conexion se ha establecido con éxito</p>";
    mysqli_select_db($conexion, $database) or die("No se puede seleccionar la base de datos");
    return $conexion;
}
function consulta($q)
{
    $conexion = conexion();
    $result = mysqli_query($conexion, $q);
    mysqli_close($conexion);
    return $result;
}
function contar_filas($q){
    $conexion = conexion();
    $result = mysqli_query($conexion, $q);
    $nFilas = mysqli_num_rows($result);
    return $nFilas;
}
function escape($q)
{
    $connection = conexion();
    return mysqli_real_escape_string($connection, $q);
}

function fecthArray($result)
{
    return mysqli_fetch_array($result);
}

/*
function baseDatos()
{
    //realizamos consulta a base de datos
    $selecT = "SELECT * FROM noticia";
    $resultado = mysqli_query(conexion, $selecT) or die("Fallo en la consulta");
    //consultamos la tabla de una lista de la base de datos
    $consultaT = mysqli_query(conexion, "SHOW TABLES");
    // Imprime la base de datos seleccionada
    echo "<p class='texto'>La base de datos seleccionada es: <strong>$database</strong></p>";
    //mostramos que tabla hemos seleccionado
    //recupera una fila de datos del conjunto de resultados y la devuelve como un array enumerado.
    while ($fila = mysqli_fetch_row($consultaT)) {
        $tabla = $fila[0];
    }
    // Imprime la TABLA de base de datos seleccionada
    echo "<p class='texto'>La Tabla seleccionada es: <strong>$tabla</strong></p>";
    //Obtener y procesar los resultados: mysqli_num_rows(), mysqli_fetch_array()
    /*En el caso de que la instrucción enviada produzca unos resultados, mysqli_query() devuelve las filas de la tabla afectadas por la instrucción
mysqli_num_rows() devuelve el número de filas afectadas
Para obtener las distintas filas del resultado se utiliza la función mysqli_fetch_array(), que obtiene una fila del resultado en un array asociativo cada vez que se invoca

    $nfilas = mysqli_num_rows($resultado); //obtiene la cantidad de resultados
    //$fila = mysqli_fetch_array ($resultado);
    mysqli_close(conexion); // Cerramos la conexión
}
*/