@extends('front.layouts.front_layouts')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
@endsection

@section('front_content')

    @if (session('error'))
        <div class="alert alert-danger" role="alert">{!! session('error') !!}</div>
    @endif


    <div class="slider-head">

        <div id="main-slider" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <!-- <h1>New discounts for <span>Ramdan</span> now with sasha store</h1> -->

                <div class="carousel-item  carousel-one active">
                    <div class="item">
                        <img src="{{ asset('frontend/images/home_img1.jpg')}}" alt="">
                        <div class="content">
                            <h3>heavy discounts</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, neque.</p>
                            <a href="#"><button class="btn">discover</button></a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item  carousel-two">
                    <div class="item">
                        <img src="{{ asset('frontend/images/home_img2.jpg')}}" alt="">
                        <div class="content">
                            <h3>heavy discounts</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, neque.</p>
                            <a href="#"><button class="btn">discover</button></a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item  carousel-three">
                    <div class="item">
                        <img src="{{ asset('frontend/images/home_img3.jpg')}}" alt="">
                        <div class="content">
                            <h3>heavy discounts</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, neque.</p>
                            <a href="#"><button class="btn">discover</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>

        </div>
    </div>


    <!-- deal section starts  -->
    <section class="deal" id="deal">
        <h1 class="heading"><span> best deals </span></h1>

        <div class="box-container">
            <div class="box">
                <img src="{{asset('frontend/images/deal1.jpg')}}" alt="">
                <div class="content">
                    <h3>latest laptop</h3>
                    <p>upto 25% off on first purchase</p>
                    <a href="#">
                        <button class="btn">explore</button>
                    </a>
                </div>
            </div>

            <div class="box">
                <img src="{{asset('frontend/images/deal2.jpg')}}" alt="">
                <div class="content">
                    <h3>new headphone</h3>
                    <p>upto 25% off on first purchase</p>
                    <a href="#">
                        <button class="btn">explore</button>
                    </a>
                </div>
            </div>

        </div>
    </section>



    <!-- Featured Product Start -->
    <div class="featured-product product">
        <div class="container-fluid">
            <h1 class="heading">
                <span>New Arrivals</span>
            </h1>
            <div class="row align-items-center product-slider product-slider-4">
                @foreach(getAllProducts()->sortByDesc('created_at') as $product)

                    <div class="col-lg-3">
                        <div class="box ">
                            <div class="product">
                                <div class="product-header">
                                    <div class="new">NEW</div>
                                    <img src="{{ asset("images/Product/main_photo/" . $product-> main_img) }}" alt="">
                                    <ul class="icons">
                                        <span class="add_to_wishlist" product_id="{{ $product -> id }}"><i
                                                class=" bx bx-heart"></i></span>
                                        <span class="add-to-cart" product_id="{{ $product -> id }}"><i
                                                class="bx bx-shopping-bag"></i></span>
                                        <span><i class="bx bx-info-circle"
                                                 onclick="location.href='{{ route('preview.product', $product -> id) }}'"></i></span>
                                    </ul>
                                </div>
                                <div class="product-footer">
                                    <a href="#">
                                        <h3>{{$product->name}}</h3>
                                    </a>
                                    <div class="subinfo">
                                        <div class="rating">
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bx-star"></i>
                                        </div>
                                        <h4 class="price">${{$product->price}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach


            </div>
        </div>
    </div>

    <!-- Featured Product End -->

    <section class="feature" id="feature">
        <h1 class="heading"><span>featured product</span></h1>
        @foreach(getFeaturedProducts() as $product)
            <div class="row">
                <div class="image-container">
                    <div class="big-image">
                        <img src="{{ asset("images/Product/main_photo/" . $product-> main_img) }}" alt="">
                    </div>
                    <div class="small-image">
                        <img class="image-active" src="{{ asset("images/Product/main_photo/" . $product-> main_img) }}"
                             alt="">
                        <img src="{{ asset("images/Product/main_photo/" . $product-> main_img) }}" alt="">
                        <img src="{{ asset("images/Product/main_photo/" . $product-> main_img) }}" alt="">
                        <img src="{{ asset("images/Product/main_photo/" . $product-> main_img) }}" alt="">
                    </div>
                </div>
                <div class="content">
                    <h3>{{ $product -> name }}</h3>
                    <div class="rating">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bx-star"></i>
                    </div>
                    <span>({{ $product -> rate_counts }}) reviews</span>
                    <p>{{ $product -> description }} </p>
                    <strong class="price mr-4">${{ $product -> price }}</strong>
                    <a class="btn btn-primary" href="">Buy now</a>
                </div>
            </div>
        @endforeach
    </section>
    <!-- -----------------------------------start gallary--------------------------- -->




    @foreach(getAllCategories() as $Category )
        @if(isset($Category)&&$Category->products()->count()>=4)
            <section class="gallery" id="gallery">
                <h1 class="heading"><span> {{$Category->name}} </span></h1>
                <div class="row align-items-center normal-slider  product-slider-4">


                    @foreach($Category->products()->paginate(10) as $product)
                        <div class="col-lg-3">
                            <div class="box ">
                                <div class="product">
                                    <div class="product-header">

                                        <img src="{{ asset("images/Product/main_photo/" . $product-> main_img) }}"
                                             alt="">
                                        <ul class="icons">
                                            <span class="add_to_wishlist" product_id="{{ $product -> id }}"><i
                                                    class=" bx bx-heart"></i></span>
                                            <span class="add-to-cart" product_id="{{ $product -> id }}"><i
                                                    class="bx bx-shopping-bag"></i></span>
                                            <span><i class="bx bx-info-circle"
                                                     onclick="location.href='{{ route('preview.product', $product -> id) }}'"></i></span>
                                        </ul>
                                    </div>
                                    <div class="product-footer">
                                        <a href="#">
                                            <h3>{{$product->name}}</h3>
                                        </a>
                                        <div class="subinfo">
                                            <div class="rating">
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bx-star"></i>
                                            </div>
                                            <h4 class="price">${{$product->price}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>


            </section>
        @endif
    @endforeach



    <!-- gallery section ends -->

    <!--banner-->
    <div class="banner-box f-slide-3">

        <div class="banner-text-container">
            <div class="banner-text">
                <span>Limited Offer</span>
                <div class="one-div">30% Off With</div>
                <div class="two-div">SASHA Store</div>
                <a href="#" class="banner-btn">Shop Now</a>
            </div>
        </div>

    </div>



    <!-- start information cards section -->
    <section class="information-cards">

        <div class="icons-container">

            <div class="groub">

                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <h3>fast delivery</h3>
                    <p>Our shipping services are fast so that your order is delivered to you as quickly as possible, no
                        later than a week</p>
                </div>

                <div class="icons">
                    <i class="fas fa-user-clock"></i>
                    <h3>24 x 7 support</h3>
                    <p>Our website and customer service are available 24 hours a day</p>
                </div>

            </div>

            <div class="groub">

                <div class="icons">
                    <i class="fas fa-money-check-alt"></i>
                    <h3>easy payments</h3>
                    <p>Payment is made in a secure manner</p>
                </div>

                <div class="icons">
                    <i class="fas fa-box"></i>
                    <h3>10 days replacements</h3>
                    <p>A product can be returned or exchanged within 10 days of receiving it</p>
                </div>

            </div>


        </div>

    </section>
    <!-- end information cards section -->


    <!-- Brand Start -->
    <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                <div class="brand-item"><img src="{{asset('frontend/img/brand-1.png')}}" alt=""></div>
                <div class="brand-item"><img src="{{asset('frontend/img/brand-2.png')}}" alt=""></div>
                <div class="brand-item"><img src="{{asset('frontend/img/brand-3.png')}}" alt=""></div>
                <div class="brand-item"><img src="{{asset('frontend/img/brand-4.png')}}" alt=""></div>
                <div class="brand-item"><img src="{{asset('frontend/img/brand-5.png')}}" alt=""></div>
                <div class="brand-item"><img src="{{asset('frontend/img/brand-6.png')}}" alt=""></div>
            </div>
        </div>
    </div>
    <!-- Brand End -->



@endsection

@section('script')
    <script src="{{asset('frontend/js/main-style.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
@endsection

