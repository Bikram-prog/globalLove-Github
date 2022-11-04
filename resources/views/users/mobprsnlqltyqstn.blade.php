@include('header')

<div class="container">
	<div class="row" style="margin-top: 40px;">
	<div class="col-md-12">
		<h4>Edit Personality Profile</h4>
		<p>Let your personality shine. Express yourself in your own words to give other users a better understanding of who you are. Answer at least 7 questions below to complete this section.</p>
		<form action="/mobpersnlquestnactn" method="POST">
			{{ csrf_field() }}

			@if (Session::has('msg'))
        <div class="alert alert-success">{{Session::get('msg')}}</div>
  	@endif

			<div class="form-group">
				<label>What is your favorite movie?</label>
				<textarea class="form-control" name="movie"><?php echo (isset($data[0]->prsnl_movie) ? $data[0]->prsnl_movie : ''); ?></textarea>
			</div>
			<div class="form-group">
				<label>What is your favorite book?</label>
				<textarea class="form-control" name="book"><?php echo (isset($data[0]->prsnl_book) ? $data[0]->prsnl_book : ''); ?></textarea>
			</div>
			<div class="form-group">
				<label>What sort of food do you like?</label>
				<textarea class="form-control" name="food"><?php echo (isset($data[0]->prsnl_food) ? $data[0]->prsnl_food : ''); ?></textarea>
			</div>
			<div class="form-group">
				<label>What sort of music do you like?</label>
				<textarea class="form-control" name="music"><?php echo (isset($data[0]->prsnl_music) ? $data[0]->prsnl_music : ''); ?></textarea>
			</div>
			<div class="form-group">
				<label>What are your hobbies and interests?</label>
				<textarea class="form-control" name="hobbies"><?php echo (isset($data[0]->prsnl_hobbies) ? $data[0]->prsnl_hobbies : ''); ?></textarea>
			</div>
			<div class="form-group">
				<label>How would you describe your dress sense and physical appearance?</label>
				<textarea class="form-control" name="dressing"><?php echo (isset($data[0]->prsnl_dress) ? $data[0]->prsnl_dress : ''); ?></textarea>
			</div>
			<div class="form-group">
				<label>How would you describe your sense of humor?</label>
				<textarea class="form-control" name="humor"><?php echo (isset($data[0]->prsnl_humor) ? $data[0]->prsnl_humor : ''); ?></textarea>
			</div>
			<div class="form-group">
				<label>How would you describe your personality?</label>
				<textarea class="form-control" name="personality"><?php echo (isset($data[0]->prsnl_personality) ? $data[0]->prsnl_personality : ''); ?></textarea>
			</div>
			<div class="form-group">
				<label>Where have you traveled or would like to travel to?</label>
				<textarea class="form-control" name="travel"><?php echo (isset($data[0]->prsnl_like_travel) ? $data[0]->prsnl_like_travel : ''); ?></textarea>
			</div>
			<div class="form-group">
				<label>How adaptive are you to having a partner from a different culture to your own?</label>
				<textarea class="form-control" name="culture"><?php echo (isset($data[0]->prsnl_diff_cul_prtnr) ? $data[0]->prsnl_diff_cul_prtnr : ''); ?></textarea>
			</div>
			<div class="form-group">
				<label>How would you spend a perfect romantic weekend?</label>
				<textarea class="form-control" name="weekend"><?php echo (isset($data[0]->persnl_rmntic_weeknd) ? $data[0]->persnl_rmntic_weeknd : ''); ?></textarea>
			</div>
			<div class="form-group">
				<label>What sort of person would be your perfect match?</label>
				<textarea class="form-control" name="match"><?php echo (isset($data[0]->persnl_prfct_match) ? $data[0]->persnl_prfct_match : ''); ?></textarea>
			</div>

			<input type="hidden" name="id" value="<?php echo $id; ?>">

			<button type="submit" class="btn btn-primary btn-block">Submit</button>

		</form>
		</div>	
	</div>
</div>
@include('footer')