<?php
require_once 'modelos/Blog.php';
require_once 'modelos/Administrador.php';

class ControladorAdministrador{
    
    //Funcion para cargar el archivo que sera la vista principal del administrador al ingresar
    public function vistaAdministrador(){
        require_once 'vistas/administrador/index.php';
    }
    
    //Funcion para listar todos los usuarios en un archivo
    public function gestionarUsuarios(){
        //Obtiene la funcion listarUsuarios del modelo Administrador 
        $administrador = new Administrador();
        $usuarios = $administrador->listarUsuarios();
        require_once 'vistas/administrador/listarUsuarios.php';
    }
    
    //Funcion para eliminar un usuario al obtener el id enviado a traves de la url
    public function eliminarUsuario() {
        //comprueba si la variable esta definida
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $administrador = new Administrador();
            $administrador->setIdUsuario($id);
            
            //Al comprobar que esta definida ejecuta la funcion eliminarUsuario del modelo Administrador
            $borrar = $administrador->eliminarUsuario();
            if ($borrar) {
                //si se ejecuta correctamente borra al usuario
                $_SESSION['borrar'] = 'completo';
            } else {
                //si no se ejecuta correctamente no lo borra
                $_SESSION['borrar'] = 'fallido';
            }
        } else {
            //si no se ejecuta correctamente no lo borra
            $_SESSION['borrar'] = 'fallido';
        }
        echo "<script> window.location=' "
        . urlBase . "Administrador/gestionarUsuarios'; </script>";
    }
    
}
?>