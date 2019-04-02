@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <ol style="margin: 0;" class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> My teams</a></li>
            <li class="active">Invite</li>
        </ol>
        <section class="content-header">
            <div class="row">
                <div class="col-md-12">
                    @include('notifications.session')
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 style="margin: 0;">
                        Invite new member to team
                    </h3>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="post" action="{{route('teams.sendInvite')}}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Invite</button>
                </div>

            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
