<?php
//Clase Departamento que contiene las variables del departamento, los get y set los cuales solo se podran acceder a ellos por metodos 
class Departamento{
    
    private $idDepartamento;
    private $nombreDepartamento;
    private $conexion;
	
    //Funcion para mandar a llamar la conexion a la base de datos
    public function __construct() {
        $this->conexion = Base::conectar();
    }
    
    //GET y SET de las variables de la clase Departamento 
    function getIdDepartamento() {
        return $this->idDepartamento;
    }

    function getNombreDepartamento() {
        return $this->nombreDepartamento;
    }

    function setIdDepartamento($idDepartamento){
        $this->idDepartamento = $idDepartamento;
    }

    function setNombreDepartamento($nombreDepartamento){
    $this->nombreDepartamento = $this->conexion->real_escape_string($nombreDepartamento);
    }
    
    //Funcion para listar a todos los departamentos existentes en la base de datos
    public function listarDepartamentos(){
	$departamentos = $this->conexion->query("SELECT * FROM departamentos ORDER BY idDepartamento DESC;");
	return $departamentos;
    }
    
    //Funcion para obtener un departamento en especifico
    public function obtenerUnDepartamento(){
	$departamento = $this->conexion->query("SELECT * FROM departamentos WHERE idDepartamento={$this->getIdDepartamento()}");
	return $departamento->fetch_object();
    }
    
    //Funcion para guardar un Departamento en la base de datos
    public function guardarDepartamento() {
        $sql = "INSERT INTO departamentos VALUES(NULL, '{$this->getNombreDepartamento()}');";
        $guardar = $this->conexion->query($sql);
        $resultado = false;
        
        if ($guardar) {
            $resultado = true;
        }
        return $resultado;
    }
    
    //Funcion para eliminar a un Departamento en especifico
    public function eliminarDepartamento() {
        $sql = "DELETE FROM departamentos WHERE idDepartamento={$this->idDepartamento}";
        $borrar = $this->conexion->query($sql);
        $resultado = false;
        
        if ($borrar) {
            $resultado = true;
        }
        return $resultado;
    }

}

?>