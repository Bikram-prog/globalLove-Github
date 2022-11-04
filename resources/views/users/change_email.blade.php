@include('header')

<div class="container-fluid">
	<div class="row" style="margin-top: 40px;">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h4>Email Address</h4>
			<p>Please update your email if it has changed so you do not miss any communications or match alerts.</p>
			<form action="/changeemailaction" method="POST">
				{{ csrf_field() }}

				@if (Session::has('msg'))
        			<div class="alert alert-success">{{Session::get('msg')}}</div>
  				@endif

			<div class="form-group">
				<label>Change Email Address</label>
				<input type="email" class="form-control" name="email" value="{{ $data[0]->email }}">
			</div>

			<button style=" 
			margin: 0 auto;
			display: flex;
			justify-content: center;
			align-items: center;
			align-content: center;
			width: 120px;
			font-size: 18px;
			letter-spacing: 2.0px;
			" onclick="search()" type="submit" class="btn btn-primary mb-4">SAVE</button>

			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>

@include('footer')