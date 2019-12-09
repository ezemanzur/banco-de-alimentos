<!-- Alertas -->
<div id="alert-success" class="alert-fixed">
    @if(Session::has('success'))
        <div class="py-4 alert alert-success alert-dismissible fade show" role="alert">
            <strong><i class="fas fa-check-circle mr-2"></i>{{ Session::get('success') }}</strong>
            <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
<div id="alert-danger" class="alert-fixed">
    @if(Session::has('error'))
        <div class="py-4 alert alert-danger alert-dismissible fade show" role="alert">
            <strong><i class="fas fa-exclamation-circle mr-2"></i>{{ Session::get('error') }}</strong>
            <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
<!-- /.Alertas -->

<script>
    $("#alert-success").fadeTo(3000, 500).slideUp(500, function(){
        $("#alert-success").hide(500);
    });
    $("#alert-danger").fadeTo(3000, 500).slideUp(500, function(){
        $("#alert-danger").slideUp(500);
    });
</script>