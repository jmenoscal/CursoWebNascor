<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Constructor y Modificadores</title>
</head>
<style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        .contenedor {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f7f9;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 96%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }


/* Estilo para la tarjeta de presentación */
.card {
    border: 1px solid #ccc;
    padding: 20px;
    margin: 20px auto; /* Centrar horizontalmente y agregar espacio */
    max-width: 400px; /* Tamaño máximo */
    background-color: aquamarine; /* Color de fondo */
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center; /* Centrar el texto horizontalmente */
    transition: background-color 0.3s ease; /* Efecto de transición en el color de fondo */
}

/* Estilo para los títulos */
.card h2 {
    font-size: 18px;
    margin-bottom: 10px;
    color: #333; /* Color de letra */
}

/* Estilo para los párrafos */
.card p {
    font-size: 14px;
    margin-bottom: 5px;
    color: #666; /* Color de letra más claro */
}

/* Estilo para los datos del usuario */
.card strong {
    font-weight: bold;
}

/* Estilo para el mensaje de no envío de datos */
.no-data {
    color: red;
    font-style: italic;
}

/* Efecto de hover en las letras */
.card:hover {
    background-color: #e0e0e0; /* Cambia el color de fondo al pasar el ratón por encima */
    color: #444; /* Cambia el color de letra */
}

</style>
<body>

<div class="contenedor">
<h1>Introduce tus datos</h1>
    <form method="post" action="index.php">
        <label for="nombre">Nombres y Apellidos:</label>
        <input type="text" id="nombre" name="nombre" >
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br>
        <label for="empleo">Empleo:</label>
        <input type="text" id="empleo" name="empleo" >
        <br>
        <label for="titulacion">Titulación:</label>
        <input type="text" id="titulacion" name="titulacion" >
        <br>
        <label for="comentario">Hablanos de ti:</label>
        <textarea cols="50" rows="5" name="comentario" id="comentario" placeholder="Escribe aquí tu comentario..."></textarea>  
        <input type="submit" value="Enviar">
    </form>  
</div>      

<?php
//creamos la clase
class Persona {
    private $nombre;
    private $email;
    private $empleo;
    private $titulacion;
    private $comentario;
// Constructor
public function __construct($nombre, $email, $empleo, $titulacion, $comentario) {
    $this->nombre = $nombre;
    $this->email = $email;
    $this->empleo = $empleo;
    $this->titulacion = $titulacion;
    $this->comentario = $comentario;
}

// Métodos para acceder a los atributos
public function getNombre() {
    return $this->nombre;
}

public function getEmail() {
    return $this->email;
}

public function getEmpleo() {
    return $this->empleo;
}

public function getTitulacion() {
    return $this->titulacion;
}

public function getComentario() {
    return $this->comentario;
}

/*
// Métodos para modificar los atributos
public function setNombre($nombre) {
    $this->nombre = $nombre;
}*/

}

$persona = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $empleo = $_POST["empleo"];
    $titulacion = $_POST["titulacion"];
    $comentario = $_POST["comentario"];
    // Creamos una instancia de Persona
    $persona = new Persona($nombre, $email, $empleo, $titulacion, $comentario);
}

?>

<div class="card">
    <?php
    if ($persona) {
        echo "<h2>Datos del usuario:</h2>";
        echo "<p><strong>Nombre:</strong> " . $persona->getNombre() . "</p>";
        echo "<p><strong>Email:</strong> " . $persona->getEmail() . "</p>";
        echo "<p><strong>Empleo:</strong> " . $persona->getEmpleo() . "</p>";
        echo "<p><strong>Titulación:</strong> " . $persona->getTitulacion() . "</p>";
        echo "<p><strong>Comentario:</strong> " . $persona->getComentario() . "</p>";
    } else {
        echo "<p class='no-data'>No se han enviado datos del formulario.</p>";
    }
    ?>
</div>

</body>
</html>