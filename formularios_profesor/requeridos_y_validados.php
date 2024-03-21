<!DOCTYPE HTML>
<html>

<head>
</head>

<body>

  <?php
  // define variables and set to empty values
  
  $name = $email = $gender = $comment = $website = "";
  $nameErr = $emailErr = $webErr = $genderErr = $txtErr = $commentErr = $cursosErr= '';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['cursos'])){
        $cursosErr="Debes introducir un nombre válido";
    }else{
        $cursos = $_POST['cursos'];
    }
    if (empty($_POST['name'])){
        $nameErr="Debes introducir un nombre válido";
    }else if (!preg_match("/^[a-zA-Z-' ]*$/",$name)){
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Sólo letras y espacios, por favor";
        }    
    }
    if (empty($_POST['email'])){
        $emailErr="Debes introducir un email válido";
    }else{
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr="Debes introducir un email válido";
        }
    }
    if (empty($_POST['website'])){
        $webErr="Debes introducir un website válido";
    }else{
        $website = test_input($_POST["website"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
            $websiteErr = "URL no válida";
        }
           
    }
    if (!isset($_POST['gender'])){
        $genderErr="Debes marcae un gender válido";
    }else{
        $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST['coment'])){
        $commentErr="Debes introducir algún comentario válido";
    }else{
        $gender = test_input($_POST["comment"]);
    }
    
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

  <h2>PHP Form Validation Example</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <input type="text" name="name" value="<?php echo $name;?>"> <span style="color:red;"> <?php echo $nameErr;?></span>
    <br><br>
    <label>E-mail:</label> <input type="text" name="email" value="<?php echo $email;?>"> <span style="color:red;"> <?php echo $emailErr;?></span>
    <br><br>
    Website: <input type="text" name="website"  value="<?php echo $website;?>"> <span style="color:red;"> <?php echo $webErr;?></span>
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40">
    <?php echo $comment;?>

    </textarea> <span style="color:red;"> <?php echo $commentErr;?></span>
    <br><br>
    Gender:<span style="color:red"><?php echo $genderErr;?></span>
    <span style="color:red;"><?php echo $genderErr;?></span>
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other 
  <br><br>
  
   ¿Qué cursos quieres hacer?  <span style="color:red"><?php echo $cursosErr;?></span>
   HTML: <input type="checkbox" name="cursos[0]" value="HTML" <?php if (isset($_POST['cursos']) && isset($_POST['cursos'][0])) echo "checked";?>>
  CSS:  <input type="checkbox" name="cursos[1]" value="CSS"<?php if (isset($_POST['cursos']) && isset($_POST['cursos'][1])) echo "checked";?>>
  JS: <input type="checkbox" name="cursos[2]" value="JS" <?php if (isset($_POST['cursos']) && isset($_POST['cursos'][2])) echo "checked";?>>
   <input type="submit" name="submit" value="Submit">
  </form>
weferferf
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
  }
  ?>

</body>

</html>