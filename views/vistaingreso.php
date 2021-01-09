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
    <link rel="stylesheet" href="../css/style.css">
    <link rel='stylesheet' href='../css/estilos.css'>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/material.css">
    <link rel="shortcut icon" href="../img/LogoLogin.png" type="image/x-icon">
    <title>Glasses Optica</title>
</head>
<body style="background-image: url('../img/Fondo2.jpg'); background-size: cover;">
    <?php if (isset($_SESSION["user"])) { ?>
        <nav class="teal darken-2">
            <div class="nav-wrapper">
            <a href="#" class="brand-logo" style="margin-left: 50px;">BMV optica - Ingreso de recetas</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="vistaClientes.php">Ingresar Clientes</a></li>
                    <li><a href="buscarReceta.php">Buscar recetas</a></li>
                    <li><a href="vistaingreso.php">Ingresar Recetas</a></li>
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
                    <a href="vistaingreso.php"><img class="circle" src="../img/perfilnav.jpg"></a>
                    <a href="vistaingreso.php" class="brand-logo white-text"><?= $_SESSION["user"]["nombre"] ?></a>
                </div>
            </li>
            <li><a class="white-text" href="vistaClientes.php">Crear Cliente<i class="fas fa-user-plus fa-2x white-text"></i></a></li>
            <li class="activo"><a class="white-text" href="buscarReceta.php">Buscar Receta<i class="fas fa-file-search fa-2x white-text azul"></i></a></li>
            <li><a class="white-text" href="vistaingreso.php">Buscar recetas<i class="fas fa-file-plus fa-2x white-text"></i></a></li>
            <li><a class="white-text" href="salir.php">Salir<i class="fas fa-power-off fa-2x white-text"></i></a></li>
        </ul>
        <!-- Fin de la barra de navegacion en modo movil -->
        <br><br>
        <div class="row">
            <div class="col l4 m6 s12 offset-m3">
                <form @submit.prevent="buscar">
                    <div class="card">
                        <div class="card-content back">
                            <h6 class="center">Buscar</h6>
                            <div class="input-field">
                                <input type="text" v-model="rutCliente">
                                <label for="rut">Rut</label>
                            </div>
                            <div class="input-field center-align back-field-desactived">

                                <button class="btn-large">Buscar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col l8 m12 s12 center">
                <div class="card" v-if="clienteexiste">
                    <div class="card-content back">
                    <div class="row">
                        <div class="col s12">
                            <p class="center">Informacion del cliente </p>
                            <h6 class="center">{{cliente.nombre_cliente}}</h6>          
                            <h4 class="center unpocodemarginbot">{{cliente.rut_cliente}}</h4>
                        </div>
                        <div class="col s6">
                        </div>
                        <div class="col s6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-panel letra-oscura color-letras-formulario selects-adaptados">
        <div class="row ">
            <div class="col l12 m12 s12 center">
                <h4>Receta</h4>
                <br>
            </div>
            <div class="col l6 m12 s12 weas">
                <div class="col l12 m12 s12">
                    <span>tipo lente : </span>
                    <label>
                        <input type="radio" id="lejos" value="lejos" v-model="tipo_lentes">
                        <span>lejos</span>
                    </label>
                    <label>
                        <input type="radio" id="cerca" value="cerca" v-model="tipo_lentes">
                        <span>cerca</span>
                    </label>
                    <br></br>
                </div>
                <div class="col l6 m6 s12">
                    <span>tipo cristal </span>
                    <select v-model="tipo_sel" class="browser-default">
                        <option v-for="option in tipos" v-bind:value="option.id_tipo_cristal">
                            {{ option.tipo_cristal }}
                        </option>
                    </select>
                    <br>
                    <span>material de cristal</span>
                    <select v-model="material_sel" class="browser-default">
                        <option v-for="option in materiales" v-bind:value="option.id_material_cristal">
                            {{ option.material_cristal }}
                        </option>
                    </select>
                    <br>
                    <span>armazon</span>
                    <select v-model="armazon_sel" class="browser-default">
                        <option v-for="option in armazones" v-bind:value="option.id_armazon">
                            {{ option.nombre_armazon }}
                        </option>
                    </select>
                    <br>
                </div>
                <div class="col l6 m6 s12">
                    <div class="input-field margin-inputs back-field">

                        <input type="text" v-model="prisma">
                        <label for="prisma">Prisma</label>
                    </div>
                    <span>base</span>
                    <select v-model="base_sel" class="browser-default">
                        <option value="" disabled selected hidden></option>
                        <option value="1">superior</option>
                        <option value="2">inferior</option>
                        <option value="3">interna</option>
                        <option value="4">externa</option>
                    </select>
                    <br>
                    <div class="input-field margin-inputs back-field">
                        <input type="text" v-model="distancia_p">
                        <label for="esfera">Distancia pupilar</label>
                    </div>
                </div>
            </div>
            <div class="col l3 m6 s12 ">
                <h5 class="center">Ojo izquierdo</h5>
                <div class="input-field margin-inputs back-field">
                    <input type="text" v-model="i_esfera" required pattern="[+-]+[0-9].[0-9]{2,2}" title="ejemplo +0.25 o -0.25">
                    <label for="esfera">Esfera</label>
                </div>
                <div class="input-field margin-inputs back-field">
                    <input type="text" v-model="i_cilindro" required pattern="[+-]+[0-9].[0-9]{2,2}" title="ejemplo +0.25 o -0.25">
                    <label for="esfera">Cilindro</label>
                </div>
                <div class="input-field margin-inputs back-field">
                    <input type="text" v-model="i_eje" max="200" required pattern="[0-9]{1,3}" title="Numeros de 0 a 200">
                    <label for="esfera">Eje</label>
                </div>
            </div>
            <div class="col l3 m6 s12 center ">
                <h5 class="center">Ojo derecho</h5>
                <div class="input-field margin-inputs back-field">
                    <input type="text" v-model="d_esfera" required pattern="[+-]+[0-9].[0-9]{2,2}" title="ejemplo +0.25 o -0.25">
                    <label for="esfera">Esfera</label>
                </div>
                <div class="input-field margin-inputs back-field">
                    <input type="text" v-model="d_cilindro" required pattern="[+-]+[0-9].[0-9]{2,2}" title="ejemplo +0.25 o -0.25">
                    <label for="esfera">Cilindro</label>
                </div>
                <div class="input-field margin-inputs back-field">
                    <input type="text" v-model="d_eje" max="200" required pattern="[0-9]{1,3}" title="Numeros de 0 a 200">
                    <label for="esfera">Eje</label>
                </div>
            </div>

        </div>
        <hr>
        <div class="row margin-top-row">
            <div class="col l6 m12 s12 center">
                <div class="input-field back-field col l6 m12 s12">
                    <input type="text" v-model="rut_med">
                    <label for="valor">Rut del medico</label>
                </div>
                <div class="input-field back-field col l6 m12 s12">
                    <input type="text" v-model="nom_med">
                    <label for="valor">Nombre del medico</label>
                </div>
                <div class="input-field back-field col M12 s12">
                    <textarea v-model="observacion" class="materialize-textarea" rows="10"></textarea>
                    <label for="textarea1">Observacion</label>
                </div>
            </div>
            <div class="col l6 m6 s12 center">
                <div class="input-field back-field col l6">
                    <input type="text" class="datepicker" name="fecha" id="fecha_entrega">
                    <label for="fecha">Fecha de entrega</label>
                </div>
                <div class="input-field back-field col l6">
                    <input type="text" class="datepicker" name="fecha" id="fecha_retiro">
                    <label for="fecha">Fecha de retiro</label>
                </div>
            </div>
            <div class="col l6 m6 s12 center">
                <div class="input-field back-field">
                    <input type="text" v-model="valor">
                    <label for="valor">Valor del lente</label>
                </div>
            </div>
            <div class="col l12 m12 s12 center">
                <div class="input-field back-field-desactived right-align">
                    <button v-on:click="crearReceta()" class="btn-large">Crear</button>
                </div>
            </div>
        </div>

        <?php } else {
        header("Location: ../index.php"); ?>
        <?php } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="../js/buscar_cliente.js"></script>
    <script src="../js/combobox.js"></script>
    <script src='https://kit.fontawesome.com/2c36e9b7b1.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.10.0/css/all.css' integrity='sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p' crossorigin='anonymous' />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>





</body>
</html>