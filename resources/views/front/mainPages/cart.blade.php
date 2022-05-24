@extends('front.layouts.front_layouts')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}">
@endsection

@section('front_content')

    <!-- Cart Start -->
    <div class="cart-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>
                                <tbody class="align-middle">

                                @if( isset($cart) && $cart -> count() > 0)
                                    @foreach($cart as $row)
                                        @foreach($row -> products as $product)
                                            <tr class="row-{{ $row -> id }}">
                                                <td>
                                                    <div class="img">
                                                        <a href="{{ route('preview.product', $product -> id)}}"><img
                                                                src="{{ asset("images/Product/main_photo/".$product-> main_img) }}"
                                                                alt="Image"></a>
                                                        <p>{{ $product -> name }}</p>
                                                    </div>
                                                </td>
                                                <td>{{ $product -> price }}</td>
                                                <td>{{ $product -> color }}</td>
                                                <td>{{ $product -> size }}</td>
                                                <td>
                                                    <div class="qty">
                                                        <button class="btn-minus" data-id="{{ $product -> id }}">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                        <input id="{{ "product". $product -> id ."Qty"}}"
                                                               class="productQty"
                                                               type="text"
                                                               value="{{ getShoppingcartProductCount($row, $product)  }}">
                                                        <button class="btn-plus" data-id="{{ $product -> id }}">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </td>

                                                <td>${{ getShoppingcartProductCount($row, $product) * ($product -> price) }}</td>


                                                <td>
                                                    <button class="delete-from-cart" data-id="{{ $product -> id }}">
                                                        <i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-page-inner">
                        <div class="row">
                            @if(!Session::has('coupon'))
                                <div class="col-md-12">
                                    <div class="coupon">
                                        {{-- action="{{ route('apply.coupon') }}" --}}
                                        <form id="couponForm" method="POST">
                                            @csrf
                                            <input id="coupon-code" type="text" name="coupon" placeholder="Coupon Code"
                                                required>
                                            {{--class="apply-coupon"--}}
                                            <button class="apply-coupon">
                                                Apply Code
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12">
                                <div class="cart-summary">
                                    <div class="cart-content">
                                    <h1>Cart Summary</h1>
                                        @if( isset($cart) && $cart -> count() > 0)
                                            {{--    {{ Session::get('coupon'['balance'])  }}    --}}
                                            @if(Session::has('coupon'))
                                            <p>Sub Total<span>$ {{ $balance = Session::get('coupon')['balance']  }}</span></p>
                                                <p>Coupon
                                                    <a id="remove-coupon"
                                                       class="btn-danger btn-xs" style="cursor: pointer;">X</a>
                                                    <span> Sub Total :${{ Session::get('coupon')['discount']  }}</span>
                                                </p>
                                            @else
                                            <p>Sub Total<span>$ {{ $balance = $cart[0]-> subtotal;  }}</span></p>

                                            @endif
                                            <p>Tax<span>${{ $setting -> tax  }}</span></p>
                                            <p>Shipping Cost<span>${{ $setting -> shipping_cost }}</span></p>

                                            <h2>Grand Total
                                                <span>
                                                ${{ $grand_total = $balance + $setting -> shipping_cost + $setting -> tax }}
                                            </span>
                                            </h2>
                                        @endif
                                    </div>
                                    <div class="cart-btn">
                                        <button>Update Cart</button>
                                        <button
                                            @if( isset($cart) && $cart -> count() > 0)
                                            onclick="location.href='{{ route('checkout', $grand_total) }}'; "
                                            @endif>
                                            Checkout
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

@endsection

@section("script")
    <script src="{{asset('frontend/js/cart.js')}}"></script>

    <script>

        $(document).ready(function () {

            /**************** Delete from ShoppingCart ****************/
            $(document).on('click', '.delete-from-cart', function (e) {
                e.preventDefault();

                let product_id = $(this).data('id');
                let rowID = $(this).closest('tr');

                swal({
                    title: "Are you Want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            if (product_id) {
                                $.ajax({
                                    url: "{{ url('delete/shopping-cart/') }}/" + product_id,
                                    type: "POST",
                                    data: {'_token': "{{ csrf_token() }}"},
                                    //datType: "json",
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

                                            rowID.remove();

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
                        } else {
                            //swal("Safe Data!");
                        }
                    });

            });

            /**************** Update ShoppingCart ****************/
            function updateProductCartQuantity() {

                let product_id = $(this).data('id');
                let productQuantity = $('#product' + product_id + 'Qty').val();
                let shoppingcartId = @if( isset($cart) && $cart -> count() > 0){{ $cart[0]->id }}@endif;

                console.log('#product' + product_id + 'Qty');
                console.log(productQuantity);
                let formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('shoppingcart_id', shoppingcartId);
                formData.append('product_id', product_id);
                formData.append('count', productQuantity);

                if (product_id) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('update.shopping.cart') }}",
                        data: formData,
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
                        error: function (xhr, status, error) {
                            // console.log(xhr);
                        }

                    });

                } else {
                    alert('danger');
                }

            }

            $('.qty button').on('click', updateProductCartQuantity);

            /**************** Apply Coupon ****************/
            $(document).on('click', '.apply-coupon', function (e) {
                e.preventDefault();

                let formData = new FormData($('#couponForm')[0]);

                $.ajax({
                    url: "{{ route('apply.coupon') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            toastr.success(data.success);
                        } else {
                            toastr.error(data.error);
                        }
                    }

                }).done(function () {
                    setInterval('location.reload()', 3050);
                });

            });

            /**************** Delete Coupon ****************/
            $(document).on('click', '#remove-coupon', function (e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('remove.coupon') }}",
                    type: "GET",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            toastr.success(data.success);

                        } else {
                            toastr.error(data.error);
                        }
                    }

                });

            });

        });

    </script>
@endsection
