@extends('admin/layouts/default')

@section('title')
Transactions
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Transactions</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Transactions</li>
        <li class="active">Transactions List</li>
    </ol>
</section>

<section class="content">
<div class="container">
    <div class="row">
     <div class="col-12">
     @include('flash::message')
        <div class="card border-primary ">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title float-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Transactions List
                </h4>
                <div class="float-right">
                    <a href="{{ route('admin.transaction.transactions.create') }}" class="btn btn-sm btn-secondary"><span class="fa fa-plus"></span> @lang('button.create')</a>
                </div>
            </div>
            <br />
            <div class="card-bo@extends('admin/layouts/default')

            {{-- Page title --}}
            @section('title')
            Transaction List
            @parent
            @stop
            
            {{-- page level styles --}}
            @section('header_styles')
                <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}"/>
                <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/colReorder.bootstrap4.css') }}"/>
                <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}"/>
                <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/rowReorder.bootstrap4.css') }}"/>
                <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/scroller.bootstrap4.css') }}">
                <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/tables.css') }}" />
            
                <style>
            
                    #table1_filter{
                        margin-bottom: 10px;
                    }
            
                </style>
            @stop
            
            {{-- Page content --}}
            @section('content')
            
            <section class="content-header">
            
                            <!--section starts-->
                            <h1>Transactions List</h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{ route('admin.dashboard') }}">
                                        <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Transactions</a>
                                </li>
                                <li class="active">All Transactions List</li>
                            </ol>
                        </section>
                        <!--section ends-->
                        <section class="content pl-3 pr-3">
                            <div class="row">
                                <div class="col-lg-12 my-3">
                                    <div class="card filterable">
                                        <div class="card-header bg-primary text-white clearfix  ">
                                            <div class="float-left">
                                                   <div class="caption">
                                                <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                                Transactions List
                                            </div>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
                                            <table class="table table-striped table-bordered" id="table1" width="100%">
                                                @include('admin.transaction.transactions.table')
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <!-- /.modal ends here -->
                        </section>
                        <!-- content -->
            
                @stop
            
            {{-- page level scripts --}}
            @section('footer_scripts')
            
                <script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}" ></script>
                <script type="text/javascript" src="{{ asset('vendors/jeditable/js/jquery.jeditable.js') }}" ></script>
                <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}" ></script>
                <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.buttons.js') }}" ></script>
                <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.colReorder.js') }}" ></script>
                <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.responsive.js') }}" ></script>
                <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.rowReorder.js') }}" ></script>
                <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.colVis.js') }}" ></script>
                <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.html5.js') }}" ></script>
                <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.print.js') }}" ></script>
                <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.bootstrap4.js') }}" ></script>
                <script type="text/javascript" src="{{ asset('vendors/datatables/js/pdfmake.js') }}" ></script>
                <script type="text/javascript" src="{{ asset('vendors/datatables/js/vfs_fonts.js') }}" ></script>
                <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.scroller.js') }}" ></script>
                <script type="text/javascript" src="{{ asset('js/pages/table-advanced.js') }}" ></script>
            @stop
            dy table-responsive">
                 @include('admin.transaction.transactions.table')
                 
            </div>
        </div>
        </div>
 </div>
 </div>
</section>
@stop
