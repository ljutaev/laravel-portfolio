@extends('layouts.auth')

@section('title') Login Page @endsection 

@section('content')
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                    @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" tabindex="1" required autofocus>
                    @if($errors->has('email'))
                    <code>{{ $errors->first('email') }}</code>
                    @endif
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">{{ __('Password') }}</label>
                        @if (Route::has('password.request'))
                      <div class="float-right">
                        <a href="{{ route('password.request') }}" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                      @endif
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    @if($errors->has('password'))
                        <code>{{ $errors->first('password') }}</code>
                    @endif
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input  type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">{{ __('Remember me') }}</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      {{ __('Login') }}
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="{{ route('register') }}">Create One</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla {{ date('Y') }}
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection