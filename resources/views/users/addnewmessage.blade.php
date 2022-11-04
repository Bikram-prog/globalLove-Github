@include('header')

<style type="text/css">
	.box {
		background: #fff;
	    padding: 10px;
	    border-radius: 10px;
	    box-sizing: border-box;
	    border: 1px solid #eee;
	}

	.to {
	    font-size: 22px;
		font-weight: 600;
	}
</style>

<div class="container-fluid">
	<div class="row" style="margin-top: 100px;">
		<div class="col-md-4"></div>
		<div class="col-md-4 box">
			<form action="/addnewmessageaction" method="POST">
				{{ csrf_field() }}
				<div>
					@if (Session::has('msg'))
                        <div class="alert alert-success">{{Session::get('msg')}}</div>
                    @endif
				</div>
				<div class="form-group">
					<label class="to">To: {{ $message[0]->name }}</label>
					<textarea name="msg" class="form-control" placeholder="Write your first message..." rows="3"></textarea>
				</div>
				<input type="hidden" name="djsgdsg" value="{{ $to }}">
				@if(count($member) > 0 && isset($_COOKIE['_gooDal']))
				<button type="submit" class="btn btn-primary">Send</button>
				@elseif(count($member) == 0 && isset($_COOKIE['_gooDal']))
				<button style="font-weight: 700;" type="submit" class="btn btn-primary btn-lg btn-block">SEND</button>
				@else
				<p><a href="/membership">💎 Upgrade Your Membership To Send Message To Anyone.</a></p>
				@endif
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

@include('footer')