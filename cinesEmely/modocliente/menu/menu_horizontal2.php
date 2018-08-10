<style rel="stylesheet">
    body, html {
        height: 100%;
        margin: 0;
        font-family: Arial;
    }

    /* Style tab links */
    .tablink {
        background-color: #555;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 17px;
        width: 25%;
    }

    .tablink:hover {
        background-color: #777;
    }

    /* Style the tab content (and add height:100% for full page content) */
    .tabcontent {
        color: white;
        display: none;
        padding: 100px 20px;
        height: 100%;
    }
    .tablink a{
        text-decoration-color: #FFFFFF;
        text-decoration: none;
        color: #FFFFFF;
    }

    #Home {background-color: #0089bd;}
    #News {background-color: #FFFFFF;}
    #Contact {background-color: #FFFFFF;}
    #About {background-color: #FFFFFF;}
</style>
<button class="tablink" onclick="openPage('Home', this, '#0089bd')">Proximos Estrenos</button>
<button class="tablink" onclick="openPage('News', this, '#0089bd')" id="defaultOpen">Peliculas Hoy</button>
<button class="tablink" onclick="openPage('Contact', this, '#0089bd')">Cines Cercanos</button>
<button class="tablink" ><a href="../../modoadmin/login/inicio-sesion.php">Iniciar Sesion</a></button>

<div id="Home" class="tabcontent">
    <h3 style="background-color: black"></h3>
    <p>Home is where the heart is..</p>
</div>

<div id="News" class="tabcontent">
    <h3 style="background-color: black">News</h3>
    <p style="text-decoration-color: black">Some news this fine day!</p>
</div>

<div id="Contact" class="tabcontent">
    <h3 style="background-color: black">Ciudades</h3>
    <div>
        <?php require '../CinesCercanos/CinesCercanos.php'?>
    </div>
</div>

<!--<div id="About" class="tabcontent">-->
<!--    <h3></h3>-->
<!--<!--    <div>-->-->
<!--<!--        -->--><?php
////        require '../../modoadmin/login/inicio-sesion.php'?>
<!--<!--    </div>-->-->
<!--</div>-->
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