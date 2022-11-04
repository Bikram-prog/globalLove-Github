

@include('common/header') 
   <div class="container-fluid">
      <div class="row">

         <div class="col-lg-6 login-right">
         <a href="{{ url('/') }}" class="back"><i class="fa fa-arrow-left"></i> BACK</a>
         <p class="login-welcome">Welcome to</p>
         <p class="login-globallove">Globallove</p>
         <p class="login-tagline">Be a GlobalLove member <br>and find your love.</p>
         <p class="login-copyright">  GlobalLove © 2021</p>
       
         </div>
         <div class="col-lg-6 login-left">

         <p class="text-center"><a href="{{ url('/') }}"><img src="{{ asset('images/global-love-logo@2x.png') }}"></a></p> 
        
         <form id="registration-form" action="/resetpasswordaction" method="post" autocomplete="off">
                                {{ csrf_field() }}
                                @if (Session::has('msg'))
                                    <div class="alert alert-success">{{Session::get('msg')}}</div>
                                @endif

            <p class="form-title mt-5">Reset Password</p> 
            <p class="form-label">Email address</p> 
            <input type="password" name="psw" placeholder="Type your new password" class="form-control" required>
            <p class="form-label">Email address</p> 
            <input type="password" name="newpsw" placeholder="Re-type your new password" class="form-control" required>


            <input type="hidden" name="token" class="form-control" value="{{ $token }}">
                    <input type="hidden" name="mail" class="form-control" value="{{ $mail }}">

                    <button class="btn btn-danger w-100 mt-3 login-btn">SUBMIT</button>

            </form>
        
         </div>
    </div>
</div>  


@include('common/footer') 