<div class="container marketing">

    <div class="row">
        <div  class="container-fluid padding">
            <div class="row welcome text-center">
                <div id="ofer" class="col-12">
                    <h1 class="py-3">Carrito de la compra</h1>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="table-responsive">
            <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th class="text-center">Imagen</th>
                            <th class="text-center">Nombre del producto</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Cantidad del producto</th>
                            <th class="text-center">Precio Total</th>
                            <th class="text-center">Eliminar</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        foreach ($carrito as $indice => $elemento):
                            $producto = $elemento['producto'];
                            ?>

                            <tr class="colorTexto">
                                <td>
                                    <?php if ($producto->fotoProducto != null): ?>
                                        <img src="<?= urlBase ?>assets/img/productos/<?= $producto->fotoProducto ?>" width="100" height="110" />
                                    <?php else: ?>
                                        <img src="<?= urlBase ?>assets/img/productos/sdfds.png" class="img_carrito" />
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= urlBase ?>producto/verUnProducto&id=<?= $producto->idProducto ?>"><?= $producto->nombreProducto ?></a>
                                </td>
                                <td>
                                    $ <?= $producto->precioProducto ?>
                                </td>
                                <td>
                                    <a href="<?= urlBase ?>carrito/aumentarProducto&index=<?= $indice ?>">
                                        <b>+</b>
                                    </a>
                                    <?= $elemento['unidades'] ?>
                                    <a href="<?= urlBase ?>carrito/disminuirProducto&index=<?= $indice ?>">
                                        <b>-</b>
                                    </a>

                                </td>
                                <td>$ <?= $elemento['unidades'] * $producto->precioProducto ?></td>
                                <td>
                                    <a href="<?= urlBase ?>Carrito/quitarProducto&index=<?= $indice ?>" class="btn btn-danger">Quitar producto</a>
                                </td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>







                <div class="container">	

                    <div class="row">
                        <div class="col-sm-12 col-lg-6 col-md-6 py-3 text-left">
                            <a href="<?= urlBase ?>carrito/borrarCarrito" class="btn btn-danger">Vaciar carrito</a>
                            <a href="<?= urlBase ?>pedido/hacer" class="btn btn-info">Hacer pedido</a>
                        </div>
                        <div class="col-sm-12 col-lg-6 col-md-6 py-3 text-right">
                            <?php $total = FuncionesRequeridas::totalCarrito(); ?>
                            <h3>Total a pagar: $ <?= $total['total'] ?> </h3>
                        </div>
                    </div>

                </div>


            <?php else: ?>
                <p>El carrito está vacio, añade algun producto</p>
            <?php endif; ?>






        </div>
    </div>
</div>






