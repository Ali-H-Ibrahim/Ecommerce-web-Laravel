@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')



    <div class="app-content content">

        @if(session('success'))
            <div class="alert alert-success" role="alert">{!! session('success') !!}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{!! session('error') !!}</div>
        @endif
        <form method="post" id="productForm" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-4 pt-2">
                        <div class="form-group mg-b-10-force ">
                            <label class="form-control-label info"> القسم <span class="tx-danger"></span></label>
                            <select class="Category form-control select" data-placeholder="Choose country">
                                <option label="أختر القسم"></option>
                                @foreach($Categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 pt-2">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label info">القسم الفرعي <span
                                    class="text-danger"> *</span></label>
                            <select class="form-control select2" data-placeholder="أخترالقسم الفرعي "
                                    name="SubCategory_id">

                            </select>

                            @error('SubCategory_id')
                            <small class="form-text text-muted alert-danger ">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Brand -->
                    <div class="col-md-4 pt-2">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label info">الماركات <span class="text-danger"> *</span></label>
                            <select class="form-control select2" name="brand_id">

                                <optgroup label="Brands">

                                    @if(isset($brands) && $brands->count())
                                        @foreach($brands as $brand )
                                            <option value="{{$brand->id}}"> {{$brand->name}} <img
                                                    src="{{asset("images/brand/logo/".$brand->logo)}}" width="1"
                                                    height="1">
                                            </option>
                                        @endforeach
                                    @endif
                                    @error('brand_id')
                                    <small class="form-text text-muted alert-danger ">{{$message}}</small>
                                    @enderror
                                </optgroup>
                            </select>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <!-- Name -->
                <div class="row">
                    <div class="form-group col-sm-4 col-12 ">
                        <label class="lead info" for="exampleInputEmail1">اسم المنتج</label>

                        <input type="text" class="form-control fieldForm info" name="name" placeholder="name">

                        <small id="name_error" class="form-text text-muted alert-danger form_error"></small>
                        <HR>

                    </div>


                    <!-- Color -->
                    <div class="form-group col-sm-4 col-12 ">
                        <label class="lead info" for="exampleInputEmail1">quantity</label><br>
                        <input type="text" class="form-control fieldForm info" name="quantity" placeholder="color">

                        <small id="color_error" class="form-text text-muted alert-danger form_error"></small>
                        <HR>

                    </div>

                    <!-- Price -->
                    <div class="form-group col-sm-4 col-12">
                        <label class="lead info" for="exampleInputEmail1">السعر</label><br>

                        <input type="text" class="form-control fieldForm info" name="price" placeholder="price">

                        <small id="price_error" class="form-text text-muted alert-danger form_error"></small>

                        <HR>
                    </div>

                    <!-- Description -->
                    <div class="form-group col-sm-9 col-12 ">
                        <label class="lead info" for="exampleInputEmail1">الوصف</label><br>
                        <textarea rows="8" type="text" class="form-control fieldForm info" name="description"
                                  placeholder="description"></textarea>
                        <small id="description_error" class="form-text text-muted alert-danger form_error"></small>

                    </div>


                    <!-- Images -->
                    <div class="form-group col-sm-12 col-12">
                        <label class="lead info" for="exampleInputEmail1">main image</label><br>
                        <label>
                            <input type="file" class="form-control fieldForm info" name="main_img">
                        </label>
                        {{-- error message--}}
                        <small id="main_img_error" class="form-text text-muted alert-danger form_error"></small>

                    </div>

                    <!-- End Images -->
                    <!-- Status -->
                    <div class="form-group col-sm-4 col-12">
                        <label class="lead info" for="exampleInputEmail1">Activity Status</label>
                        <select class="form-group info" name="status">
                            <option value=1> Active</option>
                            <option value=0> In-active</option>
                            <small id="status_error" class="form-text text-muted alert-danger form_error"></small>
                        </select>
                    </div>


                </div>
                <!-- Submit -->
                <div class="form-group col-sm-4 col-12">
                    <button id="save" class="btn btn-info">save</button>
                </div>
            </div>
        </form>
        <div class="alert alert-success" id="added_success" style="display: none" role="alert">added successfully</div>
        <div class="alert alert-danger" id="add_danger" style="display: none" role="alert">error</div>
    </div>

@endsection

@section('script')
    <script src="{{asset('admin/js/scripts/jquery-3.6.0.min.js')}}" type="text/javascript"></script>
    <script>
        $(document).on('click', '#save', function (e) {
            e.preventDefault();

            $('.form_error').text('');
            $('#added_success').hide();
            var formData = new FormData($('#productForm')[0]);
            $.ajax({
                type: 'post',
                enctype: "multipart/form-data",
                url: "{{route('store.new.product')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == true) {
                        $('#added_success').show();
                        $('#added_success').hide(10000);
                    }
                    $('.fieldForm').val('');

                },
                error: function (reject) {
                    if (reject) {

                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function (key, val) {
                            $("#" + key + "_error").text(val[0]);
                        });
                    }


                    //$('#add_danger').show();
                }


            });
        });


        $('.Category').on('change', function (e) {
            e.preventDefault();
            var category_id = $(this).val();
            // var id_category=$(this).attr('category_id');

            $.ajax({
                type: 'post',
                url: "{{route('show.subCategory')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': category_id,

                },

                success: function (data) {
                    if (data.status == true) {

                        var d = $('select[name="SubCategory_id"]').empty();
                        $.each(data.data, function (key, value) {

                            $('select[name="SubCategory_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');

                        });

                    } else {
                        alert('الرجاء اختيار قسم');
                    }

                },
                error: function (reject) {
                    if (reject) {
                        $('#add_danger').show();
                    }

                }


            });
        });

    </script>


@endsection

