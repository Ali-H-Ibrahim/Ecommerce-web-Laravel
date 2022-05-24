@if(isset($products)&&$products->count()>0)
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





