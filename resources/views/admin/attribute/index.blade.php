@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="app-content content">
        <div class="container-fluid">

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
                <h5>Attributes List</h5>
            </div><!-- sl-page-title -->
            <br>
            <div class="card pd-20 pd-sm-40">
                <table class="table scroll-horizontal">

                    <thead class="black white-text">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Attribute Name</th>
                        <th scope="col">Field Type</th>
                        <th scope="col">Required</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($attributes) && $attributes->count() > 0)
                        @foreach($attributes as $index => $attribute)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $attribute -> name }}</td>
                                <td>{{ $attribute -> field_type }}</td>
                                <td>{{ $attribute -> is_required }}</td>
                                <td>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="{{ route('delete.attribute', $attribute->id) }}"
                                                   class="btn btn-sm btn-danger">Delete</a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="{{ route('edit.attribute', $attribute -> id) }}"
                                                   class="btn btn-sm btn-info">Edit</a>
                                            </div>
                                        </div>
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
