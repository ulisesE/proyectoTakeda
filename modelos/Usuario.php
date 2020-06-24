<?php

//Clase Usuario que contiene las variables del usuario, los get y set los cuales solo se podran acceder a ellos por metodos 
class Usuario {

    private $idUsuario;
    private $nombreUsuario;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $correo;
    private $contrasena;
    private $rol;
    private $fechaRegistro;
    private $fotoUsuario;
    private $conexion;
    
    //Funcion para mandar a llamar la conexion a la base de datos
    public function __construct() {
        $this->conexion = Base::conectar();
    }
    
    //GET y SET de las variables de la clase Usuario 
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    function getApellidoPaterno() {
        return $this->apellidoPaterno;
    }
    
    function getApellidoMaterno() {
        return $this->apellidoMaterno;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getRol() {
        return $this->rol;
    }
    
    function getFechaRegistro() {
        return $this->fechaRegistro;
    }
    
    function getFotoUsuario() {
        return $this->fotoUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $this->conexion->real_escape_string($nombreUsuario);
    }

    function setApellidoPaterno($apellidoPaterno) {
        $this->apellidoPaterno = $this->conexion->real_escape_string($apellidoPaterno);
    }
    
    function setApellidoMaterno($apellidoMaterno) {
        $this->apellidoMaterno = $this->conexion->real_escape_string($apellidoMaterno);
    }

    function setCorreo($correo) {
        $this->correo = $this->conexion->real_escape_string($correo);
    }

    function setContrasena($contrasena) {
        $this->contrasena = $this->conexion->real_escape_string($contrasena);
    }

    function setRol($rol) {
        $this->rol = $rol;
    }
    
    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }

    function setFotoUsuario($fotoUsuario) {
        $this->fotoUsuario = $fotoUsuario;
    }
    
    //Funcion encargada de hacer el insert a la base de datos para registrar al usuario
    public function registrarUsuario() {
        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombreUsuario()}', '{$this->getApellidoPaterno()}', '{$this->getApellidoMaterno()}', '{$this->getCorreo()}', '{$this->getContrasena()}', 'usuario', CURDATE(), null);";
        $guardar = $this->conexion->query($sql);
        $resultado = false;
        
        if ($guardar) {
            $resultado = true;
        }
        return $resultado;
    }
    
    //Funcion encargada de permitir el accesos al usuario o a el administrador mediante la comprobacion ddel correo a la base de datos
    public function iniciarSesion(){
	$resultado = false;
	$correo = $this->correo;
	$contrasena = $this->contrasena;
        
	// Comprobacion del correo
	$sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
	$inicio = $this->conexion->query($sql);
	
        if($inicio && $inicio->num_rows == 1){
            $usuario = $inicio->fetch_object();
            
            // Verificar la contraseña
            $verificar = $usuario->contrasena;
            if($verificar == $contrasena){
		$resultado = $usuario;
            }
	}
        return $resultado;
    }   
    
}

?>