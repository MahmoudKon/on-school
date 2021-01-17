<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">@lang('site.add')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul id="error" class="list-unstyled"></ul>

            <form  id="addcategory"  data-url="{{ route($title.'.store') }}">
                @csrf
                
                <div class="row">
                    <div class="form-group col-6 mb-2">
                      <label>@lang('site.name')</label>
                      <input type="text" class="form-control " placeholder=@lang('site.name') name="name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="name">
                      <span class="name-error alert"></span>
                      
                    </div>
                    
                    <div class="form-group col-6 mb-2">
                        <label>@lang('site.font')</label>
                        <input type="text" class="form-control " placeholder=@lang('site.font') name="font" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="font">
                         <span class="font-error alert"></span>  
                    </div>
                      
                  
                </div>
                
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                          <i class="ft-x"></i> @lang('site.cancel')
                        </button>
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> @lang('site.save')
                        </button>
                    </div>
                     
            </form>
                
                        
        </div>
        
      </div>
    </div>
  </div>
  