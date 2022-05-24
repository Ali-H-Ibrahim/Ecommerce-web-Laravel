@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')

    @if(session('success'))
        <div class="alert alert-success" role="alert">{!! session('success') !!}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" role="alert">{!! session('error') !!}</div>
    @endif
    <div class="app-content content">
        <div class="content">
            <div class="row">
                <div class="col-xl-4 col-12">
    <form method="post" action="{{route('update.brand',$brand->id)}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Name Brand</label>
            <input type="text" class="form-control" name="name" value="{{$brand->name}}" placeholder="name" >
            @error('name')
            <small  class="form-text text-muted alert-danger ">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Brand logo</label>

            <input type="file" class="form-control" name="logo">
            @error('logo')
            <small  class="form-text text-muted alert-danger ">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">الوصف</label>
            <br>
            <textarea rows="8" id="description" type="text" class="form-control fieldForm info" name="description"
                        placeholder="description"></textarea>
            @error('description')
            <small  class="form-text text-muted alert-danger ">{{$message}}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1">Extra Brand Photo</label>
            <br>
            <input type="file" class="form-control" name="image">
            @error('image')
            <small  class="form-text text-muted alert-danger ">{{$message}}</small>
            @enderror
        </div>



        <input type="submit" class="btn btn-primary"></input>
    </form>
                </div>
            </div>
        </div>
    </div>


@endsection



