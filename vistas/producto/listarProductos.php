<?php FuncionesRequeridas::esAdministrador() ?>
<div class="container marketing">
    <div class="row">
        <div  class="container-fluid padding">
            <div class="row welcome text-center">
                <div id="ofer" class="col-12">
                    <h1 class="py-3">Gestion de Productos.</h1>
                </div>

            </div>
        </div>
        <hr class="featurette-divider">
        <a class="btn btn-info mb-3" href="<?= urlBase ?>Producto/nuevoProducto">Agregar Nuevo Producto</a>
        <div class="table-responsive">       
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">Id Producto</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Departamento</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Productos disponibles</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($producto = $productos->fetch_object()): ?>
                        <tr>
                            <td><?= $producto->idProducto; ?></td>
                            <td>
                                <?php if ($producto->fotoProducto != null): ?>
                                    <img src="<?= urlBase ?>assets/img/productos/<?= $producto->fotoProducto ?>" width="100" height="110"/>
                                <?php else: ?>
                                    <span class="glyphicon glyphicon-picture">Sin foto</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php $departamentos = FuncionesRequeridas::obtenerDepartamento(); ?>
                                <?php while ($dep = $departamentos->fetch_object()): ?>
                                    <?php if ($dep->idDepartamento == $producto->idDepartamento): ?>
                                        <?php echo $dep->nombreDepartamento; ?>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </td>
                            <td><?= $producto->nombreProducto; ?></td>
                            <td>
                                <?php $tipos = FuncionesRequeridas::obtenerTipoProducto(); ?>
                                <?php while ($tip = $tipos->fetch_object()): ?>
                                    <?php if ($tip->idTipoProducto == $producto->idTipoProducto): ?>
                                        <?php echo $tip->tipoProducto; ?>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </td>
                            <td>$ <?= $producto->precioProducto; ?></td>
                            <td><?= $producto->productosDisponibles; ?></td>
                            <td><a href="<?= urlBase ?>Producto/editarProducto&id=<?= $producto->idProducto; ?>" class="btn btn-success">Editar</a></td>
                            <td><a href="<?= urlBase ?>Producto/eliminarProducto&id=<?= $producto->idProducto; ?>&foto=<?= $producto->fotoProducto; ?>" class="btn btn-danger">Borrar</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>