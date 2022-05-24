@extends('admin.layouts.adminAccountLayout.account_layout')

@section('admin_account_content')

<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Verify Your Email Address</div>
                   <div class="card-body">
                    @if (session('resent'))
                         <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    {{$token}}
                    <a href="{{ route('getResetPassword', $token) }}">Reset Password</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection