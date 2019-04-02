@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <ol style="margin: 0;" class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">My clients</li>
        </ol>
        <section class="content-header">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 style="margin: 0;">
                        Clients

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
                <div class="col-md-12">
                    @include('notifications.session')
                </div>
                <div class="col-xs-12">
                    <div class="box box-success box-solid">
                        <div class="box-header">
                            <h3 class="box-title">All clients <strong>{{count($clients)}}</strong></h3>

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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th><i class="fa fa-envelope" aria-hidden="true"></i> Email</th>
                                    <th><i class="fa fa-user" aria-hidden="true"></i> Contact Person</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($clients as $client)

                                    <tr>
                                        <td>{{$client->id}}</td>
                                        <td><a href="{{url('clients', $client->id)}}">{{$client->name}}</a></td>
                                        <td><a href="mailto:{{$client->email}}">{{$client->email}}</a></td>
                                        <td>{{$client->contact_person}}</td>
                                        <td class="manage-td"><a class="btn btn-warning glyphicon glyphicon-edit"
                                                                 href="{{route('clients.edit',$client->id)}}"></a></td>
                                        <td class="manage-td">
                                            <form method="post" action="{{route('clients.destroy',$client->id)}}">
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
