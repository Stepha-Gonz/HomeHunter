<?php
if(!isset($_SESSION)){
    session_start();
}
$auth= $_SESSION['login'] ?? false;
if (!isset($inicio)){
    $inicio=false;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../build/css/app.css" />
<title>HomeHunter</title>
</head>
<body>
<header class="header <?php echo $inicio ? 'inicio' : ''; ?> ">
<div class="contenedor contenido-header">
<div class="barra">
    <a href="/">
    <img src="../build/img/logo.png" alt="logotipo compania" />
    </a>
    <div class="mobile-menu">
    <img src="../build/img/barras.svg" alt="icono menu responisve" />
    </div>
    <div class="derecha">
    <img class="dark-mode-boton" src="../build/img/dark-mode.svg" alt="modo nocturno" />
    <nav class="navegacion">
    <a href="/nosotros">Nosotros</a>
    <a href="/propiedades">Anuncios</a>
    <a href="/blog">Blog</a>
    <a href="/contacto">Contacto</a>
    <?php if($auth): ?>
        <a href="/logout">Cerrar sesion </a>
        <?php endif; ?>
        </nav>
        </div>
</div>

    
    <?php if($inicio){ ?>
        <h1>Venta de Casas y Apartamentos de lujo</h1>
        <?php } ?>
        
        </div>
        </header>

        
        <?php echo $contenido; ?>
        
        
        
        <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
        <nav class="navegacion">
        <a href="/nosotros">Nosotros</a>
        <a href="/propiedades">Anuncios</a>
        <a href="/blog">Blog</a>
        <a href="/contacto">Contacto</a>
        </nav>
        </div>
        
        <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
        </footer>
        
        <script src="../build/js/bundle.min.js"></script>
        </body>
        </html>