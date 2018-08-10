<?php
require '../modoadmin/conexion/conexion.php';
$cod=$_POST['id_franquicia'];
$consulta=$pdo->query("select pre.id_preparacion, pelicula.nombre_pelicula, franquicias.localidad,
 pre.fecha_estreno_esperada, pelicula.ruta_img from pre".
" inner join pelicula on pelicula.id_pelicula = pre.id_pelicula".
" inner join franquicias on franquicias.id_franquicia = pre.id_franquicia".
" where franquicias.id_franquicia = {$cod}");
?>
<table border="1">
    <theat>
        <tr>
            <th>Nombre de la Pelicula</th>
            <th>Nombre de la Franquicia</th>
            <th>Fecha de Estreno Esperada</th>
            <th>Cartel</th>
            <th>Acciones</th>
        </tr>
    </theat>
    <tbody>
        <?php foreach ($consulta as $item):?>
        <tr>
            <td><?php echo $item['nombre_pelicula']?></td>
            <td><?php echo $item['localidad']?></td>
            <td><?php echo $item['fecha_estreno_esperada']?></td>
            <td><img src="../modoadmin/GestiondePeliculas/<?php echo $item['ruta_img'] ?>" alt="" height="90px" width="60"></td>
            <td><button><a href="addfuncion.php?cod=<?php echo $item['id_preparacion']?>">Agregar a Funcion</a></button></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
