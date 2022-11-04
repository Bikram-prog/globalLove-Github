@include('admin_header')

<div class="container">
      <div class="row">
          
          <div class="col-md-12">
            <h1>For approval agents</h1>
                            
                
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Name</th> 
                    <th>E-Mail</th>
                    <th>Street</th> 
                    <th>City</th>  
                    <th>State/Region</th> 
                    <th>Zipcode</th>
                    <th>Country</th>
                    <th>Payment Type</th>
                    <th>Account</th>
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
                      <td>{{ $da->name }}</td> 
                      <td>{{ $da->email }}</td>
                      <td>{{ $da->street }}</td> 
                      <td>{{ $da->city }}</td> 
                      <td>{{$da->state }}</td> 
                      <td>{{$da->zipcode }}</td>
                      <td>{{$da->country }}</td>
                      <td>{{$da->payment_type }}</td>
                      <td>{{$da->account }}</td>
                      <td><a href="/u/adminviewapproveagent/{{ $da->id }}" class="btn btn-primary">Approve</a>
                        <a onclick="return confirm('Are you sure?')" href="/u/adminviewdenyagent/{{ $da->id }}" class="btn btn-danger">Deny</a></td>
                    </tr> 
                    @endforeach
                    

                       
                 </tbody>
                  <tfoot>
                  <tr>
                  <th>Name</th> 
                    <th>E-Mail</th>
                    <th>Street</th> 
                    <th>City</th>  
                    <th>State/Region</th> 
                    <th>Zipcode</th>
                    <th>Country</th>
                    <th>Payment Type</th>
                    <th>Account</th>
                    <th>Action</th>   
                  </tr>
                  </tfoot>
                </table>
              
          </div>
          
      </div>
  </div>


  @include('admin_footer')