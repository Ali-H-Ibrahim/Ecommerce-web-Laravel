@extends('front.layouts.front_layouts')

@section('front_content')

    <!-- Start Setting Page Laptop -->

    <div class="setting-page">

        <div class="container-setting-page">

            <div class="top-setting-page">
                <img src="{{ asset('frontend/images/setting 1.jpg')}}" alt="">
                <div class="title">SETTING</div>
            </div>

            <div class="middle-setting-page">

                <div class="personal-image">

                    <div class="profile-image">
                        <img class="" src="{{ $user -> image }}" alt="">
                    </div>
                    <div class="edit-profile" onclick="openModalImg()">
                        <!-- <i class='bx bxs-camera'></i> -->
                        <i class='bx bxs-edit'></i>

                    </div>

                </div>

                <div class="personal-information">

                    <div class="table-information">
                        <table>
                            <tr class="row-table">
                                <td>Name</td>
                                <td class="middle-cell">{{ $user -> first_name . ' ' . $user -> last_name }}</td>
                                <td class="change">
                                    <button title="Edit" onclick="openModalName()">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="row-table">
                                <td>E-mail</td>
                                <td class="middle-cell">{{ $user -> email }}</td>
                                <td class="change">
                                    <button title="Edit" onclick="openModalEmail()">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="row-table">
                                <td>Password</td>
                                <td class="middle-cell">**********</td>
                                <td class="change">
                                    <button title="Edit" onclick="openModalPassword()">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="row-table">
                                <td>Phone number</td>
                                <td class="middle-cell">@if($user -> address) {{ $user -> address -> mobile }} @endif</td>
                                <td class="change" onclick="openModalPhone()">
                                    <button title="Edit">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="row-table">
                                <td>Gender</td>
                                <td class="middle-cell">{{ $user -> gender }}</td>
                                <td class="change">
                                    <button title="Edit" onclick="openModalGender()">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="row-table">
                                <td>Country</td>
                                <td class="middle-cell">@if($user -> address) {{ $user -> address -> country }} @endif</td>
                                <td class="change">
                                    <button title="Edit" onclick="openModalCountry()">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="row-table">
                                <td>City</td>
                                <td class="middle-cell">@if($user -> address) {{ $user -> address -> city }} @endif</td>
                                <td class="change">
                                    <button title="Edit" onclick="openModalCity()">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="end-row-table">
                                <td>Street</td>
                                <td class="middle-cell">@if($user -> address) {{ $user -> address -> address }} @endif</td>
                                <td class="change">
                                    <button title="Edit" onclick="openModalStreet()">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                </td>
                            </tr>

                        </table>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- End Setting Page Laptop -->


    <!-- Start Modal Laptop -->

    <div class="modal-img modal">

        <div class="container-modal">

            <form method="POST" id="imageForm" enctype="multipart/form-data">
                @csrf
                <div class="content-change">
                    <div class="profile-image">
                        <img class="pro" src="{{ $user -> image }}" alt="">
                    </div>
                    <div class="edit-profile">
                        <label for="file-input-mob">
                            <i class='bx bxs-camera'></i>
                        </label>

                        <input id="file-input-mob" name="profile_image" type="file" accept="image/*"
                               onchange="
                           document.getElementsByClassName('pro')[0].src = window.URL.createObjectURL(this.files[0]);
                           document.getElementsByClassName('pro')[1].src = window.URL.createObjectURL(this.files[0]); ">
                    </div>
                </div>

                <div class="button">
                    <button type="button" class="cancel-button" onclick="closeModalImg()">Cancel</button>
                    <button class="save change-button">Change</button>
                    <button class="delete-button">Delete</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-name modal">

        <div class="container-modal">

            <form method="POST" id="nameForm" enctype="multipart/form-data">
                @csrf
                <div class="content-change">

                    <label for="">First Name:</label>
                    <input id="first_name" type="text" name="first_name" value="{{ $user -> first_name }}">

                    <label for="">Last Name:</label>
                    <input id="last_name" type="text" name="last_name" value="{{ $user -> last_name }}">

                </div>

                <div class="button">
                    <button type="button" class="cancel-button" onclick="closeModalName()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-email modal">

        <div class="container-modal">

            <form method="POST" id="emailForm" enctype="multipart/form-data">
                @csrf
                <div class="content-change">

                    <label>New email:</label>
                    <input id="email" type="email" name="email" value="{{ $user -> email }}">

                </div>

                <div class="button">
                    <button type="button" class="cancel-button" onclick="closeModalEmail()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-password modal">

        <div class="container-modal">

            <form method="POST" id="passwordForm" enctype="multipart/form-data">
                @csrf
                <div class="content-change">

                    <label>Currently password:</label>
                    <input id="password" type="password" name="password" value="{{ $user -> password }}">

                    <label>New password:</label>
                    <input id="password" type="password" name="password" value="{{ $user -> password }}">

                    <label>Confirm password:</label>
                    <input id="password" type="password" name="password" value="{{ $user -> password }}">

                </div>

                <div class="button">
                    <button type="button" class="cancel-button" onclick="closeModalPassword()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-phone modal">

        <div class="container-modal">

            <form method="POST" id="mobileForm" class="AddressForm" enctype="multipart/form-data">
                @csrf
                <div class="content-change">
                    <label>New Phone Number:</label>
                    <input id="mobile"
                           type="tel"
                           name="mobile"
                           value="@if($user -> address) {{ $user -> address -> mobile }} @endif">
                </div>

                <div class="button">
                    <button type="button" class="cancel-button" onclick="closeModalPhone()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-gender modal">

        <div class="container-modal">

            <form method="POST" id="genderForm" enctype="multipart/form-data">
                @csrf
                <div class="content-change">

                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="{{ $user -> gender }}" selected>{{ $user -> gender }}</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Undefined">Undefined</option>
                    </select>

                </div>

                <div class="button">
                    <button type="button" class="cancel-button" onclick="closeModalgender()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-country modal">

        <div class="container-modal">

            <form method="POST" id="countryForm" class="AddressForm" enctype="multipart/form-data">
                @csrf
                <div class="content-change">

                    <label for="country">Country:</label>
                    <input id="country"
                           type="text"
                           name="country"
                           value="@if($user -> address) {{ $user -> address -> country }} @endif">

                </div>

                <div class="button">
                    <button type="button" class="cancel-button" onclick="closeModalCountry()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-city modal">

        <div class="container-modal">

            <form method="POST" id="cityForm" class="AddressForm" enctype="multipart/form-data">
                @csrf
                <div class="content-change">

                    <label for="city">City:</label>
                    <input id="city"
                           type="text"
                           name="city"
                           value="@if($user -> address) {{ $user -> address -> city }} @endif">

                </div>

                <div class="button">
                    <button type="button" class="cancel-button" onclick="closeModalCity()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-street modal">

        <div class="container-modal">

            <form method="POST" id="addressForm" class="AddressForm" enctype="multipart/form-data">
                @csrf
                <div class="content-change">

                    <label id="address">Street:</label>
                    <input id="address"
                           type="text"
                           name="address"
                           value="@if($user -> address) {{ $user -> address -> address }} @endif">

                </div>

                <div class="button">
                    <button type="button" class="cancel-button" onclick="closeModalStreet()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <!-- End Modal Laptop -->


    <!-- Start Setting Page Mobile -->

    <div class="setting-page-mobile">

        <div class="container-setting-page-mobile">

            <div class="top-setting-page-mobile">
                <img src="{{ asset('frontend/images/setting mob 1.jpg')}}" alt="">
                <div class="title">SETTING</div>
            </div>

            <div class="middle-setting-page-mobile">

                <div class="personal-image">

                    <div class="profile-image">
                        <img src="{{ $user -> image }}" alt="">
                    </div>

                    <div class="edit-profile">
                        <button>
                            <i class='bx bxs-edit' onclick="openModalImgMobile()"></i>
                        </button>
                    </div>

                </div>

                <div class="personal-information">

                    <div class="table-information">
                        <table>
                            <tr class="row-table">
                                <td class="td-one">Name</td>
                                <td class="middle-cell">{{ $user -> first_name . ' ' . $user -> last_name }}</td>
                                <td class="change">
                                    <button title="Edit">
                                        <i class='bx bxs-edit' onclick="openModalNameMobile()"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="row-table">
                                <td class="td-one">E-mail</td>
                                <td class="middle-cell">{{ $user -> email }}</td>
                                <td class="change">
                                    <button title="Edit">
                                        <i class='bx bxs-edit' onclick="openModalEmailMobile()"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="row-table">
                                <td class="td-one">Password</td>
                                <td class="middle-cell">**********</td>
                                <td class="change">
                                    <button title="Edit">
                                        <i class='bx bxs-edit' onclick="openModalPasswordMobile()"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="row-table">
                                <td class="td-one">Phone number</td>
                                <td class="middle-cell">
                                    @if($user -> address) {{ $user -> address -> mobile }} @endif
                                </td>                                
                                <td class="change">
                                    <button title="Edit">
                                        <i class='bx bxs-edit' onclick="openModalPhoneMobile()"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="row-table">
                                <td class="td-one">Gender</td>
                                <td class="middle-cell">{{ $user -> gender }}</td>
                                <td class="change">
                                    <button title="Edit">
                                        <i class='bx bxs-edit' onclick="openModalGenderMobile()"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="row-table">
                                <td class="td-one">Country</td>
                                <td class="middle-cell">
                                    @if($user -> address) {{ $user -> address -> country }} @endif
                                </td>                                <td class="change">
                                    <button title="Edit">
                                        <i class='bx bxs-edit' onclick="openModalCountryMobile()"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="row-table">
                                <td class="td-one">City</td>
                                <td class="middle-cell">
                                    @if($user -> address) {{ $user -> address -> city }} @endif
                                </td>                                <td class="change">
                                    <button title="Edit">
                                        <i class='bx bxs-edit' onclick="openModalCityMobile()"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="end-row-table">
                                <td class="td-one">Street</td>
                                <td class="middle-cell">
                                    @if($user -> address) {{ $user -> address -> address }} @endif
                                </td>                                <td class="change">
                                    <button title="Edit">
                                        <i class='bx bxs-edit' onclick="openModalStreetMobile()"></i>
                                    </button>
                                </td>
                            </tr>

                        </table>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- End Setting Page Mobile -->

    <!-- Start Modal Mobile -->

    <div class="modal-change-img modal-mobile">

        <div class="container-modal-mobile">

            <form method="POST" id="imageForm2" enctype="multipart/form-data">
                @csrf
                <div>
                    <div class="profile-image">
                        <img class="pro" src="{{ $user -> image }}" alt="">
                    </div>
                    <div class="edit-profile">
                        <label for="file-input-mob2">
                            <i class='bx bxs-camera'></i>
                        </label>

                        <input id="file-input-mob2" name="profile_image" type="file" accept="image/*"
                               onchange="
                               document.getElementsByClassName('pro')[0].src = window.URL.createObjectURL(this.files[0]);
                               document.getElementsByClassName('pro')[1].src = window.URL.createObjectURL(this.files[0]); ">
                    </div>
                </div>

                <div>
                    <button type="button" class="cancel-button" onclick="closeModalImgMobile()">Cancel</button>
                    <button class="save change-button">Change</button>
                    <button class="delete-button">Delete</button>
                </div>

            </form>

        </div>

    </div>

    <div class="modal-change-name modal-mobile">

        <div class="container-modal-mobile">

            <form method="POST" id="nameForm2" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="first_name2">First Name:</label>
                    <input id="first_name2" type="text" name="first_name" value="{{ $user -> first_name }}">

                    <label for="last_name2">Last Name:</label>
                    <input id="last_name2" type="text" name="last_name" value="{{ $user -> last_name }}">
                </div>

                <div>
                    <button type="button" class="cancel-button" onclick="closeModalNameMobile()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-change-email modal-mobile">

        <div class="container-modal-mobile">

            <form method="POST" id="emailForm2" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="email2">New Email:</label>
                    <input id="email2" type="email" name="email" value="{{ $user -> email }}">
                </div>

                <div>
                    <button type="button" class="cancel-button" onclick="closeModalEmailMobile()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-change-password modal-mobile">

        <div class="container-modal-mobile">

            <form method="POST" id="passwordForm2" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="password2">Currently Password:</label>
                    <input id="password2" type="password" name="password" value="{{ $user -> password }}">
                </div>

                <div>
                    <label for="">New Password:</label>
                    <input id="password" type="password" name="password" value="{{ $user -> password }}">
                </div>

                <div>
                    <label for="">Confirm Password:</label>
                    <input id="password" type="password" name="password" value="{{ $user -> password }}">
                </div>

                <div>
                    <button type="button" class="cancel-button" onclick="closeModalPasswordMobile()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-change-phone modal-mobile">

        <div class="container-modal-mobile">

        <form method="POST" id="mobileForm2" class="AddressForm" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="mobile2">New Phone Number:</label>
                    <input id="mobile2"
                           type="tel"
                           name="mobile"
                           value="@if($user -> address) {{ $user -> address -> mobile }} @endif">
                </div>

                <div>
                    <button type="button" class="cancel-button" onclick="closeModalPhoneMobile()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-change-gender modal-mobile">

        <div class="container-modal-mobile">

            <form method="POST" id="genderForm2" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="gender2">Gender</label>
                    <select name="gender" id="gender2">
                        <option value="{{ $user -> gender }}" selected>{{ $user -> gender }}</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Undefined">Undefined</option>
                    </select>
                </div>

                <div>
                    <button type="button" class="cancel-button" onclick="closeModalGenderMobile()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-change-country modal-mobile">

        <div class="container-modal-mobile">

            <form method="POST" id="countryForm2" class="AddressForm" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="country2">New Country:</label>
                    <input id="country2"
                           type="text"
                           name="country"
                           value="@if($user -> address) {{ $user -> address -> country }} @endif">
                </div>

                <div>
                    <button type="button" class="cancel-button" onclick="closeModalCountryMobile()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-change-city modal-mobile">

        <div class="container-modal-mobile">

            <form method="POST" id="cityForm2" class="AddressForm" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="city2">New City:</label>
                    <input id="city2"
                           type="text"
                           name="city"
                           value="@if($user -> address) {{ $user -> address -> city }} @endif">
                </div>

                <div>
                    <button type="button" class="cancel-button" onclick="closeModalCityMobile()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <div class="modal-change-street modal-mobile">

        <div class="container-modal-mobile">

            <form method="POST" id="addressForm2" class="AddressForm" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="address2">New Address:</label>
                    <input id="address2"
                           type="text"
                           name="address"
                           value="@if($user -> address) {{ $user -> address -> address }} @endif">
                </div>

                <div>
                    <button type="button" class="cancel-button" onclick="closeModalStreetMobile()">Cancel</button>
                    <button class="save change-button">Change</button>
                </div>
            </form>

        </div>

    </div>

    <!-- End Modal Mobile -->
@endsection

@section('script')

    <script>
        $(document).ready(function () {

            $(document).on('click', '.save', function (e) {
                e.preventDefault();

                let formID = $(this).closest('form').attr('id');

                //console.log('Form ID: #' + formID);

                saveInfo(formID);

            });

        });

        function saveInfo(formName) {
            let formData = new FormData($('#' + formName)[0]), URL;

            if (!(formName === 'imageForm') && !(formName === 'imageForm2') ){
                if($('#' + formName).hasClass('AddressForm'))
                    URL = "{{ route('update.user.address') }}";
                else
                    URL = "{{ route('update.user.profile') }}";
            }
            else
                URL = "{{ route('update.user.image') }}";

            $.ajax({
                type: 'POST',
                url: URL,
                data: formData,
                enctype: "multipart/form-data",
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    if ($.isEmptyObject(data.error)) {
                        Swal.fire({
                            icon: 'success',
                            title: data.success,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: data.error,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        Toast.fire({
                            icon: 'error',
                            title: data.error
                        })
                    }
                }
            });

        }

    </script>
@endsection
