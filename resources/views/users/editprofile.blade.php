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
<div class="container-fluid" style="margin-top: 15px;">
<div class="row">

    <div class="col-md-2"></div>
    <div class="col-md-8">
<h1>Edit Profile</h1>
<p>View My Profile
Answering these profile questions will help other users find you in search results and help us to find you more accurate matches<br> Answer all questions below to complete this step.</p>

<form action= "/editprofileaction" method="POST">
    {{ csrf_field() }}
    @if (Session::has('msg'))
                                    <div class="alert alert-success">{{Session::get('msg')}}</div>
                                @endif
<h4>Your Basics</h4>

<div class="form-group">
    <label>First Name:</label><br>
    <input type="text"  class="form-control" name="name" value="<?php echo $data[0]->name; ?>">
</div>

<div class="form-group">
    <label>I'm a:</label><br>
    <input type="text" class="form-control" name="sex" value="<?php echo $data[0]->sex; ?>" readonly>
</div>

<div class="form-group"><br>
    <label>Date of Birth:</label>
    <input type="text" class="form-control" name="dob" value="<?php echo $data[0]->dob; ?>" readonly>
</div>
<div class="row">
    <div class="col-md-12">
<div class="form-group">
    <label>Country:</label>
    <input type="text" readonly value="{{ $data[0]->country }}" class="form-control">
</div>
</div>


</div>
<h4>Your Appearance</h4>

<div class="form-group">
    <p>Hair Color:</p>
    <input type="radio" <?php echo (isset($data[0]->hair_color) && $data[0]->hair_color == 'Bald / Shaved' ? 'checked' : ''); ?> name="hairclr" value="Bald / Shaved"> Bald / Shaved
    <input type="radio" <?php echo (isset($data[0]->hair_color) && $data[0]->hair_color == 'Black' ? 'checked' : ''); ?> name="hairclr" value="Black"> Black
    <input type="radio" <?php echo (isset($data[0]->hair_color) && $data[0]->hair_color == 'Blonde' ? 'checked' : ''); ?> name="hairclr" value="Blonde"> Blonde
    <input type="radio" <?php echo (isset($data[0]->hair_color) && $data[0]->hair_color == 'Brown' ? 'checked' : ''); ?> name="hairclr" value="Brown"> Brown
</div>

<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->hair_color) && $data[0]->hair_color == 'Grey / White' ? 'checked' : ''); ?> name="hairclr" value="Grey / White"> Grey / White
    <input type="radio" <?php echo (isset($data[0]->hair_color) && $data[0]->hair_color == 'Light Brown' ? 'checked' : ''); ?> name="hairclr" value="Light Brown"> Light Brown
    <input type="radio" <?php echo (isset($data[0]->hair_color) && $data[0]->hair_color == 'Red' ? 'checked' : ''); ?> name="hairclr" value="Changes frequently"> Red
    <input type="radio" <?php echo (isset($data[0]->hair_color) && $data[0]->hair_color == 'Changes frequently' ? 'checked' : ''); ?> name="hairclr" value="Changes frequently"> Changes frequently
</div>
<hr>
<div class="form-group">
    <p>Eye Color:</p>
    <input type="radio" <?php echo (isset($data[0]->eye_color) && $data[0]->eye_color == 'Black' ? 'checked' : ''); ?> name="eyeclr" value="Black"> Black
    <input type="radio" <?php echo (isset($data[0]->eye_color) && $data[0]->eye_color == 'Blue' ? 'checked' : ''); ?> name="eyeclr" value="Blue"> Blue
    <input type="radio" <?php echo (isset($data[0]->eye_color) && $data[0]->eye_color == 'Brown' ? 'checked' : ''); ?> name="eyeclr" value="Brown"> Brown
    <input type="radio" <?php echo (isset($data[0]->eye_color) && $data[0]->eye_color == 'Green' ? 'checked' : ''); ?> name="eyeclr" value="Green"> Green
</div>

<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->eye_color) && $data[0]->eye_color == 'Grey' ? 'checked' : ''); ?> name="eyeclr" value="Grey"> Grey
    <input type="radio" <?php echo (isset($data[0]->eye_color) && $data[0]->eye_color == 'Hazel' ? 'checked' : ''); ?> name="eyeclr" value="Hazel"> Hazel
</div>
<hr>


<div class="form-group">
    <p>Height:</p>
    <select name="height" class="form-control">
                        
                                <option value="">Please Select...</option>
                            
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '140' ? 'selected' : ''); ?> value="140">4'7" (140 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '143' ? 'selected' : ''); ?> value="143">4'8" (143 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '145' ? 'selected' : ''); ?> value="145">4'9" (145 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '148' ? 'selected' : ''); ?> value="148">4'10" (148 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '150' ? 'selected' : ''); ?> value="150">4'11" (150 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '153' ? 'selected' : ''); ?> value="153">5' (153 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '155' ? 'selected' : ''); ?> value="155">5'1" (155 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '158' ? 'selected' : ''); ?> value="158">5'2" (158 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '161' ? 'selected' : ''); ?> value="161">5'3" (161 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '163' ? 'selected' : ''); ?> value="163">5'4" (163 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '166' ? 'selected' : ''); ?> value="166">5'5" (166 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '168' ? 'selected' : ''); ?> value="168">5'6" (168 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '171' ? 'selected' : ''); ?> value="171">5'7" (171 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '173' ? 'selected' : ''); ?> value="173">5'8" (173 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '176' ? 'selected' : ''); ?> value="176">5'9" (176 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '178' ? 'selected' : ''); ?> value="178">5'10" (178 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '181' ? 'selected' : ''); ?> value="181">5'11" (181 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '183' ? 'selected' : ''); ?> value="183">6' (183 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '186' ? 'selected' : ''); ?> value="186">6'1" (186 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '188' ? 'selected' : ''); ?> value="188">6'2" (188 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '191' ? 'selected' : ''); ?> value="191">6'3" (191 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '194' ? 'selected' : ''); ?> value="194">6'4" (194 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '196' ? 'selected' : ''); ?> value="196">6'5" (196 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '199' ? 'selected' : ''); ?> value="199">6'6" (199 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '201' ? 'selected' : ''); ?> value="201">6'7" (201 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '204' ? 'selected' : ''); ?> value="204">6'8" (204 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '206' ? 'selected' : ''); ?> value="206">6'9 (206 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '209' ? 'selected' : ''); ?> value="209">6'10" (209 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '211' ? 'selected' : ''); ?> value="211">6'11" (211 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '214' ? 'selected' : ''); ?> value="214">7' (214 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '216' ? 'selected' : ''); ?> value="216">7'1" (216 cm)</option>
                                
                                <option <?php echo (isset($data[0]->height) && $data[0]->height == '219' ? 'selected' : ''); ?> value="219">7'2" (219 cm)</option>
                                
                        </select>
</div>
<hr>


<div class="form-group">
    <p>Weight:</p>
    <select name="weight"class="form-control">
                        
                                <option value="">Please Select...</option>
                            
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '40' ? 'selected' : ''); ?> value="40">40 kg (88 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '41' ? 'selected' : ''); ?> value="41">41 kg (90 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '42' ? 'selected' : ''); ?> value="42">42 kg (93 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '43' ? 'selected' : ''); ?> value="43">43 kg (95 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '44' ? 'selected' : ''); ?> value="44">44 kg (97 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '45' ? 'selected' : ''); ?> value="45">45 kg (99 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '46' ? 'selected' : ''); ?> value="46">46 kg (101 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '47' ? 'selected' : ''); ?> value="47">47 kg (104 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '48' ? 'selected' : ''); ?> value="48">48 kg (106 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '49' ? 'selected' : ''); ?> value="49">49 kg (108 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '50' ? 'selected' : ''); ?> value="50">50 kg (110 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '51' ? 'selected' : ''); ?> value="51">51 kg (112 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '52' ? 'selected' : ''); ?> value="52">52 kg (115 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '53' ? 'selected' : ''); ?> value="53">53 kg (117 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '54' ? 'selected' : ''); ?> value="54">54 kg (119 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '55' ? 'selected' : ''); ?> value="55">55 kg (121 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '56' ? 'selected' : ''); ?> value="56">56 kg (123 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '57' ? 'selected' : ''); ?> value="57">57 kg (126 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '58' ? 'selected' : ''); ?> value="58">58 kg (128 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '59' ? 'selected' : ''); ?> value="59">59 kg (130 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '60' ? 'selected' : ''); ?> value="60">60 kg (132 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '61' ? 'selected' : ''); ?> value="61">61 kg (134 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '62' ? 'selected' : ''); ?> value="62">62 kg (137 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '63' ? 'selected' : ''); ?>value="63">63 kg (139 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '64' ? 'selected' : ''); ?> value="64">64 kg (141 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '65' ? 'selected' : ''); ?> value="65">65 kg (143 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '66' ? 'selected' : ''); ?> value="66">66 kg (146 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '67' ? 'selected' : ''); ?> value="67">67 kg (148 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '68' ? 'selected' : ''); ?> value="68">68 kg (150 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '69' ? 'selected' : ''); ?> value="69">69 kg (152 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '70' ? 'selected' : ''); ?> value="70">70 kg (154 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '71' ? 'selected' : ''); ?> value="71">71 kg (157 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '72' ? 'selected' : ''); ?> value="72">72 kg (159 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '73' ? 'selected' : ''); ?> value="73">73 kg (161 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '74' ? 'selected' : ''); ?> value="74">74 kg (163 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '75' ? 'selected' : ''); ?> value="75">75 kg (165 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '76' ? 'selected' : ''); ?> value="76">76 kg (168 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '77' ? 'selected' : ''); ?> value="77">77 kg (170 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '78' ? 'selected' : ''); ?> value="78">78 kg (172 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '79' ? 'selected' : ''); ?> value="79">79 kg (174 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '80' ? 'selected' : ''); ?> value="80">80 kg (176 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '81' ? 'selected' : ''); ?> value="81">81 kg (179 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '82' ? 'selected' : ''); ?> value="82">82 kg (181 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '83' ? 'selected' : ''); ?> value="83">83 kg (183 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '84' ? 'selected' : ''); ?> value="84">84 kg (185 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '85' ? 'selected' : ''); ?> value="85">85 kg (187 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '86' ? 'selected' : ''); ?> value="86">86 kg (190 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '87' ? 'selected' : ''); ?> value="87">87 kg (192 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '88' ? 'selected' : ''); ?>value="88">88 kg (194 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '89' ? 'selected' : ''); ?> value="89">89 kg (196 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '90' ? 'selected' : ''); ?> value="90">90 kg (198 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '91' ? 'selected' : ''); ?> value="91">91 kg (201 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '92' ? 'selected' : ''); ?> value="92">92 kg (203 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '93' ? 'selected' : ''); ?> value="93">93 kg (205 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '94' ? 'selected' : ''); ?> value="94">94 kg (207 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '95' ? 'selected' : ''); ?>value="95">95 kg (209 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '96' ? 'selected' : ''); ?> value="96">96 kg (212 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '97' ? 'selected' : ''); ?>value="97">97 kg (214 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '98' ? 'selected' : ''); ?>value="98">98 kg (216 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '99' ? 'selected' : ''); ?>value="99">99 kg (218 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '100' ? 'selected' : ''); ?> value="100">100 kg (220 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '101' ? 'selected' : ''); ?> value="101">101 kg (223 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '102' ? 'selected' : ''); ?> value="102">102 kg (225 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '103' ? 'selected' : ''); ?> value="103">103 kg (227 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '104' ? 'selected' : ''); ?> value="104">104 kg (229 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '105' ? 'selected' : ''); ?> value="105">105 kg (231 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '106' ? 'selected' : ''); ?> value="106">106 kg (234 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '107' ? 'selected' : ''); ?> value="107">107 kg (236 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '108' ? 'selected' : ''); ?> value="108">108 kg (238 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '109' ? 'selected' : ''); ?> value="109">109 kg (240 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '110' ? 'selected' : ''); ?> value="110">110 kg (243 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '111' ? 'selected' : ''); ?> value="111">111 kg (245 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '112' ? 'selected' : ''); ?> value="112">112 kg (247 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '113' ? 'selected' : ''); ?> value="113">113 kg (249 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '114' ? 'selected' : ''); ?> value="114">114 kg (251 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '115' ? 'selected' : ''); ?> value="115">115 kg (254 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '116' ? 'selected' : ''); ?> value="116">116 kg (256 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '117' ? 'selected' : ''); ?> value="117">117 kg (258 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '118' ? 'selected' : ''); ?> value="118">118 kg (260 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '119' ? 'selected' : ''); ?> value="119">119 kg (262 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '120' ? 'selected' : ''); ?>value="120">120 kg (265 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '121' ? 'selected' : ''); ?> value="121">121 kg (267 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '122' ? 'selected' : ''); ?> value="122">122 kg (269 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '123' ? 'selected' : ''); ?> value="123">123 kg (271 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '124' ? 'selected' : ''); ?> value="124">124 kg (273 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '125' ? 'selected' : ''); ?> value="125">125 kg (276 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '126' ? 'selected' : ''); ?> value="126">126 kg (278 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '127' ? 'selected' : ''); ?> value="127">127 kg (280 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '128' ? 'selected' : ''); ?> value="128">128 kg (282 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '129' ? 'selected' : ''); ?> value="129">129 kg (284 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '130' ? 'selected' : ''); ?> value="130">130 kg (287 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '131' ? 'selected' : ''); ?> value="131">131 kg (289 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '132' ? 'selected' : ''); ?> value="132">132 kg (291 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '133' ? 'selected' : ''); ?> value="133">133 kg (293 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '134' ? 'selected' : ''); ?> value="134">134 kg (295 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '135' ? 'selected' : ''); ?> value="135">135 kg (298 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '136' ? 'selected' : ''); ?> value="136">136 kg (300 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '137' ? 'selected' : ''); ?> value="137">137 kg (302 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '138' ? 'selected' : ''); ?> value="138">138 kg (304 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '139' ? 'selected' : ''); ?> value="139">139 kg (306 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '140' ? 'selected' : ''); ?> value="140">140 kg (309 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '141' ? 'selected' : ''); ?> value="">141 kg (311 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '142' ? 'selected' : ''); ?> value="142">142 kg (313 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '143' ? 'selected' : ''); ?> value="143">143 kg (315 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '144' ? 'selected' : ''); ?> value="144">144 kg (317 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '145' ? 'selected' : ''); ?> value="145">145 kg (320 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '146' ? 'selected' : ''); ?> value="146">146 kg (322 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '147' ? 'selected' : ''); ?>value="147">147 kg (324 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '148' ? 'selected' : ''); ?> value="148">148 kg (326 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '149' ? 'selected' : ''); ?> value="149">149 kg (328 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '150' ? 'selected' : ''); ?>value="150">150 kg (331 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '151' ? 'selected' : ''); ?> value="151">151 kg (333 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '152' ? 'selected' : ''); ?> value="152">152 kg (335 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '153' ? 'selected' : ''); ?> value="153">153 kg (337 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '154' ? 'selected' : ''); ?> value="154">154 kg (340 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '155' ? 'selected' : ''); ?> value="155">155 kg (342 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '156' ? 'selected' : ''); ?> value="156">156 kg (344 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '157' ? 'selected' : ''); ?> value="157">157 kg (346 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '158' ? 'selected' : ''); ?> value="158">158 kg (348 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '159' ? 'selected' : ''); ?> value="159">159 kg (351 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '160' ? 'selected' : ''); ?> value="160">160 kg (353 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '161' ? 'selected' : ''); ?> value="161">161 kg (355 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '162' ? 'selected' : ''); ?> value="162">162 kg (357 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '163' ? 'selected' : ''); ?> value="163">163 kg (359 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '164' ? 'selected' : ''); ?> value="164">164 kg (362 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '165' ? 'selected' : ''); ?> value="165">165 kg (364 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '166' ? 'selected' : ''); ?> value="166">166 kg (366 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '167' ? 'selected' : ''); ?> value="167">167 kg (368 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '168' ? 'selected' : ''); ?> value="168">168 kg (370 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '169' ? 'selected' : ''); ?> value="169">169 kg (373 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '170' ? 'selected' : ''); ?> value="170">170 kg (375 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '171' ? 'selected' : ''); ?> value="171">171 kg (377 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '172' ? 'selected' : ''); ?> value="172">172 kg (379 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '173' ? 'selected' : ''); ?> value="173">173 kg (381 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '174' ? 'selected' : ''); ?> value="174">174 kg (384 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '175' ? 'selected' : ''); ?> value="175">175 kg (386 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '176' ? 'selected' : ''); ?> value="176">176 kg (388 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '177' ? 'selected' : ''); ?> value="177">177 kg (390 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '178' ? 'selected' : ''); ?> value="178">178 kg (392 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '179' ? 'selected' : ''); ?> value="179">179 kg (395 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '180' ? 'selected' : ''); ?> value="180">180 kg (397 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '181' ? 'selected' : ''); ?> value="181">181 kg (399 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '182' ? 'selected' : ''); ?> value="182">182 kg (401 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '183' ? 'selected' : ''); ?> value="183">183 kg (403 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '184' ? 'selected' : ''); ?> value="184">184 kg (406 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '185' ? 'selected' : ''); ?> value="185">185 kg (408 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '186' ? 'selected' : ''); ?> value="186">186 kg (410 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '187' ? 'selected' : ''); ?> value="187">187 kg (412 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '188' ? 'selected' : ''); ?> value="188">188 kg (414 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '189' ? 'selected' : ''); ?> value="189">189 kg (417 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '190' ? 'selected' : ''); ?> value="190">190 kg (419 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '191' ? 'selected' : ''); ?> value="191">191 kg (421 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '192' ? 'selected' : ''); ?> value="192">192 kg (423 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '193' ? 'selected' : ''); ?> value="193">193 kg (425 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '194' ? 'selected' : ''); ?> value="194">194 kg (428 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '195' ? 'selected' : ''); ?> value="195">195 kg (430 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '196' ? 'selected' : ''); ?> value="196">196 kg (432 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '197' ? 'selected' : ''); ?> value="197">197 kg (434 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '198' ? 'selected' : ''); ?> value="198">198 kg (437 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '199' ? 'selected' : ''); ?> value="199">199 kg (439 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '200' ? 'selected' : ''); ?> value="200">200 kg (441 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '201' ? 'selected' : ''); ?> value="201">201 kg (443 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '202' ? 'selected' : ''); ?> value="202">202 kg (445 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '203' ? 'selected' : ''); ?> value="203">203 kg (448 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '204' ? 'selected' : ''); ?> value="204">204 kg (450 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '205' ? 'selected' : ''); ?> value="205">205 kg (452 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '206' ? 'selected' : ''); ?> value="206">206 kg (454 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '207' ? 'selected' : ''); ?> value="207">207 kg (456 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '208' ? 'selected' : ''); ?> value="208">208 kg (459 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '209' ? 'selected' : ''); ?> value="209">209 kg (461 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '210' ? 'selected' : ''); ?> value="210">210 kg (463 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '211' ? 'selected' : ''); ?> value="211">211 kg (465 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '212' ? 'selected' : ''); ?> value="212">212 kg (467 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '213' ? 'selected' : ''); ?> value="213">213 kg (470 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '214' ? 'selected' : ''); ?> value="214">214 kg (472 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '215' ? 'selected' : ''); ?> value="215">215 kg (474 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '216' ? 'selected' : ''); ?> value="216">216 kg (476 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '217' ? 'selected' : ''); ?> value="217">217 kg (478 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '218' ? 'selected' : ''); ?> value="218">218 kg (481 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '219' ? 'selected' : ''); ?> value="219">219 kg (483 lb)</option>
                                
                                <option <?php echo (isset($data[0]->weight) && $data[0]->weight == '220' ? 'selected' : ''); ?> value="220">220 kg (485 lb)</option>
                                
                        </select>
</div>
<hr>

<div class="form-group">
    <p>Body type:</p>
    <input type="radio" <?php echo (isset($data[0]->body_type) && $data[0]->body_type == 'Petite' ? 'checked' : ''); ?> name="bdytyp" value="Petite"> Petite
    <input type="radio" <?php echo (isset($data[0]->body_type) && $data[0]->body_type == 'Slim' ? 'checked' : ''); ?> name="bdytyp" value="Slim"> Slim
    <input type="radio" <?php echo (isset($data[0]->body_type) && $data[0]->body_type == 'Athletic' ? 'checked' : ''); ?> name="bdytyp" value="Athletic"> Athletic
    <input type="radio" <?php echo (isset($data[0]->body_type) && $data[0]->body_type == 'Average' ? 'checked' : ''); ?> name="bdytyp" value="Average"> Average
</div>
<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->body_type) && $data[0]->body_type == 'Few Extra Pounds' ? 'checked' : ''); ?> name="bdytyp" value="Few Extra Pounds"> Few Extra Pounds
    <input type="radio" <?php echo (isset($data[0]->body_type) && $data[0]->body_type == 'Full Figured' ? 'checked' : ''); ?> name="bdytyp" value="Full Figured"> Full Figured
    <input type="radio" <?php echo (isset($data[0]->body_type) && $data[0]->body_type == 'Large and Lovely' ? 'checked' : ''); ?> name="bdytyp" value="Large and Lovely"> Large and Lovely
</div>
<hr>

<div class="form-group">
    <p>Your ethnicity is mostly:</p>
    <input type="radio" <?php echo (isset($data[0]->ethnicity) && $data[0]->ethnicity == 'Arab (Middle Eastern)' ? 'checked' : ''); ?> name="ethnicity" value="Arab (Middle Eastern)"> Arab (Middle Eastern)
    <input type="radio" <?php echo (isset($data[0]->ethnicity) && $data[0]->ethnicity == 'Asian' ? 'checked' : ''); ?> name="ethnicity" value="Asian"> Asian
    <input type="radio" <?php echo (isset($data[0]->ethnicity) && $data[0]->ethnicity == 'Black' ? 'checked' : ''); ?> name="ethnicity" value="Black"> Black
    <input type="radio" <?php echo (isset($data[0]->ethnicity) && $data[0]->ethnicity == 'Caucasian (White)' ? 'checked' : ''); ?> name="ethnicity" value="Caucasian (White)"> Caucasian (White)
</div>
<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->ethnicity) && $data[0]->ethnicity == 'Hispanic / Latino' ? 'checked' : ''); ?> name="ethnicity" value="Hispanic / Latino"> Hispanic / Latino
    <input type="radio" <?php echo (isset($data[0]->ethnicity) && $data[0]->ethnicity == 'Indian' ? 'checked' : ''); ?> name="ethnicity" value="Indian"> Indian
    <input type="radio" <?php echo (isset($data[0]->ethnicity) && $data[0]->ethnicity == 'Arab (Middle Eastern)' ? 'checked' : ''); ?> name="ethnicity" value="Mixed"> Mixed
    <input type="radio" <?php echo (isset($data[0]->ethnicity) && $data[0]->ethnicity == 'Mixed' ? 'checked' : ''); ?>name="ethnicity" value="Pacific Islander"> Pacific Islander
</div>
<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->ethnicity) && $data[0]->ethnicity == 'Other' ? 'checked' : ''); ?> name="ethnicity" value="Other"> Other
    <input type="radio" <?php echo (isset($data[0]->ethnicity) && $data[0]->ethnicity == 'Prefer not to say' ? 'checked' : ''); ?>name="ethnicity" value="Prefer not to say"> Prefer not to say
</div>
<hr>

<div class="form-group">
    <p>Body art:</p>
    <input type="radio" <?php echo (isset($data[0]->body_art) && $data[0]->body_art == 'Branding' ? 'checked' : ''); ?> name="bdyart" value="Branding"> Branding
    <input type="radio" <?php echo (isset($data[0]->body_art) && $data[0]->body_art == 'Earrings' ? 'checked' : ''); ?> name="bdyart" value="Earrings"> Earrings
    <input type="radio" <?php echo (isset($data[0]->body_art) && $data[0]->body_art == 'Piercing' ? 'checked' : ''); ?> name="bdyart" value="Piercing"> Piercing
    <input type="radio" <?php echo (isset($data[0]->body_art) && $data[0]->body_art == 'Tattoo' ? 'checked' : ''); ?> name="bdyart" value="Tattoo"> Tattoo
</div>
<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->body_art) && $data[0]->body_art == 'Other' ? 'checked' : ''); ?> name="bdyart" value="Other"> Other
    <input type="radio" <?php echo (isset($data[0]->body_art) && $data[0]->body_art == 'None' ? 'checked' : ''); ?> name="bdyart" value="None"> None
    <input type="radio" <?php echo (isset($data[0]->body_art) && $data[0]->body_art == 'Prefer not to say' ? 'checked' : ''); ?> name="bdyart" value="Prefer not to say"> Prefer not to say
</div>
<hr>


<div class="form-group">
    <p>I consider my appearance as:</p>
    <input type="radio" <?php echo (isset($data[0]->appearance) && $data[0]->appearance == 'Below average' ? 'checked' : ''); ?> name="apprnce" value="Below average"> Below average
    <input type="radio" <?php echo (isset($data[0]->appearance) && $data[0]->appearance == 'Average' ? 'checked' : ''); ?> name="apprnce" value="Average"> Average
    <input type="radio" <?php echo (isset($data[0]->appearance) && $data[0]->appearance == 'Attractive' ? 'checked' : ''); ?> name="apprnce" value="Attractive"> Attractive
    <input type="radio" <?php echo (isset($data[0]->appearance) && $data[0]->appearance == 'Very attractive' ? 'checked' : ''); ?> name="apprnce" value="Very attractive"> Very attractive
</div>
<hr>
<h4>Your Lifestyle:</h4>

<div class="form-group">
    <p>Do you drink?</p>
    <input type="radio" <?php echo (isset($data[0]->drink) && $data[0]->drink == 'Do drink' ? 'checked' : ''); ?> name="drink" value="Do drink"> Do drink
    <input type="radio" <?php echo (isset($data[0]->drink) && $data[0]->drink == 'Dont drink' ? 'checked' : ''); ?> name="drink" value="Dont drink"> Don't drink
    <input type="radio" <?php echo (isset($data[0]->drink) && $data[0]->drink == 'Occasionally drink' ? 'checked' : ''); ?> name="drink" value="Occasionally drink"> Occasionally drink
</div>
<hr>

<div class="form-group">
    <p>Do you smoke?</p>
    <input type="radio" <?php echo (isset($data[0]->smoke) && $data[0]->smoke == 'Do smoke' ? 'checked' : ''); ?> name="smoke" value="Do smoke"> Do smoke
    <input type="radio" <?php echo (isset($data[0]->smoke) && $data[0]->smoke == 'Dont smoke' ? 'checked' : ''); ?> name="smoke" value="Dont smoke"> Don't smoke
    <input type="radio" <?php echo (isset($data[0]->smoke) && $data[0]->smoke == 'Occasionally smoke' ? 'checked' : ''); ?> name="smoke" value="Occasionally smoke"> Occasionally smoke
</div>
<hr>

<div class="form-group">
    <p>Marital Status:</p>
    <input type="radio" <?php echo (isset($data[0]->relationship) && $data[0]->relationship == 'Single' ? 'checked' : ''); ?> name="rltnshp" value="Single"> Single
    <input type="radio" <?php echo (isset($data[0]->relationship) && $data[0]->relationship == 'Separated' ? 'checked' : ''); ?> name="rltnshp" value="Separated"> Separated
    <input type="radio" <?php echo (isset($data[0]->relationship) && $data[0]->relationship == 'Widowed' ? 'checked' : ''); ?> name="rltnshp" value="Widowed"> Widowed
</div>
<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->relationship) && $data[0]->relationship == 'Divorced' ? 'checked' : ''); ?> name="rltnshp" value="Divorced"> Divorced
    <input type="radio" <?php echo (isset($data[0]->relationship) && $data[0]->relationship == 'Other' ? 'checked' : ''); ?> name="rltnshp" value="Other"> Other
    <input type="radio" <?php echo (isset($data[0]->relationship) && $data[0]->relationship == 'Prefer not to say' ? 'checked' : ''); ?> name="rltnshp" value="Prefer not to say"> Prefer not to say
</div>
<hr>






<div class="form-group">
    <p>Occupation:</p>
     <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Administrative / Secretarial / Clerical' ? 'checked' : ''); ?> name="occptn" value="Administrative / Secretarial / Clerical"> Administrative / Secretarial / Clerical
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Advertising / Media' ? 'checked' : ''); ?> name="occptn" value="Advertising / Media"> Advertising / Media
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Artistic / Creative / Performance' ? 'checked' : ''); ?> name="occptn" value="Artistic / Creative / Performance"> Artistic / Creative / Performance
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Construction / Trades' ? 'checked' : ''); ?> name="occptn" value="Construction / Trades"> Construction / Trades
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Domestic Helper' ? 'checked' : ''); ?> name="occptn" value="Domestic Helper"> Domestic Helper
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Education / Academic' ? 'checked' : ''); ?> name="occptn" value="Education / Academic"> Education / Academic
</div>

<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Entertainment / Media' ? 'checked' : ''); ?> name="occptn" value="Entertainment / Media"> Entertainment / Media
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Executive / Management / HR' ? 'checked' : ''); ?> name="occptn" value="Executive / Management / HR"> Executive / Management / HR
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Farming / Agriculture' ? 'checked' : ''); ?> name="occptn" value="Farming / Agriculture"> Farming / Agriculture
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Finance / Banking / Real Estate' ? 'checked' : ''); ?> name="occptn" value="Finance / Banking / Real Estate"> Finance / Banking / Real Estate
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Fire / law enforcement / security' ? 'checked' : ''); ?> name="occptn" value="Fire / law enforcement / security"> Fire / law enforcement / security
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Hair Dresser / Personal Grooming' ? 'checked' : ''); ?> name="occptn" value="Hair Dresser / Personal Grooming"> Hair Dresser / Personal Grooming
</div>

<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'IT / Communications' ? 'checked' : ''); ?> name="occptn" value="IT / Communications"> IT / Communications
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Laborer / Manufacturing' ? 'checked' : ''); ?> name="occptn" value="Laborer / Manufacturing"> Laborer / Manufacturing
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Legal' ? 'checked' : ''); ?> name="occptn" value="Legal"> Legal
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Medical / Dental / Veterinary' ? 'checked' : ''); ?> name="occptn" value="Medical / Dental / Veterinary"> Medical / Dental / Veterinary
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Military' ? 'checked' : ''); ?> name="occptn" value="Military"> Military
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Nanny / Child care' ? 'checked' : ''); ?> name="occptn" value="Nanny / Child care"> Nanny / Child care
</div>

<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'No occupation / Stay at home' ? 'checked' : ''); ?> name="occptn" value="No occupation / Stay at home"> No occupation / Stay at home
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Non-profit / clergy / social services' ? 'checked' : ''); ?> name="occptn" value="Non-profit / clergy / social services"> Non-profit / clergy / social services
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Political / Govt / Civil Service' ? 'checked' : ''); ?> name="occptn" value="Political / Govt / Civil Service"> Political / Govt / Civil Service
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Retail / Food services' ? 'checked' : ''); ?> name="occptn" value="Retail / Food services"> Retail / Food services
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Retired' ? 'checked' : ''); ?> name="occptn" value="Retired"> Retired
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Sales / Marketing' ? 'checked' : ''); ?> name="occptn" value="Sales / Marketing"> Sales / Marketing
</div>

<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Self Employed' ? 'checked' : ''); ?> name="occptn" value="Self Employed"> Self Employed
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Sports / recreation' ? 'checked' : ''); ?> name="occptn" value="Sports / recreation"> Sports / recreation
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Student' ? 'checked' : ''); ?> name="occptn" value="Student"> Student
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Technical / Science / Engineering' ? 'checked' : ''); ?> name="occptn" value="Technical / Science / Engineering"> Technical / Science / Engineering
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Transportation' ? 'checked' : ''); ?> name="occptn" value="Transportation"> Transportation
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Travel / Hospitality' ? 'checked' : ''); ?> name="occptn" value="Travel / Hospitality"> Travel / Hospitality
</div>

<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Unemployed' ? 'checked' : ''); ?> name="occptn" value="Unemployed"> Unemployed
    <input type="radio" <?php echo (isset($data[0]->occupation) && $data[0]->occupation == 'Other' ? 'checked' : ''); ?> name="occptn" value="Other"> Other
</div>
<hr>

<div class="form-group">
    <p>Employment status:</p>
    <input type="radio" <?php echo (isset($data[0]->emplyment_status) && $data[0]->emplyment_status == 'Student' ? 'checked' : ''); ?> name="empstatus" value="Student"> Student
    <input type="radio" <?php echo (isset($data[0]->emplyment_status) && $data[0]->emplyment_status == 'Part Time' ? 'checked' : ''); ?> name="empstatus" value="Part Time"> Part Time
    <input type="radio" <?php echo (isset($data[0]->emplyment_status) && $data[0]->emplyment_status == 'Full Time' ? 'checked' : ''); ?> name="empstatus" value="Full Time"> Full Time
    <input type="radio" <?php echo (isset($data[0]->emplyment_status) && $data[0]->emplyment_status == 'Homemaker' ? 'checked' : ''); ?> name="empstatus" value="Homemaker"> Homemaker
    <input type="radio" <?php echo (isset($data[0]->emplyment_status) && $data[0]->emplyment_status == 'Retired' ? 'checked' : ''); ?> name="empstatus" value="Retired"> Retired
    <input type="radio" <?php echo (isset($data[0]->emplyment_status) && $data[0]->emplyment_status == 'Not Employed' ? 'checked' : ''); ?> name="empstatus" value="Not Employed"> Not Employed
</div>

<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->emplyment_status) && $data[0]->emplyment_status == 'Other' ? 'checked' : ''); ?> name="empstatus" value="Other"> Other
    <input type="radio" <?php echo (isset($data[0]->emplyment_status) && $data[0]->emplyment_status == 'Prefer not to say' ? 'checked' : ''); ?> name="empstatus" value="Prefer not to say"> Prefer not to say
</div>
<hr>

<div class="form-group">
    <p>Annual Income:</p>
    <input type="text" class="form-control" name="income" value="<?php echo $data[0]->annual_income; ?>">
</div>
<hr>



<div class="form-group">
    <p>Relationship you're looking for:</p>
    <input type="checkbox" name="lookingfr[]" value="Penpal"  <?php echo (in_array('Penpal', explode(',', $data[0]->looking_for)) ? 'checked' : ''); ?>> Penpal
    <input type="checkbox" name="lookingfr[]" value="Friendship" <?php echo (in_array('Friendship', explode(',', $data[0]->looking_for)) ? 'checked' : ''); ?>> Friendship
    <input type="checkbox" name="lookingfr[]" value="Romance / Dating" <?php echo (in_array('Romance / Dating', explode(',', $data[0]->looking_for)) ? 'checked' : ''); ?>> Romance / Dating
    <input type="checkbox" name="lookingfr[]" value="Long Term Relationship" <?php echo (in_array('Long Term Relationship', explode(',', $data[0]->looking_for)) ? 'checked' : ''); ?>> Long Term Relationship
</div>
<hr>

<h4>Your Background / Cultural Values</h4>
<div class="form-group">
    <p>Nationality:</p>
    <input type="text" class="form-control" name="ntnality" value="<?php echo $data[0]->nationality; ?>">
</div>
<hr>

<div class="form-group">
    <p>Education:</p>
    <input type="radio" <?php echo (isset($data[0]->education) && $data[0]->education == 'Primary (Elementary) School' ? 'checked' : ''); ?> name="education" value="Primary (Elementary) School"> Primary (Elementary) School
    <input type="radio" <?php echo (isset($data[0]->education) && $data[0]->education == 'Middle School / Junior High' ? 'checked' : ''); ?> name="education" value="Middle School / Junior High"> Middle School / Junior High
    <input type="radio" <?php echo (isset($data[0]->education) && $data[0]->education == 'High School' ? 'checked' : ''); ?> name="education" value="High School"> High School
    <input type="radio" <?php echo (isset($data[0]->education) && $data[0]->education == 'Vocational College' ? 'checked' : ''); ?> name="education" value="Vocational College"> Vocational College
    <input type="radio" <?php echo (isset($data[0]->education) && $data[0]->education == 'Bachelors Degree' ? 'checked' : ''); ?> name="education" value="Bachelors Degree"> Bachelors Degree
    <input type="radio" <?php echo (isset($data[0]->education) && $data[0]->education == 'Masters Degree' ? 'checked' : ''); ?> name="education" value="Masters Degree"> Masters Degree
</div>

<div class="form-group">
 <input type="radio" <?php echo (isset($data[0]->education) && $data[0]->education == 'PhD or Doctorate' ? 'checked' : ''); ?> name="education" value="PhD or Doctorate"> PhD or Doctorate
</div>
<hr>

<div class="form-group">
    <p>Langauges Spoken:</p>
    <input type="text" class="form-control" name="langspoke" value="<?php echo $data[0]->language_spoke; ?>">
</div>
<hr>

<div class="form-group">
    <p>English language ability::</p>
    <input type="radio" <?php echo (isset($data[0]->eng_lang_ability) && $data[0]->eng_lang_ability == 'None' ? 'checked' : ''); ?> name="engablty" value="None"> None
    <input type="radio" <?php echo (isset($data[0]->eng_lang_ability) && $data[0]->eng_lang_ability == 'Some' ? 'checked' : ''); ?> name="engablty" value="Some"> Some
    <input type="radio" <?php echo (isset($data[0]->eng_lang_ability) && $data[0]->eng_lang_ability == 'Good' ? 'checked' : ''); ?> name="engablty" value="Good"> Good
    <input type="radio" <?php echo (isset($data[0]->eng_lang_ability) && $data[0]->eng_lang_ability == 'Very Good' ? 'checked' : ''); ?> name="engablty" value="Very Good"> Very Good
    <input type="radio" <?php echo (isset($data[0]->eng_lang_ability) && $data[0]->eng_lang_ability == 'Fluent' ? 'checked' : ''); ?> name="engablty" value="Fluent"> Fluent
</div>
<hr>

<div class="form-group">
    <p>Religion:</p>
    <select name="religion" class="form-control">
                        
                                <option>Please Select...</option>
                            
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Baháí' ? 'selected' : ''); ?> >Baháí</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Buddhist' ? 'selected' : ''); ?> >Buddhist</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Christian - Catholic' ? 'selected' : ''); ?> >Christian - Catholic</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Christian - Other' ? 'selected' : ''); ?> >Christian - Other</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Christian - Protestant' ? 'selected' : ''); ?> >Christian - Protestant</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Hindu' ? 'selected' : ''); ?> >Hindu</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Islam' ? 'selected' : ''); ?> >Islam</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Jainism' ? 'selected' : ''); ?> >Jainism</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Jewish' ? 'selected' : ''); ?> >Jewish</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Parsi' ? 'selected' : ''); ?> >Parsi</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Shintoism' ? 'selected' : ''); ?> >Shintoism</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Sikhism' ? 'selected' : ''); ?> >Sikhism</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Taoism' ? 'selected' : ''); ?> >Taoism</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Other' ? 'selected' : ''); ?> >Other</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'No religion' ? 'selected' : ''); ?> >No religion</option>
                                
                                <option <?php echo (isset($data[0]->religion) && $data[0]->religion == 'Prefer not to say' ? 'selected' : ''); ?> >Prefer not to say</option>
                                
                        </select>
</div>
<hr>

<div class="form-group">
    <p>Religious Values:</p>
    <input type="radio" <?php echo (isset($data[0]->religious_view) && $data[0]->religious_view == 'Not Religious' ? 'checked' : ''); ?> name="rlgsval" value="Not Religious"> Not Religious
    <input type="radio" <?php echo (isset($data[0]->religious_view) && $data[0]->religious_view == 'Religious' ? 'checked' : ''); ?> name="rlgsval" value="Religious"> Religious
    <input type="radio" <?php echo (isset($data[0]->religious_view) && $data[0]->religious_view == 'Very Religious' ? 'checked' : ''); ?> name="rlgsval" value="Very Religious"> Very Religious
</div>
<hr>
 
<div class="form-group">
    <p>Star sign:</p>
    <input type="radio" <?php echo (isset($data[0]->star_sign) && $data[0]->star_sign == 'Aquarius' ? 'checked' : ''); ?> name="starsign" value="Aquarius"> Aquarius
    <input type="radio" <?php echo (isset($data[0]->star_sign) && $data[0]->star_sign == 'Aries' ? 'checked' : ''); ?> name="starsign" value="Aries"> Aries
    <input type="radio" <?php echo (isset($data[0]->star_sign) && $data[0]->star_sign == 'Cancer' ? 'checked' : ''); ?> name="starsign" value="Cancer"> Cancer
    <input type="radio" <?php echo (isset($data[0]->star_sign) && $data[0]->star_sign == 'Capricorn' ? 'checked' : ''); ?> name="starsign" value="Capricorn"> Capricorn
    <input type="radio" <?php echo (isset($data[0]->star_sign) && $data[0]->star_sign == 'Gemini' ? 'checked' : ''); ?> name="starsign" value="Gemini"> Gemini
    <input type="radio" <?php echo (isset($data[0]->star_sign) && $data[0]->star_sign == 'Leo' ? 'checked' : ''); ?> name="starsign" value="Leo"> Leo

</div>

<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->star_sign) && $data[0]->star_sign == 'Libra' ? 'checked' : ''); ?> name="starsign" value="Libra"> Libra
    <input type="radio" <?php echo (isset($data[0]->star_sign) && $data[0]->star_sign == 'Pisces' ? 'checked' : ''); ?> name="starsign" value="Pisces"> Pisces
    <input type="radio" <?php echo (isset($data[0]->star_sign) && $data[0]->star_sign == 'Sagittarius' ? 'checked' : ''); ?> name="starsign" value="Sagittarius"> Sagittarius
    <input type="radio" <?php echo (isset($data[0]->star_sign) && $data[0]->star_sign == 'Scorpio' ? 'checked' : ''); ?> name="starsign" value="Scorpio"> Scorpio
    <input type="radio" <?php echo (isset($data[0]->star_sign) && $data[0]->star_sign == 'Taurus' ? 'checked' : ''); ?> name="starsign" value="Taurus"> Taurus
    <input type="radio" <?php echo (isset($data[0]->star_sign) && $data[0]->star_sign == 'Virgo' ? 'checked' : ''); ?> name="starsign" value="Virgo"> Virgo
</div>

<div class="form-group">
    <input type="radio" <?php echo (isset($data[0]->star_sign) && $data[0]->star_sign == "Don't Know" ? 'checked' : ''); ?> name="starsign" value="Don't Know"> Don't Know
</div>
<hr>

<h4>In your own words</h4>
<div class="form-group">
<p>Your profile heading:</p>
<textarea name="prflhdng" class="form-control" required><?php echo $data[0]->heading; ?></textarea>
</div>
<hr>

<div class="form-group">
<p>A little about yourself:</p>
<textarea name="about" class="form-control" required><?php echo $data[0]->about; ?></textarea>
</div>
<hr>
<div class="form-group">
<p>What you're looking for in a partner:</p>
<textarea name="prtnrdesc" class="form-control" required><?php echo $data[0]->prtnr_typ_desc; ?></textarea>
</div>
<hr>

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

</form>
</div>
<div class="col-md-2"></div>
</div>
</div>


@include('footer')