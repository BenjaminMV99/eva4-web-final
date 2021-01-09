<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/LogoLogin.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/material.css">
    <title>BMV Optica</title>
</head>

<body style="background-image: url('img/Fondo2.jpg'); background-size: cover;">
<nav class="teal darken-2">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo" style="margin-left: 50px;">BMV optica</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html"></a></li>
        <li><a href="views/abaut.php">Acerca de</a></li>
        <li><a href="index.php">Ingreso de vendedor</a></li>
        <li><a href="collapsible.html"></a></li>
      </ul>
    </div>
  </nav>

<div class="box">
    <img src="img/LogoLogin.png" alt="" class="logo center">
      <h2>Inicia de sesión</h2>
      <p>Como Administrador</p>
      <form action="controllers/LoginControllerAdmin.php" method="POST">
        <div class="inputBox">
          <input type="text" name="rut" required onkeyup="this.setAttribute('value', this.value);" value="" />
          <label for="rut">RUT</label>
        </div>
        <div class="inputBox">
          <input type="password" name="clave" required onkeyup="this.setAttribute('value', this.value);" value="" />
          <label for="clave">Contraseña</label>
        </div>
        <p class="rojo">
            <?php
            session_start();
            if (isset($_SESSION["error"])) {
              echo $_SESSION["error"];
              unset($_SESSION["error"]);
            }
            ?>
        </p>
        <input class="login" type="submit" name="sign-in" value="Ingresar" />
      </form>
</div>
<script src='https://kit.fontawesome.com/2c36e9b7b1.js' crossorigin='anonymous'></script>
</body>

</html>