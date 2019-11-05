<!-- Modificar perfil -->
<div class="col-md-12 subItem">
    <!-- Información donante -->
    <form method="POST" action="/change_giver_profile">
        @csrf
        <div class="row">
            @if($user->rol == "giver")
                @include('user.components.change_giver_data')
                @php $colsize = "col-md-12" @endphp
            @endif
                @include('user.components.change_user_data')
                @php $colsize = "col-md-6" @endphp
        </div>
        <div class="row">
            <!-- Botones -->
            <div class="{{ $colsize }}">
                <div class="form-group row pt-3 mb-0">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#cancelarModificarPerfil">
                            {{ __('Cancelar') }}
                        </button>
                    </div>
                    <div class="col-md-8 text-right">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Guardar cambios') }}
                        </button>
                    </div>
                </div>
            </div>
            <!-- Botones -->
        </div>
    </form>
</div>
<!-- /Modificar perfil -->