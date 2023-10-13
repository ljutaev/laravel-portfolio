@extends('admin.layouts.layout')

@section('content')
<!-- Main Content -->

<section class="section">
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Profile</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Hi, {{$user->name}}</h2>
        <p class="section-lead">
            {{ __("Update your account's profile information and email address.") }}
        </p>

        <div class="row mt-sm-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Profile Information') }}</h4>
                    </div>
                    <div class="card-body">
                        @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 text-success">{{ __('Saved.') }}</p>
                        @endif
                        <form action="{{ route('profile.update') }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>{{__('Name')}}</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required="">
                                    @if($errors->has('email'))
                                    <code>{{ $errors->first('email') }}</code>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{__('Email')}}</label>
                                    <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control" required="">
                                    @if($errors->has('email'))
                                    <code>{{ $errors->first('email') }}</code>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Save Changes</button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Update Password') }}</h4>
                    </div>
                    <div class="card-body">
                        @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 text-success">{{ __('Saved.') }}</p>
                        @endif
                        <form action="{{ route('password.update') }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="form-group col-md-4 col-12">
                                    <label>{{__('Current Password')}}</label>
                                    <input type="password" name="current_password" class="form-control">
                                    @if($errors->updatePassword->has('current_password'))
                                    <code>{{ $errors->updatePassword->first('current_password') }}</code>
                                    @endif
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>{{__('New Password')}}</label>
                                    <input type="password" name="password" class="form-control">
                                    @if($errors->updatePassword->has('password'))
                                    <code>{{ $errors->updatePassword->first('password') }}</code>
                                    @endif
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>{{__('Confirm Password')}}</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                    @if($errors->updatePassword->has('password_confirmation'))
                                    <code>{{ $errors->updatePassword->first('password_confirmation') }}</code>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection('content')