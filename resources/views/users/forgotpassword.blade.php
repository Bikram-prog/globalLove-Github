@include('common/header') 
   <div class="container-fluid">
      <div class="row">

      <div class="col-lg-6 login-right">
         <a href="{{ url('/') }}" class="back"><i class="fa fa-arrow-left"></i> BACK</a>
         <p class="login-txt">DATING WEBSITE</p>
         <p class="login-welcome">Welcome to</p>
         <p class="login-globallove">GlobalLove</p>
         <p class="login-tagline">GLobalLove Online is the world's first <span style="font-weight:bold"> MULTI GENDER</span><br>dating website. Be a GlobalLove member and <br>find your love.</p>
         <p class="login-copyright">  GlobalLove © 2021</p>
       
         </div>
         <div class="col-lg-6 login-left">

         <p class="text-center"><a href="{{ url('/') }}"><img src="{{ asset('images/global-love-logo@2x.png') }}" alt="Global Love Logo"></a></p> 
        
         <form id="registration-form" action="/forgotpasswordaction" method="post" autocomplete="off">
                                {{ csrf_field() }}
                                @if (Session::has('msg'))
                                    <div class="alert alert-success">{{Session::get('msg')}}</div>
                                @endif

            <h1 class="form-title mt-5">Forgot Password?</h1> 
            <p class="form-label">Email address</p> 
            <input type="email" name="email" placeholder="Enter your registered email" class="form-control" required>


            <button class="btn btn-danger w-100 mt-3 login-btn">SUBMIT</button>

            </form>
        
         </div>
    </div>
</div>  


@include('common/footer') 