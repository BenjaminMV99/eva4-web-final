<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Receta</title>
    <link rel="icon" href="../img/icon_page.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION['user'])) { ?>

        <nav>

            <div class="nav-wrapper grey darken-1">


                <img src="../img/logoOptica.png" alt="">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="crearCliente.php">Crear Cliente</a></li>
                    <li><a href="buscarReceta.php">Buscar Receta</a></li>
                    <li class="active"><a href="ingresarReceta.php">Ingresar Receta</a></li>
                    <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>

                </ul>
            </div>
        </nav>

        <ul id="slide-out" class="sidenav">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="../img/back_lentes.jpg">
                    </div>
                    <a href="#user"><img class="circle" src="../img/user_icon.png"></a>



                    <a href="#name"><span class="black-text name"><?= $_SESSION['user']['nombre'] ?></span></a>
                    <a href="#email"><span class="black-text email"><?= $_SESSION['user']['rut'] ?></span></a>


                </div>
            </li>
            
            <li><a href="crearCliente.php" class="white-text"><i class="material-icons white-text">create</i>Crear Cliente</a></li>
            <li><a href="buscarReceta.php"><i class="material-icons white-text">search</i>Buscar Receta</a></li>
            <li class="active"><a href="ingresarReceta.php"><i class="material-icons white-text">save</i>Ingresar Receta</a></li>
            <li><a href="cerrarSesion.php"><i class="material-icons white-text">power_settings_new</i>Cerrar Sesión</a></li>
        </ul>






        <!-- Contenedor base-->
        <div class="container">

            <div id="formularioreceta">

                <div class="card-panel letra-oscura">

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
                                        <p class="center">Datos del cliente</p>
                                        <h6 class="center">{{cliente.nombre_cliente}}</h6>          
                                        <h4 class="center unpocodemarginbot">{{cliente.rut_cliente}}</h4>
                                    </div>
                                    <div class="col s6">
                                        <p>fono : {{cliente.telefono_cliente}} </p>
                                        <p>correo : {{cliente.email_cliente}} </p>
                                    </div>
                                    <div class="col s6">
                                        <p>direccion : {{cliente.direccion_cliente}}</p>
                                        <p>registrado en : {{cliente.fecha_creacion}}</p>
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

                                <input type="text" v-model="i_esfera">
                                <label for="esfera">Esfera</label>

                            </div>


                            <div class="input-field margin-inputs back-field">
                                <input type="text" v-model="i_cilindro">
                                <label for="esfera">Cilindro</label>

                            </div>

                            <div class="input-field margin-inputs back-field">

                                <input type="text" v-model="i_eje">
                                <label for="esfera">Eje</label>

                            </div>



                        </div>

                        <div class="col l3 m6 s12 center ">

                            <h5 class="center">Ojo derecho</h5>

                            <div class="input-field margin-inputs back-field">

                                <input type="text" v-model="d_esfera">
                                <label for="esfera">Esfera</label>

                            </div>

                            <div class="input-field margin-inputs back-field">

                                <input type="text" v-model="d_cilindro">
                                <label for="esfera">Cilindro</label>

                            </div>

                            <div class="input-field margin-inputs back-field">

                                <input type="text" v-model="d_eje">
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




                </div>
            </div>



        </div>

    <?php } else { ?>

        <div class="container center">

            <div class="row error">

                <div class="col l6 m6 s12 offset-l3 offset-m3">

                    <div class="card">

                        <div class="card-content">

                            <img src="../img/logoOptica.png" alt="">

                            <h2 class="red-text">Te has equivocado de camino amigo</h2>
                            <h4 class="black-text">no dispones de accesso para estar aquí</h4>
                            <p>Debes iniciar sesión, vuelve al <a href="../index.php">home</a> e inicia sesión.</p>
                            <p>Creadores de la pagina: <a href="../creadores.html">creadores</a></p>


                        </div>

                    </div>

                </div>

            </div>

        </div>




    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="../js/ingresarReceta.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {

                'format': 'yyyy/mm/dd',
                'i18n': {

                    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    weekday: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                    weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']

                }

            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var elems = document.querySelectorAll('select');
            var instances = M.Sidenav.init(elems);
            var instances = M.FormSelect.init(elems);
        });
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>



</body>

</html>