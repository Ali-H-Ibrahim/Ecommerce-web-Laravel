@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('passowrd_success'))
    <div class="alert alert-success" role="alert">{!! session('passowrd_success') !!}</div>
@endif
<div class="app-content content">
    <div class="content">
        <div class="row">
            <div class="col-xl-4 col-12">
<div class="card card-outline-secondary">
    <div class="card-header">
        <h3 class="mb-0">Change My Password</h3>
    </div>
    <div class="card-body">
        <form method="post" action="{{route('adminSettings')}}">
            @csrf
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password" autocomplete="current-password">
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" autocomplete="current-password">
                    <span class="form-text small text-muted">
                        The password must be 8-20 characters, and must <em>not</em> contain spaces.
                    </span>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" autocomplete="current-password">
                    <span class="form-text small text-muted">
                        To confirm, type the new password again.
                    </span>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg float-right">Update</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection
