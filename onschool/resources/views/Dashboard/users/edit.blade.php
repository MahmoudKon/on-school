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

            <form  id="updateuser" enctype="multipart/form-data" data-url="{{ route('update.user')}}">
                @csrf
                
                <div class="row">
                  <input type="hidden" id="id"  name="id">
                
                    <div class="form-group col-6 mb-2">
                      <label>@lang('site.name')</label>
                      <input type="text" class="form-control" placeholder=@lang('site.name') id="name" name="name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="name">
                      <span class="name-error alert"></span>
                    
                      
                    </div>
                    
                    <div class="form-group col-6 mb-2">
                        <label>@lang('site.email')</label>
                        <input type="email" class="form-control " id="email" placeholder=@lang('site.email') name="email" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="email">
                         <span class="email-error alert"></span>
                      
                        
                    </div>
                      
                      <div class="form-group col-6 mb-2">
                        <label>@lang('site.password')</label>
                        <i class="la la-eye-slash show-pass"></i>
                      
                        <input type="password"  class="form-control password" placeholder=@lang('site.password')  name="password"  minlength="8" maxlength="20" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="password">
                         <span class="password-error alert"></span>
                        
                      </div>
                      
                      
                      <div class="form-group col-6 mb-2">
                        <label>@lang('site.role')</label>
                        <input type="text" class="form-control" id="role"  placeholder=@lang('site.role') name="role" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="role">
                         <span class="role-error alert"></span>
                      
                      
                    </div>
                      
                      
                    <div class="form-group col-12 mb-2">
                      <label>@lang('site.image')</label>
                      <input type="file" class="form-control  image" id="file"   name="image"  data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="image">   
                      <span class="role-error alert"></span>
                    </div>
                     
                    <div class="col-12" id="image">
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