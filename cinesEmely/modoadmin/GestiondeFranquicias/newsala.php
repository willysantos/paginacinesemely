<?php
require '../conexion/conexion.php';
$codigo=$_GET['codigo'];
$consulta=$pdo->query("select franquicias.id_franquicia, franquicias.localidad, ciudad.ciudad
from franquicias".
" inner join ciudad on ciudad.id_ciudad = franquicias.id_ciudad".
    " where franquicias.id_franquicia={$codigo}");
?>
<div>
    <?php require '../menus/menu_lado.php';?>
</div>
<div>
    <form action="savesala.php" method="post">
        <table border="1">
            <thead>
            <tr>
                <th>Ciudad</th>
                <th>Localidad</th>
                <th>Tipo de Sala</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($consulta as $row): ?>
            <tr>
                <td style="display: none"><input type="text" name="id_franquicia" value="<?php echo $row['id_franquicia']?>"></td>
                <td><?php echo $row['ciudad']?></td>
                <td><?php echo $row['localidad'] ?></td>
                <td><select name="select_sala" id="select_sala">
                        <option value="Premiun">Premiun</option>
                        <option value="Estandar">Estandar</option>
                        <option value="VIP">VIP</option>
                    </select></td>
                <td><button type="submit" class="btn btn-success" name="boton_guardar_sala">Guardar</button></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>
