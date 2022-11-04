@include('header')


<div class="content my-3 my-md-5">
            <div class="container">
                <div class="page-content">
    <div class="row">
        
        <div class="col-lg-12">
            <div class="card">
    <div class="card-header">
        <h3 class="card-title"><b>Upload Videos (*Only mp4 format is supported and maximum size should be 50MB.)</b></h3>
        
    </div>
    <div class="card-body">
        
        <form action="/provideouploadpost" method="post" enctype="multipart/form-data">
            
              @csrf
              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <strong>{{ $message }}</strong>
              </div>
            @endif
  
            @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
  
              {{ csrf_field() }}
        <div class="custom-file" style="margin-bottom: 20px;">
          <input type="file" class="form-control" name="file">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
              
          </form>
        
    </div>

    
</div>
        </div>
    </div>
</div>
            </div>
        </div>
@include('footer')

