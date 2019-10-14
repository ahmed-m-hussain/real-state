@extends('admin.layouts.default')
@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add Home</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if (isset($home->id))
                    <form action="{{url('/admin/home/update/'.$home->id)}}" method="post" enctype="multipart/form-data">
                @else
                    <form action="{{url('admin/home/store')}}" method="post" enctype="multipart/form-data">
                @endif
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6">
                            {!! Form::label('city', 'City name:') !!}
                            {!! Form::text('city', $home->city, ['class'=>'form-control', 'placeholder'=>'City', 'id'=>'city']) !!}
                            <div>
                                @if($errors->has('city'))
                                    <span class="error">{{$errors->first('city')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="address">Address:</label>
                            {!! Form::label('address', 'Address:') !!}
                            {!! Form::text('address', $home->address, ['class'=>'form-control', 'placeholder'=>'Address', 'id'=>'address']) !!}
                            <div>
                                @if($errors->has('address'))
                                    <span class="error">{{$errors->first('address')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            {!! Form::label('room', 'Room:') !!}
                            {!! Form::number('room', $home->room, ['class'=>'form-control', 'placeholder'=>'Room', 'id'=>'room']) !!}
                            <div>
                                @if($errors->has('room'))
                                    <span class="error">{{$errors->first('room')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('bathroom', 'Bathroom:') !!}
                            {!! Form::number('bathroom', $home->bathroom, ['class'=>'form-control', 'placeholder'=>'Bathroom', 'id'=>'bathroom']) !!}

                            <div>
                                @if($errors->has('room'))
                                    <span class="error">{{$errors->first('room')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            {!! Form::label('price', 'Price:') !!}
                            {!! Form::text('price', $home->price, ['class'=>'form-control', 'placeholder'=>'Price', 'id'=>'price']) !!}

                            <div>
                                @if($errors->has('price'))
                                    <span class="error">{{$errors->first('price')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            {!! Form::label('size', 'Size:') !!}
                            {!! Form::text('size', $home->size, ['class'=>'form-control', 'placeholder'=>'Size', 'id'=>'size']) !!}
                            <div>
                                @if($errors->has('size'))
                                    <span class="error">{{$errors->first('size')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('type', 'Type:') !!}
                        {!! Form::select('type', array('1' => 'Home for sale', '2' => 'Home for rent'),$home->type,['class'=>'form-control']); !!}
                        <div>
                            @if($errors->has('type'))
                                <span class="error">{{$errors->first('type')}}</span>
                            @endif
                        </div>

                    </div>
                     <div class="form-group">
                           <div class="checkbox-div">
                               {!! Form::label('garden', 'Garden:') !!}
                               {!! Form::checkbox('garden', '1', $home->garden, ['class' => 'my-class']);!!}
                               <div>
                                   @if($errors->has('garden'))
                                       <span class="error">{{$errors->first('garden')}}</span>
                                   @endif
                               </div>
                           </div>
                           <div class="checkbox-div">
                               {!! Form::label('sauna', 'Sauna:') !!}
                               {!! Form::checkbox('sauna', '1', $home->sauna, ['class' => 'my-class']);!!}
                               <div>
                                   @if($errors->has('sauna'))
                                       <span class="error">{{$errors->first('sauna')}}</span>
                                   @endif
                               </div>
                           </div>
                           <div class="checkbox-div">
                               {!! Form::label('gym', 'GYM:') !!}
                               {!! Form::checkbox('gym', '1', $home->gym, ['class' => 'my-class']);!!}
                               <div>
                                   @if($errors->has('gym'))
                                       <span class="error">{{$errors->first('gym')}}</span>
                                   @endif
                               </div>
                           </div>
                     </div>
                      <div class="form-group">
                          {!! Form::label('image2', 'Cover Image:') !!}
                          <div class="form-group{{ $errors->has('cover_image') ? ' has-error' : '' }}">
                              <div class="col-xs-12">
                                  <div class="cover_image_upload" id="blah_back"
                                       @if($home->cover_image) style="background-image: url('{{asset('images/uploads/'.$home->cover_image)}}')"
                                       @else style="background-image: url('{{asset('images/add1.png')}}')" @endif>
                                      <label for="image2" class="imageLabel"></label>
                                  </div>
                                  <input type="file" id="image2" style="display: none"
                                         accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                         name="cover_image" onchange="readURLSetCoverImage(this);"
                                         class="file_size">
                                  @if ($errors->has('cover_image'))
                                      <span class="help-block">
                                           <strong>{{ $errors->first('cover_image') }}</strong>
                                       </span>
                                  @endif
                                  @if (isset($home))
                                      <input type="hidden" name="lastCoverImage" @if(isset($home->cover_image) && !empty($home->cover_image)) value="{{$home->cover_image}}"@else value="0" @endif >
                                  @endif
                              </div>
                          </div>
                      </div>
                    <div class="form-group">
                        {!! Form::label('detail', 'Detail:') !!}
                        {!! Form::textarea('detail', $home->detail, ['class'=>'form-control']) !!}
                        <div>
                            @if($errors->has('detail'))
                                <span class="error">{{$errors->first('detail')}}</span>
                            @endif
                        </div>
                    </div>

                        {!! Form::label('', 'Add custom icons:') !!}
                        <div class="form-group fieldGroup">
                            @if(isset($home->icons[0]))
                                <div class="text-right div-add-btn">
                                    <a href="javascript:void(0)" class="btn btn-success addMore "><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                                </div>
                            @endif
                            <div class="input-group">
                                <input type="text" name="icons_name[]" id="icons_name" class="form-control" placeholder="Name" @if(isset($home->icons[0])) value="{{$home->icons[0]->name}}" @endif />
                                <input type="text" name="icons[]" class="form-control" placeholder="Icon" @if(isset($home->icons[0])) value="{{$home->icons[0]->font}}" @endif />
                                <div class="input-group-addon">
                                    @if(isset($home->icons[0]))
                                        <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>

                                    @else
                                        <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>

                                    @endif
                                </div>
                            </div>
                        </div>


                        @foreach($home->icons as $icon)
                            @if($loop->iteration > 1)
                            <div class="form-group fieldGroupCopy fieldGroup" >
                                <div class="input-group">
                                    <input type="text" name="icons_name[]" class="form-control" placeholder="Name" value="{{$icon->name}}"/>
                                    <input type="text" name="icons[]" class="form-control" placeholder="Link" value="{{$icon->font}}"/>
                                    <div class="input-group-addon">
                                        <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                        <div>
                            <div class="image-input">
                                <label for="image1">Slider Image:</label>
                                <input multiple type="file" id="fileinput"
                                       accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                       name="photo_url[]"  onchange="readURLSetBackground(this);"
                                       class="file_size">
                                @if($home->images()->where('type', 1)->count())
                                    <button type="button" id="removeImages">Remove</button>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('photo_url') ? ' has-error' : '' }}">
                                <div class="col-xs-12 img-div">
                                    @if($home->id)
                                        @foreach($home->images as $item)
                                            @if($item->type == 1)
                                                <div class="provider_logo_upload img-append" id="blah_back"
                                                     @if($home->cover_image) style="background-image: url('{{asset('images/uploads/'.$item->image)}}')"
                                                     @else style="background-image: url('{{asset('images/add1.png')}}')" @endif>
                                                    <label for="image2" class="imageLabel"></label>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                    @if ($errors->has('photo_url'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('photo_url') }}</strong>
                                         </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="drawings-input">

                                <label for="image1">Drawing Image:</label>
                                <input multiple type="file" id="fileDrawings"
                                       accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                       name="drawings[]"  onchange="readURLSetDrawings(this);"
                                       class="file_size">
                                @if($home->images()->where('type', 2)->count())
                                    <button type="button" id="removeDrawings">Remove</button>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('drawings') ? ' has-error' : '' }}">
                                <div class="col-xs-12 drawings-div">
                                    @if($home->id)
                                        @foreach($home->images as $item)
                                            @if($item->type == 2)
                                                <div class="provider_logo_upload drawings-append" id="blah_back"
                                                     @if($home->cover_image) style="background-image: url('{{asset('images/uploads/'.$item->image)}}')"
                                                     @else style="background-image: url('{{asset('images/add1.png')}}')" @endif>
                                                    <label for="image2" class="imageLabel"></label>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                    @if ($errors->has('drawings'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('drawings') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    {{--</form>--}}
                    {{--</form>--}}
        </div>
                        {!! Form::hidden('latitude', $home->latitude, ['class'=>'form-control', 'placeholder'=>'latitude', 'id'=>'latitude']) !!}
                        {!! Form::hidden('longitude', $home->longitude, ['class'=>'form-control', 'placeholder'=>'longitude', 'id'=>'longitude']) !!}

                        <div class="form-group" >
                            <br>
                            <div id="map"></div>
                            <div>
                                @if($errors->has('latitude'))
                                    <span class="error">{{$errors->first('latitude')}}</span>
                                @endif
                            </div>
                            <div>
                                @if($errors->has('longitude'))
                                    <span class="error">{{$errors->first('longitude')}}</span>
                                @endif
                            </div>
                        </div>
                    <div class="form-group col-xs-12" style="margin-top: 20px">
                        <button type="submit" class="btn btn-success btn-flat">
                            {!! isset($home->id) ? '<i class="fa fa-edit"></i> Update' : '<i class="fa fa-plus"></i> Create' !!}

                        </button>
                        <a href="{{route('home.index')}}" class="btn btn-default btn-flat pull-right">
                            <i class="fa fa-reply"></i> Back To List
                        </a>
                    </div>


                    </form>
                <div class="form-group fieldGroupCopy" style="display: none;">
                    <div class="input-group">
                        <input type="text" name="icons_name[]" class="form-control" placeholder="Name"/>
                        <input type="text" name="icons[]" class="form-control" placeholder="Link"/>
                        <div class="input-group-addon">
                            <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{ asset('js/image_view.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvE9xEo7_ctK8R9n8VCuz3ghWsiqRE8o4&libraries=places"></script>
    <script>
        $(document).on('click','#removeImages',function () {
            $('.img-append').remove();
            $("#fileinput").val('');
            $('#removeImages').remove();
        });
        $(document).on('click','#removeDrawings',function () {
            $('.drawings-append').remove();
            $("#fileDrawings").val('');
            $('#removeDrawings').remove();
        });

        function readURLSetCoverImage(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var blah_back = $('#blah_back');
                    blah_back.css('background-image','url(' + e.target.result + ')' );
                    blah_back.css('background-color','transparent' );
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function(){
            //group add limit
            var maxGroup = 3;
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
        $(document).ready(function(){
        var map;


            map = new google.maps.Map(document.getElementById('map'), {
                // center: {lat: 47.651968, lng: 9.478485},
                zoom: 5,
                draggable: true
            });

            @if($home->id)
                var lat = {{$home->latitude}};
                var lang = {{$home->longitude}};

            @else
                var lat = 47.651968;
                var lang = 9.478485;
            @endif

            var myMarker = new google.maps.Marker({
                position: new google.maps.LatLng(lat, lang),
                draggable: true
            });

            google.maps.event.addListener(myMarker, 'dragend', function (event) {
                document.getElementById("latitude").value = this.getPosition().lat();
                document.getElementById("longitude").value = this.getPosition().lng();
            });

            map.setCenter(myMarker.position);
            myMarker.setMap(map);
        });

    </script>
@endsection

@section('styles')
    <style>
        #map{
            width: 100%;
            height: 500px;
        }
        #detail {
            width: 100%;
        }
        .error{
            color: red;
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
        .remove-img{
            position: absolute;
            right: 0px;
            top: 0px;
            text-align: center;
            font-size: 30px;
            color: red;
            padding: 10px;

        }

        .image-input{
            padding-bottom: 40px;
            padding-left: 21px;

        }
         .drawings-input{
             padding-bottom: 40px;
             padding-left: 21px;
        }
         .drawings-append{
             margin-left: 5px;
         }
        .checkbox-div{
            width: 150px;
            display: inline-block;
        }
        @media screen and (max-width: 1200px) {
            .img-home{
                height: 290px;
            }
        }

        .file_size{
            display: inline-block !important;
        }
        .cover_image_upload {
            width: 200px;
            height: 200px;
            margin-bottom: 5px;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .div-add-btn{
            padding: 5px;
        }
    </style>
@endsection

