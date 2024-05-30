<?php foreach($entradas as $entrada):?>
      <article class="entrada-blog">
        <div class="imagen">
            <img loading="lazy" src="/imagenes/<?php echo $entrada->imagen ;?>" alt="texto entrada blog" />
        </div>
    <div class="texto-entrada">
          <a href="/entrada?id=<?php echo $entrada->id ;?>">
            <h4><?php echo $entrada->titulo ;?></h4>
            <p class="fecha-entrada">
              Escrito el: <span><?php echo $entrada->creado ;?> </span> Autor: <span><?php echo $entrada->nombre_autor . " " . $entrada->apellido_autor ;?></span>
            </p>
            <p>
              Haz click aqui para ir directamente al blog
            </p>
          </a>
        </div>
      </article>  

    <?php endforeach ;?> 