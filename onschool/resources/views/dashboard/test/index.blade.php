@extends('layouts.dashboard')

@section('pageTitle', 'Users')

@section('sub_menu')
    <li class="breadcrumb-item active"> <i class="fa fa-users"></i> @lang(getModel() . '.model_name') </li>
@endsection

@section('content')
    <div class="card">
        @include('dashboard.includes.card-header._header')
        <a class="btn btn-primary load_form" href="{{ route('dashboard.users.import') }}">
            <i class="fa fa-file-excel-o"></i> Import
        </a>

        <div class="card-body">
            <div class="table-responsive">
                {!! $dataTable->table([
                    'class' => 'table table-striped table-bordered table-hover dom-positioning dataTable'
                ], true) !!}
            </div>
        </div>
    </div>
@endsection

