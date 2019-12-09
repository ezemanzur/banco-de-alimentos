<!-- Alertas -->
<div class="row justify-content-center">
    <div class="col-md-9">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check-circle mr-2"></i>asd{{ Session::get('success') }}</strong>
                <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-exclamation-circle mr-2"></i>{{ Session::get('error') }}</strong>
                <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
</div>
<!-- /.Alertas -->