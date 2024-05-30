<main class="contenedor seccion">

    <h1>Actualizar Blog</h1>

    <a href='/entradas_blog/admin' class="boton boton-verde" > Volver </a>
    <?php foreach($errores as $error): ?>
        <div class="alerta error"><?php echo $error ;?> </div>
    <?php endforeach; ?>
    <form method="POST" class="formulario" enctype="multipart/form-data">
        <fieldset>
        <legend>Información del Blog</legend>
        <label for="titulo">TÍTULO</label>
        <input type="text" name=entrada[titulo] id=titulo placeholder="Inserta el nombre del blog" value="<?php echo s($entradas->titulo) ;?>">
        <label for="imagen">Imagen:</label>
        <input type="file" name="entrada[imagen]" id="imagen" accept="image/jpg, image/png, image/jpeg" >

            <?php if($entradas->imagen): ?>
                <img src="/imagenes/<?php echo $entradas->imagen?>" class="imagen-small">
            <?php endif; ?>

        <label for="descripcion">Descripcion</label>
        <textarea name="entrada[descripcion]" id="descripcion" <?php echo s($entradas->descripcion) ;?>><?php echo s($entradas->descripcion) ;?></textarea> 
        <label for="autor">Autor</label>
        <select name="entrada[autores_id]" id="autor" >
            <option selected value=""> --Seleccione--</option>
        <?php foreach($autores as $autor): ?>
            <option
             <?php echo $entradas->autores_id === $autor->id ? 'selected' : '';  ?>
             value="<?php echo s($autor->id); ?>"> <?php echo s($autor->nombre) . " " . s($autor->apellido) ; ?> </option>
        <?php endforeach; ?>
        </select>

        </fieldset>
        <input type="submit" value="Actualizar Blog" class="boton boton-verde">
    </form>





</main>

