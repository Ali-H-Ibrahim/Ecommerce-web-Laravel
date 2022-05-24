@extends('front.layouts.front_layouts')

@section('front_content')

    @php
        use App\Models\Setting;
        use App\Models\ShoppingCart;
        $setting = Setting::first();
        $charge = $setting -> shipping_cost;
        $tax = $setting -> tax;
    @endphp


    <style>
        /**
       * The CSS shown here will not be introduced in the Quickstart guide, but shows
       * how you can use CSS to style your Element's container.
       */
        .StripeElement {
            box-sizing: border-box;

            height: 40px;
            width: 100%;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

    </style>

    <div class="contact_form mt-5">
        <div class="container">
            <div class="row">

                <div class="col-lg-5" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Shipping Address</div>

                        <form action="{{ route('stripe.charge') }}" method="post" id="payment-form">
                            @csrf
                            <div class="form-row">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <br>

                            <input type="hidden" name="shipping" value="{{ $charge }}">
                            <input type="hidden" name="vat" value="{{ $tax }}">

                            <input type="hidden" name="total" value="@if($cart) {{ $cart -> grand_total }} @endif">
                            {{-- {{ Cart::Subtotal() + $charge + $tax }}--}}

                            <input type="hidden" name="ship_name"
                                   value="{{ Auth::user()->first_name . ' ' .  Auth::user()->last_name }}">
                            <input type="hidden" name="ship_phone" value="{{ Auth::user()->address->mobile }}">
                            <input type="hidden" name="ship_email" value="{{ Auth::user()->email }}">
                            <input type="hidden" name="ship_address" value="{{ Auth::user()->address->address }}">
                            <input type="hidden" name="ship_city" value="{{ Auth::user()->address->city }}">
                            <input type="hidden" name="payment_type" value="{{ 'visa' }}">


                            <button class="btn btn-info">Pay Now</button>
                        </form>


                    </div>
                </div>


            </div>
        </div>
        <div class="panel"></div>
    </div>

@endsection

@section("script")
    <script type="text/javascript">

        // Create a Stripe client.
        let stripe = Stripe('pk_test_nCWyEwJ4s0XJfB6EynEVTK7r00cTEa475l');

        // Create an instance of Elements.
        let elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        let style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        let card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function (event) {
            let displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        let form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    let errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            let form = document.getElementById('payment-form');
            let hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }


    </script>
@endsection
