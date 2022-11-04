@include('admin_header')

<div class="container">
      <div class="row">
      <h1>Testimonials</h1>
          <div class="col-md-12">
          
                            
                
          <form id="testimonial-form" action="u/viewAdminTestimonialEditAction" method="post" autocomplete="off" enctype="multipart/form-data">
          <input type="hidden" name="_csrf" value="jqu4RDkdq39t2mveZiq2ksR7plW1iDU2-QUvWtiphk_5z8ALC1X_SyWrH4wVb4LqsRXAHcPBZUCNa0NplZ3DPw==">
          <input type="hidden" name="id" value="{{$data[0]->id}}">
                                        {{ csrf_field() }}
          <label for="inputEmail4">Testimonial</label>
                    <textarea type="testimonial" class="form-control"  name="testimonial"  >{{$data[0]->testimonial}}</textarea>
             
      
                    <label for="inputEmail4">Name</label>
                    <input type="name" class="form-control" name="name" value="{{$data[0]->name}}">
              
                    <label for="inputEmail4">Address</label>
                    <input type="text" class="form-control" name="address" value="{{$data[0]->address}}">
                  
                    <label for="inputEmail4">Image</label>
                    <img src="{{$data[0]->picture}}">
                    <input type="file" name="image" class="form-control">


          <button type="submit" class="btn btn-primary">Edit</button>
      </form>
              
          </div>
          
      </div>
  </div>


  @include('admin_footer')