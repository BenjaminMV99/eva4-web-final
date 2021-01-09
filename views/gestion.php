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
    <link href='https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/material.css">
    <link rel="shortcut icon" href="../img/LogoLogin.png" type="image/x-icon">
    <title>BMV optica Gestionde</title>
</head>
<body>

<body style="background-image: url('../img/Fondo2.jpg'); background-size: cover;">
    <?php if (isset($_SESSION["user"])) { ?>
        <nav class="teal darken-2">
            <div class="nav-wrapper">
            <a href="#" class="brand-logo" style="margin-left: 50px;">BMV optica - Gestion de usuarios</a>                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="activo"><a href="gestion.php"><span title="Gestión de Usuarios">Gestión de usuarios</a></li>
                    <li class="activo"><a href="salir.php"><span title="Salir">Salir</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <!-- NAV MOVIL -->
                <ul id="slide-out" class="sidenav fondoazul">
                    <li>
                        <div class="user-view">
                            <div class="background">
                                <img src="https://www.designyourway.net/blog/wp-content/uploads/2016/07/Dark-wallpaper-desktop-background-30-700x438.jpg">
                            </div>
                            <a href="gestion.php"><img class="circle" src="../img/perfilnav.jpg"></a>
                            <a href="gestion.php" class="brand-logo white-text"><?= $_SESSION["user"]["nombre"] ?></a>
                        </div>
                    </li>
                    <li class="active"><a class="white-text" href="gestion.php">Gestión de Usuarios<i class="fas fa-user-cog fa-2x white-text"></i></a></li>
                    <li><a class="white-text" href="salir.php">Salir<i class="fas fa-power-off fa-2x white-text"></i></a></li>
                </ul>

                <!-- FIN DE NAV -->
                <div class="col l4 m4 s12">
                    <!-- EDITAR USUARIO -->
                    <?php if (isset($_SESSION["editar"])) { ?>
                        <div class="card">
                            <div class="card-content">
                                <img style="height: 100px;" src="../img/edituser.png" >
                                <h4  style="color: cadetblue;">Editar datos del vendedor</h4>
                                <form action="../controllers/ControlEdit.php" method="POST">
                                    <div class="input-field">
                                        <input id="rut" type="text" name="rut" value="<?= $_SESSION["usuario"]["rut"] ?>">
                                        <label for="rut">Rut del vendedor</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="nombre" type="text" name="nombre" value="<?= $_SESSION["usuario"]["nombre"] ?>">
                                        <label for="nombre">Nombre del vendedor</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <select name="estado" id="estado">
                                            <option value="1">Habilitado</option>
                                            <option value="0">Bloqueado</option>
                                        </select>
                                        <label>Estado del Vendedor</label>
                                    </div>
                                    <button class="btn ancho-100 ">Editar Usuario</button>
                                </form>
                            </div>
                        </div>
                    <?php
                        unset($_SESSION["editar"]);
                        unset($_SESSION["usuario"]);
                    } else { ?>
                        <!-- NUEVO USUARIO -->
                        <div class="card">
                            <div class="card-content">
                                <img src="../img/user.svg" style="height: 100px;" >
                                <h5 style="color: cadetblue;">Datos del vendedor</h5>
                            </div>
                            <div class="card-action">
                                <form action="../controllers/ControlInsert.php" method="POST">
                                    <div class="input-field">
                                        <input id="rut" type="text" name="rut">
                                        <label for="rut">Rut</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="nombre" type="text" name="nombre">
                                        <label for="nombre">Nombre</label>
                                    </div>
                                    <p class="green-text">
                                        <?php if (isset($_SESSION["respuesta"])) {
                                            echo $_SESSION["respuesta"];
                                            unset($_SESSION["respuesta"]);
                                        } ?>
                                    </p>
                                    <p class="red-text">
                                        <?php if (isset($_SESSION["error"])) {
                                            echo $_SESSION["error"];
                                            unset($_SESSION["error"]);
                                        } ?>
                                    </p>
                                    <br>
                                    <input type="hidden" name="rol" value="Vendedor">
                                    <input type="hidden" name="clave" value="123456">
                                    <input type="hidden" name="estado" value="1">
                                    <button class="btn fondoazul">Agregar Vendedor</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col l8 m8 s12">
                    <div class="card">
                        <div class="card-content">
                            <h3 style="color: cadetblue;">Listado de los vendedores</h3>
                            <form action="../controllers/ControlTabla.php" method="POST">
                                <table class="blue-text accent-2">
                                    <tr>
                                        <th style="color: cadetblue; font-size: 25px;">Rut</th>
                                        <th style="color: cadetblue; font-size: 25px;">Nombre</th>
                                        <th style="color: cadetblue; font-size: 25px;">Estado</th>
                                        <th style="color: cadetblue; font-size: 25px;">Acción</th>
                                    </tr>
                                    <?php foreach ($usuario as $item) { ?>
                                        <tr>
                                            <td style="font-size: 20px;"> <?= htmlspecialchars($item["rut"]) ?> </td>
                                            <td style="font-size: 20px;"> <?= htmlspecialchars($item["nombre"]) ?> </td>
                                            <?php if ($item["estado"] == 1) { ?>
                                                <td  class="green-text fa-2x"> <?= $item["estado"] = "<i class='fas fa-user-check'></i>" ?> </td>
                                            <?php } else { ?>
                                                <td class="red-text fa-2x"> <?= $item["estado"] = "<i class='fas fa-user-times'></i>" ?> </td>
                                            <?php } ?>
                                            <td>
                                                <button name="bt_edit" value="<?= $item["rut"] ?>" class="btn-floating cadeteblue" style="margin-right: 
                                                10px;">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button name="bt_delete" value="<?= $item["rut"] ?>" class="btn-floating red">
                                                    <i class="material-icons">delete</i>
                                                </button>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {
        header("Location: ../index.php"); ?>
    <?php } ?>
    <script src='https://kit.fontawesome.com/2c36e9b7b1.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.10.0/css/all.css' integrity='sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p' crossorigin='anonymous' />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);

            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>
</body>

</html>