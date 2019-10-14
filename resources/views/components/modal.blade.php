<!-- Modal -->
<div class="modal fade" id="{{ $modal_id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $modal_id }}Label"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="logOutModalLabel">{{ $mainTitle }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-left">
            <div class="row px-5 py-2">
                <span class="col-md-2 text-center py-1">
                    <i class="{{ $mainIcon }} big-icon"></i>
                </span>
                <span class="col-md-10">
                    <h6>{{ $mainContent }}</h6>
                </span>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ $cancelLink }}" class="btn btn-n btn-outline-danger">{{$cancel}}</a>
            <button type="button" class="btn btn-primary" data-dismiss="modal">{{$accept}}</button>
        </div>
        </div>
    </div>
</div>