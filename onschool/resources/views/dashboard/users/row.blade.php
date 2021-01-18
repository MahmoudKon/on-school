<td class="check-item"> <input type="checkbox" class="check-box-id" name="id[]" value="{{ $row->id }}"></td>
<td> {{ $row->username }} </td>
<td> {{ $row->email }} </td>
<td> {{ $row->phone }} </td>
<td> {{ $row->deleted_at !== null ? $row->deleted_at : $row->created_at }} </td>
<td>
    @if (in_url('trashed'))
        @include('dashboard.includes.table-btn._trashed')
    @else
        @include('dashboard.includes.table-btn._btn')
    @endif
</td>
