@extends('layouts.app')

@section('content')


<div id="backimg">
<!-- <div id = "backimg" style="background:url('/svg/user-cover.jpg')"> -->
<div class="container">
<div class="login-box">
    <img src="/svg/avatar.png" class="avatar"><br>
       <center> <h3>Login Here</h3></center><br>
<form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form">
                        
                        <!-- Notification for post upload  -->
            @if (session('success_message'))
              <div class="alert alert-success">
                 {{ session('success_message') }}
               </div>
             @endif
<!-- end of Notification post upload  -->
                            <label for="email" class="col-md-6 col-form-label">Email Address</label>
                            <!-- <p>Email Address</p> -->
                            <div class="col-md-12">
                                <input id="email" type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" 
                                required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form">
                            <p><label for="password" class="col-md-4 col-form-label text-md-right">Password</label></p>

                            <div class="col-md-12">
                                <input id="password" type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-1 offset-md-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 offset-md-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <!-- sweet alert  -->
       @include('sweetalert::alert')
     <!-- sweet alert end -->
                    </div>
                    </div>

</div>
@endsection
