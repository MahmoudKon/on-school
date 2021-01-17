<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">@lang('site.edit')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul id="error" class="list-unstyled"></ul>

            <form  id="updatecat"  data-url="{{ route('update.category')}}">
                @csrf
                
                <div class="row">
                  <input type="hidden" id="id"  name="id">
                
                    <div class="form-group col-6 mb-2">
                      <label>@lang('site.name')</label>
                      <input type="text" class="form-control" placeholder=@lang('site.name') id="name" name="name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="name">
                      <span class="name-error alert"></span>
                    
                      
                    </div>
                    
                    <div class="form-group col-6 mb-2">
                        <label>@lang('site.font')</label>
                        <input type="text" class="form-control " id="font" placeholder=@lang('site.font') name="font" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="font">
                         <span class="font-err alert"></span>
                      
                        
                    </div>
                      
                   
                   
                </div>
                
                
        
                    <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                          <i class="ft-x"></i> @lang('site.cancel')
                        </button>
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> @lang('site.update')
                        </button>
                    </div>
                     
            </form>
                
                        
        </div>
        
      </div>
    </div>
  </div>
  