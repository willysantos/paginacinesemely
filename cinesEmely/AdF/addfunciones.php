<?php
require '../modoadmin/conexion/conexion.php';
$consulta=$pdo->query("select *from ciudad");
?>
<script src="../modoadmin/pre/jquery-3.3.1.min.js">
</script >
<script>
    function cargarpre(val){
        $.ajax({
            type: "POST",
            url: 'cargarpre.php',
            data: 'id_franquicia='+val,
            success: function(resp){
                $('#cargarpre').html(resp);
            }
        })
    }
    function cargarfran(val){
        $.ajax({
            type: "POST",
            url: 'cargarfran.php',
            data: 'id_ciudad='+val,
            success: function(resp){
                $('#select_franquicia').html(resp);
            }
        })
    }
</script>
<div>
    <?php require '../modoadmin/menus/menuAdF.php'?>
</div>
<head>
    <link rel="stylesheet" href="CSSaddFranquicias/addFunc.css">
</head>
<body>
<div>
    <div>
        <form action="" method="post">
            <select name="select_ciudad" id="select_ciudad" onchange="cargarfran(this.value)">
                <?php echo '<option>Seleccione una Ciudad </option>';?>
                <?php foreach ($consulta as $c): ?>
                    <option value="<?php echo $c['id_ciudad']?>"><?php echo $c['ciudad']?></option>
                <?php endforeach;?>
            </select>
            <select name="select_franquicia" id="select_franquicia" onchange="cargarpre(this.value)">

            </select>
        </form>

    </div>
</div>
</body>