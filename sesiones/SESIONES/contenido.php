<?php
session_start();
if (!isset($_SESSION["user"]))
header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="login.php?logout=true">Salir</a>
HOLA 
<?php echo $_SESSION['user'];

?>
Tu email es:
<?php echo $_SESSION['datosUsuario']['email'];

?>
Mira que foto más chula:<br>
<img src="https://cdn.pixabay.com/photo/2023/08/11/04/51/fireworks-8182800_1280.jpg" width=70%>


</body>
</html>