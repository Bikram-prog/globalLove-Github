@include('header')

<style type="text/css">
    .date-img {
        width: 300px;
    height: 300px;
    object-fit: cover;
    }
    td:first-child {
        font-weight: 700;
    }
    .report{
        text-align: center;
    background: #E9343F;
    color: #fff;
    padding: 15px;
    border-radius: 22px;
    cursor:pointer
    }
    .report_block{
        display:none
    }
    .report_block div .btn{
        color:#fff !important;
    }

    .report_block div .btn:hover{
        text-decoration:underline;
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
    <div class="row b-block d-sm-none mt-4">
        <div class="col-12">
            <a href="#" onclick="history.back(); event.preventDefault();"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>
    <div class="row" style="margin-top: 15px;">

        <div class="col-md-4">

{{--            @if($data[0]->prfl_approve_status == '1' && $data[0]->hide_status == '0' && $data[0]->private_status == '0')--}}
            @if($data[0]->prfl_approve_status == '1' && $data[0]->hide_status == '0')
            <img loading="lazy" class="card-img-top img-thumbnail date-img" id="main_pic" src="<?php echo $data[0]->prfl_photo_path; ?>">
            @else
            <img loading="lazy" class="card-img-top img-thumbnail date-img" id="main_pic" src="https://www.globallove.online/images/male-user-placeholder.png">
            @endif
            @foreach($data as $pro)
                @if($pro->user_photo_path != '' && $pro->prfl_photo_path != $pro->user_photo_path)

{{--                @if($pro->approve_status == '1'  && $pro->hide_status == '0' && $pro->private_status == '0')--}}
                    @if($pro->approve_status == '1'  && $pro->hide_status == '0' && $pro->private_status == '0')

                <img loading="lazy" onclick="changePhoto('{{ $pro->user_photo_path }}')" src="{{ $pro->user_photo_path }}" style="object-fit: cover;width: 100px;height: 100px; margin-right: 10px;margin-top: 20px; border-radius: 10px; cursor: pointer;" alt="">

                @endif
                @endif
                @endforeach



		            <div class="mt-5">
		                <form action="/postinsert" method="POST">
		                    {{ csrf_field() }}
		                    <input type="hidden" name="sdjdjsdjfs" value="<?php echo $data[0]->id; ?>">
		                    <button onclick="search() type="submit" class="btn btn-link" style="margin-top: -10px;"><i class="fas fa-user-lock"></i> Block this user</button>
		                </form>
		            </div>

		            <div class="mt-2">
                    @if(count($report) > 0)
                    <button class="btn btn-link" style="margin-top: -10px;"><i class="fas fa-flag"></i> You already reported this user</button>
                    @else
		                    <button id="report-btn" type="submit" class="btn btn-link" style="margin-top: -10px;"><i class="fas fa-flag"></i> Report Abuse</button>
                    @endif
                        <div class="report_block">
                            <p style="font-weight: 700;" class="ml-3">Safety Tips.</p>
                            <div  class="report mt-4" >1. Always a good idea to be careful when you are using this or any online dating site. Certain people out there make it their business to try and scam you. This is why we suggest you use a different email address and don’t use your name on that email…… Better to be safe than sorry.<br>
                            <a href="/report/<?php echo $data[0]->id; ?>"><button  type="submit" class="btn" style="margin-top: -10px;"><i class="fas fa-flag"></i> Report Abuse</button></a>
                            </div>

                            <div class="report mt-4" >2. Some users will ask you to immediately go off the website and chat with them, although 99% of the time it’s an innocent request, it’s the 1% you need to be worried about. Global Love has an internal chat facility, so why go anywhere until you’re sure.<br>
                            <a href="/report/<?php echo $data[0]->id; ?>"><button  type="submit" class="btn" style="margin-top: -10px;"><i class="fas fa-flag"></i> Report Abuse</button></a></div>

                            <div  class="report mt-4">3. If anyone asks you for money for any reason, you need to report them.<br>
                            <a href="/report/<?php echo $data[0]->id; ?>"><button  type="submit" class="btn" style="margin-top: -10px;"><i class="fas fa-flag"></i> Report Abuse</button></a></div>

                            <div  class="report mt-4">4. We hope you meet your Global Love here, and we hope you meet in person and live happily every after, but don’t forget, there people out there that pray on the lonely and good hearted, so if they want to meet you in your country, don’t send them money, do your research first and check on everything including the person involved, immigration….. etc<br>
                            <a href="/report/<?php echo $data[0]->id; ?>"><button type="submit" class="btn" style="margin-top: -10px;"><i class="fas fa-flag"></i> Report Abuse</button></a></div>

                            <div class="report mt-4" >5. This is Global Love, not Global Selling, so let us know if you are contacted by anyone that is trying to sell or solicit to you, we will take care of it.<br>
                            <a href="/report/<?php echo $data[0]->id; ?>"><button  type="submit" class="btn" style="margin-top: -10px;"><i class="fas fa-flag"></i> Report Abuse</button></a></div>

                            <div  class="report mt-4">6. Online chat is always available online, so let us know if you need help with anything.<br>
                            <a href="/report/<?php echo $data[0]->id; ?>"><button type="submit" class="btn" style="margin-top: -10px;"><i class="fas fa-flag"></i> Report Abuse</button></a></div>

                            <div class="report mt-4" >7. Be care of fake streaming, some scammers will use prerecorded  videos, if you sense they are, ask them to write a message and show you online…… That will slow them down.<br>
                            <a href="/report/<?php echo $data[0]->id; ?>"><button  type="submit" class="btn" style="margin-top: -10px;"><i class="fas fa-flag"></i> Report Abuse</button></a></div>

                                <div  class="report mt-4" onClick="report(9,<?php echo $data[0]->id; ?>)" style="background:#ffe07b;color: #000;"><b> Cancel</b><br>
                                Nah, I don't want to report this member.</div>


                        </div>
		            </div>

                    @if($data[0]->onln_time != '')

                    <div class="mt-3">
		                <P class="btn btn-link" style="margin-top: -10px;font-size: 17px;">Last Online: {{ date('F j, Y, g:i A',strtotime($data[0]->onln_time)) }}</P>
		            </div>
                    @endif

        </div>

        @php

            $today = date('Y-m-d H:i:s');
            $premium_login = DB::Select("select * from payment_transactions where pt_u_id = '".$data[0]->id."' and pt_end_date > '".$today."'");
            @endphp

        <div class="col-md-6">
            <h1>
            {{ $data[0]->name }}
            @if($data[0]->verify_approve_status == 1)
            <span style="font-weight: 600;
                color: #686de0;
                letter-spacing: 1.2px;
                font-size: 17px;
                margin-top: -25px;
                margin-left: 0px;"><i style="color:#686de0;" class="fas fa-check-circle"></i></span>
            @endif
            </h1>
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
                     <p style="font-weight: 500;color: #444;">......</p>
                @endif
            @endif
            <p style="font-weight: 500;color: #444;">{{ $age }} •  <i class="fa fa-map-marker" style="    font-size: 19px;
    color: #676767;" ></i> {{ $data[0]->country }}</p>
            <p style="font-weight: 500;color: #444;">{{ $data[0]->sex }} {{ $data[0]->relationship }}</p>
            @if($data[0]->match_seeking != '')
            <p style="font-weight: 500;color: #444;">Looking for: {{ $data[0]->match_seeking }} , {{ $data[0]->match_min_age }} - {{ $data[0]->match_max_age }}  </p>
            @endif

            @php

            $approve= DB::Select("SELECT * FROM users WHERE id='".Crypt::decryptString($_COOKIE['UserIds'])."'");
            @endphp

             <div class="row">
                <div class="col-md-6">
                    @if($approve[0]->prfl_approve_status == '1')
                    @if(count($like) == 0)
                                  <div class="like-toggle align-self-center ml-auto">
                                <form action="/postinsert" method="POST">
                                    {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ Crypt::decryptString($_COOKIE['UserIds']) }}">
                                <input type="hidden" name="like_id" value="<?php echo $data[0]->id; ?>">
                                <button onclick="search()" type="submit" class="btn btn-lg btn-primary btn-block" rel="tooltip">
                                    <i class="far fa-heart"></i> SEND LIKE
                                </button>

                            </form>

                            </div>
                        @else
                            <div class="like-toggle align-self-center ml-auto">
                                <form action="/postdelete" method="POST">
                                    {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ Crypt::decryptString($_COOKIE['UserIds']) }}">
                                <input type="hidden" name="like_id" value="<?php echo $data[0]->id; ?>">
                                <button onclick="search()"type="submit" class="btn btn-lg btn-primary btn-block" rel="tooltip">
                                    <i class="fas fa-heart"></i> UNLIKE
                                </button>

                            </form>

                            </div>
                        @endif

                        @else


                        <p style="font-size: 20px;font-weight: 600; color: red;">You cannot send likes untill your profile is approved.</p>



                        @endif
                    </div>
                @php
                    $today = date('Y-m-d H:i:s');

                    $premium_login = DB::Select("select * from payment_transactions where pt_u_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' and pt_end_date > '".$today."'");
                    $premium_log_cont = DB::Select("select * from users_metas where user_id = '".Crypt::decryptString($_COOKIE['UserIds'])."'");
                    $country_status_login= DB::Select("Select * from country_price where cp_name ='".$premium_log_cont[0]->country."' and cp_price > 0.00");

                    if(count($premium_login) > 0) {
                        $premium_log = "Premium";
                        $country_log = $premium_log_cont[0]->country;
                    } else {
                        $premium_log = "";
                        $country_log = $premium_log_cont[0]->country;
                    }

                    $premium_user = DB::Select("select * from payment_transactions where pt_u_id = '".$data[0]->id."' and pt_end_date > '".$today."'");
                    $premium_user_cont = DB::Select("select * from users_metas where user_id = '".$data[0]->id."'");
                    $country_status= DB::Select("Select * from country_price where cp_name ='".$premium_user_cont[0]->country."' and cp_price > 0.00");

                    if(count($premium_user) > 0) {
                        $premium = "Premium";
                        $country = $premium_user_cont[0]->country;
                    } else {
                        $premium = "";
                        $country = $premium_user_cont[0]->country;
                    }
                @endphp

                @if($premium_log == '' && $premium == '')
                    <div class="col-md-6" style="
                        border: 1px solid #ccc;
                        border-radius: 5px;
                        padding: 10px;
                        background: #fff;
                        text-align: center;
                    ">
                        <p style="font-size: 20px;font-weight: 600;">You cannot send message to this user as you are both FREE standard members.</p>
                         <a href="/membership" style="text-decoration: none;" class="btn btn-success btn-block btn-lg">Upgrade Now</a>
                    </div>
                @else
                <div class="col-md-6">

                    <!-- <a class="btn btn-lg btn-dark btn-block" href="/addnewmessage/{{ $data[0]->id }}"><i class="fas fa-envelope" ></i> SEND MESSAGE</a> -->
                    <a class="btn btn-lg btn-success btn-block d-none d-sm-block" onclick="loadChat('<?php echo $data[0]->id; ?>', '<?php echo $data[0]->name; ?>', '<?php echo $data[0]->email; ?>', '<?php echo $data[0]->onln_status; ?>')" href="javascript:void(0)"><i class="fas fa-comment"></i> CHAT
                    @if($data[0]->onln_status == 'online')
                    <i data-toggle="tooltip" data-placement="top" title="Online" style="font-size: 14px;" class="fas fa-circle text-success"></i>
                    @else
                    <i data-toggle="tooltip" data-placement="top" title="Offline" style="font-size: 14px;" class="fas fa-circle text-danger"></i>
                    @endif</a>

            <a class="btn btn-lg btn-success btn-block d-block d-sm-none" onclick="loadChat('<?php echo $data[0]->id; ?>', '<?php echo $data[0]->name; ?>', '<?php echo $data[0]->email; ?>', '<?php echo $data[0]->onln_status; ?>')" href="javascript:void(0)"><i class="fas fa-comment"></i> START CHAT
                    @if($data[0]->onln_status == 'online')
            <i data-toggle="tooltip" data-placement="top" title="Online" style="font-size: 14px;" class="fas fa-circle text-success"></i>
            @else
            <i data-toggle="tooltip" data-placement="top" title="Offline" style="font-size: 14px;" class="fas fa-circle text-danger"></i>
            @endif</a>

                </div>



                @endif

            </div>

            <h3 style="margin-top: 15px;">Photos</h3>

            <div class="container">
                <div class="row">
                    @if(count($photopost) == 0)
                    <p style="font-size: 20px;color:#E9343F;text-align: center;"><b>No photo uploaded yet.</b></p>
                    @else

                    @foreach($photopost as $phtopst)
                    @if($phtopst->pro_pic_hide_status == '0')
                    <div class="col-md-3">
                        <img loading="lazy" src="{{ $phtopst->pro_pic_path }}" style="object-fit: cover;width: 300px;height: 300px; margin-right: 10px;margin-top: 20px; border-radius: 10px; cursor: pointer; float: left;" alt="">
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>

            <h3 style="margin-top: 10px;">Videos</h3>

            <div class="container">
                <div class="row">
                    @if(count($videopost) == 0)
                    <p style="font-size: 20px;color:#E9343F;text-align: center;"><b>No video uploaded yet.</b></p>
                    @else
                    @foreach($videopost as $vidopst)
                    <div class="col-md-6 mt-3">
                        <div class="embed-responsive embed-responsive-4by3">
                            <video controls muted class="embed-responsive-item">
                                <source src="{{ $vidopst->pro_vid_path }}" type="video/mp4">
                              Your browser does not support the video tag.
                              </video>
                          </div>

                    </div>
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


                <div class="row mt-4">
            	<div class="col-md-4"></div>
            	<div class="col-md-4 text-center">
                <!-- <a class="btn btn-lg btn-success btn-block" onclick="loadChat('<?php //echo $data[0]->id; ?>', '<?php //echo $data[0]->name; ?>', '<?php //echo $data[0]->email; ?>')" href="javascript:void(0)"><i class="fas fa-comment"></i> CHAT</a> -->

            	</div>
            	<div class="col-md-4"></div>
            </div>

            <!--div class="row mt-4">
            	<div class="col-md-4"></div>
            	<div class="col-md-4 text-center">
		            <div>
		                <form action="/postinsert" method="POST">
		                    {{ csrf_field() }}
		                    <input type="hidden" name="sdjdjsdjfs" value="<?php echo $data[0]->id; ?>">
		                    <button onclick="search() type="submit" class="btn btn-link" style="margin-top: -10px;"><i class="fas fa-user-lock"></i> Block this user</button>
		                </form>
		            </div>
            	</div>
            	<div class="col-md-4"></div>
            </div-->


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
            <h4 style="color: #E9343F; font-weight: 700;">Member Overview</h4>

            @if(count($about) > 0  and isset($about) )
                @if($about[0]->status == 1)
                    <p>{{ $data[0]->about }}</p>
                @else
                    <p>........</p>
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
                    <p>........</p>
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
            <p">{{ $data[0]->persnl_prfct_match }}</p>
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



<script type="text/javascript">
    function changePhoto(url) {
        document.getElementById("main_pic").src = url;
    }
</script>

<style type="text/css">
		/* Smartphones (portrait and landscape) ----------- */
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
	.main {
		right: 0 !important;
		left: 0 !important;
		width: 100% !important;
	}
}
</style>


