<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VARIABLES SUPER GLOBLAS</title>
</head>
<body>
    
<?php
echo "DATOS DEL SERVIDOR <br>";
$nombre_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
echo "Nombre de HOST REMOTA: " .$nombre_host. " <br>";
echo "Nombre de HOST: " .$_SERVER['SERVER_NAME']. "<br>";
echo "Dirección IP: " .$_SERVER['SERVER_ADDR']. "<br>";
echo "Información protocolo: " .$_SERVER['SERVER_PROTOCOL']. "<br>";
echo "Información protocolo: " .$_SERVER['REQUEST_METHOD']. "<br>";
echo "Directorio Raíz Servidor: " .$_SERVER['DOCUMENT_ROOT']. "<br>";


?>


</body>
</html>