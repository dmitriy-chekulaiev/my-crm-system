@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            {{--<h1>--}}
                {{--{{$profile->firstname}} {{$profile->lastname}}--}}
                {{--<small>--}}
                    {{--{{config('enums.position')[$profile->position]}}--}}
                {{--</small>--}}
            {{--</h1>--}}

            {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
            {{--<li><a href="#">Examples</a></li>--}}
            {{--<li class="active">User profile</li>--}}
            {{--</ol>--}}
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('../dist/img/photo1.png') center center;">
                            <h3 class="widget-user-username">{{ $profile->firstname }} {{ $profile->lastname }}</h3>
                            <h5 class="widget-user-desc">{{config('enums.position')[$profile->position]}}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{$profile->profile_image->profile->url}}" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="box-header with-border">
                                <h3 class="box-title">About Me</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i> Position</strong>


                                <p class="text-muted">
                                    {{config('enums.position')[$profile->position]}}
                                </p>

                                <hr>
                                <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>


                                <p class="text-muted">
                                    {{ $profile->address }}
                                </p>

                                <hr>

                                <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>

                                <p class="text-muted">{{ $profile->phone }}</p>

                                <hr>

                                <strong><i class="fa fa-heart margin-r-5"></i> Gender</strong>

                                <p class="text-muted"> {{config('enums.gender')[$profile->gender]}}</p>

                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                                <p>
                                    <span class="label label-danger">UI Design</span>
                                    <span class="label label-success">Coding</span>
                                    <span class="label label-info">Javascript</span>
                                    <span class="label label-warning">PHP</span>
                                    <span class="label label-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $profile->firstname }}'s Projects</h3>
                        </div>
                    </div>
                </div>


                <!-- /.col -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
