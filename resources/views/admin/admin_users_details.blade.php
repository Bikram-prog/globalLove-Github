@include('admin_header')

<style type="text/css">
    .date-img {
        width: 300px;
    height: 300px;
    object-fit: cover;
    }
    td:first-child {
        font-weight: 700;
    }

    .approve-btn {

margin-top: 98px;
}

@media only screen 
and (min-device-width : 320px) 
and (max-device-width : 480px) {

.approve-btn {

margin-top: 10px;
}
}
</style>
<?php
    //dd(strtotime($data[0]->dob));
    $from = new DateTime(date("Y-m-d",strtotime(str_replace('/', '-',$data[0]->dob))));      
    $to   = new DateTime('today');
    $age =  $from->diff($to)->y;


?>

<div class="container">
    <div class="row" style="margin-top: 15px;">
        
        <div class="col-md-4">
            <img class="card-img-top img-thumbnail date-img" id="main_pic" src="<?php echo $data[0]->prfl_photo_path; ?>">
            
      </div>

        <div class="col-md-6">
            <h1> {{ $data[0]->name }} </h1>
            @if(count($heading) > 0  and isset($heading) )
                @if($heading[0]->status == 1)
                    <p style="font-weight: 500;color: #444;">{{ $data[0]->heading }}</p>
                @else
                     <p style="font-weight: 500;color: #444;">Pending for approval</p>
                @endif        
            @endif    
            <p style="font-weight: 500;color: #444;">{{ $age }} • {{ $data[0]->s_city }} {{ $data[0]->s_state }} {{ $data[0]->country }}</p>
            <p style="font-weight: 500;color: #444;">{{ $data[0]->sex }} {{ $data[0]->relationship }}</p>
            @if($data[0]->match_seeking != '')
            <p style="font-weight: 500;color: #444;">Looking for: {{ $data[0]->match_seeking }} , {{ $data[0]->match_min_age }} - {{ $data[0]->match_max_age }}  </p>
            @endif

            

            <table class="table table-striped mt-5">
                <tr style="background: #eae6ab61;">
                    <td style="color: #f15052; font-weight: 700;">Overview</td>
                    <td style="color: #f15052; font-weight: 700;">{{ $data[0]->name }}</td>
                    <td style="color: #f15052; font-weight: 700;">Looking for in a partner</td>
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
            <div class="row">
                <div class="col-md-6">
                    
                    </div>
                <div class="col-md-6">
                    
                </div>
            </div>

            <div class="row mt-4">
              <div class="col-md-4"></div>
              <div class="col-md-4 text-center">
                <div>
                    
                </div>
              </div>
              <div class="col-md-4"></div>
            </div>

            
        </div>
        <div class="col-md-2">
            
                         
            <div class="like-toggle align-self-center ml-auto">
                   
            </div>
        </div>
        
</div>
</div>

<div class="container">
    <div class="row" style="margin-top: 15px;">
        <div class="col-md-12">
        <h4 style="color: #f15052; font-weight: 700;">Member Overview</h4>
            @if(count($about) > 0  and isset($about) )
                @if($about[0]->status == 1)
                    <p>{{ $data[0]->about }}</p>
                @else
                    <p>Pending for approval</p>
                @endif        
            @endif    

			<h4 style="color: #f15052; font-weight: 700;">Seeking</h4>
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
                    <td style="color: #f15052; font-weight: 700;">More About Me</td>
                    <td style="color: #f15052; font-weight: 700;">{{ $data[0]->name }}</td>
                    <td style="color: #f15052; font-weight: 700;">Looking for in a partner</td>
                </tr>
                <tr>
                    <td colspan="3" style="color: #f15052; font-weight: 700;background: #eae6ab61;">Basic</td>
                    
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
                    @if($data[0]->country != '')
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
                    <td colspan="3" style="color: #f15052; font-weight: 700;background: #eae6ab61;">Appearance</td>
                    
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
                    <td colspan="3" style="color: #f15052; font-weight: 700;background: #eae6ab61;">Lifestyle</td>
                    
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
                    <td colspan="3" style="color: #f15052; font-weight: 700;background: #eae6ab61;">Background / Cultural Values</td>
                    
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
            <h4 style="color: #f15052; font-weight: 700;">What is your favorite movie?</h4>
            <p>{{ $data[0]->prsnl_movie }}</p>
            @endif
            @if($data[0]->prsnl_book != '')
            <h4 style="color: #f15052; font-weight: 700;">What is your favorite book?</h4>
            <p>{{ $data[0]->prsnl_book }}</p>
            @endif
            @if($data[0]->prsnl_food != '')
            <h4 style="color: #f15052; font-weight: 700;">What sort of food do you like?</h4>
            <p>{{ $data[0]->prsnl_food }}</p>
            @endif
            @if($data[0]->prsnl_music != '')
            <h4 style="color: #f15052; font-weight: 700;">What sort of music do you like?</h4>
            <p>{{ $data[0]->prsnl_music }}</p>
            @endif
            @if($data[0]->prsnl_hobbies != '')
            <h4 style="color: #f15052; font-weight: 700;">What are your hobbies and interests?</h4>
            <p>{{ $data[0]->prsnl_hobbies }}</p>
            @endif
            @if($data[0]->prsnl_dress != '')
            <h4 style="color: #f15052; font-weight: 700;">How would you describe your dress sense and physical appearance?</h4>
            <p>{{ $data[0]->prsnl_dress }}</p>
            @endif
            @if($data[0]->prsnl_humor != '')
            <h4 style="color: #f15052; font-weight: 700;">How would you describe your sense of humor?</h4>
            <p>{{ $data[0]->prsnl_humor }}</p>
            @endif
            @if($data[0]->prsnl_personality != '')
            <h4 style="color: #f15052; font-weight: 700;">How would you describe your personality?</h4>
            <p>{{ $data[0]->prsnl_personality }}</p>
            @endif
            @if($data[0]->prsnl_like_travel != '')
            <h4 style="color: #f15052; font-weight: 700;">Where have you traveled or would like to travel to?</h4>
            <p>{{ $data[0]->prsnl_like_travel }}</p>
            @endif
            @if($data[0]->prsnl_diff_cul_prtnr != '')
            <h4 style="color: #f15052; font-weight: 700;">How adaptive are you to having a partner from a different culture to your own?</h4>
            <p>{{ $data[0]->prsnl_diff_cul_prtnr }}</p>
            @endif

            @if($data[0]->persnl_rmntic_weeknd != '')
            <h4 style="color: #f15052; font-weight: 700;">How would you spend a perfect romantic weekend?</h4>
            <p>{{ $data[0]->persnl_rmntic_weeknd }}</p>
            @endif
            @if($data[0]->persnl_prfct_match != '')
            <h4 style="color: #f15052; font-weight: 700;">What sort of person would be your perfect match?</h4>
            <p">{{ $data[0]->persnl_prfct_match }}</p>
            @endif
        </div>
    </div>
</div>

<div class="container">
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12">
          <div class="row">
            @foreach($other as $da) 
        @if($da->user_photo_path != '') 
          <div class="col-md-3">
          <div class="card">
          <img class="img-fluid" src="{{ $da->user_photo_path }}">  
          <div class="card-footer">
            <div class="row">
              @if($da->approve_status != '1')
              <?php $pic= str_replace('https://www.globallove.online/images/','', $da->user_photo_path); ?>
              <div class="col-md-6"><a class="btn btn-success btn-block" href="/u/approve/{{ $da->user_photo_id }}/{{ $da->user_id }}">Approve</a></div>
              <div class="col-md-6"><a class="btn btn-danger btn-block" href="/u/deny/{{ $da->user_photo_id }}/{{ $da->user_id }}">Deny</a></div>
              @else
              <div class="col-md-12">
                <p style="text-align: center;font-weight: 700;">Approved</p>
              </div>
              @endif
            </div>
          </div>
          </div>      
          
          </div>
          @endif
        @endforeach
        </div>
      </div>
    </div>
</div>

<div class="container">
            <div class="row" style="margin-top: 10px;">
              @if($data[0]->prfl_approve_status == 0)
              <?php $picture= str_replace('https://www.globallove.online/images/','', $data[0]->prfl_photo_path); ?>
  
              <div class="col-md-6">
                <form action="/u/denyprfl" method="POST">
                    {{ csrf_field() }}
                <p>Deny Profile reasons:</p> 
                <input type="checkbox" id="no_profile" name="reason_status[]" value="No profile picture"
                        >
                <label for="no_profile">No profile picture</label>  <br>
                <input type="checkbox" id="unauthorized_c" name="reason_status[]" value="Unauthorized content"
                        >
                <label for="unauthorized_c">Unauthorized content</label>    
               
      
                <input type="hidden" name="id" value="{{ $data[0]->id }}">
                <input type="hidden" name="email" value="{{ $data[0]->email }}">
                <input type="hidden" name="image" value="{{ $picture }}">

                <button type="submit" class="btn btn-danger btn-block">Deny Profile</button>
                </form>
                </div> 
                <div class="col-md-6">
                <form action="/u/approveprfl" method="POST">
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $data[0]->id }}">
                <input type="hidden" name="email" value="{{ $data[0]->email }}">
    
                <button type="submit" class="btn btn-success btn-block approve-btn">Approve Profile</button>
                </form>
                </div>
              @elseif($data[0]->prfl_approve_status == 1)
              <div class="col-md-12">
                <p style="text-align:center;font-weight: 700;color: #459952;font-size:20px; ">User profile approved!</p>
              </div>
              @else
              <div class="col-md-6">
              <p style="color: #f15052;font-size:20px; font-weight: 700;">Deny Reasons:</p>
                  <?php 
                    $reasons = explode(',',$data[0]->reason_status);
                  ?>
                   <ul>
                     @foreach($reasons as $r) 
                     <li style="color: #f15052;font-size:20px; font-weight: 700;">{{ $r }}</li>
                     @endforeach
                     </ul> 
                <p style="color: #f15052;font-size:20px; font-weight: 700;">User profile denied!</p>
              </div>
              <div class="col-md-6">
                <form action="/u/approveprfl" method="POST">
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $data[0]->id }}">
                <input type="hidden" name="email" value="{{ $data[0]->email }}">
    
                <button type="submit" class="btn btn-success btn-block approve-btn">Approve Profile</button>
                </form>
                </div>
              @endif
              </div>
                    
        </div>

        <p>&nbsp;</p>


        @include('admin_footer')