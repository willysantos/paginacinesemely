

<head>
    <link rel="stylesheet" href="cssMenu2.css">
</head>

<img src="logmenu.jpeg" width="1350" height="143">
<button class="tablink" onclick="openPage('Home', this, '#2F91BF')">Proximos Estrenos</button>
<button class="tablink" onclick="openPage('News', this, '#2F91BF')" id="defaultOpen">Peliculas Hoy</button>
<button class="tablink" onclick="openPage('Contact', this, '#2F91BF')">Cines Cercanos</button>
<button class="tablink" onclick="openPage('Sesion',this,'#2f91bf')"><a href="../../modoadmin/login/inicio-sesion.php">Iniciar Sesion</a></button>
<!--<button class="tablink" onclick="openPage('Sesion',this,'#2f91bf')"><a href="../../modoadmin/login/inicio-sesion.php">Iniciar Sesion</a></button>-->

<div id="Home" class="tabcontent">
    <h3 style="background-color: black"></h3>
    <p>Home is where the heart is..</p>
</div>

<div id="News" class="tabcontent">
    <div>
        <?php require '../PeliculasHoy/Cartelera.php'?>
    </div>
</div>

<div id="Contact" class="tabcontent">
    <h3 style="background-color: black">Ciudades</h3>
    <div>
        <?php require '../CinesCercanos/CinesCercanos.php'?>
    </div>
</div>


<div id="About" class="tabcontent">

    <div>
        <?php
        require '../../modoadmin/login/inicio-sesion.php'?>
    </div>
</div>

<script>
    function openPage(pageName, elmnt, color) {
        // Hide all elements with class="tabcontent" by default */
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Remove the background color of all tablinks/buttons
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }

        // Show the specific tab content
        document.getElementById(pageName).style.display = "block";

        // Add the specific color to the button used to open the tab content
        elmnt.style.backgroundColor = color;
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>