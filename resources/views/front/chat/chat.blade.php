<div class="container">
    <div class="chatbox">
        <div id="test" class="chatbox__support">
            <div class="chatbox__header">
                <div class="chatbox__image--header">
                    <img src="{{ asset('frontend/chat/images/image.png') }}" alt="image">
                </div>
                <div class="chatbox__content--header">
                    <h4 class="chatbox__heading--header">Chat support</h4>
                    <p class="chatbox__description--header">There are many variations of passages of Lorem Ipsum
                        available</p>
                </div>
            </div>
            <div class="chatbox__messages">
                <div class="mmd">

                    @if(!empty(OKMessage()))
                        @foreach(OKMessage() as $msg)

                            @if($msg['from_user_id']==Auth::id())
                                <div class="messages__item messages__item--operator">
                                    {{$msg['message']}}
                                </div>
                            @else
                                <div class="messages__item messages__item--visitor">
                                    {{$msg['message']}}
                                </div>
                            @endif
                        @endforeach
                    @endif
                    {{--                    <div class="messages__item messages__item--typing">--}}
                    {{--                        <span class="messages__dot"></span>--}}
                    {{--                        <span class="messages__dot"></span>--}}
                    {{--                        <span class="messages__dot"></span>--}}
                    {{--                    </div>--}}
                </div>
            </div>
            <div class="chatbox__footer">
                <img src="{{ asset('frontend/chat/images/icons/emojis.svg') }}" alt="">
                <img src="{{ asset('frontend/chat/images/icons/microphone.svg') }}" alt="">
                <input id="message" type="text" placeholder="Write a message...">
                <p class="chatbox__send--footer send-message">Send</p>
                <img src="{{ asset('frontend/chat/images/icons/attachment.svg') }}" alt="">
            </div>
        </div>
        <div class="chatbox__button">
            <button>button</button>
            <span class="count_massges"></span>
        </div>
    </div>
</div>


<script src="{{ asset('backend/bootstrap/js/jquery-3.6.0.min.js') }}"></script>
<script>

    var chatButto = document.getElementById('test');
    setInterval(function () {


            if ((chatButto).classList.contains('chatbox--active')) {


                console.log('ffffffffffffffff')
                var id = [];
                $.ajax({
                    type: 'post',
                    url: "{{route('new_messages_check')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                    },
                    success: function (data) {
                        $(document).on('click', '.chatbox__button', function (e) {

                        });
                        //  var d = $('.coten_not').empty();
                        $.each(data.data, function (key, value) {

                                $('.mmd').append('<div class="messages__item messages__item--visitor" >' + value.masg + '</div>')

                            }
                        );


                        if (data.count > 0) {
                            $('.count_new').text(data.count);
                        }
                    },
                    error: function (reject) {
                        if (reject) {
                        }
                    }
                });
            }

        }
        , 1000 * 60 * 0.009);


    // where X is your every X minutes
</script>


<script>

    $(document).on('click', '.send-message', function (e) {
        e.preventDefault();
        var SearchValue = $('#message').val();
        $('#message').val('');
        $('.mmd').append('<div class="messages__item messages__item--operator" >' + SearchValue + '</div>');


        $.ajax({
            type: 'post',
            url: "{{route('send.message')}}",
            data: {
                '_token': "{{csrf_token()}}",
                'message': SearchValue,

            },
            success: function (data) {
                if (data.status == true) {

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
