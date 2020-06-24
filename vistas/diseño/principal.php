<!-- The Modal 1-->
<div class="modal fade" id="cartelInicio">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header mx-auto">
                <center>
                    <h1 >Llamanos<p style="color: red;">55-5050-0847</p></h1>
                </center>
            </div>

            <!-- Modal body -->
            <div class="modal-body mx-auto">
                <img src="<?= urlBase ?>assets/img/modal.jpg" style="width: 100%">
                <hr>
                <form>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" id="telefono" placeholder="Ingrese su telefono" name="telefono">
                        </div>
                        <p>ó</p>
                        <div class="col">
                            <input type="text" class="form-control" id="correo" placeholder="Ingrese su correo" name="correo">
                        </div>
                    </div>
                    <hr>
                    <center><button type="submit" class="btn btn-primary">Te contactaremos</button></center>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<div id="slides" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= urlBase ?>assets/img/1.jpg">
            <div class="carousel-caption">
                <img class="logo" src="<?= urlBase ?>assets/img/logo.png" width="200">
                <h1 class="texto">Llamanos al .</h1>
                    <a href="#ofer"><button type="button" href="#ofer" class="btn btn-lg btn-primary color">Ver Ofertas</button></a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?= urlBase ?>assets/img/2.jpg" />
            <div class="carousel-caption">
                <img class="logo" src="<?= urlBase ?>assets/img/logo.png" width="200" />
                <h1 class="texto">reparacion de  celulares</h1>
                    <a href="#ofer"><button type="button" href="#ofer" class="btn btn-lg btn-primary color">Ver Ofertas</button></a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?= urlBase ?>assets/img/3.jpg" />
            <div class="carousel-caption">
                <img class="logo" src="<?= urlBase ?>assets/img/logo.png" width="200" />
                <h3 class="texto">El mejor precio y la mejor calidad solo lo encuentras en Servicios Takeda</h3>
                    <a href="#ofer"><button type="button"  class="btn btn-lg btn-primary color">Ver Ofertas</button></a>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container marketing">
    <div class="row">
        <div  class="container-fluid padding">
            <div class="row welcome text-center">
                <div id="ofer" class="col-12">
                    <h1 class="py-3">Servicios</h1>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">
    </div>
</div>

<div class="justify-content-center text-center row">
    <div class="col-sm-12 col-lg-4 col-md-4">
        <img src="<?= urlBase ?>assets/img/accesorios.jpg" class="rounded-circle circulos" alt="accesorios para celulares">
        <p>Venta de accesorios para celular</p>
    </div>
    <div class="col-sm-12 col-lg-4 col-md-4">
        <img src="<?= urlBase ?>assets/img/Mantenimiento.png" class="rounded-circle circulos" alt="Mantenimiento ,Instalacion y reparacion de electrodomésticos">
        <p>Mantenimiento ,Instalacion y reparacion de electrodomésticos</p>
    </div>
    <div class="col-sm-12 col-lg-4 col-md-4">
        <img src="<?= urlBase ?>assets/img/reparacion.jpg" class="rounded-circle circulos" alt="Mantenimiento ,Instalacion y reparacion de electronicos">
        <p>Mantenimiento ,Instalacion y reparacion de electronicos</p>
    </div>
</div>

<div class="container marketing">
    <div class="row">
        <div  class="container-fluid padding">
            <div class="row welcome text-center">
                <div id="ofer" class="col-12">
                    <h1 class="py-3">Productos Nuevos</h1>
                </div>
            </div>
        </div>

    </div>
</div>

<div  class="text-muted">
    <div  class="container">
        <div class="row">
        <?php while ($pro = $productos->fetch_object()): ?>    
            <div class="tarjetas col-lg-3 col-md-6 col-sm-12">
                <div class="card bg-dark text-white">
                    <div class="card-body text-center">
                        <?php if ($pro->fotoProducto != null): ?>
                            <img class="tamañoGaleria img-thumbnail" src="<?= urlBase ?>/assets/img/productos/<?= $pro->fotoProducto ?>" alt="No hay imagen">
                        <?php else: ?>
                            <img class="img-thumbnail"src="<?= urlBase ?>assets/img/productos/dsfsdf.jpg"  alt="Sin imagen"/>
                        <?php endif; ?>
                        <br><br>
                        <h2  class="card-text text-center" style="color: white"><?= $pro->nombreProducto ?></h2>
                        <p class="text-center">$ <?= $pro->precioProducto ?></p>
                        <button type="button" class="btn btn-success text-center mb-3" data-toggle="modal" data-target="#Registro" style="color:white;">Comprar</button>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>   
        </div>
    </div>
</div>
<div class="container marketing">
    <div class="row">
        <div  class="container-fluid padding">
            <div class="row welcome text-center">
                <div id="ofer" class="col-12">
                    <h1 class="py-3">Productos Reparados</h1>
                </div>
            </div>
        </div>

    </div>
</div>

<div  class="text-muted">
    <div  class="container">
        <div class="row">
        <?php while ($proRep = $productosRep->fetch_object()): ?> 
            <div class="tarjetas col-lg-3 col-md-6 col-sm-12">
                <div class="card bg-dark text-white">
                    <div class="card-body text-center">
                        <?php if ($proRep->fotoProducto != null): ?>
                            <img class="tamañoGaleria img-thumbnail" src="<?= urlBase ?>/assets/img/productos/<?= $proRep->fotoProducto ?>" alt="No hay imagen">
                        <?php else: ?>
                            <img class="img-thumbnail"src="<?= urlBase ?>assets/img/productos/dsfsdf.jpg"  alt="Sin imagen"/>
                        <?php endif; ?>
                        <br><br>
                        <h2  class="card-text text-center" style="color: white"><?= $proRep->nombreProducto ?></h2>
                        <p class="text-center">$ <?= $proRep->precioProducto ?></p>
                        <button type="button" class="btn btn-success text-center mb-3" data-toggle="modal" data-target="#Registro" style="color:white;">Comprar</button>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</div>
