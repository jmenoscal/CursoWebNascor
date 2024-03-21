<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GRID VERSION PHP JOEL</title>
	<link rel="stylesheet" type="text/css" href="grid3.css">
</head>

<?php
// Creamos un array con los datos del contenido web
$datos = array(
    array(
        "<h2>¿Cómo somos?</h2>",
        "<p>Honestos, ágiles y eficientes.</p>",
        "imagenes/llegar.png"
    ),
    array(
        "<h2>¿Qué se nos da bien?</h2>",
        "<p>Dotar a las compañías de las soluciones que lideran el mercado, asegurando el éxito de la implantación y su calidad.</p>",
        "imagenes/que_se_nos_da_bien.png"
    ),
    array(
        "<h2>¿Cómo hemos llegado hasta aquí?</h2>",
        "<p>Con pasión y esfuerzo en nuestro trabajo, y con la colaboración de nuestros clientes desde hace más de 25 años.</p>",
        "imagenes/llegar.png"
    ),
    array(
        "<h2>Cómo trabajamos</h2>",
        "<p>Con nuestra propia metodología qImplanta que nos asegura el éxito y la calidad de los proyectos, implantando las soluciones de manera más efectiva.</p>",
        "imagenes/quienes_somos.png"
    )
);

// Generamos el HTML utilizando los datos creados en el array
echo '<body>';
$alternarImagen = true; // Variable para alternar entre imagen y texto

foreach ($datos as $bloque) {
    echo '<div class="caja">';
    if ($alternarImagen) {
        echo '<img src="' . $bloque[2] . '">'; //accedemos al array de la imagen
        echo '<div class="texto">';
        echo $bloque[0]; //accedemos al array H2
        echo $bloque[1]; //accedemos al array P
        echo '</div>';
    } else {
        echo '<div class="texto">';
        echo $bloque[0];
        echo $bloque[1];
        echo '</div>';
        echo '<img src="' . $bloque[2] . '" class="ordenInverso">'; // Aplicamos la clase ordenInverso a la imagen dentro del array
    }
    echo '</div>';
    $alternarImagen = !$alternarImagen; // Cambiamos el valor de la variable
}
echo '</body>';
?>

</body>
</html>