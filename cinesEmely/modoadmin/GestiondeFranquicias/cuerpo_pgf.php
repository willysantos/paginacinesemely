<link rel="stylesheet" href="franquicias.css">
<script>

    var acc = document.getElementsByClassName("accor");
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

<?php
require '../conexion/conexion.php';
$id_franquicia=$_POST['id_franquicia'];

$consulta2=$pdo->query("select sala.id_sala, sala.nombre_sala from sala".
    " inner join franquicias on franquicias.id_franquicia = sala.id_franquicia".
" where franquicias.id_franquicia = {$id_franquicia}");
foreach ($consulta2 as $r):?>
    <div class="contienesala">

        <h4><?php echo $r['nombre_sala']?></h4>


    </div>
    <?php endforeach; ?>