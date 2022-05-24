@extends('front.layouts.front_layouts')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/report.css') }}">
@endsection

@section('front_content')

    <div class="cover-report-page">
        <section class="report-page">

            <div class="container-report-page">

                <div class="top-page">

                    <div class="title-page">How to create your own store?</div>

                    <div class="img">
                        <img src="{{asset('frontend/img/reportStore.png')}}" alt="">

                    </div>

                    <div class="text">
                        If you want to create your own store, please fill out the following questionnaire.
                    </div>

                    <div class="star">
                        <!-- Indicates required fields* -->
                        Required Fields*
                    </div>

                </div>
                <form action="{{route('store.questionnaire')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="middle-page">

                        <div class="container-middle-page">
                            <!-- Name -->
                            <div class="group">

                                <div class="icon">
                                    <i class="bx bxs-building-house" type="text"></i>
                                    Company's name *
                                </div>

                                <div class="input">
                                    <input  name="name" type="text" id="name" required autofocus>
                                </div>

                            </div>

                            <!-- Email -->
                            <div class="group">

                                <div class="icon">
                                    <i class="bx bx-mail-send" type="email" name="email"></i>
                                    Email Address *
                                </div>

                                <div class="input">
                                    <input  name="email" type="email" id="email" required>
                                </div>

                            </div>

                            <!-- Contact Number -->
                            <div class="group">

                                <div class="icon">
                                    <i class="bx bxs-phone" type="number" name="contact_number"></i>
                                    Contact Number *
                                </div>

                                <div class="input">
                                    <input  name="contact_number" type="tel" id="contact_number" required>
                                </div>

                            </div>

                            <!-- Location -->
                            <div class="group">

                                <div class="icon">
                                    <i class="bx bx-current-location" type="text" name="address"></i>
                                    Location *
                                </div>

                                <div class="input">
                                    <input name="address" type="text" id="address" required>
                                </div>

                            </div>

                            <!-- Business Type -->
                            <div class="group">

                                <div class="icon">
                                    <i class="bx bxs-business" ></i>
                                    Business type *
                                </div>

                                <div class="input">

                                    <div>
                                        <input id="business" value="Brand Company" type="checkbox"> Brand Company
                                    </div>

                                    <div>
                                        <input id="business" value="Retailer" type="checkbox"> Retailer
                                    </div>

                                    <div>
                                        <input id="business" value="Distributor" type="checkbox"> Distributor
                                    </div>

                                    <div>
                                        <input id="business" value="EC Platform" type="checkbox"> EC Platform
                                    </div>

                                    <div>
                                        <input id="business" value="Manufacturer" type="checkbox"> Manufacturer
                                    </div>
                                </div>

                            </div>

                            <!-- Brand -->
                            <div class="group">

                                <div class="icon">
                                    <i class="bx bxs-star"></i>
                                    Brand
                                </div>

                                <div class="input">
                                    <input name="brand" type="text" id="brand">
                                </div>

                            </div>

                            <!-- Procudts Type -->
                            <div class="group">
                                <div class="icon">
                                    <i class='bx bx-spreadsheet' ></i>
                                    What types of product do you sell?
                                </div>

                                <div class="input">
                                    @foreach($categories as $category)
                                        <div>
                                            <input name="type" id="type" value="{{$category -> name}}" type="checkbox"> {{$category -> name}}
                                        </div>
                                    @endforeach
                                    <div>
                                        <input name="type" id="type" value="other" type="checkbox"> other
                                    </div>

                                </div>

                                </div>

                            <!-- Submit -->
                            <div class="form-group col-sm-4 col-12">
                                <input id="submit" type="submit" value="submit" class="btn btn-info"></input>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <!-- <script>
        $(document).ready(function(){


            $('#submit').click( function submitForm(e){

                e.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var contact_number = $('#contact_number').val();
                var address = $('#address').val();
                var business = getChecked('business');
                var type = getChecked('type');
                var brand = $('#brand').val();
                $.ajax({
                    url : "{{route('store.questionnaire')}}",
                    type : "post",
                    enctype: "multipart/form-data",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        name : name,
                        email : email,
                        contact_number : contact_number,
                        address : address,
                        business : business,
                        type : type,
                        brand : brand,
                    },
                    success:function(response){
                        alert("Submission Sent Successfully");
                    },
                });
            });

            function getChecked(id){
                var checked = [];
                $('#'+id+':checked').each(function(){
                    checked.push($(this).val());
                });
                return checked;
            }




        });

    </script> -->


@endsection
