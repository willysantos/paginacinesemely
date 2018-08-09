<?php
require '../conexion/conexion.php';
$consulta=$pdo->query("select ciudad.ciudad, franquicias.id_franquicia, franquicias.localidad
from franquicias".
" inner join ciudad on ciudad.id_ciudad = franquicias.id_ciudad");
$consulta2=$pdo->query("select sala.nombre_sala from sala".
    " inner join franquicias on franquicias.id_franquicia = sala.id_franquicia");
?>
<div>
<?php
require '../menus/menu_lado.php';
?>
</div>
<link rel="stylesheet" href="franquicia.css">
<script src="../pre/jquery-3.3.1.min.js">
</script >
<script>
    function cargarcuerpo(val){
        $.ajax({
            type: "POST",
            url: 'cuerpo_pgf.php',
            data: 'id_franquicia='+val,
            success: function(resp){
                $('#cuerpo').html(resp);
            }
        })
    }
</script>
<body>
<div id="contenedor">
    <div class="formufra">
        <form action="principal_gestion_franquicias.php">
            <td>Seleccion Franquicia</td>
            <select name="select_ciudad" id="select_ciudad" onchange="cargarcuerpo(this.value)">
                <option value="0">Elija una Localidad</option>
            <?php foreach ($consulta as $row):?>
                <option value="<?php echo $row['id_franquicia']?>"><?php echo $row['ciudad']?>--
                    <?php echo $row['localidad']?></option>
            <?php endforeach; ?>
            </select>
            <td>
                <button type="submit" name="btn" id="btn">Buscar</button>
            </td>
        </form>
    </div>
    <div class="cuerpo" id="cuerpo">

    </div>
</div>
</body>

