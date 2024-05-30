<main class="contenedor seccion">
    <h1> Blogs HomeHunter </h1>

<?php 
if($resultado){
    $mensaje= mostrarNotificacion(intval($resultado));
    if($mensaje) { ?>

        <p class="alerta exito"><?php echo s($mensaje) ?></p>
    
    <?php } ?>
<?php } ?>

<a href='/entradas_blog/crear' class='boton-verde'> Crear Blog </a>
<a href="/admin" class="boton boton-azul" > Ir a Propiedades</a>

<table class="entradas_blog">
    <thead>
        <tr>
            <th>Id</th>
            <th>Imagen</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Fecha de Creación</th>
            <th>Autor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($entradas as $entrada): ?>
        <tr>
            <td><?php echo $entrada->id;?></td>
            <td><img src="/imagenes/<?php echo $entrada->imagen;?>" class="imagen-tabla"> </td>
            <td><?php echo $entrada->titulo;?></td>
            <td><?php echo $entrada->descripcion;?></td>
            <td><?php echo $entrada->creado;?></td>
            
            <td><?php echo $entrada->nombre_autor . ' ' . $entrada->apellido_autor; ?></td> 
            <!-- <td><?php// echo $entrada->autores_id ;?></td> -->
            <td>
                    <form method="POST" class="w-100" action="/entradas_blog/eliminar"> 
                    <input type="hidden" name="id" value="<?php echo $entrada->id ?>">
                    <input type="hidden" name="tipo" value="entradas">
                    <input type="submit" class="boton-rojo-block" value="Eliminar"></input>
                    </form>
                <a href="/entradas_blog/actualizar?id=<?php echo $entrada->id; ?>" class="boton-amarillo">Actualizar</a>
            </td>
        </tr>   
        <?php endforeach; ?> 
    </tbody>
</table>


</main>