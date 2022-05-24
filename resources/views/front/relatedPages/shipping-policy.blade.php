@extends('front.layouts.front_layouts')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/privacy.css') }}">
@endsection

@section('front_content')
    <div class="privacy">

        <!-- Header -->
        <header id="header" class="ex-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Shipping Policy</h1>
                    </div> 
                </div> 
            </div>
        </header>
        <!-- end of header -->


        <!-- Privacy Content -->
        <div class="ex-basic-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-container">
                            <h3>Shipping Cost</h3>
                            <div class="text-priv">
                                <p> Shipping cost is calculated on a "per-order". We sometimes offer free shipping for specific shipping options in different categories, or free shipping site-wide.</p>
                            </div>
                            <h3>Shipping Time</h3>
                            <div class="text-priv">
                                <p>Shipping You can see each product's estimated arrival date on the product page and during the checkout process. Entering your shipping destination ZIP code or allowing SASHA store to use your current location can result in greater accuracy for your estimated arrival date. Certain products may require additional days to process prior to shipping. This will be reflected in the estimated arrival date. If for some reason you don't receive your product, you may be eligible for a replacement product if you notify us during your return and exchange time period. When delivered, you will see a shipping alert in your orders’ page.</p>
                            </div>
                        </div> <!-- end of text-container-->

                        <div class="text-container">
                            <h3>Title Of Products</h3>
                            <div class="text-priv">
                                <p>The risk of loss and title for these products passes to you upon the carrier's delivery to your ship-to address, and SASHA store is not responsible for any loss, theft or damage after delivery.</p>
                            </div>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of container -->
                </div> <!-- end of ex-basic-2 -->
                <!-- end of privacy content -->


            </div>
        </div>
    </div>
@endsection
