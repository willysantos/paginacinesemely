<?php
require '../conexion/conexion.php';
$mensaje = [];
$ciudades = $pdo->query("Select * from ciudad");
$consulta = $pdo->query("select franquicias.id_franquicia, ciudad.ciudad, franquicias.localidad, franquicias.activo from franquicias"
. " inner join ciudad on ciudad.id_ciudad = franquicias.id_ciudad");
?>
<link rel="stylesheet" href="CCSfranquicias/NuevaFranquicia.css">

<div>
    <?php require '../menus/menu_lado.php';?>
</div>
<body>
<div class="pos">
    <div id="box">
        <form class="form" action="guardar_franquicia.php" method="post" >
            <div class="sec">
                <label>Nombre de la Ciudad</label>
                <select name="select_ciudad" id="select_ciudad">
                <?php foreach ($ciudades as $row):?>
                <option value="<?php echo $row['id_ciudad']?>" ><?php echo $row['ciudad']?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="sec">
                <label >Direccion de la Franquicia</label>
                <br>
                <input type="text"  name="direccion_franquicia">
            </div>
            <div class="sec">
                <button type="submit" class="btn btn-success" name="boton_guardar_ciuedad">Agregar Franquicia</button>
            </div>
        </form>
    </div>
        <div id="main-container">
            <table >
                <thead>
                    <tr>
                        <th>Ciudad</th>
                        <th>Direccion</th>
                        <th>Estado</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consulta as $direcc):?>
                    <tr>
                        <td><?php echo $direcc['ciudad']?></td>
                        <td><?php echo $direcc['localidad']?></td>
                        <td><?php echo $direcc['activo']?></td>
                        <td><a href="UpdateFranquicia.php?cod=<?php echo $direcc['id_franquicia'] ?>">
                                Modificar</a></td>
                        <td><a href="eliminar_franquicia.php?codigo=<?php echo $direcc['id_franquicia']?>">
                                Eliminar</a></td>
                        <td>
                            <a href="newsala.php?codigo=<?php echo $direcc['id_franquicia']?>">Agregar Sala</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
</div>
</body>

