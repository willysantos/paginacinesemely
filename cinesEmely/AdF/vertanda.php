<?php
require '../modoadmin/conexion/conexion.php';
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
//$fecha_limite_correcta=str_replace("-","",$f_l[0]);
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

<div>
    <?php require '../modoadmin/menus/menuAdF.php'?>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
<!--    <link rel="stylesheet" href="../modocliente/PeliculasHoy/cartelera1.css">-->
<style>
    body{
        background: #eeeeee;
        /*height: 100%;*/
        font-family: "Roboto", Arial, sans-serif, Helvetica;
        padding-left: 170px;
    }
    #seccion{
        margin-right: 150px ;
        width: 100%;
        height: 300px;
        background-color: #c0c0cd;
        display:inline;
        margin-top: 10px;

    }
    .det{
        height: 400px;
        margin: 25px 15px 25px 20px;
        display: inline-block;
        /*margin-right: 20px;*/
        background: #567d8d;
        box-shadow: 2px 2px 2px #c0c0cd;
        padding: 5px 5px 5px 5px;
        border-radius: 2px;
    }

    .h42{
        display: inline-block;
        margin-right: 25px;
        /*margin: 5px 15px 10px 5px;*/
        padding: 10px 5px 15px 10px;
        /*background: #005f81;*/
        color: #eeeeee;
    }
    .detalles{
        background: #eeeeee;
        display: flex;

    }
    .imagen{
        border-radius: 2px;
        box-shadow: 2px 2px 2px #eeeeee;
        margin: 5px 15px 15px 30px;
    }
</style>

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

            <div class="detalles">
                <div class="cartel">
                    <img src="../modoadmin/GestiondePeliculas/<?php echo$fila['ruta_img']?>"
                         height="400" width="300" class="imagen">
                </div>
            <div class="det">
                <h4>Nombre de la Pelicula</h4>
                <h4 class="h42"><?php echo $fila['nombre_pelicula']?></h4>
            </div>
            <div class="det">
                <h4>Datos de la Pelicula</h4>
                <h4 class="h42"><?php echo $fila['genero_pelicula']?></h4>
                <h4 class="h42"><?php echo $fila['audio_pelicula']?></h4>
                <h4 class="h42"> <?php echo $fila['nombre_clasificado']?></h4>
                <h4 class="h42"><?php echo $fila['edad_minima']?></h4>
                <h4 class="h42"><?php echo $fila['descripcion']?></h4>
            </div>
            <div class="det">
                <h4>Localidades</h4>
                <h4 class="h42"><?php echo $fila['ciudad']?>-<?php echo $fila['localidad']?></h4>
            </div>
            <div class="det" id="horario">
                <h4 >Tandas</h4>
                <h4 class="h42"><?php echo $fila['hora']?></h4>
            </div>
            </div>
        </div>
        <?php
        break;
    endforeach;
endforeach;?>
</body>
</html>