<?php

namespace Controllers;

use MVC\Router;
use Model\Autor;
use Model\EntradaBlog;
use Intervention\Image\ImageManagerStatic as Image;


class BlogController {
    public static function indexBlog(Router $router){
        
        $entradas=EntradaBlog::join();
        $resultado=$_GET['resultado'] ?? null;
        


        $router->render('/entradas_blog/admin',[

            'entradas'=>$entradas,
            'resultado'=>$resultado

        ]);

    }


    public static function crear(Router $router){

        $entradas= new EntradaBlog();
        $autores=Autor::all();
        $errores=EntradaBlog::getErrores();


        if($_SERVER['REQUEST_METHOD']==='POST'){
            

            $entradas= new EntradaBlog($_POST['entrada']);
            
            
            $nombreImagen=md5 (uniqid(rand(),true)).".jpg";

            if($_FILES['entrada']['tmp_name']['imagen']){
                $image= Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800,600);
                $entradas->setImagen($nombreImagen);
            }
            
            $errores=$entradas->validar();
            
            
            if(empty($errores)){
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
                $image-> save(CARPETA_IMAGENES . $nombreImagen);
                $entradas->guardar('entradas_blog');
            }
        }

        $router->render('/entradas_blog/crear',[
            'entradas'=>$entradas,
            'autores'=>$autores,
            'errores'=>$errores
        ]);



        
    }
    public static function actualizar(Router $router){
        
        $id=validarRedireccionar('/entradas_blog/admin');
        $entradas=EntradaBlog::find($id);
        $autores=Autor::all();
        $errores=EntradaBlog::getErrores();

        if($_SERVER['REQUEST_METHOD']==='POST'){

            $args=$_POST['entrada'];
            $entradas->sincronizar($args);
            $errores=$entradas->validar();

            $nombreImagen=md5 (uniqid(rand(),true)).".jpg";

            if($_FILES['entrada']['tmp_name']['imagen']){
                $image= Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800,600);
                $entradas->setImagen($nombreImagen);
            }

            if(empty($errores)){
                if($_FILES['entrada']['tmp_name']['imagen']){
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $entradas->guardar('entradas_blog');
            }

        }


        $router->render('/entradas_blog/actualizar',[
            'entradas'=>$entradas,
            'autores'=>$autores,
            'errores'=>$errores
        ]);

    }

    public static function eliminar(Router $router){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $id=$_POST['id'];
            $id=filter_var($id,FILTER_VALIDATE_INT);
        }

        if($id){
            $tipo=$_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $entradas=EntradaBlog::find($id);
                    $entradas->eliminar('entradas');
                }
                

        }
    }
}