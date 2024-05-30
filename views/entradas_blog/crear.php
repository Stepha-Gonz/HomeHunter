<main class="contenedor seccion">
    <h1>Crear nuevo Blog</h1>

    <a href="/entradas_blog/admin" class="boton boton-verde">Volver </a>

    <?php foreach($errores as $error):?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach;?>

<form class="formulario" method="POST" enctype="multipart/form-data">
<fieldset>
    <legend>Información del blog</legend>
    <label for="titulo">Título</label>
    <input type="text" name="entrada[titulo]" id="titulo" placeholder="Inserta el nombre del blog" value="<?php echo s($entradas->titulo ); ?>">
    <label for="imagen">imagen:</label>
    <input type="file" id="imagen" name="entrada[imagen]" accept="image/jpeg, image/png, image/jpg">
    
    <?php if($entradas->imagen): ?>
        <img src="/imagenes/<?php echo $entradas->imagen?>" class="imagen-small">
    <?php endif; ?>

    
    
    <label for="descripcion">Descripción</label>
    <textarea id="descripcion" name="entrada[descripcion]"><?php echo s($entradas->descripcion ); ?></textarea>
    <label for="autor">Autor</label>
    <select name="entrada[autores_id]" id="autor">
        <option selected value="">--Seleccione--</option>
        <?php foreach ($autores as $autor): ?>
            <option 
            <?php //echo $entrada->autores_id === $entrada->id ? 'selected' : '';  ?> 
            value="<?php echo s($autor->id);?>"><?php echo s($autor->nombre) . " " .  s($autor->apellido) ;?> 
            </option>
        <?php endforeach; ?>
    </select>
</fieldset>

<input type="submit" value="Crear Blog" class="boton boton-verde">
</form>


</main>
