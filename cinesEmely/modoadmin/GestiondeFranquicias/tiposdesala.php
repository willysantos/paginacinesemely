<?php
require '../conexion/conexion.php';
$resultado = $pdo->query("Select nombre from tipo_sala");
?>
<div>
    <?php require '../menus/menu_lado.php'; ?>
</div>
<link rel="stylesheet" href="../GestiondeFranquicias/CCSfranquicias/NuevaFranquicia.css">
<body>
<div class="pos">
    <div id="box">
        <form class="form" action="save_tipo_sala.php" method="post" >
            <div class="sec">
                <h4>
                    Registro de un Nuevo Tipo de Sala
                </h4>
            </div>
            <div class="sec">
                <label>Nombre de la Sala</label>
                <br>
                <input type="text" required placeholder="Nombre de al sala" name="nombre_sala">
            </div>
            <div class="sec">
                <button type="submit" class="btn btn-success" name="boton_guardar_audio">Agregar sala</button>
            </div>
        </form>
    </div>
    <div id="main-container">
        <table>
            <thead>
            <tr>
                <th>Tipos de Salas en CinesEmely</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($resultado as $audio): ?>
                <tr>
                    <td><?php echo $audio['nombre']?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
</body>