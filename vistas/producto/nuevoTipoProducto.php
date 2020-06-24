<?php FuncionesRequeridas::esAdministrador() ?>
<div class="container marketing">
    <div class="row">
        <div  class="container-fluid padding">
            <div class="row welcome text-center">
                <div id="ofer" class="col-12">
                    <h1 class="py-3">Nuevo Tipo de Producto.</h1>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">
        
        <div class="container text-left">
            <form action="<?= urlBase ?>TipoProducto/guardarTipoProducto" method="POST">
                <label for="nombre">Tipo de producto:</label>
                <input type="text" class="form-control" name="nombre" required autofocus>
                <input type="submit" class="btn btn-lg btn-primary btn-block my-3" value="Guardar">
            </form>
        </div> 
    </div>
</div>