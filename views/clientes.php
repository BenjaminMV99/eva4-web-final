<?php

use models\UsuarioModel as UsuarioModel;

session_start();
require_once "../models/UsuarioModel.php";

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if (isset($_SESSION["user"])) {
    $model = new UsuarioModel();
    $usuario = $model->getAllUsuarios();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/material.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Glasses Optica - Gestión Clientes</title>

</head>

<body style="background-image: url('../img/Fondo2.jpg'); background-size: cover;">
    <?php if (isset($_SESSION["user"])) { ?>
        <nav class="teal darken-2">
                    <div class="nav-wrapper">
                    <a href="#" class="brand-logo" style="margin-left: 50px;">BMV optica - Ingreso de cliente</a>                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="clientes.php">Ingresar Clientes</a></li>
                            <li><a href="buscarReceta.php">Ingresar Recetas</a></li>
                            <li><a href="IngresarReceta.php">Ingresar Recetas</a></li>
                            <li><a href="salir.php">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </nav>
        <div class="container">
            <div class="row">
                <!-- Barra de navegacion en modo movil -->
                <ul id="slide-out" class="sidenav blue accent-2">
                    <li>
                        <div class="user-view">
                            <div class="background">
                                <img src="https://www.designyourway.net/blog/wp-content/uploads/2016/07/Dark-wallpaper-desktop-background-30-700x438.jpg">
                            </div>
                            <a href="gestion.php"><img class="circle" src="../img/perfilnav.jpg"></a>
                            <a href="gestion.php" class="brand-logo white-text"><?= $_SESSION["user"]["nombre"] ?></a>
                        </div>
                    </li>
                    <li class="active"><a class="white-text" href="clientes.php">Crear Cliente<i class="fas fa-user-plus fa-2x white-text"></i></a></li>
                    <li><a class="white-text" href="buscarReceta.php">Buscar Receta<i class="fas fa-file-search fa-2x white-text"></i></a></li>
                    <li><a class="white-text" href="ingreso.php">Ingreso de Receta<i class="fas fa-file-plus fa-2x white-text"></i></a></li>
                    <li><a class="white-text" href="salir.php">Salir<i class="fas fa-power-off fa-2x white-text"></i></a></li>
                </ul>

                <!-- Fin de la barra -->
                <div class="col l2 m4 s12"></div>
                <div style="background-color: white; border-radius: 10px; border: 1px solid #dadce0; margin: 50px 0px 0px 200px; width: 600px; padding: 50px;"  >
                <form action="../controllers/ClienteController.php" method="POST">
                    <h5>Ingrese los datos del cliente</h5>
                    <br>
                    <div class="input-field">
                        <i class="material-icons prefix">lock_outline</i>
                        <input id="r" type="text" name="rut">
                        <label for="r">Rut del clinte</label>
                    </div> 
                    <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="n" type="text" name="name">
                        <label for="n">Nombre del cliente</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">home</i>
                        <input id="d" type="text" name="direccion">
                        <label for="d">Dirección del cliente</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">phone</i>
                        <input id="t" type="text" name="telefono">
                        <label for="t">Telefono del cliente</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">date_range</i>
                        <input type="text" class="datepicker" id="f" name="fecha">
                        <label for="f">Fecha de creacion </label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">email</i>
                        <input id="e" type="text" name="email">
                        <label for="e">Email del cliente</label>
                    </div> 
                    <button class="waves-effect waves-light btn ancho-100 cadeteblue" style="margin-left: 200px;">Añadir</button>
                </form>

                <p class="green-text center">
                    <?php
                        if(isset($_SESSION['c_resp'])){
                            echo $_SESSION['c_resp'];
                            unset($_SESSION['c_resp']);
                        }
                    ?>
                </p>
                <p class="red-text center">
                    <?php
                        if(isset($_SESSION['c_error'])){
                            echo $_SESSION['c_error'];
                            unset($_SESSION['c_error']);
                        }
                    ?>
                </p>
            </div>
            </div>
        </div>

    <?php } else {
        header("Location: ../index.php"); ?>
    <?php } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                'autoClose': true,
                'format': 'yyyy/mm/dd',
                i18n: {
                    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                    weekdays: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                    weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    weekdaysAbbrev: ["D", "L", "M", "M", "J", "V", "S"],
                    cancel: 'Cancelar',
                    clear: 'Limpiar',
                    done: 'Aceptar'
                }
            });
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>
    <script src='https://kit.fontawesome.com/2c36e9b7b1.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.10.0/css/all.css' integrity='sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p' crossorigin='anonymous' />
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>