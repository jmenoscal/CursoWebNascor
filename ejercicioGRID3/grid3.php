<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="grid3.css">
	<title>EJERCICIO GRID3 PHP</title>

</head>
<body>
<?php
$datos = array(
array("<h2>¿Cómo somos?</h2>" , "<p>Honestos, ágiles y eficientes.</p>" , "imagenes/llegar.png"),
array("<h2>¿Qué se nos da bien?</h2>" , "<p>Dotar a las compañías de las soluciones que lideran el mercado, asegurando el éxito de la implantación y su calidad.</p>" , "imagenes/que_se_nos_da_bien.png"),
array("<h2>¿Cómo hemos llegado hasta aquí?</h2>" , "<p>Con pasión y esfuerzo en nuestro trabajo, y con la colaboración de nuestros clientes desde hace más de 25 años.</p>" ,  "imagenes/llegar.png"),
array("<h2>Cómo trabajamos</h2>" , "<p>Con nuestra propia metodología qImplanta que nos asegura el éxito y la calidad de los proyectos, implantando las soluciones de manera más efectiva.</p>" , "imagenes/quienes_somos.png")
);

$clase = "";
foreach ($datos as $dato) {
    if ($clase == "ordenInverso") {  //Se verifica el valor de la variable $clase para alternar entre dos clases CSS: "ordenInverso" y una cadena vacía.
        $clase = "";
    } else {
        $clase = "ordenInverso";
    }
    echo '<div class="caja">';
    echo '<img src="' . $dato[2] . '" class="' . $clase . '">';  // si $dato[2] contiene "mi_imagen.jpg" y $clase contiene "mi_clase", el resultado sería: <img src="mi_imagen.jpg" class="mi_clase">
    echo '<div class="texto">';
    echo '<h2>' . $dato[0] . '</h2>';
    echo '<p>' . $dato[1] . '</p>';
    echo '</div>';
    echo '</div>';
}
?>

</body>
</html>

