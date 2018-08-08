<form id="form" action="savePre.php" method="post" >
    <div class="container">
        <h2>Registrando una nueva Pre</h2>
        <br>
        <label>Seleccione la Pelicula</label>
        <br>
        <select name="select_pelicula" id="select_pelicula">
            <?php foreach ($pelicula as $row): ?>
                <option value="<?php echo $row['id_pelicula']?>"><?php echo $row['nombre_pelicula']?>
                    --- <?php echo$row['audio_pelicula']?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>Seleccione Ciudad</label>
        <br>
        <select name="select_ciudad" id="select_ciudad" onchange="cargarlocalidad(this.value)">
            <?php echo '<option>-- Seleccione una Opcion --</option>';?>
            <?php foreach ($ciudad as $c): ?>
                <option value="<?php echo $c['id_ciudad'];?>"><?php echo $c['ciudad'];?></option>
            <?php endforeach;?>
        </select>
        <br>
        <label >Seleccione Franquicia</label>
        <br>
        <select name="select_franquicia" id="select_franquicia">
        </select>
        <br>
        <label>Fecha de Estreno Esperada</label>
        <br>
        <input type="date" name="fecha" >
        <br>
        <button type="submit" name="boton_guardar_pre">Registrar Pre</button>
    </div>
</form>