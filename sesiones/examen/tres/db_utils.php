<?php
function connect_to_db()
{
    $servidor = "localhost";
    $usuario = "usuario_erp";
    $password = "servitec27";
    $database = "noticias";

    $conexion = mysqli_connect($servidor, $usuario, $password)
        or die("No se puede conectar con el servidor");

    mysqli_select_db($conexion, $database) or die("No se puede utilizar la base de datos");

    return $conexion;
}

function get_table($table_name) // la tabla dependera del argumento que pasemos a la función get_table('argumento')
{
    // Conecta a la base de datos
    $conexion = connect_to_db();
    // Crea la consulta SQL
    $selecT = "SELECT * FROM $table_name";
    // Ejecuta la consulta SQL y almacena el resultado
    $resultado = mysqli_query($conexion, $selecT) or die("Fallo en la consulta");
    // Devuelve el resultado
    return $resultado;
}

function get_by_id($table_name, $id)
{
    $conexion = connect_to_db();
    $selecT = "SELECT * FROM $table_name WHERE id='$id'";
    $resultado = mysqli_query($conexion, $selecT) or die("Fallo en la consulta");
    return mysqli_fetch_assoc($resultado);
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

function get_username($user_id)
{
    $conexion = connect_to_db();
    $q = "SELECT nombre FROM usuarios WHERE id='$user_id'";
    $result = mysqli_query($conexion, $q);
    if ($user = fetch_array($result)) {
        return $user['nombre'];
    } else {
        return null;
    }
}

function get_news_count()
{
    $conexion = connect_to_db();
    $q = "SELECT COUNT(*) as count FROM noticia";
    $result = mysqli_query($conexion, $q);
    if ($count = fetch_array($result)) {
        return $count['count'];
    } else {
        return 0;
    }
}

function escape_string($conexion, $string)
{
    return mysqli_real_escape_string($conexion, $string);
}


function tiempo()
{
    $date = date("H");
    if ($date < 12) echo "Buenos dias!";
    else if ($date < 18) echo "Buenas tardes!"; 
    else echo "Buenas noches!";
}


function user_exists($conexion, $nombre, $email) {
    $q = "SELECT * FROM usuarios WHERE nombre='$nombre' OR email='$email'";
    $result = mysqli_query($conexion, $q);
    return mysqli_num_rows($result) > 0;
}