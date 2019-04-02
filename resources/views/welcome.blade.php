<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset("/admin-lte/bower_components/bootstrap/dist/css/bootstrap.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("/admin-lte/bower_components/font-awesome/css/font-awesome.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset("/admin-lte/bower_components/ionicons/css/ionicons.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("/admin-lte/dist/css/AdminLTE.min.css")}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{ asset("/admin-lte/dist/css/skins/skin-blue.min.css")}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>CRM</b> Test</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="{{ route('register')}}" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="{{ route('register')}}">
                                            <div class="pull-left">
                                                <!-- User Image -->
                                                <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw4NDQ0NDg0NEA4NDQ4NDxAPDg8NEBMNFxEiFxURExMbKDQiGBonGxUfITEiJiorNjouFyEzODYuQygtOisBCgoKDg0NFQ0QGC0iHR0rNy4tLS0tKysrLSs3Ky0wLS0tMisrKy0tLS0tKystLS0rLS8tLSsvKystLSsrLS0tLf/AABEIAOEA4QMBEQACEQEDEQH/xAAaAAEAAwEBAQAAAAAAAAAAAAAABAUGAQMC/8QAOhABAAIBAgIECwYGAwEAAAAAAAECAwQRBRIGITFREyJBU2FxgZGUocEUFTJScrFCYmOTsuGi0fAj/8QAGgEBAQADAQEAAAAAAAAAAAAAAAECBAUDBv/EADMRAQACAQIBCQcDBQEAAAAAAAABAgMEESEFEhMxUWFxodEiMkFSksHwkbHhFCNCgfEz/9oADAMBAAIRAxEAPwC/d98eICBACIIoiAEIACAgIAggICAAgAICAgAICIIAogOoyECUAQRRARCQEBAAQEAQQEBAQAEBAAQEABEEUQEQdRmA4g6iAogIggAICAgAIgAgICAAgICAAgAIgiiIIDqMxAgBEEURACEABAQEAQQEBAAQAEBAQAEBEEAURBAdRmSgCCKICISAgIACAgCCAgIACAgIACAgAIgiiAiADqM3EHUQFEBEEABAQEABEAEBAQAEBAQAEABEEURBAAdNmAIgigggQgAICAgAIggIACAAgICAAgIggCiIIAEumzBBFEBEJAQEABAQBF7w3ozmyxF8k+CpPXETG95j9Pk9vua989Y4RxdLBybkyRzr+zHn/H5wT54Rw3F4uTPE2jti2asT7q7PLpctuqPJszpNHj4Xtx759NiOGcMydVM1YmezbPG/six0mWOuPI/ptFfhW3n6onEOi2SkTbBfwkdvLO1b7eieyfkyrniet45uS71jfHO/d8fz9GftWYmYmJiYnaYmNpie6Ye7lTExO0uICAAgIACIIogIgADjps3UQFEBEAEBAAYgDS9GOG0rSdZm2itN5x83ZEV7ck+7q9W/c1c+Sd+jq63J+nrFf6jJ1R1evog8Y47k1FprSbUw9kVidptHfefozx4Yrxnra2q11807V4V/fx9FQ9WiILDhXF82ltHLM2x+XHafF2/l/LLzvjiza0+ryYJ4TvHZ+dS847o8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"
                                                     class="img-circle" alt="User Image">
                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                                <!-- /.menu -->
                            </li>
                            <li class="footer"><a href="{{ route('register')}}">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="{{ route('register')}}" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="{{ route('register')}}">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                </ul>
                            </li>
                            <li class="footer"><a href="{{ route('register')}}">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="{{ route('register')}}" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="{{ route('register')}}">
                                            <!-- Task title and progress text -->
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                     role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="{{ route('register')}}">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="{{ route('register')}}" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw4NDQ0NDg0NEA4NDQ4NDxAPDg8NEBMNFxEiFxURExMbKDQiGBonGxUfITEiJiorNjouFyEzODYuQygtOisBCgoKDg0NFQ0QGC0iHR0rNy4tLS0tKysrLSs3Ky0wLS0tMisrKy0tLS0tKystLS0rLS8tLSsvKystLSsrLS0tLf/AABEIAOEA4QMBEQACEQEDEQH/xAAaAAEAAwEBAQAAAAAAAAAAAAAABAUGAQMC/8QAOhABAAIBAgIECwYGAwEAAAAAAAECAwQRBRIGITFREyJBU2FxgZGUocEUFTJScrFCYmOTsuGi0fAj/8QAGgEBAQADAQEAAAAAAAAAAAAAAAECBAUDBv/EADMRAQACAQIBCQcDBQEAAAAAAAABAgMEESEFEhMxUWFxodEiMkFSksHwkbHhFCNCgfEz/9oADAMBAAIRAxEAPwC/d98eICBACIIoiAEIACAgIAggICAAgAICAgAICIIAogOoyECUAQRRARCQEBAAQEAQQEBAQAEBAAQEABEEUQEQdRmA4g6iAogIggAICAgAIgAgICAAgICAAgAIgiiIIDqMxAgBEEURACEABAQEAQQEBAAQAEBAQAEBEEAURBAdRmSgCCKICISAgIACAgCCAgIACAgIACAgAIgiiAiADqM3EHUQFEBEEABAQEABEAEBAQAEBAQAEABEEURBAAdNmAIgigggQgAICAgAIggIACAAgICAAgIggCiIIAEumzBBFEBEJAQEABAQBF7w3ozmyxF8k+CpPXETG95j9Pk9vua989Y4RxdLBybkyRzr+zHn/H5wT54Rw3F4uTPE2jti2asT7q7PLpctuqPJszpNHj4Xtx759NiOGcMydVM1YmezbPG/six0mWOuPI/ptFfhW3n6onEOi2SkTbBfwkdvLO1b7eieyfkyrniet45uS71jfHO/d8fz9GftWYmYmJiYnaYmNpie6Ye7lTExO0uICAAgIACIIogIgADjps3UQFEBEAEBAAYgDS9GOG0rSdZm2itN5x83ZEV7ck+7q9W/c1c+Sd+jq63J+nrFf6jJ1R1evog8Y47k1FprSbUw9kVidptHfefozx4Yrxnra2q11807V4V/fx9FQ9WiILDhXF82ltHLM2x+XHafF2/l/LLzvjiza0+ryYJ4TvHZ+dS847o8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"
                                 class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">Your name</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw4NDQ0NDg0NEA4NDQ4NDxAPDg8NEBMNFxEiFxURExMbKDQiGBonGxUfITEiJiorNjouFyEzODYuQygtOisBCgoKDg0NFQ0QGC0iHR0rNy4tLS0tKysrLSs3Ky0wLS0tMisrKy0tLS0tKystLS0rLS8tLSsvKystLSsrLS0tLf/AABEIAOEA4QMBEQACEQEDEQH/xAAaAAEAAwEBAQAAAAAAAAAAAAAABAUGAQMC/8QAOhABAAIBAgIECwYGAwEAAAAAAAECAwQRBRIGITFREyJBU2FxgZGUocEUFTJScrFCYmOTsuGi0fAj/8QAGgEBAQADAQEAAAAAAAAAAAAAAAECBAUDBv/EADMRAQACAQIBCQcDBQEAAAAAAAABAgMEESEFEhMxUWFxodEiMkFSksHwkbHhFCNCgfEz/9oADAMBAAIRAxEAPwC/d98eICBACIIoiAEIACAgIAggICAAgAICAgAICIIAogOoyECUAQRRARCQEBAAQEAQQEBAQAEBAAQEABEEUQEQdRmA4g6iAogIggAICAgAIgAgICAAgICAAgAIgiiIIDqMxAgBEEURACEABAQEAQQEBAAQAEBAQAEBEEAURBAdRmSgCCKICISAgIACAgCCAgIACAgIACAgAIgiiAiADqM3EHUQFEBEEABAQEABEAEBAQAEBAQAEABEEURBAAdNmAIgigggQgAICAgAIggIACAAgICAAgIggCiIIAEumzBBFEBEJAQEABAQBF7w3ozmyxF8k+CpPXETG95j9Pk9vua989Y4RxdLBybkyRzr+zHn/H5wT54Rw3F4uTPE2jti2asT7q7PLpctuqPJszpNHj4Xtx759NiOGcMydVM1YmezbPG/six0mWOuPI/ptFfhW3n6onEOi2SkTbBfwkdvLO1b7eieyfkyrniet45uS71jfHO/d8fz9GftWYmYmJiYnaYmNpie6Ye7lTExO0uICAAgIACIIogIgADjps3UQFEBEAEBAAYgDS9GOG0rSdZm2itN5x83ZEV7ck+7q9W/c1c+Sd+jq63J+nrFf6jJ1R1evog8Y47k1FprSbUw9kVidptHfefozx4Yrxnra2q11807V4V/fx9FQ9WiILDhXF82ltHLM2x+XHafF2/l/LLzvjiza0+ryYJ4TvHZ+dS847o8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"
                                     class="img-circle" alt="User Image">

                                <p>
                                    Your name - Your Position
                                    <small>Member since Jun. 1970</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('login') }}" class="btn btn-default btn-flat">Login</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('register') }}" class="btn btn-default btn-flat">Register</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw4NDQ0NDg0NEA4NDQ4NDxAPDg8NEBMNFxEiFxURExMbKDQiGBonGxUfITEiJiorNjouFyEzODYuQygtOisBCgoKDg0NFQ0QGC0iHR0rNy4tLS0tKysrLSs3Ky0wLS0tMisrKy0tLS0tKystLS0rLS8tLSsvKystLSsrLS0tLf/AABEIAOEA4QMBEQACEQEDEQH/xAAaAAEAAwEBAQAAAAAAAAAAAAAABAUGAQMC/8QAOhABAAIBAgIECwYGAwEAAAAAAAECAwQRBRIGITFREyJBU2FxgZGUocEUFTJScrFCYmOTsuGi0fAj/8QAGgEBAQADAQEAAAAAAAAAAAAAAAECBAUDBv/EADMRAQACAQIBCQcDBQEAAAAAAAABAgMEESEFEhMxUWFxodEiMkFSksHwkbHhFCNCgfEz/9oADAMBAAIRAxEAPwC/d98eICBACIIoiAEIACAgIAggICAAgAICAgAICIIAogOoyECUAQRRARCQEBAAQEAQQEBAQAEBAAQEABEEUQEQdRmA4g6iAogIggAICAgAIgAgICAAgICAAgAIgiiIIDqMxAgBEEURACEABAQEAQQEBAAQAEBAQAEBEEAURBAdRmSgCCKICISAgIACAgCCAgIACAgIACAgAIgiiAiADqM3EHUQFEBEEABAQEABEAEBAQAEBAQAEABEEURBAAdNmAIgigggQgAICAgAIggIACAAgICAAgIggCiIIAEumzBBFEBEJAQEABAQBF7w3ozmyxF8k+CpPXETG95j9Pk9vua989Y4RxdLBybkyRzr+zHn/H5wT54Rw3F4uTPE2jti2asT7q7PLpctuqPJszpNHj4Xtx759NiOGcMydVM1YmezbPG/six0mWOuPI/ptFfhW3n6onEOi2SkTbBfwkdvLO1b7eieyfkyrniet45uS71jfHO/d8fz9GftWYmYmJiYnaYmNpie6Ye7lTExO0uICAAgIACIIogIgADjps3UQFEBEAEBAAYgDS9GOG0rSdZm2itN5x83ZEV7ck+7q9W/c1c+Sd+jq63J+nrFf6jJ1R1evog8Y47k1FprSbUw9kVidptHfefozx4Yrxnra2q11807V4V/fx9FQ9WiILDhXF82ltHLM2x+XHafF2/l/LLzvjiza0+ryYJ4TvHZ+dS847o8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"
                         class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Your name</p>
                    <!-- Status -->
                    <a href="{{ route('register')}}"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">CRM Navigation</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="treeview">
                    <a href="{{ route('register')}}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('login') }}"><i class="fa fa-user"></i>Login</a></li>
                        <li><a href="{{ route('register') }}"><i class="fa fa-user"></i>Register</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('login') }}"><i class=" fa fa-user-circle"></i> <span>My Profile</span></a></li>
                <li><a href="{{ route('register') }}"><i class="fa fa-th"></i> <span>My Projects</span></a></li>
                <li>
                    <a href="{{ route('login') }}">
                        <i class="fa fa-envelope"></i> <span>Mailbox</span>
                        <span class="pull-right-container">
                          <small class="label pull-right bg-yellow">12</small>
                          <small class="label pull-right bg-green">16</small>
                          <small class="label pull-right bg-red">5</small>
                        </span>
                    </a>
                </li>
                <li><a href="{{ route('register') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
                <li><a href="{{ route('register') }}"><i class="fa fa-users"></i> <span>Clients</span></a></li>

            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <b>CRM</b>Test
                <small>Project Management System</small>
            </h1>



        </section>

        <!-- Main content -->
        <section style="height: 745px; text-align: center" class="content container-fluid">
            <img style="max-width: 80%; padding-top: 50px;" src="{{ asset("/images/11.jpg") }}" alt="">
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2019 <a href="{{ route('register')}}">Dmitriy Chekulaiev</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset("/admin-lte/bower_components/jquery/dist/jquery.min.js")}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset("/admin-lte/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<!-- AdminLTE App -->
<script src={{ asset("/admin-lte/dist/js/adminlte.min.js")}}></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>