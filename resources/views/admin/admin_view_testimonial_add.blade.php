@include('admin_header')

<div class="container">
      <div class="row">
      <h1>Testimonials</h1>
          <div class="col-md-12">
          
                            
                
            <form id="testimonial-form" action="u/adminviewtestimonialPost" method="post" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="_csrf" value="jqu4RDkdq39t2mveZiq2ksR7plW1iDU2-QUvWtiphk_5z8ALC1X_SyWrH4wVb4LqsRXAHcPBZUCNa0NplZ3DPw==">
                                        {{ csrf_field() }}
                    <label for="inputEmail4">Testimonial</label>
                    <textarea type="testimonial" class="form-control" name="testimonial" placeholder="Email"></textarea>
             
      
                    <label for="inputEmail4">Name</label>
                    <input type="name" class="form-control" name="name" placeholder="Email">
              
                    <label for="inputEmail4">Address</label>
                    <input type="address" class="form-control" name="address" placeholder="Email">
                  
                  
                    <label for="inputEmail4">Image</label>
                    <input type="file" name="image" class="form-control">
              
                
 
                <button type="submit" class="btn btn-primary">Add</button>
              </form>
              
          </div>
          
      </div>
  </div>



@include('admin_footer')