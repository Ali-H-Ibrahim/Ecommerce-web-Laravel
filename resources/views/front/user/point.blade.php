@extends('front.layouts.front_layouts')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/point.css') }}">
@endsection

@section('front_content')


    <!-- Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    <div class="point-page">

        <div class="container-point-page">

            <div class="top">
                <img src="{{ asset('frontend/images/background-point.png') }}" alt="">
                <div class="title">Point & Coupon</div>
            </div>

            <div class="point">

                <div class="container">

                    <div class="row">

                        <div class="col-md-6 img-point">
                            <img src="{{ asset('frontend/images/point.png') }}" alt="">
                        </div>

                        <div class="col-md-6 text-point">

                            <div class="mechanization">

                                <div class="tit">
                                    Points Mechanism:
                                </div>

                                <div class="text">
                                    When you pay in our store we will give you a point for every 5$ <br>
                                    Where you will be given a discount coupon according to the points you will get
                                </div>

                            </div>

                            <div class="title">
                                <div class="text">
                                    <img src="{{ asset('frontend/images/coin.gif') }}" alt="">
                                    Your Point:
                                </div>
                                <div class="answer">{{$user->user_points}} point</div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="coupon">

                <div class="container">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="title"><img src="{{ asset('frontend/images/coins.gif') }}" alt="">your coupons:</div>

                            <ul>

                                <li>
                                    <div class="part">
                                        <div class="code">
                                            <div class="icon"><i class='bx bxs-right-arrow'></i></div>
                                            <div class="text">code of coupon:</div>
                                            <div class="answer">351425</div>
                                        </div>
                                        <div class="rate">
                                            <div class="text">prorate:</div>
                                            <div class="answer">30%</div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="part">
                                        <div class="code">
                                            <div class="icon"><i class='bx bxs-right-arrow'></i></div>
                                            <div class="text">code of coupon:</div>
                                            <div class="answer">351425</div>
                                        </div>
                                        <div class="rate">
                                            <div class="text">prorate:</div>
                                            <div class="answer">30%</div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="part">
                                        <div class="code">
                                            <div class="icon"><i class='bx bxs-right-arrow'></i></div>
                                            <div class="text">code of coupon:</div>
                                            <div class="answer">351425</div>
                                        </div>
                                        <div class="rate">
                                            <div class="text">prorate:</div>
                                            <div class="answer">30%</div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="part">
                                        <div class="code">
                                            <div class="icon"><i class='bx bxs-right-arrow'></i></div>
                                            <div class="text">code of coupon:</div>
                                            <div class="answer">351425</div>
                                        </div>
                                        <div class="rate">
                                            <div class="text">prorate:</div>
                                            <div class="answer">30%</div>
                                        </div>
                                    </div>
                                </li>

                            </ul>

                        </div>

                        <div class="col-md-6 img">

                            <img src="{{ asset('frontend/images/cardImg.png') }}" alt="">

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>
@endsection
