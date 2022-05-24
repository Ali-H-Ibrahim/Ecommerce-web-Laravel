@extends('front.layouts.front_layouts')

@section('styles')
    <link rel="stylesheet" href="{{asset('frontend/css/about.css')}}">
@endsection

@section('front_content')

    <!-- start about intro -->
    <section class="about-us text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2>About Us</h2>
                    <hr>
                    <p class="lead">
                    Sasha offers a unique online shopping experience for the customers, a huge choice of brands and products.
                    Born in 2021, Sasha has a very large product mix includes in-house collections, 
                    sports, men and women wear, with globally recognised brands.
                    </p>
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('frontend/img/hero.png')}}" alt="" style="width: 70%;">
                </div>
            </div>
        </div>
    </section>

    <!-- start about features -->
    <section class="about-features text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fas fa-building"></i>
                    <h3>Our contracting companies</h3>
                    <p>We Deal With Many Globally Recognised Companies Such as: Nike, Addidas, Puma, Dell, Samsumg, Apple, etc..
                    </p>
                </div>
                
                <div class="col-sm-6">
                    <i class="fas fa-shipping-fast"></i>
                    <h3>Shipping Companies</h3>
                    <p>Ocean Network Express, HMM, Evergreen Line, etc... </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Start -->
    <div class="team">
        <div class="container-fluid">
            <div class="section-header">
                <h2>Our Team</h2>
                <p>SASHA team Consists Of Mainly Five Members</p>
            </div>
            <div class="member">
                <div class="table">
                    <div class="group">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset('frontend/img/team-3.jpg')}}" alt="Team">
                            </div>
                            <div class="team-text">
                                <h3>Sedra Al-Saadi</h3>
                                <p>Front-end Developer</p>
                            </div>
                            <div class="team-social">
                                <a href="https://www.facebook.com/profile.php?id=100004340373756"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>

                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset('frontend/img/team-2.jpg')}}" alt="Team">
                            </div>
                            <div class="team-text">
                                <h3>Ali Ebrahim</h3>
                                <p>Back-end Developer</p>
                            </div>
                            <div class="team-social">
                                <a href="https://www.facebook.com/profile.php?id=100006658339054"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset('frontend/img/team-5.jpg')}}" alt="Team">
                            </div>
                            <div class="team-text">
                                <h3>Sepsa Mokaw</h3>
                                <p>Back-end Developer</p>
                            </div>
                            <div class="team-social">
                                <a href="https://www.facebook.com/sepsa.mokaw"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset('frontend/img/team-4.jpg')}}" alt="Team">
                            </div>
                            <div class="team-text">
                                <h3>Huda Qddo</h3>
                                <p>Front-end Developer</p>
                            </div>
                            <div class="team-social">
                                <a href="https://www.facebook.com/hudamarwan.qddo"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="group group-end">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset('frontend/img/team-1.jpg')}}" alt="Team">
                            </div>
                            <div class="team-text">
                                <h3>Ashraf Trayfi</h3>
                                <p>Back-end Developer</p>
                            </div>
                            <div class="team-social">
                                <a href="https://www.facebook.com/ashraf.tryfie.1"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- start about CEO -->
    <section class="about-ceo">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <img class="img-responsive" src="{{ asset('frontend/img/busniss3.png')}}" style="width: 100% ;">
                </div>
                <div class=" col-sm-7">
                    <h2 class="h1">We Are More Than Happy To Help You</h2>
                    <p class="lead">If you have any question or a problemthat you need any help with, please don't hesitate to contact us via chat, or by clicking on the (Contact Us) button</p>
                </div>
            </div>
        </div>
    </section>

@endsection
