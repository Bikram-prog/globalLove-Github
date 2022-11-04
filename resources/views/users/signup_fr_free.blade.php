@include('common/header') 
<div class="container pb-5">
  <div class="row">
    <div class="col-lg-6 ">
      <a href="/"><img class="careers-logo mt-5" src="{{ asset('images/global-love-logo@2x.png') }}"></a>
      <p class="careers-title mt-5">Sign up now and go in the running for these great cash and prizes</p>
      <hr class="border-red">
      <p class="careers-subtitle mt-5"><i class="fas fa-check-circle" style="color:green;"></i> Monthly cash giveaways (up to $1000AUD)<p><i class="fas fa-check-circle" style="color:green;"></i> Monthly membership giveaways up to 1 years free membership</p>
            <p><i class="fas fa-check-circle" style="color:green;"></i> Yearly major cash and prize giveaway</p><p><i class="fas fa-check-circle" style="color:green;"></i> Yearly major prize is a car to the value of $15,000AUD (or cash equivalent)</p>
            <p><i class="fas fa-check-circle" style="color:green;"></i> Yearly major cash giveaway of $5000 AUD</p>
    </div>
    <div class="col-lg-6 cartoon-img ">
    <img src="{{ asset('images/career-banner-vector.svg') }}">
    </div>
  </div>
</div>
<div class="container-fluid career-sertion2 pt-5 pb-5">
  <!-- <div class="container">
  <p class="careers-title text-center">How it works</p>
  <hr class="border-red" style="margin:auto">
    <div class="row">
     
    
        <div class="col-lg-6 mt-5">
        <div class="careers-circle">  
        <img class="money" src="{{ asset('images/icon_money.png') }}">
        </div>
          <p class="career-sertion2-title mt-5">You’ll be paid $1AUD per signup</p>
          <p class="career-sertion2-text mt-3">As you are aware, some countries pay, and some lucky ones don’t, so you will be paid $1AUD per signup of a paying member (ongoing if they renew), and $1 per 5 signups of a non paying member (ongoing if they renew).</p>
          </div> 
      <div class="col-lg-6 mt-5">
      <div class="careers-circle">  
        <img class="id" src="{{ asset('images/icon_id.png') }}">
     </div>
      <p class="career-sertion2-title mt-5">Special ID and Merchandise will be given</p>
          <p class="career-sertion2-text mt-3">Once you signup as an agent, you will be emailed your special ID that you give the new members. They must include this in their signup process in order for you to start earning money with GlobalLove. After you have 100 registrations under your ID, you will be sent  T-shirt, mousepad, and mask</p>
          </div> 
      </div> 
    </div> -->

    <div class="row mt-5">
      <div class="col-lg-12 text-center">
      <a href="{{ url('signup') }}"><button class="btn btn-danger hero__btn rounded-0 me-2 mb-3">
                  <span class="me-3">Click here to Started Free</span>
                  <img src="{{ asset('images/icon_arrow.svg') }}" alt="arrow" />
                </button></a>
      </div> 

    </div>


  </div>
</div>

@include('common/footer') 
