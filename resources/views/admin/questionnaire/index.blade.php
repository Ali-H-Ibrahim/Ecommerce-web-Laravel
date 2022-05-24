@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="sl-page-title">
                <h5>Questionnaires List</h5>
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

                    @if(isset($questionnaires)&&$questionnaires->count()>0)
                        @foreach($questionnaires as $index=> $questionnaire)
                            <tr class="questionnaireRow{{$questionnaire->id}}">
                                <td>{{$index + 1}}</td>
                                <td>{{$questionnaire -> name}}</td>
                                <td>
                                    <a class="delete_questionnaire btn btn-sm btn-danger" questionnaire_id="{{$questionnaire->id}}">Delete</a>
                                    <a href="{{route('show.questionnaire',$questionnaire->id)}}" class="btn btn-sm">Show</a>
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

        $(document).on('click', '.delete_questionnaire', function (e) {
            e.preventDefault();

            var id = $(this).attr('questionnaire_id');

            $.ajax({
                type: 'post',
                url: "{{route('delete.questionnaire')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    id : id,
                },
                success: function (data) {
                    if (data.status == true) {
                        $('#added_success').show();
                        $('#added_success').hide(10000);
                        $('.questionnaireRow' + data.id).remove();
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
