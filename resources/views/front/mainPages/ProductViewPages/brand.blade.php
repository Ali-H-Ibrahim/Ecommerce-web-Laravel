@extends('front.layouts.front_layouts')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/brand.css') }}">
@endsection

@section('front_content')
    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="{{route('show.products.brand',$brand -> id)}}">
                            <img src="{{asset("images/brands/logo/".$brand->logo)}}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="text">
                        <p>{{$brand -> name}} is</p>
                        <p>
                            <span class="word wisteria">Reliability.</span>
                            <span class="word belize">Wonderful.</span>
                            <span class="word pomegranate">Comfort.</span>
                            <span class="word green">Beautiful.</span>
                            <span class="word midnight">Cheap.</span>
                        </p>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="user">
                        <button class="follow">
                            <span class="msg-follow">Follow</span>
                            <span class="msg-following follow-brand" brand_id="{{$brand -> id}}">Following</span>
                            <span class="msg-unfollow unfollow" brand_id="{{$brand -> id}}">Unfollow</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->
    <br>
    <!-- Main Slider Start -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="image-div">
                        <img src="{{asset("images/brands/photo/".$brand->image)}}" alt="Logo">
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="description">
                        <p>{{$brand ->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->

    <!-- About Start-->
    <div id="about" class="counter">
        <div class="container">
            <div class="row">
                <div class="text-container">
                    <hr style="border:3px solid #f1f1f1">
                </div>
            </div>
        </div>
    </div>
    <!-- About End-->

    <section class="brand-category" id="brand-category">

        <h1 class="heading"><span> Products In {{$brand -> name}} </span></h1>

        <ul class="controls">
            <li class="btn button-active filter_all" id="category" value="0" data-filter="all">All</li>
            @if(isset($categories)&&$categories->count()>0)
                @foreach($categories as $category)
                <li class="btn filter_all" id="category" value="{{$category->id}}">{{$category -> name}}</li>
                @endforeach
            @endif
        </ul>

        <div class="box-container">
            <div class="row" id = "filtered_data">
                @foreach($products as $product)
                    <div class="box">
                        <div class="product">
                            <div class="product-header">
                                <img src="{{asset("images/Product/main_photo/".$product->main_img)}}">
                                <ul class="icons">
                                    <span class="add_to_wishlist" product_id="{{ $product -> id }}"><i
                                        class=" bx bx-heart"></i></span>
                                    <span class="add-to-cart" product_id="{{ $product -> id }}"><i
                                        class="bx bx-shopping-bag"></i></span>
                                    <span><i class="bx bx-search"
                                        onclick="location.href='{{ route('preview.product', $product -> id) }}'"></i></span>
                                </ul>
                            </div>
                            <div class="product-footer">
                                <a href="#">
                                    <h3>{{$product -> name}}</h3>
                                </a>
                                <div class="subinfo">
                                    <div class="rating">
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bx-star"></i>
                                    </div>
                                    <h4 class="price">${{$product -> price}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-12">
            <ul class="pages">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
        </div>


    </section>


@endsection

@section('script')
    <script src="{{ asset('frontend/js/brand.js') }}"></script>

    <script type = "text/javascript">

        $(document).ready(function(){
            filter_data(0);

            function filter_data(category) {
                $('#filtered_data');
                var category = category;
                var products = {{ json_encode($productsIds) }};

                $.ajax({
                    url : "{{route('filter.brands')}}",
                    type: "get",
                    dataType : "html",
                    data : {
                        category : category,
                        products : products,
                    },
                    success: function(data) {
                        $('#filtered_data').html(data);
                    }
                });
            }

            $('.filter_all').click(function() {
                filter_data($(this).val());
            });
        });
    </script>

@endsection
