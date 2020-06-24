<?php FuncionesRequeridas::esAdministrador() ?>
<div class="container">
    <div class="row mx-auto">
        <div  class="container-fluid padding">
            <div class="row welcome text-center">
                <div id="ofer" class="col-12">
                    <h1 class="py-3">Gestion de Publicaciones.</h1>
                </div>
            </div>
        </div>
        
        <div>
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevaPublicacion">
            Escribir nueva publicacion
            </button>
        </div>
        <hr style="height: 20px;">
        <div class="table-responsive ">       
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">Id Publicacion</th>
                        <th class="text-center">Titulo</th>
                        <th class="text-center">Contenido</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Autor</th>
                        <th class="text-center">Modificar</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($publicacion = $publicaciones->fetch_object()): ?>
                        <tr>
                            <td><?= $publicacion->idPublicaciones ?></td>
                            <td><?= $publicacion->titulo ?></td>
                            <td><?= $publicacion->contenido ?></td>
                            <td><?= $publicacion->fecha ?></td>
                            <td><?= $publicacion->nombreUsuario ?> <?= $publicacion->apellidoPaterno ?></td>
                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- The Modal -->
  <div class="modal fade" id="nuevaPublicacion">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Nueva Publicacion</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form method="POST" action="<?= urlBase ?>Blog/publicar">
            <div class="form-group">
                <label for="titulo">titulo:</label>
                <input type="text" class="form-control" placeholder="Ingrese el titulo de la publicacion" id="titulo" name="titulo">
            </div>
            <div class="form-group">
              <label for="contenido">Contenido:</label>
              <textarea class="form-control" rows="5" id="contenido" name="contenido"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>.
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
