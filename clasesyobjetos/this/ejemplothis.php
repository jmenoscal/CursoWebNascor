<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LA CLAVE $THIS</title>
</head>
<body>

<?php
//La palabra clave $this se refiere al objeto actual y solo está disponible dentro de los métodos.
//Entonces, ¿dónde podemos cambiar el valor de la propiedad $name? Hay dos maneras:
//1. Dentro de la clase (agregando un método set_name() y usando $this):

class Fruit {
  public $name;
  function set_name($name) {
    $this->name = $name;
  }
}
$apple = new Fruit();
$apple->set_name("Apple");

echo $apple->name;

//2. Fuera de la clase (cambiando directamente el valor de la propiedad):

class Fruta {
  public $name1;
}
$manzana = new Fruta();
$manzana->name1 = "Apple2";

echo $manzana->name1;

?>
</body>
</html>