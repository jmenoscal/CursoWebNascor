<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario básico</title>
</head>

<body>
    <form id="form" action="index.php" method="GET">
        Name: <input type="text" name="name" value=""><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['name']) && isset($_GET['email'])) { ?>
        <h2>Welcome <?php echo $_GET["name"]; ?></h2>
        <h2>Your email address is:<?php echo $_GET["email"]; ?></h2>
        
    <?php } else {
        echo "Cubre el formulario";
    }
    ?>
</body>

</html>