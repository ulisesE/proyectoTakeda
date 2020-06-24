<?php FuncionesRequeridas::esUsuario() ?>

<?php if (isset($departamento)): ?>
    <div class="container marketing">
        <div class="row">
            <div  class="container-fluid padding">
                <div class="row welcome text-center">
                    <div id="ofer" class="col-12">
                        <h1 class="py-3"><?= $departamento->nombreDepartamento ?></h1>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <?php if ($productos->num_rows == 0): ?>
        <div class="container marketing">
            <div class="row">
                <div  class="container-fluid padding">
                    <p class="lead">No hay productos para mostrar.</p>

                </div>

            </div>
        </div>

    <?php else: ?>
        <div  class="text-muted">
            <div  class="container">
                <div class="row">
                    <?php while ($pro = $productos->fetch_object()): ?>
                        <div class="card col-sm-12 col-lg-3 col-md-6" >
                            <?php if ($pro->fotoProducto != null): ?>
                                <img class="tamañoGaleria" src="<?= urlBase ?>/assets/img/productos/<?= $pro->fotoProducto ?>" alt="No hay imagen">
                            <?php else: ?>
                                <img src="<?= urlBase ?>assets/img/productos/dsfsdf.jpg"  alt="Sin imagen"/>
                            <?php endif; ?>
                            <h2 class="card-text text-center"><?= $pro->nombreProducto ?></h2>
                            <p class="text-center">$ <?= $pro->precioProducto ?></p>
                            <a class="btn btn-info text-center mb-1" href="<?= urlBase ?>Producto/verUnProducto&id=<?= $pro->idProducto ?>"><span class="glyphicon glyphicon-eye-open"></span> Ver producto</a>
                            <a class="btn btn-success mb-3" href="<?= urlBase ?>Carrito/agregarProducto&id=<?= $pro->idProducto ?>" class="button">Comprar</a>
                        </div>                        
                    <?php endwhile; ?>

                </div>
            </div>
        </div>

    <?php endif; ?>
<?php else: ?>
     <div class="container marketing">
            <div class="row">
                <div id="ofer" class="col-12">
                        <h1 class="py-3">El departamento no existe.</h1>
                </div>

            </div>
        </div>
<?php endif; ?>
