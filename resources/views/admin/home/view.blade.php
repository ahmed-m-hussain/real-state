@extends('admin.layouts.default')
{{--@section('head')--}}
{{--@endsection--}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <strong>
            @if($home->type == 1)
                Home for sale
            @else
                Home for rent
            @endif
            </strong>
        </h1>

    </section>
    <section class="content">
        <div class="box box-primary view_content">

            <div>
                <div class="col-xs-12">

                    <div class="table-responsive">

                        <p class="lead"> <strong>City</strong> -{{$home->city}} </p>
                        <p class="lead"> <strong>Address</strong> -{{$home->address}}</p>
                        <p class="lead"> <strong>Price</strong> - {{$home->price}}</p>
                        <p class="lead"> <strong>Bathroom</strong> - {{$home->bathroom}}</p>
                        <p class="lead"> <strong>Room</strong> - {{$home->room}}</p>
                        <p class="lead"> <strong>Size</strong> - {{$home->size}}</p>
                        <p class="lead"> <strong>Detail</strong> </p>
                        <p class="lead"> {{$home->detail}}</p>
                        <p class="lead"> <strong>Photos</strong> </p>
                        @foreach($home->images as $img)
                            <div class="provider_logo_upload" style="background-image: url('{{asset('images/uploads/'.$img->image)}}')"></div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group back_button_pr">
                    <a href="{{route('home.index')}}" class="btn btn-default btn-flat pull-right back-btn">
                        <i class="fa fa-reply"></i> Back To List
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <style>

        .back-btn{
            margin-bottom: 10px;
            margin-right: 10px;
        }
        .provider_logo_upload {
            width: 200px;
            height: 200px;
            display: inline-block;
            background-size: cover;
            background-position: center;
            margin-left: 5px;
        }
    </style>
@endsection


