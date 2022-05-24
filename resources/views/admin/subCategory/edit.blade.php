@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')

    <div class="app-content content">
        <div class="content">
            <div class="row">
                <div class="col-xl-4 col-12">
    <form method="post" action="{{route('update.subCategory',$subCategory->id)}}">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Name Sub Category</label>
            <input type="text" class="form-control" name="name"  value="{{$subCategory->name}}" placeholder="name" >
            @error('name')
            <small  class="form-text text-muted alert-danger ">{{$message}}</small>
            @enderror
            <label for="exampleInputEmail1">Activity Status</label>
            <select class="form-group" name="status">
                <option  value=1> Active</option>
                <option  value=0> In-active</option>
                @error('status')
                <small  class="form-text text-muted alert-danger ">{{$message}}</small>
                @enderror
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
            <select class="form-group" name="category_id">
                @if(isset($categorys) && $categorys->count())
                    @foreach($categorys as $category )
                        <option  value="{{$category->id}}"> {{$category->name}}</option>

                    @endforeach
                @endif
                {{--    @else    <option> not found</option>  --}}

                @error('category_id')
                <small  class="form-text text-muted alert-danger " >{{$message}}</small>
                @enderror

            </select>
        </div>
        <input type="submit" class="btn btn-success" value="Update">
    </form>
                </div>
            </div>
        </div>
    </div>

@endsection



