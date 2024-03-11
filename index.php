<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>PAGINA DE PRUEBAS DE CODIGOS PHP </h1>
<?php

echo "Hello World! Bienvenido portal de prueba de codigos: <br> <br>";

echo "<h1>Prueba de función para realizar operación de calculo.</h1> <br>";

$a = 5;
$b = 3;

function sumar($a, $b) {
    return $a + $b;  // Corregido: Retorna la suma de $a y $b
}

// Ejemplo de uso
$resultado = sumar($a, $b);  // Corregido: Llama a la función con los argumentos $a y $b
echo "La suma es: " . $resultado;  // Corregido: Imprime el resultado de la llamada a la función


echo "<h1>Esta fúncion realiza lo mismo que el codigo anterior</h1> <br>";

function suma($x, $y) {
    return $x + $y;
}

// Ejemplo de uso
$resultados = suma(5, 3); // Llama a la función y almacena el resultado
echo "La suma es: " . $resultados; // Imprime "La suma es: 8"

echo "<h2>Paso de parámetros: </h2>";
echo "<p>Los parámetros pueden ser de diferentes tipos: enteros, cadenas, arreglos, etc.
Puedes pasar valores directamente o variables como argumentos.
También puedes pasar parámetros por referencia utilizando el símbolo & antes del nombre del parámetro. Esto permite modificar el valor original de la variable fuera de la función.</p>";

function modifica_cadena(&$cadenas) {
    $cadenas .= "¡Cambiada!<br>"; //el punto concatena cadenas de caracteres.
}

$texto= "Original";
modifica_cadena($texto);
echo $texto; // Imprime "¡Cambiada!"

function modificar_cadena(&$cadena1, &$cadena2) {
    $cadena1 = "¡Cambiada!";
	$cadena2 = "!cambiada 2!<br>";
}

$texto1 = "Original";
$texto2 = "prueba";
modificar_cadena($texto1, $texto2);
echo $texto1; // Imprime "¡Cambiada!"
echo $texto2; // Imprime "¡Cambiada 2!"
echo "<br>";

function modificar_cadenas(&$cadena) {
    $cadena .= ' y algo más.<br>';
}

$cad = 'Esto es una cadena';
modificar_cadenas($cad);
echo $cad; // Imprime "Esto es una cadena y algo más."

echo "<br>";

function mostrar_argumentos(...$args) {
    foreach ($args as $arg) {
        echo $arg ." ";
    }
}

mostrar_argumentos('Hola', 'Mundo', 'PHP', 'prueba'); // Imprime "Hola Mundo PHP"

echo "<h2>La función func_get_args() devuelve un array que contiene todos los argumentos pasados a una función.</h2>";

function muestra_argumentos() {
    $num_args = func_num_args(); // Obtiene la cantidad de argumentos
    echo "Número de argumentos: $num_args <br>";
    for ($i = 0; $i < $num_args; $i++) {
        $arg = func_get_arg($i); // Obtiene el argumento en la posición $i
        echo "Argumento $i: $arg <br>";
    }
    $args_array = func_get_args(); // Obtiene todos los argumentos en un array
    print_r($args_array);
}

muestra_argumentos("Uno", "Dos", "Tres","cuatro"); // Llama a la función con argumentos variables, aqui limitas el crecimiento del array


echo "<h2>Ejemplo de argumentos por referencia y por valor:</h2>";
echo "<p>Puedes usar func_get_args() para ver cómo se pasan los argumentos (por referencia o por valor).</p>";

function porValor($arg) {
    echo "Pasó como valor: " . var_export(func_get_args(), true) . PHP_EOL. "<br>";
    $arg = 'baz';
    echo 'Después del cambio: ' . var_export(func_get_args(), true) . PHP_EOL. "<br>";
}

function porReferencia(&$arg) {
    echo 'Pasó como referencia: ' . var_export(func_get_args(), true) . PHP_EOL. "<br>";
    $arg = 'baz';
    echo 'Después del cambio: ' . var_export(func_get_args(), true) . PHP_EOL. "<br>";
}

$arg = 'bar';
porValor($arg);
porReferencia($arg);

//o	El bucle for es más flexible y permite un control preciso sobre la ejecución del bucle.

echo "<br>";

for ($i = 5; $i > 0; $i--) {
    echo $i . " ";
	
}
echo "<br>";
// Imprime: 4 3 2 1  
echo "<br>";

for ($i = 0; $i < 5; $i++) {
    echo $i . " ";
}
// Imprime: 0 1 2 3 4
echo "<br>";

//foreach:	El bucle foreach se utiliza para iterar sobre elementos de una colección (como un array o una lista).
echo "<br>";
$nombres = ["Juan", "María", "Pedro"];
foreach ($nombres as $nombre) {
    echo $nombre . " ";
}
// Imprime: Juan María Pedro
echo "<br>";



exit;

?> 
</body>
</html>