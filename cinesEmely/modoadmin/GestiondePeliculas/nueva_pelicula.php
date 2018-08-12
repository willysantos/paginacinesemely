<?php
require '../conexion/conexion.php';
$genero=$pdo->query("select id_genero, genero_pelicula from genero_pelicula");
$audio = $pdo->query("select id_audio, audio_pelicula from audio_pelicula");
$clasificado = $pdo->query("select id_clasificado, nombre_clasificado from clasificados");
?>
<link rel="stylesheet" href="CSSPeliculas/EstilosPelicula.css">
<div>
    <?php require '../menus/menu_lado.php'; ?>
</div>
<body>
<div class="pos">
    <div id="box">

<form id="form" action="save_movie.php" method="post" enctype="multipart/form-data" >
    <div class="container">
        <div class="sec">
            <h2>Registro de una nueva Pelicula</h2>
        </div>
        <div class="sec">
            <label>Nombre de la Pelicula</label>
            <input type="text"  name="nombre_pelicula">
        </div>
        <div class="sec">
            <label>Seleccion de genero</label>
            <select name="select_genero" id="select_genero">
                <?php foreach ($genero as $row):?>
                    <option value="<?php echo $row['id_genero']?>" ><?php echo $row['genero_pelicula']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="sec">
            <label >Seleccion de Audio</label>
            <select name="select_audio" id="select_audio">
                <?php foreach ($audio as $row):?>
                    <option value="<?php echo $row['id_audio']?>" ><?php echo $row['audio_pelicula']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="sec">
            <label >Seleccion de Clasificados</label>
            <select name="select_clasificado" id="select_clasificado">
                <?php foreach ($clasificado as $row):?>
                    <option value="<?php echo $row['id_clasificado']?>" ><?php echo $row['nombre_clasificado']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="sec">
            <label>Descripcion Corta</label>
            <input type="text"  name="descripcion">
        </div>
        <div class="sec">
            <label>Fecha de Registro</label>
            <input type="date"  name="fecha_de_registro">
        </div>
        <div class="sec">
            <label>Foto</label>
            <br>
            <input type="file" accept="image/*" id="foto" name="foto">
        </div>
        <div class="sec">
            <button type="submit" class="btn btn-success" name="boton_guardar_pelicula">Agregar Pelicula</button>
        </div>
    </div>
</form>

    </div>
</div>

</body>

