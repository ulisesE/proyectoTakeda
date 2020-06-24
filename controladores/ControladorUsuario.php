<?php

require_once 'modelos/Producto.php';
require_once 'modelos/Usuario.php';

class ControladorUsuario {

    //Funcion para la vista principal que se muestra en la pagina
    public function vistaPrincipal() {
        $producto = new Producto();
        //Se asigna el limite de archivos que mostrara la funcion productoAleatorio del modelo producto
        $productos = $producto->productosNuevos(4);
        $productosRep = $producto->productosReparados(4);
        require_once 'vistas/diseño/principal.php';
    }

    //Funcion que carga el archivo de la vista de los usuarios
    public function vistaUsuario(){
        $producto = new Producto();
        //Se asigna el limite de archivos que mostrara la funcion productoAleatorio del modelo producto
        $productos = $producto->productosNuevos(4);
        $productosRep = $producto->productosReparados(4);
        
        require_once 'vistas/usuario/index.php';
    }

    //Funcion para ver la vista de quienes somos
    public function nosotros() {
        require_once 'vistas/diseño/nosotros.php';
    }

    //Funcion para ver la vista de los servicios electronicos
    public function servicios1() {
        require_once 'vistas/diseño/servicios1.php';
    }
    
    //Funcion para ver la vista de los servicios electrodomesticos
    public function servicios2() {
        require_once 'vistas/diseño/servicios2.php';
    }
    
    //Funcion para ver la vista de los servicios celulares
    public function servicios3() {
        require_once 'vistas/diseño/servicios3.php';
    }

    //Funcion para ver la vista de contacto
    public function contacto() {
        require_once 'vistas/diseño/contacto.php';
    }

    //Funcion para ver el formulario de registro
    public function registro() {
        require_once 'vistas/diseño/registro.php';
    }

    //Funcion para registrar al usuario, obteniendo por POST los datos capturados en su formulario
    public function registrarUsuario() {
        //Comprueba que $_POST este definida
        if (isset($_POST)) {
            //comprueba que isset($_POST['nombre']) este definida y en caso de que que no tendra un valor false
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidoPaterno = isset($_POST['apellidoPaterno']) ? $_POST['apellidoPaterno'] : false;
            $apellidoMaterno = isset($_POST['apellidoMaterno']) ? $_POST['apellidoMaterno'] : false;
            $correo = isset($_POST['correo']) ? $_POST['correo'] : false;
            $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : false;

            // si las datos guardados en las variables son true entra al if y hace el registro
            if ($nombre && $apellidoPaterno && $apellidoMaterno && $correo && $contrasena) {
                //asigna las variables creadas anteriormente a los SET
                $usuario = new Usuario();
                $usuario->setNombreUsuario($nombre);
                $usuario->setApellidoPaterno($apellidoPaterno);
                $usuario->setApellidoMaterno($apellidoMaterno);
                $usuario->setCorreo($correo);
                $usuario->setContrasena($contrasena);

                //Si todos los datos guardados en las variables son true se conecta con el modelo usuario y ejecuta la funcion registrar Usuario que es la encargada de insertar en la base de datos
                $guardar = $usuario->registrarUsuario();

                if ($guardar) {
                    //Si la funcion se ejecuta correctamente el registro fue exitoso
                    $_SESSION['registro'] = "completo";
                } else {
                    //Si la funcion no se ejecuta correctamente el registro fue fallido
                    $_SESSION['registro'] = "fallido";
                }
            } else {
                $_SESSION['registro'] = "fallido";
            }
        } else {
            $_SESSION['registro'] = "fallido";
        }

        echo "<script> window.location=' "
        . urlBase . "Usuario/contacto#Registro'; </script>";
    }

    //Funcion para iniciar sesion  en la que obtiene los datos del formulario
    public function iniciarSesion() {
        //Comprueba que $_POST este definida
        if (isset($_POST)) {
            //Obtiene los datos guardados en el formulario y los asigna a los SET
            $usuario = new Usuario();
            $usuario->setCorreo($_POST['correo']);
            $usuario->setContrasena($_POST['contrasena']);

            //obtiene la funcion del modelo usuarios que es la encargada de checar que el correo exista en la base de datos
            $identidad = $usuario->iniciarSesion();

            //Identifica que tipo de usuario es
            if ($identidad && is_object($identidad)) {
                $_SESSION['identidad'] = $identidad;

                if ($identidad->rol == 'administrador') {
                    $_SESSION['administrador'] = true;
                } elseif ($identidad->rol == 'usuario') {
                    $_SESSION['usuario'] = true;
                }
            } else {
                $_SESSION['errorInicio'] = 'Identificación fallida !!';
            }
        }
        //Al comprobar anteriormente que tipo de usuario es ahora los redirecciona a la pagina que le corresponde a cada usuario
        if ($identidad->rol == 'administrador') {
            echo "<script> window.location='"
            . urlBase . "Administrador/vistaAdministrador'; </script>";
        } elseif ($identidad->rol == 'usuario') {
            echo "<script> window.location='"
            . urlBase . "Usuario/vistaUsuario'; </script>";
        } else {
            echo "<script> window.location=' "
            . urlBase . "'; </script>";
        }
    }
    
     //Funcion para cerrar la sesion
    public function cerrarSesion(){
        //Comprueba que tipo de usuario es y borra su sesion con unset y los redirecciona al inicio
	if(isset($_SESSION['identidad'])){
            unset($_SESSION['identidad']);
        }
        if(isset($_SESSION['administrador'])){
            unset($_SESSION['administrador']);
        }
        if(isset($_SESSION['usuario'])){
            unset($_SESSION['usuario']);
        }
        echo "<script> window.location=' "
            . urlBase . "'; </script>";
    }
}

?>

