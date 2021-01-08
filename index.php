<?php

use models\UsuarioModel as UsuarioModel;

session_start();
require_once "models/UsuarioModel.php";
if (isset($_SESSION["usuario"])) {
  $model = new UsuarioModel();
  $usuario = $model->getAllUsuarios();

  print_r($usuario);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/material.css">
    <title>Glasses Optica - Iniciar Sesión</title>
</head>

<body style="background-image: url('img/Fondo2.jpg'); background-size: cover;">

<nav class="teal darken-2">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo" style="margin-left: 50px;">BMV optica</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html"></a></li>
        <li><a href="views/abaut.php">Acerca de</a></li>
        <li><a href="admin.php">Ingreso de admin</a></li>
        <li><a href="collapsible.html"></a></li>
      </ul>
    </div>
  </nav>

<div class="box">
<img src="img/LogoLogin.png" alt="" class="logo">

      <h2>Inicia de sesión</h2>
      <p>Como vendendor</p>

      <form action="controllers/LoginController.php" method="POST">
        <div class="inputBox">
          <input type="text" name="rut" required onkeyup="this.setAttribute('value', this.value);" value="" />
          <label for="rut">RUT</label>
        </div>

        <div class="inputBox">
          <input type="password" name="clave" required onkeyup="this.setAttribute('value', this.value);" value="" />
          <label for="clave">Clave</label>
        </div>
        <p class="rojo">
                                <?php if (isset($_SESSION["error"])) {
                                  echo $_SESSION["error"];
                                  unset($_SESSION["error"]);
                                } ?>
                            </p>
        <input class="login" type="submit" name="sign-in" value="Ingresar" />

      </form>
</div>
<script src='https://kit.fontawesome.com/2c36e9b7b1.js' crossorigin='anonymous'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>