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
                        <h1>Privacy Policy</h1>
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
                            <h3>What Information We Collect ?</h3>
                            <div class="text-priv">
                                <p> When you visit SASHA store, we automatically collect certain information about your device, information about your web browser, IP address, time zone, and some of the cookies that are installed on your device.
                                    Additionally, we collect information about the individual web pages or products that you view, what search terms referred you to the Site, and information about how you interact with the Site. We refer to this automatically collected information as Device Information.
                                </p>
                            </div>
                            <div class="text-next">
                                <p>We collect Device Information using the following technologies:</p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled li-space-lg indent">
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Cookies are data files that are placed on your device or computer and often include an anonymous unique identifier.</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Log files track actions occurring on the Site, and collect data including your IP address, browser type, Internet service provider, referring/exit pages, and date/time stamps.</div>
                                        </li>
                                    </ul>
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                            <div class="text-priv">
                                <p> Mention all other tracking tools and/or technologies being used by your website.
                                    Also, when you make a purchase or attempt to make a purchase through the Site, we collect certain information from you, including your name, billing address, shipping address, payment information (including credit card numbers Mention all types of accepted payments, email address, and phone number. This is called Order Information.
                                    Make sure you mention all other information that you collect.
                                    By Personal Information in this Privacy Policy, we are talking both about Device Information and Order Information.
                                </p>
                            </div>
                        </div> <!-- end of text-container-->

                        <div class="text-container">
                            <h3>How Do We Use Your Personal Information</h3>
                            <div class="text-priv">
                                <p> We use the Order Information that we collect generally to fulfil any orders placed through the Site (including processing your payment information, arranging for shipping, and providing you with invoices and/or order confirmations).</p>
                            </div>
                            <div class="text-next">
                                <p>Additionally, we use this Order Information to:</p>
                            </div>
                            <ul class="list-unstyled li-space-lg indent">
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Communicate with you.</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Screen our orders for potential risk or fraud.</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">When in line with the preferences you have shared with us, provide you with information or advertising relating to our products or services.</div>
                                </li>
                            </ul>
                        </div> <!-- end of text-container -->


                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-container last">
                                    <h3>Sharing Your Personal Information</h3>
                                    <p> We share your Personal Information with third parties to help us use your Personal Information, as described above.
                                        We also use Google Analytics to help us understand how our customers use SASHA store. How Google uses your Personal Information.
                                        Finally, we may also share your Personal Information to comply with applicable laws and regulations, to respond to a subpoena, search warrant or other lawful requests for information we receive, or to otherwise protect our rights.</p>
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
