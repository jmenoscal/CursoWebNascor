<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSTANCEOFFt</title>
</head>
<body>
<!DOCTYPE html>
<html>
<body>

<?php
//Puedes usar la palabra clave instanceof para comprobar si un objeto pertenece a una clase específica:

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

$apple = new Fruit();
var_dump($apple instanceof Fruit);
?>
 
</body>
</html>
</body>
</html>