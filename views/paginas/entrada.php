<main class="contenedor seccion contenido-centrado">

      <h1><?php echo $entradas->titulo ;?></h1>
      
        <img loading="lazy" src="/imagenes/<?php echo $entradas->imagen ;?>" alt="imagen del blog" />
     
      <p class="fecha-entrada">
        Escrito el: <span> <?php echo $entradas->creado ;?> </span> Autor: <span><?php echo $entradas->nombre_autor . " " . $entradas->apellido_autor ;?></span>
      </p>
      <p>
        <?php echo $entradas->descripcion ;?>
      </p>
    </main>