@include('header')
<style type="text/css">
  :focus{
  outline:none;
}
input[type=checkbox]{
  -webkit-appearance:button;
  -moz-appearance:button;
  appearance:button;
  border:4px solid #ccc;
  border-top-color:#bbb;
  border-left-color:#bbb;
  background:#fff;
  width:20px;
  height:20px;
  border-radius:50%;
}
input[type=checkbox]:selected{
  border:20px solid #4099ff;
  color: red !important;
  background-color: green !important;
}

.form-group {
	font-size: 20px !important;
}
hr {
    border: 2px solid #888 !important;
    margin-top: 0;
    margin-bottom: 10px;
  }
</style>

<div class="container">
	<div class="row" style="margin-top: 40px;">
	<div class="col-md-12">
		<h4>Edit Personality Profile</h4>
		<p>Let your personality shine. Express yourself in your own words to give other users a better understanding of who you are. Answer at least 7 questions below to complete this section.</p>
		<form action="/persnlquestnactn" method="POST">
			{{ csrf_field() }}

			@if (Session::has('msg'))
        <div class="alert alert-success">{{Session::get('msg')}}</div>
  	@endif

			<div class="form-group">
				<p>What is your favorite movie?</p>
				<textarea class="form-control" name="movie"><?php echo (isset($data[0]->prsnl_movie) ? $data[0]->prsnl_movie : ''); ?></textarea>
			</div>
			<hr>
			<div class="form-group">
				<p>What is your favorite book?</p>
				<textarea class="form-control" name="book"><?php echo (isset($data[0]->prsnl_book) ? $data[0]->prsnl_book : ''); ?></textarea>
			</div>
			<hr>
			<div class="form-group">
				<p>What sort of food do you like?</p>
				<textarea class="form-control" name="food"><?php echo (isset($data[0]->prsnl_food) ? $data[0]->prsnl_food : ''); ?></textarea>
			</div>
			<hr>
			<div class="form-group">
				<p>What sort of music do you like?</p>
				<textarea class="form-control" name="music"><?php echo (isset($data[0]->prsnl_music) ? $data[0]->prsnl_music : ''); ?></textarea>
			</div>
			<hr>
			<div class="form-group">
				<p>What are your hobbies and interests?</p>
				<textarea class="form-control" name="hobbies"><?php echo (isset($data[0]->prsnl_hobbies) ? $data[0]->prsnl_hobbies : ''); ?></textarea>
			</div>
			<hr>
			<div class="form-group">
				<p>How would you describe your dress sense and physical appearance?</p>
				<textarea class="form-control" name="dressing"><?php echo (isset($data[0]->prsnl_dress) ? $data[0]->prsnl_dress : ''); ?></textarea>
			</div>
			<hr>
			<div class="form-group">
				<p>How would you describe your sense of humor?</p>
				<textarea class="form-control" name="humor"><?php echo (isset($data[0]->prsnl_humor) ? $data[0]->prsnl_humor : ''); ?></textarea>
			</div>
			<div class="form-group">
				<p>How would you describe your personality?</p>
				<textarea class="form-control" name="personality"><?php echo (isset($data[0]->prsnl_personality) ? $data[0]->prsnl_personality : ''); ?></textarea>
			</div>
			<hr>
			<div class="form-group">
				<p>Where have you traveled or would like to travel to?</p>
				<textarea class="form-control" name="travel"><?php echo (isset($data[0]->prsnl_like_travel) ? $data[0]->prsnl_like_travel : ''); ?></textarea>
			</div>
			<hr>
			<div class="form-group">
				<p>How adaptive are you to having a partner from a different culture to your own?</p>
				<textarea class="form-control" name="culture"><?php echo (isset($data[0]->prsnl_diff_cul_prtnr) ? $data[0]->prsnl_diff_cul_prtnr : ''); ?></textarea>
			</div>
			<hr>
			<div class="form-group">
				<p>How would you spend a perfect romantic weekend?</p>
				<textarea class="form-control" name="weekend"><?php echo (isset($data[0]->persnl_rmntic_weeknd) ? $data[0]->persnl_rmntic_weeknd : ''); ?></textarea>
			</div>
			<hr>
			<div class="form-group">
				<p>What sort of person would be your perfect match?</p>
				<textarea class="form-control" name="match"><?php echo (isset($data[0]->persnl_prfct_match) ? $data[0]->persnl_prfct_match : ''); ?></textarea>
			</div>
			<hr>

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
	</div>
</div>
@include('footer')