
@extends('front.layouts.front_layouts')

@section('front_content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Search Results</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->


    <!-- Start Shop Page  -->
    <div class="shop-box">
        <div class="container">
            <div class="row">
                
                <!-- Side Bar Start -->
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                    
                        
                        <!-- Price Filter -->
                        <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Price</h3>
                            </div>
                            <div class="price-box-slider">
                                <div class="slide-range"></div>
                                <div class="price-range">
                                    <div class="inner-price-range">min price: <input  type="number" name="min_price" id="min_price" value="0" readonly style="border:0; color:#0191b4; font-weight:bold;"></div>
                                    <div class="inner-price-range">max price: <input  type="number" name="max_price" id="max_price" value="10000" readonly style="border:0; color:#0191b4; font-weight:bold;"></div>
                                </div>
                            </div>
                        </div>


                        <!-- Category Filter -->
                        <div class="filter-brand-left">
                            <div class="title-left">
                                <h3>Category</h3>
                            </div>
                            <div class="br-box">
                                <ul>
                                    @if(isset($categories)&&$categories->count()>0)
                                        @foreach($categories as $category)
                                            <li>
                                                <div class="form-check">
                                                    <input type="checkbox" class="filter_all" name="{{$category->name}}" id="category" value="{{$category->id}}">
                                                    <label>{{$category -> name}}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>


                        <!-- Brand Filter -->
                        <div class="filter-brand-left">
                            <div class="title-left">
                                <h3>Brand</h3>
                            </div>
                            <div class="br-box">
                                <ul>
                                    @if(isset($brands)&&$brands->count()>0)
                                        @foreach($brands as $brand)
                                            <li>
                                                <div class="form-check">
                                                    <input type="checkbox" class="filter_all" name="{{$brand->name}}" id="brand" value="{{$brand->id}}">
                                                    <label>{{$brand -> name}}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>


                        <!-- Sort By Filter -->
                        <div class="filter-brand-left">
                            <div class="title-left">
                                <h3>Sort By</h3>
                            </div>
                            <div class="br-box">
                                <ul>
                                    <li>
                                    <div class="form-check">
                                            <input type="radio" class="sortBy" name ="option" id="sort" value="Highest Price">
                                            <label>Highest Price</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" class="sortBy" name ="option" id="sort" value="Lowest Price">
                                            <label>Lowest Price</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" class="sortBy" name ="option" id="sort" value="Name Ascending">
                                            <label>Name Ascending</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" class="sortBy" name ="option" id="sort" value="Name Descending">
                                            <label>Name Descending </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input type="radio" class="sortBy" name ="option" id="sort" value="Most Recent">
                                            <label>Most Recent </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                

                <!-- Product Cards Display -->
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <section class="arrival" id="arrival">
                        <div class="box-container">
                            <div class = "text-center">
                                <img src="{{asset('frontend/img/loader.gif')}}" id = "loader" width = "200" style = "display:none;">
                            </div>
                            <div class="row" id = "filtered_data">
                                @if( isset($products) && $products -> count() > 0)
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
                                                        <span><i class="bx bx-info-circle"
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
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->


    <script type = "text/javascript">
        $(document).ready(function(){
        
            filter_data("Highest Price");

            function filter_data(sortBy) {
                $('#filtered_data');
                $('#loader').show();
                var sortBy = sortBy;
                var minPrice = $('#min_price').val();
                var maxPrice = $('#max_price').val();
                var category = getMyFilter('category');
                var brand = getMyFilter('brand');
                var products = <?php echo json_encode($productsIds); ?>;
                
                $.ajax({
                    url : "{{route('filter.search')}}",
                    type: "get",
                    dataType : "html",
                    data : {
                        sortBy : sortBy,
                        category : category,
                        brand : brand,
                        products : products,
                        minPrice : minPrice,
                        maxPrice : maxPrice,
                    }, 
                    success: function(data) {
                        $('#loader').hide();
                        $('#filtered_data').html(data);
                    }
                });
            }

            function getMyFilter(id){
                var filters = [];
                $('#'+id+':checked').each(function(){
                    filters.push($(this).val());
                });
                return filters;
            } 

            $('.slide-range').slider({
                range : true,
                min : 0,
                max : 10000,
                step : 100,
                values: [ 0, 10000 ],
                slide: function( event, ui ) {
                    $('#price-range').html("$" + ui.values[0] + " - $" + ui.values[1]);
                    $('#min_price').val(ui.values[0]);
                    $('#max_price').val(ui.values[1]);
                    filter_data("Highest Price");
                }
            });

            $('.sortBy').click(function() {
                sortBy = $(this).val();
                filter_data(sortBy);
            });
            
            $('.filter_all').click(function() {
                filter_data("Highest Price");
            });


            // $('#price_range').slider({
            //     range: true,
            //     min: 0,
            //     max: 10000,
            //     values: [3500, 6500],
            //     step: 10,
            //     stop: function(event, ui) {
            //         $('#amount').val("$" + ui.values[0] + " - $" + ui.values[1]);
            //     }
            //     $('#amount').val( "$" + $('#slider-range').slider("values",0)+" - $"+$('#slider-range').slider("values",1));
            //     filter_data();

            // });

        
        });

    </script>
@endsection
