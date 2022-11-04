@include('admin_header')

<div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Other Photos</h1>
        </div>
         
        @foreach($data as $da) 
        @if($da->user_photo_path != '') 
          <div class="col-md-3">
          <div class="card">
          		<div style="padding: 10px;">
          		<img class="img-fluid" src="{{ $da->user_photo_path }}">	
          		<h4>{{ $da->name }}</h4>
          		<p>{{ $da->email }}</p>	
         		</div>
          
          <div class="card-footer">
            <div class="row">
              @if($da->approve_status != '1')
              <div class="col-md-6"><a class="btn btn-success btn-block" href="/u/approve/{{ $da->user_photo_id }}/{{ $da->user_id }}">Approve</a></div>
              <div class="col-md-6"><a class="btn btn-danger btn-block" href="/u/deny/{{ $da->user_photo_id }}/{{ $da->user_id }}">Deny</a></div>
              @else
              <div class="col-md-12">
                <p style="text-align: center;font-weight: 700;">Approved</p>
              </div>
              @endif
            </div>
          </div>
          </div>      
          
          </div>
          @endif
        @endforeach
          
      </div>
  </div>



@include('admin_footer')