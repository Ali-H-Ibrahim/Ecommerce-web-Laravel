@extends('admin.layouts.adminDashboardLayouts.admin_layouts')
@section('title','Sub_Categories')

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

                <table class="table table-hover scroll-horizontal">
                    <thead class="black white-text ">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @if(isset($subCategorys)&&$subCategorys->count()>0)

                        @foreach($subCategorys as$index=> $subCategory)
                            <tr>


                                <td>{{$index+1}}</td>
                                <td>{{$subCategory->name}}</td>
                                <td>{{$subCategory->categories->name}}</td>
                                <td>{{$subCategory->getStatus()}}</td>
                                <td>
                                    <a href="{{route('delete.subCategory',$subCategory->id)}}" class="btn btn-sm btn-danger"
                                       id="delete">Delete</a>
                                    <a  href="{{route('edit.subCategory',$subCategory->id)}}"
                                        class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{route('show.subCategoryProduct',$subCategory->id)}}"><i class=" btn fa fa-eye">Show Products</i></a>                                </td>
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
