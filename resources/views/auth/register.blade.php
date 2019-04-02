@extends('layouts.login')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/') }}"><b>CRM</b>OtoTake</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>

            <form method="POST" action="{{ route('register') }}">

                @csrf

                <div class="form-group has-feedback">
                    <input id="firstname" type="text"
                           class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname"
                           value="{{ old('firstname') }}" required autofocus placeholder="First name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                    @if ($errors->has('firstname'))
                        <span style="display: block; padding: 5px 0 0" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('firstname') }}</strong>
                        </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <input id="lastname" type="text"
                           class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname"
                           value="{{ old('lastname') }}" required autofocus placeholder="Last name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                    @if ($errors->has('lastname'))
                        <span style="display: block; padding: 5px 0 0" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                    @endif

                </div>


                <div class="form-group has-feedback">
                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required autofocus placeholder="Your email">
                    <span class="glyphicon  glyphicon-envelope  form-control-feedback"></span>

                    @if ($errors->has('email'))
                        <span style="display: block; padding: 5px 0 0" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                </div>

                <div class="form-group has-feedback">

                    <select style="-webkit-appearance: none;" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}"  name="position" id="position">
                        <option value="developer">Developer</option>
                        <option value="designer">Designer</option>
                        <option value="project_manager">Project Manager</option>
                        <option value="qa">QA</option>
                    </select>

                    <span class="glyphicon  glyphicon-sunglasses  form-control-feedback"></span>

                    @if ($errors->has('position'))
                        <span style="display: block; padding: 5px 0 0" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('position') }}</strong>
                        </span>
                    @endif

                </div>

                <div class="form-group has-feedback">

                    <select style="-webkit-appearance: none;" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}"  name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="alien">Alien</option>
                        <option value="not_defined">I don't know</option>
                    </select>

                    <span class="glyphicon glyphicon-heart  form-control-feedback"></span>

                    @if ($errors->has('gender'))
                        <span style="display: block; padding: 5px 0 0" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif

                </div>


                <div class="form-group has-feedback">
                    <input id="password" type="text"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                           value="{{ old('password') }}" required autofocus placeholder="Your password">
                    <span class="glyphicon  glyphicon-lock  form-control-feedback"></span>

                    @if ($errors->has('password'))
                        <span style="display: block; padding: 5px 0 0" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required>
                    <span class="glyphicon  glyphicon-log-in  form-control-feedback"></span>
                </div>


                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            {{--<div class="social-auth-links text-center">--}}
                {{--<p>- OR -</p>--}}
                {{--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign--}}
                    {{--up using--}}
                    {{--Facebook</a>--}}
                {{--<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign--}}
                    {{--up using--}}
                    {{--Google+</a>--}}
            {{--</div>--}}

            @if (Route::has('login'))
                <a href="{{ route('login') }}">I already have a membership</a>
            @endif

        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
@endsection
