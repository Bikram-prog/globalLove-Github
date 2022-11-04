@include('header')

<style type="text/css">
  p.form-label {
    font-size: 17px;
    padding: 15px 0px 5px 0px;
    font-weight: 600;
    margin-bottom: 0 !important;
}
</style>

<div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
         <h1 class="text-center">Suggestion Box</h1>
         <p style="font-size: 25px;text-align:center;">We would love to hear from you</p>
        
        
        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        

          <form action="/suggestionupdatepost" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            
            <p class="form-label">Select an option</p> 
            <select class="form-control" name="web_name" required>
                <option value="GlobalLove">GlobalLove</option>
                <option value="To Do Smarter">To Do Smarter</option>
                <option value="Group Chat">Group Chat</option>
                <option value="The Daily Planet">The Daily Planet</option>
            </select>
            
            

            
              <p class="form-label">Please leave your comment below on how we can give you a better experience</p>
              <textarea class="form-control" rows="6" name="comment" placeholder="Write the comment..."></textarea>

              <span class="form-label" style="margin-top: 15px;margin-bottom: 15px; color: #c0392b;font-size: 17px;">This is Completely anonymous, but after it's approved, we will post your comments and suggestions on <a href="https://thedailyplanet.app/">thedailyplanet.app </a>, How does that sound?</span>
            
            <button type="submit" class="btn btn-success btn-block mb-4">Submit</button>
          </form>
        </div>
        <div class="col-md-3"></div>
      </div>

      
  </div>

  @include('footer')

  <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

  {{-- <script>
    CKEDITOR.replace( 'news_desc' );
  </script> --}}




