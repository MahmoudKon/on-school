@if($rows->count() > 0)
    @foreach($rows as $index => $row)
        <tr>
            <td class="check"> {{ $index + 1 }} <input type="checkbox" data-id="{{ $row->id }}"></td>
            <td> {{ $row->username }} </td>
            <td> {{ $row->email }} </td>
            <td> {{ $row->phone }} </td>
            <td> {{ $row->deleted_at !== null ? $row->deleted_at : $row->created_at }} </td>
            <td class="px-0">
                @if (in_url('trashed'))
                    @include('dashboard.includes.table-btn._trashed')
                @else
                    @include('dashboard.includes.table-btn._btn')
                @endif
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="6">
            {!! $rows->links() !!}
        </td>
    </tr>
@else
    <tr>
        <td colspan="6">
            <div class="alert alert-icon-right alert-arrow-right alert-warning alert-dismissible text-center" role="alert">
                <span class="alert-icon"><i class="la la-warning"></i></span>
                <strong>@lang('general.warning')  </strong> @lang('general.no_records')
            </div>
        </td>
    </tr>
@endif
