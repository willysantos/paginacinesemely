<?php
require '../conexion/conexion.php';
$resultado=$pdo->query("select * from tipo_sala");
?>
<div>
    <?php require '../menus/menu_lado.php' ;?>
</div>
<link rel="stylesheet" href="../GestiondeFranquicias/CCSfranquicias/AddAsiento.css" >
<body>
<form id="form" action="save_asientos.php" method="post">
    <div class="container">
    <div class="sec">
        <label>Escriba la letra del asiento</label>
        <input type="text" name="letra" required="Escruba una letra">
    </div>
    <div class="sec">
        <label>Hasta que numero desea llegar</label>
        <input type="text" name="num">
    </div>
    <div class="sec">
        <label>Seleccione a que tipo de sala pertenece</label>
        <select name="select_tiposala" id="select_tiposala">
        <?php foreach ($resultado as $row): ?>
        <option value="<?php echo $row['id_tipo_sala'] ?>"><?php echo $row['nombre']?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="sec">
        <button type="submit" class="btn btn-success" name="boton_guardar_tipodesala">Agregar Asientos</button>
    </div>
    </div>
</form>
</body>