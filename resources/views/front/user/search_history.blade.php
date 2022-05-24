@extends('front.layouts.front_layouts')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/searchHistory.css') }}">
@endsection

@section('front_content')

    <!-- Start Search History Laptop -->
    <div class="search-history-page">

        <div class="background">
            <img src="{{asset('frontend/images/search background lap.png')}}" alt="">
        </div>

        <div class="edit-search-history">

            <div class="title">Search History</div>
            <div class="edit-buttons">
                <div class="del-search-history" history_id="{{$user->id}}">
                    <button >Delete All Search History</button>
                </div>
            </div>

        </div>

        <div class="container-search-history">

            <table>
                @foreach($history as $h)
                <tr class="recordRow{{$h->id}}">
                    <td>{{ $h -> created_at }}</td>
                    <td class="search-content">{{ $h -> value }}</td>
                    <td><i class="delete_record bx bx-trash" record_id="{{$h->id}}" onmouseover="" style="cursor: pointer;"></i></td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
    <!-- End Search History Laptop -->



    <!-- Start Search History Mobile -->
    <div class="search-history-page-mobile">

        <div class="background">
            <img src="{{asset('frontend/images/search background mobile.png')}}" alt="">
        </div>

        <div class="container-search-history-mobile">

            <div class="top-search">
                <div>
                    <div class="title">Search History</div>
                    <div class="edit-buttons">
                        <div class="del-search-history">
                            <button>Delete All Search History</button>
                        </div>
                        
                    </div>
                </div>

            </div>

            <div class="table-search">
                <div>
                    <table>

                        <tr>
                            <td>13:14:35</td>
                            <td class="search-content">Search content</td>
                            <td><i class='bx bx-trash'></i></td>
                        </tr>

                    </table>
                </div>

            </div>

        </div>

    </div>
    <!-- End Search History Mobile -->
@endsection


@section("script")
    <script>

        $(document).on('click', '.delete_record', function (e) {
            e.preventDefault();

            var id_record = $(this).attr('record_id');

            $.ajax({
                type: 'get',
                url: "{{route('delete.record')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id_record,

                },
                success: function (data) {
                    if (data.status == true) {
                        $('.recordRow' + data.id).remove();
                    }
                    ;
                },
                error: function (reject) {
                    if (reject) {
                        $('#add_danger').show();
                    }

                }

            });
        });

        
        $(document).on('click', '.del-search-history', function (e) {
            e.preventDefault();

            var id_history = $(this).attr('history_id');

            $.ajax({
                type: 'get',
                url: "{{route('delete.all.record')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id_history,

                },
                success: function (data) {
                    if (data.status == true) {
                        $('.container-search-history').remove();
                    }
                    ;
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