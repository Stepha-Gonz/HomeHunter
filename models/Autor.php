<?php

namespace Model;

class Autor extends ActiveRecord{

    protected static $columnasdb=['id','nombre','apellido'];
    protected static $tabla='autores';

    

    public $id;
    public $nombre;
    public $apellido;


    public function __construct($args=[]){
        $this->id=$args['id'] ?? NULL;
        $this->nombre=$args['nombre'] ?? '';
        $this->apellido=$args['apellido'] ?? '';
    }

}