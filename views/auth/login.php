<main class="contenedor contenido-centrado">
<h1>Login</h1>
<?php foreach($errores as $error): ?> 
    <div class="alerta error">
    <?php echo $error?>
    </div>
    
    <?php endforeach; ?>
    
    <form class="formulario " method="POST" action="/login">
    <fieldset>
    <legend>Email y Password</legend>
    
    <label for="email">E-mail</label>
    <input type="email" name="email" placeholder="Tu E-mail" id="email" value=<?php echo $email; ?> >
    <label for="password">password</label>
    <input type="password" name="password" placeholder="Tu password" id="password"  />
    <input type="submit"  class="boton boton-verde-block" value="Iniciar Sesión" >
    </fieldset>
    
    </form>
    </main>