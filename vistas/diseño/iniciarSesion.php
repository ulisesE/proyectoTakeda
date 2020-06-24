<!-- Modal -->
<div id="IniciarSesion" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Iniciar sesion</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= urlBase ?>Usuario/iniciarSesion" method="POST">
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" name="contrasena" required class="form-control" />
                    </div>

                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>