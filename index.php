<?php

session_start();

//Archivos necesarios para el funcionamiento de la pagina 
require_once 'cargaControladores.php';
require_once 'configuraciones/Base.php';
require_once 'configuraciones/parametros.php';
require_once 'configuraciones/FuncionesRequeridas.php';
require_once 'vistas/diseño/header.php';
require_once 'vistas/diseño/registro.php';
require_once 'vistas/diseño/iniciarSesion.php';

//Funcion para cargar el controlador del error
function mostrarError() {
    $error = new ControladorError();
    $error->index();
}

//Condicion para cargar los controladores
if (isset($_GET['controlador'])) {
    $nombreControlador = 'Controlador' . $_GET['controlador'];
} elseif (!isset($_GET['controlador']) && !isset($_GET['accion'])) {
    $nombreControlador = controladorDefinido;
} else {
    mostrarError();
    exit();
}

if (class_exists($nombreControlador)) {
    $controlador = new $nombreControlador();
    if (isset($_GET['accion']) && method_exists($controlador, $_GET['accion'])) {
        $accion = $_GET['accion'];
        $controlador->$accion();
    } elseif (!isset($_GET['controlador']) && !isset($_GET['accion'])) {
        $accionDefinida = accionDefinida;
        $controlador->$accionDefinida();
    } else {
        mostrarError();
    }
} else {
    mostrarError();
}

require_once 'vistas/diseño/footer.php';

?>