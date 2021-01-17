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

            <form  id="adduser" enctype="multipart/form-data" data-url="{{ route('users.store') }}">
                @csrf
                
                <div class="row">
                    <div class="form-group col-6 mb-2">
                      <label>@lang('site.name')</label>
                      <input type="text" class="form-control  @error('name') is-invalid @enderror" placeholder=@lang('site.name') name="name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="name">
                      <span class="name-error alert"></span>
                    
                      @error('name')
                      <span class="invalid-feedback"  role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      
                    </div>
                    
                    <div class="form-group col-6 mb-2">
                        <label>@lang('site.email')</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder=@lang('site.email') name="email" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="email">
                         <span class="email-error alert"></span>
                      
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        
                    </div>
                      
                      <div class="form-group col-6 mb-2">
                        <label>@lang('site.password')</label>
                        <i class="la la-eye-slash show-pass"></i>
                      
                        <input type="password"   class="form-control password  @error('password') is-invalid @enderror" placeholder=@lang('site.password')  name="password"  minlength="8" maxlength="20" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="password">
                         <span class="password-error alert"></span>
                      
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        
                      </div>
                      
                      <div class="form-group col-6 mb-2">
                        <label>@lang('site.password_confirmation')</label>
                        <input type="password" id="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" placeholder=@lang('site.password_confirmation') name="password_confirmation" minlength="8" maxlength="20" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="password_confirmation">
                         <span class="password_confirmation-error alert"></span>
                      
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        
                      </div>
                      
                      <div class="form-group col-6 mb-2">
                        <label>@lang('site.role')</label>
                        <input type="text" class="form-control  @error('role') is-invalid @enderror " placeholder=@lang('site.role') name="role" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="role">
                         <span class="role-error alert"></span>
                      
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        
                    </div>
                      
                      
                    <div class="form-group col-6 mb-2">
                        <label>@lang('site.image')</label>
                        <input type="file" class="form-control  @error('image') is-invalid @enderror image" placeholder=@lang('site.image') name="image"  data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="image">
                        <span class="role-error alert"></span>
                      
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                           
                    </div>
                     
                    <div class="col-sm-6">
                        <img src="{{asset('uploads/defualt.png')}}" class="image-preview" height="120px" width="250px">
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
  