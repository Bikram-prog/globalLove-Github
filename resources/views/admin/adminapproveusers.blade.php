@include('admin_header')

<div class="container">
      <div class="row">
          
          <div class="col-md-12">
            <h1>Users</h1>
                            
                
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Registraion Date & Time</th>
                    <th>Name</th> 
                    <th>E-Mail</th>
                    <th>Age</th> 
                    <th>Sex</th> 
                    <th>City</th>  
                    <th>State</th> 
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
                      <td>{{ $da->name }}</td> 
                      <td>{{ $da->email }}</td>
                      <td>{{ $da->age }}</td>  
                      <td>{{ $da->sex }}</td> 
                      <td>{{ $da->city }}</td> 
                      <td>{{$da->state }}</td> 
                      <td>{{$da->country }}</td>
                      <td><a href="/u/adminuserdtls/{{ $da->id }}" class="btn btn-primary">View Profile</a>
                        <a onclick="return confirm('Are you sure?')" href="/u/adminuserdelete/{{ $da->id }}" class="btn btn-danger">Delete</a></td>
                    </tr> 
                    @endforeach
                    

                       
                 </tbody>
                  <tfoot>
                  <tr>
                    <th>Registraion Date & Time</th>
                    <th>Name</th> 
                    <th>E-Mail</th>
                    <th>Age</th> 
                    <th>Sex</th>
                    <th>City</th>  
                    <th>State</th> 
                    <th>Country</th>
                    <th>Action</th>  
                  </tr>
                  </tfoot>
                </table>
              
          </div>
          
      </div>
  </div>


