<?php FuncionesRequeridas::esUsuario() ?>


<?php if (isset($pro)): ?>

    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div  class="container-fluid padding">
                <div class="row welcome text-center">
                    <div id="ofer" class="col-12">
                        <h1 class="py-3"><?= $pro->nombreProducto ?></h1>
                    </div>
                </div>
            </div>
            <hr class="featurette-divider">


            <div class="container">	
                <div class="row">
                    <div class="col-sm-12 col-lg-6 col-md-6 py-3 text-left">
                        <?php if ($pro->fotoProducto != null): ?>
                        <img src="<?= urlBase ?>assets/img/productos/<?= $pro->fotoProducto ?>" style="max-width: 100%" width="400" alt="Sin foto"/>
                        <?php else: ?>
                            <img src="<?= urlBase ?>assets/img/productos/dsxzds.jpg" alt="No hay foto" />
                        <?php endif; ?>  
                    </div>
                    <div class="col-sm-12 col-lg-6 col-md-6 py-3 text-left">
                        <h1 class="py-3"><b>Precio: </b>$ <?= $pro->precioProducto ?></h1>
                        <h2>Descripcion:</h2>
                        <p><?= $pro->descripcionProducto ?></p>
                        <a href="<?= urlBase ?>Carrito/agregarProducto&id=<?= $pro->idProducto ?>" class="btn btn-danger">Comprar</a>
                    </div>
                </div>



            </div>
        </div>

    </div>







<?php else: ?>
    <h1>El producto no existe</h1>
<?php endif; ?>
        

