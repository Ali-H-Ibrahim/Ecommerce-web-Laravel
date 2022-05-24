@extends('admin.layouts.adminAccountLayout.account_layout')

@section('admin_account_content')
	
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form id="loginForm" class="login100-form validate-form flex-sb flex-w" method="post" action="{{ route('postResetPassword')}}">
                @csrf
				<input type="hidden" name="token" value="{{ $token }}">
                    <span class="login100-form-title p-b-51">
						Reset My Password
					</span>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
						@error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="focus-input100"></span>
					</div>
					

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Confrimation is required">
                        <input id="password-confirm" type="password" class="input100 @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    </div>


					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Reset Password
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
		
@endsection