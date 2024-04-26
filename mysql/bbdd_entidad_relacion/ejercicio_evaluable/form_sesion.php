<?php
// Iniciar la sesión
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_SESSION['datos_introducidos'])) {
    $nombre = $_POST['nombre'];
    $pass = $_POST['password'];
    $email = $_POST['email'];

    $servidor = "localhost";
    $usuario = "usuario_erp";
    $password = "servitec27";
    $database = "noticias";

    // Conexión a la base de datos
    $conexion = mysqli_connect($servidor, $usuario, $password, $database)
        or die("No se puede conectar con el servidor");


    // Seleccionamos la base de datos    
    mysqli_select_db($conexion, $database) or die("No se puede utilizar la base de datos");

    // Preparar la consulta SQL
    $consulta = "INSERT INTO usuarios (nombre, password, email) VALUES ('$nombre', '$pass', '$email')";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $consulta)) {
        echo "Nuevo registro creado con éxito";
    } else {
        echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
    }

    // Realizamos la consulta a la base de datos
    $resultado = mysqli_query($conexion, "SELECT nombre, email FROM usuarios");

    //creamos la tabla y la mostramos
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Email</th>";
    echo "</tr>";

    while ($fila = mysqli_fetch_array($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["email"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    /*
//Otra version
echo "<table border='1'>";
echo "<tr><th>Nombre</th><th>Email</th></tr>";

// Verificamos si la consulta devolvió algún resultado
if (mysqli_num_rows($resultado) > 0) {
    // Imprimimos los resultados en una tabla HTML
    while($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr><td>" . $fila["nombre"]. "</td><td>" . $fila["email"]. "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>No se encontraron resultados</td></tr>";
}

echo "</table>";
*/



    // Redirigir a la misma página para evitar la duplicación de datos al actualizar
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;

    // Guardamos los datos en la sesión
    $_SESSION['datos_introducidos'] = true;
    
    // Cerrar la conexión
    mysqli_close($conexion);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Evaluable</title>
</head>

<body>

    <h2>Formulario de Registro</h2>

    <form action="form_sesion.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="apellido">Nuevo Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>
        <input type="submit" value="Registrar">
    </form>

</body>

</html>