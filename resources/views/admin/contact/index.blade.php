@extends('admin.layouts.default')
@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-info">
            <div class="col-md-12" style="text-align: center">
                @include('admin.partials.message')
            </div>
            <div class="box-header with-border">
                <h3 class="box-title">Update Contact</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form action="{{url('/admin/contact/update/'.$contact->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group ">

                         {!! Form::label('country', 'Country name:') !!}
                         {!! Form::text('country', $contact->country, ['class'=>'form-control', 'placeholder'=>'Country', 'id'=>'country']) !!}
                         <div>
                             @if($errors->has('country'))
                                 <span class="help-block">
                                       <strong>{{$errors->first('country')}}</strong>
                                 </span>
                             @endif
                         </div>
                        {!! Form::label('city', 'City name:') !!}
                        {!! Form::text('city', $contact->city, ['class'=>'form-control', 'placeholder'=>'City', 'id'=>'city']) !!}
                        <div>
                            @if($errors->has('city'))
                                <span class="help-block">
                                       <strong>{{$errors->first('city')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('address', 'Address:') !!}
                        {!! Form::text('address', $contact->address, ['class'=>'form-control', 'placeholder'=>'Address', 'id'=>'address']) !!}
                        <div>
                            @if($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{$errors->first('address')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::text('email', $contact->email, ['class'=>'form-control', 'placeholder'=>'Email', 'id'=>'email']) !!}
                        <div>
                            @if($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{$errors->first('email')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('phone', 'Phone number:') !!}
                        {!! Form::text('phone', $contact->phone, ['class'=>'form-control', 'placeholder'=>'Phone', 'id'=>'phone']) !!}
                        <div>
                            @if($errors->has('phone'))
                                <span class="help-block">
                                        <strong>{{$errors->first('phone')}}</strong>
                                 </span>
                            @endif
                        </div>

                    </div>

                        <div class="form-group col-xs-12" style="margin-top: 20px">
                            <button type="submit" class="btn btn-success btn-flat">
                               <i class="fa fa-edit"></i> Update

                            </button>
                            <a href="{{route('admin.home')}}" class="btn btn-default btn-flat pull-right">
                                <i class="fa fa-reply"></i> Back To List
                            </a>
                        </div>
                 </form>

             </div>
        <!-- /.box-body -->
        </div>
    </div>


@endsection

@section('scripts')

    <script>

    </script>
@endsection

@section('styles')
    <style>
        .help-block{
            color: red;
        }
    </style>
@endsection

