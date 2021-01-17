<tr id="{{ $cash->id }}">
    <td class="reorder sorting_1">
      <div class="icheckbox_square-blue" style="position: relative;">
       <input type="checkbox" name="multidelete[]" id="check" class="form-control-checkbox input-chk" value="{{ $cash->id }}" style="position: absolute; ">         
      </div>
    </td>
    <td>{{ $cash->wages }}</td>
    <td>{{ $cash->purchases }}</td>
    <td>{{ $cash->sales }}</td>
    <td>{{ $cash->pettycash }}</td>
    <td>{{ $cash->created_at->diffForHumans() }}</td>
    <td>{{ $cash->updated_at }}</td>
    
    <td>
    
      <div class="btn-group" role="group"  aria-label="Basic example">
        <a style="color: white" class="btn btn-primary">@lang('site.show')</a>

        <button  type="button" data-toggle="modal"
                data-target="#exampleModal" 
                data-url="{{route('cashes.edit', $cash->id)}}" 
                class="btn btn-success editcash">@lang('site.edit')</button>
                
        <button  class="btn btn-danger delcash" data-url="{{ route('delete.cash', $cash->id) }}">@lang('site.delete')</button>
      
      
      </div>
    </td>
    
  
</tr>