@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit <strong>{{$project->name}}</strong> Project
            </h1>

            {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
            {{--<li><a href="#">Examples</a></li>--}}
            {{--<li class="active">User profile</li>--}}
            {{--</ol>--}}
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <form method="post" action="/projects/{{$project->id}}">
                        {{method_field('PUT')}}
                        @csrf

                        <div class="form-group">
                            <label for="name">{{('Name')}}</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$project->name}}">
                            @if($errors->has('name'))
                                <span class="text-danger"> {{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="client">{{('Client')}}</label>
                            <select name="client" id="client" class="form-control">
                                <option selected disabled value="">{{('Select client')}}</option>
                                @foreach($clients as $client)
                                    <option @if($project->client_id == $client->id) selected
                                            @endif value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('client'))
                                <span class="text-danger"> {{ $errors->first('client') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">{{('Description')}}</label>
                            <textarea name="description" class="form-control" id="description"
                                      value="{{$project->description}}">{{$project->description}}</textarea>
                            @if($errors->has('description'))
                                <span class="text-danger"> {{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="estimation">{{('Estimation')}}</label>
                            <input type="text" name="estimation" class="form-control" id="estimation"
                                   value="{{$project->estimation}}">
                            @if($errors->has('estimation'))
                                <span class="text-danger"> {{ $errors->first('estimation') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="time_spent">{{('Spent')}}</label>
                            <input type="text" name="time_spent" class="form-control" id="time_spent"
                                   value="{{$project->time_spent}}">
                            @if($errors->has('time_spent'))
                                <span class="text-danger"> {{ $errors->first('time_spent') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="status">{{('Status')}}</label>
                            <select name="status" id="status" class="form-control">
                                @foreach (config('enums.projectStatus') as $status)
                                    <option @if ($project->status == $status) selected @endif value="{{$project->status}}">
                                        {{$status}}
                                    </option>
                                @endforeach


                            </select>
                            @if($errors->has('status'))
                                <span class="text-danger"> {{ $errors->first('status') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                        </div>

                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
