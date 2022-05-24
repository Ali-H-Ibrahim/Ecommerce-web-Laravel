@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')

    <div class="app-content content">
        <div class="content">
            <div class="row">
                <div class="col-xl-4 col-12">

                    <img src="{{asset("images/Product/main_photo/".$product->main_img)}}" width="150" height="150">

                    <form method="post" action="{{route('update.product',$product->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name Product</label>
                            <br>
                            <label >
                                <input type="text" class="form-control" name="name" value="{{$product->name}}"  placeholder="name" >
                            </label>
                            <label>
                                @error('name')
                                <small  class="form-text text-muted alert-danger ">{{$message}}</small>
                                @enderror
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Update Activity Status</label>
                            <select class="form-group" name="status">
                                <option  value=1> Active</option>
                                <option  value=0> In-active</option>
                                @error('status')
                                <small  class="form-text text-muted alert-danger ">{{$message}}</small>
                                @enderror
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">quantity</label><br>
                            <label>
                                <input type="text" class="form-control" name="quantity"  value="{{$product->quantity}}"  placeholder="quantity" >
                            </label>
                            <label>
                                @error('quantity')
                                <small  class="form-text text-muted alert-danger ">{{$message}}</small>
                                @enderror
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label><br>
                            <label>
                                <input type="text" class="form-control" name="price" value="{{$product->price}}"  placeholder="price" >
                            </label>
                            <label>
                                @error('price')
                                <small  class="form-text text-muted alert-danger ">{{$message}}</small>
                                @enderror
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label><br>
                            <label >
                                <input type="text" class="form-control" name="description" value="{{$product->description}}"  placeholder="description">
                            </label>
                            <label>
                                @error('description')
                                <small  class="form-text text-muted alert-danger ">{{$message}}</small>
                                @enderror
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sub Category</label><br>
                            <label>
                                <select class="form-group" name="SubCategory_id">
                                    @if(isset($subCategories) && $subCategories->count())
                                        @foreach($subCategories as $subCategory )
                                            <option  value="{{$subCategory->id}}"> {{$subCategory->name}}.{{$subCategory->categories->name}}</option>
                                        @endforeach
                                    @endif
                                    @error('SubCategory_id')
                                    <small  class="form-text text-muted alert-danger ">{{$message}}</small>
                                    @enderror
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <br>
                            <label for="exampleInputEmail1">Brands</label><br>
                            <label>
                                <select class="form-group" name="brand_id">
                                    <optgroup label="Brands">
                                        @if(isset($brands) && $brands->count())
                                            @foreach($brands as $brand )
                                                <option  value="{{$brand->id}}"> {{$brand->name}}</option>
                                            @endforeach
                                        @endif
                                        @error('brand_id')
                                        <small  class="form-text text-muted alert-danger ">{{$message}}</small>
                                        @enderror
                                    </optgroup>
                                </select>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">main image</label><br>
                            <input type="file" class="form-control" name="main_img">
                            @error('main_img')
                            <small  class="form-text text-muted alert-danger ">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Update">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection




