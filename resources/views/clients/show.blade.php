@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <ol style="margin: 0;" class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('clients.index')}}">My client</a></li>
            <li class="active">{{$client->name}}</li>
        </ol>
        <section class="content-header">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 style="margin: 0;">
                        {{$client->name}}
                        <div class="pull-right">
                            <div class="manage-div"><a class="btn btn-warning glyphicon glyphicon-edit"
                                                       href="{{route('clients.edit',$client->id)}}"></a></div>
                            <div class="manage-div">
                                <form method="post" action="{{route('clients.destroy',$client->id)}}">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger glyphicon glyphicon-trash"></button>
                                </form>
                            </div>
                        </div>
                    </h3>

                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Info</h3>
                        </div>
                        <div class="box-body">

                            <strong> Name</strong>
                            <p class="text-muted">
                                {{ $client->name }}
                            </p>
                            <hr>

                            <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                            <p class="text-muted">
                                <a href="mailto:{{ $client->email }}">{{ $client->email }}</a>
                            </p>

                            <hr>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>


                            <p class="text-muted">
                                {{ $client->address }}
                            </p>

                            <hr>

                            <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>

                            <p class="text-muted">{{ $client->phone }}</p>

                            <hr>

                            <strong><i class="fa fa-user margin-r-5"></i> Contact Person</strong>


                            <p class="text-muted">
                                {{ $client->contact_person }}
                            </p>

                            <hr>

                        </div>
                    </div>
                </div>
                @if (count($client->projects))
                    <div class="col-md-4">
                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Projects</h3>
                            </div>

                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                    </tr>

                                    @foreach($client->projects as $project)
                                        <tr>
                                            <td>{{$client->id}}</td>
                                            <td>
                                                <a href="{{route('projects.show',$project->id )}}">{{$project->name}}</a>
                                            </td>
                                            <td class="manage-td"><span style="font-size: 10px; vertical-align: middle"
                                                                        class="label label-success label-{{$project->status}}">{{config('enums.projectStatus')[$project->status]}}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                @endif

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
