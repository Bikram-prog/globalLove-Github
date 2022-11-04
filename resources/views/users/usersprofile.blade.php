@include('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>


<style type="text/css">
/* img {
display: block;
max-width: 100%;
} */
.preview {
overflow: hidden;
width: 160px; 
height: 160px;
margin: 10px;
border: 1px solid red;
}
.modal-lg{
max-width: 1000px !important;
}
</style>

<style type="text/css">
	.date-img {
		width: 300px;
    height: 300px;
    object-fit: cover;
	}
    td:first-child {
        font-weight: 700;
    }
    
</style>
<?php
    //dd(strtotime($data[0]->dob));
    // $from = new DateTime(date("Y-m-d",strtotime(str_replace('-', '/',$data[0]->dob))));      
    // $to   = new DateTime('today');
    // $age =  $from->diff($to)->y;

    $year_then = substr($data[0]->dob, -4);
    $nowyear = date('Y');

    $age = $nowyear - $year_then;


?>




<div class="container">
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-md-4">
			<img loading="lazy" class="card-img-top img-thumbnail date-img" id="main_pic" src="<?php echo $data[0]->prfl_photo_path; ?>">
            <div style="width: 100%">
                <input type="file" style="display: none;" class="image" name="photo" id="p_pic">
                @if($data[0]->email_verified_at == '')
                <p style="margin-top: 5px; font-weight: 700;font-style: italic;"><i class="fas fa-user-clock"></i> You have to verify your email for uploading profile picture.</p>
                @elseif($data[0]->prfl_approve_status == '1')
                <a onclick="openFile()" href="javascript::void(0)" class="btn btn-link">
                <i class="fa fa-camera"></i> Change Profile Photo            </a>
                @elseif($data[0]->prfl_photo_path == 'https://www.globallove.online/images/male-user-placeholder.png' && $data[0]->email_verified_at != '')
                <a onclick="openFile()" href="javascript::void(0)" class="btn btn-link">
                <i class="fa fa-camera"></i> Change Profile Photo            </a>
                @else
                <p style="margin-top: 5px; font-weight: 700;font-style: italic;"><i class="fas fa-user-clock"></i> Your photo was successfully uploaded and is now pending review.All photos are reviewed by our customer satisfaction team and should be processed within 24hours.</p>
                @endif
                <br>
                <a href="/photoupload" class="btn btn-success">
                    <i class="fa fa-camera"></i> Upload Photos </a>
                    
                <a href="/provideoupload" class="btn btn-danger">
                    <i class="fa fa-camera"></i> Upload Videos </a>
            </div>

            @php

            $today = date('Y-m-d H:i:s');
            $premium_login = DB::Select("select * from payment_transactions where pt_u_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' and pt_end_date > '".$today."'");
            @endphp  
            
			@foreach($data as $pro)
                @if($pro->user_photo_path != '' && $pro->user_photo_path != $pro->prfl_photo_path)
                @if($pro->approve_status == '1')
                <img loading="lazy" onclick="changePhoto('{{ $pro->user_photo_path }}')" src="{{ $pro->user_photo_path }}" style="object-fit: cover;width: 100px;height: 100px; margin-right: 10px;margin-top: 20px; border-radius: 10px; cursor: pointer; float: left;" alt="">
                
                
                @endif
                @endif
                @endforeach
		</div>

		<div class="col-md-4">
            
			<h1> {{ $data[0]->name }}
            @if($data[0]->verify_approve_status == 1)
            <span style="font-weight: 600;
                color: #686de0;
                letter-spacing: 1.2px;
                font-size: 17px;
                margin-top: -25px;
                margin-left: 0px;"><i style="color:#686de0;" class="fas fa-check-circle"></i></span>
            @endif
            <a href="/editprofile"><i class="fas fa-user-edit"></i></a></h1>
            @if(count($premium_login) == 1) 
            <p style="font-weight: 600;
                color: #5eba00;
                letter-spacing: 1.2px;
                font-size: 17px;
                margin-top: -15px;"><i class="fas fa-star"></i> Premium</p>
                @endif
            
            @if(count($heading) > 0  and isset($heading) )
                @if($heading[0]->status == 1)
                <div><i class="fa fa-quote-left" aria-hidden="true" style="
                    color: #599021;
                    float: left;
                    font-size: 20px;
                "></i><p style="font-weight: 500;color: #444;font-size: 32px;font-weight: bold;"> {{ $data[0]->heading }}</p></div>
                @else
                     <p style="font-weight: 500;color: #444;">Pending for approval</p>
                @endif        
            @endif    
            <p style="font-weight: 500;color: #444;">{{ $age }} • <i class="fa fa-map-marker" style="    font-size: 19px;
    color: #676767;" ></i> {{ $data[0]->country }}</p>
            <p style="font-weight: 500;color: #444;">{{ $data[0]->sex }} {{ $data[0]->relationship }}</p>
            @if($data[0]->match_seeking != '')
            <p style="font-weight: 500;color: #444;">Looking for: {{ $data[0]->match_seeking }} , {{ $data[0]->match_min_age }} - {{ $data[0]->match_max_age }}  </p>
            @endif

            

            
		</div>

        <div class="col-md-4 mt-5">
            
        </div>
		
</div>
</div>

<div class="container">
	<div class="row">
<div class="col-md-4"></div>
<div class="col-md-8">
    <h3>My Photos</h3>
            
            <div class="container">
                <div class="row">
                    @if(count($photopost) == 0)
                    <p style="font-size: 20px;color:#E9343F;text-align: center;"><b>No photo uploaded yet.</b></p>
                    @else
                    
                    @foreach($photopost as $phtopst)
                    @if($phtopst->pro_pic_status == '0')
                    <div class="col-md-3">
                        <img loading="lazy" src="{{ $phtopst->pro_pic_path }}" style="object-fit: cover;width: 300px;height: 300px; margin-right: 10px;margin-top: 20px; border-radius: 10px; cursor: pointer; float: left;" alt="">
                        <p style="margin-top: 5px; font-weight: 700;font-style: italic;"><i class="fas fa-user-clock"></i> Your photo was successfully uploaded and is now pending review.All photos are reviewed by our customer satisfaction team and should be processed within 24hours.</p>
                    </div>
                    @else
                    <div class="col-md-3">
                        <img loading="lazy" src="{{ $phtopst->pro_pic_path }}" style="object-fit: cover;width: 300px;height: 300px; margin-right: 10px;margin-top: 20px; border-radius: 10px; cursor: pointer; float: left;" alt="">
                        <a href="/deletephotopost/{{ $phtopst->pro_pic_id }}" class="btn btn-sm btn-danger" style="margin-top: 10px;float:right;" onclick="return confirm('Are you sure you want to delete this post?');"><i class="fas fa-trash"></i></a>

                        @if($phtopst->pro_pic_hide_status == 0)
                        <a class="btn btn-sm btn-success" style="margin-top: 10px;float: right; margin-right: 15px;" href="/hidephotopost/{{ $phtopst->pro_pic_id }}" rel="tooltip" title="Click here for hide your image from others"><i class="fas fa-lock-open"></i></a>
                        @else
                        <a class="btn btn-sm btn-success" style="margin-top: 10px;float: right; margin-right: 15px;" href="/unhidephotopost/{{ $phtopst->pro_pic_id }}" rel="tooltip" title="Click here for unhide your image from others"><i class="fas fa-lock"></i></a>
                        @endif
                        
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>

            <h3>My Videos</h3>

            <div class="container">
                <div class="row">
                    @if(count($videopost) == 0)
                    <p style="font-size: 20px;color:#E9343F;text-align: center;"><b>No video uploaded yet.</b></p>
                    @else
                    @foreach($videopost as $vidopst)
                    @if($vidopst->pro_vid_status == '0')
                    <div class="col-md-6 mt-3">
                        <div class="embed-responsive embed-responsive-4by3">
                            <video controls muted class="embed-responsive-item">
                                <source src="{{ $vidopst->pro_vid_path }}" type="video/mp4">
                              Your browser does not support the video tag.
                              </video>
                          </div>
                          <p style="margin-top: 5px; font-weight: 700;font-style: italic;"><i class="fas fa-user-clock"></i> Your video was successfully uploaded and is now pending review.All videos are reviewed by our customer satisfaction team and should be processed within 24hours.</p>
                    </div>

                    @else
                    <div class="col-md-6 mt-3">
                        <div class="embed-responsive embed-responsive-4by3">
                            <video controls muted class="embed-responsive-item">
                                <source src="{{ $vidopst->pro_vid_path }}" type="video/mp4">
                              Your browser does not support the video tag.
                              </video>
                          </div>
                        <p style="margin-top: 10px;text-align: center;"><b><a href="/deletevideopost/{{ $vidopst->pro_vid_id }}" style="color:#E9343F;" onclick="return confirm('Are you sure you want to delete this post?');">Delete Videos</a></b></p>
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>

            

            <table class="table table-striped mt-5 table-bordered">
                <tr style="background: #eae6ab61;">
                    <td style="color: #E9343F; font-weight: 700;">Overview</td>
                    <td style="color: #E9343F; font-weight: 700;">{{ $data[0]->name }}</td>
                    <td style="color: #E9343F; font-weight: 700;">Looking for in a partner</td>
                </tr>
                
                <tr>
                    <td>Education: </td>
                    <td>{{ $data[0]->education }}</td>
                    @if($data[0]->match_education != '')
                    <td>{{ $data[0]->match_education }}</td>
                    @else
                    <td>Any</td>
                    @endif
                </tr>
                <tr>
                    <td>Drink: </td>
                   <td>{{ $data[0]->drink }}</td>
                    @if($data[0]->match_drink != '')
                    <td>{{ $data[0]->match_drink }}</td>
                    @else
                    <td>Any</td>
                    @endif
                </tr>
                <tr>
                    <td>Smoke: </td>
                    <td>{{ $data[0]->smoke }}</td>
                    @if($data[0]->match_smoke != '')
                    <td>{{ $data[0]->match_smoke }}</td>
                    @else
                    <td>Any</td>
                    @endif
                </tr>
                <tr>
                    <td>Religion: </td>
                    <td>{{ $data[0]->religion }}</td>
                    @if($data[0]->match_religion != '')
                    <td>{{ $data[0]->match_religion }}</td>
                    @else
                    <td>Any</td>
                    @endif
                </tr>

                <tr>
                    <td>Occupation: </td>
                    <td>{{ $data[0]->occupation }}</td>
                    @if($data[0]->match_occupation != '')
                    <td>{{ $data[0]->match_occupation }}</td>
                    @else
                    <td>Any</td>
                    @endif
                </tr>
               
            
            </table>
</div>
</div>
</div>

<div class="container">
	<div class="row" style="margin-top: 15px;">
		<div class="col-md-12">
			<h4 style="color: #E9343F; font-weight: 700;">Member Overview</h4>
            @if(count($about) > 0  and isset($about) )
                @if($about[0]->status == 1)
                    <p>{{ $data[0]->about }}</p>
                @else
                    <p>Pending for approval</p>
                @endif        
            @endif    

			<h4 style="color: #E9343F; font-weight: 700;">Seeking</h4>
            @if(count($prtnr_typ_desc) > 0  and isset($prtnr_typ_desc) )
                @if($prtnr_typ_desc[0]->status == 1)
                    @if($data[0]->prtnr_typ_desc != '')
                     <p>{{ $data[0]->prtnr_typ_desc }}</p>
                    @else
                     <p>Any</p>
                    @endif
                @else
                    <p>Pending for approval</p>
                @endif        
            @endif   
           
		</div>
	</div>
</div>



<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
                <tr style="background: #eae6ab61;">
                    <td style="color: #E9343F; font-weight: 700;">More About Me</td>
                    <td style="color: #E9343F; font-weight: 700;">{{ $data[0]->name }}</td>
                    <td style="color: #E9343F; font-weight: 700;">Looking for in a partner</td>
                </tr>
				<tr>
					<td colspan="3" style="color: #E9343F; font-weight: 700;background: #eae6ab61;">Basic</td>
					
				</tr>
				<tr>
					<td>Gender: </td>
					<td>{{ $data[0]->sex }}</td>
					@if($data[0]->match_seeking != '')
                    <td>{{ $data[0]->match_seeking }}</td>
                    @else
                    <td>Any</td>
                    @endif
				</tr>
				<tr>
					<td>Age: </td>
					<td>{{ $age }}</td>
					@if($data[0]->match_min_age != '')
                    <td>{{ $data[0]->match_min_age }} - {{ $data[0]->match_max_age }}</td>
                    @else
                    <td>Any</td>
                    @endif
				</tr>
				<tr>
					<td>Lives in: </td>
					<td>{{ $data[0]->country }}</td>
					@if($data[0]->match_country != '')
                    <td>{{ $data[0]->match_country }}</td>
                    @else
                    <td>Any</td>
                    @endif
				</tr>
				<tr>
					<td>Relocate: </td>
					<td>{{ $data[0]->relocate }}</td>
					<td>Any</td>
				</tr>

				<tr>
					<td colspan="3" style="color: #E9343F; font-weight: 700;background: #eae6ab61;">Appearance</td>
					
				</tr>
				<tr>
					<td>Hair color: </td>
					<td>{{ $data[0]->hair_color }}</td>
					<td>Any</td>
				</tr>
				<tr>
					<td>Eye color: </td>
					<td>{{ $data[0]->eye_color }}</td>
					<td>Any</td>
				</tr>
				<tr>
					<td>Height: </td>
					<td>{{ $data[0]->height }}</td>
					@if($data[0]->match_min_height != '')
                    <td>{{ $data[0]->match_min_height }} - {{ $data[0]->match_max_height }}</td>
                    @else
                    <td>Any</td>
                    @endif
				</tr>
				<tr>
					<td>Weight: </td>
					<td>{{ $data[0]->weight }}</td>
					@if($data[0]->match_min_weight != '')
                    <td>{{ $data[0]->match_min_weight }} - {{ $data[0]->match_max_weight }}</td>
                    @else
                    <td>Any</td>
                    @endif
				</tr>
				<tr>
					<td>Body style: </td>
					<td>{{ $data[0]->body_type }}</td>
					@if($data[0]->match_body_type != '')
                    <td>{{ $data[0]->match_body_type }}</td>
                    @else
                    <td>Any</td>
                    @endif
				</tr>
				<tr>
					<td>Ethnicity: </td>
					<td>{{ $data[0]->ethnicity }}</td>
					@if($data[0]->match_ethnicity != '')
                    <td>{{ $data[0]->match_ethnicity }}</td>
                    @else
                    <td>Any</td>
                    @endif
				</tr>
				<tr>
					<td>Body art: </td>
					<td>{{ $data[0]->body_art }}</td>
					@if($data[0]->match_body_art != '')
                    <td>{{ $data[0]->match_body_art }}</td>
                    @else
                    <td>Any</td>
                    @endif
				</tr>
				<tr>
					<td>Appearance: </td>
					<td>{{ $data[0]->appearance }}</td>
					@if($data[0]->match_appearance != '')
                    <td>{{ $data[0]->match_appearance }}</td>
                    @else
                    <td>Any</td>
                    @endif
				</tr>

				<tr>
					<td colspan="3" style="color: #E9343F; font-weight: 700;background: #eae6ab61;">Lifestyle</td>
					
				</tr>
				<tr>
					<td>Drink: </td>
					<td>{{ $data[0]->drink }}</td>
					@if($data[0]->match_drink != '')
                    <td>{{ $data[0]->match_drink }}</td>
                    @else
                    <td>Any</td>
                    @endif
				</tr>
				<tr>
					<td>Smoke: </td>
					<td>{{ $data[0]->smoke }}</td>
					@if($data[0]->match_smoke != '')
                    <td>{{ $data[0]->match_smoke }}</td>
                    @else
                    <td>Any</td>
                    @endif
				</tr>
				 <tr>
                    <td>Marital Status: </td>
                    <td>{{ $data[0]->relationship }}</td>
                    @if($data[0]->match_marital_status != '')
                    <td>{{ $data[0]->match_marital_status }}</td>
                    @else
                    <td>Any</td>
                    @endif
                    
                </tr>
                
                <tr>
                    <td>Occupation: </td>
                    <td>{{ $data[0]->occupation }}</td>
                    @if($data[0]->match_occupation != '')
                    <td>{{ $data[0]->match_occupation }}</td>
                    @else
                    <td>Any</td>
                    @endif
                    
                </tr>
                <tr>
                    <td>Employment status: </td>
                    <td>{{ $data[0]->emplyment_status }}</td>
                    @if($data[0]->match_emp_status != '')
                    <td>{{ $data[0]->match_emp_status }}</td>
                    @else
                    <td>Any</td>
                    @endif
                    
                </tr>
                <tr>
                    <td>Income: </td>
                    <td>{{ $data[0]->annual_income }}</td>
                    @if($data[0]->match_income != '')
                    <td>{{ $data[0]->match_income }}</td>
                    @else
                    <td>Any</td>
                    @endif
                    
                </tr>
                
                <tr>
                    <td colspan="3" style="color: #E9343F; font-weight: 700;background: #eae6ab61;">Background / Cultural Values</td>
                    
                </tr>
                <tr>
                    <td>Nationality: </td>
                    <td>{{ $data[0]->nationality }}</td>
                    @if($data[0]->match_nationality != '')
                    <td>{{ $data[0]->match_nationality }}</td>
                    @else
                    <td>Any</td>
                    @endif
                    
                </tr>
                <tr>
                    <td>Education: </td>
                    <td>{{ $data[0]->education }}</td>
                    @if($data[0]->match_education != '')
                    <td>{{ $data[0]->match_education }}</td>
                    @else
                    <td>Any</td>
                    @endif
                    
                </tr>
                <tr>
                    <td>Languages spoken: </td>
                    <td>{{ $data[0]->language_spoke }}</td>
                    @if($data[0]->match_lang_spoken != '')
                    <td>{{ $data[0]->match_lang_spoken }}</td>
                    @else
                    <td>Any</td>
                    @endif
                    
                </tr>
                <tr>
                    <td>English ability: </td>
                    <td>{{ $data[0]->eng_lang_ability }}</td>
                    @if($data[0]->match_eng_ability != '')
                    <td>{{ $data[0]->match_eng_ability }}</td>
                    @else
                    <td>Any</td>
                    @endif
                    
                </tr>
                <tr>
                    <td>Religion: </td>
                    <td>{{ $data[0]->religion }}</td>
                    @if($data[0]->match_religion != '')
                    <td>{{ $data[0]->match_religion }}</td>
                    @else
                    <td>Any</td>
                    @endif
                    
                </tr>
                <tr>
                    <td>Religious values: </td>
                    <td>{{ $data[0]->religious_view }}</td>
                    @if($data[0]->match_religious_values != '')
                    <td>{{ $data[0]->match_religious_values }}</td>
                    @else
                    <td>Any</td>
                    @endif
                    
                </tr>
                <tr>
                    <td>Star sign: </td>
                    <td>{{ $data[0]->star_sign }}</td>
                    @if($data[0]->match_star_sign != '')
                    <td>{{ $data[0]->match_star_sign }}</td>
                    @else
                    <td>Any</td>
                    @endif
                    
                </tr>
			
			</table>
		</div>
	</div>
</div>

<div class="container">
	<div class="row" style="margin-top: 20px;">
		<div class="col-md-12">
			@if($data[0]->prsnl_movie != '')
			<h4 style="color: #E9343F; font-weight: 700;">What is your favorite movie?</h4>
			<p>{{ $data[0]->prsnl_movie }}</p>
			@endif
			@if($data[0]->prsnl_book != '')
			<h4 style="color: #E9343F; font-weight: 700;">What is your favorite book?</h4>
			<p>{{ $data[0]->prsnl_book }}</p>
			@endif
			@if($data[0]->prsnl_food != '')
			<h4 style="color: #E9343F; font-weight: 700;">What sort of food do you like?</h4>
			<p>{{ $data[0]->prsnl_food }}</p>
			@endif
			@if($data[0]->prsnl_music != '')
			<h4 style="color: #E9343F; font-weight: 700;">What sort of music do you like?</h4>
			<p>{{ $data[0]->prsnl_music }}</p>
			@endif
			@if($data[0]->prsnl_hobbies != '')
			<h4 style="color: #E9343F; font-weight: 700;">What are your hobbies and interests?</h4>
			<p>{{ $data[0]->prsnl_hobbies }}</p>
			@endif
			@if($data[0]->prsnl_dress != '')
			<h4 style="color: #E9343F; font-weight: 700;">How would you describe your dress sense and physical appearance?</h4>
			<p>{{ $data[0]->prsnl_dress }}</p>
			@endif
			@if($data[0]->prsnl_humor != '')
			<h4 style="color: #E9343F; font-weight: 700;">How would you describe your sense of humor?</h4>
			<p>{{ $data[0]->prsnl_humor }}</p>
			@endif
			@if($data[0]->prsnl_personality != '')
			<h4 style="color: #E9343F; font-weight: 700;">How would you describe your personality?</h4>
			<p>{{ $data[0]->prsnl_personality }}</p>
			@endif
			@if($data[0]->prsnl_like_travel != '')
			<h4 style="color: #E9343F; font-weight: 700;">Where have you traveled or would like to travel to?</h4>
			<p>{{ $data[0]->prsnl_like_travel }}</p>
			@endif
			@if($data[0]->prsnl_diff_cul_prtnr != '')
			<h4 style="color: #E9343F; font-weight: 700;">How adaptive are you to having a partner from a different culture to your own?</h4>
			<p>{{ $data[0]->prsnl_diff_cul_prtnr }}</p>
			@endif

			@if($data[0]->persnl_rmntic_weeknd != '')
			<h4 style="color: #E9343F; font-weight: 700;">How would you spend a perfect romantic weekend?</h4>
			<p>{{ $data[0]->persnl_rmntic_weeknd }}</p>
			@endif
			@if($data[0]->persnl_prfct_match != '')
			<h4 style="color: #E9343F; font-weight: 700;">What sort of person would be your perfect match?</h4>
			<p>{{ $data[0]->persnl_prfct_match }}</p>
			@endif
		</div>
	</div>
</div>

<div class="container">
	<div class="row" style="margin-top: 100px;">
		<div class="col-md-12">
			<h4 style="color: #E9343F; font-weight: 700;">Safety Tip - We're here to help you find true love</h4>
			<p style="font-weight: 700;">Your time is valuable. Help us to identify and remove anyone who shouldn’t have a profile. Report anyone who tries to send you spam, promote a business or is not genuine in their pursuit of love or friendship by clicking the "Report Abuse" icon.</p>
		</div>
	</div>
</div>



@include('footer')

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<!-- <h5 class="modal-title" id="modalLabel"></h5> -->
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="img-container">
<div class="row">
<div class="col-md-8">
<img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
</div>
<div class="col-md-4">
<div class="preview"></div>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
<button type="button" class="btn btn-primary" id="crop">Crop</button>
</div>
</div>
</div>
</div>

<script>
var $modal = $('#modal');
var image = document.getElementById('image');
var cropper;
$("body").on("change", ".image", function(e){
var files = e.target.files;
var done = function (url) {
image.src = url;
$modal.modal('show');
};
var reader;
var file;
var url;
if (files && files.length > 0) {
file = files[0];
if (URL) {
done(URL.createObjectURL(file));
} else if (FileReader) {
reader = new FileReader();
reader.onload = function (e) {
done(reader.result);
};
reader.readAsDataURL(file);
}
}
});
$modal.on('shown.bs.modal', function () {
cropper = new Cropper(image, {
aspectRatio: 1,
viewMode: 3,
preview: '.preview'
});
}).on('hidden.bs.modal', function () {
cropper.destroy();
cropper = null;
});
$("#crop").click(function(){
canvas = cropper.getCroppedCanvas({
width: 300,
height: 300,
});
canvas.toBlob(function(blob) {
url = URL.createObjectURL(blob);
var reader = new FileReader();
reader.readAsDataURL(blob); 
reader.onloadend = function() {
var base64data = reader.result; 
$.ajax({
type: "POST",
dataType: "json",
url: "/propicaction",
data: {'_token': $('meta[name="csrf-token"]').attr('content'), 'image': base64data},
success: function(data){
console.log(data);
$modal.modal('hide');
alert("Your photo successfully uploaded");
window.location.href = '/profile';
}
});
}
});
})
</script>


<script type="text/javascript">
    function openFile() {
        $('#p_pic').trigger('click'); 
    }
    function changePhoto(url) {
        document.getElementById("main_pic").src = url;
    }
</script>