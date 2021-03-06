@extends('layouts.admins.app')

@include('layouts.admins.breadcumb')

@section('content')

<div id="userListController" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        {{ Breadcrumbs::render('user') }}
        <br>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert bg-{{session()->get('status')}}">
                {{ session()->get('message') }}
                <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a>
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('lang.listOfUserRegistration')
                    <span class="pull-right">
                        <a class="btn btn-success" href='{{route('admin.category.create')}}'>
                            {{'Tambah category'}}
                        </a>
                    </span> 

                </div>

                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <div class="main-chart" id="line-chart" >
                           <!--<table data-toggle="table" data-show-refresh="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="id" data-sort-order="asc" class="table table-bordered">-->
                            <table id="myTable" class="table cell-border hover row-border">
                                <thead>
                                    <tr>
                                        <th data-field="id">No</th>
                                        <th data-field="name" >Name</th>
                                        <th data-field="email" >Code</th>
                                        <th data-field="action"  >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $value)
                                    <tr>
                                        <td>{{$listNomor++}}</td>
                                        <td>{{object_get($value, 'name')}}</td>
                                        <td>{{object_get($value, 'code')}}</td>
                                        <td>
                                            <a href="#"
                                               onclick="detailModel('{{object_get($value, 'code')}}')"
                                               data-username="{{object_get($value, 'code')}}"
                                               data-url="{{url('admin/categories/detail/')}}/"
                                               data-toggle="modal" 
                                               data-target="#exampleModalCenter" >
                                                <span class="label label-warning">
                                                    Detail
                                                </span>
                                            </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th data-field="id">No</th>
                                        <th data-field="name" >Name</th>
                                        <th data-field="email" >Code</th>
                                        <th data-field="action"  >Action</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div id="testerr"></div>
</div>	<!--/.main-->

<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--            <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLongTitle">Detail Profile</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>-->

            <div style="display: block" class="modal-body">

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
@endsection
