<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MATEBRA</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="Css/estilo.css">
    <link rel="icon" type="icon/jpg" href="Img/MATEBRA.jpg">
  </head>
  <body style="background-color: #C2C1C1;">
    <a href="Inicio.html" id="sesion">
    <img src="Img/MATEBRA2.png" alt="Logo MATEBRA">
    </a>
<center>
    <?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $user['email']; ?>
      <br>Te has logueado correctamente
      <a href="logout.php">
      desloguearse
      </a>
      <h1>Navega en nuestra página principal ↓</h1>
      <a href="inicio.html">
      <img src="Img/MATEBRA.jpg" alt="logo">
      </a>
    <?php else: ?>
      <h1>Inicia sesión con tu cuenta o regístrate</h1><br>

      <a href="login.php">Inicia Sesión</a> o
      <a href="signup.php">¡Crear una cuenta!</a>
    <?php endif; ?>

    <div class="alert alert-primary" role="alert" style="margin-top: 10px;">
 Haz click en el logo para regresar a nuestra página 
</div>



  </body>
</html>