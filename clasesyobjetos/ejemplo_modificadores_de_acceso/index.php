<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificadores de acceso</title>
</head>

<body>
    <?php

    // HACER LOS COMENTARIOS AL CÓDIGO
    class Fruit
    {
        private $name;
        private  $color;
        private $weight;

        function set_name($n)
        {  // a public function (default)
            echo $n;
            $this->name = $n;
        }
        function set_color($n)
        { // a protected function
            echo $n;
            $this->color = $n;
        }
        protected function set_weight($n)
        { // clases derivadas
            echo $n;
            $this->weight = $n;
        }
        protected function get_name()
        { // a private function
            echo $this->name;
            return $this->name;
        }
    }
    class Fresa extends Fruit{
        public function get_nameFromChild($n){
            echo $n->get_name();
        }
    }
    $mango = new Fruit();
    $mango->set_name('Mango'); // OK
    $mango->set_color('Yellow'); //ok
  //  $mango->set_weight('300'); // No ok
    $fresa = new Fresa();
    $fresa->set_name('Fresa');
    echo $fresa->get_nameFromChild($fresa);
    // Imprimir los tres valores.
  //  echo "Nombre de la fruta" . $mango->get_name();
    ?>
</body>

</html>