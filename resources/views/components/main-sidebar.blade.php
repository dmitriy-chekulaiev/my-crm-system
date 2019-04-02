<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{Auth::user()->profile->profile_image->profile->url}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->profile->firstname }} {{ Auth::user()->profile->lastname }}</p>
                <small> {{config('enums.position')[Auth::user()->profile->position]}}</small>

                {{--<!-- Status -->--}}
                {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            </div>
        </div>

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

            <li class="@if ( Route::is('profile.my')) {{'active'}} @endif">
                <a href="{{ route('profile.my') }}">
                    <i class="fa fa-user"></i>
                    <span>My Profile</span></a></li>
            <li class="@if (Route::is('teams.index') || Route::is('teams.show')) {{'active'}} @endif">
                <a href="{{ route('teams.index')}}">
                    <i class="fa fa-users"></i>
                    <span>My Teams</span></a></li>
            <li class="treeview @if ( Route::is('projects.edit') || Route::is('projects.index') || Route::is('projects.create') || Route::is('projects.show')  ) {{'active'}} @endif">
                <a href="#"><i class="fa fa-th"></i> <span>My Projects</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('projects.create') }}">Add Project</a></li>
                    <li><a href="{{ route('projects.index') }}">All Projects</a></li>
                </ul>
            </li>
            <li class="treeview @if (Route::is('clients.index') || Route::is('clients.show') || Route::is('clients.create')) {{'active'}} @endif">
                <a href="#"><i class="fa fa-handshake-o" aria-hidden="true"></i></i> <span>My Clients</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('clients.create') }}">Add Client</a></li>
                        <li><a href="{{ route('clients.index') }}">All Clients</a></li>
                    </ul>
            </li>
            {{--<li class="treeview">--}}
            {{--<a href="mailbox.html">--}}
            {{--<i class="fa fa-envelope"></i> <span>Mailbox</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li>--}}
            {{--<a href="mailbox.html">Inbox--}}
            {{--<span class="pull-right-container">--}}
            {{--<span class="label label-primary pull-right">13</span>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li><a href="compose.html">Compose</a></li>--}}
            {{--<li class="active"><a href="read-mail.html">Read</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

