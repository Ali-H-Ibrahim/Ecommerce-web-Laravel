@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    @if(session('error'))
        <div class="alert alert-danger" role="alert">{!! session('error') !!}</div>
    @endif
    @if(session('delete'))
        <div class="alert alert-success" role="alert">{!! session('delete') !!}</div>
    @endif
    @if(session('update'))
        <div class="alert alert-success" role="alert">{!! session('update') !!}</div>
    @endif

    <div class="app-content content">

        <div class="container-fluid">
            <div class="sl-page-title">
                <h5>SubCategory List</h5>
            </div><!-- sl-page-title -->
            <br>
            <div class="card pd-20 pd-sm-40">
                <table class="table  scroll-horizontal">
                    <thead class="black white-text">
                    <tr>
                    <th scope="col">#ID</th>
                        <th scope="col">Sub-Category Name</th>
                        <th scope="col">Main Category Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($subCategorys)&&$subCategorys->count()>0)

                        @foreach($subCategorys as $index=> $subCategory)
                            <tr class="subCategoryRow{{$subCategory->id}}">
                                <td>{{$index+1}}</td>
                                <td>{{$subCategory->name}}</td>
                                <td>{{$subCategory->categories->name}}</td>
                                <td>{{$subCategory->getStatus()}}</td>
                                <td>

                                    <a  class="delete_SubCategory btn btn-sm btn-danger"
                                        subCategory_id="{{$subCategory->id}}" >Delete</a>
                                    <a  href="{{route('edit.subCategory',$subCategory->id)}}"
                                       class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{route('show.subCategoryProduct',$subCategory->id)}}"><i class=" btn fa fa-eye">Show Products</i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="card pd-20 pd-sm-40 link-success"></div>
            </div><!-- card -->
        </div>
    </div><!-- sl-pagebody -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
@section("script")
    <script src="{{asset('admin/js/scripts/jquery-3.6.0.min.js')}}" type="text/javascript"></script>

    <script>
        $(document).on('click','.delete_SubCategory',function (e){
            e.preventDefault();

            var id_subCategory=$(this).attr('subCategory_id');

            $.ajax({
                type:'post',
                url:"{{route('delete.subCategory')}}",
                data: {
                    '_token':"{{csrf_token()}}",
                    'id':id_subCategory,

                },
                success:function (data){
                    if(data.status==true) {
                        $('#added_success').show();
                        $('#added_success').hide(10000);
                        $('.subCategoryRow'+data.id).remove();
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
