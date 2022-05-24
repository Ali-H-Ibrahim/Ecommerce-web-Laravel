@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('title','Creat_Category')
@section('admin_content')


    <div class="app-content content">
                    <form  id="categoryForm" method="post">
                    @csrf
                        <div class="container">
                            <div class="row">
                        <div class="form-group  col-sm-5 text-center">
                            <label class="lead" for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" name="name" id="name"  placeholder="name" >
                            <small  id="name_error" class="form-text text-muted alert-danger "></small>
                        </div>
                        <div class="form-group  col-sm-8 text-center">

                        <label for="exampleInputEmail1">Activity Status</label>
                                <select class="form-group " name="status" >
                                    <optgroup label="status">
                                <option  value=1> Active</option>
                                <option  value=0> In-active</option>
                                    </optgroup>
                            </select>

                        </div>
                        <div class="form-group col-sm-3 ">
                            <button id="save" class="btn btn-primary">save </button>
                        </div>
                            </div>
                        </div>
                    </form>
                    <div class="alert alert-success  "  id="added_success" style="display: none" role="alert">Category added successfully</div>
                    <div class="alert alert-danger"  id="add_danger" style="display: none" role="alert">error</div>

    </div>
@endsection

@section("script")
    <script>

        $(document).on('click','#save',function (e){
            e.preventDefault();
            // console.log('hhhhhh3333333333333333333333333333333333333333333hhhheeeee');

            $('#name_error').text('');
            $('#added_success').hide();

            var formData=new FormData($('#categoryForm')[0]);
           // var formData=$('#categoryForm').serializeArray();
            $.ajax({
                type:'post',
                enctype:"multipart/form-data",
                url:"{{route('store.new.category')}}",
                data:formData,
                processData:false,
                contentType:false,
                cache:false,

                success:function (data){

                    if(data.status==true) {
                        $('#added_success').show();
                        $('#added_success').hide(10000);
                    }
                    $('#name').val('');
                },
                error:function (reject){
                    var response=$.parseJSON(reject.responseText);
                    $.each(response.errors,function (key,val){
                        $("#"+key+"_error").text(val[0]);
                    });}
            });
        });
    </script>


    @endsection



