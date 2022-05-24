@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="app-content content">
        <div class="container-fluid">
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
                <div class="sl-page-title">
                    <h5>Product's Attributes List</h5>
                </div>
                <table class="table scroll-horizontal">
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Attribute Type</th>
                        <th scope="col">Value</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($productsAttributes) && $productsAttributes->count() > 0)
                        @foreach($productsAttributes as $index => $productsAttribute)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product -> attributes[0] -> name }}</td>
                                <td>{{ $product -> attributes[0] -> field_type }}</td>
                                <td>{{ $productsAttribute -> value }}</td>
                                <td>{{ $productsAttribute -> price }}</td>
                                <td>{{ $productsAttribute -> quantity }}</td>
                                <td>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a class="btn btn-danger btn-sm"
                                                   href="{{ route('delete.products.attribute', $productsAttribute->id) }}">Delete</a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a class="btn btn-info btn-sm"
                                                   href="{{ route('edit.products.attribute', $productsAttribute->id) }}">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="form-group col-sm-4 col-12">
                    <a class="btn btn-info btn-sm" href="{{ route('add.products.attribute', $product -> id) }}">
                        Add new attribute
                    </a>
                </div>
                <div class="card pd-20 pd-sm-40 link-success"></div>
            </div><!-- card -->
        </div>
    </div><!-- end app-content -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
