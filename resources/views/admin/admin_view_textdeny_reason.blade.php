@include('admin_header')

<div class="container">
      <div class="row mt-4">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <h1>Deny Reason</h1>
            <form action="/u/textupdatedeny" method="POST">
              {{ @csrf_field() }}

              <div class="form-group">
                
                <textarea class="form-control" rows="4" name="denyreason" placeholder="Enter deny reason..."></textarea>
              </div>

              <input type="hidden" name="id" value="{{ $id }}">

              <button type="submit" class="btn btn-primary btn-block">Submit</button>
              
            </form>
              
          </div>
          <div class="col-md-4"></div>

          
      </div>
  </div>


  @include('admin_footer')