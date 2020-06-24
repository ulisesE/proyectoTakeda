<?php
require_once 'modelos/Blog.php';

class ControladorBlog{
    
    //Funcion para obtener datos del blog
    public function gestionarBlog(){
        //Obtiene la funcion listaPublicaciones del modelo Administrador 
        $blog = new Blog();
        $publicaciones = $blog->listaPublicaciones();
        require_once 'vistas/administrador/gestionarBlog.php';
    }

    //Funcion para ver la vista de blog
    public function blog() {
        $blog = new Blog();
        $publicaciones = $blog->listaPublicaciones2();
        $seccion = $blog->listaPublicaciones();
        require_once 'vistas/blog/index.php';
    }
    //Funcion para ver la vista de blog
    public function publicacion() {
        $blog = new Blog();
        if (isset($_GET)&& isset($_GET['idPublicacion'])) {
            //var_dump($_GET);
            $leer = $blog->articulo($_GET['idPublicacion']);
            require_once 'vistas/blog/publicacion.php';
        }else{
            require_once 'vistas/error/index.php';
        }
        
        
    }
    //Funcion para guardar un departamento a traves de la obtencion de los datos ingresados en el formulario
    public function publicar() {
        //Comprueba si $_POST esta definida y si $_POST esta definida y tiene un valor asignado
        if (isset($_POST) && isset($_POST['titulo']) && isset($_POST['contenido'])) {
            //Si la condicion se cumple se ejecuta la funcion guardarDepartamento del modelo Departamento
            $publicacion = new Blog();
            $publicacion->setTitulo($_POST['titulo']);
            $publicacion->setContenido(nl2br($_POST['contenido']));
            $guardar = $publicacion->publicar();
        }
        echo "<script> window.location=' "
        . urlBase . "Blog/gestionarBlog'; </script>";
        
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