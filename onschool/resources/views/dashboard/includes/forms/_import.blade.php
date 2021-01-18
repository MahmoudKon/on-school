<div class="alert alert-blue-grey mb-2" role="alert">
    <span class="white">Select The Excel File and Make Import .</span>
</div>
<form class="form" action="{{ route('dashboard.users.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="input-group">
        <input type="file" name="file" class="form-control">
        <div class="input-group-prepend">
            <button type="submit" class="btn btn-primary bg-primary border-primary">
                <i class="fa fa-upload"></i>
            </button>
        </div>
    </div>
    <span id="file_error" class="red error"></span>
</form>
<div id="message"></div>
