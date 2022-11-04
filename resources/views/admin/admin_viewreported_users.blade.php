@include('admin_header')

<div class="container">
      <div class="row">
          
          <div class="col-md-12">
            <h1>{{ $text }}</h1>
                            
                
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Name</th> 
                    <th>E-Mail</th>
                    <th>Comments</th>
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
                      <td>{{$da->r_comments }}</td>
                      <td><a href="/u/adminuserreporteddtls/{{ $da->id }}" class="btn btn-primary">View Profile</a></td>
                    </tr> 
                    @endforeach
                    

                       
                 </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th> 
                    <th>E-Mail</th>
                    <th>Comments</th>
                    <th>Action</th>  
                  </tr>
                  </tfoot>
                </table>
              
          </div>
          
      </div>
  </div>


  @include('admin_footer')