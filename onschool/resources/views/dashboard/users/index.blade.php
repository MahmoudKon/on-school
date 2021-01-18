@extends('layouts.dashboard')

@section('pageTitle', __('general.users'))

@section('sub_menu')
    <li class="breadcrumb-item active"> <i class="fa fa-users"></i> @lang('general.users') </li>
@endsection

@section('content')

<div class="card">
    @include('dashboard.includes.card-header._header')
    <div class="card-body">
        <div class="d-flex justify-content-around">
            <div class="flex-grow-1">
                <div class="form-group mb-0">
                    <select class="custom-select" id="record-number">
                        <option value=10>10 @lang('general.records')</option>
                        <option value=25>25 @lang('general.records')</option>
                        <option value=50>50 @lang('general.records')</option>
                        <option value='-1'>@lang('general.all_records')</option>
                    </select>
                </div>
            </div>
            <div class="flex-grow-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-primary border-primary white" id="basic-addon7"><i class="la la-search"></i></span>
                    </div>
                    <input type="text" name="search" id="search-text" class="form-control" placeholder="@lang('general.search')">
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="form-group mb-0">
                    <select class="custom-select form-control" id="column-name">
                        <option value="id">@lang('general.id')</option>
                        <option value="username">@lang('users.username')</option>
                        <option value="email">@lang('users.email')</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-active table-bordered">
                <thead class="bg-dark white">
                    <tr>
                        <td> <input type="checkbox" id="check-all"> </td>
                        <td data-sort='username'> @lang('users.username') </td>
                        <td data-sort='email'> @lang('users.email') </td>
                        <td data-sort='phone'> @lang('users.phone') </td>
                        <td data-sort='created_at' data-order='desc'> @lang('general.created_at') </td>
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
