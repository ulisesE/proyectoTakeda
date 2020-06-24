<?php FuncionesRequeridas::esAdministrador() ?>
<div class="container marketing">
    <div class="row">
        <div  class="container-fluid padding">
            <div class="row welcome text-center">
                <div id="ofer" class="col-12">
                    <h1 class="py-3">Nuevo Departamento.</h1>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">
        
        <div class="container text-left">
            <form action="<?= urlBase ?>Departamento/guardarDepartamento" method="POST">
                <label for="nombre">Nombre del departamento:</label>
                <input type="text" class="form-control" name="nombre" required autofocus>
                <input type="submit" class="btn btn-lg btn-primary btn-block my-3" value="Guardar">
            </form>
        </div> 
    </div>
</div>