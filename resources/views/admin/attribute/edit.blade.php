@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('title','Edit_Category')

@section('admin_content')

    <div class="app-content content">
        <div class="content">
            <div class="row">
                <div class="col-xl-4 col-12">
                    <form method="post" action="{{route('update.attribute',$attribute->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Attribute Name</label>
                            <input type="text" class="form-control" name="name" value="{{$attribute->name}}" placeholder="name" >
                            @error('name')
                            <small  class="form-text text-muted alert-danger ">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                        <button id="save" class="btn btn-primary">Update </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



