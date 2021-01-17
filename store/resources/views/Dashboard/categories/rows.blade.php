<div class="table-responsive">
                
 <table class="table">
    @if($categories->count() > 0)
 
            <tbody class="cont-data">
            @foreach($categories as $category)
            <tr id="{{ $category->id }}">
                <td class="reorder sorting_1">
                    <div class="icheckbox_square-blue" style="position: relative;">
                    <input type="checkbox" class="input-chk" style="position: absolute; ">         
                    </div>
                </td>
                <td>{{ $category->name }}</td>
                <td><i class="la la-{{ $category->font}}"></i></td>
                
                <td>
                
                    <div class="btn-group" role="group"  aria-label="Basic example">
                    <a style="color: white" class="btn btn-primary">@lang('site.show')</a>

                    <button  type="button" data-toggle="modal"
                            data-target="#exampleModal" 
                            data-url="{{route('categories.edit', $category->id)}}" 
                            class="btn btn-success editcategory">@lang('site.edit')</button>
                            
                    <button  class="btn btn-danger delcategory" data-url="{{ route('delete.category', $category->id) }}">@lang('site.delete')</button>
                    
                    
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