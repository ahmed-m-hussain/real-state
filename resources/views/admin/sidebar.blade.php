<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li @if(Route::currentRouteName() == 'admin.home') class="active" @endif>
                <a href="{{url('/admin/dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li @if(in_array(Route::currentRouteName(),
                          [
                             'home.index',
                             'home.create',
                             'home.store',
                             'home.edit',
                             'home.update',
                             'home.show',
                             'home.destroy'
                          ]
                          )) class='active' @endif>
                <a href="{{url('/admin/home/index')}}"><i class="fa fa-home"></i> Home</a>
            </li>
            <li @if(Route::currentRouteName() == 'about.index') class="active" @endif>
                <a href="{{url('/admin/about/index')}}"><i class="fa fa-address-card"></i> About Us</a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Services</span>
                    <span class="pull-right-container">
                    <span class="label label-primary pull-right">2</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu"
                    @if(in_array(Route::currentRouteName(),
                  [
                      'administration.index',
                      'administration.update',
                      'real.estate.appraisals.index',
                      'real.estate.appraisals.update',
                  ]
                  )) style="display: block;" @endif  >

                    <li
                        @if(in_array(Route::currentRouteName(),
                       [
                          'real.estate.appraisals.index',
                          'real.estate.appraisals.update',
                       ]
                       )) class='active' @endif>
                        <a href="{{url('/admin/real/estate/appraisals/index')}}"><i class="fa fa-user"></i>Real estate appraisals</a>
                    </li>
                    <li  @if(in_array(Route::currentRouteName(),
                        [
                          'administration.index',
                          'administration.update',
                        ]
                        )) class='active' @endif>
                        <a href="{{url('/admin/administration/index')}}"><i class="fa fa-recycle"></i>Administration</a>
                    </li>
                </ul>
            </li>

            <li @if(Route::currentRouteName() == 'contact.index') class="active" @endif>
                <a href="{{url('/admin/contact/index')}}"><i class="fa fa-book"></i>Contact</a>
            </li>

            <li @if(Route::currentRouteName() == 'messages.index') class="active" @endif>
                <a href="{{url('/admin/messages/index')}}"><i class="fa fa-inbox"></i>Messages</a>
            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
