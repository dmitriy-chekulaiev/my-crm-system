@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add new Client
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

                    <form method="post" action="{{route('clients.store')}}">
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
                            <label for="email">{{('Email')}}</label>
                            <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone">{{('Phone')}}</label>
                            <input value="{{old('phone')}}" type="text" name="phone" class="form-control"
                                   id="estimation">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{$errors->first('phone')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="address">{{('Address')}}</label>
                            <textarea value="" name="address" class="form-control" id="address">{{old('address')}}</textarea>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{$errors->first('address')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="contact_person">{{('Contact Person')}}</label>
                            <input value="{{old('contact_person')}}" type="text" name="contact_person"
                                   class="form-control"
                                   id="contact_person">
                            @if ($errors->has('contact_person'))
                                <span class="text-danger">{{$errors->first('contact_person')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">{{('Create Client')}}</button>
                        </div>

                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
