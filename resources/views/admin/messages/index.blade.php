@extends('admin.layouts.default')
@section('content')
<div class="col-lg-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Messages</h3>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Country/City</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{$message->name}} {{$message->surname}}</td>
                            <td>{{$message->country}} {{$message->city}}</td>
                            <td>{{$message->phone}} {{$message->city}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->message}}</td>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
