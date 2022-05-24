@extends('front.layouts.front_layouts')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/contactUs.css')}}">
@endsection

@section('front_content')

    <section class="contact-page-sec">
        <div class="container">
            <div class="col-md-4"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_CEyvj2.json" background="transparent"
                                speed="1" style="justify-content: center; height: 52px;" loop autoplay></lottie-player>
                            </div>
                            <div class="contact-info-text">
                                <h2>address</h2>
                                <span>1215 Lorem Ipsum, Ch 176080 </span>
                                <span>Damascus , Syria</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_8SdEu9.json" background="transparent"
                                speed="1" style="justify-content: center; height: 52px;" loop autoplay></lottie-player>
                            </div>
                            <div class="contact-info-text">
                                <h2>E-mail</h2>
                                <span>info@LoremIpsum.com</span>
                                <span>yourmail@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_nv5aXa.json" background="transparent"
                                speed="1" style="justify-content: center; height: 52px;" loop autoplay></lottie-player>
                            </div>
                            <div class="contact-info-text">
                                <h2>office time</h2>
                                <span>Mon - Thu 9:00 am - 4.00 pm</span>
                                <span>Thu - Mon 10.00 pm - 5.00 pm</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="contact-page-form" method="post">
                        <form action="{{route('store.complaint')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="text" placeholder="Your Name" id="name" name="name" value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}" required autofocus/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="email" placeholder="E-mail" id="email" name="email" value="{{ Auth::user()->email }}" required />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="text" placeholder="Phone Number" id="number" name="number" value="@if(Auth::user()->address){{ Auth::user()->address->mobile }} @endif" required />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="text" placeholder="Subject" id="subject" name="subject" required/>
                                    </div>
                                </div>
                                <div class="col-md-12 message-input">
                                    <div class="single-input-field">
                                        <textarea placeholder="Write Your Message" id="message" name="message" required></textarea>
                                    </div>
                                </div>
                                <div class="single-input-fieldsbtn">
                                    <input id="submit" type="submit" name="submit" value="Send Now" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-page-map">
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1837608.914297911!2d84.68099449892505!3d25.89974342906415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed5844f0bb6903%3A0x57ad3fed1bbae325!2sBihar!5e0!3m2!1sen!2sin!4v1626666645878!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
                        <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_6gqtyxsc.json" background="transparent"
                        speed="0.3" style="justify-content: center; margin-top: 75px;" loop autoplay></lottie-player>
                    </div>
                </div>
            </div>
        </div>

        <div class="map">
            <div class="title">
                <h1>Our Location On The Map</h1>
            </div>
        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106456.52297209851!2d36.35293559026458!3d33.50745579458413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1518e6dc413cc6a7%3A0x6b9f66ebd1e394f2!2z2K_Zhdi02YLYjCDYs9mI2LHZitin!5e0!3m2!1sar!2s!4v1628113324499!5m2!1sar!2s"
            width="600" height="450"
            style="border:0;justify-content: center;width: 95%;padding: 50px;height: 500px;margin: 40px" allowfullscreen=""
            loading="lazy">
        </iframe>
    </section>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <!-- <script>
        $(document).ready(function(){


            $('#submit').click( function submitForm(e){

                e.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var number = $('#number').val();
                var subject = $('#subject').val();
                var message = $('#message').val();
                $.ajax({
                    url : "{{route('store.complaint')}}",
                    type : "post",
                    enctype: "multipart/form-data",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        name : name,
                        email : email,
                        number : number,
                        subject : subject,
                        message : message,
                    },
                    success:function(response){
                        alert("Submission Sent Successfully");
                    },
                });
            });
        });

    </script>
    -->
@endsection
