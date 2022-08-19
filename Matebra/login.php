<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /MATEBRA');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /MATEBRA");
    } else {
      $message = 'los datos no concuerdan';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>logueo</title>
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
    <h1>Inicia Sesión</h1>
    <span>No tienes una cuenta? <a href="signup.php">crear una</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Ingresa tu correo">
      <input name="password" type="password" placeholder="Ingresa tu contraseña">
      <input type="submit" value="Ingresar">
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
