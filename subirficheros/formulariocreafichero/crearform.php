<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Formulario fichero</title>
</head>

<body>
    
<h1>Creación de Fichero TXT a traves de Formulario</h1>
<div class="form-container">
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required pattern="[A-Za-z\s]+" title="Ingresa solo letras y espacios" />
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="cursos">Cursos:</label>
        <br>
        <input type="checkbox" id="curso1" name="cursos[]" value="PHP">
        <label for="curso1">PHP</label>
        <br>
        <input type="checkbox" id="curso2" name="cursos[]" value="JAVASCRIPT">
        <label for="curso2">JAVASCRIPT</label>
        <br>
        <input type="checkbox" id="curso3" name="cursos[]" value="CSS">
        <label for="curso3">CSS</label>
        <br>
        <input type="submit" value="Enviar">
    </form>  
</div>  

<?php

function guardarDatosEnArchivo($nombre, $email, $cursos) {
    // Abre o crea un archivo de texto llamado "datos.txt" en modo de escritura (sobrescribe si ya existe)
    $archivo = fopen("datos.txt", "w");

    // Escribe los datos en el archivo
    fwrite($archivo, "Nombre: $nombre\n");
    fwrite($archivo, "Email: $email\n");

    if (!empty($cursos)) //Esta línea verifica si la variable $cursos no está vacía. 
    //Si hay cursos seleccionados (es decir, la variable no está vacía), se ejecutará el bloque de código dentro de las llaves {}.
    {
        fwrite($archivo, "Cursos seleccionados:\n"); //Aquí estamos escribiendo en el archivo $archivo. La cadena "Cursos seleccionados:\n" se escribirá en una nueva línea en el archivo
        foreach ($cursos as $curso) {  // Esta línea inicia un bucle foreach que recorre cada elemento del array $cursos. En cada iteración, el valor actual se almacena en la variable $curso.
            fwrite($archivo, "- $curso\n"); //Dentro del bucle foreach, estamos escribiendo cada curso (almacenado en $curso) precedido por un guión - y seguido de un salto de línea.
        }
    } 
    else { //Si la variable $cursos está vacía (es decir, no hay cursos seleccionados), se ejecutará el bloque de código dentro de estas llaves 
        fwrite($archivo, "No se seleccionó ningún curso.\n");
    }

    // Cierra el archivo
    fclose($archivo);
    echo "<p class='enviado'>Los datos se han guardado correctamente en el archivo datos.txt</p>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $cursos = isset($_POST["cursos"]) ? $_POST["cursos"] : array();
   
        if (empty($nombre)) {
            echo "<p class='error'>El campo nombre está vacío.</p>";
        } elseif (!preg_match("/^[A-Za-z\s]+$/", $nombre)) {
            echo "<p class='error'>El campo nombre debe contener solo letras y espacios.</p>";
        }else{
            echo "<p>Tu Nombre es: $nombre </p>";
           
        }

        if (empty($email)) {
            echo "<p class='error'>El campo email está vacío.</p>";
        }else{
            echo "<p>Tu email es: $email </p>";
            
        }
    
        if (empty($cursos)) {
            echo "<p class='error'>No se seleccionó ningún curso.</p>";
        } else {
            echo "<p>Has seleccionado los siguientes cursos:</p>";
            echo "<ul>";
            foreach ($cursos as $curso) {
                echo "<li>$curso</li>";
            }
            echo "</ul>";
        }
        echo "</br/>";
        guardarDatosEnArchivo($nombre, $email, $cursos);
}
?>

</body>

</html>


