
    <td class="reorder sorting_1">
      <div class="icheckbox_square-blue" style="position: relative;">
       <input type="checkbox" class="input-chk" style="position: absolute; ">         
      </div>
    </td>
    <td>{{ $user->name }}</td>
    <td><i class="la la-{{ $category->font}}"></i></td>
    
      <div class="btn-group" role="group"  aria-label="Basic example">
        <a style="color: white" class="btn btn-primary">@lang('site.show')</a>

        <button  type="button" data-toggle="modal"
                data-target="#exampleModal" 
                data-url="{{route('categories.edit', $user->id)}}" 
                class="btn btn-success editcategory">@lang('site.edit')</button>
                
        <button  class="btn btn-danger delcategory" data-url="{{ route('delete.category', $category->id) }}">@lang('site.delete')</button>
      
      
      </div>
    </td>
   