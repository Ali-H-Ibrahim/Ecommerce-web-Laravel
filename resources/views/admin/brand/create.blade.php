@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')


    @if(session('error'))
        <div class="alert alert-danger" role="alert">{!! session('error') !!}</div>
    @endif

    <div class="app-content content">
        <div class="content">
            <div class="row">
                <div class="col-xl-4 col-12">

    <form method="post"  id="brandForm" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Brand Name</label>
            <br>
            <label>
                <input type="text" class="form-control" name="name"  placeholder="name" >
            </label>
            @error('name')
            <small  class="form-text text-muted alert-danger ">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Brand logo</label>
            <br>
            <input type="file" class="form-control" name="logo">
            @error('logo')
            <small  class="form-text text-muted alert-danger ">{{$message}}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1">الوصف</label>
            <br>
            <textarea rows="8" id="description" type="text" class="form-control fieldForm info" name="description"
                        placeholder="description"></textarea>
            @error('description')
            <small  class="form-text text-muted alert-danger ">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Extra Brand Photo</label>
            <br>
            <input type="file" class="form-control" name="image">
            @error('image')
            <small  class="form-text text-muted alert-danger ">{{$message}}</small>
            @enderror
        </div>
        
        

        <div class="form-group">
            <button id="save" class="btn btn-primary">save </button>
        </div>

    </form>
                    <div class="alert alert-success  "  id="added_success" style="display: none" role="alert">Category added successfully</div>

                </div>
            </div>
        </div>
    </div>



@endsection
@section("script")
    <script src="{{asset('admin/js/scripts/jquery-3.6.0.min.js')}}" type="text/javascript"></script>
    <script>

        $(document).on('click','#save',function (e){
            e.preventDefault();
            var formData=new FormData($('#brandForm')[0]);
            // var formData=$('#categoryForm').serializeArray();
            $.ajax({
                type:'post',
                enctype:"multipart/form-data",
                url:"{{route('store.new.brand')}}",
                data:formData,
                processData:false,
                contentType:false,
                cache:false,


                success:function (data){
                    if(data.status==true) {
                        $('#added_success').show();

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



