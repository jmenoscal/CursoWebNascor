<?php
require('ini.php');
require ("db_utils.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>CONSULTAS EN PHP DESDE MYSQL CON ENLACE</title>
</head>

<body>
    <div class="cuadro">
        <?php
        // Comprobamos si recibimos datos por post para insertarlos en la base de datos. 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
            /// *** LOGIN *** ///
            if (!isset($_POST['password'])) {
                http_response_code(400);
                $aviso = "Debes introducir un password <a class='button' href='login.html'>login</a>";
            } else {
                ///Lógica seguridad/usuarios///
                $email = $_POST['email'];
                $password = $_POST['password'];

                if (!user($email, $password)) {
                    $aviso = "Usuario o contraseña no válidos: Vuelve a intentarlo <a href='login.html'>Volver al formulario</a>";
                }
            }
            $aviso = "Hola $email.  <a class='button' href='index.php?logout=true'>logout</a>";

            //FIN Lógica seguridad/usuarios ///
        } else if   //comprobamos si recibimos datos de POST para insertarlos en la base de datos.
        /// Envían el formulario de inserción de posts
        // Recogemos los datos del formulario
        ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titulo = $_POST['titulo'];
            $texto = $_POST['texto'];
            $categoria = $_POST['categoria'];
            $imagen = "img/default.jpg";
            if (isset($_FILES["file"]) && $_FILES['file']['size'] > 0) {
                $imagePath = "img/" . $_FILES["file"]["name"];
                if (!move_uploaded_file($_FILES["file"]["tmp_name"], $imagePath)) {
                    $mensaje = "ERROR: No se ha subido la noticia <a href='index.php'>Volver</a>";
                    echo $mensaje;
                    exit;
                }
                $imagen = $imagePath;
            }
            $user_id = $_POST['user_id']; //
            $q = "INSERT INTO noticia SET titulo='$titulo', texto='$texto', categoria='$categoria', user_id='$user_id'"; // 
            // Procedemos a insertar los datos.
            $insert = mysqli_query($conexion, $q);
            echo "$insert";
            //mysqli_query(conexion(), $q);
            // Redirige a una página de confirmación o resultados
            //evita la duplicación de datos cuando se reenvia la solicitud POST después de enviar el formulario o se actualiza o se vuelve atrás.
           // header("Location: index.php");
           // exit;
                
} else if (isset($_SESSION['user'])){
    $aviso = "Hola ".$_SESSION['email']. "<a class='button' href='index.php?logout=true'>logout</a>";
}

//realizamos consulta a base de datos
$query = "SELECT * FROM noticia";
$result = consulta($query);

        ?>
    </div>
    <div class="contenedor">
        <h1>CONSULTAS EN PHP DESDE MYSQL</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Texto</th>
                <th>Categoría</th>
                <th>Fecha de publicación</th>
                <th>Imagen</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["titulo"] . "</td>";
                //echo "<td>" . $row["texto"] . "</td>";
                $strFinal = substr($row["texto"], 0, 100);
                echo "<td>" . $strFinal;
                if ($strFinal < $row["texto"]) {
                    echo " ... ";
                }
                echo "<br><a href='noticia.php?id=" . $row['id'] ."'>Ir a la noticia completa -></a>";
                echo " <a href='noticia.php?id=" . $row['id'] ."&modificar=true'>Modificar noticia -></a>";
                echo "</td>";
                echo "<td>" . $row["categoria"] . "</td>";
                echo "<td>" . $row["fecha"] . "</td>";
                echo "<td><img src='" . $row["imagen"] . "' width='120'></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div> 
    <div class="formulario">
        <h1>Introduce una Noticia</h1>
        <form name="form" action="" method="post" enctype="multipart/form-data">
            <label for="nombre">Titulo:</label>
            <input type="text" id="titulo" name="titulo" required>
            <br>
            <label for="texto">Texto:</label>
            <textarea cols="50" rows="5" name="texto" id="texto" placeholder="Escribe aquí tu Noticia..." required></textarea>  
            <br>
            <label for="categoria">Categoria:</label>
            <input type="text" id="categoria" name="categoria" required>
            <br>
            <label for="file">Imagen:</label>
            <input type="file" id="file" name="file">
            <br>
            <input type="hidden" id="user_id" name="user_id" value='<?php echo $_SESSION['user_id']; ?>'>
            <br>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
