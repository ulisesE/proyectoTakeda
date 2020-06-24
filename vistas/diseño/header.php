<!DOCTYPE html>
<html lang="es">
    <head>
    <!-- Base -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Metadatos para telefonos -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- metadatos del sitio -->
    <title>Servicios Takeda</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="icon" href="<?= urlBase ?>assets/img/favicon.ico" type="image/x-icon"> 

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- FontAwesome Icons core CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="<?= urlBase ?>assets/css/estilos.css">

    <!-- Responsive styles for this template -->
    <link href="<?= urlBase ?>assets/css/responsive.css" rel="stylesheet">
    <link href="<?= urlBase ?>assets/css/style.css" rel="stylesheet">

    <!-- Scripts de bootstrapcdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    </head>

    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
            <a href="#">
                <img src="<?= urlBase ?>assets/img/logo.png"  class="d-inline-block align-top tamañoLogo" alt="Logo Servicios Takeda">
            </a>
            <h5 style="color: white">Tel. 55-5050-0847</h5>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <?php if (!isset($_SESSION['identidad'])): ?>
                <?php else: ?>
                    <ul class="navbar-nav">
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if ($_SESSION['identidad']->fotoUsuario != null): ?>
                                    <img src="<?= urlBase ?>assets/img/usuarios<?= $usuario->fotoUsuario ?>" class="imagenUsuarioMenu" />
                                <?php else: ?>
                                    <span class="glyphicon glyphicon-picture"></span>
                                <?php endif; ?>

                                <?= $_SESSION['identidad']->nombreUsuario ?>

                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Cambiar Foto</a>

                            </div>
                        </li>
                    </ul>
                <?php endif; ?>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['administrador'])): ?>
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= urlBase ?>Administrador/vistaAdministrador"><span class="glyphicon glyphicon-question-sign"></span> Inicio</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?= urlBase ?>Administrador/gestionarUsuarios"><span class="glyphicon glyphicon-question-sign"></span> Usuarios</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?= urlBase ?>Blog/gestionarBlog"><span class="glyphicon glyphicon-question-sign"></span> Blog</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= urlBase ?>Departamento/gestionarDepartamentos"><span class="glyphicon glyphicon-question-sign"></span> Departamentos</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Productos
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= urlBase ?>TipoProducto/gestionarTiposProductos">Tipos de productos</a>
                            <a class="dropdown-item" href="<?= urlBase ?>Producto/gestionarProductos">Productos</a>
                        </div>
                    </li>
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= urlBase ?>Usuario/cerrarSesion"><span class="glyphicon glyphicon-question-sign"></span> Cerrar Sesión</a>
                    </li>
                    
       
                    
                    
                    
                    
                    <?php elseif (isset($_SESSION['usuario'])): ?>
                    
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= urlBase ?>Usuario/vistaUsuario"><span class="glyphicon glyphicon-question-sign"></span> Inicio</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Catalogo de Productos
                        </a>
                        <div class="dropdown-menu">
                            <?php $departamentos = FuncionesRequeridas::obtenerDepartamento(); ?>
                            <?php while ($dep = $departamentos->fetch_object()): ?>
                                <a class="dropdown-item" href="<?= urlBase ?>Producto/verTodosProductos&id=<?= $dep->idDepartamento ?>"><?= $dep->nombreDepartamento ?></a>
                            <?php endwhile; ?>
                        </div>
                    </li>
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= urlBase ?>Usuario/cerrarSesion"><span class="glyphicon glyphicon-question-sign"></span> Cerrar Sesión</a>
                    </li>
                    
                    
                    
                    
                    
                    
                    <?php else: ?>
                    
                    
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= urlBase ?>"><span class="glyphicon glyphicon-home"></span> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= urlBase ?>Usuario/nosotros"><span class="glyphicon glyphicon-info-sign"></span> ¿Quienes Somos?</a>
                    </li>
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Servicios
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= urlBase ?>Usuario/servicios1">Electronicos</a>
                            <a class="dropdown-item" href="<?= urlBase ?>Usuario/servicios2">Electrodomesticos</a>
                            <a class="dropdown-item" href="<?= urlBase ?>Usuario/servicios3">Dispositivos Inteligentes</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= urlBase ?>Usuario/contacto"><span class="glyphicon glyphicon-earphone"></span> Contactanos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= urlBase ?>Blog/blog"><span class="glyphicon glyphicon-question-sign"></span> Blog</a>
                    </li>
                    <li class="nav-item active">
                        <button type="button" class="btn" data-toggle="modal" data-target="#IniciarSesion" style="color:white;">Iniciar Sesion</button>
                    </li>
                    <li class="nav-item active">
                        <button type="button" class="btn" data-toggle="modal" data-target="#Registro" style="color:white;">Registrarse</button>
                    </li>

                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        