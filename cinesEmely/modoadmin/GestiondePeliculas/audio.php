<?php
require '../conexion/conexion.php';
$resultado = $pdo->query("Select audio_pelicula from audio_pelicula");
?>
<div>
    <?php require '../menus/menu_lado.php'; ?>
</div>
<link rel="stylesheet" href="../pre/tab.css">
<body>
<div class="pos">
    <div id="box">
        <form class="form" action="save_audio.php" method="post" >
            <div class="sec">
                <h4>
                    Registro de un Nuevo Audio
                </h4>
            </div>
            <div class="sec">
                <label>Nombre del Audio</label>
                <br>
                <input type="text" required placeholder="Nombre del audio" name="nombre_audio">
            </div>
            <div class="sec">
                <button type="submit" class="btn btn-success" name="boton_guardar_audio">Agregar Audio</button>
            </div>
        </form>
    </div>
<div id="main-container">
    <table  border="1">
        <thead>
        <tr>
            <th>Audios</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($resultado as $audio): ?>
            <tr>
                <td><?php echo $audio['audio_pelicula']?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
</div>
</body>