<?php FuncionesRequeridas::esAdministrador() ?>
<div class="container marketing">
    <div class="row">
        <div  class="container-fluid padding">
            <div class="row welcome text-center">
                <div id="ofer" class="col-12">
                    <h1 class="py-3">Gestion de Departamentos.</h1>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">
        <a class="btn btn-info mb-3" href="<?= urlBase ?>Departamento/nuevoDepartamento">Crear Nuevo Departamento</a>
        <div class="table-responsive">       
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">Id Departamento</th>
                        <th class="text-center">Nombre del departamento</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($departamento = $departamentos->fetch_object()): ?>
                        <tr>
                            <?php if ($departamento->nombreDepartamento == 'Refacciones'): ?>
                                <td><?= $departamento->idDepartamento; ?></td>
                                <td><?= $departamento->nombreDepartamento; ?></td>
                                <td></td>
                            <?php else: ?>
                                <td><?= $departamento->idDepartamento; ?></td>
                                <td><?= $departamento->nombreDepartamento; ?></td>
                                <td><a href="<?= urlBase ?>Departamento/eliminarDepartamento&id=<?= $departamento->idDepartamento; ?>" class="btn btn-danger">Borrar</a></td>
                            <?php endif; ?>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>