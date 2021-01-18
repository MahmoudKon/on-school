<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="@lang('site.name')" value="{{ $row->username ?? '' }}">
            <span id="username_error" class="red error"></span>
        </div>

        <!-- Email Input -->
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="@lang('site.email')" value="{{ $row->email ?? '' }}">
            <span id="email_error" class="red error"></span>
        </div>

        <!-- Phone Input -->
        <div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="@lang('site.phone')" value="{{ $row->phone ?? '' }}">
            <span id="phone_error" class="red error"></span>
        </div>

        <!-- Password Input -->
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="@lang('site.password')">
            <span id="password_error" class="red error"></span>
        </div>

        <!-- Confirmed Password Input -->
        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('site.password_confirmation')">
        </div>
    </div>

    <div class="col-md-4">
        <!-- Image Input -->
        <div class="form-group">
            <div id="image">
                <input type="file" name="image" class="form-control image" placeholder="@lang('site.image')">
                <img src="{{ $row->image_path ?? asset('uploads/default/default.png') }}" class="img-border img-thumbnail">
            </div>
            <span id="image_error" class="red error"></span>
        </div>
    </div>
</div>
