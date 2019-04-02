@extends('layouts.login')

@section('content')
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="{{ url('/') }}"><b>CRM</b>OtoTake</a>
        </div>
        <!-- User name -->
        {{--<div class="lockscreen-name">John Doe</div>--}}

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            {{--<div class="lockscreen-image">--}}
                {{--<img src="../../dist/img/user1-128x128.jpg" alt="User Image">--}}
            {{--</div>--}}
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div style="width: 100%;" class="input-group">

                    <input id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ $email ?? old('email') }}" placeholder="Email" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                </div>

                <div style="width: 100%;" class="input-group">
                    <input id="password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password" name="password"
                           required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('password') }}</strong>
                         </span>
                    @endif
                </div>

                <div style="width: 100%;" class="input-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           placeholder="Confirm Password" required>
                </div>

                <div style="width: 100%; background: #d2d6de; text-align: center;" class="input-group">

                    <button  style="width: 100%;" type="submit" class="input-group btn">
                        {{ __('Reset Password') }}
                    </button>
                </div>


            </form>
            <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
            Enter your password to retrieve your session
        </div>
        <div class="text-center">
            <a href="login.html">Or sign in as a different user</a>
        </div>
        <div class="lockscreen-footer text-center">
            Copyright © 2014-2016 <b><a href="https://adminlte.io" class="text-black">Almsaeed Studio</a></b><br>
            All rights reserved
        </div>
    </div>
@endsection
