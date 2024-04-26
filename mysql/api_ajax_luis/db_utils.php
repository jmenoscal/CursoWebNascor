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
function conectar(){
    $host = "localhost";
    $user = "usuario_erp";
    $password = "servitec27";
    $database = "noticias";
    // Conexión
    $conexion = mysqli_connect($host, $user, $password) or die ("No se puede conectar con el servidor");
    //
    // Seleccionamos la base de datos
    mysqli_select_db($conexion, $database);

    return $conexion;
}

function quer($q){
    $conexion = conectar();
    $result = mysqli_query($conexion, $q);
    mysqli_close($conexion); // Cerramos la conexión
    return $result;
}
function MyCount($q){
    $conexion = conectar();
    $nfilas = mysqli_num_rows(quer($q));
    mysqli_close($conexion); // Cerramos la conexión
    return $nfilas;
}