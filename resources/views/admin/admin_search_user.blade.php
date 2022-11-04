@include('admin_header')

<style> 
    .premium {
        border: 2px solid #4cd137 !important;
       
    }
    </style>


<div class="content my-3 my-md-5">
            <div class="container">
                

<input type="hidden" name="r" value="directory/index">
<div class="card directory-search-form">
    <div class="card-body pt-3 pb-1">
        <div class="row">
            <div class="alert bg-red text-white w-100" style="display:none"><ul></ul></div>        </div>
        <div class="row">
            <div class="col-sex col-sm-6 col-md-4 col-lg-4">
               <form id="search-form" class="form-horizontal" action="/u/searchuser" method="get">
   {{ csrf_field() }}
                <div class="form-group">
                    <div class="form-label">Select Country</div>
                    <div class="selectgroup selectgroup-pills">
                                                    <div id="distance"  class="selectgroup selectgroup-pills" role="radiogroup" aria-invalid="false">
<label  class="selectgroup-item">
<select id="country"  class="form-control" name="country">
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Afganistan' ? 'Selected' : ''); ?> value="Afganistan">Afghanistan</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Albania' ? 'Selected' : ''); ?> value="Albania">Albania</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Algeria' ? 'Selected' : ''); ?> value="Algeria">Algeria</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'American Samoa' ? 'Selected' : ''); ?> value="American Samoa">American Samoa</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Andorra' ? 'Selected' : ''); ?> value="Andorra">Andorra</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Angola' ? 'Selected' : ''); ?> value="Angola">Angola</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Anguilla' ? 'Selected' : ''); ?> value="Anguilla">Anguilla</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Antigua & Barbuda' ? 'Selected' : ''); ?> value="Antigua & Barbuda">Antigua & Barbuda</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Argentina' ? 'Selected' : ''); ?> value="Argentina">Argentina</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Armenia' ? 'Selected' : ''); ?> value="Armenia">Armenia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Aruba' ? 'Selected' : ''); ?> value="Aruba">Aruba</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Australia' ? 'Selected' : ''); ?> value="Australia">Australia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Austria' ? 'Selected' : ''); ?> value="Austria">Austria</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Azerbaijan' ? 'Selected' : ''); ?> value="Azerbaijan">Azerbaijan</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Bahamas' ? 'Selected' : ''); ?> value="Bahamas">Bahamas</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Bahrain' ? 'Selected' : ''); ?> value="Bahrain">Bahrain</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Bangladesh' ? 'Selected' : ''); ?> value="Bangladesh">Bangladesh</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Barbados' ? 'Selected' : ''); ?> value="Barbados">Barbados</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Belarus' ? 'Selected' : ''); ?> value="Belarus">Belarus</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Belgium' ? 'Selected' : ''); ?> value="Belgium">Belgium</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Belize' ? 'Selected' : ''); ?> value="Belize">Belize</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Benin' ? 'Selected' : ''); ?> value="Benin">Benin</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Bermuda' ? 'Selected' : ''); ?> value="Bermuda">Bermuda</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Bhutan' ? 'Selected' : ''); ?> value="Bhutan">Bhutan</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Bolivia' ? 'Selected' : ''); ?> value="Bolivia">Bolivia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Bonaire' ? 'Selected' : ''); ?> value="Bonaire">Bonaire</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Bosnia & Herzegovina' ? 'Selected' : ''); ?> value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Botswana' ? 'Selected' : ''); ?> value="Botswana">Botswana</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Brazil' ? 'Selected' : ''); ?> value="Brazil">Brazil</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'British Indian Ocean Ter' ? 'Selected' : ''); ?> value="British Indian Ocean Ter">British Indian Ocean Ter</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Brunei' ? 'Selected' : ''); ?> value="Brunei">Brunei</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Bulgaria' ? 'Selected' : ''); ?> value="Bulgaria">Bulgaria</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Burkina Faso' ? 'Selected' : ''); ?> value="Burkina Faso">Burkina Faso</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Burundi' ? 'Selected' : ''); ?> value="Burundi">Burundi</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Cambodia' ? 'Selected' : ''); ?> value="Cambodia">Cambodia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Cameroon' ? 'Selected' : ''); ?> value="Cameroon">Cameroon</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Canada' ? 'Selected' : ''); ?> value="Canada">Canada</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Canary Islands' ? 'Selected' : ''); ?> value="Canary Islands">Canary Islands</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Cape Verde' ? 'Selected' : ''); ?> value="Cape Verde">Cape Verde</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Cayman Islands' ? 'Selected' : ''); ?> value="Cayman Islands">Cayman Islands</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Central African Republic' ? 'Selected' : ''); ?> value="Central African Republic">Central African Republic</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Chad' ? 'Selected' : ''); ?> value="Chad">Chad</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Channel Islands' ? 'Selected' : ''); ?> value="Channel Islands">Channel Islands</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Chile' ? 'Selected' : ''); ?> value="Chile">Chile</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'China' ? 'Selected' : ''); ?> value="China">China</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Christmas Island' ? 'Selected' : ''); ?> value="Christmas Island">Christmas Island</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Cocos Island' ? 'Selected' : ''); ?> value="Cocos Island">Cocos Island</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Colombia' ? 'Selected' : ''); ?> value="Colombia">Colombia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Comoros' ? 'Selected' : ''); ?> value="Comoros">Comoros</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Congo' ? 'Selected' : ''); ?> value="Congo">Congo</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Cook Islands' ? 'Selected' : ''); ?> value="Cook Islands">Cook Islands</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Costa Rica' ? 'Selected' : ''); ?> value="Costa Rica">Costa Rica</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Cote DIvoire' ? 'Selected' : ''); ?> value="Cote DIvoire">Cote DIvoire</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Croatia' ? 'Selected' : ''); ?> value="Croatia">Croatia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Cuba' ? 'Selected' : ''); ?> value="Cuba">Cuba</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Curaco' ? 'Selected' : ''); ?> value="Curaco">Curacao</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Cyprus' ? 'Selected' : ''); ?> value="Cyprus">Cyprus</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Czech Republic' ? 'Selected' : ''); ?> value="Czech Republic">Czech Republic</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Denmark' ? 'Selected' : ''); ?> value="Denmark">Denmark</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Djibouti' ? 'Selected' : ''); ?> value="Djibouti">Djibouti</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Dominica' ? 'Selected' : ''); ?> value="Dominica">Dominica</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Dominican Republic' ? 'Selected' : ''); ?> value="Dominican Republic">Dominican Republic</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'East Timor' ? 'Selected' : ''); ?> value="East Timor">East Timor</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Ecuador' ? 'Selected' : ''); ?> value="Ecuador">Ecuador</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Egypt' ? 'Selected' : ''); ?> value="Egypt">Egypt</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'El Salvador' ? 'Selected' : ''); ?> value="El Salvador">El Salvador</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Equatorial Guinea' ? 'Selected' : ''); ?> value="Equatorial Guinea">Equatorial Guinea</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Eritrea' ? 'Selected' : ''); ?> value="Eritrea">Eritrea</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Estonia' ? 'Selected' : ''); ?> value="Estonia">Estonia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Ethiopia' ? 'Selected' : ''); ?> value="Ethiopia">Ethiopia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Falkland Islands' ? 'Selected' : ''); ?> value="Falkland Islands">Falkland Islands</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Faroe Islands' ? 'Selected' : ''); ?> value="Faroe Islands">Faroe Islands</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Fiji' ? 'Selected' : ''); ?> value="Fiji">Fiji</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Finland' ? 'Selected' : ''); ?> value="Finland">Finland</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'France' ? 'Selected' : ''); ?> value="France">France</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'French Guiana' ? 'Selected' : ''); ?> value="French Guiana">French Guiana</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'French Polynesia' ? 'Selected' : ''); ?> value="French Polynesia">French Polynesia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'French Southern Ter' ? 'Selected' : ''); ?> value="French Southern Ter">French Southern Ter</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Gabon' ? 'Selected' : ''); ?> value="Gabon">Gabon</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Gambia' ? 'Selected' : ''); ?> value="Gambia">Gambia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Georgia' ? 'Selected' : ''); ?> value="Georgia">Georgia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Germany' ? 'Selected' : ''); ?> value="Germany">Germany</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Ghana' ? 'Selected' : ''); ?> value="Ghana">Ghana</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Gibraltar' ? 'Selected' : ''); ?> value="Gibraltar">Gibraltar</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Great Britain' ? 'Selected' : ''); ?> value="Great Britain">Great Britain</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Greece' ? 'Selected' : ''); ?> value="Greece">Greece</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Greenland' ? 'Selected' : ''); ?> value="Greenland">Greenland</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Grenada' ? 'Selected' : ''); ?> value="Grenada">Grenada</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Guadeloupe' ? 'Selected' : ''); ?> value="Guadeloupe">Guadeloupe</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Guam' ? 'Selected' : ''); ?> value="Guam">Guam</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Guatemala' ? 'Selected' : ''); ?> value="Guatemala">Guatemala</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Guinea' ? 'Selected' : ''); ?> value="Guinea">Guinea</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Guyana' ? 'Selected' : ''); ?> value="Guyana">Guyana</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Haiti' ? 'Selected' : ''); ?> value="Haiti">Haiti</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Hawaii' ? 'Selected' : ''); ?> value="Hawaii">Hawaii</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Honduras' ? 'Selected' : ''); ?> value="Honduras">Honduras</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Hong Kong' ? 'Selected' : ''); ?> value="Hong Kong">Hong Kong</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Hungary' ? 'Selected' : ''); ?> value="Hungary">Hungary</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Iceland' ? 'Selected' : ''); ?> value="Iceland">Iceland</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Indonesia' ? 'Selected' : ''); ?> value="Indonesia">Indonesia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'India' ? 'Selected' : ''); ?> value="India">India</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Iran' ? 'Selected' : ''); ?> value="Iran">Iran</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Iraq' ? 'Selected' : ''); ?> value="Iraq">Iraq</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Ireland' ? 'Selected' : ''); ?> value="Ireland">Ireland</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Isle of Man' ? 'Selected' : ''); ?> value="Isle of Man">Isle of Man</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Israel' ? 'Selected' : ''); ?> value="Israel">Israel</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Italy' ? 'Selected' : ''); ?> value="Italy">Italy</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Jamaica' ? 'Selected' : ''); ?> value="Jamaica">Jamaica</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Japan' ? 'Selected' : ''); ?> value="Japan">Japan</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Jordan' ? 'Selected' : ''); ?> value="Jordan">Jordan</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Kazakhstan' ? 'Selected' : ''); ?> value="Kazakhstan">Kazakhstan</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Kenya' ? 'Selected' : ''); ?> value="Kenya">Kenya</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Kiribati' ? 'Selected' : ''); ?> value="Kiribati">Kiribati</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Korea North' ? 'Selected' : ''); ?> value="Korea North">Korea North</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Korea Sout' ? 'Selected' : ''); ?> value="Korea Sout">Korea South</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Kuwait' ? 'Selected' : ''); ?> value="Kuwait">Kuwait</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Kyrgyzstan' ? 'Selected' : ''); ?> value="Kyrgyzstan">Kyrgyzstan</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Laos' ? 'Selected' : ''); ?> value="Laos">Laos</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Latvia' ? 'Selected' : ''); ?> value="Latvia">Latvia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Lebanon' ? 'Selected' : ''); ?> value="Lebanon">Lebanon</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Lesotho' ? 'Selected' : ''); ?> value="Lesotho">Lesotho</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Liberia' ? 'Selected' : ''); ?> value="Liberia">Liberia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Libya' ? 'Selected' : ''); ?> value="Libya">Libya</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Liechtenstein' ? 'Selected' : ''); ?> value="Liechtenstein">Liechtenstein</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Lithuania' ? 'Selected' : ''); ?> value="Lithuania">Lithuania</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Luxembourg' ? 'Selected' : ''); ?> value="Luxembourg">Luxembourg</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Macau' ? 'Selected' : ''); ?> value="Macau">Macau</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Macedonia' ? 'Selected' : ''); ?> value="Macedonia">Macedonia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Madagascar' ? 'Selected' : ''); ?> value="Madagascar">Madagascar</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Malaysia' ? 'Selected' : ''); ?> value="Malaysia">Malaysia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Malawi' ? 'Selected' : ''); ?> value="Malawi">Malawi</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Maldives' ? 'Selected' : ''); ?> value="Maldives">Maldives</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Mali' ? 'Selected' : ''); ?> value="Mali">Mali</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Malta' ? 'Selected' : ''); ?> value="Malta">Malta</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Marshall Islands' ? 'Selected' : ''); ?> value="Marshall Islands">Marshall Islands</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Martinique' ? 'Selected' : ''); ?> value="Martinique">Martinique</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Mauritania' ? 'Selected' : ''); ?> value="Mauritania">Mauritania</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Mauritius' ? 'Selected' : ''); ?> value="Mauritius">Mauritius</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Mayotte' ? 'Selected' : ''); ?> value="Mayotte">Mayotte</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Mexico' ? 'Selected' : ''); ?> value="Mexico">Mexico</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Midway Islands' ? 'Selected' : ''); ?> value="Midway Islands">Midway Islands</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Moldova' ? 'Selected' : ''); ?> value="Moldova">Moldova</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Monaco' ? 'Selected' : ''); ?> value="Monaco">Monaco</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Mongolia' ? 'Selected' : ''); ?> value="Mongolia">Mongolia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Montserrat' ? 'Selected' : ''); ?> value="Montserrat">Montserrat</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Morocco' ? 'Selected' : ''); ?> value="Morocco">Morocco</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Mozambique' ? 'Selected' : ''); ?> value="Mozambique">Mozambique</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Myanmar' ? 'Selected' : ''); ?> value="Myanmar">Myanmar</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Nambia' ? 'Selected' : ''); ?> value="Nambia">Nambia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Nauru' ? 'Selected' : ''); ?> value="Nauru">Nauru</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Nepal' ? 'Selected' : ''); ?> value="Nepal">Nepal</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Netherland Antilles' ? 'Selected' : ''); ?> value="Netherland Antilles">Netherland Antilles</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Netherlands' ? 'Selected' : ''); ?> value="Netherlands">Netherlands (Holland, Europe)</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Nevis' ? 'Selected' : ''); ?> value="Nevis">Nevis</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'New Caledonia' ? 'Selected' : ''); ?> value="New Caledonia">New Caledonia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'New Zealand' ? 'Selected' : ''); ?> value="New Zealand">New Zealand</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Nicaragua' ? 'Selected' : ''); ?> value="Nicaragua">Nicaragua</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Niger' ? 'Selected' : ''); ?> value="Niger">Niger</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Nigeria' ? 'Selected' : ''); ?> value="Nigeria">Nigeria</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Niue' ? 'Selected' : ''); ?> value="Niue">Niue</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Norfolk Island' ? 'Selected' : ''); ?> value="Norfolk Island">Norfolk Island</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Norway' ? 'Selected' : ''); ?> value="Norway">Norway</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Oman' ? 'Selected' : ''); ?> value="Oman">Oman</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Pakistan' ? 'Selected' : ''); ?> value="Pakistan">Pakistan</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Palau Island' ? 'Selected' : ''); ?> value="Palau Island">Palau Island</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Palestine' ? 'Selected' : ''); ?> value="Palestine">Palestine</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Panama' ? 'Selected' : ''); ?> value="Panama">Panama</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Papua New Guinea' ? 'Selected' : ''); ?> value="Papua New Guinea">Papua New Guinea</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Paraguay' ? 'Selected' : ''); ?> value="Paraguay">Paraguay</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Peru' ? 'Selected' : ''); ?> value="Peru">Peru</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Phillipines' ? 'Selected' : ''); ?> value="Phillipines">Philippines</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Pitcairn Island' ? 'Selected' : ''); ?> value="Pitcairn Island">Pitcairn Island</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Poland' ? 'Selected' : ''); ?> value="Poland">Poland</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Portugal' ? 'Selected' : ''); ?> value="Portugal">Portugal</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Puerto Rico' ? 'Selected' : ''); ?> value="Puerto Rico">Puerto Rico</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Qatar' ? 'Selected' : ''); ?> value="Qatar">Qatar</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Republic of Montenegro' ? 'Selected' : ''); ?> value="Republic of Montenegro">Republic of Montenegro</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Republic of Serbia' ? 'Selected' : ''); ?> value="Republic of Serbia">Republic of Serbia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Reunion' ? 'Selected' : ''); ?> value="Reunion">Reunion</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Romania' ? 'Selected' : ''); ?> value="Romania">Romania</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Russia' ? 'Selected' : ''); ?> value="Russia">Russia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Rwanda' ? 'Selected' : ''); ?> value="Rwanda">Rwanda</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'St Barthelemy' ? 'Selected' : ''); ?> value="St Barthelemy">St Barthelemy</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'St Eustatius' ? 'Selected' : ''); ?> value="St Eustatius">St Eustatius</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'St Helena' ? 'Selected' : ''); ?> value="St Helena">St Helena</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'St Kitts-Nevis' ? 'Selected' : ''); ?> value="St Kitts-Nevis">St Kitts-Nevis</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'St Lucia' ? 'Selected' : ''); ?> value="St Lucia">St Lucia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'St Maarten' ? 'Selected' : ''); ?> value="St Maarten">St Maarten</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'St Pierre & Miquelon' ? 'Selected' : ''); ?>  value="St Pierre & Miquelon">St Pierre & Miquelon</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'St Vincent & Grenadines' ? 'Selected' : ''); ?> value="St Vincent & Grenadines">St Vincent & Grenadines</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Saipan' ? 'Selected' : ''); ?> value="Saipan">Saipan</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Samoa' ? 'Selected' : ''); ?> value="Samoa">Samoa</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Samoa American' ? 'Selected' : ''); ?> value="Samoa American">Samoa American</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'San Marino' ? 'Selected' : ''); ?> value="San Marino">San Marino</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Sao Tome & Principe' ? 'Selected' : ''); ?> value="Sao Tome & Principe">Sao Tome & Principe</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Saudi Arabia' ? 'Selected' : ''); ?> value="Saudi Arabia">Saudi Arabia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Senegal' ? 'Selected' : ''); ?> value="Senegal">Senegal</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Seychelles' ? 'Selected' : ''); ?> value="Seychelles">Seychelles</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Sierra Leone' ? 'Selected' : ''); ?> value="Sierra Leone">Sierra Leone</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Singapore' ? 'Selected' : ''); ?> value="Singapore">Singapore</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Slovakia' ? 'Selected' : ''); ?> value="Slovakia">Slovakia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Slovenia' ? 'Selected' : ''); ?> value="Slovenia">Slovenia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Solomon Islands' ? 'Selected' : ''); ?> value="Solomon Islands">Solomon Islands</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Somalia' ? 'Selected' : ''); ?> value="Somalia">Somalia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'South Africa' ? 'Selected' : ''); ?> value="South Africa">South Africa</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Spain' ? 'Selected' : ''); ?> value="Spain">Spain</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Sri Lanka' ? 'Selected' : ''); ?> value="Sri Lanka">Sri Lanka</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Sudan' ? 'Selected' : ''); ?> value="Sudan">Sudan</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Suriname' ? 'Selected' : ''); ?> value="Suriname">Suriname</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Swaziland' ? 'Selected' : ''); ?> value="Swaziland">Swaziland</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Sweden' ? 'Selected' : ''); ?> value="Sweden">Sweden</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Switzerland' ? 'Selected' : ''); ?> value="Switzerland">Switzerland</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Syria' ? 'Selected' : ''); ?> value="Syria">Syria</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Tahiti' ? 'Selected' : ''); ?> value="Tahiti">Tahiti</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Taiwan' ? 'Selected' : ''); ?> value="Taiwan">Taiwan</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Tajikistan' ? 'Selected' : ''); ?> value="Tajikistan">Tajikistan</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Tanzania' ? 'Selected' : ''); ?> value="Tanzania">Tanzania</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Thailand' ? 'Selected' : ''); ?> value="Thailand">Thailand</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Togo' ? 'Selected' : ''); ?> value="Togo">Togo</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Tokelau' ? 'Selected' : ''); ?> value="Tokelau">Tokelau</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Tonga' ? 'Selected' : ''); ?> value="Tonga">Tonga</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Trinidad & Tobago' ? 'Selected' : ''); ?> value="Trinidad & Tobago">Trinidad & Tobago</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Tunisia' ? 'Selected' : ''); ?> value="Tunisia">Tunisia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Turkey' ? 'Selected' : ''); ?> value="Turkey">Turkey</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Turkmenistan' ? 'Selected' : ''); ?> value="Turkmenistan">Turkmenistan</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Turks & Caicos Is' ? 'Selected' : ''); ?> value="Turks & Caicos Is">Turks & Caicos Is</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Tuvalu' ? 'Selected' : ''); ?> value="Tuvalu">Tuvalu</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Uganda' ? 'Selected' : ''); ?> value="Uganda">Uganda</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'United Kingdom' ? 'Selected' : ''); ?> value="United Kingdom">United Kingdom</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Ukraine' ? 'Selected' : ''); ?> value="Ukraine">Ukraine</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'United Arab Erimates' ? 'Selected' : ''); ?> value="United Arab Erimates">United Arab Emirates</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'United States of America' ? 'Selected' : ''); ?> value="United States of America">United States of America</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Uraguay' ? 'Selected' : ''); ?> value="Uraguay">Uruguay</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Uzbekistan' ? 'Selected' : ''); ?> value="Uzbekistan">Uzbekistan</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Vanuatu' ? 'Selected' : ''); ?> value="Vanuatu">Vanuatu</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Vatican City State' ? 'Selected' : ''); ?> value="Vatican City State">Vatican City State</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Venezuela' ? 'Selected' : ''); ?> value="Venezuela">Venezuela</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Vietnam' ? 'Selected' : ''); ?> value="Vietnam">Vietnam</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Virgin Islands (Brit)' ? 'Selected' : ''); ?> value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Virgin Islands (USA)' ? 'Selected' : ''); ?> value="Virgin Islands (USA)">Virgin Islands (USA)</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Wake Island' ? 'Selected' : ''); ?> value="Wake Island">Wake Island</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Wallis & Futana Is' ? 'Selected' : ''); ?> value="Wallis & Futana Is">Wallis & Futana Is</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Yemen' ? 'Selected' : ''); ?> value="Yemen">Yemen</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Zaire' ? 'Selected' : ''); ?> value="Zaire">Zaire</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Zambia' ? 'Selected' : ''); ?> value="Zambia">Zambia</option>
   <option <?php echo (isset($_GET['country']) && $_GET['country'] == 'Zimbabwe' ? 'Selected' : ''); ?> value="Zimbabwe">Zimbabwe</option>
</select>
</label>


</div>
                                            </div>
                </div>
            </div>
           
            
            <div class="col-search-actions col-12 col-sm-12 col-md-12 col-lg-2">
                <div class="form-group">
                    <div class="form-label">&nbsp;</div>
                    <div class="btn-group w-100">
                        <button onclick="search()" type="submit" class="btn btn-primary btn-block"><i class="fas fa-search pr-2"></i>Search</button>                        
                    </div>
                </div>
            </div>
            </form>

            <form id="search-form" class="form-horizontal" action="/u/searchuser" method="get">
            {{ csrf_field() }}
               
                <div class="form-group ml-5">
                    <div class="form-label">Name/E-mail</div>
                    <div class="selectgroup selectgroup-pills">
                                                    <div id="distance"  class="selectgroup selectgroup-pills" role="radiogroup" aria-invalid="false">
<label  class="selectgroup-item"><input type="text" class="form-control" name="email" placeholder="Enter name or email." value= "<?php echo (isset($_GET['email']) && $_GET['email'] == $_GET['email'] ? $_GET['email'] : ''); ?>"> 
   </label>


                        <button onclick="search()" type="submit" class="btn btn-primary"><i class="fas fa-search pr-2"></i>Search</button>               

</div>

                                            </div>

                

                </div>


             

             




            </form>

            <form id="search-form" class="form-horizontal" action="/u/searchuser" method="get">
            {{ csrf_field() }}
               
                <div class="form-group ml-3">
                    <div class="form-label">Status</div>
                    <div class="selectgroup selectgroup-pills">
                                                    <div id="distance"  class="selectgroup selectgroup-pills" role="radiogroup" aria-invalid="false">
<label  class="selectgroup-item">
   <select id="country"  class="form-control" name="categry">
   <option <?php echo (isset($_GET['categry']) && $_GET['categry'] == 'Premium' ? 'Selected' : ''); ?> value="Premium">Premium</option>
   <option <?php echo (isset($_GET['categry']) && $_GET['categry'] == 'Standard' ? 'Selected' : ''); ?> value="Standard">Standard</option>
</select>
   </label>


                        <button onclick="search()" type="submit" class="btn btn-primary"><i class="fas fa-search pr-2"></i>Search</button>               

</div>

                                            </div>

                

                </div>


             

             




            </form>

        </div>
      
    </div>
</div>





<div>    
   <div class="container">
      <div class="row">
          
          <div class="col-md-12">
            @if (is_array($data) || is_object($data))
   
    @if(count($data) > 0)
            
                            
                <form action="/u/adminbroadcast" method="POST">
                  {{ csrf_field() }}

                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Registration Date & Time</th>
                    <th>Profile Pic</th> 
                    <th>Name</th> 
                    <th>E-Mail</th>
                    <th>Sex</th> 
                    <!--th>City</th>  
                    <th>State</th--> 
                    <th>Country</th>
                    <th>Action</th>  
                    <th>Select all&nbsp;<input type="checkbox" id="all_chk">

                    </th>
                    <th>
                      <button type="submit" class="btn btn-primary">Go</button>
                    </th>
                  </tr>
                  </thead>
                 <tbody>
                    @foreach($data as $da)
                    <?php 
                    $date = date('M j, Y', strtotime($da->created_at));
                    $time = date('g:i a', strtotime($da->created_at)); 

                    $today = date('Y-m-d H:i:s');
                    $premium_user = DB::Select("select * from payment_transactions where pt_u_id = '".$da->id."' and pt_end_date > '".$today."'");
       

                    if(count($premium_user) > 0) {
                    $premium = "Premium";
           
                    } else {
                    $premium = "";
           
                   }
                    ?>
                    <tr>
                      <td>{{ $date }}, {{ $time }}</td> 
                      <th><img src="{{ $da->prfl_photo_path }}"></th> 
                      <td>{{ $da->name }}</td> 
                      <td>
                        @if($da->email_verified_at != "")
                        <i class="fas fa-check-circle" style="color:green"></i>{{ $da->email }}
                        @else
                        <i class="fas fa-check-circle"></i>{{ $da->email }}
                        @endIf  
                    </td>
                      <td>{{ $da->sex }}</td> 
                      <!--td>{{ $da->city }}</td> 
                      <td>{{$da->state }}</td--> 
                      <td>{{$da->country }}</td>
                      <td><a href="/u/adminuserdtls/{{ $da->id }}" class="btn btn-info">View Profile</a>
                      <a href="/u/admineditprofile/{{ $da->id }}" class="btn btn-primary">Edit Profile</a>
                      @if($da->pt_u_id != "")
                        <a  href="#" class="btn btn-success">Premium User</a>
                      @else
                      <a  href="/u/adminuserpremium/{{ $da->id }}" class="btn btn-success">Upgrade to premium</a>
                      @endif  
                        <a onclick="return confirm('Are you sure?')" href="/u/adminuserdelete/{{ $da->id }}" class="btn btn-danger">Delete</a>
                      
                      </td>

                      <td>
                        <input type="checkbox" name="chk[]" value="{{ $da->email }}"></td>
                    </tr> 
                    @endforeach
                    

                       
                 </tbody>
                  <tfoot>
                  <tr>
                    <th>Registration Date & Time</th>
                    <th>Profile Pic</th> 
                    <th>Name</th> 
                    <th>E-Mail</th>
                    <th>Sex</th>
                    <!--th>City</th>  
                    <th>State</th--> 
                    <th>Country</th>
                    <th>Action</th>  
                  </tr>
                  </tfoot>
                </table>

                </form>
              
          </div>

          @endif
          @endif
          
      </div>
  </div>
</div>
     </div>
       </div>


<style type="text/css">
@keyframes ldio-1lb5jgzc77d {
  0% { transform: rotate(0) }
  100% { transform: rotate(360deg) }
}
.ldio-1lb5jgzc77d div { box-sizing: border-box!important }
.ldio-1lb5jgzc77d > div {
  position: absolute;
  width: 56.42px;
  height: 56.42px;
  top: 80.28999999999999px;
  left: 80.28999999999999px;
  border-radius: 50%;
  border: 4.34px solid #000;
  border-color: #f045aa transparent #f045aa transparent;
  animation: ldio-1lb5jgzc77d 1.2048192771084336s linear infinite;
}
.ldio-1lb5jgzc77d > div:nth-child(2) { border-color: transparent }
.ldio-1lb5jgzc77d > div:nth-child(2) div {
  position: absolute;
  width: 100%;
  height: 100%;
  transform: rotate(45deg);
}
.ldio-1lb5jgzc77d > div:nth-child(2) div:before, .ldio-1lb5jgzc77d > div:nth-child(2) div:after { 
  content: "";
  display: block;
  position: absolute;
  width: 4.34px;
  height: 4.34px;
  top: -4.34px;
  left: 21.7px;
  background: #f045aa;
  border-radius: 50%;
  box-shadow: 0 52.08px 0 0 #f045aa;
}
.ldio-1lb5jgzc77d > div:nth-child(2) div:after { 
  left: -4.34px;
  top: 21.7px;
  box-shadow: 52.08px 0 0 0 #f045aa;
}
.loadingio-spinner-dual-ring-as0bi689od {
  width: 217px;
  height: 217px;
  display: inline-block;
  overflow: hidden;
  background: none;
}
.ldio-1lb5jgzc77d {
  width: 100%;
  height: 100%;
  position: relative;
  transform: translateZ(0) scale(1);
  backface-visibility: hidden;
  transform-origin: 0 0; /* see note above */
}
.ldio-1lb5jgzc77d div { box-sizing: content-box; }
/* generated by https://loading.io/ */
</style>


  @include('admin_footer')

   <script>
$("#all_chk").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
  </script>