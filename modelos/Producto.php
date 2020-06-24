<?php
  
//Clase Productos que contiene las variables del producto, los get y set los cuales solo se podran acceder a ellos por metodos 
class Producto{
    
    private $idProducto;
    private $idDepartamento;
    private $idTipoProducto;
    private $nombreProducto;
    private $descripcionProducto;
    private $precioProducto;
    private $productosDisponibles;
    private $fechaProducto;
    private $fotoProducto;
    private $conexion;
	
    //Funcion para mandar a llamar la conexion a la base de datos
    public function __construct() {
        $this->conexion = Base::conectar();
    }
    
    //GET y SET de las variables de la clase Producto 
    function getIdProducto() {
        return $this->idProducto;
    }

    function getIdDepartamento() {
        return $this->idDepartamento;
    }
    
    function getIdTipoProducto() {
        return $this->idTipoProducto;
    }

    function getNombreProducto() {
        return $this->nombreProducto;
    }
    
    function getDescripcionProducto() {
        return $this->descripcionProducto;
    }

    function getPrecioProducto() {
        return $this->precioProducto;
    }

    function getProductosDisponibles() {
        return $this->productosDisponibles;
    }

    function getFechaProducto() {
        return $this->fechaProducto;
    }

    function getFotoProducto() {
        return $this->fotoProducto;
    }
    
    function setIdProducto($idProducto){
        $this->idProducto = $idProducto;
    }

    function setIdDepartamento($idDepartamento){
        $this->idDepartamento = $idDepartamento;
    }
    
    function setIdTipoProducto($idTipoProducto){
        $this->idTipoProducto = $idTipoProducto;
    }
    
    function setNombreProducto($nombreProducto){
        $this->nombreProducto = $this->conexion->real_escape_string($nombreProducto);
    }

    function setDescripcionProducto($descripcionProducto){
        $this->descripcionProducto = $this->conexion->real_escape_string($descripcionProducto);
    }

    function setPrecioProducto($precioProducto){
        $this->precioProducto = $this->conexion->real_escape_string($precioProducto);
    }

    function setProductosDisponibles($productosDisponibles){
        $this->productosDisponibles = $this->conexion->real_escape_string($productosDisponibles);
    }

    function setFechaProducto($fechaProducto){
        $this->fechaProducto = $fechaProducto;
    }

    function setFotoProducto($fotoProducto){
        $this->fotoProducto = $fotoProducto;
    }
    
    //Funcion para listar todos los productos existentes en la base de datos
    public function listarProductos(){
	$productos = $this->conexion->query("SELECT * FROM productos ORDER BY idProducto DESC");
	return $productos;
    }
    
    //Funcion para obtener de la base de datos el producto con el id asigando
    public function obtenerUnProducto() {
        $producto = $this->conexion->query("SELECT * FROM productos WHERE idProducto = {$this->getIdProducto()}");
        return $producto->fetch_object();
    }
    
    //Funcion para obtener un producto por departamento
    public function obtenerProductoDepartamento() {
        $sql = "SELECT p.*, d.nombreDepartamento  FROM productos p "
                . "INNER JOIN departamentos d ON d.idDepartamento = p.idDepartamento "
                . "WHERE p.idDepartamento = {$this->getIdDepartamento()} "
                . "ORDER BY idProducto DESC";
       
        $productos = $this->conexion->query($sql);
        return $productos;
    }
    
    //Funcion para mostrar los productos de forma aleatoria con un limite de cuantos debera moostrar
    public function productosNuevos($maximoProductos) {
        $productos = $this->conexion->query("SELECT * FROM productos WHERE idTipoProducto = (SELECT idTipoProducto from tipoproducto WHERE tipoProducto = 'Producto Nuevo') ORDER BY RAND() LIMIT $maximoProductos");
        return $productos;
    }
    
    //Funcion para mostrar los productos de forma aleatoria con un limite de cuantos debera moostrar
    public function productosReparados($maximoProductos) {
        $productos = $this->conexion->query("SELECT * FROM productos WHERE idTipoProducto = (SELECT idTipoProducto from tipoproducto WHERE tipoProducto = 'Producto Reparado') ORDER BY RAND() LIMIT $maximoProductos");
        return $productos;
    }
    
    //Funcion para guardar un producto en la base de datos
    public function guardarProducto() {
        $sql = "INSERT INTO productos VALUES(NULL, {$this->getIdDepartamento()}, {$this->getIdTipoProducto()}, '{$this->getNombreProducto()}', '{$this->getDescripcionProducto()}', {$this->getPrecioProducto()}, {$this->getProductosDisponibles()}, CURDATE(), '{$this->getFotoProducto()}');";
        $guardar = $this->conexion->query($sql);
        $resultado = false;
        
        if ($guardar) {
            $resultado = true;
        }
        return $resultado;
    }
    
    //Funcion para editar un producto existente en la base de datos
    public function editarProducto() {
        $sql = "UPDATE productos SET idDepartamento={$this->getIdDepartamento()}, idTipoProducto={$this->getidTipoProducto()},  nombreProducto='{$this->getNombreProducto()}', descripcionProducto='{$this->getDescripcionProducto()}', precioProducto={$this->getPrecioProducto()}, productosDisponibles={$this->getProductosDisponibles()}, fechaProducto= CURDATE()";

        if ($this->getFotoProducto() != null) {
            $sql .= ", fotoProducto='{$this->getFotoProducto()}'";
        }

        $sql .= " WHERE idProducto={$this->idProducto}";
        $guardar = $this->conexion->query($sql);
        $resultado = false;
        
        if ($guardar) {
            $resultado = true;
        }
        return $resultado;
    }
    
    //Funcion para eliminar un producto en especifico
    public function eliminarProducto() {
        $sql = "DELETE FROM productos WHERE idProducto={$this->idProducto}";
        $borrar = $this->conexion->query($sql);
        $resultado = false;
        
        if ($borrar) {
            $resultado = true;
        }
        return $resultado;
    }

}

?>