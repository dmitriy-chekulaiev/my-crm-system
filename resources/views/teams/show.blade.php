@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <ol style="margin: 0;" class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('projects.index')}}">My teams</a></li>
            <li class="active">{{$team->name}}</li>
        </ol>
        <section class="content-header">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 style="margin: 0;">
                        {{$team->name}}
                    </h3>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-4">
                    <?php if ($myTeam) : ?>
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{count($users)}}</h3>
                            <p>Members</p>
                            <a style="color: #fff; font-size: 20px;" href="{{route('teams.invite')}}">Invite member</a>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                    <?php endif;?>
                    <div class="box box-danger ">
                        <div class="box-header with-border">
                            <h3 class="box-title">Members</h3>

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
                                           href="{{route('profile.show',$user->profile->id)}}">{{$user->profile->firstname}} {{$user->profile->lastname}}</a>
                                        <span class="users-list-date">{{config('enums.position')[$user->profile->position]}}</span>
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
