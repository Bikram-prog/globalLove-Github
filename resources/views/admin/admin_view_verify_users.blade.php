@include('admin_header')

<div class="container">
      <div class="row">
          
          <div class="col-md-12">
            <h1>{{ $text }}</h1>
                            
                <form action="/u/adminbroadcast" method="POST">
                  {{ csrf_field() }}

                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Registration Date & Time</th>
                    <th>Verification Id</th> 
                    <th>Name</th> 
                    <th>E-Mail</th>
                    <th>Sex</th> 
                    <!--th>City</th>  
                    <th>State</th--> 
                    <th>Country</th>
                    <th>Action</th>  
                   
                   
                  </tr>
                  </thead>
                 <tbody>
                    @foreach($data as $da)
                    <?php 
                    $date = date('M j, Y', strtotime($da->created_at));
                    $time = date('g:i a', strtotime($da->created_at)); 
                    ?>
                    <tr>
                      <td>{{ $date }}, {{ $time }}</td> 
                      <th><a href="{{ $da->verify_photo_path }}" target="_blank;"><img style="width:100px;" src="{{ $da->verify_photo_path }}"></a></th> 
                      <td>{{ $da->name }}</td> 
                      <td>
                        @if($da->email_verified_at != "")
                        <i class="fas fa-check-circle" style="color:green"></i>{{ $da->email }}
                        @else
                        <i class="fas fa-check-circle"></i>{{ $da->email }}
                        @endIf  
                    </td>
                      <td>{{ $da->sex }}</td> 
                      <!--td>{{ $da->city }}</td> 
                      <td>{{$da->state }}</td--> 
                      <td>{{$da->country }}</td>
                      <td><a href="/u/adminverifyapprove/{{ $da->id }}/{{ $da->email }}" class="btn btn-info">Approve</a>
                     
                        <a onclick="return confirm('Are you sure?')" href="/u/adminverifydeny/{{ $da->id }}/{{ $da->email }}" class="btn btn-danger">Deny</a>
                      
                      </td>

                      
                    </tr> 
                    @endforeach
                    

                       
                 </tbody>
                  <tfoot>
                  <tr>
                    <th>Registration Date & Time</th>
                    <th>Verification Id</th> 
                    <th>Name</th> 
                    <th>E-Mail</th>
                    <th>Sex</th>
                    <!--th>City</th>  
                    <th>State</th--> 
                    <th>Country</th>
                    <th>Action</th>  
                  </tr>
                  </tfoot>
                </table>

                </form>
              
          </div>
          
      </div>
  </div>


  @include('admin_footer')

  