<main class="contenedor">
      <h1>Contáctanos</h1>

      <?php if($mensajeExitoso){ ?>
          <p class='alerta exito'> <?php echo $mensajeExitoso; ?> </p>
      <?php } ?>
      
      <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp" />
        <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen de contacto" />
      </picture>
      <h2>Llene el formulario de contacto</h2>

      <form class="formulario" method="POST" action="/contacto ">
        <fieldset>
          <legend>Información personal</legend>
          <label for="nombre">Nombre</label>

          <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]"  />
          
          <label for="mensaje">Mensaje:</label>
          <textarea id="mensaje" name="contacto[mensaje]"  ></textarea>

        </fieldset>
        <fieldset>
          <legend>Información sobre la propiedad</legend>
          <label for="opciones">Que accion desea realizar?</label>

          <select id="opciones" name="contacto[tipo]" >

            <option value=" " disabled selected>--Seleccione</option>
            <option value="Comprar">Comprar</option>
            <option value="Vender">Vender</option>
          </select>
          <label for="precio"> Precio o Presupuesto</label>

          <input type="number" placeholder="ingresa tu presupuesto" id="precio" name="contacto[precio]" />

        </fieldset>
        <fieldset>
          <legend>Recibir Información</legend>


          <p>Como desea ser contactado</p>
          <div class="forma-contacto">
            <label for="contactar-telefono">Telefono</label>

            <input  type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" />

            <label for="contactar-email">Email</label>
            <input  type="radio" value="email" id="contactar-email" name="contacto[contacto]" />
          </div>

          <div id="contacto"></div>

          
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde" />
      </form>
    </main>