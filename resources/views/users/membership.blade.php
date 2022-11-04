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
		<div class="col-md-4">

			@if(count($payment) == 1 && $payment[0]->pt_start_date <= date('Y-m-d H:i:s') && $payment[0]->pt_end_date >= date('Y-m-d H:i:s'))

			@else
			<div class="flex-center position-ref full-height" style="
			 border: 1px solid #ccc;
			margin-top: 20px;
			border-radius: 4px;
			background: #fff;
			 ">

			<div class="content mt-2">

				
				
				  
			  
  
			  @if(count($price) != 0)
			  <h1 class="text-center text-primary">Upgrade Your Membership</h1>
  
			  <p class="text-center text-success" style="font-size: 30px;font-weight: 700;">${{ $price[0]->cp_price }}/1 month</p>
  
			  
			   <a onclick="search()" href="{{ route('paypal-payment-form', '1') }}" class="btn btn-success btn-block text-center" style="font-size: 18px; font-weight: 700; width: 70%; margin: 0 auto;">UPGRADE</a>
			   <div class="text-center">
						<img style="width: 50px;" src="{{url('visa.png')}}" /> &nbsp;
						<img style="width: 80px;" src="{{url('mastercard.png')}}" /> &nbsp;
						<img style="width: 112px;" src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" alt="PayPal Logo"> &nbsp;
			   </div>
			  @else
			  <p class="text-center" style="font-size: 22px;font-weight: 600;margin-top: 20px;">Currently upgrading membership for your country is not available.</p>
			  @endif
				  
					
				  
			   
	
			  </div>
			  
			</div>
			@endif
		</div>
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
  			
                <h1 class="text-center" style="font-weight: 700; color: #6ab04c;"><i class="fa fa-check" aria-hidden="true"></i> Congratulations, You Are A Premium Member.</h1>
                <!-- <h4 class="text-center" style="font-size: 18px;">Enjoy the paid services 😀</h4> -->
                <p class="text-center" style="font-size: 20px; font-weight: 700; color: #192a56;">Enjoy GlobalLove Premium Access Until, <span style="font-style: italic; color: #eb4d4b;"><?php echo date_format(new DateTime($payment[0]->pt_end_date), "M j, Y g:i a"); ?></span></p>
            @else

            @if(count($price) != 0)
            <h1 class="text-center text-primary">Upgrade Your Membership</h1>

            <p class="text-center text-success" style="font-size: 30px;font-weight: 700;">${{ $price[0]->cp_price_six }}/6 months</p>

            
             <a onclick="search()" href="{{ route('paypal-payment-form', '6') }}" class="btn btn-success btn-block text-center" style="font-size: 18px; font-weight: 700; width: 70%; margin: 0 auto;">UPGRADE</a>
             <div class="text-center">
                      <img style="width: 50px;" src="{{url('visa.png')}}" /> &nbsp;
                      <img style="width: 80px;" src="{{url('mastercard.png')}}" /> &nbsp;
					  <img style="width: 112px;" src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" alt="PayPal Logo"> &nbsp;
             </div>
            @else
            <p class="text-center" style="font-size: 22px;font-weight: 600;margin-top: 20px;">Currently upgrading membership for your country is not available.</p>
            @endif
                
                  
                
             @endif
  
            </div>
        </div>

		</div>
		<div class="col-md-4">

			@if(count($payment) == 1 && $payment[0]->pt_start_date <= date('Y-m-d H:i:s') && $payment[0]->pt_end_date >= date('Y-m-d H:i:s'))
				
				  
			  @else
			<div class="flex-center position-ref full-height" style="
			 border: 1px solid #ccc;
			margin-top: 20px;
			border-radius: 4px;
			background: #fff;
			 ">

			<div class="content mt-2">

				
  
			  @if(count($price) != 0)
			  <h1 class="text-center text-primary">Upgrade Your Membership</h1>
  
			  <p class="text-center text-success" style="font-size: 30px;font-weight: 700;">${{ $price[0]->cp_price_twelve }}/12 months</p>
  
			  
			   <a onclick="search()" href="{{ route('paypal-payment-form', '12') }}" class="btn btn-success btn-block text-center" style="font-size: 18px; font-weight: 700; width: 70%; margin: 0 auto;">UPGRADE</a>
			   <div class="text-center">
						<img style="width: 50px;" src="{{url('visa.png')}}" /> &nbsp;
						<img style="width: 80px;" src="{{url('mastercard.png')}}" /> &nbsp;
						<img style="width: 112px;" src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" alt="PayPal Logo"> &nbsp;
			   </div>
			  @else
			  <p class="text-center" style="font-size: 22px;font-weight: 600;margin-top: 20px;">Currently upgrading membership for your country is not available.</p>
			  @endif
				  
					
				  
			   
	
			  </div>
			</div>
			@endif
		</div>
	</div>
</div>



<div class="container">

@if(count($payment) == 1 && $payment[0]->pt_start_date <= date('Y-m-d H:i:s') && $payment[0]->pt_end_date >= date('Y-m-d H:i:s'))

@else

@if (Session::has('succ'))
	<div class="alert alert-danger mt-4">{{Session::get('succ')}}</div>
@endif


<!-- <h2 class="mb-3 fw-bold mt-4 text-center">Enter Your Promo Code To Get Access To Our Premium Features For 1 month For Free.</h2>

<form action="/promocodepost" method="post" class="row mt-4 text-center">
	{{ csrf_field() }}
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="row">
				<div class="col-6">
					<input type="text" name="promo" class="form-control" placeholder="Promo Code (Optional)">
				</div>
				<div class="col-6 text-left">
					<button type="submit" class="btn btn-primary">Activate</button>
				</div>
				</div>
				
			</div>
			<div class="col-md-2">
				
			</div>
		
</form> -->

@endif


	<div class="row" style="margin-top: 50px;">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<table class="table table-hover table-bordered">
				  <thead>
				    <tr>
				      <th scope="col">Features</th>
				      <th scope="col">🆓Free</th>
				      <th scope="col">💎Paid</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <td style="font-weight: 700;">Matching</td>
				      <td><i class="fas fa-check-circle" style="color: #2ecc71;"></i></td>
				      <td><i class="fas fa-check-circle" style="color: #2ecc71;"></i></td>
				    </tr>
				    <tr>
				      <td style="font-weight: 700;">Like</td>
				      <td><i class="fas fa-check-circle" style="color: #2ecc71;"></i></td>
				      <td><i class="fas fa-check-circle" style="color: #2ecc71;"></i></td>
				    </tr>
				    <tr>
				      <td style="font-weight: 700;">Send Message To Paid User</td>
				      <td><i class="fas fa-check-circle" style="color: #2ecc71;"></i></td>
				      <td><i class="fas fa-check-circle" style="color: #2ecc71;"></i></td>
				    </tr>
				    <tr>
				      <td style="font-weight: 700;">Send Message To Free User</td>
				      <td><i class="fas fa-times-circle" style="color: #e74c3c;"></i></td>
				      <td><i class="fas fa-check-circle" style="color: #2ecc71;"></i></td>
				    </tr>
				    <tr>
				      <td style="font-weight: 700;">Blocking User</td>
				      <td><i class="fas fa-check-circle" style="color: #2ecc71;"></i></td>
				      <td><i class="fas fa-check-circle" style="color: #2ecc71;"></i></td>
				    </tr>
				  </tbody>
				</table>
		</div>
		<div class="col-md-2"></div>
	</div>

	<div class="row mt-4">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<p class="text-dark text-capitalized" style=" 
font-size: 18px;
text-align: left;
font-weight: 700;
">
<!-- ${{ $price[0]->cp_price }} AUD payment Represents 6 CALENDER MONTH FROM the start of upgrade. -->
</p>
<p class="text-dark text-capitalized" style=" 
font-size: 18px;
text-align: left;
font-weight: 700;
">
PRICE INCLUDES GST (Australian Goods & Services Tax).
</p>
<p class="text-dark text-capitalized" style=" 
font-size: 18px;
text-align: left;
font-weight: 700;
">
YOUR CARD STATEMENT SHOW 'WWWMEDIA'.
</p>
<p class="text-dark text-capitalized" style=" 
font-size: 18px;
text-align: left;
font-weight: 700;
">
THIS SUBSCRIPTION DOES NOT RENEW AT MONTHS END.
</p>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>





<style> 
.table th,td {
	font-size: 18px;
}
</style>

@include('footer')