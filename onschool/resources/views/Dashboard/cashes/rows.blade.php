<div class="table-responsive">
                
 <table class="table">
    @if($cashes->count() > 0)
 
            <tbody class="cont-data">
            @foreach($cashes as $cash)
            <tr id="{{ $cash->id }}">
                <td class="reorder sorting_1">
                    <div class="icheckbox_square-blue" style="position: relative;">
                    <input type="checkbox" class="input-chk" style="position: absolute; ">         
                    </div>
                </td>
                <td>{{ $cash->wages }}</td>
                <td>{{ $cash->purchases }}</td>
                <td>{{ $cash->sales }}</td>
                <td>{{ $cash->pettycash }}</td>
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

            @endforeach

            </tbody>


 @else
 <tr>
     <td colspan="15">
         <h2 class="text-center  alert-danger"><i class="fa fa-frown-o"></i> @lang('validation.sorry_not_found_data')</h2>
     </td>
 </tr>
  @endif  
  
    </table>
</div>    