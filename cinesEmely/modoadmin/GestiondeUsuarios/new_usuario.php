<?php
require '../conexion/conexion.php';
$franquicia = $pdo->query("select ciudad.ciudad, franquicias.id_franquicia, franquicias.localidad from franquicias".
 " inner join ciudad on ciudad.id_ciudad = franquicias.id_ciudad");
?>
<div>
    <?php require'../menus/menu_lado.php' ?>
</div>
<link rel="stylesheet" href="../GestiondePeliculas/CSSPeliculas/EstilosPelicula.css">
<body>
<div class="pos">
    <div id="box">

<form id="form" action="save_usuario.php" method="post" >
    <div class="container">
        <div class="sec">
            <h4>Registro de Nuevo Usuario</h4>
        </div>
        <div class="sec">
            <label >Nombre de Usuario</label>
            <input type="text"  name="usuario">
        </div>
        <div class="sec">
            <label >Contraseña</label>
            <input type="text"  name="contrasena">
        </div>
        <div class="sec">
            <label >Tipo de Usuario</label>
            <select name="select_tipo" id="select_tipo">
                <option value="Administrador_Franquicia">Administrador de Franquicia</option>
                <option value="Ventas">Ventas</option>
            </select>
        </div>
        <div class="sec">
            <label>Franquicia de Asignacion</label>
            <select name="select_franquicia" id="select_franquicia">
            <?php foreach ($franquicia as $row):?>
            <option value="<?php echo $row['id_franquicia']?>" ><?php echo $row['ciudad']?>-<?php echo $row['localidad']?></option>
            <?php endforeach;?>
            </select>
        </div>
        <div class="sec">
            <button type="submit" class="btn btn-success" name="boton_guardar_usuario">Agregar Usuario</button>
        </div>
    </div>
</form>

    </div>
</div>
</body>