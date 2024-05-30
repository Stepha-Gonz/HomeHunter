<?php 

namespace Model;

class ActiveRecord {
    //Base de datos
    protected static $db;
    protected static $columnasDB=[];
    protected static $tabla='';
    protected static $tabla2='';

    
    //errores
    
    protected static $errores=[];
    
    
    
    
    public static function setDB($database){
        Self::$db=$database;
        
    }
    

    public function guardar($admin) {
        if(!is_null($this->id)){
            $this->actualizar($admin);
        }else{
            //crear nuevo registro
            $this->crear($admin);
        }

    }
    public function crear($admin){
        //Sanitizar los datos
        $atributos = $this->sanitizarDatos();
        
        
        $query="INSERT INTO " . static::$tabla . " ( ";
        $query.=join(', ',array_keys($atributos));
        $query.= " ) VALUES (' ";
        $query.=join("', '",array_values($atributos));
        $query.= " ') ";
        
        $resultado=self::$db->query($query);
        
        if($resultado) {
            // Redireccionar al usuario.
            if($admin==='propiedad'){
                header('Location: /admin?resultado=1');
            }else{
                header('Location: /entradas_blog/admin?resultado=1');
            }
            
        }
        
    }

    public function actualizar($admin){
        $atributos = $this->sanitizarDatos();
        
        $valores=[];
        foreach($atributos as $key=>$value){
            $valores[]="{$key}='{$value}'";
        }
        $query= "UPDATE  " . static::$tabla . "  SET ";
        $query.=  join(', ', $valores);
        $query.=" WHERE id= '" .self::$db->escape_string($this->id)." ' ";
        $query.= " LIMIT 1 "; 

        $resultado = self::$db->query($query);
        
        if($resultado){
      //redireccionar al usuario
            if($admin==='propiedad'){
                header('Location: /admin?resultado=2');
            }else {
                header('Location: /entradas_blog/admin?resultado=2');
            }
            
        }
        

    }

    public function eliminar($admin){

        $query = "DELETE FROM  " . static::$tabla . "  WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado= self::$db->query($query);
        
        if($resultado){
      //redireccionar al usuario
            $this->borrarImagen();
            if($admin==='propiedad'){
                header('location: /admin?resultado=3');
            }else{
                header('location: /entradas_blog/admin?resultado=3');
            }
            
        }
        
    } 

    
    public function atributos(){
        $atributos=[];
        foreach (static::$columnasDB as $columna){
            if($columna==='id')continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    public function sanitizarDatos(){
        $atributos=$this->atributos();
        
        
        $sanitizado=[];
        foreach($atributos as $key=>$value){
            $sanitizado[$key]=self::$db->escape_string($value);
            
        }
        return $sanitizado;
    }
    
    public static function getErrores(){
        
        return static::$errores;
    }

    public function setImagen($imagen){

        if(!is_null($this->id)){
            $this->borrarImagen();
        }
        if($imagen){
            $this->imagen=$imagen;
        }
    }
    public function borrarImagen(){
        $existeArchivo=file_exists(CARPETA_IMAGENES.$this->imagen);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES. $this->imagen);
        }
    }
    
    public function validar(){
        static::$errores=[];
        return static::$errores;
    }

    //listar propiedad

    public static function all(){
        $query="SELECT * FROM " . static::$tabla;
        $resultado=self::consultarSQL($query);  
        return $resultado;
        
    }

    public static function get($cantidad){
        $query="SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad ;
        $resultado=self::consultarSQL($query);  
        return $resultado;
        
    }

    public static function find($id){
        $query="SELECT * FROM  " . static::$tabla . "  WHERE id= $id ";
        $resultado=self::consultarSQL($query);
        return array_shift($resultado);
    }

    
    
    public static function consultarSQL($query){
        //consultar DB
        $resultado=self::$db->query($query);

        //iterar
        $array=[];
        while($registro=$resultado->fetch_assoc()){
            $array[]=static::crearObjeto($registro);

        }
        

        //liberar memoria
        $resultado->free();

        //retornar resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto= new static;

        foreach($registro as $key =>$value){
            if(property_exists($objeto,$key)){
                $objeto->$key=$value;
            }
        }
        return $objeto;
    }

    //sincronizar objeto en memoria
    public function sincronizar($args =[]){
        foreach($args as $key=>$value){
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key=$value;
            }
        }

    }
}