@extends('layouts.auth')

@section('title') Forgot Password @endsection

@section('content')
<section class="section">
    <div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand">
            <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
        </div>

        <div class="card card-primary">
            <div class="card-header"><h4>{{ __('Forgot Password') }}</h4></div>

            <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @else
                <p class="text-muted hidden d-none">{{ __('We will send a link to reset your password') }}</p>
            @endif
            

            <form method="POST"  action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{old('email')}}" tabindex="1" required autofocus>
                @if($errors->has('email'))
                    <code>{{ $errors->first('email') }}</code>
                @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    {{ __('Forgot Password') }}
                    </button>
                </div>
            </form>
            </div>
        </div>
        <div class="simple-footer">
            Copyright &copy; Stisla {{ date('Y') }}
        </div>
        </div>
    </div>
    </div>
</section>
@endsection