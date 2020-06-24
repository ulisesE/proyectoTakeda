<?php

require_once 'modelos/Producto.php';

class ControladorCarrito {

    public function verCarrito() {
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
            $carrito = $_SESSION['carrito'];
        } else {
            $carrito = array();
        }
        require_once 'vistas/carrito/verCarrito.php';
    }

    //Funcion para agregar un producto al carrtio
    public function agregarProducto() {
        if (isset($_GET['id'])) {
            $idProducto = $_GET['id'];
        } else {
            header('Location:' . urlBase . 'Usuario/vistaUsuario');
        }

        if (isset($_SESSION['carrito'])) {
            $contador = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['idProducto'] == $idProducto) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $contador++;
                }
            }
        }

        if (!isset($contador) || $contador == 0) {
            // Conseguir producto
            $producto = new Producto();
            $producto->setIdProducto($idProducto);
            $producto = $producto->obtenerUnProducto();

            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "idProducto" => $producto->idProducto,
                    "precioProducto" => $producto->precioProducto,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }

        echo "<script> window.location=' "
        . urlBase . "Carrito/verCarrito'; </script>";
    }

    public function aumentarProducto() {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;
        }
        echo "<script> window.location=' "
        . urlBase . "Carrito/verCarrito'; </script>";
    }

    public function disminuirProducto() {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']--;

            if ($_SESSION['carrito'][$index]['unidades'] == 0) {
                unset($_SESSION['carrito'][$index]);
            }
        }
        echo "<script> window.location=' "
        . urlBase . "Carrito/verCarrito'; </script>";
    }

}

?>