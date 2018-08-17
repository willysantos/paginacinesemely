<?php
require '../../modoadmin/conexion/conexion.php';
$hoy = getdate();
$mes=$hoy['mon'];
if($mes<10):
    $mes_correcto_actual="0".$mes;
else:
    $mes_correcto_actual=$mes;
endif;
$fecha_actual=$hoy['year'].$mes_correcto_actual.$hoy['mday'];
$consultan=$pdo->query("select pelicula.nombre_pelicula, pelicula.ruta_img, pelicula.link from pelicula".
    " where fecha_de_registro > '{$fecha_actual}' ");
?>
<link rel="stylesheet" href="../../../../CE/cinesEmely/modocliente/PeliculasHoy/cartelera1.css">
<body>
<?php foreach ($consultan as $row): ?>
<div id="seccion2">
    <div class="cartel2">
        <img src="../../modoadmin/GestiondePeliculas/<?php echo$row['ruta_img']?>"
             height="85%" width="66%" class="imagen">
    </div>
    <div class="nombre">
        <h4><?php echo$row['nombre_pelicula']?></h4>
    </div>
    <div class="link">
        <a href="<?php echo$row['link']?>">Ver Trailer</a>
    </div>
</div>
<?php endforeach;?>
</body>
