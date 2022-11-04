@include('common/header') 

<!-- End Facebook Pixel Code --></head>
<body class="ltr body-landing-page" data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" cz-shortcut-listen="true">

<div class="container-fluid terms-header pb-5">
   
   <div class="container">
   <div class="row">
         <div class="col-md-6 mt-3"><a href="{{ url('/') }}"><img class="signup-logo" src="{{ asset('images/global-love-logo-dark@2x.png') }}"></a></div>
         <div class="col-md-6 mt-5 button-terms">
 
                       
         </div>  
      </div> 
 
 

 
 
     </div>  
   </div>
        <div class="content content-landing pt-5 pb-5" style="flex: 1">
    <div class="container">
        <div class="card w-100">
            <div class="row row-landing-page ">
                <div class="col-lg-2">
                    <!-- <div class="landing-page-bg h-100"></div> -->
                </div>
                <div class="col-lg-8 d-flex flex-column">
                    <div class="landing-page-signup d-flex flex-column justify-content-center flex-grow-1">
                        <div class="landing-page-signup-head">
                            
                            <!-- <div class="subtitle">
                                Be a GlobalLove member and find your love.  

                            </div> -->
                        </div>
                        <div class="landing-page-signup-form flex-fill">
                
                            <h1 class="text-center">Your Account Verified Successfully.</h1>

            <p class="text-center">  <a href="{{ url('login') }}"><button class="btn btn-dark hero__btn button-login rounded-0 border-rad mb-3">
                         <span class="me-3">LOGIN </span
                         ><img src="{{ asset('images/icon_arrow.svg') }}" alt="arrow" />
                         </button></a></p>
                    </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <!-- <div class="landing-page-bg h-100"></div> -->
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    @include('common/footer') 
    