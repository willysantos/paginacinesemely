<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link rel="stylesheet" href="menu_lado.css">-->
    <style>
        body{
            font-family: "Roboto", Arial, sans-serif, Helvetica;
            margin: 0px;
            margin-left: 180px;
        }
        /* The sidebar menu */
        .sidenav {
            height: 100%; /* Full-height: remove this if you want "auto" height */
            width: 160px; /* Set the width of the sidebar */
            position: fixed; /* Fixed Sidebar (stay in place on scroll) */
            z-index: 1; /* Stay on top */
            top: 0; /* Stay at the top */
            left: 0;
            background-color: #eeeeee; /* Black */
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 20px;
        }

        /* The navigation menu links */
/*//////////////////////////////////////////////////*/
        .sidenav a {
            /*padding: 6px 8px 6px 16px;*/
            /*text-decoration: none;*/
            /*font-size: 20px;*/
            /*color: #616161;*/
            /*display: block;*/
            /*font-family: "Roboto", Arial, sans-serif, Helvetica;*/

            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 15px;
            color: #005a88;
            display: block;
        }
/*///////////////////////////////////////////////////*/
        /* When you mouse over the navigation links, change their color */
/*/////////////////////////////////////////////////////*/
        .sidenav a:hover {
            color: #eeeeee;
            background: #0074a5;
            /*background: #0074a5;*/
        }
/*///////////////////////////////////*/
        /* Style page content */
        .main {
            margin-left: 160px; /* Same as the width of the sidebar */
            padding: 0px 10px;
        }

        /* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
        /*@media screen and (max-height: 450px) {*/
            /*.sidenav {padding-top: 15px;}*/
            /*.sidenav a {font-size: 18px;}*/
        /*}*/
        .accordion {
            /*background-color: #cecece;*/
            /*color: #005a88;*/
            /*cursor: pointer;*/
            /*padding: 18px;*/
            /*width: 100%;*/
            /*text-align: left;*/
            /*border: none;*/
            /*outline: none;*/
            /*transition: 0.4s;*/
            /*font-size: 20px;*/

            background-color: #eeeeee;
            color: #005a88;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            text-align: left;
            border: none;
            outline: none;
            transition: 0.4s;
        }

        /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
        .active, .accordion:hover {
            /*background-color: #005a88;*/
            /*color: white;*/

            background-color: #cbcbcb;

        }

        /* Style the accordion panel. Note: hidden by default */
        .panel {
            /*padding: 0 18px;*/
            /*background-color: #d7d7d7;*/
            /*display: none;*/
            /*overflow: hidden;*/
            /*font-size: 15px;*/

            padding-left: -15px;
            background-color: #d7d7d7;
            display: none;
            overflow: hidden;
        }
        .logotipo{
            width: 155px;
        }

    </style>
</head>
<body>


<div id="mySidenav" class="sidenav">
    <img src="../../modocliente/logo/logo.png" class="logotipo">
    <button class="accordion">FRANQUICIA</button>
    <div class="panel">
        <a href="../GestiondeFranquicias/principal_gestion_franquicias.php">Franquicias</a>
        <a href="../GestiondeFranquicias/nuevaCiudad.php">Nueva Ciudad</a>
        <a href="../GestiondeFranquicias/newFranquicia.php">Nueva Franquicia</a>
        <a href="../GestiondeFranquicias/sala.php">Salas</a>
        <a href="../GestiondeFranquicias/tiposdesala.php">Tipos de Salas</a>
        <a href="../GestiondeFranquicias/Asientos.php">Agregar Asientos</a>
    </div>
    <button class="accordion">PELICULAS</button>
    <div class="panel">
        <a href="../GestiondePeliculas/principal_peliculas.php">Peliculas</a>
        <a href="../GestiondePeliculas/new_genero.php">Generos</a>
        <a href="../GestiondePeliculas/clasificados.php">Clasificados</a>
        <a href="../GestiondePeliculas/audio.php">Audios</a>
        <a href="../GestiondePeliculas/nueva_pelicula.php">Nueva Pelicula</a>
    </div>
    <button class="accordion">PROXIMOS</button>
    <div class="panel">
        <a href="../pre/pre.php">PROX'S</a>
        <a href="../pre/newPre.php">Nuevo Pro</a>
    </div>
    <button class="accordion">USUARIOS</button>
    <div class="panel">
        <a href="../GestiondeUsuarios/principal_gestion_usuarios.php">Usuarios</a>
        <a href="../GestiondeUsuarios/new_usuario.php">Nuevo Usuario</a>
    </div>
    <button class="accordion">SESION</button>
    <div class="panel">
        <a href="../login/cerrar-sesion.php">cerrar sesion</a>
    </div>
    <div class="main">

    </div>

<script>

    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>

</body>
</html>
