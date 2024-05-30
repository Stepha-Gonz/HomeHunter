<main class="contenedor">
    <h1>Administrador HomeHunter</h1>

<?php 
if($resultado){
    $mensaje= mostrarNotificacion(intval($resultado));
    if($mensaje) { ?>

        <p class="alerta exito"><?php echo s($mensaje) ?></p>
    
    <?php } ?>
<?php } ?>

    
<a href="/propiedades/crear" class="boton boton-verde" > Nueva Propiedad</a>
<a href="/vendedores/crear" class="boton boton-amarillo-block" > Nuevo(a) vendedor</a>
<a href="/entradas_blog/admin" class="boton boton-azul" > Ir a  Blogs</a>
<h2>Propiedades</h2>
<table class="propiedades"> 
    <!-- Mostrar resultados -->
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody> 
    <!-- aqui va el codigo de la base de datos -->
        <?php foreach($propiedades as $propiedad) : ?>
            <tr>
                <td><?php echo $propiedad->id; ?> </td>
                <td> <?php echo $propiedad->titulo; ?> </td>
                <td><img src="/imagenes/<?php echo $propiedad->imagen;?>"  class="imagen-tabla"></td>
                <td>$ <?php echo $propiedad->precio; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/propiedades/eliminar"> 
                    <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                    <input type="hidden" name="tipo" value="propiedad">
                    <input type="submit" class="boton-rojo-block" value="Eliminar"></input>
                    </form>
                <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo">Actualizar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h2>Vendedores</h2>
      <table class="propiedades"> 
         <!-- Mostrar resultados -->
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody> 
          <!-- aqui va el codigo de la base de datos -->
          <?php foreach($vendedores as $vendedor) : ?>
          <tr>
            <td><?php echo $vendedor->id; ?> </td>
            <td><?php echo $vendedor->nombre . " " .  $vendedor->apellido;  ?> </td>
            <td><?php echo $vendedor->telefono; ?></td>
            <td>
              <form method="POST" class="w-100" action ="/vendedores/eliminar"> 
                <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
                <input type="hidden" name="tipo" value="vendedor">
                <input type="submit" class="boton-rojo-block" value="Eliminar"></input>
              </form>
              
              <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo">Actualizar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <!-- <a href="../cerrar-sesion.php" class="boton boton-rojo" > Cerrar sesion</a> -->
</main>