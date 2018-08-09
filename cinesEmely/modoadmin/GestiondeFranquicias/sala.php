<?php
require '../conexion/conexion.php';
$consulta=$pdo->query("select ciudad.ciudad, franquicias.localidad, tipo_sala.nombre, sala.estado, 
sala.nombre_sala from franquicias".
" inner join ciudad on ciudad.id_ciudad=franquicias.id_ciudad".
" inner join sala on sala.id_franquicia=franquicias.id_franquicia".
" inner join tipo_sala on sala.id_tipodesala = tipo_sala.id_tipo_sala")
?>
<div>
    <?php require '../menus/menu_lado.php';?>
</div>
<link rel="stylesheet" href="../pre/tab.css">
<body>
    <div id="main-container">
        <table border="1">
            <thead>
            <tr>
                <th>Ciudad</th>
                <th>Localidad</th>
                <th>Tipo de Sala</th>
                <th>Estado</th>
                <th>Nobre de Sala</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($consulta as $direcc):?>
                <tr>
                    <td><?php echo $direcc['ciudad']?></td>
                    <td><?php echo $direcc['localidad']?></td>
                    <td><?php echo $direcc['nombre']?></td>
                    <td><?php echo $direcc['estado']?></td>
                    <td><?php echo $direcc['nombre_sala']?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</body>
