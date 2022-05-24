@extends('front.layouts.front_layouts')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/personalPage.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/personalPageMobile.css') }}">
@endsection

@section('front_content')

    <!-- Start personal page laptop -->
    <div class="personal-page">
        <div class="div-bottom">
            <div class="container-personal-page">
                <div class="personal-row">

                    <div class="img">
                        <img src="{{ asset('frontend/images/background personal.PNG')}}" alt="">
                    </div>

                    <div class="info">

                        <div class="personal-picture">
                            <img src="{{ asset($user -> image) }}" class="img-profile" alt="">
                        </div>

                        <div class="account-name">
                            {{ $user -> first_name . ' ' . $user -> last_name }}
                        </div>

                        <div class="status-member">
                            {{ $user -> status }}
                        </div>

                    </div>
                </div>


                <table class="table-component">

                    <tr>

                        <td class="component">
                            <div class="personal-information">

                                <div class="property-card" id="id-per">
                                    <div class="property-image">
                                        <img src="{{asset('frontend/images/personalCard.png')}}" alt="">
                                    </div>
                                    <div class="property-description">
                                        <div class="title-card">
                                            Personal Information
                                        </div>
                                        <div class="info-card">
                                            EX: E-mail , Address , Phone number ...Etc
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </td>

                        <td class="component">
                            <div class="orders">

                                <div class="property-card" onclick="window.location=`{{ route('orders') }}`; ">
                                    <div class="property-image">
                                        <img src="{{asset('frontend/images/ordersCard.png')}}" alt="">
                                    </div>
                                    <div class="property-description">
                                        <div class="title-card">
                                            Your Orders
                                        </div>
                                        <div class="info-card">
                                            All Orders (received, shipped, returned and exchanged).
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="component">
                            <div class="setting">

                                <div class="property-card" onclick="window.location=`{{ route('settings') }}`; ">

                                    <div class="property-image">
                                        <img src="{{asset('frontend/images/settingCard.jpg')}}" alt="">
                                    </div>
                                    <div class="property-description">
                                        <div class="title-card">
                                            Setting
                                        </div>
                                        <div class="info-card">
                                            All your account settings.
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </td>
                    </tr>

                    <tr>

                        <td class="component">
                            <div class="Shopping-cart">

                                <div class="property-card"
                                     onclick="window.location=`{{ route('show.shopping.cart') }}`; ">
                                    <div class="property-image">
                                        <img src="{{asset('frontend/images/shoppingCard.png')}}" alt="">
                                    </div>
                                    <div class="property-description">
                                        <div class="title-card">
                                            My Shopping cart
                                        </div>
                                        <div class="info-card">
                                            All about my shopping cart.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </td>

                        <td class="component">
                            <div class="wish-list">

                                <div class="property-card" onclick="window.location=`{{ route('show.wish.list') }}`; ">
                                    <div class="property-image">
                                        <img src="{{asset('frontend/images/wish.jpg')}}" alt="">
                                    </div>
                                    <div class="property-description">
                                        <div class="title-card">
                                            Your Wish List
                                        </div>
                                        <div class="info-card">
                                            All your favorite requests.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="component">
                            <div class="Setting-notification">

                                <div class="property-card"
                                     onclick="window.location=`{{ route('settings.notification') }}`; ">
                                    <div class="property-image">
                                        <img src="{{asset('frontend/images/setting-not-2.png')}}" alt="">
                                    </div>
                                    <div class="property-description">
                                        <div class="title-card">
                                            Notification Management
                                        </div>
                                        <div class="info-card">
                                            All about notifications.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </td>

                    </tr>

                    <tr>

                        <td class="component">
                            <div class="Points-balance">

                                <div class="property-card" onclick="window.location=`{{ route('user.points') }}`; ">
                                    <div class="property-image">
                                        <img src="{{asset('frontend/images/pointCard.jpg')}}" alt="">
                                    </div>
                                    <div class="property-description">
                                        <div class="title-card">
                                            My points balance
                                        </div>
                                        <div class="info-card">
                                            All about my points balance.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </td>

                        <td class="component">
                            <div class="Search-history">

                                <div class="property-card" onclick="window.location=`{{ route('view.history') }}`; ">
                                    <div class="property-image">
                                        <img src="{{asset('frontend/images/searchCard.jpg')}}" alt="">
                                    </div>
                                    <div class="property-description">
                                        <div class="title-card">
                                            Search history
                                        </div>
                                        <div class="info-card">
                                            All about search history.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="component">
                            <div class="follow">

                                <div class="property-card" onclick="window.location=`{{ route('follow') }}`; ">
                                    <div class="property-image">
                                        <img src="{{asset('frontend/images/subscribe.jpg')}}" alt="">
                                    </div>
                                    <div class="property-description">
                                        <div class="title-card">
                                            My Subscriptions
                                        </div>
                                        <div class="info-card">
                                            All products and brands subscribed to.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>


    </div>
    <!-- End personal page laptop -->

    <!-- Start personal page mobile -->
    <div class="personal-page-mobile">
        <div class="container-personal-page-mobile">

            <div class="top-page">

                <div class="profile-photo">
                    <img src="{{ asset($user -> image) }}" class="img-profile" alt="">
                </div>
                <div class="profile-name">
                    {{ $user -> first_name . ' ' . $user -> last_name }}
                </div>
                <div class="status-member">
                    {{ $user -> status }}
                </div>

            </div>

            <div class="middle-page">
                <div class="container-middle-page">

                    <div class="title title-personal-info" onclick="openANDclosePersonalInfo()">
                        Personal information
                        <div class="open-close-personal-info">
                            <span class="open-icon-person">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </span>

                            <span class="close-icon-person">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-chevron-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="personal-info">

                        <div>
                            <table>
                                <tr>
                                    <td><img src="{{asset('frontend/img/name.jpg')}}" alt=""></td>
                                    <td>{{ $user -> first_name . ' ' . $user -> last_name }}</td>
                                </tr>
                            </table>
                        </div>

                        <div>
                            <table>
                                <tr>
                                    <td><img src="{{asset('frontend/img/email3.png')}}" alt=""></td>
                                    <td>{{ $user -> email }}</td>
                                </tr>
                            </table>
                        </div>

                        <div>
                            <table>
                                <tr>
                                    <td><img src="{{asset('frontend/img/phone.png')}}" alt=""></td>
                                    <td>@if($user -> address) {{ $user -> address -> mobile }} @endif</td>
                                </tr>
                            </table>
                        </div>

                        <div>
                            <table>
                                <tr>
                                    <td><img src="{{asset('frontend/img/gender4.jpg')}}" alt=""></td>
                                    <td>{{ $user -> gender }}</td>
                                </tr>
                            </table>
                        </div>

                        <div>
                            <table>
                                <tr>
                                    <td><img src="{{asset('frontend/img/address.jpg')}}" alt=""></td>
                                    <td>@if($user -> address) {{ $user -> address -> country }} @endif</td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <div class="title title-types-order" onclick="window.location=`{{ route('orders') }}`; ">
                        My Orders
                    </div>

                    <div class="title title-wish-list" onclick="window.location=`{{ route('show.wish.list') }}`; ">
                        Wish List
                    </div>

                    <div class="title title-shopping-cart"
                         onclick="window.location=`{{ route('show.shopping.cart') }}`; ">
                        Shopping Cart
                    </div>

                    <div class="title title-my-subscriptions" onclick="window.location=`{{ route('follow') }}`; ">
                        My Subscriptions
                    </div>
                    
                    <div class="title title-setting"
                         onclick="window.location=`{{ route('settings') }}`; ">
                        Setting
                    </div>

                    <div class="title title-point"
                         onclick="window.location=`{{ route('user.points') }}`; ">
                        Points Balance
                    </div>

                    <div class="title title-search-history"
                         onclick="window.location=`{{ route('view.history') }}`; ">
                        Search History
                    </div>

                    <div class="title title-privacy-protection">
                        Privacy and Protection
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- End personal page mobile -->

    <!-- Start the modal info in the personal page laptop -->
    <div class="person-info" id="myModal">
        <!-- Modal content -->
        <div class="container-info">
            <div class="info-header">
                <span class="close-info-modal">&times;</span>
                <h2>My information</h2>
            </div>

            <div class="img-modal">
                <img src="{{ asset('frontend/img/cvInformation.jpg')}}" alt="">
            </div>

            <div class="info-body">

                <table>
                    <tr>
                        <td>
                            <img src="{{ asset('frontend/img/name.jpg')}}" class="img-info" alt="">
                        </td>
                        <td><h4>{{ $user -> first_name . ' ' . $user -> last_name }}</h4></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td>
                            <img src="{{ asset('frontend/img/email3.png')}}" class="img-info" alt="">
                        </td>
                        <td><h4>{{ $user -> email }}</h4></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td>
                            <img src="{{ asset('frontend/img/phone.png')}}" class="img-info" alt="">
                        </td>
                        <td>                            
                            <h4>@if($user -> address) {{ $user -> address -> mobile }} @endif</h4>
                        </td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td>
                            <img src="{{ asset('frontend/img/gender4.jpg')}}" class="img-info" alt="">
                        </td>
                        <td><h4>{{ $user -> gender }}</h4></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td>
                            <img src="{{ asset('frontend/img/address.jpg')}}" class="img-info" alt="">
                        </td>
                        <td>                            
                            <h4>@if($user -> address) {{ $user -> address -> country }} @endif</h4>
                        </td>
                    </tr>
                </table>

            </div>
        </div>

    </div>
    <!-- End the modal info in the personal page laptop -->
@endsection

@section('script')
    <script src="{{asset('frontend/js/personalPage.js')}}"></script>
@endsection
