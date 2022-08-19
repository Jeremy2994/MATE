<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'usuario creado correctamente';
    } else {
      $message = 'Estas intentando crear una cuenta ya existente';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="icon/jpg" href="Img/MATEBRA.jpg">
  </head>
  <body style="background-color: #C2C1C1;">


    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
<center>
  <br>
  <br>
    <h1>Crear una cuenta</h1>
    <span>Ya tienes una cuenta? <a href="login.php">Inicia Sesión</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Ingresa tu correo">
      <input name="password" type="password" placeholder="Ingresa tu contraseña">
      <input name="confirm_password" type="password" placeholder="Confirma tu contraseña">
      <input type="submit" value="ingresar">
    </form>

    <div class="alert alert-primary" role="alert" style="margin-top: 10px;">
 Haz click en el logo para regresar a nuestra página 
</div>


    <a class="navbar-brand" href="Inicio.html" class="logo" target="_self">
      <img src="Img/MATEBRA2.png" alt="Logo MATEBRA" width="15%">
    </a>
    </center>
  </body>
</html>