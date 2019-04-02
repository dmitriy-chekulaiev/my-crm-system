@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                My Profile
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    @include('notifications.session')
                </div>
                <div class="col-md-4">

                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black"
                             style="background: url('../dist/img/photo1.png') center center;">
                            <h3 class="widget-user-username">{{ $profile->firstname }} {{ $profile->lastname }}</h3>
                            <h5 class="widget-user-desc">{{config('enums.position')[$profile->position]}}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{ $profile->profile_image->profile->url }}" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="box-header with-border">
                                <h3 class="box-title">About Me</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i> Position</strong>


                                <p class="text-muted">
                                    {{config('enums.position')[$profile->position]}}
                                </p>

                                <hr>
                                <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>


                                <p class="text-muted">
                                    {{ $profile->address }}
                                </p>

                                <hr>

                                <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>

                                <p class="text-muted">{{ $profile->phone }}</p>

                                <hr>

                                <strong><i class="fa fa-heart margin-r-5"></i> Gender</strong>

                                <p class="text-muted"> {{config('enums.gender')[$profile->gender]}}</p>

                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                                <p>
                                    <span class="label label-danger">UI Design</span>
                                    <span class="label label-success">Coding</span>
                                    <span class="label label-info">Javascript</span>
                                    <span class="label label-warning">PHP</span>
                                    <span class="label label-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim
                                    neque.</p>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab">General Settings</a></li>
                            <li><a href="#settings" data-toggle="tab">Profile Settings</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <form class="form-horizontal" method="post" action="/profile"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="firstname">{{('Firstname')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="firstname" id="firstname" class="form-control"
                                                   value="{{auth()->user()->profile->firstname}}">
                                            @if($errors->has('firstname'))
                                                <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="lastname">{{('Lastname')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="lastname" id="lastname" class="form-control"
                                                   value="{{auth()->user()->profile->lastname}}">
                                            @if($errors->has('lastname'))
                                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="position">{{('Position')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="position" id="position"
                                                   class="form-control not-edit"
                                                   value="{{config('enums.position')[auth()->user()->profile->position]}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="gender">{{('Gender')}}</label>
                                        <div class="col-sm-10">
                                            <select name="gender" class="form-control">
                                                <option @if(auth()->user()->profile->gender == 'not_defined') selected
                                                        @endif value="not_defined">{{('Not defined')}}</option>
                                                <option @if(auth()->user()->profile->gender == 'male') selected
                                                        @endif value="male">{{('Male')}}</option>
                                                <option @if(auth()->user()->profile->gender == 'female') selected
                                                        @endif value="female">{{('Female')}}</option>
                                                <option @if(auth()->user()->profile->gender == 'alien') selected
                                                        @endif value="alien">{{('Alien')}}</option>
                                            </select>
                                            @if($errors->has('gender'))
                                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="phone">{{('Phone')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                   value="{{auth()->user()->profile->phone}}">
                                            @if($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="address">{{('Address')}}</label>
                                        <div class="col-sm-10">
                                        <textarea name="address" id="address" class="form-control"
                                                  value="{{auth()->user()->profile->address}}">{{auth()->user()->profile->address}}</textarea>
                                            @if($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"
                                               for="profile_image">{{('Profile image')}}</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="profile_image" id="profile_image"
                                                   class="form-control">
                                            <span class="file-custom"></span>
                                            @if($errors->has('profile_image'))
                                                <span class="text-danger">{{ $errors->first('profile_image') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button class="btn btn-success" type="submit">{{__('Update')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail"
                                                   placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience"
                                                      placeholder="Experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills"
                                                   placeholder="Skills">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and
                                                        conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
