@extends('front.layouts.front_layouts')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/services.css') }}">
@endsection

@section('front_content')

    <section class="services">
        <div class="container">
            <!-- header section -->
            <div class="row justify-content-center text-center">
                <div class="col-md-10 col-lg-8">
                    <div class="header">
                        <h2 class="title">Customers Service</h2>
                        <p class="description">Most customers can name at least one “missing” feature that would improve their experience with SASHA store, Here we are more than happy to help you with all you need to know about SASHA store.</p>

                    </div>
                </div>

            </div>
            <!-- Start Secvices -->
            <div class="row">
                <!-- start single services -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon">
                                <i class="fab fa-battle-net"></i>
                            </span>
                            <h3 class="title">Return and Refund policies</h3>
                            <p class="description">Thanks for shopping at SASHA store. If you are not entirely satisfied with your purchase, we're here to help.</p>
                            <a href="{{route('show.return.policies')}}" class="learn-more">Learn More</a>
                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- end single services -->
                <!-- start single services -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                     class="bi bi-truck" viewBox="0 0 16 16">
                                    <path
                                        d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                </svg>
                            </span>
                            <h3 class="title">Delivery and Shipping</h3>
                            <p class="description">Thank you for visiting and shopping at SASHA store. Here are the terms and conditions that constitute our Shipping Policy</p>
                            <a href="{{route('show.shipping.policies')}}" class="learn-more">Learn More</a>
                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- end single services -->
                <!-- start single services -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon">
                                <i class="fas fa-dollar-sign"></i>
                            </span>
                            <h3 class="title">Payment Policies</h3>
                            <p class="description">Thank you for visiting and shopping at SASHA store. Here are the terms and conditions in regards to our Payment Policy</p>
                            <a href="{{route('show.payment.policies')}}" class="learn-more">Learn More</a>
                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- end single services -->
                <!-- start single services -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon">
                                <i class="fas fa-question"></i>
                            </span>
                            <h3 class="title">FAQ</h3>
                            <p class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit
                                explicabo
                                rem praesentium quisquam distinctio optio veniam dicta, beatae fugit repellendus numquam
                                vel
                                earum sunt voluptatibus sapiente sit unde debitis delectus.</p>
                            <a href="{{route('show.FAQ')}}" class="learn-more">Learn More</a>
                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- end single services -->
                <!-- start single services -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon">
                                <i class="fas fa-lock"></i>
                            </span>
                            <h3 class="title">Privacy policies</h3>
                            <p class="description">This Privacy Policy describes how your personal information is collected, used, and shared when you visit or make a purchase from (SASHA store).</p>
                            <a href="{{route('show.privacy.policies')}}" class="learn-more">Learn More</a>
                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- end single services -->
                <!-- start single services -->
                <!-- <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon">
                                <i class="fas fa-cog"></i>
                            </span>
                            <h3 class="title">Setting</h3>
                            <p class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit
                                explicabo
                                rem praesentium quisquam distinctio optio veniam dicta, beatae fugit repellendus numquam
                                vel
                                earum sunt voluptatibus sapiente sit unde debitis delectus.</p>
                            <a href="" class="learn-more">Learn More</a>
                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div> -->
                <!-- end single services -->
            </div>
        </div>
    </section>

@endsection
