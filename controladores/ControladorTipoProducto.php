<?php

require_once 'modelos/TipoProducto.php';

class ControladorTipoProducto{
    //Funcion para listar todos los tipos de productos en un archivo
    public function gestionarTiposProductos(){
        $tipo = new TipoProducto();
        $tipos = $tipo->listarTiposProductos();
        require_once 'vistas/producto/listarTiposProductos.php';
    }
    
    //Funcion para cargar el formulario del tipo de producto
    public function nuevoTipoProducto(){
        require_once 'vistas/producto/nuevoTipoProducto.php';
    }
    
    //Funcion para guardar un tipo de producto a traves de la obtencion de los datos ingresados en el formulario
    public function guardarTipoProducto() {
        //Comprueba si $_POST esta definida y si $_POST esta definida y tiene un valor asignado
        if (isset($_POST) && isset($_POST['nombre'])) {
            //Si la condicion se cumple se ejecuta la funcion guardarTipoProducto del modelo TipoProducto
            $tipo = new TipoProducto();
            $tipo->setTipoProducto($_POST['nombre']);
            $guardar = $tipo->guardarTipoProducto();
        }
        echo "<script> window.location=' "
        . urlBase . "TipoProducto/gestionarTiposProductos'; </script>";
    }
    
    //Funcion para eliminar un tipo de producto
    public function eliminarTipoProducto() {
        //Comprueba $_GET este definida y tenga un valor
        if (isset($_GET['id'])) {
            //Si la condicion se cumple permite acceder a la funcion eliminarTipoProducto del modelo TipoProducto
            $id = $_GET['id'];
            $tipo = new TipoProducto();
            $tipo->setIdTipoProducto($id);
            $borrar = $tipo->eliminarTipoProducto();
            
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
        . urlBase . "TipoProducto/gestionarTiposProductos'; </script>";
    }
}

?>