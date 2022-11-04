

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

           
            
                  <div class="alert alert-success">{{ $msg }}</div>
       
        
         </div>
    </div>
</div>  


@include('common/footer') 