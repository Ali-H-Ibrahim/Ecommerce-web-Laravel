

@php
    use App\Models\Setting;
    $setting = Setting::first();
@endphp

<!-- Call to Action Start -->
<div class="call-to-action">
    <div class="container">
        <div class="row align-items-center">
            <div class="one-div col-md-9">
                <p>Don't hesitate to contact us</p>
            </div>
            <div class="two-div col-md-3">
                <a class="btn" href="{{route('complaint')}}">Contact Us</a>
                <a class="btn" href="{{route('questionnaire')}}">Join Us</a>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->

<!-- Footer Start -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div id="module" class="info">

                    <h2>SASHA</h2>
                    <p>Sasha offers a unique online shopping experience for the customers, a huge choice of brands and products.
                        Born in 2021</p>
                    <p class="collapse" id="collapseExample" aria-expanded="false">
                        Sasha has a very large product mix includes in-house collections, 
                        sports, men and women wear, with globally recognised brands.
                    </p>
                    <a role="button" class="collapsed" data-toggle="collapse" href="#collapseExample"
                       aria-expanded="false" aria-controls="collapseExample"></a>


                </div>

            </div>
            <div class="col-sm-6 col-md-3">
                <div class="helpful-link">
                    <h2>Helpful links</h2>


                    <div class="list-unstyled">
                        <ul>
                            <li><a href="{{route('show.payment.policies')}}">Pyament Policy</a></li>
                            <li><a href="{{route('show.shipping.policies')}}">Shipping Policy</a></li>
                            <li><a href="{{route('show.return.policies')}}">Return Policy</a></li>
                        </ul>
                    </div>


                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="contact">
                    <h2>Contact Us</h2>
                    <ul class="list-unstyled">
                        <p><i class="fa fa-map-marker"></i> {{ $setting -> address }}</p>
                        <p><i class="fa fa-envelope"></i> {{ $setting -> email }}</p>
                        <p><i class="fa fa-phone"></i> {{ $setting -> phone }}</p>


                    </ul>

                </div>

            </div>
            <div class="row payment align-items-center">
                <div class="col-md-6">
                    <div class="payment-method">
                        <h2>We Accept:</h2>
                        <img src="{{ asset('frontend/img/1.png')}}" alt="Payment Method"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-security">
                        <h2>Secured By:</h2>
                        <img src="{{ asset('frontend/img/2.png')}}" alt="Payment Security"/>
                        <img src="{{ asset('frontend/img/3.png')}}" alt="Payment Security"/>
                        <img src="{{ asset('frontend/img/7.png')}}" alt="Payment Security"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Copyright Start-->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class=" text-center text-sm-left text-uppercase">
                &copy;2021 <span>Sasha </span>All Right Reserved
            </div>

        </div>
    </div>
</div>
<!-- Copyright End-->
