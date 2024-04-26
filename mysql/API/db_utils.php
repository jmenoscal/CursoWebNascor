<?php // INI archivo.ini
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

function conectar()
{
    // INI archivo.ini
    $host = "localhost";
    $user = "usuario_erp";
    $password = "servitec27";
    $database = "noticias";

    // Conexión
    $conexion = mysqli_connect($host, $user, $password) or die("No se puede conectar con el servidor");
    // Seleccionamos la base de datos
    mysqli_select_db($conexion, $database) or die ("No se puede seleccionar la base de datos");
    return $conexion;
}
function consulta($q)
{
    $conexion = conectar();
    $result = mysqli_query($conexion, $q);
    mysqli_close($conexion);
    return $result;
}
function contar_filas($q)
{
    $result = consulta($q);
    $nFilas = mysqli_num_rows($result);
    return $nFilas;
}

function escape($q)
{
    $connection = conectar();
    return mysqli_real_escape_string($connection, $q);
}

function fecthArray($result)
{
    return mysqli_fetch_array($result);
}
