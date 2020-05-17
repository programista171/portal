@if(!Auth::user()->hasSentFriendRequestTo($user) && !Auth::user()->hasFriendRequestFrom($user) && !Auth::user()->isFriendWith($user))
	<form method="POST" action="{{url('/requests_decision')}}">
		@csrf
		<input type='hidden' name='inviter' value="{{Auth::user()->id}}">
		<input type='hidden' name='invited' value="{{$user->id}}">
		<button type='submit' name='add'>Dodaj do grona znajomych</button>
	</form>
@elseif(Auth::user()->hasFriendRequestFrom($user))
	<form method="POST" action="{{url('/requests_decision')}}">
		@csrf
		<input type='hidden' name='sender' value="{{$user->id}}">
		<button type="submit" name="accept" id="accept">Potwierdź prośbę</button>
		<button type="submit" name="deny" id="deny">Odrzuć prośbę</button>
	</form>
@elseif(Auth::user()->isFriendWith($user))
	<form method="POST" action="{{url('/requests_decision')}}">
		@csrf
		<input type='hidden' name='friend' value="{{$user->id}}">
		<button type="submit" name="unfriend" id="unfriend">Usuń z grona znajomych</button>
	</form>
@endif