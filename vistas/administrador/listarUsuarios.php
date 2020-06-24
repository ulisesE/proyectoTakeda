<?php FuncionesRequeridas::esAdministrador() ?>
<div class="container marketing">
    <div class="row">
        <div  class="container-fluid padding">
            <div class="row welcome text-center">
                <div id="ofer" class="col-12">
                    <h1 class="py-3">Gestion de Usuarios.</h1>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="table-responsive">       
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">Id Usuario</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Fecha del registro</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($usuario = $usuarios->fetch_object()): ?>
                        <tr>
                            <td><?= $usuario->idUsuario; ?></td>
                            <td>
                                <?php if ($usuario->fotoUsuario != null): ?>
                                    <img src="<?= urlBase ?>assets/img/usuarios<?= $usuario->foto ?>"/>
                                <?php else: ?>
                                    <span class="glyphicon glyphicon-picture">Sin foto</span>
                                <?php endif; ?>
                            </td>
                            <td><?= $usuario->nombreUsuario; ?></td>
                            <td><?= $usuario->apellidoPaterno;  ?> <?= $usuario->apellidoMaterno; ?></td>
                           
                            <td><?= $usuario->correo; ?></td>
                            <td><?= $usuario->fechaRegistro; ?></td>
                            <td><a href="<?= urlBase ?>Administrador/eliminarUsuario&id=<?=$usuario->idUsuario;?>" class="btn btn-danger">Borrar</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>