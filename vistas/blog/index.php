<div class="container">
    <div class="row">
        <?php 
        $articulo=0;
        while ($publicacion = $publicaciones->fetch_object()): 
            if ($articulo==0) { ?>
            <div class="col-md-6">
                <div class="post-media">                            
                        <img src="<?=urlBase ?>assets/upload/tech_01.jpg" alt="" class="img-fluid">
                    
                     <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="badge badge-danger"><a href="<?=urlBase.'Blog/publicacion&idPublicacion='.$publicacion->idPublicaciones ?>" title="">Recomendaciones</a></span>
                                <h4><a href="<?=urlBase.'Blog/publicacion&idPublicacion='.$publicacion->idPublicaciones ?>" title=""><?= $publicacion->titulo ?></a></h4>
                                <small><a href="<?=urlBase.'Blog/publicacion&idPublicacion='.$publicacion->idPublicaciones ?>" title=""><?= $publicacion->fecha ?></a></small>
                                <small><a href="<?=urlBase.'Blog/publicacion&idPublicacion='.$publicacion->idPublicaciones ?>" title="">por <?= $publicacion->nombreUsuario ?> <?= $publicacion->apellidoPaterno ?></a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end first-side -->
            <?php }else{ ?>
            <div class="col-md-3">
                <div class="post-media">
                     <img src="<?= urlBase ?>assets/upload/tech_02.jpg" alt="" class="img-fluid">
                     <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="badge badge-danger"><a href="<?=urlBase.'Blog/publicacion&idPublicacion='.$publicacion->idPublicaciones ?>" title="">Recomendaciones</a></span>
                                <h4><a href="<?=urlBase.'Blog/publicacion&idPublicacion='.$publicacion->idPublicaciones ?>" title=""><?= $publicacion->titulo ?></a></h4>
                                <small><a href="<?=urlBase.'Blog/publicacion&idPublicacion='.$publicacion->idPublicaciones ?>" title=""><?= $publicacion->fecha ?></a></small>
                                <small><a href="<?=urlBase.'Blog/publicacion&idPublicacion='.$publicacion->idPublicaciones ?>" title="">por <?= $publicacion->nombreUsuario ?> <?= $publicacion->apellidoPaterno ?></a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                     </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end second-side -->

            <?php }
        $articulo++; endwhile; ?>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div><!-- end blog-top -->

                    <div class="blog-list clearfix">
                        <?php while ($publicacion = $seccion->fetch_object()): ?>
                            <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="<?=urlBase.'Blog/publicacion&idPublicacion='.$publicacion->idPublicaciones ?>" title="">
                                        <img src="<?= urlBase ?>assets/upload/tech_blog_01.jpg" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="<?=urlBase.'Blog/publicacion&idPublicacion='.$publicacion->idPublicaciones ?>" title=""><?= $publicacion->titulo ?></a></h4>
                                <p><?= $publicacion->contenido ?></p>
                                <small class="firstsmall"><a class="badge badge-danger" href="#" title="">Recomendaciones</a></small>
                                <small><a href="<?=urlBase.'Blog/publicacion&idPublicacion='.$publicacion->idPublicaciones ?>" title="<?= $publicacion->fecha ?>"><?= $publicacion->fecha ?></a></small>
                                <small><a href="tech-author.html" title="">por <?= $publicacion->nombreUsuario ?> <?= $publicacion->apellidoPaterno ?></a></small>
                                <small><a href="<?=urlBase.'Blog/publicacion&idPublicacion='.$publicacion->idPublicaciones ?>" title=""><i class="fa fa-eye"></i> vistas</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">
            <?php endwhile; ?>                                
                </div><!-- end page-wrapper -->

                <hr class="invis">
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>