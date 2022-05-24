@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')
    <div class="app-content content">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">{!! session('error') !!}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">{!! session('success') !!}</div>
        @endif
        <div class="content">
            <div class="row">
                <div class="col-xl-4 col-12">
                    <form method="post"  action="{{route('store.new.products.attribute',$product -> id)}}" enctype="multipart/form-data">
                        @csrf
                        <select class="form-group"  name="attribute_id">
                            @if(isset($attributes) && $attributes->count())
                                @foreach($attributes as $attribute )
                                    <option  value="{{$attribute->id}}"> {{$attribute->name}}</option>
                                @endforeach
                            @endif
                            {{--    @else    <option> not found</option>  --}}
                            @error('attribute_id')
                                <small  class="form-text text-muted alert-danger " >{{$message}}</small>
                            @enderror
                        </select>
                        <div class = "form-group">
                            <input type="text" class="form-control" name="value" ID="value" placeholder="value" aria-label="Text input with dropdown button">
                            <input type="text" class="form-control" name="price" ID="price" placeholder="price" aria-label="Text input with dropdown button">
                            <input type="text" class="form-control" name="stock" ID="stock" placeholder="stock" aria-label="Text input with dropdown button">
                        </div>
                        <div class="form-group">
                            <button id="save" class="btn btn-primary">Save </button>
                        </div>

                    </form>
                    <div class="alert alert-success  "  id="added_success" style="display: none" role="alert">Category added successfully</div>
                </div>
            </div>
        </div>
    </div>
@endsection
