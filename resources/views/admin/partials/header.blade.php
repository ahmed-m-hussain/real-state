< <!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
    <a href="/admin/dashboard" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <b>
                Infinity
            </b>
        </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        {{--<span class="label label-success">4</span>--}}
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"></li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                <li class="chat-open" ><!-- start message -->
                                    <a href="javascript:void(0)" class="person-chat">
                                        <div class="pull-left">
                                            <!-- User Image -->
                                            <img src="{{asset('images/default.png')}}" class="img-circle" alt="Admin Image" >
                                        </div>
                                        <!-- Message title and timestamp -->
                                        <h4>
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>

                                    </a>
                                </li>
                            </ul>
                            <!-- /.menu -->
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{asset('images/default.png')}}" class="user-image" alt="Admin Image" >

                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{asset('images/default.png')}}" class="img-circle" alt="Admin Image" >

                            <p>
                               Admin
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="#" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                {{--<li>--}}
                    {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </nav>
</header>

