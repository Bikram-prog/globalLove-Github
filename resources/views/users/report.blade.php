@include('header')

<div class="container-fluid">
	<div class="row" style="margin-top: 40px;">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h4>Report User</h4>
			<p>We are sorry to hear you have had a bad experience online..... but rest assured we will do our best to rectify the situation, in you own words, please explain the problem you has occurred.</p>
			<form action="/reportuser" method="POST">
				{{ csrf_field() }}

				@if (isset($msg))
        			<div class="alert alert-success">{{ $msg }}</div>
  				@endif


				<input type="hidden" name="r_who_id" value="{{ $id }}"> 
			<div class="form-group">
				<textarea name="reportcomment" style="width:100%;height:200px" required></textarea>	
			</div>

			<button type="submit" class="btn btn-primary" name="submit">SEND</button>

			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>

@include('footer')