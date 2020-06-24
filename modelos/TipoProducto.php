<?php

//Clase TipoProducto que contiene las variables del tipo de producto, los get y set los cuales solo se podran acceder a ellos por metodos 
class TipoProducto{
    
    private $idTipoProducto;
    private $tipoProducto;
    private $conexion;
    
    //Funcion para mandar a llamar la conexion a la base de datos
    public function __construct() {
        $this->conexion = Base::conectar();
    }
    
    //GET y SET de las variables de la clase TipoProducto
    function getIdTipoProducto() {
        return $this->idTipoProducto;
    }

    function getTipoProducto() {
        return $this->tipoProducto;
    }

    function setIdTipoProducto($idTipoProducto){
        $this->idTipoProducto = $idTipoProducto;
    }

    function setTipoProducto($tipoProducto){
        $this->tipoProducto = $this->conexion->real_escape_string($tipoProducto);
    }
    
   //Funcion para listar todos los tipos de productos existentes en la base de datos
    public function listarTiposProductos(){
	$tipos = $this->conexion->query("SELECT * FROM tipoproducto ORDER BY idTipoProducto DESC;");
	return $tipos;
    }
    
    //Funcion para guardar un tipo de producto en la base de datos
    public function guardarTipoProducto() {
        $sql = "INSERT INTO tipoproducto VALUES(NULL, '{$this->getTipoProducto()}');";
        $guardar = $this->conexion->query($sql);
        $resultado = false;
        
        if ($guardar) {
            $resultado = true;
        }
        return $resultado;
    }
    
    //Funcion para eliminar un tipo de producto especifico
    public function eliminarTipoProducto() {
        $sql = "DELETE FROM tipoproducto WHERE idTipoProducto={$this->idTipoProducto}";
        $borrar = $this->conexion->query($sql);
        $resultado = false;
        
        if ($borrar) {
            $resultado = true;
        }
        return $resultado;
    }
    
   
    

}

?>