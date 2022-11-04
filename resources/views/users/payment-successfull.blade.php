@include('header')


<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MCHJTVB');</script>
<!-- End Google Tag Manager -->



<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MCHJTVB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
            @if (Session::has('err'))
                <div class="alert alert-danger">{{Session::get('err')}}</div>
            @endif
			 <div class="flex-center position-ref full-height" style="
			 border: 1px solid #ccc;
			margin-top: 20px;
			border-radius: 4px;
			background: #fff;
			 ">
  
            <div class="content mt-2">



            	
            	

  			@if(count($payment) == 1 && $payment[0]->pt_start_date <= date('Y-m-d H:i:s') && $payment[0]->pt_end_date >= date('Y-m-d H:i:s'))
  			
                <h1 class="text-center" style="font-weight: 700; color: #6ab04c;"><i class="fa fa-check" aria-hidden="true"></i> Congratulations, You Are A Premium Member </h1>
                <!-- <h4 class="text-center" style="font-size: 18px;">Enjoy the paid services 😀</h4> -->
                <p class="text-center" style="font-size: 20px; font-weight: 700; color: #192a56;">Transaction Id: <br><span style="font-style: italic; color: #eb4d4b;">@if (Session::has('order-id'))
                {{Session::get('order-id')}}
                @endif</span></p>
                <p class="text-center" style="font-size: 13px; font-weight: 700; color: #192a56;">Enjoy GlobalLove Premium Access Until, <br><span style="font-style: italic; color: #eb4d4b;"><?php echo date_format(new DateTime($payment[0]->pt_end_date), "M j, Y g:i a"); ?></span></p>
                
                  
                
             @endif
  
            </div>
        </div>

		</div>
		<div class="col-md-4"></div>
	</div>
</div>





@include('footer')