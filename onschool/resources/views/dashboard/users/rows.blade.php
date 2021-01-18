@if($rows->count() > 0)
    @foreach($rows as $index => $row)
    <tr data-id={{ $row->id }}>
        @include('dashboard.users.row')
    </tr>
    @endforeach
    <tr>
        <td colspan="6" class="p-0">
            {!! $rows->links() !!}
        </td>
    </tr>
@else
    <tr>
        <td colspan="6">
            <div class="alert alert-icon-right alert-arrow-right alert-warning alert-dismissible text-center" role="alert">
                <span class="alert-icon"><i class="la la-warning"></i></span>
                <strong>@lang('alerts.warning')  </strong> @lang('alerts.no_records')
            </div>
        </td>
    </tr>
@endif
