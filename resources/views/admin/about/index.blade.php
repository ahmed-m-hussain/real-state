@extends('admin.layouts.default')
@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="box box-info">
            <div class="col-md-12" style="text-align: center">
                @include('admin.partials.message')
            </div>
            <div class="box-header with-border">
                <h3 class="box-title">Update About info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form action="{{url('/admin/about/update/'.$about->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group ">

                        {!! Form::label('page_title_en', ' Page title EN:') !!}
                        {!! Form::text('page_title_en', $about->page_title_en, ['class'=>'form-control', 'placeholder'=>'Page title EN', 'id'=>'page_title_en']) !!}
                        <div>
                            @if($errors->has('page_title_en'))
                                <span class="help-block">
                                       <strong>{{$errors->first('page_title_en')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('text_title_en', 'Text title EN:') !!}
                        {!! Form::text('text_title_en', $about->text_title_en, ['class'=>'form-control', 'placeholder'=>'Text title EN', 'id'=>'text_title_en']) !!}
                        <div>
                            @if($errors->has('text_title_en'))
                                <span class="help-block">
                                       <strong>{{$errors->first('text_title_en')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('description_en', 'Description EN:') !!}
                        {!! Form::textarea('description_en', $about->description_en, ['class'=>'form-control']) !!}

                        <div>
                            @if($errors->has('description_en'))
                                <span class="help-block">
                                        <strong>{{$errors->first('description_en')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('page_title_it', 'Page title IT:') !!}
                        {!! Form::text('page_title_it', $about->page_title_it, ['class'=>'form-control', 'placeholder'=>'Page title IT', 'id'=>'page_title_it']) !!}
                        <div>
                            @if($errors->has('page_title_it'))
                                <span class="help-block">
                                        <strong>{{$errors->first('page_title_it')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('text_title_it', 'Text title IT:') !!}
                        {!! Form::text('text_title_it', $about->text_title_it, ['class'=>'form-control', 'placeholder'=>'Text title IT', 'id'=>'text_title_it']) !!}
                        <div>
                            @if($errors->has('text_title_it'))
                                <span class="help-block">
                                        <strong>{{$errors->first('text_title_it')}}</strong>
                                 </span>
                            @endif
                        </div>


                        {!! Form::label('description_it', 'Description IT:') !!}
                        {!! Form::textarea('description_it', $about->description_it, ['class'=>'form-control']) !!}

                        <div>
                            @if($errors->has('description_it'))
                                <span class="help-block">
                                        <strong>{{$errors->first('description_it')}}</strong>
                                 </span>
                            @endif
                        </div>

                        {!! Form::label('page_title_de', 'Page title DE:') !!}
                        {!! Form::text('page_title_de', $about->page_title_de, ['class'=>'form-control', 'placeholder'=>'Page title DE', 'id'=>'page_title_de']) !!}
                        <div>
                            @if($errors->has('page_title_de'))
                                <span class="help-block">
                                        <strong>{{$errors->first('page_title_de')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('text_title_de', 'Text title DE:') !!}
                        {!! Form::text('text_title_de', $about->text_title_de, ['class'=>'form-control', 'placeholder'=>'Text title DE', 'id'=>'text_title_de']) !!}
                        <div>
                            @if($errors->has('text_title_de'))
                                <span class="help-block">
                                        <strong>{{$errors->first('text_title_de')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('description_de', 'Description DE:') !!}
                        {!! Form::textarea('description_de', $about->description_de, ['class'=>'form-control']) !!}

                        <div>
                            @if($errors->has('description_de'))
                                <span class="help-block">
                                        <strong>{{$errors->first('description_de')}}</strong>
                                 </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('', 'Founders') !!}
                        @if(isset($about->founders[0]))
                            <div class="input-group-addon " style="text-align: right">
                                <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                            </div>
                        @endif
                        @if(isset($about->founders[0]))
                            @foreach($about->founders as $founder)
                                <div class="form-group fieldGroup " style="display: block;">
                                    <div class="input-group">
                                        <div class="col-xs-12" style="border: 1px solid #d2d6de; padding: 9px">
                                            <div class="provider_logo_upload" id="blah_back{{$founder->id}}"  style="background-image: url('{{asset('images/uploads/'.$founder->avatar)}}')">
                                                <label for="image" class="imageLabel"></label>
                                            </div>
                                            <input  type="file" id="image"
                                                   accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                   name="avatar_image[]" onchange="readURLSetAvatarImage(this,{{$founder->id}});"
                                                   class="file_size">
                                            @if ($errors->has('avatar'))
                                                <span class="help-block">
                                                   <strong>{{ $errors->first('avatar') }}</strong>
                                               </span>
                                            @endif

                                        </div>
                                        <input type="text" name="first_name[]" required value="{{$founder->first_name}}" class="form-control" placeholder="First name"/>
                                        <input type="text" name="last_name[]" required value="{{$founder->last_name}}" class="form-control" placeholder="Last name"/>

                                        <input type="text" name="specialty_en[]" required value="{{$founder->specialty_en}}" class="form-control" placeholder="Specialty EN"/>
                                        <input type="text" name="position_en[]" required value="{{$founder->position_en}}" class="form-control" placeholder="Position DE"/>

                                        {!! Form::textarea('expert_info_en[]', $founder->expert_info_en, ['class'=>'form-control','rows' => 3,'placeholder'=>'Founder info EN', 'required']) !!}

                                        <input type="text" name="specialty_it[]" required value="{{$founder->specialty_it}}" class="form-control" placeholder="Specialty IT"/>
                                        <input type="text" name="position_it[]"  required value="{{$founder->position_it}}" class="form-control" placeholder="Position IT"/>

                                        {!! Form::textarea('expert_info_it[]', $founder->expert_info_it, ['class'=>'form-control','rows' => 3,'placeholder'=>'Founder info IT', 'required']) !!}

                                        <input type="text" name="specialty_de[]" required value="{{$founder->specialty_de}}"  class="form-control" placeholder="Specialty DE"/>
                                        <input type="text" name="position_de[]" required value="{{$founder->position_de}}"  class="form-control" placeholder="Position DE"/>

                                        {!! Form::textarea('expert_info_de[]', $founder->expert_info_de, ['class'=>'form-control','rows' => 3,'placeholder'=>'Founder info DE', 'required']) !!}

                                        <input value="{{$founder->avatar}}" name="avatar[]" type="hidden">

                                        <div class="input-group-addon">
                                            <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="form-group fieldGroup " style="display: block;">
                                <div class="input-group">
                                    <div class="col-xs-12" style="border: 1px solid #d2d6de; padding: 9px">
                                        <div class="provider_logo_upload" id="blah_back1" style="background-image: url('{{asset('images/avatar.png')}}')" >
                                            <label for="image" class="imageLabel"></label>
                                        </div>
                                        <input  type="file" id="image"
                                               accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                               name="avatar_image[]" onchange="readURLSetAvatarImage(this,1);"
                                               class="file_size">
                                        @if ($errors->has('avatar'))
                                            <span class="help-block">
                                           <strong>{{ $errors->first('avatar') }}</strong>
                                       </span>
                                        @endif

                                    </div>
                                    <input type="text" name="first_name[]" required class="form-control" placeholder="First name"/>
                                    <input type="text" name="last_name[]" required class="form-control" placeholder="Last name"/>

                                    <input type="text" name="specialty_en[]" required class="form-control" placeholder="Specialty EN"/>
                                    <input type="text" name="position_en[]"  required class="form-control" placeholder="Position DE"/>

                                    {!! Form::textarea('expert_info_en[]', null, ['class'=>'form-control','rows' => 3,'placeholder'=>'Founder info EN', 'required']) !!}

                                    <input type="text" name="specialty_it[]" required class="form-control" placeholder="Specialty IT"/>
                                    <input type="text" name="position_it[]" required class="form-control" placeholder="Position IT"/>

                                    {!! Form::textarea('expert_info_it[]', null, ['class'=>'form-control','rows' => 3,'placeholder'=>'Founder info IT', 'required']) !!}

                                    <input type="text" name="specialty_de[]" required class="form-control" placeholder="Specialty DE"/>
                                    <input type="text" name="position_de[]" required class="form-control" placeholder="Position DE"/>

                                    {!! Form::textarea('expert_info_de[]', null, ['class'=>'form-control','rows' => 3,'placeholder'=>'Founder info DE', 'required']) !!}


                                    <div class="input-group-addon">
                                        <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>

                                    </div>
                                </div>
                            </div>
                        @endif

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
    <div class="form-group  fieldGroupCopy" style="display: none;">
        <div class="input-group">
            <div class="col-xs-12" style="border: 1px solid #d2d6de; padding: 9px">
                <div class="provider_logo_upload avatar-class" id="" style="background-image: url('{{asset('images/avatar.png')}}')" >
                    <label for="image2" class="imageLabel"></label>
                </div>
                <input  type="file" id="image2" length=""
                       accept="image/x-png,image/gif,image/jpeg,image/jpg"
                       name="avatar_image[]"
                       {{--onchange="readURLSetAvatarImage(this);"--}}
                       class="file_size">
            </div>
            <input type="text" name="first_name[]" required class="form-control" placeholder="First name"/>
            <input type="text" name="last_name[]" required class="form-control" placeholder="Last name"/>

            <input type="text" name="specialty_en[]" required class="form-control" placeholder="Specialty EN"/>
            <input type="text" name="position_en[]" required class="form-control" placeholder="Position DE"/>

            {!! Form::textarea('expert_info_en[]', null, ['class'=>'form-control','rows' => 3,'placeholder'=>'Founder info EN', 'required']) !!}

            <input type="text" name="specialty_it[]" required class="form-control" placeholder="Specialty IT"/>
            <input type="text" name="position_it[]" required class="form-control" placeholder="Position IT"/>

            {!! Form::textarea('expert_info_it[]', null, ['class'=>'form-control','rows' => 3,'placeholder'=>'Founder info IT', 'required']) !!}

            <input type="text" name="specialty_de[]" required class="form-control" placeholder="Specialty DE"/>
            <input type="text" name="position_de[]"  required class="form-control" placeholder="Position DE"/>

            {!! Form::textarea('expert_info_de[]', null, ['class'=>'form-control','rows' => 3,'placeholder'=>'Founder info DE', 'required']) !!}

            <div class="input-group-addon">
                <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>

        $(document).ready(function(){
            //group add limit
            var maxGroup = 100;
            //add more fields group
            $(".addMore").click(function(){
                if($('body').find('.fieldGroup').length < maxGroup) {
                    var length = $('body').find('.fieldGroup').length;
                    var next = length + 1;
                    $('.fieldGroupCopy').find('.avatar-class').attr('id','blah_back' + next);
                    $('.fieldGroupCopy').find('.file_size').attr('onchange', 'readURLSetAvatarImage(this, '+next+')');

                    var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
                    $('body').find('.fieldGroup:last').after(fieldHTML);
                }else{
                    alert('Maximum '+maxGroup+' groups are allowed.');
                }
            });
            //remove fields group
            $("body").on("click",".remove",function() {

                $(this).parents(".fieldGroup").remove();
            });
        });
        function readURLSetAvatarImage(input, num) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var blah_back = $('#blah_back'+num);
                    blah_back.css('background-image','url(' + e.target.result + ')' );
                    blah_back.css('background-color','transparent' );
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

@section('styles')
    <style>
        .help-block{
            color: red;
        }
        .imageLabel {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .img-append{
            margin-left: 5px;
        }
        #blah_back {
            background-size: cover;
            background-position: center;
        }
        .provider_logo_upload {
            width: 200px;
            height: 200px;
            display: inline-block;
            background-size: cover;
            background-position: center;
            position: relative;
            border-radius: 100px;
        }
        .
    </style>
@endsection
