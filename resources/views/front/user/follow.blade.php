@extends('front.layouts.front_layouts')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/follow.css') }}">
@endsection

@section('front_content')
    <div class="follow-up">

        <div class="container-follow-up">

            <div class="top">
                <div class="title">
                    my subscriptions
                </div>
                <div class="img">
                    <img src="{{ asset('frontend/images/follow.png') }}" alt="">
                </div>
            </div>

            <div class="middle">

                <div class="brands">

                    <div class="title-brand">follow brands <span></span></div>

                    <div class="body-brand">
                        <div class="cards">
                            <div class="brand">

                                <div class="img"><img src="{{asset('frontend/images/brand1.png')}}" alt=""></div>
                                <div class="title">Adidas</div>
                                <div class="stop"><i class='bx bx-x'></i></div>

                            </div>
                            <div class="brand">

                                <div class="img"><img src="{{asset('frontend/images/brand1.png')}}" alt=""></div>
                                <div class="title">Adidas</div>
                                <div class="stop"><i class='bx bx-x'></i></div>

                            </div>
                            <div class="brand">

                                <div class="img"><img src="{{asset('frontend/images/brand1.png')}}" alt=""></div>
                                <div class="title">Adidas</div>
                                <div class="stop"><i class='bx bx-x'></i></div>

                            </div>
                            <div class="brand">

                                <div class="img"><img src="{{asset('frontend/images/brand1.png')}}" alt=""></div>
                                <div class="title">Adidas</div>
                                <div class="stop"><i class='bx bx-x'></i></div>

                            </div>
                            <div class="brand">

                                <div class="img"><img src="{{asset('frontend/images/brand1.png')}}" alt=""></div>
                                <div class="title">Adidas</div>
                                <div class="stop"><i class='bx bx-x'></i></div>

                            </div>
                            <div class="brand">

                                <div class="img"><img src="{{asset('frontend/images/brand1.png')}}" alt=""></div>
                                <div class="title">Adidas</div>
                                <div class="stop"><i class='bx bx-x'></i></div>

                            </div>
                            <div class="brand">

                                <div class="img"><img src="{{asset('frontend/images/brand1.png')}}" alt=""></div>
                                <div class="title">Adidas</div>
                                <div class="stop"><i class='bx bx-x'></i></div>

                            </div>
                            <div class="brand">

                                <div class="img"><img src="{{asset('frontend/images/brand1.png')}}" alt=""></div>
                                <div class="title">Adidas</div>
                                <div class="stop"><i class='bx bx-x'></i></div>

                            </div>
                            <div class="brand">

                                <div class="img"><img src="{{asset('frontend/images/brand1.png')}}" alt=""></div>
                                <div class="title">Adidas</div>
                                <div class="stop"><i class='bx bx-x'></i></div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="products">

                    <div class="title-product">follow products <span></span></div>

                    <div class="groub">

                        <div class="inner-groub">

                            <div class="box">
                                <div class="product">
                                    <div class="product-header">
                                        <div class="new">NEW</div>
                                        <img src="{{asset('frontend/images/pic2.jpg')}}" alt="">
                                        <ul class="icons">
                                            <span><i class="bx bx-heart"></i></span>
                                            <span><i class="bx bx-shopping-bag"></i></span>
                                            <span><i class='bx bx-info-circle'></i></span>
                                        </ul>
                                    </div>
                                    <div class="product-footer">
                                        <a href="#">
                                            <h3>Boy’s T-Shirt</h3>
                                        </a>
                                        <div class="subinfo">
                                            <div class="rating">
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bx-star"></i>
                                            </div>
                                            <h4 class="price">$50</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="product">
                                    <div class="product-header">
                                        <div class="new">NEW</div>
                                        <img src="{{asset('frontend/images/pic2.jpg')}}" alt="">
                                        <ul class="icons">
                                            <span><i class="bx bx-heart"></i></span>
                                            <span><i class="bx bx-shopping-bag"></i></span>
                                            <span><i class='bx bx-info-circle'></i></span>
                                        </ul>
                                    </div>
                                    <div class="product-footer">
                                        <a href="#">
                                            <h3>Boy’s T-Shirt</h3>
                                        </a>
                                        <div class="subinfo">
                                            <div class="rating">
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bx-star"></i>
                                            </div>
                                            <h4 class="price">$50</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="inner-groub">

                            <div class="box">
                                <div class="product">
                                    <div class="product-header">
                                        <div class="new">NEW</div>
                                        <img src="{{asset('frontend/images/pic2.jpg')}}" alt="">
                                        <ul class="icons">
                                            <span><i class="bx bx-heart"></i></span>
                                            <span><i class="bx bx-shopping-bag"></i></span>
                                            <span><i class='bx bx-info-circle'></i></span>
                                        </ul>
                                    </div>
                                    <div class="product-footer">
                                        <a href="#">
                                            <h3>Boy’s T-Shirt</h3>
                                        </a>
                                        <div class="subinfo">
                                            <div class="rating">
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bx-star"></i>
                                            </div>
                                            <h4 class="price">$50</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="product">
                                    <div class="product-header">
                                        <div class="new">NEW</div>
                                        <img src="{{asset('frontend/images/pic2.jpg')}}" alt="">
                                        <ul class="icons">
                                            <span><i class="bx bx-heart"></i></span>
                                            <span><i class="bx bx-shopping-bag"></i></span>
                                            <span><i class='bx bx-info-circle'></i></span>
                                        </ul>
                                    </div>
                                    <div class="product-footer">
                                        <a href="#">
                                            <h3>Boy’s T-Shirt</h3>
                                        </a>
                                        <div class="subinfo">
                                            <div class="rating">
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bx-star"></i>
                                            </div>
                                            <h4 class="price">$50</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="groub">

                        <div class="inner-groub">

                            <div class="box">
                                <div class="product">
                                    <div class="product-header">
                                        <div class="new">NEW</div>
                                        <img src="{{asset('frontend/images/pic2.jpg')}}" alt="">
                                        <ul class="icons">
                                            <span><i class="bx bx-heart"></i></span>
                                            <span><i class="bx bx-shopping-bag"></i></span>
                                            <span><i class='bx bx-info-circle'></i></span>
                                        </ul>
                                    </div>
                                    <div class="product-footer">
                                        <a href="#">
                                            <h3>Boy’s T-Shirt</h3>
                                        </a>
                                        <div class="subinfo">
                                            <div class="rating">
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bx-star"></i>
                                            </div>
                                            <h4 class="price">$50</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="product">
                                    <div class="product-header">
                                        <div class="new">NEW</div>
                                        <img src="{{asset('frontend/images/pic2.jpg')}}" alt="">
                                        <ul class="icons">
                                            <span><i class="bx bx-heart"></i></span>
                                            <span><i class="bx bx-shopping-bag"></i></span>
                                            <span><i class='bx bx-info-circle'></i></span>
                                        </ul>
                                    </div>
                                    <div class="product-footer">
                                        <a href="#">
                                            <h3>Boy’s T-Shirt</h3>
                                        </a>
                                        <div class="subinfo">
                                            <div class="rating">
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bx-star"></i>
                                            </div>
                                            <h4 class="price">$50</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="inner-groub">

                            <div class="box">
                                <div class="product">
                                    <div class="product-header">
                                        <div class="new">NEW</div>
                                        <img src="{{asset('frontend/images/pic2.jpg')}}" alt="">
                                        <ul class="icons">
                                            <span><i class="bx bx-heart"></i></span>
                                            <span><i class="bx bx-shopping-bag"></i></span>
                                            <span><i class='bx bx-info-circle'></i></span>
                                        </ul>
                                    </div>
                                    <div class="product-footer">
                                        <a href="#">
                                            <h3>Boy’s T-Shirt</h3>
                                        </a>
                                        <div class="subinfo">
                                            <div class="rating">
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bx-star"></i>
                                            </div>
                                            <h4 class="price">$50</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="product">
                                    <div class="product-header">
                                        <div class="new">NEW</div>
                                        <img src="{{asset('frontend/images/pic2.jpg')}}" alt="">
                                        <ul class="icons">
                                            <span><i class="bx bx-heart"></i></span>
                                            <span><i class="bx bx-shopping-bag"></i></span>
                                            <span><i class='bx bx-info-circle'></i></span>
                                        </ul>
                                    </div>
                                    <div class="product-footer">
                                        <a href="#">
                                            <h3>Boy’s T-Shirt</h3>
                                        </a>
                                        <div class="subinfo">
                                            <div class="rating">
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bx-star"></i>
                                            </div>
                                            <h4 class="price">$50</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
