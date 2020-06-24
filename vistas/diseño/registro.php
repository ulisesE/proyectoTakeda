<!-- Modal -->
<div id="Registro" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registro</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                
                <!-- Crea una sesion del registro si es completado devuelve el mensaje Registro completado correctamente si no se registra devuelve Registro fallido, introduce bien los datos -->
                <?php if (isset($_SESSION['registro']) && $_SESSION['registro'] == 'completo'): ?>
                    <strong>Registro completado correctamente</strong>
                <?php elseif (isset($_SESSION['registro']) && $_SESSION['registro'] == 'fallido'): ?>
                    <strong>Registro fallido, introduce bien los datos</strong>
                <?php endif; ?>
                <!-- Se llama a la funcion borrar Sesion para que borre la sesion del registro -->    
                <?php FuncionesRequeridas::borrarSesion('registro'); ?>
                
                <form action="<?= urlBase ?>Usuario/registrarUsuario" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="apellidoPaterno">Apellido Paterno</label>
                        <input type="text" name="apellidoPaterno" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="apellidoMaterno">Apellido Materno</label>
                        <input type="text" name="apellidoMaterno" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" name="contrasena" required class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>
    //shortcut for $(document).ready 
    $(function () {
        if (window.location.hash) {
            var hash = window.location.hash;
            $(hash).modal('toggle');
        }
    });
</script> 