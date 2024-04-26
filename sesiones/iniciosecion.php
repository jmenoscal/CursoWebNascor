<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
//session_start():
define("email","miemail@miemail.com");
define("password","1234");

?>

<h1>Bienvenido Logeate</h1>
<form action="iniciosecion.php" method="$_POST">
Email: <input type="email" name="email" placeholder="introduce tu email" >
Pasword: <input type="password" name="password">
<input type="submit" value="Enviar">

</form>



</body>
</html>