@extends('front.layouts.front_layouts')

@section('front_content')
    <!-- Wishlist Start -->
    <div class="wishlist-page">
        <div class="container-fluid">
            <div class="wishlist-page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Add to Cart</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>
                                <tbody class="align-middle">

                                @if(isset($wishlist) && $wishlist -> count() > 0 )
                                    @foreach($wishlist as $row)
                                        @foreach($row -> products as $product)
                                            <tr>
                                                <td>
                                                    <div class="img">
                                                        <a href="{{ route('preview.product', $product -> id)}}">
                                                            <img
                                                                src="{{ asset("images/Product/main_photo/" . $product-> main_img) }}"
                                                                alt="product image">
                                                        </a>
                                                        <p>{{ $product -> name }}</p>
                                                    </div>
                                                </td>
                                                <td>${{ $product -> price }}</td>
                                                <td>
                                                    <button type="button" class="btn-cart add-to-cart"
                                                            data-id="{{ $product -> id }}">
                                                        Add to Cart
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="delete-from-wishlist"
                                                            data-id="{{ $product -> id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist End -->

@endsection

@section('script')

    <script>

        $(document).ready(function () {

            /**************** Add to Cart ****************/
            $('.add-to-cart').click(function () {

                let product_id = $(this).data('id');

                if (product_id) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('add.shopping.cart') }}",
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'id': product_id
                        },
                        success: function (data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })

                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.error
                                })
                            }
                        }

                    });

                } else {
                    alert('danger');
                }
            });

            /**************** Delete from Wishlist ****************/
            $(document).on('click', '.delete-from-wishlist', function (e) {
                    e.preventDefault();

                    let product_id = $(this).data('id');
                    let rowID = $(this).closest('tr');

                    swal({
                        title: "Are you Want to delete?",
                        text: "Once Delete, This will be Permanently Delete!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                if (product_id) {
                                    $.ajax({
                                        url: "{{ url('delete/wish-list/') }}/" + product_id,
                                        type: "POST",
                                        data: {'_token': "{{ csrf_token() }}"},
                                        success: function (data) {
                                            const Toast = Swal.mixin({
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 3000,
                                                timerProgressBar: true,
                                                onOpen: (toast) => {
                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                }
                                            })

                                            if ($.isEmptyObject(data.error)) {

                                                Toast.fire({
                                                    icon: 'success',
                                                    title: data.success
                                                })

                                                rowID.remove();

                                            } else {
                                                Toast.fire({
                                                    icon: 'error',
                                                    title: data.error
                                                })
                                            }


                                        },
                                    });

                                }
                            } else {
                                //swal("Safe Data!");
                            }
                        });
                }
            );

        });


    </script>
@endsection