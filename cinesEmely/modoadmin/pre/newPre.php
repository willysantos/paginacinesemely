<?php
require '../conexion/conexion.php';
$pelicula=$pdo->query("select pelicula.id_pelicula, pelicula.nombre_pelicula, 
 audio_pelicula.audio_pelicula from pelicula".
" inner join audio_pelicula on audio_pelicula.id_audio=pelicula.audio");
$ciudad=$pdo->query("select *from ciudad");
$franquicia=$pdo->query("select ciudad.ciudad, franquicias.id_franquicia, franquicias.localidad from franquicias".
" inner join ciudad on ciudad.id_ciudad=franquicias.id_ciudad");
?>
<script src="jquery-3.3.1.min.js">
</script >

<script>
    function cargarlocalidad(val){
        $.ajax({
            type: "POST",
            url: 'getfranquicia.php',
            data: 'id_ciudad='+val,
            success: function(resp){
                $('#select_franquicia').html(resp);
            }
        })
    }
</script>
<div>
    <?php require '../menus/menu_lado.php';?>
</div>

<head>
    <link rel="stylesheet" href="../GestiondePeliculas/CSSPeliculas/EstilosPelicula.css">
</head>

    <body>
    <div class="pos">
        <div id="box">
<form id="form" action="save_pre.php" method="post" >
    <div class="container">
        <div class="sec">
            <h2>Registrando una nueva Pre</h2>
        </div>
        <div class="sec">
            <label>Seleccione la Pelicula</label>
            <select name="select_pelicula" id="select_pelicula">
                <?php foreach ($pelicula as $row): ?>
                    <option value="<?php echo $row['id_pelicula']?>"><?php echo $row['nombre_pelicula']?>
                        --- <?php echo$row['audio_pelicula']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="sec">
            <label>Seleccione Ciudad</label>
            <select name="select_ciudad" id="select_ciudad" onchange="cargarlocalidad(this.value)">
                <?php echo '<option>-- Seleccione una Opcion --</option>';?>
                <?php foreach ($ciudad as $c): ?>
                    <option value="<?php echo $c['id_ciudad'];?>"><?php echo $c['ciudad'];?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="sec">
            <label >Seleccione Franquicia</label>
            <select name="select_franquicia" id="select_franquicia">
            </select>
        </div>
        <div class="sec">
            <label>Fecha de Estreno Esperada</label>
            <input type="date" name="fecha" >
        </div>
        <div class="sec">
            <button type="submit" name="boton_guardar_pre">Registrar Pre</button>
        </div>
    </div>
</form>

        </div>
    </div>

    </body>
