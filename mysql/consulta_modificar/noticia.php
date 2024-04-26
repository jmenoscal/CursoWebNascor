<?php
require('ini.php');
require("db_utils.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilosnoticia.css">
    <title>Document</title>
</head>

<body>

    <div class="cuadro">
        <?php
        // Conexión a la base de datos

        if (!isset($_GET["id"]) && !isset($_POST['id'])) {
            $mensaje = "<h3 style='color:red'>Error. Faltan parámetros necesarios</h3>";
            exit;
        } else {
            return conexion();
            echo "<p class='texto'>La conexion se ha establecido con éxito</p>";
            //seleccionamos la base de datos    
            mysqli_select_db(conexion(), consulta($q)) or die("No se puede utilizar la base de datos");
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            } else {
                $id = $_POST['id'];
            }
        }


        //realizamos consulta a base de datos
        $query = "SELECT * FROM noticia";
        $result = mysqli_query($conexion, $query) or die("Fallo en la consulta");
        //consultamos la tabla de una lista de la base de datos
        $consultaT = mysqli_query($conexion, "SHOW TABLES");
        // Imprime la base de datos seleccionada
        echo "<p class='texto'>La base de datos seleccionada es: <strong>$database</strong></p>";
        //mostramos que tabla hemos seleccionado
        //recupera una fila de datos del conjunto de resultados y la devuelve como un array enumerado.
        while ($fila = mysqli_fetch_row($consultaT)) {
            $tabla = $fila[0];
        }
        // Imprime la TABLA de base de datos seleccionada
        echo "<p class='texto'>La Tabla seleccionada es: <strong>$tabla</strong></p>";
        ?>
    </div>

    <?php
    // Obtén el ID de la noticia desde la URL
    //$id = $_GET['id'];
    // conectamos a la bd y … 

    // Muestra la noticia completa en una tabla
    $consulta = "SELECT * FROM noticia WHERE id = $id";
    $resultado = mysqli_query($conexion, $consulta);
    $noticia = mysqli_fetch_array($resultado);
    $titulo = $noticia["titulo"];
    $texto = $noticia['texto'];
    $categoria = $noticia['categoria'];
    $fecha = $noticia['fecha'];
    $imagen = $noticia['imagen'];
    $mensaje = "$titulo";

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);

    ?>
    <div class="contenedor-noticia">
        <h2 class="title">
            <?php echo $mensaje; ?>
        </h2>
        <div class="image">
            <img src="<?php echo $noticia['imagen']; ?>">
        </div>
        <p class="date">Publicado
            <?php echo $noticia['fecha']; ?>
        </p>
        <div class="text">
            <p>
                <?php echo $noticia['texto']; ?>
            </p>
        </div>
    </div>

    <?php
    if (isset($_GET["modificar"]) || isset($_POST["modificar"])) { ?>
        <div class="contenedor-modificar">
            <h2>Modificar Noticia</h2>
            <form action="noticia.php" method="post">
                <input type="hidden" name="modificar" value="true">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>">
                </div>
                <div class="form-group">
                    <label for="texto">Texto:</label>
                    <textarea cols="50" rows="5" id="texto" placeholder="Escribe aquí tu Nueva Noticia..."> 
                <?php echo $texto; ?>   </textarea>
                </div>
                <div class="form-group">
                    <label for="image">URL de la imagen:</label>
                    <input type="text" id="imagen" name="imagen" value="<?php echo $imagen; ?>">
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <input type="text" id="categoria" name="categoria" value="<?php echo $categoria; ?>">
                </div>
                <div class="form-group">
                    <label for="date">Fecha de publicación:</label>
                    <?php echo $fecha; ?>
                </div>
                <div class="form-group">
                    <input type="submit" value="Guardar Cambios">
                </div>
                
            </form>
        <?php } ?>
        <a href="index.php">Volver a la página principal</a>
        </div>


    <form action="tu_archivo_php.php" method="post">
    <label for="categoria">Categoría:</label><br>
    <input type="text" id="categoria" name="categoria"><br>
    <input type="submit" value="Buscar">

    
</form>

</body>

</html>