<?php
// INI archivo.ini
$host = "localhost";
$user = "usuario_erp";
$password = "servitec27";
$database = "noticias";

// Conexión
$conexion = mysqli_connect($host, $user, $password) or die ("No se puede conectar con el servidor");

//
// Seleccionamos la base de datos

mysqli_select_db($conexion, $database) or die ("No se puede seleccionar la base de datos");

// Comprobamos si recibimos datos por post para insertarlos en la base de datos. 
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    // Recogemos los datos del formulario
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $categoria = $_POST['categoria'];
    // Creamos la consulta sql
    $q="INSERT INTO noticias SET titulo='$titulo', texto='$texto', categoria='$categoria'";
    // Procedemos a insertar los datos.
    mysqli_query($conexion, $q);
}
// Hacemos una consulta a una tabla
$query = "SELECT * FROM noticia";
$result = mysqli_query($conexion, $query) or die ("Fallo en la consulta");

$nfilas = mysqli_num_rows($result); // Obtiene la cantidad de resultados de la consulta
//$fila = mysqli_fetch_array($result);

mysqli_close($conexion); // Cerramos la conexión

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexión a Mysql</title>
    <style>
        td {
            border: 1px solid black;
            padding: 10px
        }

        table {
            margin: 40px
        }

        img {
            height: 80px;
        }

        span {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>

<body>
<!-- Comenzamos la tabla de datos -->
    <table>
        <tr>
            <th colspan="6">
                <?php echo "Tenemos $nfilas usuarios<hr>"; ?>
            </th>
        </tr>
<!-- Fila de campos de la tabla de datos -->
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Texto</th>
            <th>Categoría</th>
            <th>Fecha</th>
            <th>Imagen</th>
        </tr>
        <?php

// Bucle sobre los resultados obtenidos. 
        while ($row = mysqli_fetch_array($result)) {

            ?>
            <!-- Dibijamos las filas -->
            <tr>
                 <!-- Dibijamos las celdas -->
                <td>
                    <?php echo $row["id"]; ?>
                </td>
                <td>
                    <?php echo $row["titulo"]; ?>
                </td>
                <td>
                    <?php
                        $strFinal = substr($row["texto"], 0, 100);

                        echo substr($row["texto"], 0, 100);
                        if ($strFinal < $row["texto"]){
                            echo "... ";
                        }
                        echo " <br><a href='noticia.php?id=" . $row['id'] ."'>Ir a la noticia completa -></a><br>";
                        echo " <br><a href='noticia.php?id=" . $row['id'] ."&modificar=true'>Modificar noticia -></a><br>";
                      ?>
                <form name="form" action="eliminar.php" method="POST" enctype="multipart/form-data">
                    Título:<br>
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>"><br>
                    <input type="submit" value="eliminar" class="eliminar">
                </form>
                </td>
                <td>
                    <?php echo $row["categoria"]; ?>
                </td>
                <td>
                    <?php echo $row["fecha"]; ?>
                </td>
                <td>
                    <img src="<?php echo $row["imagen"]; ?>">
                </td>
            </tr>
        <?php }
        ?>
         <!-- Una nueva línea para albergar el formulario -->
        <tr>
             <!-- Esa línea sólo tiene una celda (De ahí colspan="6") --> 
            <td colspan="6" style="padding:30px">
                <h2>Introduce una noticia</h2>
                <!-- Introducimos el formulario --> 
                <form name="form" action="index.php" method="POST" enctype="multipart/form-data">
                    Título:<br>
                    <input type="text" name="titulo"><br>
                    Texto:<br>
                    <input type="text" name="texto"><br>
                    Categoría:<br>
                    <input type="text" name="categoria"><br>
                    <input type="file" name="file" >
                    <input type="submit" value="Añanir">
                </form>
            </td>
        </tr>
    </table>

</body>

</html>