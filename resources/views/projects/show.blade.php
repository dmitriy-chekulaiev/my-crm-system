@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <ol style="margin: 0;" class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('projects.index')}}">My projects</a></li>
            <li class="active">{{$project->name}}</li>
        </ol>
        <section class="content-header">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 style="margin: 0;">
                        {{$project->name}} <span style="font-size: 10px; vertical-align: middle"
                          class="label label-success label-{{$project->status}}">{{config('enums.projectStatus')[$project->status]}}</span>
                        <div class="pull-right">
                            <div class="manage-div"><a class="btn btn-warning glyphicon glyphicon-edit" href="{{route('projects.edit',$project->id)}}"></a></div>
                            <div class="manage-div">
                                <form method="post" action="{{route('projects.destroy',$project->id)}}">
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
                <div class="col-md-12">
                    <p>
                        {{$project->description}}
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Project Users</h3>

                            <div class="box-tools pull-right">
                                <span class="label label-danger">{{count($users)}} Members</span>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding" style="">
                            <ul class="users-list clearfix">
                                @foreach($users as $user)
                                    <li>
                                        <img src="{{$user->profile->profile_image->profile->url}}" alt="User Image">
                                        <a class="users-list-name"
                                           href="{{route('profile.show', $user->id)}}">{{$user->profile->firstname}} {{$user->profile->lastname}}</a>
                                        <span class="users-list-date">{{ config('enums.position')[$user->profile->position] }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                        {{--<div class="box-footer text-center" style="">--}}
                            {{--<a href="javascript:void(0)" class="uppercase">View All Users</a>--}}
                        {{--</div>--}}
                        <!-- /.box-footer -->
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
