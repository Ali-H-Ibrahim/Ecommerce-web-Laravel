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
                <h5>Products List</h5>
            </div><!-- sl-page-title -->
            <br>
            <div class="card pd-20 pd-sm-40">

                <table class="table scroll-horizontal" >
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">SubCategory</th>
                        <th scope="col">Status</th>
                        <th scope="col">Image</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @if(isset($products)&&$products->count()>0)

                        @foreach($products as  $index=>$product)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->subCategories->name}}.{{$product->subCategories->categories->name}}</td>
                                <td>{{$product->getStatus()}}</td>
                                <td><img src="{{asset("images/Product/main_photo/".$product->main_img)}}" width="100" height="100"></td>
                                <td>
                                    <a href="{{route('delete.products',$product->id)}}" class="btn btn-sm btn-danger"
                                       id="delete">Delete</a>
                                    <a href="{{route('edit.product',$product->id)}}"
                                       class="btn btn-sm btn-info">Edit</a>
                                    <a href="#edit"><i class="fa fa-eye"></i></a>
                                    <div class="col-sm-4">
                                        <a class="btn btn-sm btn-amber" href="{{route('image.product',$product->id)}}">اضافة صور </a>
                                    </div>


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
