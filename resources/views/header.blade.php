<?php
//get all online users
$online_users = DB::Select("select onln_status  FROM `users`
LEFT JOIN `users_metas` ON `users_metas`.`user_id` = `users`.`id` WHERE `users`.`id` != '".Crypt::decryptString($_COOKIE['UserIds'])."' AND `users`.`prfl_approve_status` = '1' AND `users`.`onln_status` = 'online' AND `users`.`id` NOT IN (
  SELECT b_who_id
  FROM block_users
  WHERE b_whom_id = '".Crypt::decryptString($_COOKIE['UserIds'])."')");
//------------------end ----------------------------------
?>

  <!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Date Free</title>
  <meta name="description" content="The world's first and only true Multi Everythingdating website. Be a GlobalLove member and find your love.">
<meta name="keywords" content="Dating, Multi Gender, Dating website, GlobalLove">
<meta name="robots" content="index, follow">

  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <link rel="icon" type="image/x-icon" href="https://www.globallove.online/images/GlobalLoveLogo2.png">
<!--   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="{{ url('app.min.css') }}">


  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

<!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<meta name="csrf-token" content="{{ csrf_token() }}" />

<script>
     // APP DEEPLINK

  var fallbackToStore = function() {
  window.location.replace('market://details?id=online.globallove');
};
var openApp = function() {
  window.location.replace('gl://');
};
var triggerAppOpen = function() {
  openApp();
  setTimeout(fallbackToStore, 250);
};
 </script>

<style type="text/css">



  .dropdown-item:hover{
    color: #fff !important;
    background: #6c5ce7 !important;
  }
  h1,h2,h3,h4,h5,h6 {
    font-family: 'Source Sans Pro', sans-serif !important;
  }
  .title {
    font-family: 'Source Sans Pro', sans-serif !important;
  }
  .dropdown-item-notify {
        border-bottom: 1px solid #ccc !important;
        color: #222 !important;
  }

  .header-brand-img {
    height: 100px !important;
  }
  .text-default {
    color: #000 !important;
  }
  .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link{
    color:#fff
  }


</style>

{{-- <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-197802039-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-197802039-1');
</script> --}}

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-213324873-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-213324873-1');
</script>

<!-- Hotjar Tracking Code for https://www.globallove.online/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2401964,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<meta name="google-site-verification" content="cw9WUKpVnC9DW7v3kIl5Q1sZTNJRwB3jAT4ohM1Cxg4" />

@php
  $payment= \App\Models\RemoveAds::where("user_id", "=", Crypt::decryptString($_COOKIE['UserIds']))
        ->where('end_date', '>', date('Y-m-d H:i:s'))->get();
@endphp



    @if(count($payment) === 0)
    {{-- This is for Google Adsense --}}

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2843148547180331"
        crossorigin="anonymous"></script>

    {{-- End Google Adsense --}}
    @endif


<meta name="p:domain_verify" content="e8a56d4d17846ab6e5f0d43f19555677"/>


</head>
<body onload="getLocation()" onunload="lol(); triggerAppOpen();" class="ltr body-default">



<!--  Clickcease.com tracking-->
<script type='text/javascript'>var script = document.createElement('script');
  script.async = true; script.type = 'text/javascript';
  var target = 'https://www.clickcease.com/monitor/stat.js';
  script.src = target;var elem = document.head;elem.appendChild(script);
  </script>
  <noscript>
  <a href='https://www.clickcease.com' rel='nofollow'><img src='https://monitor.clickcease.com/stats/stats.aspx' alt='ClickCease'/></a>
  </noscript>
  <!--  Clickcease.com tracking-->

<div>
  <div class="headerr" style="background-color: #ffffff !important; color: #000 !important;">
  <div class="container">
      <div class="d-flex">
        @if(Request::is('group-chat') == false)
@if(Request::is('group-chat/gf') == false)
@if(Request::is('group-chat/gm') == false)
@if(Request::is('group-chat/transexual') == false)
@if(Request::is('group-chat/gayfemale') == false)
          <a class="header-brand" href="/" style="color: #FFFFFF;">
               <img class="header-brand-img" src="https://www.globallove.online/images/GlobalLoveLogo2.png" alt="GlobalLove">             </a>
@endif
@endif
@endif
@endif
@endif

               
          <div class="d-flex align-items-center order-lg-2 ml-auto">

                      <div class="nav-item d-none d-sm-block">
      <!-- <a href="/index.php?r=balance%2Fservices" class="btn btn-outline-primary btn-sm" data-pjax="0" title="Balance" rel="tooltip">
        <i class="fas fa-wallet mr-2"></i><span class="user-balance">0</span>
      </a> -->
  </div>










@if(Request::is('group-chat') == false)
@if(Request::is('group-chat/gf') == false)
@if(Request::is('group-chat/gm') == false)
@if(Request::is('group-chat/transexual') == false)
@if(Request::is('group-chat/gayfemale') == false)
@if(Request::is('contactus') == false)
<div class="dropdown">

@php
$propic= DB::Select("SELECT prfl_photo_path,prfl_approve_status FROM users WHERE id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

$today = date('Y-m-d H:i:s');
$premium_login = DB::Select("select * from payment_transactions where pt_u_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' and pt_end_date > '".$today."'");
@endphp
@foreach($propic as $pro)
  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
    @if($pro->prfl_approve_status == '1')
      <span class="avatar" style="background-image: url({{ $pro->prfl_photo_path }})"></span>
    @else
        @if($propic != 'https://www.globallove.online/images/male-user-placeholder.png')
          <span class="avatar" style="background-image: url({{ $pro->prfl_photo_path }})"></span>
        @else
        <span class="avatar" style="background-image: url('https://www.globallove.online/images/male-user-placeholder.png')"></span>
        @endif
    @endif
@endforeach
      @if (isset($_COOKIE['UserIds']))
      <span class="ml-2 d-none d-lg-block">

          <span class="text-default">{{ Crypt::decryptString($_COOKIE['UserFullName']) }}</span>

          <small class="text-muted d-block mt-1">
          @if(count($premium_login) == 1)
          <span style="font-weight: 600;
    color: #5eba00;
    letter-spacing: 1.2px;
    font-size: 15px;">Premium</span>
          @else
          <span style="letter-spacing: 1px; font-size: 15px;">Profile</span>
          @endif
        </small>
      </span>

  </a>

  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
    <a class="dropdown-item" href="/profile">
           View Profile        </a>
    <a class="dropdown-item" href="/preferredlanguage">
           Chat Translation        </a>
      <a class="dropdown-item" href="/editprofile">
           Edit Profile        </a>
      <a class="dropdown-item" href="/verifyprofile">
           Verify Profile        </a>
          <a class="dropdown-item" href="/photos">
           Photos        </a>
      <a class="dropdown-item" href="/match">
           Match Settings        </a>
          <a class="dropdown-item" href="/profiledetails">
           Hobbies & Interest        </a>
      <a class="dropdown-item" href="/personalityquestion">
           Personality Questions        </a>

</div>



</div>

<div class="dropdown">

@php
    $notification= DB::Select("SELECT t1.*,t2.* FROM notifications t1 left join users t2 on (t1.notifications_user_id=t2.id) WHERE t1.notifications_to_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' ORDER BY t1.notifications_date_time DESC LIMIT 50");

    $countnotif= DB::Select("SELECT count(*) as cnt FROM notifications where notifications_to_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' and status = 0 ");


  @endphp

  <!-- badge -->
  @if(isset($countnotif))
    @if($countnotif[0]->cnt  > 0)
      <div id="badge_notif" style="width: 10px; height: 10px; border-radius: 25px; background-color: #f15052;
        position: absolute;
        right: 2px;
        top: -3px;"></div>
    @endif
 @endif
  <a href="#" class="nav-link pr-0 leading-none" id="notifbell" data-toggle="dropdown">
  <span class="ml-2">

          <span class="text-default"><i style="font-size: 26px;" class="far fa-bell"></i></span>

          <!-- <small class="text-muted d-block mt-1">sumanta</small> -->
      </span>

  </a>


  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="overflow: auto; height: 400px;">

    @foreach($notification as $notify)
    <?php $date = date('M j, Y', strtotime($notify->notifications_date_time));
          $time = date('g:i a', strtotime($notify->notifications_date_time)); ?>
    @if($notify->notifications_key == "view_profile")
    <a class="dropdown-item dropdown-item-notify" href="/userprofile/{{ $notify->id }}"> <strong>{{ $notify->name }}</strong> viewed your profile
      <p style="font-size: 12px;">{{ $date }}, {{ $time }}</p></a>
    @elseif($notify->notifications_key == "liked_me")
    <a class="dropdown-item dropdown-item-notify" href="/userprofile/{{ $notify->id }}"> <strong>{{ $notify->name }}</strong> Liked you
    <p style="font-size: 12px;">{{ $date }}, {{ $time }}</p></a>
    @endif
    @endforeach

</div>

</div>




<div class="dropdown">
  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">


      <span class="ml-2">

          <span class="text-default"><i style="font-size: 26px;" class="fa fa-cog"></i></span>

          <!-- <small class="text-muted d-block mt-1">sumanta</small> -->
      </span>

  </a>
  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
    <a class="dropdown-item" href="/changeemail">
           E-mail Address        </a>
      <a class="dropdown-item" href="/account">
           Password        </a>
          <a class="dropdown-item" href="/profilesettings">
           Profile Settings        </a>

      <a class="dropdown-item" href="/membership">
           Upgrade Membership        </a>
          <a class="dropdown-item" href="/logout">
           Logout        </a>
           <a class="dropdown-item" href="/delete-account" onclick="return confirm('Are you sure you want to delete your account permanently?');">
           Delete Account        </a>

</div>



</div>

<div class="dropdown d-block d-lg-none"><a class="nav-link " href="/"><i style="font-size: 26px; color: #000;" class="fa fa-home"></i></a></div>


                  <a href="#" onclick="openNav();" class="header-toggler d-lg-none ml-3 ml-lg-0" > <!------- data-toggle="collapse" data-target="#header-navigation" -->
                      <span class="header-toggler-icon"></span>
                  </a>
                          </div>
      </div>
  </div>
</div>

@endif


<div class="header d-lg-block p-0 mobheader" id="header-navigation" style="display: none;">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-lg order-lg-first">
              <ul class="nav nav-tabs border-0 flex-column flex-lg-row"><!-- <li class="nav-item active"><a class="nav-link active" href="/dashboard"><i class="fas fa-home"></i>Dashboard </a></li> -->
<li class="nav-item"><a class="nav-link " href="/browse"><i class="fa fa-search"></i>BROWSE </a></li>

<li class="nav-item"><a class="nav-link " href="/matches"><i class="far fa-heart"></i>MY MATCHES </a></li>



        <li class="nav-item dropdown" style="margin-top: 4px;">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-tasks"></i>  ACTIVITY
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/likes">LIKED ME</a>
            <a class="dropdown-item" href="/viewprofileuser">VIEWED MY PROFILE</a>
            <a class="dropdown-item" href="/connection">MY FAVOURITES</a>
            <a class="dropdown-item" href="/blocklist">BLOCK LIST</a>
        </div>
      </li>





        <?php
          $chatUsers = DB::Select("SELECT t1.*,t2.* FROM users_chat_rooms t1 RIGHT JOIN users t2 ON (t1.room_to_id=t2.id) RIGHT JOIN users_metas um ON t2.id = um.user_id WHERE t1.room_from_id = ".Crypt::decryptString($_COOKIE['UserIds']). " ORDER BY t1.timedate DESC");
          $offlinemsg= DB::Select("SELECT room_status FROM users_chat_rooms WHERE room_from_id = '".Crypt::decryptString($_COOKIE['UserIds'])."'AND room_status= '1'");

          ?>



            <!-- badge -->



        <li class="nav-item dropdown" style="margin-top: 4px;">


        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-comments"></i>  MESSAGES
         @if(count( $offlinemsg)  > 0)
                <div id="badge_notif_messages" style="    width: 24px;
    height: 22px;
    border-radius: 25px;
    background-color: #27b52b;
    position: absolute;
    right: 2px;
    top: -3px;
    text-align: center;">{{  count( $offlinemsg) }}</div>
              @endif
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="height:400px;overflow:auto;width:400px">



        <ul id="chat-list-header" style="margin: 0; padding: 10px;"></ul>





        </div>
      </li>

      <li class="nav-item"><a class="nav-link " href="/map/view"><i class="fas fa-map-marker-alt"></i>&nbsp;MAP VIEW </a></li>



      <li class="nav-item"><a class="nav-link " href="/online">
         @if(count($online_users) > 0)
        <i class="fas fa-circle text-success"></i>
        @endif
        <i class="fas fa-wifi"></i> &nbsp;ONLINE MEMBERS&nbsp;&nbsp;{{ count($online_users) }} </a></li>

        <!-- <li class="nav-item"><a style="color: #f9ca24;font-size:20px;" href="https://bescrow.world/" target="_blank">BUY + SELL</a></li>

        <li class="nav-item"><a style="color: #f9ca24;font-size:20px;" href="">ASK AN EXPERT</a></li>
        <li class="nav-item"><a style="color: #f9ca24;font-size:20px;" href="">ASK A MODERATOR</a></li>
        <li class="nav-item"><a style="color: #f9ca24;font-size:20px;" href="">SEND GIFT</a></li> -->




</ul>
</div>
@endif
      @endif
      @endif
      @endif
      @endif
      @endif
      @if(Request::is('group-chat') == false)
      @if(Request::is('group-chat/gf') == false)
      @if(Request::is('group-chat/gm') == false)
      @if(Request::is('group-chat/transexual') == false)
      @if(Request::is('group-chat/gayfemale') == false)
      @if(Request::is('contactus') == false)
      <div id="google_translate_element"></div>
      @endif
      @endif
      @endif
      @endif
      @endif
      @endif
      </div>
  </div>
</div>

<div class="container">
  <div class="row mt-2">
    <div class="col-md-4">



    </div>
    <div class="col-md-8">
      @if(Request::is('group-chat') == false)
      @if(Request::is('group-chat/gf') == false)
      @if(Request::is('group-chat/gm') == false)
      @if(Request::is('group-chat/transexual') == false)
      @if(Request::is('group-chat/gayfemale') == false)
      @if(Request::is('contactus') == false)
      <a class="btn btn-success mt-2" style="color: #fff;font-size:15px;margin-left: 20px;" onclick="bes_modal()" href="javascript:void(0)">BUY + SELL</a>

          <!-- <a class="btn btn-success mt-2" style="color: #fff;font-size:15px;margin-left: 20px;" onclick="exp_modal()" href="javascript:void(0)">ASK AN EXPERT</a> -->
          {{-- <a class="btn btn-success mt-2" style="color: #fff;font-size:15px;margin-left: 20px;" onclick="mod_modal()" href="javascript:void(0)">ASK A MODERATOR</a> --}}
          <a class="btn btn-success mt-2" style="color: #fff;font-size:15px;margin-left: 20px;" onclick="snd_modal()" href="javascript:void(0)">SEND GIFT</a>



          <div class="dropdown">
          <button class="btn btn-danger dropdown-toggle mt-2" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false" style="color: #fff;font-size:15px;margin-left: 20px;">
          Group Chat
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="background:transparent; border:none;">
            <li style="background: #6c5ce7;padding: 5px;border-radius: 4px;"><a class="dropdown-item" style="color: #fff;" href="/group-chat-terms">Main Room</a></li>
            <li class="mt-4" style="background: #6c5ce7;padding: 5px;border-radius: 4px;"><a class="dropdown-item" style="color: #fff;" href="/group-chat-terms-female">Lesbian</a></li>
            <li class="mt-4" style="background: #6c5ce7;padding: 5px;border-radius: 4px;"><a class="dropdown-item" style="color: #fff;" href="/group-chat-terms-male">Gay</a></li>
            <li class="mt-4" style="background: #6c5ce7;padding: 5px;border-radius: 4px;"><a class="dropdown-item" style="color: #fff;" href="/group-chat-terms-transexual">Transexual</a></li>
            {{-- <li class="mt-4" style="background: #6c5ce7;padding: 5px;border-radius: 4px;"><a class="dropdown-item" style="color: #fff;" href="/group-chat-terms-gayfemale">Gay Female</a></li> --}}
          </ul>

          <a href="/suggestion" class="btn btn-danger mt-2" style="color: #fff;font-size:15px;margin-left: 20px;">Suggestion Box</a>

          <a href="/news" class="btn btn-danger mt-2" title="(*this post will be published on thedailyplanet.app)" style="color: #fff;font-size:15px;margin-left: 20px;">What's On Your Mind?</a>
          @endif
      @endif
      @endif
      @endif
      @endif
      @endif
    </div>


    </div>
</div>


@if(Request::is('group-chat') == false)
@if(Request::is('group-chat/gf') == false)
@if(Request::is('group-chat/gm') == false)
@if(Request::is('group-chat/transexual') == false)
@if(Request::is('group-chat/gayfemale') == false)
@if(Request::is('contactus') == false)
            @if(count($payment) === 0)
<div class="container">
  <div class="row mt-2">
    <div class="col-md-12">

      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2843148547180331"
      crossorigin="anonymous"></script>
 <!-- header ad -->
 <ins class="adsbygoogle"
      style="display:block"
      data-ad-client="ca-pub-2843148547180331"
      data-ad-slot="1669183625"
      data-ad-format="auto"
      data-full-width-responsive="true"></ins>
 <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
 </script>

</div>
</div>
</div>
            @endif
            @endif
@endif
@endif
@endif
@endif
@endif





@php
$userapprove = DB::Select("SELECT prfl_approve_status,prfl_photo_path FROM users WHERE id = '".Crypt::decryptString($_COOKIE['UserIds'])."'");
@endphp

@if(count($userapprove) > 0)
  @if($userapprove[0]->prfl_approve_status == 0  && $userapprove[0]->prfl_photo_path == 'https://www.globallove.online/images/male-user-placeholder.png')
  <div class="alert alert-success" role="alert">


  <h4 class="alert-heading"><i class="fa fa-camera" aria-hidden="true"></i> Upload Profile Photo</h4>
  <p>Your account is currently under review and needs the following in order go live and allow you to browse:<br>
  <span style= "font-weight: 700;">Your profile must have at least one pic of yourself</span></p>
  <a href="/photos" class="btn btn-success btn-lg">Upload Now</a>

  </div>
  @endif
  @if($userapprove[0]->prfl_approve_status == 1  && $userapprove[0]->prfl_photo_path == 'https://www.globallove.online/images/male-user-placeholder.png')
  <div class="alert alert-success" role="alert">
  <h4 class="alert-heading"><i class="fa fa-camera" aria-hidden="true"></i> Upload Profile Photo</h4>
  <span style= "font-weight: 700;">Your profile must have at least one pic of yourself</span></p>
  <a href="/photos" class="btn btn-success btn-lg">Upload Now</a>

  </div>
  @endif
@endif





</div>




<!-------------------------------customer service ------------------------------->
<?php
$cus_support= DB::Select("SELECT * FROM users_chat_rooms WHERE room_from_id= '".Crypt::decryptString($_COOKIE['UserIds'])."' AND room_to_id= '0' AND room_status='1' AND room_key='gl'");
if(count($cus_support) > 0) {

?>




<div style="
position: fixed;
    background: red;
    border-radius: 25px;
    padding: 0px;
    width: 20px;
    height: 20px;
    right: 25px;
    top: 316px;
    z-index: 10000;
">
  <span style="
    color: #fff;
    font-weight: 700;
    margin-left: 6px;
  ">1</span>
</div>
<?php } ?>
<a href="customersupport/#/cs-user/{{ Crypt::decryptString($_COOKIE['UserIds']) }}/{{ Crypt::decryptString($_COOKIE['UserEmail']) }}/gl" id="idd_0" type="button" class="btn btn-success btn-lg csbtn d-none d-sm-block">Customer Support

</a>

{{-- <button onclick="loadChat('0', 'Customer support', 'customer@support.globallove', 'offline')" id="idd_0" type="button" class="btn btn-success btn-lg csbtn d-none d-sm-block">Customer Support

</button> --}}

    @if(count($payment) == 0)
        <a href="{{ route('remove.ads') }}" class="btn btn-info btn-lg adsbtn ">No More Ads <i class="fas fa-ban"></i></a>
    @endif

    <a href="javascript:void(0)" data-toggle="modal" data-target="#testimonial_modal" class="btn btn-warning btn-lg testimonialbtn ">Add Testimonial </a>

    {{-- <a href="" class="btn btn-info btn-lg sg" style="background-color: gray;">Suggestion Box</a> --}}


<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">


<style type="text/css">
.csbtn {
  transform: rotate(90deg);
  position: fixed;
  right: -65px;
  top: 230px;
  z-index: 1000;
}

.adsbtn {
    transform: rotate(90deg);
    position: fixed;
    top: 440px;
    right: -51px;
    z-index: 1000;
    font-weight: bold !important;
}

/*.sg{*/
/*  transform: rotate(90deg);*/
/*    position: fixed;*/
/*    top: 440px;*/
/*    left: -51px;*/
/*    z-index: 1000;*/
/*    font-weight: bold !important;*/
/*}*/

.testimonialbtn {
    transform: rotate(90deg);
    position: fixed;
    top: 620px;
    right: -53px;
    z-index: 1000;
    font-weight: bold !important;
}
    /* Smartphones (portrait and landscape) ----------- */
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
  .main {
    right: 0 !important;
    left: 0 !important;
    width: 100% !important;
  }
  .csbtn {
    top: 180px;
  }

}
</style>

<script type="text/javascript">
  function openNav() {
    console.log('navi');
    $(".mobheader").slideToggle();
  }
</script>

{{--@if(count($payment) === 0)--}}
{{--<div class="container mt-4">--}}
{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            <div class="alert alert-primary">--}}
{{--                <h2 class="font-weight-bold">Don't want to see Google Ads Anymore? For the price of AUD$9.90 a month, you won't have to. &nbsp; <a href="{{ route('remove.ads') }}" class="btn btn-info btn-lg"><i class="fas fa-heart"></i> Pay Now</a></h2>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endif--}}


<!-- Testimonial Modal -->
    <div class="modal fade" id="testimonial_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Write A Testimonial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="font-size: 21px;" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.testimonial.post') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Choose a category*</label>
                            <select class="form-control" name="cate">
                                <option>Globallove/Date Free</option>
                                <option>Buy + Sell</option>
                                <option>The Daily Planet</option>
                                <option>Todo Smarter</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Your full name*</label>
                            <input required="required" type="text" name="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Your Country*</label>
                            <select name="country" class="form-control">
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

                        <div class="form-group">
                            <label>Remarks*</label>
                            <textarea required="required" name="remarks" class="form-control" rows="6"></textarea>
                        </div>

                        <button type="submit" class="btn btn-warning btn-lg btn-block">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


