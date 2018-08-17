<?php
require '../conexion/conexion.php';
$consulta=$pdo->query("select pelicula.ruta_img, pelicula.nombre_pelicula, audio_pelicula.audio_pelicula,
 ciudad.ciudad,franquicias.localidad, pre.fecha_estreno_esperada from pre".
 " inner join pelicula on pelicula.id_pelicula = pre.id_pelicula".
 " inner join audio_pelicula on audio_pelicula.id_audio = pelicula.audio".
 " inner join ciudad on ciudad.id_ciudad = pre.id_ciudad".
 " inner join franquicias on franquicias.id_franquicia = pre.id_franquicia")
?>
<div>
    <?php require '../menus/menu_lado.php'; ?>
</div>
<link rel="stylesheet" href="../GestiondePeliculas/movie.css">
<body>
<div id="main-contai">
    <table >
        <thead>
        <tr>
            <th>Cartel</th>
            <th>Nombre de la Pelicula</th>
            <th>Audio</th>
            <th>Ciudad</th>
            <th>Franquicia</th>
            <th>Fecha de Estreno Esperada</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($consulta as $row): ?>
            <tr>
                <td><img src="../GestiondePeliculas/<?php echo $row['ruta_img']?>" width="60px" height="80px"></td>
                <td><?php echo $row['nombre_pelicula']?></td>
                <td><?php echo $row['audio_pelicula']?></td>
                <td><?php echo $row['ciudad']?></td>
                <td><?php echo $row['localidad']?></td>
                <td><?php echo $row['fecha_estreno_esperada']?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>