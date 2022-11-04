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

<style type="text/css">
    label {
        font-weight: bold;
    }
    .paypal-powered-by {
        display: none !important;
    }
</style>

<div class="container">
<div class='row'>
<div class='col-md-3'></div>
<div class='col-md-6' >


 <!-- PayPal payment form for displaying the buy button -->

 <!-- <h4 class="text-center" style="margin-top: 20px;">Pay with PayPal</h4> <hr>
<div id="smart-button-container" style="background: #fff; padding: 10px; border-radius: 8px;">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
    
  <script src="https://www.paypal.com/sdk/js?client-id=AXOIsI75gNH4-9b7xj5YuqpbxZjrjXTBmymv_E208EImUfK2pwQ7QGDQRdgmDjYHQjRBw7ORPSdVYWNr&currency=AUD&disable-funding=credit,card" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"AUD","value":<?php echo $price[0]->cp_price; ?>}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            if(details.status == 'COMPLETED') {
                $.ajax({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: '/paypal-payment-form-submit',
                  type: 'POST',
                  data: {  
                    tran: details.id,
                    ack: details.status,
                    amount: details.purchase_units[0].amount.value,
                    currency_code: details.purchase_units[0].amount.currency_code
                  },
                  contentType: false,
                  processData: false,
                  success:function(response) {
                       alert(response);
                       window.location.href = '/membership';
                  }
                });
            } else {
                alert('Your payment failed. Please try again later.');
            }
            

            //alert('Transaction completed by ' + details.payer.name.given_name + '!');
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script> -->


  <!--------------------------------- stripe payment ---------------------------------->

  <!-- <hr /> -->

    <h2 class="mt-4">Checkout</h2>
    <h4>Billing Information</h4>

  <div class="panel-body mt-4" style="background: #fff; padding: 10px; border-radius: 8px; margin-bottom: 30px;">
  <form role="form" action="/stripe-post" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                    id="payment-form">

                                                    @csrf

                            <input class='form-control'
                            type='hidden' name='month' value="{{ $month }}">

                            <div class='col-md-12 form-group required'>
                            <label class='control-label'>Address 1</label> <input
                            class='form-control' placeholder='Address'
                            type='text' name='address' required>
                            </div>

                            <div class='col-md-12 form-group required'>
                                <label class='control-label'>Address 2</label> <input
                                    class='form-control' placeholder='Street'
                                    type='text' name='street'>
                            </div>

                            <div class="row" style="padding: 10px;">
                            <div class='col-md-6 form-group required'>
                                <label class='control-label'>Country</label> 
                                <select class="form-control" name="country" required>
                                 <option value="Afganistan">Afghanistan</option>
                                 <option value="Albania">Albania</option>
                                 <option value="Algeria">Algeria</option>
                                 <option value="American Samoa">American Samoa</option>
                                 <option value="Andorra">Andorra</option>
                                 <option value="Angola">Angola</option>
                                 <option value="Anguilla">Anguilla</option>
                                 <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                 <option value="Argentina">Argentina</option>
                                 <option value="Armenia">Armenia</option>
                                 <option value="Aruba">Aruba</option>
                                 <option value="Australia">Australia</option>
                                 <option value="Austria">Austria</option>
                                 <option value="Azerbaijan">Azerbaijan</option>
                                 <option value="Bahamas">Bahamas</option>
                                 <option value="Bahrain">Bahrain</option>
                                 <option value="Bangladesh">Bangladesh</option>
                                 <option value="Barbados">Barbados</option>
                                 <option value="Belarus">Belarus</option>
                                 <option value="Belgium">Belgium</option>
                                 <option value="Belize">Belize</option>
                                 <option value="Benin">Benin</option>
                                 <option value="Bermuda">Bermuda</option>
                                 <option value="Bhutan">Bhutan</option>
                                 <option value="Bolivia">Bolivia</option>
                                 <option value="Bonaire">Bonaire</option>
                                 <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                 <option value="Botswana">Botswana</option>
                                 <option value="Brazil">Brazil</option>
                                 <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                 <option value="Brunei">Brunei</option>
                                 <option value="Bulgaria">Bulgaria</option>
                                 <option value="Burkina Faso">Burkina Faso</option>
                                 <option value="Burundi">Burundi</option>
                                 <option value="Cambodia">Cambodia</option>
                                 <option value="Cameroon">Cameroon</option>
                                 <option value="Canada">Canada</option>
                                 <option value="Canary Islands">Canary Islands</option>
                                 <option value="Cape Verde">Cape Verde</option>
                                 <option value="Cayman Islands">Cayman Islands</option>
                                 <option value="Central African Republic">Central African Republic</option>
                                 <option value="Chad">Chad</option>
                                 <option value="Channel Islands">Channel Islands</option>
                                 <option value="Chile">Chile</option>
                                 <option value="China">China</option>
                                 <option value="Christmas Island">Christmas Island</option>
                                 <option value="Cocos Island">Cocos Island</option>
                                 <option value="Colombia">Colombia</option>
                                 <option value="Comoros">Comoros</option>
                                 <option value="Congo">Congo</option>
                                 <option value="Cook Islands">Cook Islands</option>
                                 <option value="Costa Rica">Costa Rica</option>
                                 <option value="Cote DIvoire">Cote DIvoire</option>
                                 <option value="Croatia">Croatia</option>
                                 <option value="Cuba">Cuba</option>
                                 <option value="Curaco">Curacao</option>
                                 <option value="Cyprus">Cyprus</option>
                                 <option value="Czech Republic">Czech Republic</option>
                                 <option value="Denmark">Denmark</option>
                                 <option value="Djibouti">Djibouti</option>
                                 <option value="Dominica">Dominica</option>
                                 <option value="Dominican Republic">Dominican Republic</option>
                                 <option value="East Timor">East Timor</option>
                                 <option value="Ecuador">Ecuador</option>
                                 <option value="Egypt">Egypt</option>
                                 <option value="El Salvador">El Salvador</option>
                                 <option value="Equatorial Guinea">Equatorial Guinea</option>
                                 <option value="Eritrea">Eritrea</option>
                                 <option value="Estonia">Estonia</option>
                                 <option value="Ethiopia">Ethiopia</option>
                                 <option value="Falkland Islands">Falkland Islands</option>
                                 <option value="Faroe Islands">Faroe Islands</option>
                                 <option value="Fiji">Fiji</option>
                                 <option value="Finland">Finland</option>
                                 <option value="France">France</option>
                                 <option value="French Guiana">French Guiana</option>
                                 <option value="French Polynesia">French Polynesia</option>
                                 <option value="French Southern Ter">French Southern Ter</option>
                                 <option value="Gabon">Gabon</option>
                                 <option value="Gambia">Gambia</option>
                                 <option value="Georgia">Georgia</option>
                                 <option value="Germany">Germany</option>
                                 <option value="Ghana">Ghana</option>
                                 <option value="Gibraltar">Gibraltar</option>
                                 <option value="Great Britain">Great Britain</option>
                                 <option value="Greece">Greece</option>
                                 <option value="Greenland">Greenland</option>
                                 <option value="Grenada">Grenada</option>
                                 <option value="Guadeloupe">Guadeloupe</option>
                                 <option value="Guam">Guam</option>
                                 <option value="Guatemala">Guatemala</option>
                                 <option value="Guinea">Guinea</option>
                                 <option value="Guyana">Guyana</option>
                                 <option value="Haiti">Haiti</option>
                                 <option value="Hawaii">Hawaii</option>
                                 <option value="Honduras">Honduras</option>
                                 <option value="Hong Kong">Hong Kong</option>
                                 <option value="Hungary">Hungary</option>
                                 <option value="Iceland">Iceland</option>
                                 <option value="Indonesia">Indonesia</option>
                                 <option value="India">India</option>
                                 <option value="Iran">Iran</option>
                                 <option value="Iraq">Iraq</option>
                                 <option value="Ireland">Ireland</option>
                                 <option value="Isle of Man">Isle of Man</option>
                                 <option value="Israel">Israel</option>
                                 <option value="Italy">Italy</option>
                                 <option value="Jamaica">Jamaica</option>
                                 <option value="Japan">Japan</option>
                                 <option value="Jordan">Jordan</option>
                                 <option value="Kazakhstan">Kazakhstan</option>
                                 <option value="Kenya">Kenya</option>
                                 <option value="Kiribati">Kiribati</option>
                                 <option value="Korea North">Korea North</option>
                                 <option value="Korea Sout">Korea South</option>
                                 <option value="Kuwait">Kuwait</option>
                                 <option value="Kyrgyzstan">Kyrgyzstan</option>
                                 <option value="Laos">Laos</option>
                                 <option value="Latvia">Latvia</option>
                                 <option value="Lebanon">Lebanon</option>
                                 <option value="Lesotho">Lesotho</option>
                                 <option value="Liberia">Liberia</option>
                                 <option value="Libya">Libya</option>
                                 <option value="Liechtenstein">Liechtenstein</option>
                                 <option value="Lithuania">Lithuania</option>
                                 <option value="Luxembourg">Luxembourg</option>
                                 <option value="Macau">Macau</option>
                                 <option value="Macedonia">Macedonia</option>
                                 <option value="Madagascar">Madagascar</option>
                                 <option value="Malaysia">Malaysia</option>
                                 <option value="Malawi">Malawi</option>
                                 <option value="Maldives">Maldives</option>
                                 <option value="Mali">Mali</option>
                                 <option value="Malta">Malta</option>
                                 <option value="Marshall Islands">Marshall Islands</option>
                                 <option value="Martinique">Martinique</option>
                                 <option value="Mauritania">Mauritania</option>
                                 <option value="Mauritius">Mauritius</option>
                                 <option value="Mayotte">Mayotte</option>
                                 <option value="Mexico">Mexico</option>
                                 <option value="Midway Islands">Midway Islands</option>
                                 <option value="Moldova">Moldova</option>
                                 <option value="Monaco">Monaco</option>
                                 <option value="Mongolia">Mongolia</option>
                                 <option value="Montserrat">Montserrat</option>
                                 <option value="Morocco">Morocco</option>
                                 <option value="Mozambique">Mozambique</option>
                                 <option value="Myanmar">Myanmar</option>
                                 <option value="Nambia">Nambia</option>
                                 <option value="Nauru">Nauru</option>
                                 <option value="Nepal">Nepal</option>
                                 <option value="Netherland Antilles">Netherland Antilles</option>
                                 <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                 <option value="Nevis">Nevis</option>
                                 <option value="New Caledonia">New Caledonia</option>
                                 <option value="New Zealand">New Zealand</option>
                                 <option value="Nicaragua">Nicaragua</option>
                                 <option value="Niger">Niger</option>
                                 <option value="Nigeria">Nigeria</option>
                                 <option value="Niue">Niue</option>
                                 <option value="Norfolk Island">Norfolk Island</option>
                                 <option value="Norway">Norway</option>
                                 <option value="Oman">Oman</option>
                                 <option value="Pakistan">Pakistan</option>
                                 <option value="Palau Island">Palau Island</option>
                                 <option value="Palestine">Palestine</option>
                                 <option value="Panama">Panama</option>
                                 <option value="Papua New Guinea">Papua New Guinea</option>
                                 <option value="Paraguay">Paraguay</option>
                                 <option value="Peru">Peru</option>
                                 <option value="Phillipines">Philippines</option>
                                 <option value="Pitcairn Island">Pitcairn Island</option>
                                 <option value="Poland">Poland</option>
                                 <option value="Portugal">Portugal</option>
                                 <option value="Puerto Rico">Puerto Rico</option>
                                 <option value="Qatar">Qatar</option>
                                 <option value="Republic of Montenegro">Republic of Montenegro</option>
                                 <option value="Republic of Serbia">Republic of Serbia</option>
                                 <option value="Reunion">Reunion</option>
                                 <option value="Romania">Romania</option>
                                 <option value="Russia">Russia</option>
                                 <option value="Rwanda">Rwanda</option>
                                 <option value="St Barthelemy">St Barthelemy</option>
                                 <option value="St Eustatius">St Eustatius</option>
                                 <option value="St Helena">St Helena</option>
                                 <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                 <option value="St Lucia">St Lucia</option>
                                 <option value="St Maarten">St Maarten</option>
                                 <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                 <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                 <option value="Saipan">Saipan</option>
                                 <option value="Samoa">Samoa</option>
                                 <option value="Samoa American">Samoa American</option>
                                 <option value="San Marino">San Marino</option>
                                 <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                 <option value="Saudi Arabia">Saudi Arabia</option>
                                 <option value="Senegal">Senegal</option>
                                 <option value="Seychelles">Seychelles</option>
                                 <option value="Sierra Leone">Sierra Leone</option>
                                 <option value="Singapore">Singapore</option>
                                 <option value="Slovakia">Slovakia</option>
                                 <option value="Slovenia">Slovenia</option>
                                 <option value="Solomon Islands">Solomon Islands</option>
                                 <option value="Somalia">Somalia</option>
                                 <option value="South Africa">South Africa</option>
                                 <option value="Spain">Spain</option>
                                 <option value="Sri Lanka">Sri Lanka</option>
                                 <option value="Sudan">Sudan</option>
                                 <option value="Suriname">Suriname</option>
                                 <option value="Swaziland">Swaziland</option>
                                 <option value="Sweden">Sweden</option>
                                 <option value="Switzerland">Switzerland</option>
                                 <option value="Syria">Syria</option>
                                 <option value="Tahiti">Tahiti</option>
                                 <option value="Taiwan">Taiwan</option>
                                 <option value="Tajikistan">Tajikistan</option>
                                 <option value="Tanzania">Tanzania</option>
                                 <option value="Thailand">Thailand</option>
                                 <option value="Togo">Togo</option>
                                 <option value="Tokelau">Tokelau</option>
                                 <option value="Tonga">Tonga</option>
                                 <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                 <option value="Tunisia">Tunisia</option>
                                 <option value="Turkey">Turkey</option>
                                 <option value="Turkmenistan">Turkmenistan</option>
                                 <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                 <option value="Tuvalu">Tuvalu</option>
                                 <option value="Uganda">Uganda</option>
                                 <option value="United Kingdom">United Kingdom</option>
                                 <option value="Ukraine">Ukraine</option>
                                 <option value="United Arab Erimates">United Arab Emirates</option>
                                 <option value="United States of America">United States of America</option>
                                 <option value="Uraguay">Uruguay</option>
                                 <option value="Uzbekistan">Uzbekistan</option>
                                 <option value="Vanuatu">Vanuatu</option>
                                 <option value="Vatican City State">Vatican City State</option>
                                 <option value="Venezuela">Venezuela</option>
                                 <option value="Vietnam">Vietnam</option>
                                 <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                 <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                 <option value="Wake Island">Wake Island</option>
                                 <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                 <option value="Yemen">Yemen</option>
                                 <option value="Zaire">Zaire</option>
                                 <option value="Zambia">Zambia</option>
                                 <option value="Zimbabwe">Zimbabwe</option>
                              </select>
                            </div>

                            <div class='col-md-6 form-group required'>
                                <label class='control-label'>State</label> <input
                                    class='form-control' placeholder='State'
                                    type='text' name='state' required>
                            </div>
                            </div>

                            

                            <div class="row" style="padding: 10px;">
                            <div class='col-md-6 form-group required'>
                                <label class='control-label'>City</label> <input
                                    class='form-control' placeholder='City name'
                                    type='text' name='city' required>
                            </div>

                            <div class='col-md-6 form-group required'>
                                <label class='control-label'>Postcode</label> <input
                                    class='form-control' placeholder='Postcode/Zip'
                                    type='text' name='postcode' required>
                            </div>
                            </div>
                            

                            

                            <div class='col-md-12 form-group required'>
                                <label class='control-label'>Contact Number</label> <input
                                    class='form-control' placeholder='Contact no'
                                    type='number' name='cntct_no' required>
                            </div>

  </div>




<h4 class="text-left"> Credit / Debit Card </h4>

  <div class="panel-body" style="background: #fff; padding: 10px; border-radius: 8px; margin-bottom: 30px;">
                    
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    


                    
                        
  
                        <div class='form-row row'>
                            <div class='col-md-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-md-12 form-group required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC/CVV</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                            @if ($month == '1')
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Promo Code (Optional)</label> <input type="text" name="promo" class="form-control" placeholder="Promo Code (Optional)">
                            </div>
                            @endif
                            </div>
                            
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'></div>
                            </div>
                        </div>
  
                        <div class="row text-center">
                            <div class="col-md-12">
                                @if ($month == '1')
                                <h2>${{ $price[0]->cp_price }} AUD</h2>
                                @elseif ($month == '6')
                                <h2>${{ $price[0]->cp_price_six }} AUD</h2>
                                @else
                                <h2>${{ $price[0]->cp_price_twelve }} AUD</h2>
                                @endif
                                <button style="" class="btn btn-success btn-lg" type="submit">Make Payment</button>
                            </div>
                        </div>
                          
                    </form>
                    <p style="font-size: 14px;" class="mt-2 text-center text-weight-bold">There are no credit card fees associated with these transactions</p>
                    <div class="text-center">
                      <img style="width: 50px;" src="{{url('visa.png')}}" /> 
                      <img style="width: 80px;" src="{{url('mastercard.png')}}" />
                    </div>
                    
                </div>

<!---------------------------------------- end stripe ------------------------------------>



</div>
<div class='col-md-3'></div>
</div>
</div>







<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        	<div id="paypal-button-container"></div>
            <div class="card">
                <div class="card-header">{{ __('Paypal Card Payment') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('paypal-payment-form-submit') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="card_no" type="text" class="form-control @error('card_no') is-invalid @enderror" name="card_no" value="{{ old('card_no') }}" required autocomplete="card_no" placeholder="Card No." autofocus>
                                @error('card_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="exp_month" type="text" class="form-control @error('exp_month') is-invalid @enderror" name="exp_month" value="{{ old('exp_month') }}" required autocomplete="exp_month" placeholder="Exp. Month (Eg. 02)" autofocus>
                                @error('exp_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="exp_year" type="text" class="form-control @error('exp_year') is-invalid @enderror" name="exp_year" value="{{ old('exp_year') }}" required autocomplete="exp_year" placeholder="Exp. Year (Eg. 2020)" autofocus>
                                @error('exp_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="cvv" type="password" class="form-control @error('cvv') is-invalid @enderror" name="cvv" required autocomplete="current-password" placeholder="CVV">
                                @error('cvv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="price" value="<?php echo $price[0]->cp_price ?>">

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button onclick="search()" type="submit" class="btn btn-primary btn-block">
                                    {{ __('PAY NOW') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

@include('footer')



<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            console.log(response)
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>