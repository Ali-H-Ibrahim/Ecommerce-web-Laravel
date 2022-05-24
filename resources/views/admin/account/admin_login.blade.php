@extends('admin.layouts.adminAccountLayout.account_layout')

@section('admin_account_content')

    @if (session('login_error'))
        <div class="alert alert-danger" role="alert">{!! session('login_error') !!}</div>
    @endif

    @if (session('middleware_error'))
        <div class="alert alert-danger" role="alert">{!! session('middleware_error') !!}</div>
    @endif

    @if (session('register_success'))
        <div class="alert alert-success" role="alert">{!! session('register_success') !!}</div>
    @endif


    <form class="login100-form validate-form flex-sb flex-w"
          method="POST"
          id="loginForm"
          action="{{ route('adminLogin') }}">
        @csrf

        <span class="login100-form-title p-b-51">Login</span>

        <br>

        <div class="wrap-input100 validate-input m-b-16" data-validate="Email is required">
            <input class="input100" type="email" name="email" placeholder="Email Address">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <span class="focus-input100"></span>
        </div>


        <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
            <input class="input100" type="password" name="password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <span class="focus-input100"></span>
        </div>

        <div class="flex-sb-m w-full p-t-3 p-b-24">
            <div>
                <a href="{{ route('getForgotPassword') }}" class="txt1">
                    Forgot Your Password?
                </a>
            </div>
        </div>


        <div class="container-login100-form-btn m-t-17">
            <button style="background-color: #a02222" class="login100-form-btn red">
                Login
            </button>
        </div>
    </form>
@endsection
