<div class="card-header bg-dark">
    <h4 class="card-title white">
        @lang(getModel() . '.model_name') :  <span class="badge bg-white primary" id="count-exist">{{ $exist }}</span>
    </h4>
    <a class="heading-elements-toggle">
        <i class="la la-ellipsis-v font-medium-3"></i>
    </a>
    <div class="heading-elements">
        <span class="dropdown">
            <button id="btnSearchDrop2" data-toggle="dropdown" class="btn btn-light dropdown-toggle dropdown-menu-right">
                <i class="ft-settings"></i>
            </button>
            <span aria-labelledby="btnSearchDrop2" class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; transform: translate3d(0px, 23px, 10px); top: 0px; right: -85px; will-change: transform;">
                <a href="{{ route('dashboard.'.getModel().'.create') }}" class="btn btn-outline-primary btn-glow btn-sm load-form" data-toggle="tooltip" data-original-title="@lang(getModel().'.create')">
                    <b class="fa fa-plus"></b>
                </a>

                <button class="btn btn-outline-warning btn-glow btn-sm" id="reset-btn" data-toggle="tooltip" data-original-title="@lang('general.reset')">
                    <b class="fa fa-undo"></b>
                </button>

                <a href="{{ route('dashboard.users.export', 'excel') }}" class="btn btn-outline-purple btn-glow btn-sm" data-toggle="tooltip" data-original-title="Excel">
                    <b class="fa fa-file-excel"></b>
                </a>

                <button class="btn btn-outline-danger btn-glow btn-sm btn_action" data-action="destroy" data-toggle="tooltip" data-original-title="@lang('general.delete')">
                    <b class="fa fa-trash"></b>
                </button>
            </span>
        </span>

        <a href="{{ route('dashboard.' . getModel() . '.trashed') }}" class="btn btn-danger">
            <i class="fa fa-trash"></i> @lang('general.trashed')
            <span class="badge bg-white danger" id="count-trash">{{ $trash }}</span>
        </a>
    </div>
</div>
