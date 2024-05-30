<?php
namespace Controllers;

use MVC\Router;
use Model\Autor;
use Model\Propiedad;
use Model\EntradaBlog;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController{
    public static function index(Router $router){
        
        $propiedades= Propiedad::get(3);
        $entradas=EntradaBlog::joinget(2);
        $inicio=true;

        $router->render('paginas/index',[
            'propiedades'=>$propiedades,
            'inicio'=>$inicio,
            'entradas'=>$entradas
        ]);
    }
    public static function nosotros(Router $router){
        
        $router->render('paginas/nosotros',[

        ]);
    }
    public static function propiedades(Router $router){
        
        $propiedades= Propiedad::all();
        
        
        $router->render('paginas/propiedades',[
            'propiedades'=>$propiedades
        ]);
    }
    public static function propiedad(Router $router){

        $id=validarRedireccionar('/propiedades');
        $propiedad= Propiedad::find($id);

        $router->render('paginas/propiedad',[
            'id'=>$id,
            'propiedad'=>$propiedad
        ]);
    }
    public static function blog(Router $router){
        $entradas= EntradaBlog::join();
        $router->render('paginas/blog',[
            'entradas'=>$entradas,
            
        ]);
    }
    public static function entrada(Router $router){
        $id=validarRedireccionar('/entrada');
        $entradas= EntradaBlog::findjoin($id);
        
        $router->render('paginas/entrada',[
            'id'=>$id,
            'entradas'=>$entradas
            
        ]);
    }
    public static function contacto(Router $router){

        $mensajeExitoso = null;

        if($_SERVER['REQUEST_METHOD']==='POST'){
            
            $respuestas = $_POST['contacto'];
            
            
            
            //crear instancia phpmailer

            $mail= new PHPMailer();

            // protocolo SMTP para envio de emails
            $mail->isSMTP();
            $mail->Host = $_ENV['MAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['MAIL_USERNAME'];
            $mail->Password = $_ENV['MAIL_PASSWORD'];
            $mail->SMTPSecure='tls';
            $mail->Port = $_ENV['MAIL_PORT'];

            //Configurar contenido del email

            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject='Tienes un nuevo Mensaje';


            //habilitar HTML

            $mail->isHTML(true);
            $mail->CharSet='UTF-8';
            
            //.caracteres especiales

            //definir contenido

            $contenido='<html>';
            $contenido.='<p>Tienes un nuevo mensaje</p>';
            $contenido.='<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            $contenido.='<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido.='<p>Vende o Compra: ' . $respuestas['tipo'] . '</p>';
            $contenido.='<p>Precio o Presupuesto: $' . $respuestas['precio'] . '</p>';
            $contenido.='<p> Prefiere ser contactado por: ' . $respuestas['contacto'] . '</p>';

            //condicional

            if($respuestas['contacto']==='telefono'){
                $contenido.='<p>Telefono: ' . $respuestas['telefono'] . '</p>';   
                $contenido.='<p>Contacto fecha: ' . $respuestas['fecha'] . '</p>';
                $contenido.='<p>Contacto hora: ' . $respuestas['hora'] . '</p>';
            } else {
                
                $contenido.='<p>E-mail: ' . $respuestas['email'] . '</p>';
            }

        
            $contenido.='</html>';
            





            $mail->Body=$contenido;
            $mail->AltBody = 'Texto alternativo sin HTML';

            //enviar Email

            if($mail->send()){
                $mensajeExitoso="Mensaje Enviado Correctamente";
            }else{
                $mensajeExitoso= "Mensaje no se pudo Enviar";
            }




        }
        $router->render('paginas/contacto',[
            'mensajeExitoso'=>$mensajeExitoso
        ]);
    }
    
}