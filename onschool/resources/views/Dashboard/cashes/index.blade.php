@extends('dashboard.layout.header')

@php

$title = 'cashes';


@endphp

@section('content')
  
    <div class="col-12">
        <div class="card">
        
        <div class="card-header">
            
            <h4 class="card-title"><i class="la la-money"></i>  @lang('site.cash')</h4>
            
            <a class="heading-elements-toggle">
              <i class="la la-ellipsis-v font-medium-3"></i>
            </a>
            
           <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
           </div>
         
        
        <div class="card-content collapse show">
           
            <div class="card-body card-dashboard">
             <div class="row">
             
              <div class="col-2">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                  <i class="ft-plus white"></i> @lang('site.createcash')
                </button>
                @include('dashboard.cashes.create')   
                
              </div>
      
              <div class="col-4">
                <ul class="nav">
           
                  <li class="dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      @lang('site.order')
                    </a>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 39px, 0px); top: 0px; left: 0px; will-change: transform;">
                      <a class="dropdown-item"  href="{{ route($title.'.index', ['order' => 'asc']) }}" >@lang('site.asc')</a>
                      <a class="dropdown-item"  href="{{ route($title.'.index', ['order' => 'desc']) }}" >@lang('site.desc')</a>
                    </div>
                  </li>
                  
                  
                  <li class="dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      @lang('site.pagination')
                    </a>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 39px, 0px); top: 0px; left: 0px; will-change: transform;">
                      <a class="dropdown-item"  href="{{ route($title.'.index', ['number' => '10']) }}" > 10</a>
                      <a class="dropdown-item"  href="{{ route($title.'.index', ['number' => '25']) }}" > 25</a>
                      <a class="dropdown-item"  href="{{ route($title.'.index', ['number' => '50']) }}" > 50</a>
                      <a class="dropdown-item"  href="{{ route($title.'.index', ['number' => '100']) }}" > 100</a>
                      <a class="dropdown-item"  href="{{ route($title.'.index') }}" > @lang('site.All')</a>
                  
                    </div>
                  </li>
                </ul>   
              </div>
              
              <div class="col-2">
                <form action="{{ route('multidelete.cashes') }}" method="get" >
                  @csrf
                  <input type="hidden" class="form-control" id="multi-ID" name="ids">
                  
                  <button type="button" class="btn btn-danger" id="multidelete">@lang('site.multidelete')</button>
                </form>
              </div>
              
              
             </div>
             
            
            </div>
            
       
            
            <div class="card-body">
            
             <div class="table-responsive">
                
              <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>@lang('site.wages')</th>
                    <th>@lang('site.purchases')</th>
                    <th>@lang('site.sales')</th>
                    <th>@lang('site.pettycash')</th>
                    <th>@lang('site.created')</th>
                    <th>@lang('site.updated')</th>
                    <th>@lang('site.control')</th>
                    
                    </tr>
                </thead>
               @if($cashes->count() > 0) 
                <tbody class="cont-data">
                @foreach($cashes as $index=>$cash)
                  @include('dashboard.cashes.row')
                 @endforeach   
                 
                </tbody>
                @else
                <tr>
                    <td colspan="15">
                        <h2 class="text-center  alert-danger"><i class="fa fa-frown-o"></i> @lang('validation.sorry_not_found_data')</h2>
                    </td>
                </tr>
               @endif  
              </table>
              
               @include('dashboard.cashes.edit')       
                
             </div>
            
            </div>
            
        </div>
        
        <div class="row">
         <div class="col-sm-12 col-md-5">
          <div class="dataTables_info" id="users-contacts_info" role="status" aria-live="polite">

          </div>
         </div>
         <div class="col-sm-12 col-md-7">
          <div class="dataTables_paginate paging_simple_numbers" id="users-contacts_paginate">
           <ul class="pagination">
            {!! $cashes->links() !!}

           </ul>
           </div>
           </div>
           </div>
        </div>
    </div>
  
@endsection