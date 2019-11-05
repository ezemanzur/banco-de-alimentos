<!-- Solicitar baja de cuenta -->
<div class="col-md-12 subItem">
    @if(count($requests) == 0)
        <h3 class="py-3">Solicitar dar de baja la cuenta</h3>
        <form method="post" action="unsubscribe/request">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <p>Puedes solicitar dar de baja tu cuenta como donante en con el siguiente botón.</p>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-danger m-0">Solicitar baja</button>
                </div>
            </div>
        </form>
    @else
        <div class="row py-4">
            <div class="col-md-12">
                <div class="alert bg-notify-down p-4" role="alert">
                    <h5>Ya se ha solicitado la baja, pronto recibirá una respuesta al email con el que se encuentra registrado.</h5>
                    <div class="row justify-content-center mt-2">
                        <i class="fas fa-envelope big-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- Solicitar baja de cuenta -->