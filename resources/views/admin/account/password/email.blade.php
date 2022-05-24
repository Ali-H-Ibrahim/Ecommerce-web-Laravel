
@extends('admin.layouts.adminAccountLayout.account_layout')

@section('admin_account_content')

	@if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

	@if (session('email_error'))
        <div class="alert alert-danger" role="alert">
            {{ session('email_error') }}
        </div>
    @endif

	@if (session('token_error'))
        <div class="alert alert-danger" role="alert">
            {{ session('token_error') }}
        </div>
    @endif



				<form id="loginForm" class="login100-form validate-form flex-sb flex-w" method="post" action="{{route('postForgotPassword')}}">
                @csrf


                    <span class="login100-form-title p-b-51"  >
						Forgot My Password
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
                        <input class="input100" type="email" name="email" placeholder="Email Address">
						@error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						<span class="focus-input100"></span>
                    </div>

					<div class="container-login100-form-btn m-t-17">
						<button style="background-color: #a02222" class="login100-form-btn" type="submit">
                            Get New Password
						</button>
					</div>
				</form>


@endsection
