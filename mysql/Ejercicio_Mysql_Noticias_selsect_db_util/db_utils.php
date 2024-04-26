<?php
// INI archivo.ini
function conexion() {
$host = "localhost";
$user = "usuario_erp";
$password = "servitec27";
$database = "noticias";

// Conexión
$conexion = mysqli_connect($host, $user, $password) or die ("No se puede conectar con el servidor");

//
// Seleccionamos la base de datos

mysqli_select_db($conexion, $database) or die ("No se puede seleccionar la base de datos");
}

function query($q) {
    $conexion = conexion();
    $result = mysqli_query($conexion,$q);
    mysqli_close($conexion);
    return $result;

}

function contar_filas($q) {
    $result = query($q);
    $nFilas = mysqli_num_rows($result);
    return $nFilas;
}


function escape($q){
    $connection = conexion();
    return mysqli_real_escape_string($connection, $q);
    }