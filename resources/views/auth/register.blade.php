@extends('layouts.auth')

@section('title') Register Page @endsection 

@section('content')

<section class="section">
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="login-brand">
          <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
        </div>

        <div class="card card-primary">
          <div class="card-header"><h4>Register</h4></div>

          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
              <div class="row">
                <div class="form-group col-6">
                  <label for="first_name">{{__('Name')}}</label>
                  <input id="first_name" value="{{ old('name') }}" type="text" class="form-control" name="name" autofocus>
                  @if($errors->has('password'))
                        <code>{{ $errors->first('name') }}</code>
                    @endif
                </div>
                <div class="form-group col-6">
                <label for="email">{{__('Email')}}</label>
                <input id="email" type="email" class="form-control" value="{{ old('email') }}" name="email">
                @if($errors->has('email'))
                        <code>{{ $errors->first('email') }}</code>
                    @endif
                </div>
              </div>

             
              

              <div class="row">
                <div class="form-group col-6">
                  <label for="password" class="d-block">Password</label>
                  <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                  @if($errors->has('password'))
                        <code>{{ $errors->first('password') }}</code>
                    @endif
                </div>
                <div class="form-group col-6">
                  <label for="password2" class="d-block">Password Confirmation</label>
                  <input id="password2" type="password_confirmation" class="form-control" name="password-confirm">
                  @if($errors->has('password_confirmation'))
                        <code>{{ $errors->first('password_confirmation') }}</code>
                    @endif
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                  Register
                </button>
              </div>
              </div>
            </form>
            
          </div>
          <div class="simple-footer">
          Copyright &copy; Stisla {{ date('Y') }}
        </div>
        </div>
        
      </div>
    </div>
  </div>
</section>

@endsection