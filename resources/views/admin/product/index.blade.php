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
                <h5>Products List</h5>
            </div><!-- sl-page-title -->
            <br>
            <div class="card pd-20 pd-sm-40">

                <table class="table scroll-horizontal">
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Price</th>
                        <th scope="col">SubCategory</th>
                        <th scope="col">Status</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @if(isset($products) && $products->count() > 0)

                        @foreach($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product -> name }}</td>
                                <td>{{ $product -> brands -> name }}</td>
                                <td>{{ $product -> price }}</td>
                                <td>{{ $product -> subCategories->name }} . {{ $product -> subCategories -> categories -> name }}</td>

                                <td>{{$product->getStatus()}}</td>
                                <td>
                                    <img src="{{ asset("images/Product/main_photo/" . $product -> main_img) }}"
                                         width="100" height="100"
                                         alt="Product Image">
                                </td>
                                <td>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <a href="{{ route('delete.products', $product -> id) }}"
                                                   class="btn btn-sm btn-danger"
                                                   id="delete">Delete</a>
                                            </div>

                                            <div class="col-sm-2">
                                                <a href="{{ route('edit.product', $product -> id) }}"
                                                   class="btn btn-sm btn-info">Edit</a>
                                            </div>

                                            <div class="col-sm-3">
                                                <a class="btn btn-sm btn-amber"
                                                   href="{{ route('image.product', $product -> id)}}">اضافة صور </a>
                                            </div>

                                            <div class="col-sm-2">
                                                <a href="{{ route('show.product', $product -> id) }}"
                                                   class="btn btn-sm btn-success"
                                                >Show</a>
                                            </div>

                                            <div class="col-sm-2">
                                                <a href="#" class="btn btn-sm btn-primary Attr" data-toggle="modal"
                                                   data-target="#attribute-modal" product_id="{{$product ->id}}"    >Attr</a>
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
    </div><!-- end app-content -->

    <!-- LARGE MODAL -->
    <div id="attribute-modal" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Attribute Add</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- {{ route('store.attribute') }}--}}
                <form method="POST"
                      action="{{ route('store.new.products.attribute', $product -> id) }}"
                      id="product-attribute"
                      enctype="multipart/form-data">
                @csrf
                <!-- modal-body -->
                    <div class="modal-body pd-20">
                        <label class="lead info" for="attribute-name">Name</label>
                        <select class="form-group" name="attribute_id" id="attribute-name">
                            @if(isset($attributes) && $attributes -> count())
                                @foreach($attributes as $attribute )
                                    <option value="{{ $attribute -> id }}"> {{ $attribute -> name }}</option>
                                @endforeach
                            @endif
                            {{--    @else    <option> not found</option>  --}}
                            @error('attribute_id')
                            <small class="form-text text-muted alert-danger">{{ $message }}</small>
                            @enderror
                        </select>
                        <div class="form-group">
                            <label class="lead info" for="value-field">Value</label>
                            <input id="value-field" type="text" class="form-control" name="value" ID="value"
                                   placeholder="value"
                                   aria-label="Text input with dropdown button">

                            <label class="lead info" for="price-field">Price</label>
                            <input id="price-field" type="text" class="form-control" name="price" ID="price"
                                   placeholder="price"
                                   aria-label="Text input with dropdown button">

                            <label class="lead info" for="quantity">Quantity</label>
                            <input id="stock-field" type="text" class="form-control" name="quantity" ID="quantity"
                                   placeholder="quantity"
                                   aria-label="Text input with dropdown button">
                            <input class="atprid" type="hidden" name="id" >
                        </div>
                    </div>

                    <!-- modal-footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div>
    <!-- modal -->

    <!-- ########## END: MAIN PANEL ########## -->
@endsection


@section('script')
    <script src="{{ asset('backend/bootstrap/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('backend/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        /**
         *  1. in every select add element
         *
         *  2. after add reset modal form
         **/
    </script>
    <script>


        $(document).on('click', '.Attr', function (e) {
            e.preventDefault();

          let  id_product=$(this).attr('product_id');
            $('.atprid').val(id_product);
            console.log(id_product);


        });


        $(document).on('click', '#save', function (e) {
            e.preventDefault();

            let formData = new FormData($('#attributeForm')[0]);

            $.ajax({
                enctype: "multipart/form-data",
                type: 'POST',
                url: "{{route('store.new.products.attribute')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,

                success: function (data) {
                    if (data.status === true) {
                        $('#added_success').show();
                    }
                },
                error: function (reject, xhr) {
                    console.log(xhr);
                    if (reject) {
                        $('#add_danger').show();
                    }
                }
            });

        });
    </script>

@endsection
