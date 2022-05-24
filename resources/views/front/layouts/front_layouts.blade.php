<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SASHA - eCommerce Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce Website" name="keywords">
    <meta content="eCommerce Website" name="description">

    <!-- Favicon -->
    <link href="{{ asset('frontend/img/favicon.ico') }}" rel="icon">

    <!-- AJAX REQUIRE -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>        <!-- Bootstrap -->


    <!-- Bootstrap -->
    <!-- drop down -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap/css/bootstrap.min.css')}}">
{{--    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}} ">--}}
{{--    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">--}}

<!-- Box icons -->
    <link rel="stylesheet" href="{{ asset('frontend/lib/boxicons/boxicons.min.css') }}"/>
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/> --}}
{{-- <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> --}}

<!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{asset('fonts/tajawal/tajawal.css')}}" rel="stylesheet">

    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">


    <!-- CSS Libraries -->
    <link href="{{ asset('frontend/lib/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/slick/slick-theme.css') }}" rel="stylesheet">

    <!-- Render All Elements Normally -->
    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">

    <!-- OwlCarousel -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">

    <!-- Chat-->
    <link rel="stylesheet" href="{{ asset('frontend/chat/css/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/chat/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/chat/css/typing.css') }}">

    <!-- Toastr & Sweetalert Libs -->
    <link rel="stylesheet" href="{{ asset('frontend/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sweetalert1.0.1.min.css') }}">

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/sidenav.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/headerMobile.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/newHeader.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/notification.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/cart.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/order.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/checkout.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/checkout-button.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/productstyle.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/setting.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/settingMobile.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/about.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/personalPage.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/personalPageMobile.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/services.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/category.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/basic.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/faq.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/contactUs.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/report.css') }}">

    @yield('styles')

    <style>
        :root {
            --background: white;
        }
    </style>

</head>

<body style="padding-top: 30px; background: var(--background);">

@include('front.layouts.header')

@include('front.layouts.sidebar')

@yield('front_content')

@include('front.layouts.footer')

@include('front.chat.chat')

<!-- Jquery & Bootstrap Libraries -->
{{--<script src="{{ asset('frontend/js/jquery/jquery-3.6.0.min.js') }}"></script>--}}
{{-- <script src="{{ asset('frontend/js/popper.min.js') }}"></script> --}}


<script src="{{ asset('frontend/js/jquery/jquery-3.4.1.min.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

<!-- Easing Library -->
<script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>

<!-- Slick Library -->
<script src="{{asset('frontend/lib/slick/slick.min.js')}}"></script>

<!-- boxicons Library -->
<script src="{{ asset('frontend/lib/boxicons/boxicons.js') }}"></script>

{{--<!-- Basic Template Javascript -->--}}
{{--<script src="{{asset('frontend/js/main-style.js')}}"></script>--}}


<!-- Template Javascript -->
<script src="{{asset('frontend/js/main style.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="{{asset('frontend/js/backToTop.js')}}"></script>
<script src="{{asset('frontend/js/sidenav.js')}}"></script>
<script src="{{asset('frontend/js/notification.js')}}"></script>
<script src="{{asset('frontend/js/order.js')}}"></script>
<!-- <script src="{{asset('frontend/js/checkout.js')}}"></script> -->
<script src="{{asset('frontend/js/product.js')}}"></script>
<script src="{{asset('frontend/js/setting.js')}}"></script>
<script src="{{asset('frontend/js/personalPage.js')}}"></script>
<script src="{{asset('frontend/js/darkMode.js')}}"></script>

<!-- Category Javascript -->
<script src="{{ asset('frontend/js/categoryjs/jquery.superslides.min.js')}}"></script>
<script src="{{ asset('frontend/js/categoryjs/inewsticker.js')}}"></script>
<script src="{{ asset('frontend/js/categoryjs/images-loded.min.js')}}"></script>
<script src="{{ asset('frontend/js/categoryjs/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/js/categoryjs/baguetteBox.min.js')}}"></script>
<script src="{{ asset('frontend/js/categoryjs/jquery-ui.js')}}"></script>
<script src="{{ asset('frontend/js/categoryjs/category.js')}}"></script>
<script src="{{ asset('frontend/js/categoryjs/custom.js')}}"></script>

<!-- Chat -->
<script src="{{ asset('frontend/chat/js/Chat.js') }}"></script>
<script type="text/javascript">
    const chatButton = document.querySelector('.chatbox__button');
    const chatContent = document.querySelector('.chatbox__support');
    const icons = {
        isClicked: '<img src="{{ asset('frontend/chat/images/icons/chatbox-icon.svg') }}" />',
        isNotClicked: '<img src="{{ asset('frontend/chat/images/icons/chatbox-icon.svg') }}" />'
    }
    const chatbox = new InteractiveChatbox(chatButton, chatContent, icons);
    chatbox.display();
    chatbox.toggleIcon(false, chatButton);
</script>

{{-- Sweet Alerts--}}
<script src="{{ asset('frontend/js/notify/toastr.min.js')}}"></script>
<script src="{{ asset('frontend/js/notify/sweetalert2@9.js')}}"></script>
<script src="{{ asset('frontend/js/notify/sweetalert.min.js')}}"></script>

<script>
    @if(Session::has('message'))
    let type = "{{Session::get('alert-type','info')}}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

<script>
    $(document).on("click", "#delete", function (e) {
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
        $(document).on('click', '.add_to_wishlist', function (e) {
            e.preventDefault();

            var product_id = $(this).attr('product_id');

            if (product_id) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('add.wishlist') }}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id': product_id
                    },
                    success: function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                icon: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.error
                            })
                        }
                    }
                    ,   error:function (reject){
                        if(reject){

                            alert('يجب تسجيل الدخول اولا');

                            location.href='{{ route('get_login') }}';

                        }

                    }

                });

            } else {
                alert('danger');


            }
        });




        $(document).on('click', '.add-to-cart', function (e) {
            e.preventDefault();

            var product_id = $(this).attr('product_id');

            if (product_id) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('add.shopping.cart') }}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id': product_id
                    },
                    success: function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                icon: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.error
                            })
                        }
                    },


                });

            } else {
                alert('danger');
            }

        });

    });

    $(document).on('click', '.follow-button', function (e) {
        e.preventDefault();

        var product_id = $(this).attr('product_id');

        if (product_id) {
            $.ajax({
                type: 'POST',
                url: "{{ route('is.wanted') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': product_id
                },
                success: function (data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error
                        })
                    }
                },


            });

        } else {
            alert('danger');
        }

    });

    $(document).on('click', '.follow-brand', function (e) {
        e.preventDefault();

        var Brand_id = $(this).attr('brand_id');

        if (product_id) {
            $.ajax({
                type: 'POST',
                url: "{{ route('is.wanted') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id_brand': Brand_id
                },
                success: function (data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error
                        })
                    }
                },


            });

        } else {
            alert('danger');
        }



    });


    $(document).on('click', '.unfollow', function (e) {
        e.preventDefault();

        var Brand_id = $(this).attr('brand_id');

        if (product_id) {
            $.ajax({
                type: 'POST',
                url: "{{ route('unfollow') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id_brand': Brand_id
                },
                success: function (data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error
                        })
                    }
                },


            });

        } else {
            alert('danger');
        }



    });

</script>

<script>
    $(document).on('click', '.search-field', function (e) {
        e.preventDefault();
        let SearchValue = $('.SearchValue').val();

        $.ajax({
            type: 'POST',
            url: "{{ route('store.history') }}",
            data: {
                '_token': "{{ csrf_token() }}",
                'search_value': SearchValue
            },
            success: function () {
                if (SearchValue)
                    location.href = 'http://localhost:8000/product-Search/' + SearchValue;
            }
        });

    });

</script>

@auth('web')
{{--    <script src="{{ asset('frontend/js/jquery/jquery-3.4.1.min.js') }}"></script>--}}

    <script>

        setInterval(function() {


                $.ajax({
                    type:'post',
                    url:"{{route('check')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                    },
                    success:function (data){

                        //var d = $('.coten_not').empty();


                        if(data.count > 0){
                            $('.count_new').text(data.count);
                        }
                        if(data.countMasg > 0){
                            $('.count_massges').text(data.countMasg);
                        } else {
                            $('.count_massges').text('');
                        }
                    },
                    error:function (reject){
                        if(reject){
                        }
                    }
                });

            }
            , 1000 * 60 *0.09 );

        // where X is your every X minutes
    </script>


    <script>
        $(document).on('click', '.note', function (e) {
            e.preventDefault();
            $('.count_new').text('');
            console.log('hhhhhhhhhhhhhhhhhh');

            $.ajax({
                type:'get',
                url:"{{route('newNot')}}",

                success:function (data){
                    if(data.status==true) {
                        $.each(data.data, function (key, value) {
                            $('.coten_not').append( value.masg );
                        });

                    }


                },
                error:function (reject){
                    if(reject){


                    }
                }
            });

        });
    </script>

@endauth

@yield('script')

</body>
</html>



