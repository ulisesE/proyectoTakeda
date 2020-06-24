<?php
//Clase Departamento que contiene las variables del departamento, los get y set los cuales solo se podran acceder a ellos por metodos 
class Blog{
    
    private $titulo;
    private $contenido;
    private $conexion;
	private $fecha;
    //Funcion para mandar a llamar la conexion a la base de datos
    public function __construct() {
        $this->conexion = Base::conectar();
        $this->fecha = date("Y-m-d");
    }
    
    //GET y SET de las variables de la clase Departamento 
    function getTitulo() {
        return $this->titulo;
    }

    function getFecha() {
        return $this->fecha;
    }
    
    function getContenido() {
        return $this->contenido;
    }
    
    function setTitulo($titulo){
        $this->titulo = $this->conexion->real_escape_string($titulo);
    }
    
    function setContenido($contenido){
        $this->contenido = $this->conexion->real_escape_string($contenido);
    }

    //Funcion para listar a todos las Publicaciones existentes en la base de datos
    public function listaPublicaciones(){
    $publicaciones = $this->conexion->query("SELECT idPublicaciones,titulo,contenido,fecha,nombreUsuario,apellidoPaterno 
        FROM  publicaciones
        FULL JOIN usuarios
        ON usuarios_idUsuario = usuarios.idUsuario;");
    
    return $publicaciones;
    }
    //Funcion para listar a todos las Publicaciones existentes en la base de datos
    public function listaPublicaciones2(){
    $publicaciones = $this->conexion->query("SELECT idPublicaciones,titulo,contenido,fecha,nombreUsuario,apellidoPaterno 
        FROM  publicaciones
        FULL JOIN usuarios
        ON usuarios_idUsuario = usuarios.idUsuario limit 3;");
    return $publicaciones;
    }
    
    //Funcion para guardar un Departamento en la base de datos
    public function publicar() {
        $sql = "INSERT INTO publicaciones VALUES (NULL,\"{$this->getTitulo()}\",\"".nl2br($this->getContenido())."\",'{$this->getFecha()}',4);";

        $guardar = $this->conexion->query($sql);
        $resultado = false;
        
        if ($guardar) {
            $resultado = true;
        }
        return $resultado;
    }

    //Funcion para leer la Publicacion especifica
    public function articulo($id){
    $publicaciones = $this->conexion->query("SELECT idPublicaciones,titulo,contenido,fecha,nombreUsuario,apellidoPaterno 
        FROM  publicaciones
        FULL JOIN usuarios
        ON usuarios_idUsuario = usuarios.idUsuario
        where idPublicaciones=".$id.";");
    
    return $publicaciones;
    }

}

?>
