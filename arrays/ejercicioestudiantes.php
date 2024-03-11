<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARRAY ESTUDIANTES</title>
</head>
<body>

<?php

    $estudiantes = array(
        array(
            "nombre" => "Juan",
            "edad" => 20,
            "notas" => array(9, 8, 6)
        ),
        array(
            "nombre" => "María",
            "edad" => 22,
            "notas" => array(7, 9, 6)
        ),
        array(
            "nombre" => "Carlos",
            "edad" => 21,
            "notas" => array(8, 9, 7)
        ),
        array(
            "nombre" => "Laura",
            "edad" => 23,
            "notas" => array(6, 8, 9)
        )
    );
// EJEMPLO echo $coches[0][0].": En stock: ".$coches[0][1]."
// Accedemos a la edad de Juan

//Accedemos a la edad de Juan";   
$edad_maria = $estudiantes[1]["edad"];

// Imprimimos la edad de Juan
echo "La edad de Maria es: " . $edad_maria . "<br><br>";

//La segunda nota de Carlos.
$nota_carlos = $estudiantes[2]["notas"][1];
echo "La segunda nota de Carlos es: " . $nota_carlos . "<br><br>";

//El nombre de todos los estudiantes.
echo "Imprimimos los nombres de todos los estudiantes: <br>";
foreach ($estudiantes as $nombres_estudiantes) {
    echo "Nombre: " . $nombres_estudiantes["nombre"] . "<br>";
}
echo "<br>";
echo "Calculo de las notas de Laura <br>";
//Usar las funciones array_sum() y count()

// Accedemos a las notas de Laura
$notas_laura = $estudiantes[3]["notas"];

// Calculamos la media de las notas de Laura
$media_laura = array_sum($notas_laura) / count($notas_laura);

// Imprimimos la media
echo "La media de las notas de Laura es: " . $media_laura . "<br>";
?>
</body>
</html>