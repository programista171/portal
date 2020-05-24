@extends("layouts.app")
@section("content")
    <div id="frame">
        <div id="sidepanel">
            <div id="profile">
                <div class="wrap">
                    <img id="profile-img" src="http://emilcarlsson.se/assets/mikeross.png" class="online" alt=""/>
                    <p> {{ Auth::user()->firstname }} {{  Auth::user()->lastname }} ({{  Auth::user()->login }}) </p>
                    <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
                    <div id="expanded">
                        <label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
                        <input name="twitter" type="text" value="mikeross"/>
                        <label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
                        <input name="twitter" type="text" value="ross81"/>
                        <label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
                        <input name="twitter" type="text" value="mike.ross"/>
                    </div>
                </div>
            </div>
            <div id="search">
                <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                <input type="text" placeholder="Search contacts..."/>
            </div>
            <div id="contacts">
                <ul>
                    @foreach($friends as $friend)
                        <li class="contact" data-users_id = "{{ \App\Helpers::getThreadCode(Auth::id(), $friend->id)  }}" data-friendName = "{{ $friend->firstname }} {{ $friend->lastname }} ({{ $friend->login }})">
                            <div class="wrap">
                                <span class="contact-status online"></span>
                                <img src="http://emilcarlsson.se/assets/louislitt.png" alt=""/>
                                <div class="meta">
                                    <p class="name"> {{ $friend->firstname }} {{ $friend->lastname }} ({{ $friend->login }}) </p>
                                    <p class="preview">You just got LITT up, Mike.</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
               </ul>
            </div>
        </div>
        <div class="content">
            <div class="contact-profile">
                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt=""/>
                <p> <a href = "{{ url("/users", [$conversationWith->id]) }}">{{ $conversationWith->firstname }} {{ $conversationWith->lastname }} </a> </p>
                <div class="social-media">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </div>
            </div>
            <div class="messages">
                <ul>
                    @foreach($messages as $message)
                        @if( $message->sender_id !== \Illuminate\Support\Facades\Auth::user()->id )
                            <li class="sent">
                                <img src="http://emilcarlsson.se/assets/mikeross.png" alt=""/>
                                <p>
                                    {{ $message->content }}
                                </p>
                            </li>
                        @else
                            <li class="replies">
                                <img src="http://emilcarlsson.se/assets/mikeross.png" alt=""/>
                                <p>
                                    {{ $message->content }}
                                </p>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="message-input">
                <div class="wrap">
                    <form action="{{ route("messages.send") }}" method="post">
                        @csrf
                        <input type="text" placeholder="Napisz swoją wiadomość..." name = "message"/>
                        <input type="hidden" name="friendId" value="{{ $conversationWith->id }}" />
                        <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                        <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script>
        $(".messages").animate({scrollTop: $(document).height()}, "fast");
        // $(".expand-button").click(function () {
        //     $("#profile").toggleClass("expanded");
        //     $("#contacts").toggleClass("expanded");
        // });
        //
        // function sendMessage() {
        //     $.ajax({
        //         url: "/messages/sendMessage",
        //         type: "post",
        //         data: {
        //             "threadCode": $(".contact-profile p").attr("data-threadCode"),
        //         }
        //     })
        //         .done( (response) => {
        //             console.log(response);
        //         });
        // }
        //
        // function newMessage() {
        //     message = $(".message-input input").val();
        //     if ($.trim(message) == '') {
        //         return false;
        //     }
        //     $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
        //     $('.message-input input').val(null);
        //
        //     sendMessage();
        //
        //     $('.contact.active .preview').html('<span>You: </span>' + message);
        //     $(".messages").animate({scrollTop: $(document).height()}, "fast");
        // };
        //
        // $('.submit').click(function () {
        //     newMessage();
        // });
        //
        // // $(window).on('keydown', function (e) {
        // //     if (e.which == 13) {
        // //         newMessage();
        // //         return false;
        // //     }
        // // });
    </script>
@endsection
