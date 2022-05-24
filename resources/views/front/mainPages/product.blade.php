@extends('front.layouts.front_layouts')

@section('styles')
    <!-- <link rel="stylesheet" href="{{ asset('frontend/css/productstyle.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"> -->
@endsection

@section('front_content')

    @if (session('error'))
        <div class="alert alert-danger" role="alert">{!! session('error') !!}</div>
    @endif

    <!-- Start of Product Page -->
    <div class="main">
        <div class="product-detail">
            <div class="container">
                <div class="row ">
                    <div class="col-12">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <img src="{{ asset("images/Product/main_photo/". $product -> main_img) }}"
                                             alt="Product Image">
                                    </div>
                                    <div class="product-slider-single-nav normal-slider">
                                        @foreach($product -> images as $image)
                                            <div class="slider-nav-img">
                                                <img src="{{ asset("images/Product/images_Product/". $image -> img) }}"
                                                     alt="Product Image">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <h2 class="product-title">{{ $product -> name }}</h2>
                                        <button id="follow-button" class="btn follow-button"
                                                product_id="{{ $product -> id }}" >Follow</button>  
                                        <a href="{{route('show.products.brand',$product -> brand_id)}}" class="product-link">visit {{ $product -> brands -> name }}</a>
                                        <div class="product-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>4.7(21)</span>
                                        </div>

                                        <div class="product-price">
                                            <p class="last-price">Old Price: <span>${{ $product -> price }}</span></p>
                                            <p class="new-price">New Price: <span>$249.00 (5%)</span></p>
                                        </div>

                                        <div class="product-detail">
                                            <div class="text">
                                                <h2>about this item: </h2>
                                            </div>

                                            <p>{{ $product -> description }}</p>

                                            <ul>
                                                <li>
                                                    <div class="color-container">
                                                        <h3 class="title">Color</h3>
                                                        <div class="colors">
                                                        <span class="color active" primary="#2175f5"
                                                              color="blue"></span>
                                                            <span class="color" primary="#f84848" color="red"></span>
                                                            <span class="color" primary="#29b864" color="green"></span>
                                                            <span class="color" primary="#ff5521" color="orange"></span>
                                                            <span class="color" primary="#444" color="black"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="size-container">
                                                        <h3 class="title">Size</h3>
                                                        <div class="sizes">
                                                            <span class="size">7</span>
                                                            <span class="size">8</span>
                                                            <span class="size active">9</span>
                                                            <span class="size">10</span>
                                                            <span class="size">11</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>Available:
                                                    <span>
                                                        {{ ($product -> status)? 'in stock': 'not available' }}
                                                    </span>
                                                </li>
                                                <li>Category: <span>{{ $product -> subCategories -> name }}</span></li>
                                                <li>Shipping Area: <span>All over the world</span></li>
                                                <li>Shipping Fee: <span>Free</span></li>
                                            </ul>
                                        </div>

                                        <div class="purchase-info">
                                            <input type="number" min="0" value="{{ $product -> quantity }}">
                                            <button type="button" class="btn add-to-cart"
                                                    product_id="{{ $product -> id }}">
                                                Add to Cart <i class="fas fa-shopping-cart"></i>
                                            </button>
                                            <button type="button" class="btn add_to_wishlist"
                                                    product_id="{{ $product -> id }}">
                                                Add to favorite <i class="fas fa-heart"></i>
                                            </button>
                                        </div>

                                        <div class="social-links">
                                            <p>Share At: </p>
                                            <div class="icons">
                                                <a onclick="window.location = `https://www.facebook.com/sharer/sharer.php?u=` + encodeURIComponent('http://localhost:8000/') + `&display=popup`; " style="cursor: pointer;">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                                <a href="#"><i class="fab fa-whatsapp"></i></a>
                                                <a href="#"><i class="fab fa-telegram-plane"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Featured Product Start -->
                <div class="featured-product product">
                    <div class="container-fluid">
                        <h1 class="heading">
                            <span>Similar Product</span>
                        </h1>
                        <div class="row align-items-center product-slider product-slider-@if($Similar_Product->count() < 4){{$Similar_Product->count()}} @else{{4}}  @endif">
                            @foreach($Similar_Product as $similar_product)
                                <div class="col-lg-3">
                                    <div class="box">
                                        <div class="product">
                                            <div class="product-header">
                                                <div class="new">NEW</div>
                                                <img
                                                    src="{{ asset("images/Product/main_photo/" . $similar_product-> main_img) }}"
                                                    alt="product image">

                                                <ul class="icons">
                                                    <span class="add_to_wishlist" product_id="{{ $similar_product -> id }}">
                                                        <i class=" bx bx-heart"></i>
                                                    </span>
                                                    <span class="add-to-cart" product_id="{{ $similar_product -> id }}">
                                                        <i class="bx bx-shopping-bag"></i></span>
                                                    <span>
                                                        <i class="bx bx-search"
                                                           onclick="location.href='{{ route('preview.product', $similar_product -> id) }}'"></i>
                                                    </span>
                                                </ul>
                                            </div>
                                            <div class="product-footer">
                                                <a href="#">
                                                    <h3>{{ $similar_product -> name }}</h3>
                                                </a>
                                                <div class="subinfo">
                                                    <div class="rating">
                                                        <i class="bx bxs-star"></i>
                                                        <i class="bx bxs-star"></i>
                                                        <i class="bx bxs-star"></i>
                                                        <i class="bx bxs-star"></i>
                                                        <i class="bx bx-star"></i>
                                                    </div>
                                                    <h4 class="price">${{ $similar_product -> price }}</h4>
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


                <!-- reviews start -->
                <!-- ----------------------------- Opinions ---------------------------------- -->
                <h1 class="heading">
                    <span> Reviews </span>
                </h1>

                <div class="row align-items-center normal-slider  product-slider-3">
                    @foreach( $reviews as $review )
                        <div class="col-lg-3">
                            <div class="review">
                                <div class="head-review">
                                    <img
                                        src="{{ asset($review -> user -> image) }}"
                                        width="250px">
                                </div>

                                <div class="body-review">
                                    <div class="name-review">
                                        {{ $review -> user -> first_name . ' ' . $review -> user -> last_name }}
                                    </div>

                                    <div class="place-review">
                                        @if($review -> user -> admin)
                                            {{ 'Admin' }}
                                        @elseif($review -> user -> status)
                                            {{ $review -> user -> status }}
                                        @endif
                                    </div>

                                    <div class="rating">
                                        @for($i = 1; $i <= $review->rate ; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                        <!-- @if(is_float($review->rate))
                                            <i class="fas fa-star-half"></i>
                                        @endif -->
                                    </div>
                                    <div class="desc-review">
                                        {{ $review -> comment }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="tab-content">
                    <br>
                    <br>
                    <form id="reviewForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="reviews-submit">
                            <h4>Give your Review:</h4>
                            <div class="container-star">
                                <div class="star-widget form-group">
                                    <input type="radio" name="rate" value="5" id="rate-5">
                                    <label for="rate-5" class="fas fa-star"></label>
                                    <input type="radio" name="rate" value="4" id="rate-4">
                                    <label for="rate-4" class="fas fa-star"></label>
                                    <input type="radio" name="rate" value="3" id="rate-3">
                                    <label for="rate-3" class="fas fa-star"></label>
                                    <input type="radio" name="rate" value="2" id="rate-2">
                                    <label for="rate-2" class="fas fa-star"></label>
                                    <input type="radio" name="rate" value="1" id="rate-1">
                                    <label for="rate-1" class="fas fa-star"></label>
                                    <form action="#">
                                        <header></header>
                                    </form>

                                </div>
                            </div>
                            <div class="row form">
                                <div class="col-sm-6 form-group">
                                    <input type="text"
                                           name="name"
                                           @auth('web')
                                           value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}"
                                           @endauth
                                           placeholder="Name">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="email"
                                           name="email"
                                           @auth('web')
                                           value="{{ Auth::user()->email }}"
                                           @endauth
                                           placeholder="Email">
                                </div>

                                <div class="col-sm-12 form-group">
                                    <textarea placeholder="Review" id="review" name="review"></textarea>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <button class="btn"
                                            id="save-review"
                                            product_id="{{ $product -> id }}"
                                            type="submit">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    <!-- End of Product Page -->
@endsection

@section('script')
    <script src="{{ asset('frontend/js/product.js') }}"></script>
    <script src="{{ asset('frontend/js/main-style.js') }}"></script>

    <script>

        $(document).on('click', '#save-review', function (e) {
            e.preventDefault();

            let formData = new FormData($('#reviewForm')[0]);
            formData.append('product_id', $(this).attr('product_id'));
            formData.append('rate', document.querySelector('input[name="rate"]:checked').value);

            $.ajax({
                type: 'POST',
                url: "{{ route("add.review") }}",
                data: formData,
                enctype: "multipart/form-data",
                processData: false,
                contentType: false,
                cache: false,
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
                        Swal.fire({
                            icon: 'success',
                            title: data.success,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: data.error,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        Toast.fire({
                            icon: 'error',
                            title: data.error
                        })
                    }
                },
                error: function (reject) {
                    alert('danger');
                }

            });
        });

    </script>
@endsection
