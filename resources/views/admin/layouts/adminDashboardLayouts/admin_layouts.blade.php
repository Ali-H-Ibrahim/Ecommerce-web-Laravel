<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
          content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">

    <title>  @yield('title',"SASHA | Admin") </title>
    <link rel="apple-touch-icon" href="{{asset('admin/images/ico/apple-icon-120.png')}}">
    <link rel="icon" href="{{ asset('frontend/img/favicon.ico')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/images/ico/favicon.ico')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/plugins/animate/animate.css')}}">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('admin/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('admin/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/charts/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/vendors/css/charts/chartist-plugin-tooltip.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/vendors/css/forms/toggle/bootstrap-switch.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/toggle/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/pages/chat-application.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/custom-rtl.css')}}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/pages/timeline.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/cryptocoins/cryptocoins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/extensions/datedropper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/extensions/timedropper.min.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/style-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/plugins/file-uploaders/dropzone.min.css')}}">
    <!-- END Custom CSS-->

	<!-- Toastr & Sweetalert Libs -->
    <link rel="stylesheet" href="{{ asset('frontend/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sweetalert1.0.1.min.css') }}">

    <link href="{{asset('fonts/cairo/cairo.css')}}" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
    <link href="{{ asset('backend/chat/style.css') }}" rel="stylesheet">
</head>
<body
    class="vertical-layout vertical-menu 2-columns  @if(Request::is('admin/users/tickets/reply*')) chat-application @endif menu-expanded fixed-navbar"
    data-open="click" data-menu="vertical-menu" data-col="2-columns">
<!-- fixed-top-->

@include('admin.layouts.adminDashboardLayouts.header')

@include('admin.layouts.adminDashboardLayouts.sidebar')

@yield('admin_content')

{{--@include('admin.chat.chat')--}}

@include('admin.layouts.adminDashboardLayouts.footer')


<!-- BEGIN VENDOR JS-->
<script src="{{asset('admin/vendors/js/vendors.min.js')}}" type="text/javascript"></script>

<!-- BEGIN VENDOR JS-->
<script src="{{asset('admin/vendors/js/tables/datatable/datatables.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('admin/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"
        type="text/javascript"></script>

<script src="{{asset('admin/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('admin/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('admin/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/js/scripts/forms/switch.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>

<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('admin/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>

<script src="{{asset('admin/vendors/js/extensions/datedropper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/vendors/js/extensions/timedropper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/vendors/js/extensions/dropzone.min.js')}}" type="text/javascript"></script>


<script src="{{asset('admin/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/js/scripts/pages/chat-application.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('admin/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/js/core/app.js')}}" type="text/javascript"></script>

<script src="{{asset('admin/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->

<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('admin/js/scripts/pages/dashboard-crypto.js')}}" type="text/javascript"></script>


<script src="{{asset('admin/js/scripts/tables/datatables/datatable-basic.js')}}"
        type="text/javascript"></script>
<script src="{{asset('admin/js/scripts/extensions/date-time-dropper.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script src="{{asset('admin/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>

<script src="{{asset('admin/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>

<script>
    $('#meridians1').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians2').timeDropper({
        meridians: true, setCurrentTime: false

    });
    $('#meridians3').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians4').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians5').timeDropper({
        meridians: true, setCurrentTime: false

    });
    $('#meridians6').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians7').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians8').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians9').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians10').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians11').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians12').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians13').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians14').timeDropper({
        meridians: true, setCurrentTime: false
    });
</script>

{{-- Sweet Alerts --}}
<script src="{{ asset('frontend/js/notify/toastr.min.js')}}"></script>
<script src="{{ asset('frontend/js/notify/sweetalert2@9.js')}}"></script>
<script src="{{ asset('frontend/js/notify/sweetalert.min.js')}}"></script>

<script>
    @if(Session::has('messege'))
    let type = "{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
    @endif
</script>

<script>
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
</script>

<script>

    $(document).ready(function () {

        let userId = -1;

        console.log('you clicked on user!!lllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll');


        $(document).on('click', '.usertese', function (e) {
            e.preventDefault();

            console.log('User Clicked!!!!!!!!!!');

            // let userId = get user_id
            userId = $(this).attr('user_id');
            console.log(userId);
            getMessages();


        });


        setInterval(function () {

                console.log(userId);

                $.ajax({
                    type: 'post',
                    url: "{{route('new_messages_check.admin')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'id_customer': userId,

                    },
                    CrossDomain: true,
                    dataType: 'json',
                    success: function (data, textStatus, xhr) {
                        console.log('fffffffffffffff')
                        $.each(data.data, function (key, value) {

                            $('.chat-content1').append(
                                `<div class="chat chat-left">
                                <div class="chat-avatar">
                                    <a class="avatar" data-toggle="tooltip" href="#"
                                    data-placement="left"title="" data-original-title="">
                                        <img src="{{ asset('')}}`+ value.image +`"alt="avatar"/>
                                    </a>
                                </div>
                                <div class="chat-body">
                                    <div class="chat-content">
                                        <p>`+value.message+`</p>
                                    </div>
                                </div>
                            </div>`);

                        });

                    },
                    error: function (reject) {
                        if (reject) {
                        }
                    }
                });

            }
            , 1000 * 60 * 0.009);


        function getMessages() {

            $.ajax({
                type: 'post',
                url: '{{route('get.message.admin')}}',
                data: {
                    '_token': "{{csrf_token()}}",
                    'user_id': userId
                },
                CrossDomain: true,
                dataType: 'json',
                success: function (data, textStatus, xhr) {

                    $('.chat-content1').empty();

                    $.each(data.data, function (key, value) {
                        if (value.page == 1)
                            $('.chat-content1').append(
                                `<div class="chat">
                                    <div class="chat-avatar">
                                          <a class="avatar" data-toggle="tooltip"
                                             href="#" data-placement="right" title=""
                                             data-original-title="">
                                            <img src="{{ asset('') }}`+ value.image +`" alt="avatar"/>
                                          </a>
                                     </div>
                                     <div class="chat-body">
                                          <div class="chat-content">
                                            <p>`+value.message+`</p>
                                          </div>
                                     </div>
                                 </div>`);
                        else
                            $('.chat-content1').append(
                                `<div class="chat chat-left">
                                    <div class="chat-avatar">
                                        <a class="avatar" data-toggle="tooltip" href="#"
                                           data-placement="left"title="" data-original-title="">
                                            <img src="{{ asset('')}}`+ value.image +`"alt="avatar"/>
                                            </a>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content">
                                        <p>`+value.message+`</p>
                                        </div>
                                    </div>
                                </div>`);

                    });

                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log('Error Something');
                }
            }).done(function (messages) {

            });

        }


        $(document).on('click', '.send-message-admin', function (e) {
            e.preventDefault();
            var SearchValue = $('#adminmessage').val();
            $('#adminmessage').val('');

            {{--//let image = {{ asset(Auth::user()->image) }};--}}

            $('.chat-content1').append(
                `<div class="chat">
                    <div class="chat-avatar">
                        <a class="avatar" data-toggle="tooltip" href="#"
                           data-placement="right" title="" data-original-title="">
                            <img src='{{ asset('') }}' alt="avatar"/>
                        </a>
                    </div>
                    <div class="chat-body">
                        <div class="chat-content">
                            <p>` + SearchValue + `</p>
                        </div>
                    </div>
                </div>`);

            console.log(userId);

            $.ajax({
                type: 'post',
                url: "{{route('send.message.admin')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'message': SearchValue,
                    'id_customer': userId,

                },
                success: function (data) {
                    if (data.status == true) {

                    }
                },
                error: function (reject) {
                    if (reject) {
                        $('#add_danger').show();
                    }
                }
            });


        });


    });// where X is your every X minutes

</script>

@yield('script')
</body>
</html>
