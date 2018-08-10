<?php
require '../../modoadmin/conexion/conexion.php';
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
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .active, .accordion:hover {
            background-color: #ccc;
        }

        .panel {
            padding: 0 18px;
            background-color: white;
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
    <button class="accordion" value="<?php echo $ciudad['id_ciudad']?> " ><?php echo $ciudad['ciudad']?> </button>
    <div class="panel">
        <?php
        for ($contador_id_ciudad=0;$contador_id_ciudad <count($id_c);$contador_id_ciudad++) {
        ?>
        <p style="color: black"><?php echo $id_c[$contador_id_ciudad] ?></p>
        <?php
        }   ?>
    </div>
<?php endforeach; ?>


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
