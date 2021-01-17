<div class="table-responsive">
                
 <table class="table">
    @if($users->count() > 0)
 
            <tbody class="cont-data">
            @foreach($users as $user)
            <tr id="{{ $user->id }}">
                <td class="reorder sorting_1">
                    <div class="icheckbox_square-blue" style="position: relative;">
                    <input type="checkbox" class="input-chk" style="position: absolute; ">         
                    </div>
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    
                    <img src ="{{ asset($user->image_path) }}" class="img-thumbnail img-fluid">    
                </td>
                <td>{{ $user->role }}</td>
                
                <td>
                
                    <div class="btn-group" role="group"  aria-label="Basic example">
                    <a style="color: white" class="btn btn-primary">@lang('site.show')</a>

                    <button  type="button" data-toggle="modal"
                            data-target="#exampleModal" 
                            data-url="{{route('users.edit', $user->id)}}" 
                            class="btn btn-success edituser">@lang('site.edit')</button>
                            
                    <button  class="btn btn-danger deluser" data-url="{{ route('delete.user', $user->id) }}">@lang('site.delete')</button>
                    
                    
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