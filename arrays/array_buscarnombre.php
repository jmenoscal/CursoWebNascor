<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arrays asociativos.</title>
</head>
<body>
    <?php
    //creamos el array
    $listanombres = array("Lady" , "Loco" , "Pablo" , "Leonor" , "Hugo");
    foreach ($listanombres as $nombre) {
        echo "$nombre, "; 
    }
    echo "<br>";
    foreach($listanombres as $nombre){
        $cambioletra = strtolower($nombre); 
        if($cambioletra[0] == 'l'){
            echo "$cambioletra, ";
        }
    }
    ?>
</body>
</html>