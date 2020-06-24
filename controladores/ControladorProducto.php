<?php

require_once 'modelos/Producto.php';
require_once 'modelos/Departamento.php';

class ControladorProducto{
    
   //Funcion para listar todos los productos en un archivo
    public function gestionarProductos(){
        $producto = new Producto();
        $productos = $producto->listarProductos();
        require_once 'vistas/producto/listarProductos.php';
    }
    
    //Funcion para cargar el formulario de nuevo producto
    public function nuevoProducto(){
	require_once 'vistas/producto/nuevoProducto.php';
    }
    
    //Funcion para ver un producto en especifico
    public function verUnProducto() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setIdProducto($id);

            $pro = $producto->obtenerUnProducto();
        }
        require_once 'vistas/producto/verProducto.php';
    }
    
    //Funcion para ver los productos por departamento
    public function verTodosProductos() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Conseguir departamento
            $departamento = new Departamento();
            $departamento->setIdDepartamento($id);
            $departamento = $departamento->obtenerUnDepartamento();

            // Conseguir productos;
            $producto = new Producto();
            $producto->setIdDepartamento($id);
            $productos = $producto->obtenerProductoDepartamento();
        }

        require_once 'vistas/producto/productoDepartamento.php';
    }
    
    //Funcion para guardar un producto a traves de la obtencion de los datos ingresados en el formulario
    public function guardarProducto() {
        //Comprueba que $_POST este definida  
        if (isset($_POST)) {
            //comprueba que isset($_POST['nombre']) este definida y en caso de que que no tendra un valor false
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $productosDisponibles = isset($_POST['productosDisponibles']) ? $_POST['productosDisponibles'] : false;
            
            //Comprueba que las variables sean true para poder acceder
            if ($nombre && $departamento && $descripcion && $tipo && $precio && $productosDisponibles) {
                //Asigna a los set el valor obtenido de los campos del formulario a los set
                $producto = new Producto();
                $producto->setNombreProducto($nombre);
                $producto->setIdDepartamento($departamento);
                $producto->setDescripcionProducto($descripcion);
                $producto->setIdTipoProducto($tipo);
                $producto->setPrecioProducto($precio);
                $producto->setProductosDisponibles($productosDisponibles);

                // Comprueba que $_FILES este definida y tenga un valor
                if (isset($_FILES['foto'])) {
                    //Guara ar archivo, el nombre del archivo y el tipo de archivo en una variable
                    $archivo = $_FILES['foto'];
                    $nombreArchivo = $archivo['name'];
                    $tipoImagen = $archivo['type'];
                    
                    //Comprueba que el tipo de imagen corresponda
                    if ($tipoImagen == "image/jpg" || $tipoImagen == 'image/jpeg' || $tipoImagen == 'image/png' || $tipoImagen == 'image/gif') {
                        //comprueba que exista el directorio
                        if (!is_dir('assets/img/productos')) {
                            //En caso de que no exista crea el  directorio
                            mkdir('assets/img/productos', 0777, true);
                        }
                        //Asigna el nombre de la imagen al SET
                        $producto->setFotoProducto($nombreArchivo);
                        move_uploaded_file($archivo['tmp_name'], 'assets/img/productos/' . $nombreArchivo);
                    }
                }
                
                //Comprueba que $_GET este definido y tenga un valor
                if (isset($_GET['id'])) {
                    //Ejecuta la funcion editar Producto del modelo Producto
                    $id = $_GET['id'];
                    $producto->setIdProducto($id);
                    $guardar = $producto->editarProducto();
                } else {
                    //Ejecuta la funcion guardarProducto del modelo Producto
                    $guardar = $producto->guardarProducto();
                }
                if ($guardar) {
                    $_SESSION['producto'] = "completo";
                } else {
                    $_SESSION['producto'] = "fallido";
                }
            } else {
                $_SESSION['producto'] = "fallido";
            }
        } else {
            $_SESSION['producto'] = "fallido";
        }
        echo "<script> window.location=' "
        . urlBase . "Producto/gestionarProductos'; </script>";  
    }
    
    //Funcion para editar un producto
    public function editarProducto() {
        //Comprueva que $GET este definida y tenga un valor
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $editar = true;
            $productos = new Producto();
            $productos->setIdProducto($id);
            
            //Ejecuta la funcion obtenerUnProducto del modelo Producto para obtener el producto que se va a editar
            $producto = $productos->obtenerUnProducto();
            //Carga el formulario con los datos 
            require_once 'vistas/producto/nuevoProducto.php';
        } else {
            echo "<script> window.location=' "
        . urlBase . "Producto/gestionarProductos'; </script>"; 
        }
    }
    
    //Funcion para eliminar un producto
    public function eliminarProducto() {
        //Comprueba $_GET este definida y tenga un valor
        if (isset($_GET['id'])) {
            //Si la condicion se cumple permite acceder a la funcion eliminarProducto del modelo Producto
            $id = $_GET['id'];
            $foto = $_GET['foto'];
            $producto = new Producto();
            $producto->setIdProducto($id);
            $producto->setFotoProducto($foto);
                        
            $ruta = "assets/img/productos/"; //Ruta donde se almacena la imagen
            $nombreFoto = $foto; // Nombre de la imagen
            unlink($ruta.$nombreFoto);  //Eliminar imagen
    
            $borrar = $producto->eliminarProducto();
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
        . urlBase . "Producto/gestionarProductos'; </script>";    
    }
    
}

?>