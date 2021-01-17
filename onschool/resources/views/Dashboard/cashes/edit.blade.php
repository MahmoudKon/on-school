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

            <form  id="updatecash" data-url="{{ route('update.cash')}}">
                @csrf
                
                <div class="row">
                  <input type="hidden" id="id"  name="id">
                
                    <div class="form-group col-6 mb-2">
                      <label>@lang('site.wages')</label>
                      <input type="number" class="form-control" placeholder=@lang('site.wages') id="wages"  name="wages" min="1000" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="wages">
                      <span class="wages-error alert"></span> 
                    </div>
                         
                    <div class="form-group col-6 mb-2">
                      <label>@lang('site.purchases')</label>
                      <input type="number" class="form-control" placeholder=@lang('site.purchases') id="purchases" name="purchases" min="1000" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="purchases">
                      <span class="purchases-error alert"></span> 
                    </div>
                    
                    
                    <div class="form-group col-6 mb-2">
                      <label>@lang('site.sales')</label>
                      <input type="number" class="form-control" placeholder=@lang('site.sales') id="sales" name="sales" min="1000" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="sales">
                      <span class="sales-error alert"></span> 
                    </div>
                    
                    
                    <div class="form-group col-6 mb-2">
                      <label>@lang('site.pettycash')</label>
                      <input type="number" class="form-control" placeholder=@lang('site.pettycash') id="pettycash" name="pettycash" min="1000" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="pettycash">
                      <span class="pettycash-error alert"></span> 
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
  
  @push('js')
   <script>
   
 //________________________ UPDATE USER______________________________
 
 

   </script>   
  @endpush