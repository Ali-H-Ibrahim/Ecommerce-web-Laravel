@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

{{--@section('title','Edit_Category')--}}

@section('admin_content')
    <div class="app-content content">
        <div class="container-fluid">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-cogs"></i>Site Sittings</h1>
                </div>
            </div>
            @include('admin.settings.flash')
            <div class="row user">
                <div class="col-md-2">
                    <div class="tile p-0">
                        <ul class="nav flex-column nav-tabs user-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#general" data-toggle="tab">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#site-logo" data-toggle="tab">Site Logo</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content">
                        <div class="tab-pane active" id="general">
                            @include('admin.settings.includes.general')
                        </div>
                        <div class="tab-pane fade" id="site-logo">
                            @include('admin.settings.includes.logo')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
