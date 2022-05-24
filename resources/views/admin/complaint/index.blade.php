@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="sl-page-title">
                <h5>Suggestions & Complaints List</h5>
            </div>
            <br>
            <div class="card pd-20 pd-sm-40">
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">{!! session('error') !!}</div>
                @endif
                @if(session('delete'))
                    <div class="alert alert-success" role="alert">{!! session('delete') !!}</div>
                @endif

                <table class="table scroll-horizontal">
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Sender Name</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @if(isset($complaints)&&$complaints->count()>0)
                        @foreach($complaints as $index=> $complaint)
                            <tr class="complaintRow{{$complaint->id}}">
                                <td>{{$index + 1}}</td>
                                <td>{{$complaint -> name}}</td>
                                <td>
                                    <a class="delete_complaint btn btn-sm btn-danger" complaint_id="{{$complaint->id}}">Delete</a>
                                    <a href="{{route('show.complaint',$complaint->id)}}" class="btn btn-sm">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="alert alert-success " id="added_success" style="display: none" role="alert">Deleted Successfully</div>

                <div class="card pd-20 pd-sm-40 link-success"></div>
            </div>
        </div>
    </div>

@endsection

@section("script")
    <script>

        $(document).on('click', '.delete_complaint', function (e) {
            e.preventDefault();

            var id = $(this).attr('complaint_id');

            $.ajax({
                type: 'post',
                url: "{{route('delete.complaint')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    id : id,
                },
                success: function (data) {
                    if (data.status == true) {
                        $('#added_success').show();
                        $('#added_success').hide(10000);
                        $('.complaintRow' + data.id).remove();
                    }
                },
                error: function (reject) {
                    if (reject) {
                        $('#add_danger').show();
                    }

                }
            });
        });

        

    </script>


@endsection
