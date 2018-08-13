<?php
$hoy = getdate();

print_r($hoy['year']);
print_r($hoy['mon']);
print_r($hoy['mday']);
$fecha=$hoy['year'].$hoy['mon'].$hoy['mday'];
echo $fecha;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="carteStyle.css">
</head>
<body>

<?php for ($one=1;$one<8;$one++ ):?>
<div class="cartel">
    <img src="../../modoadmin/GestiondePeliculas/fotos/deadpool2.jpg" class="image">

</div>
<?php endfor; ?>
</body>
</html>
