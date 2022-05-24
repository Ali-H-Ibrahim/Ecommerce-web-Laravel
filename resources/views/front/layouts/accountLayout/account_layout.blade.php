<!DOCTYPE html>
<html>

<head>
    <title>SASHA LOGIN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--	<link rel="icon" type="image/png" href="{{asset('backend/img/icons/favicon.ico')}}"/>--}}
    {{--	<link rel="stylesheet" type="text/css" href="{{asset('backend/bootstrap/css/bootstrap.min.css')}}">--}}
    {{--	<link rel="stylesheet" type="text/css" href="{{asset('backend/fonts/font-awesome.min.css')}}">--}}
    {{--	<link rel="stylesheet" type="text/css" href="{{asset('backend/fonts/icon-font.min.css')}}">--}}
    {{--	<link rel="stylesheet" type="text/css" href="{{asset('backend/bootstrap/css/animate.css')}}">--}}
    {{--	<link rel="stylesheet" type="text/css" href="{{asset('backend/bootstrap/css/hamburgers.min.css')}}">--}}
    {{--	<link rel="stylesheet" type="text/css" href="{{asset('backend/bootstrap/css/animsition.min.css')}}">--}}
    {{--	<link rel="stylesheet" type="text/css" href="{{asset('backend/bootstrap/css/select2.min.css')}}">--}}
    {{--	<link rel="stylesheet" type="text/css" href="{{asset('backend/bootstrap/css/daterangepicker.css')}}">--}}
    {{--	<link rel="stylesheet" type="text/css" href="{{asset('backend/bootstrap/css/util.css')}}">--}}
    {{--	<link rel="stylesheet" type="text/css" href="{{asset('backend/bootstrap/css/main.css')}}">--}}

    @yield('styles')


</head>


<body>


{{--		<div class="limiter">--}}
{{--		<div class="container-login100">--}}
{{--			<div class="wrap-login100 p-t-50 p-b-90">--}}
@yield('account_content')
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}


<div id="dropDownSelect1"></div>

<script src="{{asset('backend/bootstrap/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('backend/bootstrap/js/animsition.min.js')}}"></script>
<script src="{{asset('backend/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('backend/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/bootstrap/js/select2.min.js')}}"></script>
<script src="{{asset('backend/bootstrap/js/moment.min.js')}}"></script>
<script src="{{asset('backend/bootstrap/js/daterangepicker.js')}}"></script>
<script src="{{asset('backend/bootstrap/js/countdowntime.js')}}"></script>
<script src="{{asset('backend/bootstrap/js/main.js')}}"></script>

@yield('script')

</body>


