@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <ol style="margin: 0;" class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">My teams</li>
        </ol>
        <section class="content-header">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 style="margin: 0;">
                        Teams
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
                            <h3 class="box-title">All teams <strong>{{count($teams)}}</strong></h3>

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
                                    <th>Team ID</th>
                                    <th>Team Name</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($teams as $team)

                                    <tr>
                                        <td>{{$team->id}}</td>
                                        <td>
                                            <a href="{{route('teams.show', $team->id)}}">{{$team->name}}</a>
                                        </td>
                                        <td>
                                            @if($team->id == Auth::user()->own_team->id )
                                                <i class="fa fa-star yellow"></i>
                                            @endif
                                        </td>
                                        <td class="manage-td">
                                            <button type="submit"
                                                    class="btn btn-danger glyphicon glyphicon-trash"></button>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    {{--<h2 >--}}
                    {{--<a class="btn btn-success glyphicon  glyphicon-plus pull-right" href="{{route('projects.create')}}"></a>--}}
                    {{--</h2>--}}
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
