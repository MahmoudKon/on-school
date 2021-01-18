<div class="card">
    <div id="message"></div>
    <form class="form" action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('post') }}

        @include('dashboard.users._form')

        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
        </div>

    </form><!-- end of form -->
</div>

