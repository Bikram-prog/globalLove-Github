@include('admin_header')

<div class="container">
      <div class="row">
          
          <div class="col-md-12">
            <h1>Testimonials <a href="/u/adminviewtestimonialAdd" class="btn btn-primary">Add New</a></h1>
                            
                
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Testimonial</th> 
                    <th>Name</th>
                    <th>Address</th> 
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
                      <td>{{ $da->testimonial }}</td> 
                      <td>{{ $da->name }}</td>
                      <td>{{ $da->address }}</td> 
       
                      <td><a href="/u/adminviewtestimoniaEdit/{{ $da->id }}" class="btn btn-primary">Edit</a>
                        <a onclick="return confirm('Are you sure?')" href="/u/adminviewtestimoniaDelete/{{ $da->id }}" class="btn btn-danger">Delete</a></td>
                    </tr> 
                    @endforeach
                    

                       
                 </tbody>
                  <tfoot>
                  <tr>
                  <th>Testimonial</th> 
                    <th>Name</th>
                    <th>Address</th> 
                    <th>Action</th>    
                  </tr>
                  </tfoot>
                </table>
              
          </div>
          
      </div>
  </div>

  @include('admin_footer')