<?php 

namespace Model;

class Propiedad extends ActiveRecord{
    protected static $columnasDB=['id','titulo','precio', 'imagen','descripcion','habitaciones','wc','estacionamiento', 'creado','vendedores_id'];
    protected static $tabla='propiedades';


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;



    public function __construct($args=[])
    {
        $this->id=$args['id'] ?? NULL;
        $this->titulo=$args['titulo'] ?? '';
        $this->precio=$args['precio'] ?? '';
        $this->imagen=$args['imagen'] ?? '';
        $this->descripcion=$args['descripcion'] ?? '';
        $this->habitaciones=$args['habitaciones'] ?? '';
        $this->wc=$args['wc'] ?? '';
        $this->estacionamiento=$args['estacionamiento'] ?? '';
        $this->creado=date('Y/m/d');
        $this->vendedores_id=$args['vendedores_id'] ?? '';
    }

    public function validar(){
        
        if(!$this->titulo){
            self::$errores[]="debes añadir un titulo";
        }
        if(!$this->precio){
            self::$errores[]="El precio es obligatorio";
        }
        if(!$this->imagen){
            self::$errores[]="La imagen de la propiedades obligatoria";
        }
        
        if(strlen($this->descripcion)<50){
            self::$errores[]="Añade una descripcion de la propiedad de al menos 50 caracteres";
        }
        if(!$this->habitaciones){
            self::$errores[]="Número de habitaciones es obligatorio";
        }
        if(!$this->wc){
            self::$errores[]="Número de baños es obligatorio";
        }
        if(!$this->estacionamiento){
            self::$errores[]="Número de estacionamientos es obligatorio";
        }
        
        if(!$this->vendedores_id){
            self::$errores[]="Debe elegir un vendedor";
        }
        return self::$errores;
    }
    
}