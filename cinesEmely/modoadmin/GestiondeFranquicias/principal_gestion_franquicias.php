<?php
require '../conexion/conexion.php';
$consulta=$pdo->query("select ciudad.ciudad, franquicias.id_franquicia, franquicias.localidad
from franquicias".
" inner join ciudad on ciudad.id_ciudad = franquicias.id_ciudad");
$consulta2=$pdo->query("select sala.nombre_sala from sala".
    " inner join franquicias on franquicias.id_franquicia = sala.id_franquicia");
?>
<div>
<?php
require '../menus/menu_lado.php';
?>
</div>

<script src="../pre/jquery-3.3.1.min.js">
</script >
<script>
    function cargarcuerpo(val){
        $.ajax({
            type: "POST",
            url: 'cuerpo_pgf.php',
            data: 'id_franquicia='+val,
            success: function(resp){
                $('#cuerpo').html(resp);
            }
        })
    }
</script>
<head>
    <style>
        #contenedor{
            margin: 5% 2% 5% 25%;
            width: 90%;
            /*padding: 15px 5px 55px 20px;*/
            height: 100px;
           /*box-shadow: 2px 5px #005a88;*/
-moz-box-shadow: #37a0e1;
        }
        form h2 {
            background: #005a88;
            width: 40%;
            padding-top: 5px;
            color: #eeeeee;

        }

        .formufra{
            font-family: "Roboto", Arial, sans-serif, Helvetica;
            background: #eeeeee;
            width: 70%;
            color: #005a88;
            height: 100px;
            text-align: center;
            border-radius: 5px;
        }
        .formufra select{
            border-radius: 2px;
            background: #eee;
            color: #005a88;
            width: 67%;
        }

        .formufra select:focus{
            outline: none;
        }
        #select_ciudad{
            height: 25px;
            text-align: center;
        }
    </style>
</head>

<body>
<div id="contenedor">
    <div class="formufra">
        <form action="principal_gestion_franquicias.php">
            <h2>Seleccion Franquicia</h2>
            <select name="select_ciudad" id="select_ciudad" onchange="cargarcuerpo(this.value)">
                <option value="0">Elija una Localidad</option>
            <?php foreach ($consulta as $row):?>
                <option value="<?php echo $row['id_franquicia']?>"><?php echo $row['ciudad']?>--
                    <?php echo $row['localidad']?></option>
            <?php endforeach; ?>
            </select>

<!--            <td>-->
<!--                <button type="submit" name="btn" id="btn">Buscar</button>-->
<!--            </td>-->
        </form>
    </div>
    <div class="cuerpo" id="cuerpo">

    </div>
</div>
</body>
<?php
//session_start();
//
//$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']:false;
//
//
//if (!$iniciado){
//    header("../login/inicio-sesion.php");
//
//}else{
//    require '../menus/menu_lado.php';
//
//}
//?>