<span class="dropdown">
    <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        class="btn btn-dark dropdown-toggle dropdown-menu-right">
        <i class="ft-settings"></i>
    </button>
    <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right" x-placement="top-end"
        style="position: absolute; transform: translate3d(0px, 23px, 10px); top: 0px; right: -85px; will-change: transform;">
        <a href="{{ route('dashboard.' . getModel() . '.edit', $row->id) }}" class="dropdown-item primary load-form">
            <i class="fa fa-pencil"></i> @lang('general.edit')
        </a>
        <a href="{{ route('dashboard.' . getModel() . '.show', $row->id) }}" class="dropdown-item info">
            <i class="fa fa-eye "></i> @lang('general.show')
        </a>
        <button class="dropdown-item btn bg-transparent danger btn_action" data-id={{ $row->id }} data-action="destroy">
            <i class="fa fa-trash"></i> @lang('general.delete')
        </button>
    </span>
</span>
