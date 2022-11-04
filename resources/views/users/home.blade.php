@include('common/header') 

<style>

  
  .home-hero {
    background-image: url('./images/GLnewbackdrop.webp');
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    /* height: 100vh; */
  }

  

  .hero__text_md {
    font-size: 2rem;
    font-weight: 700;
  }

  .hero__text_lg {
    font-size: 4rem;
  }

  .hero__text_rg {
    font-size: 1.4rem;
    font-weight: 600;
  }

  .logo img {
    width: 160px;
  }

  .white-box {
    padding: 12px;
    min-height: 120px;
    border-radius: 10px;
    background-color: #fff;
    width: 100%;
  }

   /*-- testimonial Section CSS --*/
#testimonial {
    margin-top: 30px;
    padding: 20px 0px 20px;
    color: #fff;
    background-color: #283270;
    /* margin-bottom: -30px; */
}

#testimonial h2 {
    font-style: italic;
    color: #fff;
    font-size: 20px;
    text-align: center;
}
#testimonial .client-img {
    width: 80px;
    height: 80px;
    overflow: hidden;
    border: 3px solid #fff;
    margin: 0px auto;
    border-radius: 100%;
    position: absolute;
    left: 0px;
}
#testimonial .carousel-content {
    padding: 20px 0px 20px 100px;
    width: 70%;
    margin: 0 auto;
    position: relative;
}
#testimonial h3 {
    font-size: 17px;
    color: #fff;
    margin-bottom: 30px;
    font-style: italic;
    text-align: right;
}

.carousel-item p {
  font-size: 15px !important;
  font-weight: bold;
  
}
#testimonial p {
    font-size: 15px;
}
#testimonial .client-img img {
    width: 100%;
}
#testimonial .carousel-control-prev,
#testimonial .carousel-control-next {
    font-size: 36px;
}
  
  @media only screen and (max-width: 768px) {
    .home-hero {
    height: auto;
    margin-top: -29px;
  }

  .hero__text_md {
    font-size: 2rem;
    font-weight: 700;
  }

  .hero__text_lg {
    font-size: 3rem;
  }

  .hero__text_rg {
    font-size: 1rem;
    font-weight: 600;
  }
  }
</style>

<div class="container-fluid home-hero">
  <div class="container">
    <div class="row">
      <div class="col-md-8">

        <div class="flex">

          <div class="logo">
            <a href="/signup" 
              >
              <!-- //GlobalLoveLogo2.png -->
              <img
                src="./images/GlobalLoveLogo2.webp"
                class="img-fluid" style="width: 250px;height: 220px;"  alt="Global Love"
            /></a>
            
          </div>

          <p class="hero__text_md">WELCOME TO</p>
          <h2 class="hero__text_lg">
          <span style="color:#777!important">Global</span><span style="color:#dc3545!important">Love</span>
          </h2>
  
          <p class="hero__text_rg" style="color:#dc3545!important">
            The world's first and only true
            Multi Everything<br class="break-lg" />
            dating website.
          </p>

          {{-- <div class="row" style="margin-top: 50px;">
            
            <div class="col-md-12">
              <img
                src="./images/datefreelogonew.webp"
                class="img-fluid" style="    width: 300px;
                height: 230px;
                margin-top: -50px;
                overflow: hidden;"  alt="Date Free love"
            />
            </div>
          </div> --}}

          
        </div>
        

      </div>
      <div class="col-md-4 h-100" style="margin-top: 40px;">
        <div class="flex h-100">
          <div class="white-box">
            <form id="registration-form" action="/signupaction" method="post" autocomplete="off">
              <input type="hidden" name="_csrf" value="jqu4RDkdq39t2mveZiq2ksR7plW1iDU2-QUvWtiphk_5z8ALC1X_SyWrH4wVb4LqsRXAHcPBZUCNa0NplZ3DPw==">
                  {{ csrf_field() }}
                  @if (Session::has('msg'))
                      <div class="alert alert-danger">{{Session::get('msg')}}</div>
                  @endif
         
                  @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">  {{ $error }}</div>
                  @endforeach

<h1 class="fs-4 mt-2 text-center text-danger">Global Love</h1> 


<a href="{{ $glogin }}" class="btn btn-light w-100 mt-3 login-btn" style="background: #fff;
border: 1px solid #888;
height: auto;
padding: 10px;
border-radius: 50px;"><img style="width: 20px;
height: 20px;
margin-right: 15px;" src="https://globallove.online/images/google.webp" alt="Google Login">Continue With Google</a>

<a href="{{ $fb }}" class="btn btn-light w-100 mt-3 login-btn" style="background: #fff;
border: 1px solid #888;
height: auto;
padding: 10px;
border-radius: 50px;"><img style="width: 20px;
height: 20px;
margin-right: 12px;" src="https://globallove.online/images/facebook.webp" alt="Facebook Login">
Continue With Facebook</a>

<hr>
          
          <p class="form-label mt-4">Full Name</p> 
              <input type="text" name="name" class="form-control" required>
              <p class="form-label">E-mail</p> 
              <input type="email" name="email" class="form-control" required>
              <!-- <p style="font-size:12px"><i class="fas fa-bell" style="color:#716f6f;"></i> We will send you a confirmation email. Please make sure your email is correct, or signing up will fail.</p>  -->
              
            
          
              
              
             
                  <p class="form-label">Password</p>  
              <input type="password" name="psw" class="form-control" required>
              <p class="form-label">Re-type Password</p>
              <input type="password" name="repsw" class="form-control" required>
             
              
              
              <p class="text-center mt-3" style="font-size:14px">
              <input class="form-check-input" type="checkbox" value="" name="terms" checked required> By signing up, I affirm that I am 18 years old, that i will be nice, and I have read  and agree to the<a onclick="search()" class="login-signup" href="/terms"> Terms & Conditions</a></p>

              <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
              <input type="hidden" name="action" value="validate_captcha">

<button class="btn btn-danger w-100 mt-3 login-btn">SIGN UP FREE!</button>


</form>
<p class="mt-3 text-center">Have an account? <a href="{{ url('login') }}" class="login-signup">Login<a></p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- Testimonials Section -->
<section id="testimonial">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="section-title">
                  <h2>Testimonial</h2>
              </div>
          </div>
          <div class="col-12">
            @php 
              $tstmnl = DB::table('testimonials')->where('status', '=', '1')->get();
            @endphp
              <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                
                
                  <div class="carousel-inner">
                    @php 
                    $i = 1;
                    @endphp
                    @foreach($tstmnl as $tst)
                    <div class="carousel-item <?php echo ($i == 1 ? 'active' : ''); ?>">
                        <div class="carousel-content">
                            <p style="font-weight: 500;"><span>{{ $tst->category }}</span> <small></small></p>
                            <p><i>{{ $tst->remarks }}</i></p>
                            
                            
                        </div>
                    </div>
                    @php 
                    $i++;
                    @endphp
                    @endforeach
                                                                          
                                                                          
                                                                          
                                                                          
            
                      
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- End testimonials Section -->

<!-- Testimonials Section -->
<div style="height: 20px;">&nbsp;</div>
<section id="testimonial" class="mt-2">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h2>Customer Reviews For Buyandsell</h2>
            </div>
        </div>
        <div class="col-12">
          @php 
            $webreview = DB::connection('mysql2')->table('website_review')
                        ->where('review_status', '=', '1')
                        ->get();
          @endphp
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
              
              
                <div class="carousel-inner">
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($webreview as $web)
                  <div class="carousel-item <?php echo ($i == 1 ? 'active' : ''); ?>">
                      <div class="carousel-content">
                          {{-- <div class="client-img"><img src="images/user-img-2.jpg" alt="Testimonial Slider" /></div> --}}
                          <p style="font-weight: 500;"><span class="badge bg-success">{{ $web->review_ratings }} ⭐</span> <small></small></p>
                          <p><i>{{ $web->review_comments }}</i></p>
                          
                      </div>
                  </div>
                  @php 
                  $i++;
                  @endphp
                  @endforeach
                                                                        
                                                                        
                                                                        
                                                                        
          
                    
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
</section>
<!-- End testimonials Section -->





   @include('common/footer') 

   <!-- <script>
    $("#advertisement001").modal("show");
    
    function close_modal() {
      $("#advertisement001").modal("hide");
    }
    </script> -->