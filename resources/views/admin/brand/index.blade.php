@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->

    @if(session('error'))
        <div class="alert alert-danger" role="alert">{!! session('error') !!}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success" role="alert">{!! session('success') !!}</div>
    @endif


    <div class="app-content content">
        <div class="container-fluid">
            <div class="sl-page-title">
                <h5>Brand List</h5>
            </div><!-- sl-page-title -->
            <br>
            <div class="card pd-20 pd-sm-40">

                <table class="table table-hover  scroll-horizontal">
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Description</th>
                        <th scope="col">Extra Image</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @if(isset($brands)&&$brands->count()>0)

                        @foreach($brands as $index=>$brand)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$brand->name}}</td>
                                <td><img src="{{asset("images/brands/logo/".$brand->logo)}}" width="100" height="100"></td>
                                <td>{{$brand->description}}</td>
                            <td><img src="{{asset("images/brands/photo/".$brand->image)}}" width="100" height="100"></td>
                                <td>
                                    <a href="{{route('delete.brand',$brand->id)}}"class="btn btn-sm btn-danger">Delete</a>
                                    <a href="{{route('edit.brand',$brand->id)}}"
                                        class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{route('show.brandProduct',$brand->id)}}"><i class="btn btn-sm">show Product</i></a>
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
