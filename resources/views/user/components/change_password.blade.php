<!-- Cambiar contraseña -->
<div class="col-md-12 subItem">
    <div class="row">
        <div class="col-md-6">
            <h3 class="py-3">Cambiar contraseña</h3>
            <form method="post" action="/change_password" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Contraseña actual</label>
                    <input type="password" class="form-control" id="password"
                        name="password" placeholder="Contraseña" required>
                </div>
                <div class="form-group">
                    <label>Nueva Contraseña:</label>
                    <input type="password" class="form-control" id="new_password"
                        name="new_password" placeholder="Nueva Contraseña" required>
                </div>
                <div class="form-group">
                    <label>Repetir nueva contraseña:</label>
                    <input type="password" class="form-control" id="repeat_new"
                        name="repeat_new" placeholder="Repetir Nueva Contraseña"
                        required>
                </div>
                <br>
                <div class="form-group row pt-2 mb-0">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#cancelarCambiarContraseña">
                            Cancelar
                        </button>
                    </div>
                    <div class="col-md-8 text-right">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Guardar cambios') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.Cambiar contraseña -->