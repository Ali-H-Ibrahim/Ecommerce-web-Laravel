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
                        <h1>Return & Refund Policy</h1>
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
                            <h3>Returns</h3>
                            <div class="text-priv">
                                <p> You have 20 days to return an item from the date you received it. To be eligible for a return, your item must be unused and in the same condition that you received it. Your item must be in the original packaging. Your item needs to have the receipt or proof of purchase.</p>
                            </div>
                        </div> <!-- end of text-container-->

                        <div class="text-container">
                            <h3>Refunds</h3>
                            <div class="text-priv">
                                <p>Refunds Once we receive your item, we will inspect it and notify you that we have received your returned item. We will immediately notify you on the status of your refund after inspecting the item. If your return is approved, we will initiate a refund to your credit card or your chosen method of payment. You will receive the credit within a certain amount of days, depending on your card issuer's policies. </p>
                            </div>
                        </div> <!-- end of text-container -->


                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-container last">
                                    <h3>Shipping</h3>
                                    <p> You will be responsible for paying for your own shipping costs for returning your item. Shipping costs are non-refundable. If you receive a refund, the cost of return shipping will be deducted from your refund. </p>
                                </div> <!-- end of text container -->
                            </div> <!-- end of col-->
                        </div> <!-- end of row -->
                    </div> <!-- end of container -->
                </div> <!-- end of ex-basic-2 -->
                <!-- end of privacy content -->


            </div>
        </div>
    </div>
@endsection
