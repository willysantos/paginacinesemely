<?php
require '../conexion/conexion.php';
$codigo=$_GET['codigo'];
$consulta=$pdo->query("select franquicias.id_franquicia, franquicias.localidad, ciudad.ciudad
from franquicias".
" inner join ciudad on ciudad.id_ciudad = franquicias.id_ciudad".
    " where franquicias.id_franquicia={$codigo}");
$consulta2=$pdo->query("select * from tipo_sala");
?>
<div>
    <?php require '../menus/menu_lado.php';?>
</div>
<html>

<head>
    <link rel="stylesheet" href="CCSfranquicias/SALA.css">
</head>

<body>
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
            <?php endforeach; ?>
                    <td><select name="select_sala" id="select_sala">
                <?php foreach ($consulta2 as $r): ?>
                            <option value="<?php echo $r['id_tipo_sala'] ?>"><?php echo $r['nombre']?></option>
                <?php endforeach; ?>
                        </select></td>
                <td><button type="submit" class="btn btn-success" name="boton_guardar_sala">Guardar</button></td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>