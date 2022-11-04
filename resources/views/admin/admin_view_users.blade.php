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
                    <th>Profile Pic</th> 
                    <th>Name</th> 
                    <th>E-Mail</th>
                    <th>Sex</th> 
                    <!--th>City</th>  
                    <th>State</th--> 
                    <th>Country</th>
                    <th>Action</th>  
                    <th>Select all&nbsp;<input type="checkbox" id="all_chk">

                    </th>
                    <th>
                      <button type="submit" class="btn btn-primary">Go</button>
                    </th>
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
                      <th><img src="{{ $da->prfl_photo_path }}"></th> 
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
                      <td><a href="/u/adminuserdtls/{{ $da->id }}" class="btn btn-info">View Profile</a>
                      @if($da->pt_u_id != "")
                        <a  href="#" class="btn btn-success">Premium User</a>
                      @else
                      <a  href="/u/adminuserpremium/{{ $da->id }}" class="btn btn-success">Upgrade to premium</a>
                      @endIf  
                        <a onclick="return confirm('Are you sure?')" href="/u/adminuserdelete/{{ $da->id }}" class="btn btn-danger">Delete</a>
                      
                      </td>

                      <td>
                        <input type="checkbox" name="chk[]" value="{{ $da->email }}"></td>
                    </tr> 
                    @endforeach
                    

                       
                 </tbody>
                  <tfoot>
                  <tr>
                    <th>Registration Date & Time</th>
                    <th>Profile Pic</th> 
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

  <script>
$("#all_chk").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
  </script>