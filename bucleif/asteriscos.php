<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Imprime asteriscos en columnas y filas</h1>
<?php    

    for($c=4; $c>0; $c--){
        for($f=$c; $f>0; $f--){
            echo "*";
        }
        echo "<br>";
    }

?>
</body>
</html>