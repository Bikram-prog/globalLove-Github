<?php 
$i =1;

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
    
?>

@foreach($data_matches as $newmember)
    <?php 

    // premium users check
    $today = date('Y-m-d H:i:s');
    $premium_user = DB::Select("select * from payment_transactions where pt_u_id = '".$newmember->id."' and pt_end_date > '".$today."'");
    $premium_user_cont = DB::Select("select * from users_metas where user_id = '".$newmember->id."'");
    $country_status= DB::Select("Select * from country_price where cp_name ='".$premium_user_cont[0]->country."' and cp_price > 0.00");

    if(count($premium_user) > 0) {
        $premium = "Premium";
        $country = $premium_user_cont[0]->country;
    } else {
        $premium = "";
        $country = $premium_user_cont[0]->country;
    }
    ?>


    <div class="col-6 col-sm-12 col-md-4 col-lg-2 directory-item">
    <div class="card <?php echo (count($premium_user) > 0 ? 'premium' : ''); ?>">
    <a onclick="profile()" href="/userprofile/{{ $newmember->id }}" class="user-photo" data-pjax="0">
        <div class="card-img-top-wrapper d-flex justify-content-center">
           
            @if($newmember->prfl_approve_status == '1' && $newmember->hide_status == '0')
            <img loading="lazy" class="card-img-top" src="{{ $newmember->prfl_photo_path }}" alt="{{ $newmember->name }}">
           @else
           <img loading="lazy" class="card-img-top" src="https://www.globallove.online/images/male-user-placeholder.png" alt="{{ $newmember->name }}">
           @endif
        </div>
            </a>
    <div class="card-body d-flex flex-column" style="position: relative">
        <h4 class="d-flex justify-content-start align-items-center">
            <a onclick="profile()" href="/userprofile/{{ $newmember->id }}" data-pjax="0">
                <span class="display-name">{{ $newmember->name }} 
                @if($newmember->verify_approve_status == 1)
            <span style="font-weight: 600;
                color: #686de0;
                letter-spacing: 1.2px;
                font-size: 12px;
                margin-top: -25px;
                margin-left: 0px;"><i style="color:#686de0;" class="fas fa-check-circle"></i></span>
            @endif
            </span>


            </a>
                <?php
            if ((strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile/') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Safari/') == false) || stripos(strtolower($_SERVER['HTTP_USER_AGENT']),'android') !== false) { ?>
            
                          <!-- do nothing -->          
        <?php } else { ?>
            <div class="ml-auto">
                   @if($premium_log == '' && $premium == '' && $country_log == $country)
                 <a class="d-none d-sm-block" data-toggle="tooltip" data-placement="top" title="You have to be a premium member to send message."  href="/membership"><i class="fas fa-comment" style="font-size: 30px; color: #cfcfcf"></i></a>
                 @elseif(count($country_status_login) > 0 && $premium_log == '')
                 <a class="d-none d-sm-block" data-toggle="tooltip" data-placement="top" title="You have to be a premium member to send message."  href="/membership"><i class="fas fa-comment" style="font-size: 30px; color: #cfcfcf"></i></a>
                 @else
                   <a class="d-none d-sm-block" data-toggle="tooltip" data-placement="top" title="Start chat" onclick="loadChat('<?php echo $newmember->id; ?>', '<?php echo $newmember->name; ?>', '<?php echo $newmember->email; ?>','<?php echo $newmember->onln_status; ?>')" href="javascript:void(0)"><i class="fas fa-comment" style="font-size: 30px; color: #5C54AD"></i></a>
                   @endif
            </div>
            <?php } ?>
                                    <!-- <div class="ml-auto">
                    <i class="online-status bg-gray" rel="tooltip" title="" data-original-title="Last online: 06:23">
    </i>
            </div> -->
        </h4>
        <p style="font-weight: 600;">{{ $newmember->sex }}, {{ $newmember->age }}</p>

        @if($newmember->onln_time != '')

            
                <P style="color: #5C54AD; font-weight:700;">Last Online:<br> {{ date('F j, Y, g:i A',strtotime($newmember->onln_time)) }}</P>
            
            @endif

        <div class="text-muted">{{ $newmember->country }} {{ $newmember->city }}</div>
        
        @if($newmember->onln_status == 'online')
        <i data-toggle="tooltip" data-placement="top" title="Online" style="float: right;" class="fas fa-circle text-success"></i>
        @else
        <i data-toggle="tooltip" data-placement="top" title="Offline" style="float: right;" class="fas fa-circle text-danger"></i>
        @endif
        </div>
     
        
    </div>
</div>

<?php $i++; ?>

@endforeach

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2843148547180331"
     crossorigin="anonymous"></script>
<!-- in list ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2843148547180331"
     data-ad-slot="9293873845"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>