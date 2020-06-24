<?php FuncionesRequeridas::esAdministrador() ?>
<div class="container marketing">
    <div class="row">
        <div  class="container-fluid padding">
            <div class="row welcome text-center">
                <div id="ofer" class="col-12">
                    <h1 class="py-3">Gestion de Tipos de Productos.</h1>
                </div>
                <p class="lead">En este apartado se agregan los tipos de productos(Producto Nuevo, Producto Reparado, Refacciones para telefono, Refacciones para lavadora).</p>
            </div>
        </div>
        <hr class="featurette-divider">
        <a class="btn btn-info mb-3" href="<?= urlBase ?>TipoProducto/nuevoTipoProducto">Nuevo Tipo de Producto</a>
        <div class="table-responsive">       
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">Id del Tipo de Producto</th>
                        <th class="text-center">Nombre del tipo de producto</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($tipo = $tipos->fetch_object()): ?>
                        <tr>
                            <?php if (($tipo->tipoProducto == 'Producto Nuevo') || ($tipo->tipoProducto == 'Producto Reparado')) : ?>
                                <td><?= $tipo->idTipoProducto; ?></td>
                                <td><?= $tipo->tipoProducto; ?></td>
                                <td></td>
                            <?php else: ?>
                                <td><?= $tipo->idTipoProducto; ?></td>
                            <td><?= $tipo->tipoProducto; ?></td>
                            <td><a href="<?= urlBase ?>TipoProducto/eliminarTipoProducto&id=<?= $tipo->idTipoProducto; ?>" class="btn btn-danger">Borrar</a></td>
                            <?php endif; ?>
                            
                            
                            
                            
                            
                            
                            
                            
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>