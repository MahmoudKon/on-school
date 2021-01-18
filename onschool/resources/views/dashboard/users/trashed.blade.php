@extends('layouts.dashboard')

@section('pageTitle', 'Users | Trashed')

@section('sub_menu')
    <li class="breadcrumb-item active">
        <a href="{{ route('dashboard.users.index') }}"> <i class="fa fa-users"></i> @lang(getModel() . '.model_name') </a>
    </li>
    <li class="breadcrumb-item active"> <i class="fa fa-trash"></i> @lang('general.trashed') </li>
@endsection

@section('content')

<div class="card">
    @include('dashboard.includes.card-header._trashed')

    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-2">
                <div class="form-group mb-0">
                    <select class="custom-select" id="record-number">
                        <option value=10>10 @lang('general.records')</option>
                        <option value=25>25 @lang('general.records')</option>
                        <option value=50>50 @lang('general.records')</option>
                        <option value='-1'>@lang('general.all_records')</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-primary border-primary white" id="basic-addon7"><i class="la la-search"></i></span>
                    </div>
                    <input type="text" name="search" id="search-text" class="form-control" placeholder="@lang('general.search')">
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="form-group mb-0">
                    <select class="custom-select form-control" id="column-name">
                        <option value="id">@lang('general.id')</option>
                        <option value="username">@lang('users.username')</option>
                        <option value="email">@lang('users.email')</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <button class="btn btn-danger btn-sm" id="reset-btn">reset</button>
                <button class='btn btn-info btn-sm btn_action' data-multi=true data-action='restore' data-toggle="tooltip" data-original-title="Multi Restore">
                    <i class='fa fa-trash-restore'></i>
                </button>
                <button class="btn btn-danger btn-sm btn_action" data-action="delete">soft</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-active table-bordered">
                <thead class="bg-dark white">
                    <tr>
                        <td> <input type="checkbox" id="check-all"> </td>
                        <td data-sort='name'> @lang('users.name') </td>
                        <td data-sort='email'> @lang('users.email') </td>
                        <td data-sort='phone'> @lang('users.phone') </td>
                        <td data-sort='deleted_at' data-order='desc'> @lang('general.deleted_at') </td>
                        <td> @lang('general.action') </td>
                    </tr>
                </thead>
                <tbody id="load_data">

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
