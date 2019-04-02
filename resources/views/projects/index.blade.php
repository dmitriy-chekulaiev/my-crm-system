@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <ol style="margin: 0;" class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">My projects</li>
        </ol>
        <section class="content-header">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 style="margin: 0;">
                        Projects
                        <div class="pull-right">
                            <a class="btn btn-success glyphicon  glyphicon-plus pull-right"
                               href="{{route('projects.create')}}"></a>
                        </div>
                    </h3>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success box-solid">
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
                                    <th>Client</th>
                                    <th>Estimate</th>
                                    <th>Time Spent</th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($projects as $project)

                                    <tr>
                                        <td>{{$project->id}}</td>
                                        <td><a href="{{url('projects', $project->id)}}">{{$project->name}}</a></td>
                                        <td>@if ($project->client)
                                                {{$project->client->name}}
                                            @endif</td>
                                        <td>{{$project->estimation}}</td>
                                        <td>{{$project->time_spent}}</td>
                                        <td>
                                            <span class="label label-success label-{{$project->status}}">{{config('enums.projectStatus')[$project->status]}}</span>
                                        </td>
                                        <td class="manage-td"><a class="btn btn-warning glyphicon glyphicon-edit"
                                                                 href="{{route('projects.edit',$project->id)}}"></a>
                                        </td>
                                        <td class="manage-td">
                                            <form method="post" action="{{route('projects.destroy',$project->id)}}">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit"
                                                        class="btn btn-danger glyphicon glyphicon-trash"></button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <h2>
                        <a class="btn btn-success glyphicon  glyphicon-plus pull-right"
                           href="{{route('projects.create')}}"></a>
                    </h2>
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
