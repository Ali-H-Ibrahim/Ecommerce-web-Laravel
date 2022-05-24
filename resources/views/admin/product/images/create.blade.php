@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('title','Creat_images')
@section('admin_content')

    <div class="app-content content ">



        <div class="sl-page-title">
                <h4 class="hr">قائمة الصور </h4>
            </div><!-- sl-page-title -->
            <br>
            <div class="card pd-20 pd-sm-40">
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">{!! session('error') !!}</div>
                @endif
                @if(session('delete'))
                    <div class="alert alert-success" role="alert">{!! session('delete') !!}</div>
                @endif
                @if(session('update'))

                    <div class="alert alert-success" role="alert">{!! session('update') !!}</div>

                @endif
                    @if(isset($images)&&$images->count()>0)


                    <table class="table scroll-horizontal">
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">photo</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($images as $index=> $image)
                            <tr class="imageRow{{$image->id}}">
                                <td>{{$index+1}}</td>
                                <td> <a href="{{asset("images/Product/images_Product/".$image->img)}}" itemprop="contentUrl" data-size="480*360">
                                        <img src="{{asset("images/Product/images_Product/".$image->img)}}" width="100" height="100"></a></td>

                                <td>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <a  href="" class="delete_Image btn btn-sm btn-danger"
                                                    image_name="{{$image->img}}" image_id="{{$image->id}}" >Delete</a>
                                            </div>

                                        </div>
                                    </div>
                                </td>

                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="alert alert-success  "  id="added_success" style="display: none" role="alert">delete successfully</div>

                <div class="card pd-20 pd-sm-40 link-success"></div>
            </div><!-- card -->






    <div class="cart-content collapsed show">
                    <form class="form"  method="post"  action="{{route('save.image.product.Db')}}" enctype="multipart/form-data">
                    @csrf

                            <input type="hidden" class="form-control" name="id" value="{{$id}}" >
                        <div class="form-body">

                        <h4 class="form-section"><li class="ft-book"></li>  اضافة المزيد من صور للمنتج</h4>
                            <div class="form-group">

                                <div id="my-dropzone" class="dropzone dropzone-area"  >

                                <div class="dz-message"> يمكن رفع اكثر من صورة</div>
                                </div>
                                <br>
                                <br>
                            </div>

                        </div>

                        <div class="content">

                        <input class="btn-info btn-lg" type="submit" value="save">
                        </div>
                    </form>
                     <div class="alert alert-success  "  id="added_success" style="display: none" role="alert">delete successfully</div>
                    <div class="alert alert-danger"  id="add_danger" style="display: none" role="alert">error</div>

    </div></div>
@endsection

@section("script")

    <script>
        var uploadDocumentMap={}
        // "myAwesomeDropzone" is the camelized version of the HTML element's ID
        Dropzone.options.myDropzone =  {
            //autoProcessQueue: false,
            paramName: "dzfile", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            clickable:true,
            addRemoveLinks:true,
            acceptedFiles:"image/*",
            dictFallbackMessage: ' رسالة',
            dictInvalidFileType: ' لا يمكن رفع هذا النوع من الملفات',
            dictCancelUpload: 'الغاء الرفع',
            dictCancelUploadConfirmation: ' هل انت متاكد من حذف الصورة ' ,
            dictRemoveFile:' حذف الصورة',
            dictMaxFilesExceeded: 'لا يمكن رفع اكثر من ذلك',
            headers:{
                'X-CSRF-TOKEN':"{{csrf_token()}}"
            },


            url:"{{route('save.image.product')}}",
            success:
                function(file, response) {
                $('.form').append('<input type="hidden"  name="document[]" value="' +response.name + '">')
                    uploadDocumentMap[file.name]=response.name

                }

            ,
            removedfile:function (file){



              file.previewElement.remove()
              var name = ''
              if(typeof file.file_name !== 'undefined')
              {
                name=file.file_name
              }else {

                  name = uploadDocumentMap[file.name]
              }
                $('.form').find('input[name="document[]"][ value="' + name + '"]').remove()

                $.ajax({
                    type:'post',
                    url:"{{route('removeImg')}}",
                    data:{
                        '_token':"{{csrf_token()}}",
                        'name':name
                    },
                    success:function (data){
                        if(data.status==true) {
                            $('#added_success').show();
                            $('#added_success').hide(10000);
                        }


                    },
                    error:function (reject){
                        if(reject){


                       }
                    }
                });

            },

            init: function() {
               @if(isset($event)&& $event->document)
                var  files=
                    {!! json_decode($event->document) !!}
                for(var i in files){
                    var file=files[i]
                    this.option.addedfile.call(this,file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden"  name="document[]" value="' + file.file.name + '">')
                }


                @endif
            }
        };

    </script>
    <script>

        $(document).on('click','.delete_Image',function (e){
            e.preventDefault();

            var id_image=$(this).attr('image_id');
            var name_image=$(this).attr('image_name');

            $.ajax({
                type:'post',
                url:"{{route('remove.Img')}}",
                data: {
                    '_token':"{{csrf_token()}}",
                    'id':id_image,
                    'name':name_image,

                },
                success:function (data){
                    if(data.status==true) {
                        $('#added_success').show();
                        $('#added_success').hide(10000);
                        $('.imageRow'+data.id).remove();
                    };


                },
                error:function (reject){
                    if(reject){
                        $('#add_danger').show();
                    }

                }


            });
        });
    </script>

@endsection



