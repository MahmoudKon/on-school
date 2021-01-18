<div class="card p-0 m-0">
    <div id="message"></div>
    <form class="form" action="{{ route('dashboard.users.update', $row) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}

        <input type="hidden" name="id" value="{{ $row->id }}">

        @include('dashboard.users._form')

        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
        </div>

    </form><!-- end of form -->
</div>

