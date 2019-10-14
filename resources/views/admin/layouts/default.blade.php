<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Infinity</title>
    <link rel="icon" href="" type="image/gif" sizes="16x16">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
     <!-- Header links. Contains header style and script links -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.partials.header_links')
    @yield('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper">
        <!-- Header Content -->
        @include('admin.partials.header')
        <!-- Sidebar Content -->
            @include('admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="overflow-y: scroll">
            @yield('content')
            <div class="chat-window-container chat_window" style="display: none;">
                <div class="panel panel-default" data-user-id="3" id="chs" style="display: block;">
                    <div class="panel-heading" data-toggle="chat-collapse" data-target="#chat-bill">
                        <a href="#" class="close"><i class="fa fa-times"></i></a>
                        <a href="#">
                            <span class="pull-left">
                                <img src="{{asset('images/default.png')}}" class="chat_img" width="40" height="40">
                            </span>
                            <span class="contact-name chat_name">Test test1</span>
                        </a>
                    </div>
                    <div class="panel-body pan_bod" id="chat-bill">

                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control chat_enter" id="formsd" from-id="{{Auth::user()->id}}" placeholder="Type message..." >
                    </div>
                </div>
            </div>
        </div><!-- /.content-wrapper -->
        <!-- Footer Content -->
        @include('admin.partials.footer')
    </div>
    <!-- Footer links. Contains footer style and script links -->
    @include('admin.partials.footer_links')
    @yield('scripts')
</body>
</html>
<style>
    .chat-window-container {
        position: fixed;
        margin-right: 0;
        bottom: 0;
        right: 0;
        z-index: 1032;
    }

    #chs {
        right: 320px;
        left: auto;
    }

    .chat-window-container .panel {
        position: absolute;
        box-shadow: -3px 3px 8px rgba(0, 0, 0, 0.1);
        margin-right: 5px;
        display: none;
        width: 240px;
        border: 0;
        right: 0 !important;
        margin-bottom: 0;
        font-weight: 400;
        bottom: 0 !important;
    }

    .chat-window-container .panel .panel-heading {
        background: #26a69a;
        padding: 0;
        line-height: 39px;
    }
    .chat-window-container .panel .panel-heading a {
        color: #ffffff;
    }

    .chat-window-container .panel .panel-heading img {
        margin-right: 10px;
    }

    .chat-window-container .panel .panel-heading .close {
        opacity: 0.4;
        float: right;
        padding: 12px 10px;
        font-size: 13px;
    }
    .panel-heading > *:first-child {
        margin-top: 0;
    }

    .close {
        float: right;
        font-size: 21px;
        font-weight: bold;
        line-height: 1;
        color: #000000;
        text-shadow: 0 1px 0 #ffffff;
        opacity: 0.2;
        filter: alpha(opacity=20);
    }
    img {
        vertical-align: top;
    }

    .pan_bod {
        height: 200px;
    }

    .chat-window-container .panel .panel-body {
        border-left: 1px solid #e0e0e0;
        border-right: 1px solid #e0e0e0;
        padding: 6px 5px 8px 5px;
        font-size: 12px;
        background: #f9f9f9;
        overflow-y: scroll;

    }

    .message {
        padding: 3px 3px 3px 4px;
        border-radius: 3px;
        border: 1px solid #e2e9e6;
        background: #ffffff;
    }
</style>
