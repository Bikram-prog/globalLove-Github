@include('admin_header')

<div class="container">
      <div class="row">
          
          <div class="col-md-12">
            <h1>Profile Update</h1>
                            
                
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Name</th> 
                    <th>E-Mail</th>
                    <th>Section</th> 
                    <th>To</th>  
                    <th>Action</th>  
                  </tr>
                  </thead>
                 <tbody>
                    @foreach($data as $da)
                    <tr>
                      <td>{{ $da->name }}</td> 
                      <td>{{ $da->email }}</td>

      
          
                      @if($da->metas_field_name == "heading")     
                        <td>Profile heading</td>
                      @endif  

                      @if($da->metas_field_name == "about")   
                        <td>About yourself</td>
                       @endif  

                      @if($da->metas_field_name == "prtnr_typ_desc")  
                        <td>Looking in a partner</td>
                      @endif  

                      <td>{{ $da->metas_new_value }}</td>
                      <td><a href="/u/textupdateapprove/{{ $da->meta_id }}" class="btn btn-primary">Approve</a>
                        <a onclick="return confirm('Are you sure?')" href="/u/textupdatedenyreason/{{ $da->meta_id }}" class="btn btn-danger">Deny</a>
                        <a href="/u/adminuserdtls/{{ $da->user_id }}" class="btn btn-danger">View Profile</a></td>
                    </tr> 
                    @endforeach
                    

                       
                 </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th> 
                    <th>E-Mail</th>
                    <th>Section</th> 
                    <th>To</th>  
                    <th>Action</th>  
                  </tr>
                  </tfoot>
                </table>
              
          </div>
          
      </div>
  </div>


  @include('admin_footer')