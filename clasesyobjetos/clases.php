<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLases</title>
</head>
<body>
<?php
/*
A continuación declaramos una clase llamada Fruta que consta de dos propiedades ($nombre y $color) 
y dos métodos set_name() y get_name() para configurar y obtener la propiedad $nombre
*/
//Nota: ¡ En una clase, las variables se llaman propiedades y las funciones se llaman métodos!

class Fruit {
  // Properties
  public $name;
  public $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}
?>

</body>
</html>