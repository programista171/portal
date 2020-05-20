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
                        <li class="contact" data-threadCode = "{{ \App\Helpers::getThreadCode(Auth::id(), $friend->id)  }}" data-friendName = "{{ $friend->firstname }} {{ $friend->lastname }} ({{ $friend->login }})">
                            <div class="wrap">
                                <span class="contact-status online"></span>
                                <img src="http://emilcarlsson.se/assets/louislitt.png" alt=""/>
                                <div class="meta">
                                    <p class="name"> {{ $friend->firstname }} {{ $friend->lastname }} ({{ $friend->login }})  </p>
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
                <p>Harvey Specter</p>
                <div class="social-media">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </div>
            </div>
            <div class="messages">
                <ul>
                    <li class="sent">
                        <img src="http://emilcarlsson.se/assets/mikeross.png" alt=""/>
                        <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I
                            do?!</p>
                    </li>
                    <li class="replies">
                        <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt=""/>
                        <p>When you're backed against the wall, break the god damn thing down.</p>
                    </li>
                    <li class="replies">
                        <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt=""/>
                        <p>Excuses don't win championships.</p>
                    </li>
                    <li class="sent">
                        <img src="http://emilcarlsson.se/assets/mikeross.png" alt=""/>
                        <p>Oh yeah, did Michael Jordan tell you that?</p>
                    </li>
                    <li class="replies">
                        <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt=""/>
                        <p>No, I told him that.</p>
                    </li>
                    <li class="replies">
                        <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt=""/>
                        <p>What are your choices when someone puts a gun to your head?</p>
                    </li>
                    <li class="sent">
                        <img src="http://emilcarlsson.se/assets/mikeross.png" alt=""/>
                        <p>What are you talking about? You do what they say or they shoot you.</p>
                    </li>
                    <li class="replies">
                        <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt=""/>
                        <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do
                            any one of a hundred and forty six other things.</p>
                    </li>
                </ul>
            </div>
            <div class="message-input">
                <div class="wrap">
                    <input type="text" placeholder="Write your message..."/>
                    <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                    <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script>
        $(".messages").animate({scrollTop: $(document).height()}, "fast");
        $(".expand-button").click(function () {
            $("#profile").toggleClass("expanded");
            $("#contacts").toggleClass("expanded");
        });

        function sendMessage() {
            $.ajax({
                url: "/messages/sendMessage",
                data: {
                    "threadCode": $(".contact-profile p").attr("data-threadCode"),
                }
            })
                .done( (response) => {
                    console.log(response);
                });
        }

        function newMessage() {
            message = $(".message-input input").val();
            if ($.trim(message) == '') {
                return false;
            }
            $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
            $('.message-input input').val(null);

            sendMessage();

            $('.contact.active .preview').html('<span>You: </span>' + message);
            $(".messages").animate({scrollTop: $(document).height()}, "fast");
        };

        $('.submit').click(function () {
            newMessage();
        });

        $(window).on('keydown', function (e) {
            if (e.which == 13) {
                newMessage();
                return false;
            }
        });

        // change messages content
        $(".contact").on("click", function () {
            console.log($(this).attr("data-friendName"));
            $(".contact-profile p").html($(this).attr("data-friendName"));
            $(".contact-profile p").data("threadCode", $(this).attr("data-threadCode"));
        });
    </script>
    <script src="{{ asset("/js/socket.io.js") }}"></script>
    <script src="{{ asset("/js/messages_index.js") }}"></script>
@endsection
