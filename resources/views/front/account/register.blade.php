@extends('front.layouts.accountLayout.account_layout')

@section('styles')
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('frontend/login/images/icons/favicon.ico') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('frontend/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('frontend/login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('frontend/login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('frontend/login/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('frontend/login/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/css/main.css') }}">
    <!--===============================================================================================-->
@endsection

@section('account_content')

    @if (session('login_error'))
        <div class="alert alert-danger" role="alert">{!! session('login_error') !!}</div>
    @endif

    @if (session('middleware_error'))
        <div class="alert alert-danger" role="alert">{!! session('middleware_error') !!}</div>
    @endif

    @if (session('register_success'))
        <div class="alert alert-success" role="alert">{!! session('register_success') !!}</div>
    @endif


    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" method="POST"
                action="{{route('sign.up')}}">
                    @csrf
					<span class="login100-form-title p-b-49">
						Register
					</span>

                    <!-- First Name -->
                    <div class="wrap-input100 validate-input m-b-23" data-validate="First name is reauired">
                        <span class="label-input100">First Name</span>
                        <input class="input100" type="text" name="first_name" placeholder="first name">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <!-- Last Name -->
                    <div class="wrap-input100 validate-input m-b-23" data-validate="First name is reauired">
                        <span class="label-input100">Last Name</span>
                        <input class="input100" type="text" name="last_name" placeholder="last name">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <!-- Email Address -->
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Email is reauired">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="email address">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <!-- Password -->
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Type your password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <!-- Confirm Password -->
                    <div class="wrap-input100 validate-input" data-validate="confirmation is required">
                        <span class="label-input100"></span>
                        <input class="input100" type="password" name="confirm-password" placeholder="confirm password">
                        @error('confirm-password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Continue
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
                    </div>

                    <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                    </div>

                    <div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
                            Already Have An Account?
						</span>

                        <a href="{{route('get_login')}}" class="txt2">
                            Sign In
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>
@endsection

@section('script')
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/login/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/login/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('frontend/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/login/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/login/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/login/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/login/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
@endsection
