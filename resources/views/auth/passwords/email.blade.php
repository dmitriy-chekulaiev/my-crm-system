@extends('layouts.login')

@section('content')
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="{{ url('/') }}"><b>CRM</b>OtoTake</a>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

    <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">

            <!-- lockscreen credentials (contains the form) -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group">
                    <input id="email" type="email" placeholder="Your Email" require class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <div class="input-group-btn">
                        <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
            Enter your password to retrieve your session
        </div>
        <div class="text-center">
            <a href="{{ route('login') }}">Or sign in as a different user</a>
        </div>
        <div class="lockscreen-footer text-center">
            Copyright &copy; 2014-2016 <b><a href="https://adminlte.io" class="text-black"></a></b><br>
            All rights reserved
        </div>
    </div>
    <!-- /.center -->
@endsection

