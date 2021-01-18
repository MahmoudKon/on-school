<div class="card-header bg-dark">
    <h4 class="card-title white">
        @lang('general.trashed') :  <span class="badge bg-white primary" id="count-trash">{{ $trash }}</span>
    </h4>
    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
    <div class="heading-elements">
        <a href="{{ route('dashboard.' . getModel() . '.index') }}" class="btn btn-primary">
            <i class="fa fa-check-square"></i> @lang('general.' . getModel())
            <span class="badge bg-white info" id="count-exist">{{ $exist }}</span>
        </a>
    </div>
</div>
