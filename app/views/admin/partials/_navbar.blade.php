<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Dashboard</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown">
                {{--<li class="message-preview">--}}
                    {{--<a href="#">--}}
                        {{--<div class="media">--}}
                            {{--<span class="pull-left">--}}
                                {{--<img class="media-object" src="http://placehold.it/50x50" alt="">--}}
                            {{--</span>--}}
                            {{--<div class="media-body">--}}
                                {{--<h5 class="media-heading"><strong>Admin</strong>--}}
                                {{--</h5>--}}
                                {{--<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur...</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="message-footer">
                    <a href="#">All Messages</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{{ Confide::user()->email }}} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ URL::route('admin.adUser.logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li @if(Route::currentRouteName() == 'admin.dashboard.index') class="active" @endif >
                <a href="{{ URL::route('admin.dashboard.index') }}">
                    <i class="fa fa-fw fa-dashboard"></i> Statistic
                </a>
            </li>
            <li @if(Route::currentRouteName() == 'admin.adUser.index') class="active" @endif >
                <a href="{{ URL::route('admin.adUser.index') }}" data-toggle="collapse" data-target="#demo">
                    <i class="fa fa-users"></i> Users
                </a>
            </li>
            <li @if(Route::currentRouteName() == 'admin.adRole.index') class="active" @endif >
                <a href="{{ URL::route('admin.adRole.index') }}">
                    <i class="fa fa-fw fa-leaf"></i> Roles
                </a>
            </li>
            <li @if(Route::currentRouteName() == 'admin.adFile.create') class="active" @endif>
                <a href="{{URl::route('admin.adFile.create')}}">
                    <i class="fa fa-file"></i> File Upload
                </a>
            </li>
            <li @if(Route::currentRouteName() == 'admin.adPost.create') class="active" @endif >
                            <a href="{{ URL::route('admin.adPost.create') }}" data-toggle="collapse" data-target="#demo">
                                <i class="fa fa-apple"></i> Post
                            </a>
                        </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
