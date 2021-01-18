<span class="dropdown">
    <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-dark dropdown-toggle dropdown-menu-right">
        <i class="ft-settings"></i>
    </button>
    <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right" x-placement="top-end" style="position: absolute; transform: translate3d(0px, 23px, 10px); top: 0px; right: -85px; will-change: transform;">
        <button class="btn bg-transparent danger force_delete dropdown-item btn_action" data-id={{ $row->id }} data-action="delete">
            <i class="fa fa-trash"></i> @lang('general.force_delete')
        </button>
        <button class="btn bg-transparent restore blue dropdown-item btn_action" data-id={{ $row->id }} data-action="restore">
            <i class="fa fa-refresh"></i> @lang('general.restore')
        </button>

        <button class="btn btn-outline-danger btn-min-width btn-glow btn_action">
            <i class="fa fa-trash"></i> @lang('general.force_delete')
        </button>
    </span>
</span>
