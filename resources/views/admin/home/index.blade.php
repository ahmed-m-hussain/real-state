@extends('admin.layouts.default')
@section('content')
    <div class="box box-info">
        <div class="box-header">
            <div class="col-md-12" style="text-align: center">
                @include('admin.partials.message')
            </div>
            <p>
            <h3 class="box-title">Home</h3></p>
            <p class="lead pull-right"><a class="btn btn-block btn-info btn-flat" href="{{url('admin/home/create')}}">Add
                    Home</a></p>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                               aria-describedby="example2_info">
                            <thead>
                            <tr role="row ">
                                <th>#</th>
                                <th class="text-center">City</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Type</th>

                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($homes as $home)
                                <tr role="row" class="odd">
                                    <td>{{$loop->iteration}}</td>
                                    <td class="ui-state-default text-center">{{$home->city}}</td>
                                    <td class="ui-state-default text-center">{{$home->address}}</td>
                                    <td class="ui-state-default text-center">{{$home->price}}</td>
                                    <td class="ui-state-default text-center">
                                        @if($home->type ==1)
                                            Home for sale
                                        @else
                                            Home for rent
                                        @endif
                                    </td>
                                    <td class="ui-state-default text-center">

                                        <div class="btn-group">
                                            <a class="btn btn-info"
                                               href="{{url('admin/home/'.$home->id)}}"
                                            >View</a>
                                            <a class="btn btn-warning"
                                               href="{{url('admin/home/'.$home->id.'/edit')}}"
                                            >Edit</a>
                                        </div>
                                        @include("admin.partials.delete-modal",['id'=>$home->id,'route'=>'home'])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" role="status" aria-live="polite">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" style="text-align: right">
                            <div class="pagination_parent">
                                {{$homes->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
