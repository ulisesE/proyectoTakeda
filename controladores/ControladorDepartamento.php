<?php
    
require_once 'modelos/Departamento.php';

class ControladorDepartamento{
    
    //Funcion para listar todos los departamentos en un archivo
    public function gestionarDepartamentos(){
        $departamento = new Departamento();
        $departamentos = $departamento->listarDepartamentos();
        require_once 'vistas/departamento/listarDepartamentos.php';
    }
    
    //Funcion para cargar el formulario de nuevo departamento
    public function nuevoDepartamento(){
        require_once 'vistas/departamento/nuevoDepartamento.php';
    }
    
    //Funcion para guardar un departamento a traves de la obtencion de los datos ingresados en el formulario
    public function guardarDepartamento() {
        //Comprueba si $_POST esta definida y si $_POST esta definida y tiene un valor asignado
        if (isset($_POST) && isset($_POST['nombre'])) {
            //Si la condicion se cumple se ejecuta la funcion guardarDepartamento del modelo Departamento
            $departamento = new Departamento();
            $departamento->setNombreDepartamento($_POST['nombre']);
            $guardar = $departamento->guardarDepartamento();
        }
        echo "<script> window.location=' "
        . urlBase . "Departamento/gestionarDepartamentos'; </script>";
        
    }
    
    //Funcion para eliminar un departamento
    public function eliminarDepartamento() {
        //Comprueba $_GET este definida y tenga un valor
        if (isset($_GET['id'])) {
            //Si la condicion se cumple permite acceder a la funcion eliminarDepartamento del modelo Departamento
            $id = $_GET['id'];
            $departamento = new Departamento();
            $departamento->setIdDepartamento($id);
            $borrar = $departamento->eliminarDepartamento();
            
            if ($borrar) {
                //Si $borrrar es true la eliminacion si ejecuto correctamente
                $_SESSION['borrar'] = 'completo';
            } else {
                //Si $borrar es false la eliminacion fue fallida
                $_SESSION['borrar'] = 'fallido';
            }
        } else {
            $_SESSION['borrar'] = 'fallido';
        } 
        echo "<script> window.location=' "
        . urlBase . "Departamento/gestionarDepartamentos'; </script>";
    }

}

?>