@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="app-content content">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-12 pt-2">
                    <form method="POST" id="attributeForm" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Attribute Name<span class="text-danger"> *</span></label>
                            <input type="text"
                                   id="name"
                                   class="form-control"
                                   name="name"
                                   placeholder="name"
                                   value="{{ old('name') }}">
                            @error('name')
                            <small class="form-text text-muted alert-danger ">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="field_type">Field Type</label>
                            @php
                                $types = [
                                    'select' => 'Select Box',
                                    'radio' => 'Radio Button',
                                    'text' => 'Text Field',
                                    'text_area' => 'Text Area'
                                ];
                            @endphp
                            <select name="field_type" id="field_type" class="form-control">
                                @foreach($types as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label" for="is_required">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="is_required"
                                           name="is_required"
                                           value="1"
                                           />
                                    Required
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button id="save" class="btn btn-primary">save</button>
                            <a class="btn btn-warning" href="{{route('view.attribute')}}">Back to list</a>
                        </div>

                    </form>
                    <div class="alert alert-success" id="added_success" style="display: none" role="alert">Attribute
                        added successfully
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('script')

    <script>
        $(document).on('click', '#save', function (e) {
            e.preventDefault();

            // console.log($('#attributeForm')[0]);
            let formData = new FormData($('#attributeForm')[0]);

            $.ajax({
                type: 'POST',
                url: "{{ route('store.new.attribute') }}",
                data: formData,
                enctype: "multipart/form-data",
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



