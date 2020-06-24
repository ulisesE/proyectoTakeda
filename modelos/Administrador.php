<?php

//Clase Administrador que contiene las variables del usuario, los get y set los cuales solo se podran acceder a ellos por metodos 
class Administrador {

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
    
    //GET y SET de las variables de la clase Administrador 
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
    
    //Funcion para listar a todos los Usuarios existentes en la base de datos
    public function listarUsuarios(){
	$usuarios = $this->conexion->query("SELECT * FROM usuarios WHERE rol='usuario' ORDER BY idUsuario DESC ;");
	return $usuarios;
    }
    
    //Funcion para eliminar a un Usuario en especifico
    public function eliminarUsuario() {
        $sql = "DELETE FROM usuarios WHERE idUsuario={$this->idUsuario}";
        $borrar = $this->conexion->query($sql);
        $resultado = false;
        
        if ($borrar) {
            $resultado = true;
        }
        return $resultado;
    }
    
}

?>