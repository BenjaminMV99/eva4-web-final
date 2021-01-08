<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="../../css/style.css" />
</head>

<body class="green">



        <nav class="green darken-3">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo" style="margin-left:10px">
                    OptiTal
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active"><a href="#">Crear Cliente <i class="material-icons left">assignment_ind</i></a></li>
                    <li><a href="buscar_receta.php">Buscar Recetas <i class="material-icons left">search</i></a></li>
                    <li><a href="insert_receta.php">Receta <i class="material-icons left">playlist_add</i></a></li>
                    <!-- MENU DROPDOWN
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Receta <i class="material-icons left">playlist_add</i></a></li>
                     -->
                    <li><a href="logout.php">Salir <i class="material-icons left">power_settings_new</i></a></li>
                </ul>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <!-- START SIDENAV -->
        <ul id="slide-out" class="sidenav">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img class="responsive-img" src="https://wallpaperstock.net/wallpapers/thumbs1/31196wide.jpg">
                    </div>
                    <a href="#user"><img class="circle" src="https://microhealth.com/assets/images/illustrations/personal-user-illustration-@2x.png"></a>
 </div>
            </li>
            <li class="active"><a href="#">Crear Cliente <i class="material-icons left">assignment_ind</i></a></li>
            <li><a href="buscar_receta.php">Buscar Recetas <i class="material-icons left">search</i></a></li>
            <li><a href="#">Crear Receta <i class="material-icons left">playlist_add</i></a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="logout.php">Salir <i class="material-icons left">power_settings_new</i></a></li>
        </ul>


        <!-- END SIDENAV -->
        <br>
        <div id="app" class="container">






        </div>

        <div class="row">
            <div class="col l4 m4 s12"></div>
            <div class="col l4 m4 s12">
                <div class="card-panel center">
                    <h4 class="center red-text">Acceso Denegado!</h4>
                    <a href="../../index.php">click aqui para iniciar</a>
                </div>
            </div>
        </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
            var elems = document.querySelectorAll('.dropdown-trigger');
            var elems = document.querySelectorAll('.tooltipped');
            var instances = M.Tooltip.init(elems);
        });
    </script>

    <script src="../../js/buscar_cliente.js"></script>

</body>

</html>