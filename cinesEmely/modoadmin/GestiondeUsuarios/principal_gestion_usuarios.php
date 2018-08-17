<?php
require '../conexion/conexion.php';
$consulta=$pdo->query("select usuario.id_usuario, usuario.usuario, usuario.tipo_usuario,
 usuario.contrasena, usuario.estado, ciudad.ciudad,
franquicias.localidad from franquicias".
" inner join ciudad on  franquicias.id_ciudad = ciudad.id_ciudad ".
 " inner join usuario on   franquicias.id_franquicia = usuario.id_franquicia");
?>
<link rel="stylesheet" href="../pre/tab.css">
<div>
    <?php require '../menus/menu_lado.php'; ?>
</div>
<head>
    <style>

        #main-container table{
            border-radius: 10px;
            width: 100%;
            text-align: center;
            background-color: #FFFFFF;
            border-collapse: collapse;

        }

        #main-container tbody{
            background: rgba(223, 223, 223, 0.85);
            color: #005a88;

        }
        #main-container tr td a{
            text-decoration: none;
            color: #005a88;

        }

        #main-container tr td a:hover{
            color: #004773;
            font-size: 15px;
        }
        #main-container tr th{
            color: white;
            font-family: "Roboto", Arial, sans-serif, Helvetica;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div id="main-container">
        <table border="1">
            <thead>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Constraseña</th>
                <th>Estado</th>
                <th>Ciudad</th>
                <th>Tipo de Usuario</th>
                <th>Localidad</th>
                <th>Modificar</th>
                <th>eliminar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($consulta as $row): ?>
                <tr>
                    <td><?php echo $row['usuario']?></td>
                    <td><?php echo $row['contrasena']?></td>
                    <td><?php echo $row['estado']?></td>
                    <td><?php echo $row['tipo_usuario']?></td>
                    <td><?php echo $row['ciudad']?></td>
                    <td><?php echo $row['localidad']?></td>
                    <td><a href="UpdateUsuario.php?cod=<?php echo $row['id_usuario'] ?>">
                            Modificar</a></td>
                    <td><a href="deleteUsuario.php?cod=<?php echo $row['id_usuario']?>">
                            Eliminar</a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>