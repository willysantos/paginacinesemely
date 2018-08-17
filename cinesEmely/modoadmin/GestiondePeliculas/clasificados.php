<?php
require '../conexion/conexion.php';
$resultado = $pdo->query("Select nombre_clasificado, edad_minima from clasificados");
?>
<link rel="stylesheet" href="CSSPeliculas/EstilosPelicula.css">
<div>
    <?php require '../menus/menu_lado.php'; ?>
</div>
<body>
<div class="pos">
    <div id="box">
        <form class="form" action="save_clasificados.php" method="post" >
            <div class="sec">
                <h4>
                    Registro de un Nuevo Clasificado
                </h4>
            </div>
            <div class="sec">
                <label>Nombre del Clasificado</label>
                <input type="text"  name="nombre_clasificado">
            </div>
            <div class="sec">
                <label>Edad Minima del Clasificado</label>
                <input type="text"  name="edad_minima">
            </div>
            <div class="sec">
                <button type="submit" class="btn btn-success" name="boton_guardar_clasificado">Agregar Clasificado</button>
            </div>
        </form>
    </div>

<div id="main-container">
    <table >
        <thead>
        <tr>
            <th>Nombre del Clasificado</th>
            <th>Edad Mínima</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($resultado as $clasificado): ?>
            <tr>
                <td><?php echo $clasificado['nombre_clasificado']?></td>
                <td><?php echo $clasificado['edad_minima']?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
</div>
</body>