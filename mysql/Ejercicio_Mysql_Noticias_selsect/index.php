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
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recogemos los datos del formulario
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $categoria = $_POST['categoria'];
    // Tratamiento de imagen
    $imagen = "img/default.jpg";
    if (isset($_FILES["file"]) && $_FILES['file']['size'] > 0){
        $imagePath = "img/" . $_FILES["file"]["name"];
        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $imagePath)) {
            $mensaje = "ERROR: No se ha subido la noticia <a href='index.php'>Volver</a>";
            echo $mensaje;
            exit;
        }
        $imagen = $imagePath;
    }
    // Creamos la consulta sql
    $q = "INSERT INTO noticia SET titulo='$titulo', texto='$texto', categoria='$categoria', imagen='$imagen'";
    // Procedemos a insertar los datos.
    mysqli_query($conexion, $q);
}
$desde = 0;
// Hacemo una consulta a una tabla
if (isset($_GET['desde']));
//$desde = $_GET['desde'];
//$hasta = $desde +5;
// Añadiremos LIMIT
$query = "SELECT * FROM noticia";
$result = mysqli_query($conexion, $query) or die ("Fallo en la consulta");

$nfilas = mysqli_num_rows($result); // Obtiene la cantidad de resultados de la consulta
//$fila = mysqli_fetch_array($result);

$query = "SELECT DISTINCT categoria FROM noticia ORDER BY categoria";
$resultCats = mysqli_query($conexion, $query);
mysqli_close($conexion); // Cerramos la conexión

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexión a Mysql</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        form {
            width:60%;
            max-width: 400px;
            margin: 20px auto;
            /*padding: 20px;*/
            background-color: transparent;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="file"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .eliminar {
            background-color: red !important;
            width:100% !important
        }

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
                    if ($strFinal < $row["texto"]) {
                        echo "... ";
                    }
                    echo " <br><a href='noticia.php?id=" . $row['id'] . "'>Ir a la noticia completa -></a><br>";
                    echo " <br><a href='noticia.php?id=" . $row['id'] . "&modificar=true'>Modificar noticia -></a><br>";
                    ?>
                    <form action="eliminar.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="submit" value="Eliminar" class="eliminar">
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

    </table>
    <form name="form" action="index.php" method="POST" enctype="multipart/form-data">
        Título:<br>
        <input type="text" name="titulo"><br>
        Texto:<br>
        <input type="text" name="texto"><br>
        Categoría:<br>

        <input list="categorias" type="text" name="categoria" value=""><br>
        <datalist id="categorias">
        <?php while ($row= mysqli_fetch_array($resultCats)) {?>
                    <option value="<?php echo $row['categoria'];?>"><?php echo $row['categoria'];?></option>
        <?php } ?>
        </datalist>

        <input type="file" name="file">
        <input type="submit" value="Añanir">
    </form>
</body>

</html>