<?php
require '../conexion/conexion.php';
$resultado = $pdo->query("Select genero_pelicula from genero_pelicula");
?>
<div>
    <?php require '../menus/menu_lado.php'; ?>
</div>
<head>
    <link rel="stylesheet" href="CSSPeliculas/EstilosPelicula.css">
</head>

<body>
<div class="pos">
<div id="box">
        <form id="form" action="save_genero.php" method="post" style="height: 100px">
            <div class="sec">
                <label>Nombre del Genero </label>
                <input type="text"  name="nombre_genero">
            </div>
            <div class="sec">
                <button type="submit" class="btn btn-success" name="boton_guardar_genero">Agregar Genero</button>
            </div>
        </form>
</div>
<div id="main-container">
    <table>
        <thead>
        <tr>
            <th>Generos</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($resultado as $genero): ?>
            <tr>
                <td><?php echo $genero['genero_pelicula']?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
</div>
</body>