<?php
require '../modoadmin/conexion/conexion.php';

$cod=$_GET['cod'];
$consulta=$pdo->query("select pre.id_franquicia from pre".
" where pre.id_preparacion = {$cod}");
foreach ($consulta as $cc):
$fran=$cc['id_franquicia'];
endforeach;

$consulta2=$pdo->query("select pre.id_preparacion, pelicula.nombre_pelicula, franquicias.localidad,
 pre.fecha_estreno_esperada, pelicula.ruta_img from pre".
    " inner join pelicula on pelicula.id_pelicula = pre.id_pelicula".
    " inner join franquicias on franquicias.id_franquicia = pre.id_franquicia".
    " where franquicias.id_franquicia = {$fran}");

$sala=$pdo->query("select *from sala".
" where sala.id_franquicia = {$fran}");

?>
<div>
    <?php require '../modoadmin/menus/menuAdf_aparencia.php';?>
</div>
<form action="saveaddfuncion" method="post">
    <div>
        <h4>Agregando una nueva Funcion</h4>
    </div>
    <div>
        <label>ID de Prelanzamiento</label>
        <input type="text" name="id_pre" value="<?php echo $cod ?>">
    </div>
    <?php foreach ($consulta2 as $c2):?>
    <div>
        <label >Nombre de la Pelicula</label>
        <input type="text" name="nombre_pelicula" value="<?php echo $c2['nombre_pelicula'] ?>">
    </div>
    <div>
        <img src="../modoadmin/GestiondePeliculas/<?php echo $c2['ruta_img']?>" height="100px" width="60px">
    </div>
    <div>
        <label >Localidad</label>
        <input type="text" name="localidad" value="<?php echo $c2['localidad'] ?>">
    </div>
    <?php endforeach; ?>
    <div>
        <select name="select_sala" id="select_sala">
            <option value="0">Seleccion una sala</option>
            <?php foreach ($sala as $s): ?>
                <option value="<?php echo $a['id_sala'] ?>"><?php echo $s['nombre_sala'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label >Fecha Limite</label>
        <input type="date" name="fecha">
    </div>
    <div>
        <label >Hora de Funcion</label>
        <input type="time" name="time">
    </div>
    <div>
        <input type="submit" value="Agregar Funcion">
    </div>
</form>
