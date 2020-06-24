<?php

class FuncionesRequeridas {

    //Funcion para borrar la sesion, con unset destruimos la sesion
    public static function borrarSesion($nombre) {
        if (isset($_SESSION[$nombre])) {
            $_SESSION[$nombre] = null;
            unset($_SESSION[$nombre]);
        }
        return $nombre;
    }
    
    //Funcion para saber si es administrador, 
    public static function esAdministrador() {
        //Si la sesion es diferente a administrador no le permite el acceso y lo devuelve a la pagina principal
        if (!isset($_SESSION['administrador'])) {
            echo "<script> window.location=' "
            . urlBase . "'; </script>";
        } else {
            return true;
        }
    }
    
    //Funcion para saber si es usuario, 
    public static function esUsuario() {
        //Si la sesion es diferente a usuario no le permite el acceso y lo devuelve a la pagina principal
        if (!isset($_SESSION['usuario'])) {
            echo "<script> window.location=' "
            . urlBase . "'; </script>";
        } else {
            return true;
        }
    }
    
    //Funcion para obtener los departamentos
    public static function obtenerDepartamento() {
        require_once 'modelos/Departamento.php';
        $departamento = new Departamento();
        $departamentos = $departamento->listarDepartamentos();
        return $departamentos;
    }
    
    //Funcion para obtener los tipos de productos
    public static function obtenerTipoProducto() {
        require_once 'modelos/TipoProducto.php';
        $tipo = new TipoProducto();
        $tipos = $tipo->listarTiposProductos();
        return $tipos;
    }
    
    public static function totalCarrito(){
		$total = array(
			'count' => 0,
			'total' => 0
		);
		
		if(isset($_SESSION['carrito'])){
			$total['count'] = count($_SESSION['carrito']);
			
			foreach($_SESSION['carrito'] as $producto){
				$total['total'] += $producto['precioProducto']*$producto['unidades'];
			}
		}
		
		return $total;
	}

}

?>