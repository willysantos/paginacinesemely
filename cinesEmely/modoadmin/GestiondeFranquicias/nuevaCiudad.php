 <?php
 require '../conexion/conexion.php';
 $mensaje = [];
if (!empty($_POST)){
    $ciudad = $_POST['nombre_ciudad'];
    $insertar = $pdo->exec("insert into ciudad(ciudad) values ('{$ciudad}')");
     if ($insertar >= 1){
         $mensaje[] = 'La ciudad fue creada';
     }
}
$resultado = $pdo->query("Select ciudad from ciudad")
 ?>
 <div>
     <?php
     require '../principal/principaladmin.php';
     ?>
 </div>
 <link rel="stylesheet" href="../pre/tab.css">
 <body>
<div class="pos">
    <div id="box">
        <form class="for" action="" method="post" >
            <div class="sec">
                <h4>
                    Registro de Nueva Ciudad
                </h4>
            </div>
            <div class="sec">
                <label>Nombre de la Ciudad</label>
                <input type="text" required placeholder="Nombre de la Ciudad" name="nombre_ciudad">
            </div>
            <div class="sec">
                <button type="submit" class="btn btn-success" name="boton_guardar_ciuedad">Agregar Ciudad</button>
                <?php
                if (!empty($mensaje)):
                    echo '<ul>';
                    foreach ($mensaje as $mensajes){
                        echo "<li>{$mensajes}</li>";
                    }
                    echo '</ul>';
                endif;
                ?>
            </div>
        </form>
    </div>
    <div id="main-container">
         <table  border="1">
            <thead>
                <tr>
                    <th>Ciudades</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $ciudad): ?>
                <tr>
                    <td><?php echo $ciudad['ciudad']?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
 </body>