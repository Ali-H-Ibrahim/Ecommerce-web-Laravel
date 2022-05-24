@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('title','Creat_images')
@section('admin_content')

    <div class="app-content content">
        <div class="container">
                <div class="app-title pt-2">
                    <h4 class="h2">قائمة الصور </h4>
                </div>

                <div class="card pd-20 pd-sm-40 pt-2">
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">{!! session('error') !!}</div>
                    @endif
                    @if(session('delete'))
                        <div class="alert alert-success" role="alert">{!! session('delete') !!}</div>
                    @endif
                    @if(session('update'))
                        <div class="alert alert-success" role="alert">{!! session('update') !!}</div>
                    @endif

                    @if(isset($images) && $images->count() > 0)
                        @foreach($images as $index => $image)
                            <figure class="cl-md-6 col-12" itemprop="associatedMedia" itemscope="" itemtype="">
                                <a href="{{ asset("images/slider/" . $image -> img) }}"
                                   itemprop="contentUrl"
                                   data-size="480*360">
                                    <img class="img-thumbnail img-fluid"
                                         src="{{ asset("images/slider/" . $image -> img) }}"
                                         itemprop="thumbnail"
                                         alt="slider image">
                                </a>
                            </figure>
                        @endforeach
                    @endif

                    <div class="alert alert-success" id="added_success" style="display: none" role="alert">delete successfully</div>

                    <div class="card pd-20 pd-sm-40 link-success"></div>
                </div>

                <div class="cart-content collapsed show">
                    <form class="form"
                          method="post"
                          action="{{ route('save.image.slider.Db') }}"
                          enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" class="form-control" name="id">
                        <div class="form-body mb-4">
                            <h4 class="form-section">
                                <i class="ft-file-plus"></i>
                                إضافة المزيد من الصور
                            </h4>
                            <div class="form-group">
                                <div id="my-dropzone" class="dropzone dropzone-area">
                                    <div class="dz-message"> يمكن رفع أكثر من صورة</div>
                                </div>
                            </div>

                        </div>

                        <div class="mb-4">
                            <input class="btn btn-info btn-lg width-15-per" type="submit" value="save">
                        </div>

                    </form>

                    <div class="alert alert-success  " id="added_success" style="display: none" role="alert">delete successfully</div>
                    <div class="alert alert-danger" id="add_danger" style="display: none" role="alert">error</div>

                </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        let uploadDocumentMap = {}
        // "myAwesomeDropzone" is the camelized version of the HTML element's ID
        Dropzone.options.myDropzone = {
            //autoProcessQueue: false,
            paramName: "dzfile", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: "image/*",
            dictFallbackMessage: ' رسالة',
            dictInvalidFileType: ' لا يمكن رفع هذا النوع من الملفات',
            dictCancelUpload: 'إلغاء الرفع',
            dictCancelUploadConfirmation: ' هل أنت متأكد من حذف الصورة ',
            dictRemoveFile: ' حذف الصورة',
            dictMaxFilesExceeded: 'لا يمكن رفع أكثر من ذلك',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },

            url: "{{ route('save.image.slider') }}",
            success:
                function (file, response) {
                    $('.form').append('<input type="hidden"  name="document[]" value="' + response.name + '">');
                    uploadDocumentMap[file.name] = response.name;
                }

            ,
            removedfile: function (file) {
                file.previewElement.remove()
                let name = '';
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name;
                } else {
                    name = uploadDocumentMap[file.name];
                }
                $('.form').find('input[name="document[]"][ value="' + name + '"]').remove();

                $.ajax({
                    type: 'post',
                    url: "{{route('removeImg.slider')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'name': name
                    },
                    success: function (data) {
                        if (data.status === true) {
                            $('#added_success').show().hide(10000);
                            $('#added_success').hide(10000);
                        }
                    },
                    error: function (reject) {
                        if (reject) {
                        }
                    }
                });

            },
            init: function () {
                @if( isset($event) && $event -> document )
                let files = {!! json_decode($event -> document) !!};

                for (let i in files) {
                    let file = files[i];
                    this.option.addedfile.call(this, file);
                    file.previewElement.classList.add('dz-complete');
                    $('form').append('<input type="hidden"  name="document[]" value="' + file.file.name + '">');
                }
                @endif
            }
        };

    </script>
    <script>

        $(document).on('click', '.delete_Image', function (e) {
            e.preventDefault();

            let id_image = $(this).attr('image_id');
            let name_image = $(this).attr('image_name');

            $.ajax({
                type: 'post',
                url: "{{route('remove.Img')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id_image,
                    'name': name_image,

                },
                success: function (data) {
                    if (data.status === true) {
                        $('#added_success').show();
                        $('#added_success').hide(10000);
                        $('.imageRow' + data.id).remove();
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



