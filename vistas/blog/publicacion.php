<?php while ($publicacion = $leer->fetch_object()): ?>
    <div class="jumbotron text-center">
        <span class=""><a href="#" title="">Recomendaciones</a></span>
        <h1><?= $publicacion->titulo ?></h1>

        <div class="blog-meta big-meta">
            <small><a href="#" title=""><?= $publicacion->fecha ?></a></small>
            <small><a href="#" title="">por <?= $publicacion->nombreUsuario ?> <?= $publicacion->apellidoPaterno ?></a></small>
        </div><!-- fin metadatos -->
    </div>

    <div class="container mx-auto " >
        <div class="col-lg-12 single-post-media text-center">
            <img src="<?= urlBase ?>assets/upload/tech_menu_08.jpg" alt="" class="rounded articuloPortada">
        </div><!-- fin banner -->

        <div class="shadow col-lg-12"><!--Inicio Articulo-->
            <h3><strong>Introduccion rapida</strong></h3>

            <p><?= $publicacion->contenido ?></p>

            <p><img src="<?= urlBase ?>assets/upload/tech_menu_10.jpg" width="80%" height="300px" alt=""><br></p>
        </div><!-- fin texto articulo -->
    </div><!-- fin container -->
<?php endwhile; ?>


<!--Inicio seccion comentarios-->
<div class="container clearfix">
    <h4 >comentarios</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="comments-list">
                
                <div class="bg-dark text-white">
                    <img class="card-img-top" src="<?= urlBase ?>assets/upload/author.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title">Amanda Martines <small>18/06/2020</small></h4>
                      <p class="card-text1">Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean</p>
                      <a href="#" class="btn btn-primary">Responder</a>
                    </div>
                </div>
                <br>

                <div class="bg-dark text-white">
                    <img class="card-img-top" src="<?= urlBase ?>assets/upload/author.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title">Baltej Singh <small>18/06/2020</small></h4>
                      <p class="card-text1">Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>
                        <div class="card bg-secondary text-white">
                            <img class="card-img-top" src="<?= urlBase ?>assets/upload/author.jpg" alt="Card image" style="width:100%">
                            <div class="card-body">
                              <h4 class="card-title">Marie Johnson <small>18/06/2020</small></h4>
                              <p class="card-text1">Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>
                              <a href="#" class="btn btn-primary">Responder</a>
                            </div>
                        </div>


                      <a href="#" class="btn btn-primary">Responder</a>
                    </div>
                </div>
                <br>
                <div class="bg-dark text-white">
                    <img class="card-img-top" src="<?= urlBase ?>assets/upload/author.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title">Amanda Martines <small>18/06/2020</small></h4>
                      <p class="card-text1">Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean</p>
                      <a href="#" class="btn btn-primary">Responder</a>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end custom-box -->

<hr class="invis1">

<div class="container clearfix">
    <h4 class="small-title">Dejar Comentario</h4>
    <div class="row">
        <div class="shadow col-lg-12">
            <form class="form-wrapper">
                <textarea class="form-control" placeholder="Comenta Aqui"></textarea>
                <button type="submit" class="btn btn-primary">Enviar Comentario</button>
            </form>
        </div>
    </div>
</div>