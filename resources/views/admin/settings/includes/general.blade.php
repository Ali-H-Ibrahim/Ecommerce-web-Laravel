<div class="tile">
    <form action="{{ route('update.site.settings') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <h3 class="tile-title">General Settings</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="site_name">Site Name</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter site name"
                    id="site_name"
                    name="site_name"
                    value="@if(isset($settings)) {{ $settings -> site_name }} @endif"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="address">Store Address</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter store address"
                    id="address"
                    name="address"
                    value="@if(isset($settings)) {{ $settings -> address }} @endif"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="email">Email Address</label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="Enter store email address"
                    id="email"
                    name="email"
                    value="@if(isset($settings)) {{ $settings -> email }} @endif"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="phone">Phone Number</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter store phone number"
                    id="phone"
                    name="phone"
                    value="@if(isset($settings)) {{ $settings -> phone }} @endif"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="tax">Tax</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter store tax"
                    id="tax"
                    name="tax"
                    value="@if(isset($settings)) {{ $settings -> tax }} @endif"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="shipping_cost">Shipping Cost</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter store shipping cost"
                    id="shipping_cost"
                    name="shipping_cost"
                    value="@if(isset($settings)) {{ $settings -> shipping_cost }} @endif"
                />
            </div>
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>
                        Update Settings
                    </button>
                </div>
            </div>
        </div>
    </form>
    <div class="alert alert-success" id="added_success" style="display: none" role="alert">added successfully</div>
    <div class="alert alert-danger" id="add_danger" style="display: none" role="alert">error</div>
</div>
@section('script')
    <script src="{{ asset('backend/bootstrap/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('backend/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Setting Form Script-->
    <script>
        // loadFile = function (event, id) {
        //     // let output = document.getElementById(id);
        //     // output.src = URL.createObjectURL(event.target.files[0]);
        //
        //     $('#' + id).attr('src' , URL.createObjectURL(event.target.files));
        // }
        //
        // $(.onchange = evt => {
        //     const [file] = imgInp.files
        //     if (file) {
        //         blah.src = URL.createObjectURL(file)
        //     }
        // }

        $(document).on('click', '#save', function (e) {
            e.preventDefault();
            console.log('hhhhhhhhhhhhhh');

            let formData = new FormData($('#settingForm')[0]);
            // console.log($('#settingForm')[0]);
            $.ajax({
                type: 'POST',
                url: "{{ route('update.site.settings') }}",
                data: formData,
                enctype: "multipart/form-data",
                processData: false,
                contentType: false,
                cache: false,

                success: function (data) {
                    if (data.status == true) {
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
