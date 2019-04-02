@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add new Project
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

                    <form method="post" action="{{route('projects.store')}}">
                        {{method_field('POST')}}
                        @csrf
                        <div class="form-group">
                            <label for="name">{{('Name')}}</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="client">{{('Client')}}</label>
                            <select name="client" id="client" class="form-control">
                                <option selected value="">Select Client</option>
                                @foreach($clients as $client)
                                    <option @if (old('client') && $client->id == old('client')) selected
                                            @endif value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('client'))
                                <span class="text-danger">{{$errors->first('client')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">{{('Description')}}</label>
                            <textarea value="{{old('description')}}" name="description" class="form-control"
                                      id="description"></textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{$errors->first('description')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="estimation">{{('Estimation')}}</label>
                            <input value="{{old('estimation')}}" type="text" name="estimation" class="form-control"
                                   id="estimation">
                            @if ($errors->has('estimation'))
                                <span class="text-danger">{{$errors->first('estimation')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">{{('Submit')}}</button>
                        </div>

                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
