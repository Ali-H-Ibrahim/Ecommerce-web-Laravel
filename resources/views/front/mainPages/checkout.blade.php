@extends('front.layouts.front_layouts')

@section('styles')
    <link rel="stylesheet" href="{{asset('frontend/css/checkout.css')}}">
@endsection

@section('front_content')

    @php
        use \App\Models\Setting;

        $settings = Setting::first();
    @endphp

    <!-- Checkout Start -->
    <div class="main-checkout">
        <div class="checkout">
            <div class="container-fluid">

                <form action="{{route('add.order')}}" id="checkoutForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="checkout-inner">
                                <div class="billing-address">
                                    <h2>Shipping Address Via SaSha</h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>First Name</label>
                                            <input class="form-control fieldForm" type="text" name="first_name"
                                                   value="{{ Auth::user()->first_name }}" placeholder="First Name">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Last Name</label>
                                            <input class="form-control fieldForm" type="text" name="last_name"
                                                   value="{{ Auth::user()->last_name }}" placeholder="Last Name">
                                        </div>
                                        <div class="col-md-6">
                                            <label>E-mail</label>
                                            <input class="form-control fieldForm" type="email" name="email"
                                                   value="{{ Auth::user()->email }}" placeholder="E-mail">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Mobile No</label>
                                            <input class="form-control fieldForm" type="text" name="mobile"
                                                   value="@if(Auth::user() -> address) {{ Auth::user() -> address -> mobile }} @endif"
                                                   placeholder="Mobile Number">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Address</label>
                                            <input class="form-control fieldForm" type="text" name="address"
                                                   value="@if(Auth::user() -> address) {{ Auth::user() -> address -> address }} @endif" placeholder="Address">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Country</label>
                                            <select class="custom-select">
                                                <option selected>@if(Auth::user() -> address) {{ Auth::user() -> address -> country }} @endif</option>
                                                <option>Afghanistan</option>
                                                <option>Albania</option>
                                                <option>Algeria</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>City</label>
                                            <input class="form-control fieldForm" type="text" name="city"
                                                   value="@if(Auth::user() -> address) {{ Auth::user() -> address -> city }} @endif" placeholder="City">
                                        </div>
                                        <div class="col-md-6">
                                            <label>ZIP Code</label>
                                            <input class="form-control fieldForm" type="text" name="zipcode"
                                                   value="@if(Auth::user() -> address) {{ Auth::user() -> address -> zipcode }} @endif" placeholder="ZIP Code">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                                <label class="custom-control-label" for="newaccount">I'am agree to the
                                                    site
                                                    policy</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="shipto">
                                                <label class="custom-control-label" for="shipto">Ship with other
                                                    shipping
                                                    service</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="checkout-inner">
                                <div class="checkout-summary">
                                    <h1>Cart Total</h1>
                                    <p>Sub-total<span>${{ Auth::user()->shoppingcart->subtotal }}</span></p>
                                    <p class="sub-total">Tax<span>$ {{ $settings->tax }}</span></p>
                                    <p class="ship-cost">Shipping Cost<span>$ {{ $settings->shipping_cost }}</span></p>
                                    <h2>Grand
                                        Total<span>$ {{ $grand_total }}</span>
                                    </h2>
                                </div>

                                <div class="checkout-payment">
                                    <div class="payment-methods">
                                        <h1>Payment Methods</h1>
                                        <div class="payment-method">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="payment-1"
                                                       name="payment_method" value="VISA">
                                                <label class="custom-control-label" for="payment-1">VISA</label>
                                            </div>

                                        </div>
                                        <div class="payment-method">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="payment-2"
                                                       name="payment_method" value="CASH" checked>
                                                <label class="custom-control-label" for="payment-2">CASH</label>
                                            </div>


                                        </div>

                                    </div>
                                    <button class="place-order place-order--default">
                                        <div id="save" class="default text">Place Order</div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Checkout End -->

@endsection

@section('script')
    <script src="{{asset('frontend/js/checkout.js')}}"></script>
    <script src="{{ asset('frontend/build/js/countrySelect.js') }}"></script>

    <script>
        //Populate countries select on page load
        $(document).ready(function () {
            //Call restful countries country endpoint
            $.get('https://restfulcountries.com/api/v1/countries?fetch_type=slim', function (countries) {

                //Loop through returned result and populate countries select
                $.each(countries.data, function (key, value) {
                    $('#country-select')
                        .append($("<option></option>")
                            .attr("value", value.name)
                            .text(value.name));
                });
            });
        });

        //Function to fetch states
        function initStates() {
            //Get selected country name
            let country = $("#country-select").val();

            //Remove previous loaded states
            $('#state-select option:gt(0)').remove();
            $('#district-select option:gt(0)').remove();

            //Call restful countries states endpoint
            $.get('https://restfulcountries.com/api/v1/countries/' + country + '/states?fetch_type=slim', function (states) {

                //Loop through returned result and populate states select
                $.each(states.data, function (key, value) {
                    $('#state-select')
                        .append($("<option></option>")
                            .attr("value", value.name)
                            .text(value.name));
                });
            });
        }
    </script>

    <script>

        $(document).on('click', '#save', function (e) {
            e.preventDefault();

            // $('.form_error').text('');
            // $('#added_success').hide();
            let formData = new FormData($('#checkoutForm')[0]);

            formData.append('grand_total', {{ $grand_total }});
            formData.append('payment_method', document.querySelector('input[name="payment_method"]:checked').value);

            // console.log(document.querySelector('input[name="payment_method"]:checked').value);
            {{--console.log({{ $grand_total }});--}}

            $.ajax({
                type: 'POST',
                url: "{{ route('add.order') }}",
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

                    window.location = `{{ route('orders') }}`;
                }
            });
        });

    </script>
@endsection

