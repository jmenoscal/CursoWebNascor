<?php
// INI archivo.ini
$host = "localhost";
$user = "usuario_erp";
$password = "servitec27";
$database = "noticias";

// Conexión

if (!isset ($_GET["id"]) && !isset($_POST['id'])) {
    $mensaje = "<h3 style='color:red'>Error. Faltan parámetros necesarios</h3>";
    exit;
} else {
    $conexion = mysqli_connect($host, $user, $password) or die ("No se puede conectar con el servidor");
    //
    // Seleccionamos la base de datos

    mysqli_select_db($conexion, $database) or die ("No se puede seleccionar la base de datos");
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = $_POST['id'];
    }

}

if (isset ($_POST["modificar"])) {
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $categoria = $_POST['categoria'];
    $imagen = $_POST['imagen'];
    $q = "UPDATE noticia SET titulo = '$titulo',texto='$texto',categoria='$categoria',imagen='$imagen' WHERE id='$id'";
   if (!$result = mysqli_query($conexion, $q)){
    $mensaje = "ERROR: Faltan parámetros requeridos <a href='index.php'>Volver</a>";
    echo $mensaje;
    exit;
   }
   
}

$q = "SELECT * FROM noticia WHERE id = $id";
$result = mysqli_query($conexion, $q);
$noticia = mysqli_fetch_array($result);
$titulo = $noticia["titulo"];
$texto = $noticia['texto'];
$categoria = $noticia['categoria'];
$fecha = $noticia['fecha'];
$imagen = $noticia['imagen'];
$mensaje = "$titulo";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha noticia</title>
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

<div class="news-card">
        <img src="<?php echo $imagen; ?>" alt="Imagen de la noticia">
        <div class="news-info">
            <h2>
                <?php echo $mensaje; ?>
            </h2>
            <p>
                <?php echo $texto; ?><br>
            </p>
            Fecha de publicación: <br>
            <p class="date">
                <?php echo $fecha; ?>
            </p>
        </div>
</div>
        <?php
        if (isset ($_GET["modificar"]) || isset ($_POST["modificar"])) { ?>
<div class="container">
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
                        <textarea id="texto" name="texto" rows="4">
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
</div>
</body>
</html>