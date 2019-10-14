@extends('admin.layouts.default')
@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="box box-info">
            <div class="col-md-12" style="text-align: center">
                @include('admin.partials.message')
            </div>
            <div class="box-header with-border">
                <h3 class="box-title">Update Services/Real estate appraisals</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form action="{{url('/admin/real/estate/appraisals/update/'.$realEstateAppraisal->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group ">

                        {!! Form::label('page_title_en', ' Page title EN:') !!}
                        {!! Form::text('page_title_en', $realEstateAppraisal->page_title_en, ['class'=>'form-control', 'placeholder'=>'Page title EN', 'id'=>'page_title_en']) !!}
                        <div>
                            @if($errors->has('page_title_en'))
                                <span class="help-block">
                                       <strong>{{$errors->first('page_title_en')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('text_title_en', 'Text title EN:') !!}
                        {!! Form::text('text_title_en', $realEstateAppraisal->text_title_en, ['class'=>'form-control', 'placeholder'=>'Text title EN', 'id'=>'text_title_en']) !!}
                        <div>
                            @if($errors->has('text_title_en'))
                                <span class="help-block">
                                       <strong>{{$errors->first('text_title_en')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('description_en', 'Description EN:') !!}
                        {!! Form::textarea('description_en', $realEstateAppraisal->description_en, ['class'=>'form-control']) !!}

                        <div>
                            @if($errors->has('description_en'))
                                <span class="help-block">
                                        <strong>{{$errors->first('description_en')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('page_title_it', 'Page title IT:') !!}
                        {!! Form::text('page_title_it', $realEstateAppraisal->page_title_it, ['class'=>'form-control', 'placeholder'=>'Page title IT', 'id'=>'page_title_it']) !!}
                        <div>
                            @if($errors->has('page_title_it'))
                                <span class="help-block">
                                        <strong>{{$errors->first('page_title_it')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('text_title_it', 'Text title IT:') !!}
                        {!! Form::text('text_title_it', $realEstateAppraisal->text_title_it, ['class'=>'form-control', 'placeholder'=>'Text title IT', 'id'=>'text_title_it']) !!}
                        <div>
                            @if($errors->has('text_title_it'))
                                <span class="help-block">
                                        <strong>{{$errors->first('text_title_it')}}</strong>
                                 </span>
                            @endif
                        </div>


                        {!! Form::label('description_it', 'Description IT:') !!}
                        {!! Form::textarea('description_it', $realEstateAppraisal->description_it, ['class'=>'form-control']) !!}

                        <div>
                            @if($errors->has('description_it'))
                                <span class="help-block">
                                        <strong>{{$errors->first('description_it')}}</strong>
                                 </span>
                            @endif
                        </div>

                        {!! Form::label('page_title_de', 'Page title DE:') !!}
                        {!! Form::text('page_title_de', $realEstateAppraisal->page_title_de, ['class'=>'form-control', 'placeholder'=>'Page title DE', 'id'=>'page_title_de']) !!}
                        <div>
                            @if($errors->has('page_title_de'))
                                <span class="help-block">
                                        <strong>{{$errors->first('page_title_de')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('text_title_de', 'Text title DE:') !!}
                        {!! Form::text('text_title_de', $realEstateAppraisal->text_title_de, ['class'=>'form-control', 'placeholder'=>'Text title DE', 'id'=>'text_title_de']) !!}
                        <div>
                            @if($errors->has('text_title_de'))
                                <span class="help-block">
                                        <strong>{{$errors->first('text_title_de')}}</strong>
                                 </span>
                            @endif
                        </div>
                        {!! Form::label('description_de', 'Description DE:') !!}
                        {!! Form::textarea('description_de', $realEstateAppraisal->description_de, ['class'=>'form-control']) !!}

                        <div>
                            @if($errors->has('description_de'))
                                <span class="help-block">
                                        <strong>{{$errors->first('description_de')}}</strong>
                                 </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group ">
                        {!! Form::label('', 'Sections') !!}
                        @if(isset($realEstateAppraisal->sections[0]))
                            <div class="input-group-addon " style="text-align: right">
                                <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                            </div>
                        @endif
                        @if(isset($realEstateAppraisal->sections[0]))
                            @foreach($realEstateAppraisal->sections as $section)
                                <div class="form-group fieldGroup " style="display: block;">
                                    <div class="input-group">
                                        <input type="text" required  name="name_en[]" value="{{$section->name_en}}" class="form-control" placeholder="Name EN"/>
                                        <input type="text" required name="name_it[]" value="{{$section->name_it}}" class="form-control" placeholder="Name IT"/>
                                        <input type="text" required name="name_de[]" value="{{$section->name_de}}" class="form-control" placeholder="Name DE"/>
                                        <input type="text" required name="font[]" value="{{$section->font}}"  class="form-control" placeholder="Font "/>
                                        <div class="input-group-addon">
                                            <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="form-group fieldGroup " style="display: block;">
                                <div class="input-group">
                                    <input type="text" name="name_en[]" class="form-control" placeholder="Name EN"/>
                                    <input type="text" name="name_it[]" class="form-control" placeholder="Name IT"/>
                                    <input type="text" name="name_de[]" class="form-control" placeholder="Name DE"/>
                                    <input type="text" name="font[]" class="form-control" placeholder="Font "/>
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

            <input type="text" required name="name_en[]" class="form-control" placeholder="Name EN"/>
            <input type="text" required name="name_it[]" class="form-control" placeholder="Name IT"/>
            <input type="text" required name="name_de[]" class="form-control" placeholder="Name DE"/>
            <input type="text" required name="font[]" class="form-control" placeholder="Font"/>

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
    </script>
@endsection

@section('styles')
    <style>
        .help-block{
            color: red;
        }
    </style>
@endsection

