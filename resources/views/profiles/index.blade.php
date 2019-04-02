@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All Projects
            </h1>

            <h2>

            </h2>
            {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
            {{--<li><a href="#">Examples</a></li>--}}
            {{--<li class="active">User profile</li>--}}
            {{--</ol>--}}
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All projects <strong>{{count($projects)}}</strong></h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right"
                                           placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>Project ID</th>
                                    <th>Project Name</th>
                                    <th>Estimate</th>
                                    <th>Time Spent</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                </tr>
                                @foreach($projects as $project)

                                    <tr>
                                        <td>{{$project->id}}</td>
                                        <td><a href="{{url('projects', $project->id)}}">{{$project->name}}</a></td>
                                        <td>{{$project->estimation}}</td>
                                        <td>{{$project->time_spent}}</td>
                                        <td>
                                            <span class="label label-success label-{{$project->status}}">{{config('enums.projectStatus')[$project->status]}}</span>
                                        </td>
                                        <td style="max-width: 500px;">{{$project->description}}</td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
