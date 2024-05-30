<?php
namespace Model;


class EntradaBlog extends ActiveRecord {

    protected static $columnasDB=['id','titulo','imagen','descripcion','creado','autores_id'];
    protected static $tabla="entradas_blog";
    protected static $tabla2="autores";

    public $id;
    public $titulo;
    public $imagen;
    public $descripcion;
    public $creado;
    public $autores_id;
    public $nombre_autor; 
    public $apellido_autor;

    public  function __construct ($args=[]){
        $this->id=$args['id'] ?? NULL;
        $this->titulo=$args['titulo'] ?? '';
        $this->imagen=$args['imagen'] ?? '';
        $this->descripcion=$args['descripcion'] ?? '';
        $this->creado=date('Y/m/d');
        $this->autores_id=$args['autores_id'] ?? '';
        $this->nombre_autor = $args['nombre_autor'] ?? ''; 
        $this->apellido_autor = $args['apellido_autor'] ?? ''; 
        
    }

    public function validar(){

        if(!$this->titulo){
            self::$errores[]= "debes añadir un título";
        }
        if(strlen($this->descripcion)<100){
            self::$errores[]="debes añadir un texto de almenos 100 carácteres";
        }
        if(!$this->autores_id){
            self::$errores[]="debes seleccionar un autor";
        }
        if(!$this->imagen){
            self::$errores[]="La imagen de la propiedades obligatoria";
        }
        return self::$errores;
    }

 

       public static function join() {
          $query = "SELECT entrada.*, autores.nombre AS nombre_autor, autores.apellido AS apellido_autor FROM " . static::$tabla . " AS entrada";
          $query.= " LEFT JOIN " . static::$tabla2 . " AS autores";
         $query.= " ON entrada.autores_id = autores.id ";
          $resultado = self::consultarSQL($query);  
          return $resultado;
      }
      public static function joinget($cantidad) {
          $query = "SELECT entrada.*, autores.nombre AS nombre_autor, autores.apellido AS apellido_autor FROM " . static::$tabla . " AS entrada";
          $query.= " LEFT JOIN " . static::$tabla2 . " AS autores";
         $query.= " ON entrada.autores_id = autores.id LIMIT " . $cantidad;
         
          $resultado = self::consultarSQL($query);  
          return $resultado;
      }

       public static function findjoin($id){
         $query = "SELECT entrada.*, autores.nombre AS nombre_autor, autores.apellido AS apellido_autor FROM " . static::$tabla . " AS entrada";
         $query.= " LEFT JOIN " . static::$tabla2 . " AS autores";
          $query.= " ON entrada.autores_id = autores.id WHERE entrada.id= $id ";
         $resultado=self::consultarSQL($query);
         return array_shift($resultado);
     }


    
}