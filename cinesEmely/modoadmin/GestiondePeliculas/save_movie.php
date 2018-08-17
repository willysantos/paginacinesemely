<?php
require '../conexion/conexion.php';

    $pelicula=$_POST['nombre_pelicula'];
    $genero=$_POST['select_genero'];
    $audio=$_POST['select_audio'];
    $clasificados=$_POST['select_clasificado'];
    $descripcion=$_POST['descripcion'];
    $fecha=$_POST['fecha_de_registro'];
    $link=$_POST['link'];
    $foto = $_FILES['foto']['name'];
    $ruta = $_FILES['foto']['tmp_name'];
    $destino = "fotos/".$foto;
    copy($ruta, $destino);
//move_uploaded_file($ruta['tmp_name'],$destino);
//$foto=$_FILES['foto'];
//$partes=explode('.',$foto['foto']);
//$extension =$partes[count($partes) -1 ];
//$nombre_generado= time().'_'.mt_rand(1000,2000). '.'. $extension;
//if ($foto['error']===0){
//    $resultado=move_uploaded_file($foto['tmp_name'],'fotos/'.$nombre_generado);
//    if ($resultado){
//        echo "no se pudo subir la ia=magen";
//    }
//}

    $inser=$pdo->exec("insert into pelicula(nombre_pelicula,genero,audio,id_clasificado,descripcion,
fecha_de_registro, ruta_img, link)".
     " values('{$pelicula}',{$genero},{$audio},{$clasificados},'{$descripcion}','{$fecha}','{$destino}','{$link}')");
    header("Location: principal_peliculas.php");
    exit();

?>