@extends('admin.layouts.adminDashboardLayouts.admin_layouts')
@section('title','All_Categories')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="sl-page-title">
                <h5>Category List</h5>
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

                <table class="table scroll-horizontal">
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @if(isset($categories)&&$categories->count()>0)

                        @foreach($categories as $index=> $category)
                            <tr class="categoryRow{{$category->id}}">
                                <td>{{$index + 1}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->getStatus()}}</td>
                                <td>
                                    <a class="delete_category btn btn-sm btn-danger"
                                       category_id="{{$category->id}}">Delete</a>
                                    <a href="{{route('edit.category',$category->id)}}"
                                       class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{route('show.categorySubCategory',$category->id)}}"
                                    ><i class="btn btn-sm">show sub-categories</i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="alert alert-success  " id="added_success" style="display: none" role="alert">delete
                    successfully
                </div>

                <div class="card pd-20 pd-sm-40 link-success"></div>
            </div><!-- card -->
        </div>
    </div><!-- sl-pagebody -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection

@section("script")
    <script>

        $(document).on('click', '.delete_category', function (e) {
            e.preventDefault();

            var id_category = $(this).attr('category_id');

            $.ajax({
                type: 'post',
                url: "{{route('delete.category')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id_category,

                },
                success: function (data) {
                    if (data.status == true) {
                        $('#added_success').show();
                        $('#added_success').hide(10000);
                        $('.categoryRow' + data.id).remove();
                    }
                    ;


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
