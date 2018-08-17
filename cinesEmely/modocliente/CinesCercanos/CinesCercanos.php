<?php
require '../../modoadmin/conexion/conexion.php';
$contador_id_ciudad=0;
$ciudad=$pdo->query("select *from ciudad");
$id_ciudad=$pdo->query("select id_ciudad from ciudad");
$id_c=[];
foreach ($id_ciudad as $id_ciuda):
$id_c[]=$id_ciuda['id_ciudad'];
endforeach;
echo count($id_c);
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .accordion {
            background-color: #eeeeee;
            /*color: #00446d;*/
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: center;
            outline: none;
            font-size: 20px;
            transition: 0.4s;
        }

        .active, .accordion:hover {
            background-color: rgb(45, 123, 168);
        }

        .panel {
            padding: 0 18px;
            background-color: #6f6f6f;
            max-height: 0;
            padding: 0px;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }
    </style>
</head>

<body>
<!--<div>-->
<!--    --><?php //require'../menu/menu_horizontal2.php'; ?>
<!--</div>-->
<?php  foreach ($ciudad as $ciudad): ?>
    <button style="background-color: rgb(47, 145, 191)" class="accordion" ><?php echo $ciudad['ciudad']?> </button>
    <div class="panel">
        <?php if ($contador_id_ciudad<count($id_c)){
            $consulta_localidad=$pdo->query("select * from franquicias".
                " where franquicias.id_ciudad = {$id_c[$contador_id_ciudad]}");
            foreach ($consulta_localidad as $cl):?>
            <button class="accordion"><?php echo $cl['localidad']?> </button>
            <div class="panel" >
            </div>
        <?php
        endforeach;
        } ?>

    </div>
<?php
$contador_id_ciudad = $contador_id_ciudad + 1;

endforeach; ?>


<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight){
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>

</body>
</html>
