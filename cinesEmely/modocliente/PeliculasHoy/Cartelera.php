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

$fecha_limite=$pdo->query("select fecha_final_tanda from funcion".
    " where fecha_final_tanda = '{$fecha_actual}'");
$f_l=[];
foreach ($fecha_limite as $fila):
$f_l[]=($fila['fecha_final_tanda']);
endforeach;

$fecha_limite_correcta=str_replace("-","",$f_l[0]);

$validar_peli=$pdo->query("select pelicula.id_pelicula from pelicula".
    " inner join genero_pelicula on genero_pelicula.id_genero = pelicula.genero
inner join audio_pelicula on audio_pelicula.id_audio = pelicula.audio
inner join clasificados on clasificados.id_clasificado = pelicula.id_clasificado
inner join pre on pre.id_pelicula = pelicula.id_pelicula
inner join funcion on funcion.id_preparacion = pre.id_preparacion
where funcion.fecha_final_tanda >= '{$fecha_actual}'");
$v_p=[];
foreach ($validar_peli as $v):
$v_p[]=($v['id_pelicula']);
endforeach;
$lista_limpia= array_values(array_unique($v_p));

$ciudad=$pdo->query("select ciudad.id_ciudad from ciudad");
$ciudad_ciudad=$pdo->query("select ciudad.ciudad from ciudad");

$cant_idciudad=[];
$cant_ciudad=[];
foreach ($ciudad as $r):
$cant_idciudad[] = $r['id_ciudad'];
endforeach;
foreach ($ciudad_ciudad as $r):
    $cant_ciudad[] = $r['ciudad'];
endforeach;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="cartelera1.css">
</head>
<body>
<?php foreach ($lista_limpia as $row):
    $consulta=$pdo->query("select pelicula.ruta_img, pelicula.nombre_pelicula, 
genero_pelicula.genero_pelicula, audio_pelicula.audio_pelicula,
    clasificados.nombre_clasificado, pelicula.descripcion, clasificados.edad_minima,
    ciudad.ciudad, franquicias.localidad, funcion.hora from pelicula".
    " inner join genero_pelicula on genero_pelicula.id_genero = pelicula.genero
    inner join audio_pelicula on audio_pelicula.id_audio = pelicula.audio
    inner join clasificados on clasificados.id_clasificado = pelicula.id_clasificado
    inner join pre on pre.id_pelicula = pelicula.id_pelicula
    inner join ciudad on pre.id_ciudad = ciudad.id_ciudad
    inner join franquicias on franquicias.id_ciudad = ciudad.id_ciudad
    inner join funcion on funcion.id_preparacion = pre.id_preparacion
    where funcion.fecha_final_tanda >= '{$fecha_actual}'".
    "and pelicula.id_pelicula = {$row}");
//$nom_ciudad=$pdo->query("select ciudad.ciudad, franquicias.localidad, id_ciudad from ciudad".
//    " inner join pre on ciudad.id_ciudad = pre.id_ciudad
//    inner join franquicias on franquicias.id_ciudad = ciudad.id_ciudad
//inner join pelicula on pelicula.id_pelicula = pre.id_pelicula
//inner join funcion on funcion.id_preparacion = pre.id_preparacion
//    where funcion.fecha_final_tanda >= '{$fecha_actual}'".
//    "and pelicula.id_pelicula = {$row}");
foreach ($consulta as $fila):?>
  <div id="seccion">
      <div class="cartel">
          <img src="../../modoadmin/GestiondePeliculas/<?php echo$fila['ruta_img']?>"
               height="85%" width="66%" class="imagen">
      </div>
      <div class="nombre">
          <h4>Nombre de la Pelicula</h4>
          <h3 class="h41"><?php echo $fila['nombre_pelicula']?></h3>
      </div>
      <div class="datos">
          <h4>Datos de la Pelicula</h4>
          <h4 class="h42"><?php echo $fila['genero_pelicula']?></h4>
          <h4 class="h42"><?php echo $fila['audio_pelicula']?></h4>
          <h4 class="h42"> <?php echo $fila['nombre_clasificado']?></h4>
          <h4 class="h42"><?php echo $fila['edad_minima']?></h4>
          <h4 class="h42"><?php echo $fila['descripcion']?></h4>
      </div>
      <div class="tandas">
          <h4>Localidades</h4>
          <h4 class="h43"><?php echo $fila['ciudad']?>-<?php echo $fila['localidad']?></h4>
      </div>
      <div class="horario" id="horario">
          <h4>Tandas</h4>
          <h4 class="h43"><?php echo $fila['hora']?></h4>
      </div>
  </div>
<?php
break;
endforeach;
endforeach;?>
</body>
</html>
