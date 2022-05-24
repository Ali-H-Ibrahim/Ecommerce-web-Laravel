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
                        <h1>Payment & Cancellation Policy</h1>
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
                            <h3>Payment Policy</h3>
                            <div class="text-priv">
                                <p>Changeover package accepts all major credit cards. Payments can, and should be made through the online booking. Payment will be due upon delivery of package. We do not require a deposit to hold your appointment, however a hold will be placed automatically on your card 48 hours prior to your appointment. This hold can be changed immediately you need to cancel or reschedule, provide your cancellation outside of the 24hour window. </p>
                            </div>
                        </div>

                        <div class="text-container">
                            <h3>Cancellation Policy</h3>
                            <div class="text-priv">
                                <p>Cancellations and reschedules are no charge provided, they are done more than 24 hours in advance of the scheduled shoot date and time. When the 24hour window, a cancellation or reschedule fee of STS will be assessed. This fee will be charged automatically to the card on file, and the hold for the shoot amount will be removed. </p>
                        </div> <!-- end of text-container -->


                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-container last">
                                    <h3>Late Arrival Policy </h3>
                                    <p>We schedule with a 30 minutes arrival window because we know that in the DC Metropolitan Area 10 minutes of travel me can turn into 30 minutes of travel time in an instant. We will do our best to alert you to when we believe there will be more than 15 minutes late to any order.</p>
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
