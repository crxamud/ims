@extends('layouts.app')

@section('content')
<div class="login-box">
@if(Session::has('flash_message_error'))
    <div class="alert alert-error alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{!! session('flash_message_error')!!}</strong>
</div>
@endif
  <div class="login-logo" >
    <b  style = "color:blue;">Welcome To  <span style="color:red;"> IMS  </span> </b> 
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

       <form method="POST" action="{{ route('login') }}">
                        @csrf
        <div class="form-group has-feedback">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

          @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
          @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
          <span class="fa fa-lock form-control-feedback"></span>
        </div>

       
            <input type="submit" value="Sign In" class="btn btn-primary btn-block btn-flat"></button>
         
        </div>
      </form>

  
      <!-- /.social-auth-links -->
<!-- 
      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

@endsection
