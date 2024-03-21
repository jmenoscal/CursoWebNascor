<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GRID VERSION PHP JOEL</title>
	<link rel="stylesheet" type="text/css" href="grid3.css">
</head>

<?php
// Creamos un array multidimensional con los datos del contenido web
$datos = array(  //$datos es un array principal que contiene varios arrays secundarios (también conocidos como subarrays o arrays anidados).
    array(  //Cada subarray representa un bloque de información con tres elementos: un encabezado (<h2>), un párrafo (<p>), y la ruta de una imagen.
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
echo '<body>'; //Esta línea imprime la etiqueta de apertura <body> en el HTML. Es el inicio del contenido visible en la página web.
$alternarImagen = true; // Variable para alternar entre imagen y texto
//Aquí se declara una variable llamada $alternarImagen y se le asigna el valor true. Esta variable se utilizará para alternar entre mostrar imágenes y texto en cada iteración del bucle foreach

foreach ($datos as $bloque) {    //recorremos el array $datos. En cada iteración, se asigna el valor actual del array a la variable $bloque
    echo '<div class="caja">';  // mprime la etiqueta de apertura <div> con la clase CSS “caja”. Esto crea un contenedor para cada bloque de contenido (imagen y texto).
    if ($alternarImagen) {  // Si $alternarImagen es verdadero (es decir, true), se ejecuta el siguiente bloque de código.
        echo '<img src="' . $bloque[2] . '">'; //creamos etiqueta img, concatenamos con . el tercer elemento del array y cerramos etiqueta img >
        echo '<div class="texto">';  // Imprime la etiqueta de apertura <div> con la clase CSS “texto”. Esto crea un contenedor para el texto relacionado con la imagen.
        echo $bloque[0]; //accedemos al array <h2> y lo imprimos en la web
        echo $bloque[1]; //accedemos al array <p> y lo imprimos en la web
        echo '</div>'; //Cierra la etiqueta <div> para el texto.
    } else {  //Si $alternarImagen no es verdadero (es decir, false), se ejecuta el siguiente bloque de código.
        echo '<div class="texto">'; //crea un contenedor para el texto.
        echo $bloque[0];  //Muestra el contenido del primer elemento del array $bloque.
        echo $bloque[1];  //Muestra el contenido del segundo elemento del array $bloque.
        echo '</div>'; //Cierra la etiqueta <div> para el texto.
        echo '<img src="' . $bloque[2] . '" class="ordenInverso">'; // Aplicamos la clase ordenInverso a la imagen dentro del array
    }   //Crea otra etiqueta de imagen, pero esta vez con una clase CSS adicional llamada “ordenInverso”. La ruta de la imagen proviene del tercer elemento del array $bloque
    echo '</div>';  //Cierra la etiqueta <div> para el bloque completo (imagen y texto).
    $alternarImagen = !$alternarImagen; // Cambiamos el valor de la variable
}   //Cambia el valor de $alternarImagen a su opuesto (si era true, ahora será false, y viceversa). Esto asegura que en la próxima iteración del bucle se alterne entre mostrar imágenes y texto.
echo '</body>';  // Imprime la etiqueta de cierre </body> en el HTML. Es el final del contenido visible en la página web.
?>

</body>
</html>