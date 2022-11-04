<?php
//get all online users
$online_users = DB::Select("select onln_status from users where onln_status = 'online'");
//------------------end ----------------------------------
if ((strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile/') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Safari/') == false)) { ?>
aa
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>GlobalLove</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="https://www.globallove.online/images/GlobalLoveLogo2.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://www.globallove.online/app.min.css">

  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

<!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style type="text/css">
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

</style>

</head>
<body onunload="lol()" class="ltr body-default">

<?php

$payment= DB::Select("SELECT pt_u_id,pt_end_date,pt_start_date FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        if(count($payment) == '1' && $payment[0]->pt_start_date <= date('Y-m-d H:i:s') && $payment[0]->pt_end_date >= date('Y-m-d H:i:s')) {
          
            $expire = strtotime($payment[0]->pt_end_date)-time();
            setcookie('_gooDal', Crypt::encryptString(Crypt::decryptString($_COOKIE['UserIds'])), time() + $expire, "/");
        } else { 
          
          setcookie("_gooDal", "", time() - 3600, "/");
        ?>
            <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"><i class="fa fa-address-book" aria-hidden="true"></i> Upgrade Your Membership!</h4>
            <p><a href="/membership" class="alert-link">Upgrade your membership to send message(Chat) to anyone. 👫</a>.</p>
            <a href="/membership" class="btn btn-info btn-lg">💎 Upgrade Now</a>
            </div>

            <?php
            
        }


?>

@php
$phto= DB::Select("SELECT prfl_photo_path FROM users WHERE id = '".Crypt::decryptString($_COOKIE['UserIds'])."'");
@endphp

@if (count($phto) > 0)
  @if($phto[0]->prfl_photo_path == 'https://www.globallove.online/images/male-user-placeholder.png')
  <div class="alert alert-danger" role="alert">


  <h4 class="alert-heading"><i class="fa fa-camera" aria-hidden="true"></i> Upload Profile Photo</h4>
  <p>Your account is currently under review and needs the following in order go live and allow you to browse:<br>
  <span style= "color: #FFF;">Your profile must have at least one pic of yourself</span></p>
  <a href="/photos" class="btn btn-success btn-lg">Upload Now</a>

  </div>
  @endif
@endif


<?php } elseif(stripos(strtolower($_SERVER['HTTP_USER_AGENT']),'android') !== false) { ?>
bb
  <!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>GlobalLove</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="https://www.globallove.online/images/GlobalLoveLogo2.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://www.globallove.online/app.min.css">

  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

<!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style type="text/css">
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

</style>

</head>
<body onunload="lol()" class="ltr body-default">

<?php

$payment= DB::Select("SELECT pt_u_id,pt_end_date,pt_start_date FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        if(count($payment) == '1' && $payment[0]->pt_start_date <= date('Y-m-d H:i:s') && $payment[0]->pt_end_date >= date('Y-m-d H:i:s')) {
          
            $expire = strtotime($payment[0]->pt_end_date)-time();
            setcookie('_gooDal', Crypt::encryptString(Crypt::decryptString($_COOKIE['UserIds'])), time() + $expire, "/");
        } else { 
          
          setcookie("_gooDal", "", time() - 3600, "/");
        ?>
            <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"><i class="fa fa-address-book" aria-hidden="true"></i> Upgrade Your Membership!</h4>
            <p><a href="/membership" class="alert-link">Upgrade your membership to send message(Chat) to anyone. 👫</a>.</p>
            <a href="/membership" onclick="upgrade()" class="btn btn-info btn-lg">💎 Upgrade Now</a>
            </div>

            <?php
            
        }


?>

@php
$phto= DB::Select("SELECT prfl_photo_path FROM users WHERE id = '".Crypt::decryptString($_COOKIE['UserIds'])."'");
@endphp

@if (count($phto) > 0)
  @if($phto[0]->prfl_photo_path == 'https://www.globallove.online/images/male-user-placeholder.png')
  <div class="alert alert-danger" role="alert">


  <h4 class="alert-heading"><i class="fa fa-camera" aria-hidden="true"></i> Upload Profile Photo</h4>
  <p>Your account is currently under review and needs the following in order go live and allow you to browse:<br>
  <span style= "color: #FFF;">Your profile must have at least one pic of yourself</span></p>
  <a href="/photos" class="btn btn-success btn-lg">Upload Now</a>

  </div>
  @endif
@endif


<?php } else { ?>
cc
  <!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>GlobalLove</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="https://www.globallove.online/images/GlobalLoveLogo2.png">
<!--   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://www.globallove.online/app.min.css">

  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

<!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style type="text/css">
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

</style>

</head>
<body onunload="lol()" class="ltr body-default">




  <div class="headerr" style="background-color: #ffffff !important; color: #000 !important;">
  <div class="container">
      <div class="d-flex">
          <a class="header-brand" href="/" style="color: #FFFFFF;">
               <img class="header-brand-img" src="https://www.globallove.online/images/GlobalLoveLogo2.png" alt="GlobalLove">             </a>
          <div class="d-flex align-items-center order-lg-2 ml-auto">
                                  
                      <div class="nav-item d-none d-sm-block">
      <!-- <a href="/index.php?r=balance%2Fservices" class="btn btn-outline-primary btn-sm" data-pjax="0" title="Balance" rel="tooltip">
        <i class="fas fa-wallet mr-2"></i><span class="user-balance">0</span>
      </a> -->
  </div>











<div class="dropdown">

@php
$propic= DB::Select("SELECT prfl_photo_path,prfl_approve_status FROM users WHERE id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");
@endphp  
@foreach($propic as $pro)
  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
    @if($pro->prfl_approve_status == '1')
      <span class="avatar" style="background-image: url({{ $pro->prfl_photo_path }})"></span>
    @else
    <span class="avatar" style="background-image: url('https://www.globallove.online/images/male-user-placeholder.png')"></span>
    @endif
@endforeach
      @if (isset($_COOKIE['UserIds']))
      <span class="ml-2 d-none d-lg-block">
        
          <span class="text-default">{{ Crypt::decryptString($_COOKIE['UserFullName']) }}</span>

          <small class="text-muted d-block mt-1">Profile</small>
      </span>

  </a>
  
  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
    <a class="dropdown-item" href="/profile">
           View Profile        </a>
      <a class="dropdown-item" href="/editprofile">
           Edit Profile        </a>
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
   
</div>


  
</div>
                  <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#header-navigation">
                      <span class="header-toggler-icon"></span>
                  </a>
                          </div>
      </div>
  </div>
</div>


<div class="header d-lg-block p-0" id="header-navigation">
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

      <li style="font-size: 20px;" class="nav-item"><a class="nav-link " target="_blank" href="#"> Globallove Online {{ count($online_users) }} </a></li>



</ul>            </div>
      @endif

      </div>
  </div>
</div>

<?php

$payment= DB::Select("SELECT pt_u_id,pt_end_date,pt_start_date FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        if(count($payment) == '1' && $payment[0]->pt_start_date <= date('Y-m-d H:i:s') && $payment[0]->pt_end_date >= date('Y-m-d H:i:s')) {
          
            $expire = strtotime($payment[0]->pt_end_date)-time();
            setcookie('_gooDal', Crypt::encryptString(Crypt::decryptString($_COOKIE['UserIds'])), time() + $expire, "/");
        } else { 
          
          setcookie("_gooDal", "", time() - 3600, "/");
        ?>
            <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"><i class="fa fa-address-book" aria-hidden="true"></i> Upgrade Your Membership!</h4>
            <p><a href="/membership" class="alert-link">Upgrade your membership to send message(Chat) to anyone. 👫</a>.</p>
            <a href="/membership" class="btn btn-info btn-lg">💎 Upgrade Now</a>
            </div>

            <?php
            
        }


?>

@php
//$phto= DB::Select("SELECT prfl_photo_path FROM users WHERE id = '".Crypt::decryptString($_COOKIE['UserIds'])."'");
$userapprove = DB::Select("SELECT prfl_approve_status FROM users WHERE id = '".Crypt::decryptString($_COOKIE['UserIds'])."'");
//dd($userapprove);
@endphp

@if(count($userapprove) > 0)
  @if($userapprove[0]->prfl_approve_status == 0)
  <div class="alert alert-danger" role="alert">


  <h4 class="alert-heading"><i class="fa fa-camera" aria-hidden="true"></i> Upload Profile Photo</h4>
  <p>Your account is currently under review and needs the following in order go live and allow you to browse:<br>
  <span style= "color: #FFF;">Your profile must have at least one pic of yourself</span></p>
  <a href="/photos" class="btn btn-success btn-lg">Upload Now</a>

  </div>
  @endif
@endif
<!-- <div class="alert alert-warning" role="alert">
@php
$msg= DB::Select("SELECT room_status FROM users_chat_rooms WHERE room_from_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' AND room_status= '1'");
@endphp
<h4 class="alert-heading"><i class="fa fa-envelope-square" aria-hidden="true"></i> Chat New Message!</h4>
<p><a href="/messages" class="alert-link">You have <span style="color: #44bd32; font-size: 18px;"><?php //echo count($msg); ?></span> new messages</a>.</p>
</div> -->




<?php } ?>















