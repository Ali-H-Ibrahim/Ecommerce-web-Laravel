@extends('front.layouts.front_layouts')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/settingNotification.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/settingNotificationMobile.css') }}">
@endsection

@section('front_content')

    <div class="setting-notification">

        <div class="container-setting-notification">

            <div class="top">
                <div class="img">
                    <img src="{{ asset('frontend/images/background-setting-notification.png') }}" alt="">
                </div>
                <div class="img2">
                    <img src="{{ asset('frontend/images/notification2.png') }}" alt="">
                </div>
                <div class="title">
                    Setting Notifications
                </div>
            </div>

            <div class="body">

                <div class="title">
                    <img src="{{ asset('frontend/images/bell3.gif') }}" alt="">
                    Alerts and reminders
                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>

                    <div class="text">
                        Warning, back to stock again <br>
                        Find out when your favorite products will be back in stock!
                    </div>
                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>

                    <div class="text">
                        Wishlist alert <br>
                        We'll send you a reminder to buy the products you've added to your wishlist!
                    </div>
                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>

                    <div class="text">
                        Warning, new discounts <br>
                        Find out when discounts will be available on your favorite products!
                    </div>
                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>

                    <div class="text">
                        Warning, products you followed <br>
                        Find out when discounts will be available on products you've followed!
                    </div>
                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>

                    <div class="text">
                        Warning, brands you followed <br>
                        Find out when discounts will be available on brands you've followed!
                    </div>
                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>

                    <div class="text">
                        Shopping Bag Alert <br>
                        We'll send you a reminder to buy the products you've added to your shopping bag!
                    </div>
                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>

                    <div class="text">
                        Warning, new discounts <br>
                        Find out when discounts will be available on our products!
                    </div>
                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>

                    <div class="text">
                        Warning, new products <br>
                        Find out when products will be available on our website!
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="setting-notification-mobile">

        <div class="container-setting-notification-mobile">

            <div class="top">

                <div class="title">

                    <div class="img-title"><img src="{{ asset('frontend/images/background3.png') }}" alt=""></div>
                    <div class="text">setting <br>notification</div>

                </div>

                <div class="img"><img src="{{ asset('frontend/images/notification2.png') }}" alt=""></div>

            </div>

            <div class="body">

                <div class="title">
                    <img src="{{ asset('frontend/images/bell3.gif') }}" alt="">
                    Alerts and reminders
                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>
                    Warning, back to stock again <br>
                    Find out when your favorite products will be back in stock!

                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>
                    Wishlist alert <br>
                    We'll send you a reminder to buy the products you've added to your wishlist!

                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>
                    Warning, new discounts <br>
                    Find out when discounts will be available on your favorite products!

                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>
                    Warning, products you followed <br>
                    Find out when discounts will be available on products you've followed!

                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>
                    Warning, brands you followed <br>
                    Find out when discounts will be available on brands you've followed!

                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>
                    Shopping Bag Alert <br>
                    We'll send you a reminder to buy the products you've added to your shopping bag!

                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>
                    Warning, new discounts <br>
                    Find out when discounts will be available on our products!

                </div>

                <div class="type">

                    <div class="switch active" onclick="this.classList.toggle('active');"></div>
                    Warning, new products <br>
                    Find out when products will be available on our website!

                </div>

            </div>

        </div>

    </div>
@endsection
