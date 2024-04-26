<?php 


if (!isset ($_GET["id"])) {
    $mensaje = "ERROR: Faltan parámetros requeridos <a href='index.php'>Volver</a>";
    echo $mensaje;
    exit;

} else {
    $id = $_GET["id"];
    // INI archivo.ini
    $host = "localhost";
    $user = "administrador@wayhoy.com";
    $password = "ablaracurcix";
    $database = "noticias";
    // Conexión
    $conexion = mysqli_connect($host, $user, $password) or die ("No se puede conectar con el servidor");
    //
    // Seleccionamos la base de datos
    mysqli_select_db($conexion, $database) or die ("No se puede seleccionar la base de datos");

    $q = "SELECT * FROM noticias WHERE id=$id";
    $result = mysqli_query($conexion, $q);
    $noticia = mysqli_fetch_array($result);
    $titulo = $noticia['titulo'];
    $texto = $noticia['texto'];
    $categoria = $noticia['categoria'];
    $fecha = $noticia['fecha'];
    $imagen = $noticia['imagen'];
    $mensaje = $titulo;
    mysqli_close($conexion);
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticia Profesional</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .news-card {
            width: 350px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
            overflow: hidden;
        }

        .news-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .news-info {
            text-align: center;
        }

        .news-info h2 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }

        .news-info p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }

        .news-info .date {
            font-style: italic;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="title">
            <?php echo $mensaje; ?>
        </h2>
        <div class="image">
            <img src="<?php echo $imagen; ?>" alt="Imagen de la noticia">
        </div>
        <p class="date">Publicado
            <?php echo $fecha; ?>
        </p>
        <div class="text">
            <p>
                <?php echo $texto; ?>
            </p>
        </div>
        <p class="author">Categoría: <?php echo $categoria; ?></p>
    </div>
    <!-- Comienza el formulario -->
    <?php 
    if (isset($_GET['modificar'])){ ?>
    <div class="container">
    <h2>Modificar Noticia</h2>
    <form action="modificar.php" method="post">
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" id="titulo" name="titulo" value="Título de la noticia">
        </div>
        <div class="form-group">
            <label for="text">Texto:</label>
            <textarea id="texto" name="texto" rows="4">
            <?php echo $texto; ?>
            </textarea>
                 </div>
        <div class="form-group">
            <label for="image">URL de la imagen:</label>
            <input type="text" id="imagen" name="imagen" value="<?php echo $imagen; ?>">
        </div>
        <div class="form-group">
            <label for="date">Fecha de publicación:</label>
            <input type="text" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
        </div>
        <div class="form-group">
            <label for="categoria">Fecha de publicación:</label>
            <input type="text" id="categoria" name="categoria" value="<?php echo $categoria; ?>">
        </div>
        <div class="form-group">
            <input type="submit" value="Guardar Cambios">
        </div>
    </form>
    <?php } ?>
</div>    
</body>

</html>