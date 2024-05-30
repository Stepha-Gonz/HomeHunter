<fieldset>
<legend>Informacion General </legend>
<label for="titulo">Titulo:</label>
<input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo propiedad" value="<?php echo s($propiedad->titulo ); ?>" >

<label for="precio">precio:</label>
<input type="number" id="precio" name="propiedad[precio]" placeholder="Precio propiedad" value="<?php echo s($propiedad->precio) ; ?>" >

<label for="imagen">imagen:</label>
<input type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg, image/png, image/jpg">

    <?php if($propiedad->imagen): ?>
        <img src="/imagenes/<?php echo $propiedad->imagen?>" class="imagen-small">
    <?php endif; ?>


<label for="descripcion">descripcion:</label>
<textarea  id="descripcion" name="propiedad[descripcion]" ><?php echo s($propiedad->descripcion) ; ?></textarea>

</fieldset>

<fieldset>
<legend>Informacion propiedad</legend>
<label for="habitaciones">Habitaciones:</label>
<input type="number" max=10 min=0 placeholder="Ej:1" id="habitaciones" name="propiedad[habitaciones]" value="<?php echo s($propiedad->habitaciones); ?>">
<label for="wc">Baños:</label>
<input type="number" max=10 min=0 placeholder="Ej:1" id="wc" name="propiedad[wc]" value="<?php echo s($propiedad->wc) ; ?>">
<label for="estacionamiento">Estacionamientos:</label>
<input type="number" max=10 min=0 placeholder="Ej:1" id="estacionamiento" name="propiedad[estacionamiento]" value="<?php echo s($propiedad->estacionamiento) ; ?>">
</fieldset>

<fieldset>
    <Legend>Vendedor</Legend>
    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedores_id]" id="vendedor">
        <option selected value=""> --Seleccione--</option>
        <?php foreach($vendedores as $vendedor): ?>
            <option
             <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : '';  ?>
             value="<?php echo s($vendedor->id); ?>"> <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido) ; ?> </option>
        <?php endforeach; ?>


    </select>
</fieldset>