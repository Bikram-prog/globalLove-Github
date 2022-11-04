@include('header')

<style type="text/css">
:focus{
  outline:none;
}
input[type=checkbox]{
  -webkit-appearance:button;
  -moz-appearance:button;
  appearance:button;
  border:4px solid #ccc;
  border-top-color:#bbb;
  border-left-color:#bbb;
  background:#fff;
  width:20px;
  height:20px;
  border-radius:50%;
}
input[type=checkbox]:selected{
  border:20px solid #4099ff;
  color: red !important;
  background-color: green !important;
}

.form-group {
	font-size: 20px !important;
}
hr {
    border: 2px solid #888 !important;
    margin-top: 0;
    margin-bottom: 10px;
  }
</style>



<div class="container">
    <div class="row" style="margin-top: 15px;">
        <div class="col-md-12">
            <h1>Edit Match Criteria</h1>
            <p>Help us find you the perfect match by telling us what is important to you in a partner. Answer the questions below and tell us what you’re looking for.</p>
            <p>Answer at least 3 questions below to complete this step.</p><hr>
        
        <form action="/profilematchaction" method="POST">
            {{ csrf_field() }}

            @if (Session::has('msg'))
                                    <div class="alert alert-success">{{Session::get('msg')}}</div>
                                @endif
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <p>Seeking</p>
                    <select name="seeking" class="form-control">
            
                <option value="All" <?php echo (isset($data[0]->match_seeking) && $data[0]->match_seeking == 'All' ? 'selected' : ''); ?>>Any</option>
              
                <option value="Male" <?php echo (isset($data[0]->match_seeking) && $data[0]->match_seeking == 'Male' ? 'selected' : ''); ?>>Male</option>
                
                <option value="Female" <?php echo (isset($data[0]->match_seeking) && $data[0]->match_seeking == 'Female' ? 'selected' : ''); ?>>Female</option>

                <option value="Transgender" <?php echo (isset($data[0]->match_seeking) && $data[0]->match_seeking == 'Transgender' ? 'selected' : ''); ?>>Transgender</option>
                
            </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <p>Minimum Age</p>
                <input type="number" class="form-control" name="min_age" value="<?php echo (isset($data[0]->match_max_age) ? $data[0]->match_min_age : ''); ?>">
            </div>
        </div>

            <div class="col-md-4">
            <div class="form-group">
             <p>Maximum Age</p>
            <input type="number" class="form-control" name="max_age" value="<?php echo (isset($data[0]->match_max_age) ? $data[0]->match_max_age : ''); ?>">
        </div>
            </div>
    </div> <hr>

    <h4>Living in:</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <p>Country</p>
                <select class="form-control" name="country">
                   <option <?php echo (isset($data[0]->match_country) && $data[0]->match_country == 'Any' ? 'selected' : ''); ?> value="All">Any Country</option>
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
            <hr>
        </div>
        
        
        
    </div>
    <h4>Their Appearance</h4>
    <div class="row">
        
        <div class="col-md-6">
            <p>Minimum height</p>
            <select name="min_height" class="form-control">
                        
                                
                            
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '140' ? 'selected' : ''); ?> value="140">4'7" (140 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '143' ? 'selected' : ''); ?> value="143">4'8" (143 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '145' ? 'selected' : ''); ?> value="145">4'9" (145 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '148' ? 'selected' : ''); ?> value="148">4'10" (148 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '150' ? 'selected' : ''); ?> value="150">4'11" (150 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '153' ? 'selected' : ''); ?> value="153">5' (153 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '155' ? 'selected' : ''); ?> value="155">5'1" (155 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '158' ? 'selected' : ''); ?> value="158">5'2" (158 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '161' ? 'selected' : ''); ?> value="161">5'3" (161 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '163' ? 'selected' : ''); ?> value="163">5'4" (163 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '166' ? 'selected' : ''); ?> value="166">5'5" (166 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '168' ? 'selected' : ''); ?> value="168">5'6" (168 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '171' ? 'selected' : ''); ?> value="171">5'7" (171 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '173' ? 'selected' : ''); ?> value="173">5'8" (173 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '176' ? 'selected' : ''); ?> value="176">5'9" (176 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '178' ? 'selected' : ''); ?> value="178">5'10" (178 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '181' ? 'selected' : ''); ?> value="181">5'11" (181 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '183' ? 'selected' : ''); ?> value="183">6' (183 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '186' ? 'selected' : ''); ?> value="186">6'1" (186 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '188' ? 'selected' : ''); ?> value="188">6'2" (188 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '191' ? 'selected' : ''); ?> value="191">6'3" (191 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '194' ? 'selected' : ''); ?> value="194">6'4" (194 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '196' ? 'selected' : ''); ?> value="196">6'5" (196 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '199' ? 'selected' : ''); ?> value="199">6'6" (199 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '201' ? 'selected' : ''); ?> value="201">6'7" (201 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '204' ? 'selected' : ''); ?> value="204">6'8" (204 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '206' ? 'selected' : ''); ?> value="206">6'9 (206 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '209' ? 'selected' : ''); ?> value="209">6'10" (209 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '211' ? 'selected' : ''); ?> value="211">6'11" (211 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '214' ? 'selected' : ''); ?> value="214">7' (214 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '216' ? 'selected' : ''); ?> value="216">7'1" (216 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_height) && $data[0]->match_min_height == '219' ? 'selected' : ''); ?> value="219">7'2" (219 cm)</option>
                                
                        </select>
        </div>
        <div class="col-md-6">
            <p>Maximum height</p>
            <select name="max_height" class="form-control">
                        
                                
                            
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '140' ? 'selected' : ''); ?> value="140">4'7" (140 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '143' ? 'selected' : ''); ?> value="143">4'8" (143 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '145' ? 'selected' : ''); ?> value="145">4'9" (145 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '148' ? 'selected' : ''); ?> value="148">4'10" (148 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '150' ? 'selected' : ''); ?> value="150">4'11" (150 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '153' ? 'selected' : ''); ?> value="153">5' (153 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '155' ? 'selected' : ''); ?> value="155">5'1" (155 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '158' ? 'selected' : ''); ?> value="158">5'2" (158 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '161' ? 'selected' : ''); ?> value="161">5'3" (161 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '163' ? 'selected' : ''); ?> value="163">5'4" (163 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '166' ? 'selected' : ''); ?> value="166">5'5" (166 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '168' ? 'selected' : ''); ?> value="168">5'6" (168 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '171' ? 'selected' : ''); ?> value="171">5'7" (171 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '173' ? 'selected' : ''); ?> value="173">5'8" (173 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '176' ? 'selected' : ''); ?> value="176">5'9" (176 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '178' ? 'selected' : ''); ?> value="178">5'10" (178 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '181' ? 'selected' : ''); ?> value="181">5'11" (181 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '183' ? 'selected' : ''); ?> value="183">6' (183 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '186' ? 'selected' : ''); ?> value="186">6'1" (186 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '188' ? 'selected' : ''); ?> value="188">6'2" (188 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '191' ? 'selected' : ''); ?> value="191">6'3" (191 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '194' ? 'selected' : ''); ?> value="194">6'4" (194 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '196' ? 'selected' : ''); ?> value="196">6'5" (196 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '199' ? 'selected' : ''); ?> value="199">6'6" (199 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '201' ? 'selected' : ''); ?> value="201">6'7" (201 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '204' ? 'selected' : ''); ?> value="204">6'8" (204 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '206' ? 'selected' : ''); ?> value="206">6'9 (206 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '209' ? 'selected' : ''); ?> value="209">6'10" (209 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '211' ? 'selected' : ''); ?> value="211">6'11" (211 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '214' ? 'selected' : ''); ?> value="214">7' (214 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '216' ? 'selected' : ''); ?> value="216">7'1" (216 cm)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_height) && $data[0]->match_max_height == '219' ? 'selected' : ''); ?> value="219" selected>7'2" (219 cm)</option>
                                
                        </select>

        </div>
    </div>


    <div class="row">
        
        <div class="col-md-6">
            <p>Minimum weight</p>
            <select name="min_weight" class="form-control">
                        
                                
                            
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '40' ? 'selected' : ''); ?> value="40">40 kg (88 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '41' ? 'selected' : ''); ?> value="41">41 kg (90 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '42' ? 'selected' : ''); ?> value="42">42 kg (93 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '43' ? 'selected' : ''); ?> value="43">43 kg (95 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '44' ? 'selected' : ''); ?> value="44">44 kg (97 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '45' ? 'selected' : ''); ?> value="45">45 kg (99 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '46' ? 'selected' : ''); ?> value="46">46 kg (101 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '47' ? 'selected' : ''); ?> value="47">47 kg (104 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '48' ? 'selected' : ''); ?> value="48">48 kg (106 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '49' ? 'selected' : ''); ?> value="49">49 kg (108 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '50' ? 'selected' : ''); ?> value="50">50 kg (110 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '51' ? 'selected' : ''); ?> value="51">51 kg (112 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '52' ? 'selected' : ''); ?> value="52">52 kg (115 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '53' ? 'selected' : ''); ?> value="53">53 kg (117 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '54' ? 'selected' : ''); ?> value="54">54 kg (119 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '55' ? 'selected' : ''); ?> value="55">55 kg (121 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '56' ? 'selected' : ''); ?> value="56">56 kg (123 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '57' ? 'selected' : ''); ?> value="57">57 kg (126 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '58' ? 'selected' : ''); ?> value="58">58 kg (128 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '59' ? 'selected' : ''); ?> value="59">59 kg (130 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '60' ? 'selected' : ''); ?> value="60">60 kg (132 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '61' ? 'selected' : ''); ?> value="61">61 kg (134 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '62' ? 'selected' : ''); ?> value="62">62 kg (137 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '63' ? 'selected' : ''); ?>value="63">63 kg (139 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '64' ? 'selected' : ''); ?> value="64">64 kg (141 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '65' ? 'selected' : ''); ?> value="65">65 kg (143 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '66' ? 'selected' : ''); ?> value="66">66 kg (146 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '67' ? 'selected' : ''); ?> value="67">67 kg (148 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '68' ? 'selected' : ''); ?> value="68">68 kg (150 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '69' ? 'selected' : ''); ?> value="69">69 kg (152 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '70' ? 'selected' : ''); ?> value="70">70 kg (154 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '71' ? 'selected' : ''); ?> value="71">71 kg (157 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '72' ? 'selected' : ''); ?> value="72">72 kg (159 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '73' ? 'selected' : ''); ?> value="73">73 kg (161 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '74' ? 'selected' : ''); ?> value="74">74 kg (163 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '75' ? 'selected' : ''); ?> value="75">75 kg (165 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '76' ? 'selected' : ''); ?> value="76">76 kg (168 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '77' ? 'selected' : ''); ?> value="77">77 kg (170 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '78' ? 'selected' : ''); ?> value="78">78 kg (172 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '79' ? 'selected' : ''); ?> value="79">79 kg (174 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '80' ? 'selected' : ''); ?> value="80">80 kg (176 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '81' ? 'selected' : ''); ?> value="81">81 kg (179 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '82' ? 'selected' : ''); ?> value="82">82 kg (181 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '83' ? 'selected' : ''); ?> value="83">83 kg (183 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '84' ? 'selected' : ''); ?> value="84">84 kg (185 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '85' ? 'selected' : ''); ?> value="85">85 kg (187 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '86' ? 'selected' : ''); ?> value="86">86 kg (190 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '87' ? 'selected' : ''); ?> value="87">87 kg (192 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '88' ? 'selected' : ''); ?>value="88">88 kg (194 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '89' ? 'selected' : ''); ?> value="89">89 kg (196 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '90' ? 'selected' : ''); ?> value="90">90 kg (198 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '91' ? 'selected' : ''); ?> value="91">91 kg (201 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '92' ? 'selected' : ''); ?> value="92">92 kg (203 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '93' ? 'selected' : ''); ?> value="93">93 kg (205 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '94' ? 'selected' : ''); ?> value="94">94 kg (207 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '95' ? 'selected' : ''); ?>value="95">95 kg (209 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '96' ? 'selected' : ''); ?> value="96">96 kg (212 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '97' ? 'selected' : ''); ?>value="97">97 kg (214 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '98' ? 'selected' : ''); ?>value="98">98 kg (216 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '99' ? 'selected' : ''); ?>value="99">99 kg (218 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '100' ? 'selected' : ''); ?> value="100">100 kg (220 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '101' ? 'selected' : ''); ?> value="101">101 kg (223 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '102' ? 'selected' : ''); ?> value="102">102 kg (225 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '103' ? 'selected' : ''); ?> value="103">103 kg (227 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '104' ? 'selected' : ''); ?> value="104">104 kg (229 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '105' ? 'selected' : ''); ?> value="105">105 kg (231 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '106' ? 'selected' : ''); ?> value="106">106 kg (234 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '107' ? 'selected' : ''); ?> value="107">107 kg (236 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '108' ? 'selected' : ''); ?> value="108">108 kg (238 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '109' ? 'selected' : ''); ?> value="109">109 kg (240 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '110' ? 'selected' : ''); ?> value="110">110 kg (243 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '111' ? 'selected' : ''); ?> value="111">111 kg (245 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '112' ? 'selected' : ''); ?> value="112">112 kg (247 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '113' ? 'selected' : ''); ?> value="113">113 kg (249 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '114' ? 'selected' : ''); ?> value="114">114 kg (251 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '115' ? 'selected' : ''); ?> value="115">115 kg (254 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '116' ? 'selected' : ''); ?> value="116">116 kg (256 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '117' ? 'selected' : ''); ?> value="117">117 kg (258 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '118' ? 'selected' : ''); ?> value="118">118 kg (260 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '119' ? 'selected' : ''); ?> value="119">119 kg (262 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '120' ? 'selected' : ''); ?>value="120">120 kg (265 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '121' ? 'selected' : ''); ?> value="121">121 kg (267 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '122' ? 'selected' : ''); ?> value="122">122 kg (269 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '123' ? 'selected' : ''); ?> value="123">123 kg (271 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '124' ? 'selected' : ''); ?> value="124">124 kg (273 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '125' ? 'selected' : ''); ?> value="125">125 kg (276 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '126' ? 'selected' : ''); ?> value="126">126 kg (278 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '127' ? 'selected' : ''); ?> value="127">127 kg (280 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '128' ? 'selected' : ''); ?> value="128">128 kg (282 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '129' ? 'selected' : ''); ?> value="129">129 kg (284 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '130' ? 'selected' : ''); ?> value="130">130 kg (287 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '131' ? 'selected' : ''); ?> value="131">131 kg (289 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '132' ? 'selected' : ''); ?> value="132">132 kg (291 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '133' ? 'selected' : ''); ?> value="133">133 kg (293 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '134' ? 'selected' : ''); ?> value="134">134 kg (295 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '135' ? 'selected' : ''); ?> value="135">135 kg (298 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '136' ? 'selected' : ''); ?> value="136">136 kg (300 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '137' ? 'selected' : ''); ?> value="137">137 kg (302 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '138' ? 'selected' : ''); ?> value="138">138 kg (304 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '139' ? 'selected' : ''); ?> value="139">139 kg (306 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '140' ? 'selected' : ''); ?> value="140">140 kg (309 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '141' ? 'selected' : ''); ?> value="">141 kg (311 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '142' ? 'selected' : ''); ?> value="142">142 kg (313 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '143' ? 'selected' : ''); ?> value="143">143 kg (315 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '144' ? 'selected' : ''); ?> value="144">144 kg (317 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '145' ? 'selected' : ''); ?> value="145">145 kg (320 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '146' ? 'selected' : ''); ?> value="146">146 kg (322 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '147' ? 'selected' : ''); ?>value="147">147 kg (324 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '148' ? 'selected' : ''); ?> value="148">148 kg (326 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '149' ? 'selected' : ''); ?> value="149">149 kg (328 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '150' ? 'selected' : ''); ?>value="150">150 kg (331 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '151' ? 'selected' : ''); ?> value="151">151 kg (333 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '152' ? 'selected' : ''); ?> value="152">152 kg (335 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '153' ? 'selected' : ''); ?> value="153">153 kg (337 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '154' ? 'selected' : ''); ?> value="154">154 kg (340 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '155' ? 'selected' : ''); ?> value="155">155 kg (342 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '156' ? 'selected' : ''); ?> value="156">156 kg (344 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '157' ? 'selected' : ''); ?> value="157">157 kg (346 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '158' ? 'selected' : ''); ?> value="158">158 kg (348 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '159' ? 'selected' : ''); ?> value="159">159 kg (351 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '160' ? 'selected' : ''); ?> value="160">160 kg (353 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '161' ? 'selected' : ''); ?> value="161">161 kg (355 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '162' ? 'selected' : ''); ?> value="162">162 kg (357 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '163' ? 'selected' : ''); ?> value="163">163 kg (359 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '164' ? 'selected' : ''); ?> value="164">164 kg (362 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '165' ? 'selected' : ''); ?> value="165">165 kg (364 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '166' ? 'selected' : ''); ?> value="166">166 kg (366 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '167' ? 'selected' : ''); ?> value="167">167 kg (368 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '168' ? 'selected' : ''); ?> value="168">168 kg (370 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '169' ? 'selected' : ''); ?> value="169">169 kg (373 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '170' ? 'selected' : ''); ?> value="170">170 kg (375 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '171' ? 'selected' : ''); ?> value="171">171 kg (377 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '172' ? 'selected' : ''); ?> value="172">172 kg (379 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '173' ? 'selected' : ''); ?> value="173">173 kg (381 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '174' ? 'selected' : ''); ?> value="174">174 kg (384 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '175' ? 'selected' : ''); ?> value="175">175 kg (386 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '176' ? 'selected' : ''); ?> value="176">176 kg (388 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '177' ? 'selected' : ''); ?> value="177">177 kg (390 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '178' ? 'selected' : ''); ?> value="178">178 kg (392 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '179' ? 'selected' : ''); ?> value="179">179 kg (395 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '180' ? 'selected' : ''); ?> value="180">180 kg (397 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '181' ? 'selected' : ''); ?> value="181">181 kg (399 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '182' ? 'selected' : ''); ?> value="182">182 kg (401 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '183' ? 'selected' : ''); ?> value="183">183 kg (403 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '184' ? 'selected' : ''); ?> value="184">184 kg (406 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '185' ? 'selected' : ''); ?> value="185">185 kg (408 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '186' ? 'selected' : ''); ?> value="186">186 kg (410 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '187' ? 'selected' : ''); ?> value="187">187 kg (412 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '188' ? 'selected' : ''); ?> value="188">188 kg (414 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '189' ? 'selected' : ''); ?> value="189">189 kg (417 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '190' ? 'selected' : ''); ?> value="190">190 kg (419 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '191' ? 'selected' : ''); ?> value="191">191 kg (421 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '192' ? 'selected' : ''); ?> value="192">192 kg (423 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '193' ? 'selected' : ''); ?> value="193">193 kg (425 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '194' ? 'selected' : ''); ?> value="194">194 kg (428 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '195' ? 'selected' : ''); ?> value="195">195 kg (430 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '196' ? 'selected' : ''); ?> value="196">196 kg (432 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '197' ? 'selected' : ''); ?> value="197">197 kg (434 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '198' ? 'selected' : ''); ?> value="198">198 kg (437 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '199' ? 'selected' : ''); ?> value="199">199 kg (439 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '200' ? 'selected' : ''); ?> value="200">200 kg (441 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '201' ? 'selected' : ''); ?> value="201">201 kg (443 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '202' ? 'selected' : ''); ?> value="202">202 kg (445 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '203' ? 'selected' : ''); ?> value="203">203 kg (448 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '204' ? 'selected' : ''); ?> value="204">204 kg (450 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '205' ? 'selected' : ''); ?> value="205">205 kg (452 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '206' ? 'selected' : ''); ?> value="206">206 kg (454 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '207' ? 'selected' : ''); ?> value="207">207 kg (456 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '208' ? 'selected' : ''); ?> value="208">208 kg (459 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '209' ? 'selected' : ''); ?> value="209">209 kg (461 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '210' ? 'selected' : ''); ?> value="210">210 kg (463 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '211' ? 'selected' : ''); ?> value="211">211 kg (465 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '212' ? 'selected' : ''); ?> value="212">212 kg (467 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '213' ? 'selected' : ''); ?> value="213">213 kg (470 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '214' ? 'selected' : ''); ?> value="214">214 kg (472 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '215' ? 'selected' : ''); ?> value="215">215 kg (474 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '216' ? 'selected' : ''); ?> value="216">216 kg (476 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '217' ? 'selected' : ''); ?> value="217">217 kg (478 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '218' ? 'selected' : ''); ?> value="218">218 kg (481 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '219' ? 'selected' : ''); ?> value="219">219 kg (483 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_min_weight) && $data[0]->match_min_weight == '220' ? 'selected' : ''); ?> value="220">220 kg (485 lb)</option>
                                
                        </select>
        </div>
        <div class="col-md-6">
            <p>Maximum weight</p>
            <select name="max_weight" class="form-control">
                        
                                
                            
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '40' ? 'selected' : ''); ?> value="40">40 kg (88 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '41' ? 'selected' : ''); ?> value="41">41 kg (90 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '42' ? 'selected' : ''); ?> value="42">42 kg (93 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '43' ? 'selected' : ''); ?> value="43">43 kg (95 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '44' ? 'selected' : ''); ?> value="44">44 kg (97 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '45' ? 'selected' : ''); ?> value="45">45 kg (99 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '46' ? 'selected' : ''); ?> value="46">46 kg (101 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '47' ? 'selected' : ''); ?> value="47">47 kg (104 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '48' ? 'selected' : ''); ?> value="48">48 kg (106 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '49' ? 'selected' : ''); ?> value="49">49 kg (108 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '50' ? 'selected' : ''); ?> value="50">50 kg (110 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '51' ? 'selected' : ''); ?> value="51">51 kg (112 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '52' ? 'selected' : ''); ?> value="52">52 kg (115 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '53' ? 'selected' : ''); ?> value="53">53 kg (117 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '54' ? 'selected' : ''); ?> value="54">54 kg (119 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '55' ? 'selected' : ''); ?> value="55">55 kg (121 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '56' ? 'selected' : ''); ?> value="56">56 kg (123 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '57' ? 'selected' : ''); ?> value="57">57 kg (126 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '58' ? 'selected' : ''); ?> value="58">58 kg (128 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '59' ? 'selected' : ''); ?> value="59">59 kg (130 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '60' ? 'selected' : ''); ?> value="60">60 kg (132 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '61' ? 'selected' : ''); ?> value="61">61 kg (134 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '62' ? 'selected' : ''); ?> value="62">62 kg (137 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '63' ? 'selected' : ''); ?>value="63">63 kg (139 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '64' ? 'selected' : ''); ?> value="64">64 kg (141 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '65' ? 'selected' : ''); ?> value="65">65 kg (143 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '66' ? 'selected' : ''); ?> value="66">66 kg (146 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '67' ? 'selected' : ''); ?> value="67">67 kg (148 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '68' ? 'selected' : ''); ?> value="68">68 kg (150 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '69' ? 'selected' : ''); ?> value="69">69 kg (152 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '70' ? 'selected' : ''); ?> value="70">70 kg (154 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '71' ? 'selected' : ''); ?> value="71">71 kg (157 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '72' ? 'selected' : ''); ?> value="72">72 kg (159 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '73' ? 'selected' : ''); ?> value="73">73 kg (161 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '74' ? 'selected' : ''); ?> value="74">74 kg (163 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '75' ? 'selected' : ''); ?> value="75">75 kg (165 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '76' ? 'selected' : ''); ?> value="76">76 kg (168 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '77' ? 'selected' : ''); ?> value="77">77 kg (170 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '78' ? 'selected' : ''); ?> value="78">78 kg (172 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '79' ? 'selected' : ''); ?> value="79">79 kg (174 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '80' ? 'selected' : ''); ?> value="80">80 kg (176 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '81' ? 'selected' : ''); ?> value="81">81 kg (179 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '82' ? 'selected' : ''); ?> value="82">82 kg (181 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '83' ? 'selected' : ''); ?> value="83">83 kg (183 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '84' ? 'selected' : ''); ?> value="84">84 kg (185 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '85' ? 'selected' : ''); ?> value="85">85 kg (187 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '86' ? 'selected' : ''); ?> value="86">86 kg (190 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '87' ? 'selected' : ''); ?> value="87">87 kg (192 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '88' ? 'selected' : ''); ?>value="88">88 kg (194 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '89' ? 'selected' : ''); ?> value="89">89 kg (196 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '90' ? 'selected' : ''); ?> value="90">90 kg (198 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '91' ? 'selected' : ''); ?> value="91">91 kg (201 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '92' ? 'selected' : ''); ?> value="92">92 kg (203 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '93' ? 'selected' : ''); ?> value="93">93 kg (205 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '94' ? 'selected' : ''); ?> value="94">94 kg (207 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '95' ? 'selected' : ''); ?>value="95">95 kg (209 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '96' ? 'selected' : ''); ?> value="96">96 kg (212 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '97' ? 'selected' : ''); ?>value="97">97 kg (214 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '98' ? 'selected' : ''); ?>value="98">98 kg (216 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '99' ? 'selected' : ''); ?>value="99">99 kg (218 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '100' ? 'selected' : ''); ?> value="100">100 kg (220 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '101' ? 'selected' : ''); ?> value="101">101 kg (223 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '102' ? 'selected' : ''); ?> value="102">102 kg (225 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '103' ? 'selected' : ''); ?> value="103">103 kg (227 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '104' ? 'selected' : ''); ?> value="104">104 kg (229 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '105' ? 'selected' : ''); ?> value="105">105 kg (231 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '106' ? 'selected' : ''); ?> value="106">106 kg (234 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '107' ? 'selected' : ''); ?> value="107">107 kg (236 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '108' ? 'selected' : ''); ?> value="108">108 kg (238 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '109' ? 'selected' : ''); ?> value="109">109 kg (240 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '110' ? 'selected' : ''); ?> value="110">110 kg (243 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '111' ? 'selected' : ''); ?> value="111">111 kg (245 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '112' ? 'selected' : ''); ?> value="112">112 kg (247 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '113' ? 'selected' : ''); ?> value="113">113 kg (249 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '114' ? 'selected' : ''); ?> value="114">114 kg (251 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '115' ? 'selected' : ''); ?> value="115">115 kg (254 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '116' ? 'selected' : ''); ?> value="116">116 kg (256 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '117' ? 'selected' : ''); ?> value="117">117 kg (258 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '118' ? 'selected' : ''); ?> value="118">118 kg (260 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '119' ? 'selected' : ''); ?> value="119">119 kg (262 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '120' ? 'selected' : ''); ?>value="120">120 kg (265 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '121' ? 'selected' : ''); ?> value="121">121 kg (267 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '122' ? 'selected' : ''); ?> value="122">122 kg (269 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '123' ? 'selected' : ''); ?> value="123">123 kg (271 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '124' ? 'selected' : ''); ?> value="124">124 kg (273 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '125' ? 'selected' : ''); ?> value="125">125 kg (276 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '126' ? 'selected' : ''); ?> value="126">126 kg (278 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '127' ? 'selected' : ''); ?> value="127">127 kg (280 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '128' ? 'selected' : ''); ?> value="128">128 kg (282 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '129' ? 'selected' : ''); ?> value="129">129 kg (284 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '130' ? 'selected' : ''); ?> value="130">130 kg (287 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '131' ? 'selected' : ''); ?> value="131">131 kg (289 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '132' ? 'selected' : ''); ?> value="132">132 kg (291 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '133' ? 'selected' : ''); ?> value="133">133 kg (293 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '134' ? 'selected' : ''); ?> value="134">134 kg (295 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '135' ? 'selected' : ''); ?> value="135">135 kg (298 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '136' ? 'selected' : ''); ?> value="136">136 kg (300 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '137' ? 'selected' : ''); ?> value="137">137 kg (302 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '138' ? 'selected' : ''); ?> value="138">138 kg (304 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '139' ? 'selected' : ''); ?> value="139">139 kg (306 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '140' ? 'selected' : ''); ?> value="140">140 kg (309 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '141' ? 'selected' : ''); ?> value="">141 kg (311 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '142' ? 'selected' : ''); ?> value="142">142 kg (313 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '143' ? 'selected' : ''); ?> value="143">143 kg (315 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '144' ? 'selected' : ''); ?> value="144">144 kg (317 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '145' ? 'selected' : ''); ?> value="145">145 kg (320 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '146' ? 'selected' : ''); ?> value="146">146 kg (322 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '147' ? 'selected' : ''); ?>value="147">147 kg (324 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '148' ? 'selected' : ''); ?> value="148">148 kg (326 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '149' ? 'selected' : ''); ?> value="149">149 kg (328 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '150' ? 'selected' : ''); ?>value="150">150 kg (331 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '151' ? 'selected' : ''); ?> value="151">151 kg (333 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '152' ? 'selected' : ''); ?> value="152">152 kg (335 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '153' ? 'selected' : ''); ?> value="153">153 kg (337 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '154' ? 'selected' : ''); ?> value="154">154 kg (340 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '155' ? 'selected' : ''); ?> value="155">155 kg (342 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '156' ? 'selected' : ''); ?> value="156">156 kg (344 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '157' ? 'selected' : ''); ?> value="157">157 kg (346 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '158' ? 'selected' : ''); ?> value="158">158 kg (348 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '159' ? 'selected' : ''); ?> value="159">159 kg (351 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '160' ? 'selected' : ''); ?> value="160">160 kg (353 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '161' ? 'selected' : ''); ?> value="161">161 kg (355 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '162' ? 'selected' : ''); ?> value="162">162 kg (357 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '163' ? 'selected' : ''); ?> value="163">163 kg (359 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '164' ? 'selected' : ''); ?> value="164">164 kg (362 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '165' ? 'selected' : ''); ?> value="165">165 kg (364 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '166' ? 'selected' : ''); ?> value="166">166 kg (366 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '167' ? 'selected' : ''); ?> value="167">167 kg (368 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '168' ? 'selected' : ''); ?> value="168">168 kg (370 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '169' ? 'selected' : ''); ?> value="169">169 kg (373 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '170' ? 'selected' : ''); ?> value="170">170 kg (375 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '171' ? 'selected' : ''); ?> value="171">171 kg (377 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '172' ? 'selected' : ''); ?> value="172">172 kg (379 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '173' ? 'selected' : ''); ?> value="173">173 kg (381 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '174' ? 'selected' : ''); ?> value="174">174 kg (384 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '175' ? 'selected' : ''); ?> value="175">175 kg (386 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '176' ? 'selected' : ''); ?> value="176">176 kg (388 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '177' ? 'selected' : ''); ?> value="177">177 kg (390 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '178' ? 'selected' : ''); ?> value="178">178 kg (392 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '179' ? 'selected' : ''); ?> value="179">179 kg (395 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '180' ? 'selected' : ''); ?> value="180">180 kg (397 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '181' ? 'selected' : ''); ?> value="181">181 kg (399 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '182' ? 'selected' : ''); ?> value="182">182 kg (401 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '183' ? 'selected' : ''); ?> value="183">183 kg (403 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '184' ? 'selected' : ''); ?> value="184">184 kg (406 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '185' ? 'selected' : ''); ?> value="185">185 kg (408 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '186' ? 'selected' : ''); ?> value="186">186 kg (410 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '187' ? 'selected' : ''); ?> value="187">187 kg (412 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '188' ? 'selected' : ''); ?> value="188">188 kg (414 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '189' ? 'selected' : ''); ?> value="189">189 kg (417 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '190' ? 'selected' : ''); ?> value="190">190 kg (419 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '191' ? 'selected' : ''); ?> value="191">191 kg (421 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '192' ? 'selected' : ''); ?> value="192">192 kg (423 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '193' ? 'selected' : ''); ?> value="193">193 kg (425 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '194' ? 'selected' : ''); ?> value="194">194 kg (428 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '195' ? 'selected' : ''); ?> value="195">195 kg (430 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '196' ? 'selected' : ''); ?> value="196">196 kg (432 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '197' ? 'selected' : ''); ?> value="197">197 kg (434 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '198' ? 'selected' : ''); ?> value="198">198 kg (437 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '199' ? 'selected' : ''); ?> value="199">199 kg (439 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '200' ? 'selected' : ''); ?> value="200">200 kg (441 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '201' ? 'selected' : ''); ?> value="201">201 kg (443 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '202' ? 'selected' : ''); ?> value="202">202 kg (445 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '203' ? 'selected' : ''); ?> value="203">203 kg (448 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '204' ? 'selected' : ''); ?> value="204">204 kg (450 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '205' ? 'selected' : ''); ?> value="205">205 kg (452 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '206' ? 'selected' : ''); ?> value="206">206 kg (454 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '207' ? 'selected' : ''); ?> value="207">207 kg (456 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '208' ? 'selected' : ''); ?> value="208">208 kg (459 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '209' ? 'selected' : ''); ?> value="209">209 kg (461 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '210' ? 'selected' : ''); ?> value="210">210 kg (463 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '211' ? 'selected' : ''); ?> value="211">211 kg (465 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '212' ? 'selected' : ''); ?> value="212">212 kg (467 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '213' ? 'selected' : ''); ?> value="213">213 kg (470 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '214' ? 'selected' : ''); ?> value="214">214 kg (472 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '215' ? 'selected' : ''); ?> value="215">215 kg (474 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '216' ? 'selected' : ''); ?> value="216">216 kg (476 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '217' ? 'selected' : ''); ?> value="217">217 kg (478 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '218' ? 'selected' : ''); ?> value="218">218 kg (481 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '219' ? 'selected' : ''); ?> value="219">219 kg (483 lb)</option>
                                
                                <option <?php echo (isset($data[0]->match_max_weight) && $data[0]->match_max_weight == '220' ? 'selected' : ''); ?> value="220" selected>220 kg (485 lb)</option>
                                
                        </select>
        </div>

    </div>
    <div class="row" style="margin-top: 10px;">

        <div class="col-md-12">
          <hr>
            <div class="form-group">
            <p>Body type:</p>
            <input type="checkbox" <?php echo (isset($data[0]->match_body_type) && in_array('All', explode(',', $data[0]->match_body_type)) ? 'checked' : ''); ?> name="bdytyp[]" value="All" selected> Any
            <input type="checkbox" <?php echo (isset($data[0]->match_body_type) && in_array('Petite', explode(',', $data[0]->match_body_type)) ? 'checked' : ''); ?> name="bdytyp[]" value="Petite"> Petite
    <input type="checkbox" <?php echo (isset($data[0]->match_body_type) && in_array('Slim', explode(',', $data[0]->match_body_type)) ? 'checked' : ''); ?> name="bdytyp[]" value="Slim"> Slim
    <input type="checkbox" <?php echo (isset($data[0]->match_body_type) && in_array('Athletic', explode(',', $data[0]->match_body_type)) ? 'checked' : ''); ?> name="bdytyp[]" value="Athletic"> Athletic
    <input type="checkbox"<?php echo (isset($data[0]->match_body_type) && in_array('Average', explode(',', $data[0]->match_body_type)) ? 'checked' : ''); ?> name="bdytyp[]" value="Average"> Average
        <input type="checkbox" <?php echo (isset($data[0]->match_body_type) && in_array('Few Extra Pounds', explode(',', $data[0]->match_body_type)) ? 'checked' : ''); ?> name="bdytyp[]" value="Few Extra Pounds"> Few Extra Pounds
    <input type="checkbox" <?php echo (isset($data[0]->match_body_type) && in_array('Full Figured', explode(',', $data[0]->match_body_type)) ? 'checked' : ''); ?> name="bdytyp[]" value="Full Figured"> Full Figured
    <input type="checkbox" <?php echo (isset($data[0]->match_body_type) && in_array('Large and Lovely', explode(',', $data[0]->match_body_type)) ? 'checked' : ''); ?> name="bdytyp[]" value="Large and Lovely"> Large and Lovely
          </div>  
          <hr>

          <div class="form-group">
    <p>Their ethnicity is mostly:</p>
    <input type="checkbox" <?php echo (isset($data[0]->match_ethnicity) && in_array('All', explode(',', $data[0]->match_ethnicity)) ? 'checked' : ''); ?> name="ethnicity[]" value="All" selected> Any
    <input type="checkbox" <?php echo (isset($data[0]->match_ethnicity) && in_array('Arab (Middle Eastern)', explode(',', $data[0]->match_ethnicity)) ? 'checked' : ''); ?> name="ethnicity[]" value="Arab (Middle Eastern)"> Arab (Middle Eastern)
    <input type="checkbox" <?php echo (isset($data[0]->match_ethnicity) && in_array('Asian', explode(',', $data[0]->match_ethnicity)) ? 'checked' : ''); ?> name="ethnicity[]" value="Asian"> Asian
    <input type="checkbox" <?php echo (isset($data[0]->match_ethnicity) && in_array('Black', explode(',', $data[0]->match_ethnicity)) ? 'checked' : ''); ?> name="ethnicity[]" value="Black"> Black
    <input type="checkbox" <?php echo (isset($data[0]->match_ethnicity) && in_array('Caucasian (White)', explode(',', $data[0]->match_ethnicity)) ? 'checked' : ''); ?> name="ethnicity[]" value="Caucasian (White)"> Caucasian (White)
</div>
<div class="form-group">
    <input type="checkbox" <?php echo (isset($data[0]->match_ethnicity) && in_array('Hispanic / Latino', explode(',', $data[0]->match_ethnicity)) ? 'checked' : ''); ?> name="ethnicity[]" value="Hispanic / Latino"> Hispanic / Latino
    <input type="checkbox" <?php echo (isset($data[0]->match_ethnicity) && in_array('Indian', explode(',', $data[0]->match_ethnicity)) ? 'checked' : ''); ?> name="ethnicity[]" value="Indian"> <span>Indian</span>
    <input type="checkbox" <?php echo (isset($data[0]->match_ethnicity) && in_array('Mixed', explode(',', $data[0]->match_ethnicity)) ? 'checked' : ''); ?> name="ethnicity[]" value="Mixed"> Mixed
    <input type="checkbox" <?php echo (isset($data[0]->match_ethnicity) && in_array('Pacific Islander', explode(',', $data[0]->match_ethnicity)) ? 'checked' : ''); ?> name="ethnicity[]" value="Pacific Islander"> Pacific Islander
</div>
<div class="form-group">
    <input type="checkbox" <?php echo (isset($data[0]->match_ethnicity) && in_array('Other', explode(',', $data[0]->match_ethnicity)) ? 'checked' : ''); ?> name="ethnicity[]" value="Other"> Other
    <input type="checkbox" <?php echo (isset($data[0]->match_ethnicity) && in_array('Prefer not to say', explode(',', $data[0]->match_ethnicity)) ? 'checked' : ''); ?> name="ethnicity[]" value="Prefer not to say"> Prefer not to say
</div>
<hr>
    <div class="form-group">
        <p>Body art:</p>
        <input type="checkbox" <?php echo (isset($data[0]->match_body_art) && in_array('All', explode(',', $data[0]->match_body_art)) ? 'checked' : ''); ?> name="bdyart[]" value="All" selected> Any
    <input type="checkbox" <?php echo (isset($data[0]->match_body_art) && in_array('Branding', explode(',', $data[0]->match_body_art)) ? 'checked' : ''); ?> name="bdyart[]" value="Branding"> Branding
    <input type="checkbox" <?php echo (isset($data[0]->match_body_art) && in_array('Earrings', explode(',', $data[0]->match_body_art)) ? 'checked' : ''); ?> name="bdyart[]" value="Earrings"> Earrings
    <input type="checkbox" <?php echo (isset($data[0]->match_body_art) && in_array('Piercing', explode(',', $data[0]->match_body_art)) ? 'checked' : ''); ?> name="bdyart[]" value="Piercing"> Piercing
    <input type="checkbox" <?php echo (isset($data[0]->match_body_art) && in_array('Tattoo', explode(',', $data[0]->match_body_art)) ? 'checked' : ''); ?> name="bdyart[]" value="Tattoo"> Tattoo
</div>
<div class="form-group">
    <input type="checkbox" <?php echo (isset($data[0]->match_body_art) && in_array('Other', explode(',', $data[0]->match_body_art)) ? 'checked' : ''); ?> name="bdyart[]" value="Other"> Other
    <input type="checkbox" <?php echo (isset($data[0]->match_body_art) && in_array('None', explode(',', $data[0]->match_body_art)) ? 'checked' : ''); ?> name="bdyart[]" value="None"> None
    <input type="checkbox" <?php echo (isset($data[0]->match_body_art) && in_array('Prefer not to say', explode(',', $data[0]->match_body_art)) ? 'checked' : ''); ?> name="bdyart[]" value="Prefer not to say"> Prefer not to say
</div>
<hr>

<div class="form-group">
    <p>Consider their appearance as:</p>
    <input type="checkbox" <?php echo (isset($data[0]->match_appearance) && in_array('All', explode(',', $data[0]->match_appearance)) ? 'checked' : ''); ?> name="apprnce[]" value="All" selected> Any
    <input type="checkbox" <?php echo (isset($data[0]->match_appearance) && in_array('Below average', explode(',', $data[0]->match_appearance)) ? 'checked' : ''); ?> name="apprnce[]" value="Below average"> Below average
    <input type="checkbox" <?php echo (isset($data[0]->match_appearance) && in_array('Average', explode(',', $data[0]->match_appearance)) ? 'checked' : ''); ?> name="apprnce[]" value="Average"> Average
    <input type="checkbox" <?php echo (isset($data[0]->match_appearance) && in_array('Attractive', explode(',', $data[0]->match_appearance)) ? 'checked' : ''); ?> name="apprnce[]" value="Attractive"> Attractive
    <input type="checkbox" <?php echo (isset($data[0]->match_appearance) && in_array('Very attractive', explode(',', $data[0]->match_appearance)) ? 'checked' : ''); ?> name="apprnce[]" value="Very attractive"> Very attractive
</div>
<hr>

<h4>Their Lifestyle:</h4>

<div class="form-group">
    <p>Do They drink?</p>
    <input type="checkbox" <?php echo (isset($data[0]->match_drink) && in_array('All', explode(',', $data[0]->match_drink)) ? 'checked' : ''); ?> name="drink[]" value="All" selected> Any
    <input type="checkbox" <?php echo (isset($data[0]->match_drink) && in_array('Do drink', explode(',', $data[0]->match_drink)) ? 'checked' : ''); ?> name="drink[]" value="Do drink"> Do drink
    <input type="checkbox" <?php echo (isset($data[0]->match_drink) && in_array('Dont drink', explode(',', $data[0]->match_drink)) ? 'checked' : ''); ?> name="drink[]" value="Dont drink"> Don't drink
    <input type="checkbox" <?php echo (isset($data[0]->match_drink) && in_array('Occasionally drink', explode(',', $data[0]->match_drink)) ? 'checked' : ''); ?> name="drink[]" value="Occasionally drink"> Occasionally drink
</div>
<hr>

<div class="form-group">
    <p>Do they smoke?</p>
    <input type="checkbox" <?php echo (isset($data[0]->match_smoke) && in_array('All', explode(',', $data[0]->match_smoke)) ? 'checked' : ''); ?> name="smoke[]" value="All" selected> Any
    <input type="checkbox" <?php echo (isset($data[0]->match_smoke) && in_array('Do smoke', explode(',', $data[0]->match_smoke)) ? 'checked' : ''); ?> name="smoke[]" value="Do smoke"> Do smoke
    <input type="checkbox" <?php echo (isset($data[0]->match_smoke) && in_array('Dont smoke', explode(',', $data[0]->match_smoke)) ? 'checked' : ''); ?> name="smoke[]" value="Dont smoke"> Don't smoke
    <input type="checkbox" <?php echo (isset($data[0]->match_smoke) && in_array('Occasionally smoke', explode(',', $data[0]->match_smoke)) ? 'checked' : ''); ?> name="smoke[]" value="Occasionally smoke"> Occasionally smoke
</div>
<hr>

<div class="form-group">
    <p>Marital Status:</p>
    <input type="checkbox" <?php echo (isset($data[0]->match_marital_status) && in_array('All', explode(',', $data[0]->match_marital_status)) ? 'checked' : ''); ?> name="rltnshp[]" value="All" selected> Any
    <input type="checkbox" <?php echo (isset($data[0]->match_marital_status) && in_array('Single', explode(',', $data[0]->match_marital_status)) ? 'checked' : ''); ?> name="rltnshp[]" value="Single"> Single
    <input type="checkbox" <?php echo (isset($data[0]->match_marital_status) && in_array('Separated', explode(',', $data[0]->match_marital_status)) ? 'checked' : ''); ?> name="rltnshp[]" value="Separated"> Separated
    <input type="checkbox" <?php echo (isset($data[0]->match_marital_status) && in_array('Widowed', explode(',', $data[0]->match_marital_status)) ? 'checked' : ''); ?> name="rltnshp[]" value="Widowed"> Widowed
</div>
<div class="form-group">
    <input type="checkbox" <?php echo (isset($data[0]->match_marital_status) && in_array('Divorced', explode(',', $data[0]->match_marital_status)) ? 'checked' : ''); ?> name="rltnshp[]" value="Divorced"> Divorced
    <input type="checkbox" <?php echo (isset($data[0]->match_marital_status) && in_array('Other', explode(',', $data[0]->match_marital_status)) ? 'checked' : ''); ?> name="rltnshp[]" value="Other"> Other
    <input type="checkbox" <?php echo (isset($data[0]->match_marital_status) && in_array('Prefer not to say', explode(',', $data[0]->match_marital_status)) ? 'checked' : ''); ?> name="rltnshp[]" value="Prefer not to say"> Prefer not to say
</div>
<hr>

<div class="form-group">
    <p>Occupation:</p>
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('All', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="All" selected> Any
     <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Administrative / Secretarial / Clerical', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Administrative / Secretarial / Clerical"> Administrative / Secretarial / Clerical
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Advertising / Media', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Advertising / Media"> Advertising / Media
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Artistic / Creative / Performance', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Artistic / Creative / Performance"> Artistic / Creative / Performance
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Construction / Trades', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Construction / Trades"> Construction / Trades
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Domestic Helper', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Domestic Helper"> Domestic Helper
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('education / Academic', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="education / Academic"> education / Academic
</div>

<div class="form-group">
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Entertainment / Media', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Entertainment / Media"> Entertainment / Media
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Executive / Management / HR', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Executive / Management / HR"> Executive / Management / HR
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Farming / Agriculture', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Farming / Agriculture"> Farming / Agriculture
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Finance / Banking / Real Estate', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Finance / Banking / Real Estate"> Finance / Banking / Real Estate
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Fire / law enforcement / security', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Fire / law enforcement / security"> Fire / law enforcement / security
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Hair Dresser / Personal Grooming', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Hair Dresser / Personal Grooming"> Hair Dresser / Personal Grooming
</div>

<div class="form-group">
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('IT / Communications', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="IT / Communications"> IT / Communications
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Laborer / Manufacturing', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Laborer / Manufacturing"> Laborer / Manufacturing
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Legal', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Legal"> Legal
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Medical / Dental / Veterinary', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Medical / Dental / Veterinary"> Medical / Dental / Veterinary
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Military', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Military"> Military
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Nanny / Child care', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Nanny / Child care"> Nanny / Child care
</div>

<div class="form-group">
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('No occupation / Stay at home', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="No occupation / Stay at home"> No occupation / Stay at home
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Non-profit / clergy / social services', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Non-profit / clergy / social services"> Non-profit / clergy / social services
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Political / Govt / Civil Service', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Political / Govt / Civil Service"> Political / Govt / Civil Service
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Retail / Food services', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Retail / Food services"> Retail / Food services
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Retired', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Retired"> Retired
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Sales / Marketing', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Sales / Marketing"> Sales / Marketing
</div>

<div class="form-group">
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Self Employed', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Self Employed"> Self Employed
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Sports / recreation', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Sports / recreation"> Sports / recreation
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Student', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Student"> Student
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Technical / Science / Engineering', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Technical / Science / Engineering"> Technical / Science / Engineering
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Transportation', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Transportation"> Transportation
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Travel / Hospitality', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Travel / Hospitality"> Travel / Hospitality
</div>

<div class="form-group">
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Unemployed', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Unemployed"> Unemployed
    <input type="checkbox" <?php echo (isset($data[0]->match_occupation) && in_array('Other', explode(',', $data[0]->match_occupation)) ? 'checked' : ''); ?> name="occptn[]" value="Other"> Other
</div>
<hr>

<div class="form-group">
    <p>Employment status:</p>
    <input type="checkbox" <?php echo (isset($data[0]->match_emp_status) && in_array('All', explode(',', $data[0]->match_emp_status)) ? 'checked' : ''); ?> name="empstatus[]" value="All" selected> Any
    <input type="checkbox" <?php echo (isset($data[0]->match_emp_status) && in_array('Student', explode(',', $data[0]->match_emp_status)) ? 'checked' : ''); ?> name="empstatus[]" value="Student"> Student
    <input type="checkbox" <?php echo (isset($data[0]->match_emp_status) && in_array('Part Time', explode(',', $data[0]->match_emp_status)) ? 'checked' : ''); ?> name="empstatus[]" value="Part Time"> Part Time
    <input type="checkbox" <?php echo (isset($data[0]->match_emp_status) && in_array('Full Time', explode(',', $data[0]->match_emp_status)) ? 'checked' : ''); ?> name="empstatus[]" value="Full Time"> Full Time
    <input type="checkbox" <?php echo (isset($data[0]->match_emp_status) && in_array('Homemaker', explode(',', $data[0]->match_emp_status)) ? 'checked' : ''); ?> name="empstatus[]" value="Homemaker"> Homemaker
    <input type="checkbox" <?php echo (isset($data[0]->match_emp_status) && in_array('Retired', explode(',', $data[0]->match_emp_status)) ? 'checked' : ''); ?> name="empstatus[]" value="Retired"> Retired
    <input type="checkbox" <?php echo (isset($data[0]->match_emp_status) && in_array('Not Employed', explode(',', $data[0]->match_emp_status)) ? 'checked' : ''); ?> name="empstatus[]" value="Not Employed"> Not Employed
</div>

<div class="form-group">
    <input type="checkbox" <?php echo (isset($data[0]->match_emp_status) && in_array('Other', explode(',', $data[0]->match_emp_status)) ? 'checked' : ''); ?> name="empstatus[]" value="Other"> Other
    <input type="checkbox" <?php echo (isset($data[0]->match_emp_status) && in_array('Prefer not to say', explode(',', $data[0]->match_emp_status)) ? 'checked' : ''); ?> name="empstatus[]" value="Prefer not to say"> Prefer not to say
</div>
<hr>

<div class="form-group">
    <p>Annual Income:</p>
    <input type="text" class="form-control" name="income" value="<?php echo (isset($data[0]->match_income) ? $data[0]->match_income : ''); ?>">
</div>
<hr>

<h4>Your Background / Cultural Values</h4>
<div class="form-group">
    <p>Nationality:</p>
    <input type="text" class="form-control" name="ntnality" value="<?php echo (isset($data[0]->match_nationality) ? $data[0]->match_nationality : ''); ?>">
</div>
<hr>

<div class="form-group">
    <p>education:</p>
    <input type="checkbox" <?php echo (isset($data[0]->match_education) && in_array('All', explode(',', $data[0]->match_education)) ? 'checked' : ''); ?> name="education[]" value="All" selected> Any
    <input type="checkbox" <?php echo (isset($data[0]->match_education) && in_array('Primary (Elementary) School', explode(',', $data[0]->match_education)) ? 'checked' : ''); ?> name="education[]" value="Primary (Elementary) School"> Primary (Elementary) School
    <input type="checkbox" <?php echo (isset($data[0]->match_education) && in_array('Middle School / Junior High', explode(',', $data[0]->match_education)) ? 'checked' : ''); ?> name="education[]" value="Middle School / Junior High"> Middle School / Junior High
    <input type="checkbox" <?php echo (isset($data[0]->match_education) && in_array('High School', explode(',', $data[0]->match_education)) ? 'checked' : ''); ?> name="education[]" value="High School"> High School
    <input type="checkbox" <?php echo (isset($data[0]->match_education) && in_array('Vocational College', explode(',', $data[0]->match_education)) ? 'checked' : ''); ?> name="education[]" value="Vocational College"> Vocational College
    <input type="checkbox" <?php echo (isset($data[0]->match_education) && in_array('Bachelors Degree', explode(',', $data[0]->match_education)) ? 'checked' : ''); ?> name="education[]" value="Bachelors Degree"> Bachelors Degree
    <input type="checkbox" <?php echo (isset($data[0]->match_education) && in_array('Masters Degree', explode(',', $data[0]->match_education)) ? 'checked' : ''); ?> name="education[]" value="Masters Degree"> Masters Degree
</div>

<div class="form-group">
 <input type="checkbox" <?php echo (isset($data[0]->match_education) && in_array('PhD or Doctorate', explode(',', $data[0]->match_education)) ? 'checked' : ''); ?> name="education[]" value="PhD or Doctorate"> PhD or Doctorate
</div>
<hr>

<div class="form-group">
    <p>Langauges Spoken:</p>
    <input type="text" class="form-control" name="langspoke" value="<?php echo (isset($data[0]->match_lang_spoken) ? $data[0]->match_lang_spoken : ''); ?>">
</div>
<hr>

<div class="form-group">
    <p>English language ability:</p>
    <input type="checkbox" <?php echo (isset($data[0]->match_eng_ability) && in_array('All', explode(',', $data[0]->match_eng_ability)) ? 'checked' : ''); ?> name="engablty[]" value="All" selected> Any
    <input type="checkbox" <?php echo (isset($data[0]->match_eng_ability) && in_array('None', explode(',', $data[0]->match_eng_ability)) ? 'checked' : ''); ?> name="engablty[]" value="None"> None
    <input type="checkbox" <?php echo (isset($data[0]->match_eng_ability) && in_array('Some', explode(',', $data[0]->match_eng_ability)) ? 'checked' : ''); ?> name="engablty[]" value="Some"> Some
    <input type="checkbox" <?php echo (isset($data[0]->match_eng_ability) && in_array('Good', explode(',', $data[0]->match_eng_ability)) ? 'checked' : ''); ?> name="engablty[]" value="Good"> Good
    <input type="checkbox" <?php echo (isset($data[0]->match_eng_ability) && in_array('Very Good', explode(',', $data[0]->match_eng_ability)) ? 'checked' : ''); ?> name="engablty[]" value="Very Good"> Very Good
    <input type="checkbox" <?php echo (isset($data[0]->match_eng_ability) && in_array('Fluent', explode(',', $data[0]->match_eng_ability)) ? 'checked' : ''); ?> name="engablty[]" value="Fluent"> Fluent
</div>
<hr>

<div class="form-group">
    <p>Religion:</p>
    <select name="religion" class="form-control">
                        
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Any' ? 'selected' : ''); ?> value="All">Any</option>
                            
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Baháí' ? 'selected' : ''); ?> >Baháí</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Buddhist' ? 'selected' : ''); ?> >Buddhist</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Christian - Catholic' ? 'selected' : ''); ?> >Christian - Catholic</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Christian - Other' ? 'selected' : ''); ?> >Christian - Other</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Christian - Protestant' ? 'selected' : ''); ?> >Christian - Protestant</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Hindu' ? 'selected' : ''); ?> >Hindu</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Islam' ? 'selected' : ''); ?> >Islam</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Jainism' ? 'selected' : ''); ?> >Jainism</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Jewish' ? 'selected' : ''); ?> >Jewish</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Parsi' ? 'selected' : ''); ?> >Parsi</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Shintoism' ? 'selected' : ''); ?> >Shintoism</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Sikhism' ? 'selected' : ''); ?> >Sikhism</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Taoism' ? 'selected' : ''); ?> >Taoism</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Other' ? 'selected' : ''); ?> >Other</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'No religion' ? 'selected' : ''); ?> >No religion</option>
                                
                                <option <?php echo (isset($data[0]->match_religion) && $data[0]->match_religion == 'Prefer not to say' ? 'selected' : ''); ?> >Prefer not to say</option>
                                
                        </select>
</div>
<hr>

<div class="form-group">
    <p>Religious Values:</p>
    <input type="checkbox" <?php echo (isset($data[0]->match_religious_values) && in_array('All', explode(',', $data[0]->match_religious_values)) ? 'checked' : ''); ?> name="rlgsval[]" value="All" selected> Any
    <input type="checkbox" <?php echo (isset($data[0]->match_religious_values) && in_array('Not Religious', explode(',', $data[0]->match_religious_values)) ? 'checked' : ''); ?> name="rlgsval[]" value="Not Religious"> Not Religious
    <input type="checkbox" <?php echo (isset($data[0]->match_religious_values) && in_array('Religious', explode(',', $data[0]->match_religious_values)) ? 'checked' : ''); ?> name="rlgsval[]" value="Religious"> Religious
    <input type="checkbox" <?php echo (isset($data[0]->match_religious_values) && in_array('Very Religious', explode(',', $data[0]->match_religious_values)) ? 'checked' : ''); ?> name="rlgsval[]" value="Very Religious"> Very Religious
</div>
<hr>
 
<div class="form-group">
    <p>Star sign:</p>
    <input type="checkbox" <?php echo (isset($data[0]->match_star_sign) && in_array('All', explode(',', $data[0]->match_star_sign)) ? 'checked' : ''); ?> name="starsign[]" value="All" selected> Any
    <input type="checkbox" <?php echo (isset($data[0]->match_star_sign) && in_array('Aquarius', explode(',', $data[0]->match_star_sign)) ? 'checked' : ''); ?> name="starsign[]" value="Aquarius"> Aquarius
    <input type="checkbox" <?php echo (isset($data[0]->match_star_sign) && in_array('Aries', explode(',', $data[0]->match_star_sign)) ? 'checked' : ''); ?> name="starsign[]" value="Aries"> Aries
    <input type="checkbox" <?php echo (isset($data[0]->match_star_sign) && in_array('Cancer', explode(',', $data[0]->match_star_sign)) ? 'checked' : ''); ?> name="starsign[]" value="Cancer"> Cancer
    <input type="checkbox" <?php echo (isset($data[0]->match_star_sign) && in_array('Capricorn', explode(',', $data[0]->match_star_sign)) ? 'checked' : ''); ?> name="starsign[]" value="Capricorn"> Capricorn
    <input type="checkbox" <?php echo (isset($data[0]->match_star_sign) && in_array('Gemini', explode(',', $data[0]->match_star_sign)) ? 'checked' : ''); ?> name="starsign[]" value="Gemini"> Gemini
    <input type="checkbox" <?php echo (isset($data[0]->match_star_sign) && in_array('Leo', explode(',', $data[0]->match_star_sign)) ? 'checked' : ''); ?> name="starsign[]" value="Leo"> Leo

</div>

<div class="form-group">
    <input type="checkbox" <?php echo (isset($data[0]->match_star_sign) && in_array('Libra', explode(',', $data[0]->match_star_sign)) ? 'checked' : ''); ?> name="starsign[]" value="Libra"> Libra
    <input type="checkbox" <?php echo (isset($data[0]->match_star_sign) && in_array('Pisces', explode(',', $data[0]->match_star_sign)) ? 'checked' : ''); ?> name="starsign[]" value="Pisces"> Pisces
    <input type="checkbox" <?php echo (isset($data[0]->match_star_sign) && in_array('Sagittarius', explode(',', $data[0]->match_star_sign)) ? 'checked' : ''); ?> name="starsign[]" value="Sagittarius"> Sagittarius
    <input type="checkbox" <?php echo (isset($data[0]->match_star_sign) && in_array('Scorpio', explode(',', $data[0]->match_star_sign)) ? 'checked' : ''); ?> name="starsign[]" value="Scorpio"> Scorpio
    <input type="checkbox" <?php echo (isset($data[0]->match_star_sign) && in_array('Taurus', explode(',', $data[0]->match_star_sign)) ? 'checked' : ''); ?> name="starsign[]" value="Taurus"> Taurus
    <input type="checkbox" <?php echo (isset($data[0]->match_star_sign) && in_array('Virgo', explode(',', $data[0]->match_star_sign)) ? 'checked' : ''); ?> name="starsign[]" value="Virgo"> Virgo
</div>

<div class="form-group">
    <input type="checkbox" <?php echo (isset($data[0]->match_star_sign) && in_array("Don't Know", explode(',', $data[0]->match_star_sign)) ? 'checked' : ''); ?> name="starsign[]" value="Don't Know"> Don't Know
</div>
<hr>

{{-- <button onclick="search()" type="submit" class="btn btn-primary btn-block">Submit</button> --}}

<button style=" 
margin: 0 auto;
display: flex;
justify-content: center;
align-items: center;
align-content: center;
width: 120px;
font-size: 18px;
letter-spacing: 2.0px;
" onclick="search()" type="submit" class="btn btn-primary mb-4">SAVE</button>

</div>

    </div>
    
    </form>
    </div>
    </div>
</div>
@include('footer')