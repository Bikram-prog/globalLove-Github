<html lang="en">

<head>
  <title>Globallove Chat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">











<meta name="csrf-token" content="{{ csrf_token() }}" />


<link rel="icon" type="image/x-icon" href="https://www.globallove.online/images/GlobalLoveLogo2.png">
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.1/socket.io.js" integrity="sha512-oFOCo2/3DtjrJG4N27BjSLQWoiBv171sK6a+JiWjp/7agxC2nCUP358AqzxkBUb5jX8g6CYLPdSKQTbC0weCwA==" crossorigin="anonymous"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

 
    <style>
        .progress { position:relative; width:100%; }
        .bar { background-color: #b5076f; width:0%; height:20px; }
        .percent { position:absolute; display:inline-block; left:50%; color: #040608;}
   </style>


  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.1/socket.io.js" integrity="sha512-oFOCo2/3DtjrJG4N27BjSLQWoiBv171sK6a+JiWjp/7agxC2nCUP358AqzxkBUb5jX8g6CYLPdSKQTbC0weCwA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script async src="https://www.googletagmanager.com/gtag/js?id=UA-213324873-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-213324873-1');
</script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ url('app.min.css') }}">


  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">



</head>




<body>






@php
$propic= DB::Select("SELECT prfl_photo_path,prfl_approve_status FROM users WHERE id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

$today = date('Y-m-d H:i:s');
$premium_login = DB::Select("select * from payment_transactions where pt_u_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' and pt_end_date > '".$today."'");
@endphp  


<!--///////////////////////////////////////////////////////// header end  //////////////////////////////////////////////////////////////-->

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
  .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link{
    color:#fff
  }
.order-lg-2 .dropdown{
    width: 13%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.nav-link .avatar{
    width: 4rem;
    height: 3rem;
}
.nav-tabs .nav-link {
    padding: 2rem 0;
}
.nav>li>a:focus, .nav>li>a:hover {
    text-decoration: none !important;
    background-color: transparent !important;
	padding-bottom: 15px;
}
#google_translate_element{
width:auto;
}

</style>

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
@endif
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

<?php
//get all online users
$online_users = DB::Select("select onln_status  FROM `users`
LEFT JOIN `users_metas` ON `users_metas`.`user_id` = `users`.`id` WHERE `users`.`id` != '".Crypt::decryptString($_COOKIE['UserIds'])."' AND `users_metas`.`sex` = '".Crypt::decryptString($_COOKIE['LookingFor'])."' AND `users`.`prfl_approve_status` = '1' AND `users`.`onln_status` = 'online' AND `users`.`id` NOT IN (
  SELECT b_who_id
  FROM block_users
  WHERE b_whom_id = '".Crypt::decryptString($_COOKIE['UserIds'])."')");
//------------------end ----------------------------------
?>


<div class="header d-lg-block p-0 mobheader" id="header-navigation" style="display: none;">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-lg order-lg-first">
              <ul class="nav nav-tabs border-0 flex-column flex-lg-row"><!-- <li class="nav-item active"><a class="nav-link active" href="/dashboard"><i class="fas fa-home"></i>Dashboard </a></li> -->
<li class="nav-item"><a class="nav-link " href="/browse"><i class="fa fa-search"></i>BROWSE </a></li>

<li class="nav-item"><a class="nav-link " href="/matches"><i class="far fa-heart"></i>MY MATCHES </a></li>



        <li class="nav-item dropdown" style="">
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



        <li class="nav-item dropdown" style="">
        

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
       

          
        <ul id="chat-list-header" style="margin: 0; padding: 10px;">

          <li class="mb-3" style="
              display: flex;
              flex: 1;
              align-items: flex-end;
              flex-direction: row;
              flex-wrap: nowrap;
              align-content: flex-end;
              justify-content: flex-end;
          ">
            <a style="margin-right: 5px;" class="btn btn-primary btn-sm btn-block" href="/messages/inbox2"><i class="fas fa-inbox"></i> Inbox</a>
            <a class="btn btn-dark btn-sm btn-block" href="sent"><i class="fas fa-share"></i> Sent</a>
          </li>

        <?php foreach($chatUsers as $cu) { 
  
      
            if($cu->prfl_approve_status == '0'){
                $propic = 'https://www.globallove.online/images/male-user-placeholder.png';
            } else{
                $propic = $cu->prfl_photo_path;
            }
        $msgs = DB::Select("SELECT COUNT(*) AS msgCount FROM users_chat WHERE (chat_from_id = ".Crypt::decryptString($_COOKIE['UserIds'])." AND chat_to_id = ".$cu->room_to_id.") OR (chat_from_id = ".$cu->room_to_id." AND chat_to_id = ".Crypt::decryptString($_COOKIE['UserIds']).") ORDER BY chat_date_time ASC");

            $msg= DB::Select("SELECT room_status FROM users_chat_rooms WHERE room_from_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' AND room_to_id= '".$cu->room_to_id."' AND room_status= '1'");

            $msg_latest = DB::Select("SELECT chat_msg FROM users_chat WHERE (chat_to_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' AND chat_from_id= '".$cu->room_to_id."') OR (chat_from_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' AND chat_to_id= '".$cu->room_to_id."') order by chat_id DESC LIMIT 1");

            if($cu->room_to_id > 0):
           if(empty($msgs[0]->msgCount) || $msgs[0]->msgCount <= 0){
		 continue;
	   }
      ?>

        <li onclick="loadChat('<?php echo $cu->room_to_id; ?>', '<?php echo $cu->name; ?>', '<?php echo $cu->email; ?>', '<?php echo $cu->onln_status; ?>')" id="idd_<?php echo $cu->room_to_id; ?>" style="margin-bottom: 10px; list-style: none; cursor: pointer;
          padding: 4px;
          font-size: 16px;
          font-weight: 700;
          color: #000;
          border-radius: 8px;"> 
          <span><img style="width: 48px;
          height: 48px;
          border-radius: 25px;

          border: 1px solid #444; display: inherit;" src="{{$propic}}" /></span>
          
        
          {{-- @if(count($msg) > 0)
          <span id="badge_<?php echo $cu->room_to_id; ?>" style="float: right;
          margin-top: 31px;
          margin-right: 20px;
          width: 20px;" class="badge badge-success"> {{count($msg)}} </span>
          
          @endif --}}

          <p style="float:right;margin-right:30px;width:270px">{{$cu->name}} <br>


          @if(count($msg_latest) > 0 && count($msg) > 0 && isset($msg_latest[0]->chat_msg) && $msg_latest[0]->chat_msg != '')

          <span style="font-size: 15px;
          color: #000000;
          font-weight: 700;">{{Str::limit ($msg_latest[0]->chat_msg, 30)}}</span></p>

          @elseif(count($msg_latest) > 0 && count($msg) == 0 && isset($msg_latest[0]->chat_msg) && $msg_latest[0]->chat_msg != '') 

          <span style="font-size: 15px;
          color: #a7a5a5;
          font-weight: 400;">{{Str::limit ($msg_latest[0]->chat_msg, 30)}}</span></p>

          @elseif(isset($msg_latest[0]->chat_msg) && $msg_latest[0]->chat_msg == '' && count($msg) > 0) 

          <span style="font-size: 15px;
          color: #000000;
          font-weight: 700;"><i class="fas fa-paperclip"></i> Media</span></p>

          @else

          <span style="font-size: 15px;
          color: #a7a5a5;
          font-weight: 400;"><i class="fas fa-paperclip"></i> Media</span></p>

         @endif

        </li>



      <?php endif; } ?>


    
</ul>





        </div>
      </li>



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
    
      <div id="google_translate_element"></div>
      </div>
  </div>
</div>




<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">


<style type="text/css">
.csbtn {
  transform: rotate(90deg);
  position: fixed;
  right: -65px;
  top: 230px;
  z-index: 1000;
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.1/socket.io.js" integrity="sha512-oFOCo2/3DtjrJG4N27BjSLQWoiBv171sK6a+JiWjp/7agxC2nCUP358AqzxkBUb5jX8g6CYLPdSKQTbC0weCwA==" crossorigin="anonymous"></script>

<!-- <script src="{{asset('content')}}/assets/30603563/jquery.js"></script> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
 
    <style>
        .progress { position:relative; width:100%; }
        .bar { background-color: #b5076f; width:0%; height:20px; }
        .percent { position:absolute; display:inline-block; left:50%; color: #040608;}
   </style>


  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.1/socket.io.js" integrity="sha512-oFOCo2/3DtjrJG4N27BjSLQWoiBv171sK6a+JiWjp/7agxC2nCUP358AqzxkBUb5jX8g6CYLPdSKQTbC0weCwA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<style>
  .wrapper {
    display: none;
}
.ui-dialog-titlebar-close {
    visibility: hidden;
}
.btn.focus, .btn:focus, .btn:hover{
color:white !important;
}
.main {
    background-color: #eee;
    width: 320px;
    position: fixed;
    bottom: 0;
    right: 330px;
    border-radius: 8px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    /* padding: 6px 0px 0px 0px */
}

.scroll {
    overflow-y: scroll;
    scroll-behavior: smooth;
    height: 325px
}

.img1 {
    border-radius: 50%;
    background-color: #66BB6A
}

.name {
    font-size: 13px
}

.msg {
    background-color: #5C54AD;
    font-size: 16px;
    padding: 5px;
    border-radius: 5px;
    font-weight: 500;
    color: #fff;
}

.msg_other {
  background-color: #fff;
  font-size: 16px;
  padding: 5px;
  border-radius: 5px;
  font-weight: 500;
  color: #2c2c2c;
}

.between {
    font-size: 8px;
    font-weight: 500;
    color: #a09e9e
}


.caution-msg{
  border-bottom-right-radius: 8px;
    background: #fff;
    padding: 0px 20px;
    font-size: 12px;
    border-bottom-left-radius: 8px;
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
}



.icon1 {
    color: #7C4DFF !important;
    font-size: 18px !important;
    cursor: pointer
}

.icon2 {
    color: #512DA8 !important;
    font-size: 18px !important;
    position: relative;
    left: 8px;
    padding: 0px;
    cursor: pointer
}

.icondiv {
    border-radius: 50%;
    width: 15px;
    height: 15px;
    padding: 2px;
    position: relative;
    bottom: 1px
}
.header-chat {
  background-color: #fff;
  padding: 10px;
  border-radius: 8px;
  border: 1px solid #ccc;
  font-weight: 700;
}


.lds-roller {
  display: inline-block;
  position: relative;
  width: 64px;
  height: 64px;
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 32px 32px;
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: #F15052;
  margin: -3px 0 0 -3px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 50px;
  left: 50px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 54px;
  left: 45px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 57px;
  left: 39px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 58px;
  left: 32px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 57px;
  left: 25px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 54px;
  left: 19px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 50px;
  left: 14px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 45px;
  left: 10px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

.chat_d:hover{
  text-decoration:none
}
</style>


<!-- buy + sell -->

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
        It’s only available in Australia and the Philippines at present.
      </div>
      <div class="modal-footer">
        <button type="button" onclick="go_window();" class="btn btn-success" data-bs-dismiss="modal">Go to site</button>
        <button type="button" onclick="hideModal();return false;" class="btn btn-primary">Cancel</button>
      </div>
    </div>
  </div>
</div>

<script>
  function bes_modal() {
    $('#staticBackdrop').modal('show');
}

  function go_window() {
    window.open( 
              "https://bescrow.world/", "_blank");
  }
  
  
  function hideModal() {
    $('#staticBackdrop').modal('hide');
  }
  
  </script>

<!-- buy + sell end -->

<!-- Ask An Expert -->

<div class="modal fade" id="staticBackdropExp" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
      We are in the process of activating these pages, please get back to us soon.
      </div>
      <div class="modal-footer">
        <button type="button" onclick="hideModalExp();" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
        
      </div>
    </div>
  </div>
</div>

<script>
  function exp_modal() {
    $('#staticBackdropExp').modal('show');
}
  
  function hideModalExp() {
    $('#staticBackdropExp').modal('hide');
  }
  
  </script>

<!-- End Ask An Expert -->

<!-- Ask An Moderator -->

<div class="modal fade" id="staticBackdropMod" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
      We are in the process of activating these pages, please get back to us soon.
      </div>
      <div class="modal-footer">
        <button type="button" onclick="hideModalMod();" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
        
      </div>
    </div>
  </div>
</div>

<script>
  function mod_modal() {
    $('#staticBackdropMod').modal('show');
}
  
  function hideModalMod() {
    $('#staticBackdropMod').modal('hide');
  }
  
  </script>

<!-- End Ask An Moderator -->

<!-- Send A Gift -->

<div class="modal fade" id="staticBackdropSnd" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
      We are in the process of activating these pages, please get back to us soon.
      </div>
      <div class="modal-footer">
        <button type="button" onclick="hideModalSnd();" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
        
      </div>
    </div>
  </div>
</div>

<script>
  function snd_modal() {
    $('#staticBackdropSnd').modal('show');
}
  
  function hideModalSnd() {
    $('#staticBackdropSnd').modal('hide');
  }
  
  </script>

<!-- End Send A Gift -->



<?php if(isset($_COOKIE['UserEmail'])) { ?>

<?php } ?>

<script>
  $(function () {

    $("#dialognoprofilepic").dialog({
        autoOpen: false,
        modal: true,
        title: "No photos",
        open: function(event, ui) {
        $(".ui-dialog-titlebar-close", ui.dialog || ui).hide();
       },
        buttons: {
            Close: function () {
                $(this).dialog('close');
            }
        }
    });

    $("#dialogusernoprofile").dialog({
        autoOpen: false,
        modal: true,
        title: "No photos",
        open: function(event, ui) {
        $(".ui-dialog-titlebar-close", ui.dialog || ui).hide();
       },
        buttons: {
            Close: function () {
                $(this).dialog('close');
            }
        }
    });

    $("#suspendedalert").dialog({
        autoOpen: false,
        modal: true,
        title: "Suspended",
        open: function(event, ui) {
        $(".ui-dialog-titlebar-close", ui.dialog || ui).hide();
       },
        buttons: {
            Close: function () {
                $(this).dialog('close');
            }
        }
    });


    let _token   = $('meta[name="csrf-token"]').attr('content');
    $("#notifbell").click(function(){

      $.ajax({
        type: "POST",
        url: '/updatenotif', // This is what I have updated
        data:{
          _token: _token
            },
        }).done(function( msg ) {
           //loading users list
          
           $('#badge_notif').hide();

  
        });

  });

  $("#report-btn").click(function(){

    if($('.report_block').is(':visible')){
      $('.report_block').hide();
    }else{
      $('.report_block').show();
    }
    

});


            $("#profile-dob").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd/mm/yy',
                yearRange: '1950:2003'   //Current Year -10 to Current Year + 10.
            });


    // INITIALIZE DATEPICKER PLUGIN
    $('.datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy"
    });


    // FOR DEMO PURPOSE
    $('#reservationDate').on('change', function () {
        var pickedDate = $('input').val();
        $('#pickedDate').html(pickedDate);
    });
});
</script>

<script>



    function search() {

        
        window.ReactNativeWebView.postMessage('search')
      }

    function upgrade() {
        
        window.ReactNativeWebView.postMessage('upgrade')
      }

    function login() {
      
      window.ReactNativeWebView.postMessage('loggedin')
    }

    function profile() {
      
      window.ReactNativeWebView.postMessage('profile')
    }
</script>

</script>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<!--///////////////////////////////////////////////////////// header end  //////////////////////////////////////////////////////////////-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Font Awesome File -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<style>

html,
body,
div,
span {

  width: 100%;

  padding: 0;
  margin: 0;
  box-sizing: border-box;
}



.fa-2x {
  font-size: 1.5em !important;
}

.bs-app {
  position: relative;
  overflow: hidden;
  top: 19px;
  height: calc(100% - 38px);
  margin: auto !important;
  padding: 0 !important;
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .06), 0 2px 5px 0 rgba(0, 0, 0, .2);
}

.bs-app-one {
  background-color: #f7f7f7;
  height: 100%;
  overflow: hidden;
  margin: 0 !important;
  padding: 0 !important;
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .06), 0 2px 5px 0 rgba(0, 0, 0, .2);
}

.bs-side {
  padding: 0 !important;
  margin: 0 !important;
  height: 100%;
    background: white;
}
.bs-side-one {
  padding: 0;
  margin: 0;
  height: 100%;
  width: 100%;
  z-index: 1;
  position: relative;
  display: block;
  top: 0;
}

.bs-side-two {
  padding: 0 !important;
  margin: 0 !important;
  height: 100%;
  width: 100%;
  z-index: 2;
  position: relative;
  top: -100%;
  left: -100%;
  -webkit-transition: left 0.3s ease;
  transition: left 0.3s ease;

}


.bs-heading {
  padding: 10px 16px 10px 15px;
  margin: 0 !important;
  height: 60px;
  width: 100%;
  background-color: #eee;
  z-index: 1000;
}

.bs-heading-avatar {
  padding: 0 !important;
  cursor: pointer;

}

.bs-heading-avatar-icon img {
  border-radius: 50%;
  height: 40px;
  width: 40px;
}

.bs-heading-name {
  padding: 0 !important;
  cursor: pointer;
}

.bs-heading-name-meta {
  font-weight: 700;
  font-size: 100%;
  padding: 5px;
  padding-bottom: 0;
  text-align: left;
  text-overflow: ellipsis;
  white-space: nowrap;
  color: #000;
  display: block;
}
.bs-heading-online {
  display: none;
  padding: 0 5px;
  font-size: 12px;
  color: #93918f;
}
.bs-heading-compose {
  padding: 0;
}

.bs-heading-compose i {
  text-align: center;
  padding: 5px;
  color: #93918f;
  cursor: pointer;
}

.bs-heading-dot {
  padding: 0;
  margin-left: 10px;
}

.bs-heading-dot i {
  text-align: right;
  padding: 5px;
  color: #93918f;
  cursor: pointer;
}

.bs-searchBox {
  padding: 0 !important;
  margin: 0 !important;
  height: 60px;
  width: 100%;
}

.bs-searchBox-inner {
  height: 100%;
  width: 100%;
  padding: 10px !important;
  background-color: #fbfbfb;
}


/*#searchBox-inner input {
  box-shadow: none;
}*/

.bs-searchBox-inner input:focus {
  outline: none;
  border: none;
  box-shadow: none;
}

.bs-sideBar {
  padding: 0 !important;
  margin: 0 !important;
  background-color: #fff;
  overflow-y: auto;
  border: 1px solid #f7f7f7;
  /*height: calc(100% - 120px);*/
}

.bs-sideBar-body {
  position: relative;
  padding: 10px !important;
  border-bottom: 1px solid #f7f7f7;
  height: 72px;
  margin: 0 !important;
  cursor: pointer;
}

.bs-sideBar-body:hover {
  background-color: #f2f2f2;
}

.bs-sideBar-avatar {
  text-align: center;
  padding: 0 !important;
}

.bs-avatar-icon img {
  border-radius: 50%;
  height: 49px;
  width: 49px;
}

.bs-sideBar-main {
  padding: 0 !important;
}

.bs-sideBar-main .row {
  padding: 0 !important;
  margin: 0 !important;
}

.bs-sideBar-name {
  padding: 10px !important;
}

.bs-name-meta {
  font-size: 100%;
  padding: 1% !important;
  text-align: left;
  text-overflow: ellipsis;
  white-space: nowrap;
  color: #000;
}

.bs-sideBar-time {
  padding: 10px !important;
}

.bs-time-meta {
  text-align: right;
  font-size: 12px;
  padding: 1% !important;
  color: rgba(0, 0, 0, .4);
  vertical-align: baseline;
}

/*New Message*/

.bs-newMessage {
  padding: 0 !important;
  margin: 0 !important;
  height: 100%;
  position: relative;
  left: -100%;
}
.bs-newMessage-heading {
  padding: 10px 16px 10px 15px !important;
  margin: 0 !important;
  height: 100px;
  width: 100%;
  background-color: #00bfa5;
  z-index: 1001;
}

.bs-newMessage-main {
  padding: 10px 16px 0 15px !important;
  margin: 0 !important;
  height: 60px;
  margin-top: 30px !important;
  width: 100%;
  z-index: 1001;
  color: #fff;
}

.bs-newMessage-title {
  font-size: 18px;
  font-weight: 700;
  padding: 10px 5px !important;
}
.bs-newMessage-back {
  text-align: center;
  vertical-align: baseline;
  padding: 12px 5px !important;
  display: block;
  cursor: pointer;
}
.bs-newMessage-back i {
  margin: auto !important;
}

.bs-composeBox {
  padding: 0 !important;
  margin: 0 !important;
  height: 60px;
  width: 100%;
}

.bs-composeBox-inner {
  height: 100%;
  width: 100%;
  padding: 10px !important;
  background-color: #fbfbfb;
}

.bs-composeBox-inner input:focus {
  outline: none;
  border: none;
  box-shadow: none;
}

.bs-compose-sideBar {
  padding: 0 !important;
  margin: 0 !important;
  background-color: #fff;
  overflow-y: auto;
  border: 1px solid #f7f7f7;
  height: calc(100% - 160px);
}

/*Conversation*/

.bs-conversation {
  padding: 0 !important;
  margin: 0 !important;
  height: 100%;
  /*width: 100%;*/
  border-left: 1px solid rgba(0, 0, 0, .08);
  /*overflow-y: auto;*/
}

.bs-message {
  padding: 0 !important;
  margin: 0 !important;
  /*background: url("w.jpg") no-repeat fixed center;*/
  background-size: cover;
  overflow-y: auto;
  border: 1px solid #f7f7f7;
  height: calc(100% - 120px);
}
.bs-message-previous {
  margin : 0 !important;
  padding: 0 !important;
  height: auto;
  width: 100%;
}
.bs-previous {
  font-size: 15px;
  text-align: center;
  padding: 10px !important;
  cursor: pointer;
}

.bs-previous a {
  text-decoration: none;
  font-weight: 700;
}

.bs-message-body {
  margin: 0 !important;
  padding: 0 !important;
  width: auto;
  height: auto;
}

.bs-message-main-receiver {
  /*padding: 10px 20px;*/
  max-width: 60%;
}

.bs-message-main-sender {
  padding: 3px 20px !important;
  margin-left: 40% !important;
  max-width: 60%;
}
#msgs-display .row{
display:block !important;
}
.bs-message-text {
  margin: 0 !important;
  padding: 5px !important;
  word-wrap:break-word;
  font-weight: 200;
  font-size: 14px;
  padding-bottom: 0 !important;
}

.bs-message-time {
  margin: 0 !important;
  margin-left: 50px !important;
  font-size: 12px;
  text-align: right;
  color: #9a9a9a;

}

.bs-receiver {
  width: auto !important;
  padding: 4px 10px 7px !important;
  border-radius: 10px 10px 10px 0;
  background: #ffffff;
  font-size: 12px;
  text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
  word-wrap: break-word;
  display: inline-block;
}

.bs-sender {
  float: right;
  width: auto !important;
  background: #dcf8c6;
  border-radius: 10px 10px 0 10px;
  padding: 4px 10px 7px !important;
  font-size: 12px;
  text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
  display: inline-block;
  word-wrap: break-word;
}


/*Reply*/

.bs-reply {
  height: 60px;
  width: 100%;
  background-color: #f5f1ee;
  padding: 10px 5px 10px 5px !important;
  margin: 0 !important;
  z-index: 1000;
}

.bs-reply-emojis {
  padding: 5px !important;
}

.bs-reply-emojis i {
  text-align: center;
  padding: 5px 5px 5px 5px !important;
  color: #93918f;
  cursor: pointer;
}

.bs-reply-recording {
  padding: 5px !important;
}

.bs-reply-recording i {
  text-align: center;
  padding: 5px !important;
  color: #93918f;
  cursor: pointer;
}

.bs-reply-send {
  padding: 5px !important;
}

.bs-reply-send i {
  text-align: center;
  padding: 5px !important;
  color: #93918f;
  cursor: pointer;
}

.bs-reply-main {
  padding: 2px 5px !important;
}

.bs-reply-main textarea {
  width: 100%;
  resize: none;
  overflow: hidden;
  padding: 5px !important;
  outline: none;
  border: none;
  text-indent: 5px;
  box-shadow: none;
  height: 100%;
  font-size: 16px;
}

.bs-reply-main textarea:focus {
  outline: none;
  border: none;
  text-indent: 5px;
  box-shadow: none;
}

.bs-msg-images{
    width: 100%;
    height: auto;
}

@media screen and (max-width: 700px) {
  .bs-app {
    top: 0;
    height: 100%;
  }
  .bs-heading {
    height: 70px;
    background-color: #009688;
  }
  .fa-2x {
    font-size: 2.3em !important;
  }
  .bs-heading-avatar {
    padding: 0 !important;
  }
  .bs-heading-avatar-icon img {
    height: 50px;
    width: 50px;
  }
  .bs-heading-compose {
    padding: 5px !important;
  }
  .bs-heading-compose i {
    color: #fff;
    cursor: pointer;
  }
  .bs-heading-dot {
    padding: 5px !important;
    margin-left: 10px !important;
  }
  .bs-heading-dot i {
    color: #fff;
    cursor: pointer;
  }
  .bs-sideBar {
    /*height: calc(100% - 130px);*/
  }
  .bs-sideBar-body {
    height: 80px;
  }
  .bs-sideBar-avatar {
    text-align: left;
    padding: 0 8px !important;
  }
  .bs-avatar-icon img {
    height: 55px;
    width: 55px;
  }
  .bs-sideBar-main {
    padding: 0 !important;
  }
  .bs-sideBar-main .row {
    padding: 0 !important;
    margin: 0 !important;
  }
  .bs-sideBar-name {
    padding: 10px 5px !important;
  }
  .bs-name-meta {
    font-size: 16px;
    padding: 5% !important;
  }
  .bs-sideBar-time {
    padding: 10px !important;
  }
  .bs-time-meta {
    text-align: right;
    font-size: 14px;
    padding: 4% !important;
    color: rgba(0, 0, 0, .4);
    vertical-align: baseline;
  }
  /*Conversation*/
  .bs-conversation {
    padding: 0 !important;
    margin: 0 !important;
    height: 100%;
    /*width: 100%;*/
    border-left: 1px solid rgba(0, 0, 0, .08);
    /*overflow-y: auto;*/
  }
  .bs-message {
    height: calc(100% - 140px);
  }
  .bs-reply {
    height: 70px;
  }
  .bs-reply-emojis {
    padding: 5px 0 !important;
  }
  .bs-reply-emojis i {
    padding: 5px 2px !important;
    font-size: 1.8em !important;
  }
  .bs-reply-main {
    padding: 2px 8px !important;
  }
  .bs-reply-main textarea {
    padding: 8px !important;
    font-size: 18px;
  }
  .bs-reply-recording {
    padding: 5px 0 !important;
  }
  .bs-reply-recording i {
    padding: 5px 0 !important;
    font-size: 1.8em !important;
  }
  .bs-reply-send {
    padding: 5px 0 !important;
  }
  .bs-reply-send i {
    padding: 5px 2px 5px 0 !important;
    font-size: 1.8em !important;
  }
}

</style>


@php
$propic= DB::Select("SELECT prfl_photo_path,prfl_approve_status FROM users WHERE id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

$today = date('Y-m-d H:i:s');
$premium_login = DB::Select("select * from payment_transactions where pt_u_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' and pt_end_date > '".$today."'");
@endphp  
  <div class="container bs-app">
    <div class="row bs-app-one">

      <div class="col-sm-4 bs-side">
        <div class="bs-side-one">
          <!-- Heading -->
          <div class="row bs-heading">
            <div class="col-sm-6 col-xs-6 bs-heading-avatar" style="display:flex;">
              <div class="bs-heading-avatar-icon">
@foreach($propic as $pro)
    @if($pro->prfl_approve_status == '1')
   	<img id="profile-img" src="{{ $pro->prfl_photo_path }}">
    @else
        @if($propic != 'https://www.globallove.online/images/male-user-placeholder.png')
	   <img id="profile-img" src="{{ $pro->prfl_photo_path }}">
        @else  
   	   <img id="profile-img" src="https://www.globallove.online/images/male-user-placeholder.png">
        @endif
    @endif
@endforeach
              </div>
		<div class="bs-heading-user-name" style="font-weight:bold;">
		   Welcome {{ Crypt::decryptString($_COOKIE['UserFullName']) }}
		</div>
            </div>

          </div>
          <!-- Heading End -->

          <!-- SearchBox -->
          <div class="row bs-searchBox">
            <div class="col-sm-12 bs-searchBox-inner">
              <div class="form-group has-feedback">
                <input id="searchText" type="text" onchange="searchUser(this)" class="form-control" name="searchText" placeholder="Search">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
              </div>
            </div>
          </div>

          <!-- Search Box End -->
          <!-- sideBar -->
          <div id="main-div" class="row bs-sideBar">
          @php
		$count = 0;
	    @endphp
	@foreach ($users as $key => $user)
	    
	    @if(empty($user['msgCount']) || $user['msgCount'] <= 0)
		 @continue
	    @endif
            <div id="{{$user['user_id']}}" data-username="{{$user['name']}}" onclick="loadChat('{{$user['user_id']}}', '{{$user['name']}}', '{{$user['email']}}','offline', '{{$user['propic']}}')" class="row bs-sideBar-body">
              <div class="col-sm-3 col-xs-3 bs-sideBar-avatar">
                <div class="bs-avatar-icon">
                  <img src="{{$user['propic']}}">
                </div>
              </div>
              <div class="col-sm-9 col-xs-9 bs-sideBar-main">
                <div class="row">
                  <div style="display:flex; justify-content:center; align-items:center;" class="col-sm-8 col-xs-8 bs-sideBar-name">
                    <span class="bs-name-meta">{{$user['name']}}
                  </span>
		  <span id="count-msg-{{$user['user_id']}}"  data-id="{{$user['user_id']}}" style="width: 20px;display: none;justify-content: center;align-items: center;background-color:#e50000;" class="badge badge-danger">1</span>
                  </div>
                  <div onclick="deleteChat({{$user['user_id']}}, {{$count}})" class="col-sm-4 col-xs-4 pull-right bs-sideBar-time" style="display: flex;justify-content: end;width: 15%;">
<i class="fas fa-trash" style="color: #9f1414 !important;font-size: 25px !important;position: relative;left: -5px;padding: 0px;cursor: pointer;"></i>
                  </div>
                </div>
              </div>
           </div>
	    @php
		$count++;
	    @endphp
   @endforeach
        
          </div>
          <!-- Sidebar End -->
        </div>
        <div class="bs-side-two">

          <!-- Heading -->
          <div class="row bs-newMessage-heading">
            <div class="row bs-newMessage-main">
              <div class="col-sm-2 col-xs-2 bs-newMessage-back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
              </div>
              <div class="col-sm-10 col-xs-10 newMessage-title">
                New Chat
              </div>
            </div>
          </div>
          <!-- Heading End -->

          <!-- ComposeBox -->
          <div class="row composeBox">
            <div class="col-sm-12 bs-composeBox-inner">
              <div class="form-group has-feedback">
                <input id="composeText" type="text" class="form-control" name="searchText" placeholder="Search People">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
              </div>
            </div>
          </div>
          <!-- ComposeBox End -->

          <!-- sideBar -->
          <div class="row bs-compose-sideBar">
            <div class="row bs-sideBar-body">
              <div class="col-sm-3 col-xs-3 bs-sideBar-avatar">
                <div class="avatar-icon">
                  <img src="">
                </div>
              </div>
              <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                  <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta">Ankit Jain
                  </span>
                  </div>
                  <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                    <span class="time-meta pull-right">18:18
                  </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row sideBar-body">
              <div class="col-sm-3 col-xs-3 sideBar-avatar">
                <div class="avatar-icon">
                  <img src="">
                </div>
              </div>
              <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                  <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta">Ankit Jain
                  </span>
                  </div>
                  <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                    <span class="time-meta pull-right">18:18
                  </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row sideBar-body">
              <div class="col-sm-3 col-xs-3 sideBar-avatar">
                <div class="avatar-icon">
                  <img src="">
                </div>
              </div>
              <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                  <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta">Ankit Jain
                  </span>
                  </div>
                  <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                    <span class="time-meta pull-right">18:18
                  </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row sideBar-body">
              <div class="col-sm-3 col-xs-3 sideBar-avatar">
                <div class="avatar-icon">
                  <img src="">
                </div>
              </div>
              <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                  <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta">Ankit Jain
                  </span>
                  </div>
                  <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                    <span class="time-meta pull-right">18:18
                  </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row sideBar-body">
              <div class="col-sm-3 col-xs-3 sideBar-avatar">
                <div class="avatar-icon">
                  <img src="">
                </div>
              </div>
              <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                  <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta">Ankit Jain
                  </span>
                  </div>
                  <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                    <span class="time-meta pull-right">18:18
                  </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row sideBar-body">
              <div class="col-sm-3 col-xs-3 sideBar-avatar">
                <div class="avatar-icon">
                  <img src="">
                </div>
              </div>
              <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                  <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta">Ankit Jain
                  </span>
                  </div>
                  <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                    <span class="time-meta pull-right">18:18
                  </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row sideBar-body">
              <div class="col-sm-3 col-xs-3 sideBar-avatar">
                <div class="avatar-icon">
                  <img src="">
                </div>
              </div>
              <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                  <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta">Ankit Jain
                  </span>
                  </div>
                  <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                    <span class="time-meta pull-right">18:18
                  </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row sideBar-body">
              <div class="col-sm-3 col-xs-3 sideBar-avatar">
                <div class="avatar-icon">
                  <img src="">
                </div>
              </div>
              <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                  <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta">Ankit Jain
                  </span>
                  </div>
                  <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                    <span class="time-meta pull-right">18:18
                  </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row sideBar-body">
              <div class="col-sm-3 col-xs-3 sideBar-avatar">
                <div class="avatar-icon">
                  <img src="">
                </div>
              </div>
              <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                  <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta">Ankit Jain
                  </span>
                  </div>
                  <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                    <span class="time-meta pull-right">18:18
                  </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row sideBar-body">
              <div class="col-sm-3 col-xs-3 sideBar-avatar">
                <div class="avatar-icon">
                  <img src="">
                </div>
              </div>
              <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                  <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta">Ankit Jain
                  </span>
                  </div>
                  <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                    <span class="time-meta pull-right">18:18
                  </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Sidebar End -->
      </div>


      <!-- New Message Sidebar End -->

      <!-- Conversation Start -->
      <div class="col-sm-8 bs-conversation">
        <!-- Heading -->
	<div id="first-display" style="height: 100%;display: flex;justify-content: center;align-items: center;font-size: 30px;font-weight: bold;">
		Welcome to Chat Side
	</div>
	<div id="msgs-display" style="display:none;">
        <div class="row bs-heading">
          <div class="col-sm-2 col-md-1 col-xs-3 bs-heading-avatar">
            <div class="bs-heading-avatar-icon">
              <img id="profile-user" src="">
            </div>
          </div>
          <div class="col-sm-8 col-xs-7 bs-heading-name">
            <a class="bs-heading-name-meta">Ankit Jain
            </a>
            <span class="bs-heading-online">Online</span>
          </div>

        </div>
        <!-- Heading End -->

        <!-- Message Box -->
        <div class="row bs-message" id="chat_messenger">

          <div class="row message-previous">
            <div class="col-sm-12 previous">
              <a onclick="previous(this)" id="ankitjain28" name="20">
              Show Previous Message!
              </a>
            </div>
          </div>

          <div class="row message-body">
            <div class="col-sm-12 message-main-receiver">
              <div class="receiver">
                <div class="message-text">
                 Hyy, Its Awesome..!
                </div>
                <span class="message-time pull-right">
                  Sun
                </span>
              </div>
            </div>
          </div>

          <div class="row message-body">
            <div class="col-sm-12 message-main-sender">
              <div class="sender">
                <div class="message-text">
                  Thanks n I know its awesome...!
                </div>
                <span class="message-time pull-right">
                  Sun
                </span>
              </div>
            </div>
          </div>

        </div>
        <!-- Message Box End -->

        <!-- Reply Box -->
        <div class="row bs-reply">
          <form method="post" id="gl_file_upload" action="/sendfile" enctype="multipart/form-data" style="margin:0;">
          @csrf

          <div class="col-sm-1 col-xs-1 bs-reply-emojis" style="display: flex;justify-content: center;align-items: center;">
            <i class="fa fa-plus-circle" id="OpenImgUpload" style="color: #512DA8 !important;font-size: 25px !important;position: relative;left: -5px;padding: 0px;cursor: pointer;"></i>
	    	<i class="fa fa-smile-o" id="call-emoji" style="color: #433e08 !important;font-size: 25px !important;position: relative;left: -5px;padding: 0px;cursor: 	pointer;"></i>
          </div>

          <div class="col-sm-9 col-xs-9 bs-reply-main">
      	  <input type="hidden" id="hd_t" value="">
      	  <input type="hidden" id="emchat" value="">
	<input type="file" name="file[]" multiple="" id="imgupload" style="display:none">
          <input type="hidden" name="to" id="hd_to_img">
            <textarea class="form-control" rows="1" id="comment"></textarea>
		<input type="submit" id="upload_start_gl_file" name="upload" value="Upload" class="btn btn-success" style="display: none;">
	</form>
          </div>
          <div class="col-sm-1 col-xs-1 bs-reply-send" onclick="newMessage()" style="display: flex;justify-content: center;align-items: center;">
            <i class="fa fa-send fa-2x" aria-hidden="true"></i>
          </div>
        </div>
        <!-- Reply Box End -->
	</div>
      </div>
      <!-- Conversation End -->
    </div>
    <!-- App One End -->
  </div>
<div class="bs-space" style="height: 100px;"></div>
  <!-- App End -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.1/socket.io.js" integrity="sha512-oFOCo2/3DtjrJG4N27BjSLQWoiBv171sK6a+JiWjp/7agxC2nCUP358AqzxkBUb5jX8g6CYLPdSKQTbC0weCwA==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.1/socket.io.js" integrity="sha512-oFOCo2/3DtjrJG4N27BjSLQWoiBv171sK6a+JiWjp/7agxC2nCUP358AqzxkBUb5jX8g6CYLPdSKQTbC0weCwA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<!-----------------------------------------chat end ---------------------------------------->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>




    <script src="{{ url('vanillaEmojiPicker.js') }}"></script>

    <script>

        new EmojiPicker({
            trigger: [
                {
                    selector: '#call-emoji',
                    insertInto: ['#comment'] // '.selector' can be used without array
                },

            ],
            closeButton: true,
            //specialButtons: green
        });

    </script>



<script>

//$("#comment").emojioneArea({
 //  standalone: true,
  // pickerPosition:"top"
//});

var input = document.getElementById("comment");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   newMessage();
   //document.getElementById("sendChat").click();
  }
});


</script>


<!-------------------------------- chat script ------------------------------------------>

<script>



  //-------------------- socket connection established-------------------------------------
  //ajax chat messages with socket------------------------------------------------------------------------
var socket = io('https://yourdeveloper.world', {transports: ['websocket']});
socket.emit('join', {email: '<?php echo Crypt::decryptString($_COOKIE['UserEmail']); ?>', id: '<?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>'});

// from video call request 
socket.on("new_msg_call_req", function(data) {
console.log(data);
	const main = document.querySelectorAll("#main-div")[0];
	for(var i=0; i<main.children.length; i++){
	  if(main.children[i].id == data.to){
	  	main.children[i].parentNode.insertBefore(main.children[i], main.children[0]);
	  }
	}
  $("#calling_from").html(data.toname);
  $("#room").val(data.room)
  $("#videocallDiolog").modal("show");
});


socket.on("send_msg_server", function(data){
console.log('got data');
console.log(data);
})

//get message from server
socket.on("new_msg", function(data) {
console.log(data);
	$(".typing").html('');
  // $('.toast').show();
  // $(".toast-body").html(data.msg);
  // $('.toast').toast('show');

  if(data.msg !=''){
	const main = document.querySelectorAll("#main-div")[0];
	for(var i=0; i<main.children.length; i++){
	  if(main.children[i].id == data.to){
	  	main.children[i].parentNode.insertBefore(main.children[i], main.children[0]);
	  }
	}

    $('.toast_notify').append(`<div onclick="loadChat('${data.to}','${data.toname}','${data.toemail}','')" style="cursor: pointer; opacity: 1 !important; background: #F15052;color: #fff; width: 100%;" class="toast" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header" style="color:#000;"><i class="far fa-comment"></i> &nbsp; <strong class="mr-auto">${data.toname}</strong><small class="text-muted"> </small><button style="background: transparent;border: none;" type="button" class="ml-2 mb-1" onclick="hidechatbox()"><i class="fas fa-times"></i></button></div><div class="toast-body">${data.msg}</div></div>`);
  } else {
	const main = document.querySelectorAll("#main-div")[0];
	for(var i=0; i<main.children.length; i++){
	  if(main.children[i].id == data.to){
	  	main.children[i].parentNode.insertBefore(main.children[i], main.children[0]);
	  }
	}
    $('.toast_notify').append(`<div onclick="loadChat('${data.to}','${data.toname}','${data.toemail}','')" style="cursor: pointer; opacity: 1 !important; background: #F15052;color: #fff; width: 100%;" class="toast" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header" style="color:#000;"><i class="far fa-comment"></i> &nbsp; <strong class="mr-auto">${data.toname}</strong><small class="text-muted"> </small><button style="background: transparent;border: none;" type="button" class="ml-2 mb-1" onclick="hidechatbox()"><i class="fas fa-times"></i></button></div><div class="toast-body"><i class="fas fa-camera-retro"></i> Photo</div></div>`);
  }
  


//$("#count-msg-"+data.to).text('1+');
  $("#count-msg-"+data.to).text('1+').css('display', 'flex');
  ///console.log(data)
//	$(".preview_typing").html('');
	
  var toid = $("#hd_t").val();
  $("#idd_"+data.to+" .preview").html('<span> </span>' + data.msg)
    if(toid == data.to) {
      if(data.msg != '') {
        $("#chat_messenger").append(`<div class="row message-body">
            <div class="col-sm-12 bs-message-main-receiver" style="margin-bottom: 7px !important;">
              <div class="bs-receiver">
                <div class="bs-message-text">
                 ${data.msg}
                </div>
                <span class="bs-message-time pull-right">
                  Sun
                </span>
              </div>
            </div>
          </div>`);
        $("#idd_"+toid+".active .preview").html('<span> </span>' + data.msg);
        //$(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
      } else {
        $("#chat_messenger").append(`<div class="row bs-message-body">
            <div class="col-sm-12 bs-message-main-receiver" style="margin-bottom: 7px !important;">
              <div class="bs-receiver">
                <div class="bs-message-text">
                 <img class="bs-msg-images" loading="lazy" src="${data.img}">
                </div>
                <span class="bs-message-time pull-right">
                  Sun
                </span>
              </div>
            </div>
          </div>`);
        $("#idd_"+toid+".active .preview").html('<span> </span>' + data.msg);
        //$(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
      }
      

    }
});



//typing from server
socket.on("typing_from_server", function(data) {
  var toid = $("#hd_t").val();
  $("#idd_"+data.to+" .preview_typing").html('<span> </span>' + data.msg)
    if(toid == data.to) {
      $(".typing").html(data.msg);
      $("#idd_"+toid+" .preview_typing").html('<span> </span>' + data.msg);
      //$(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
    }
});

var online_status = '';

function searchUser(e){
	const main = document.querySelectorAll("#main-div")[0];
	for(var i=0; i<main.children.length; i++){
		var userVal = main.children[i].getAttribute("data-username").toLowerCase();
		var searchVal = e.value.toLowerCase();
		console.log(userVal.toLowerCase())
		console.log(searchVal.toLowerCase())
//userVal.toLowerCase() === searchVal.toLowerCase()
	  if(userVal.indexOf(searchVal) > -1){
		console.log('test1')
	  	main.children[i].style.display = 'block';
	  }else if(e.value == ''){
		console.log('test2')
		main.children[i].style.display = 'block';
	  }else{
		console.log('test3')
		main.children[i].style.display = 'none';
	  }
	}
}

function deleteChat(RuserId,index){
        //check if block
	const main = document.querySelectorAll("#main-div")[0];
	main.children[index].removeAttribute("onclick");
	main.children[index].remove();
	document.getElementById('msgs-display').style.display = 'none';
	document.getElementById('first-display').style.display = 'flex';
	//$("#msgs-display").hide();
	//$("#first-display").css('display', 'flex');
  let _token   = $('meta[name="csrf-token"]').attr('content');
   var fromUId = <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>;
   $.ajax({
    type: "POST",
    url: '/deleteChat', // This is what I have updated
    async: false,
    data:{
        chat_from_id: fromUId,
        chat_to_id: RuserId,
          _token: _token
        },
    }).done(function( msg ) {
	main.children[index].removeAttribute("onclick");
	document.getElementById('msgs-display').style.display = 'none';
	document.getElementById('first-display').style.display = 'flex';
    })
}

function loadChat(str,name,email,$status,userImg) {
// $('#chat_messenger').slideToggle();
//$('#chat_messenger').animate({scrollTop: $("#chat_messenger")[0].scrollHeight}, 'slow');
//$("#chat_messenger").stop().animate({ scrollTop: $("#chat_messenger")[0].scrollHeight}, 100);
//$("#chat_messenger").animate({ scrollTop: $("#chat_messenger").scrollHeight}, 100);
$('#chat_messenger').animate({scrollTop: $("#chat_messenger").offset().top}, 100);
  $("#customer_support_broadcast_notify").modal("hide");
  online_status = $status;
  var pic = true;
  let _token   = $('meta[name="csrf-token"]').attr('content');
  var suspended = false;
  var block = false;



    //check if block
        $.ajax({
    type: "POST",
    url: '/postinsert', // This is what I have updated
    async: false,
    data:{
        r_who_id: str,
        block: "adasd",
          _token: _token
        },
    }).done(function( msg ) {
      if(msg == "suspended"){

        $("#suspendedalert").dialog(("open"));
        suspended = true;
      }
 

    })


    if(suspended){
      return false;
    }




      //check if suspended
  $.ajax({
    type: "POST",
    url: '/postinsert', // This is what I have updated
    async: false,
    data:{
        r_who_id: str,
        checksuspended: "adasd",
          _token: _token
        },
    }).done(function( msg ) {
      if(msg == "suspended"){

        $("#suspendedalert").dialog(("open"));
        suspended = true;
      }
 

    })


    if(suspended){
      return false;
    }


  $.ajax({
    type: "POST",
    url: '/postinsert', // This is what I have updated
    async: false,
    data:{
        id_user: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>,
        id_chat_user: str,
        checkprofile: "adasd",
          _token: _token
        },
    }).done(function( msg ) {
      if(msg == "no profile pic"){
       // alert("You cannot send or receive messages until you have a valid and approved photo.");
       //$( "#dialognoprofilepic" ).dialog(("open"));
        pic =  true;
      }
      if(msg == "user no profile"){
       // alert("The user you are attempting to message does not have a valid and approved photo linked to their profile.");
       //$( "#dialogusernoprofile" ).dialog(("open"));
        pic =  true;
      }
     
    })
  //console.log(pic);

    if(!pic){
      return false;
    }


  $(".wrapper").show();
	$(".typing").html('');
	$(".preview_typing").html('');
    $(".bs-heading-name-meta").html('<a href="/userprofile/'+str+'">' + name + '</a>')
    $("#emchat").val(email)
    $("#hd_t").val(str)
    $("#hd_to_img").val(str)
    $(".lds-roller").show();
    $(".contact").removeClass("active");
    $("#idd_"+str).addClass("active");
    $("#chat_messenger").html("");
    //$("#badge_notif_messages").hide();
    $("#count-msg-"+str).hide();
    $(".toast").hide();
    $("#profile-user")[0].src = userImg;
	$("#msgs-display").show();
	$("#first-display").hide();

    $.ajax({
    type: "POST",
    url: '/chatdisplay', // This is what I have updated
    data:{
          id: str,
          _token: _token
        },
    }).done(function( msg ) {

 


      $(".lds-roller").hide();
      
      if(msg[1].length > 0) {
       // console.log(msg[1].indexOf(Number(str)));
        if( msg[1].indexOf(Number(str)) >= 0 ) {
      
          $("#chat_messenger").append('<div class="d-flex align-items-center text-right justify-content-end "><div class="pr-2"> <span class="name"></span><p class="msg_other"><i class="fa fa-exclamation-triangle" style="color: #cd201f;"></i>You cant reply to this conversation.</p></div><div></div></div>');
          $("#message-input-id").prop('disabled', true);
          return false;
        
        } else {
          $("#message-input-id").prop('disabled', false);
    
        }
      }
      

        for(var i = 0; i<msg[0].length; i++) {

     
          
            if(msg[0][i].chat_from_id == <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>) {
              



              if(msg[0][i].chat_msg == null && msg[0][i].chat_files != null) {
                $("#chat_messenger").append(`<div class="row bs-message-body">
            <div class="col-sm-12 bs-message-main-sender">
              <div class="bs-sender">
                <div class="bs-message-text">
                 <img class="bs-msg-images" loading="lazy" src="${msg[0][i].chat_files}">
				
                </div>
                <span class="bs-message-time pull-right">
                  ${moment(msg[0][i].chat_date_time).format('MMMM Do YYYY, h:mm:ss a')}
                </span>
              </div>
            </div>
          </div>`);
              } else {
                $("#chat_messenger").append('<div class="row bs-message-body"><div class="col-sm-12 bs-message-main-sender"><div class="bs-sender"><div class="bs-message-text">'+msg[0][i].chat_msg+'</div><span class="bs-message-time pull-right">'+moment(msg[0][i].chat_date_time).format('MMMM Do YYYY, h:mm:ss a')+'</span></div></div></div>');
              }



            } else {

              if(msg[0][i].chat_msg == null && msg[0][i].chat_files != null) {
                $("#chat_messenger").append(`<div class="row bs-message-body">
            <div class="col-sm-12 bs-message-main-receiver" style="margin-bottom: 7px !important;">
              <div class="bs-receiver">
                <div class="bs-message-text">
                 <img class="bs-msg-images" loading="lazy" src="${msg[0][i].chat_files}">
				
                </div>
                <span class="bs-message-time pull-right">
                  ${moment(msg[0][i].chat_date_time).format('MMMM Do YYYY, h:mm:ss a')}
                </span>
              </div>
            </div>
          </div>`);
              } else {
                if(msg[0][i].chat_from_id == 0 || msg[0][i].chat_to_id == 0) {
                  $("#chat_messenger").append(`<div class="row bs-message-body">
            <div class="col-sm-12 bs-message-main-receiver" style="margin-bottom: 7px !important;">
              <div class="bs-receiver">
                <div class="bs-message-text">
                 ${msg[0][i].chat_msg}
                </div>
                <span class="bs-message-time pull-right">
                  ${moment(msg[0][i].chat_date_time).format('MMMM Do YYYY, h:mm:ss a')}
                </span>
              </div>
            </div>
          </div>`);
                } else {
                  $("#chat_messenger").append(`<div class="row bs-message-body">
            <div class="col-sm-12 bs-message-main-receiver" style="margin-bottom: 7px !important;">
              <div class="bs-receiver">
                <div class="bs-message-text">
                 ${(msg[0][i].chat_msg_trans != null && msg[0][i].chat_msg_trans != '' ? msg[0][i].chat_msg_trans : msg[0][i].chat_msg)}
                </div>
                <span class="bs-message-time pull-right">
                  ${moment(msg[0][i].chat_date_time).format('MMMM Do YYYY, h:mm:ss a')}
                </span>
              </div>
            </div>
          </div>`);
                }
                
              }


              
                
            }
                
            $(".lds-roller").hide();
            //$(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
        }
        
        
    });
}

//--------------- send message
function newMessage() {
  $(".toast").hide();
	$(".preview_typing").html('');
	$(".typing").html('');
    let _token   = $('meta[name="csrf-token"]').attr('content');
    message = $("#comment").val();


    var abusive = false;


    too = $("#hd_t").val();
    em = $("#emchat").val()

  if(message != ''){
    //check if message abusive
    $.ajax({
    type: "POST",
    url: '/postinsert', // This is what I have updated
    async: false,
    data:{
        chat: message,
        abusive: "adasd",
          _token: _token
        },
    }).done(function( msg ) {                              



      if(msg.status == "true"){
        //$(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
        $("#chat_messenger").append(`<div class="row bs-message-body">
            <div class="col-sm-12 bs-message-main-sender">
              <div class="bs-sender">
                <div class="bs-message-text">
                  ${msg.msg}
                </div>
                <span class="bs-message-time pull-right">
                  Just Now
                </span>
              </div>
            </div>
          </div>`);
	const main = document.querySelectorAll("#main-div")[0];
	for(var i=0; i<main.children.length; i++){
	  if(main.children[i].id == too){
	  	main.children[i].parentNode.insertBefore(main.children[i], main.children[0]);
	  }
	}
        $('#comment').val(null);
        $('.contact.active .preview').html('<span>You: </span>' + message);
        abusive = true;
      }
    })

    if(abusive){
      return false;
    }

  } 

  if((online_status == "offline" && message != '')){

    $.ajax({
        type: "POST",
        url: '/postinsert', // This is what I have updated
        data:{
              online_status:online_status,
              msg: $(".message-input").val(),
              from_id: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>,
              to_id: too,
              _token: _token
            },
        }).done(function( msg ) {

  });


}


    if(too != '') {
        

        if($.trim(message) == '') {
            return false;
        }
        $.ajax({
        type: "POST",
        url: '/chatinsert', // This is what I have updated
        data:{
              msg: message,
              from_id: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>,
              to_id: too,
              _token: _token
            },
        }).done(function( msg ) {


          if(msg == "false") {
            //$(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
          $("#chat_messenger").append(`<div class="row bs-message-body">
            <div class="col-sm-12 bs-message-main-sender">
              <div class="bs-sender">
                <div class="bs-message-text">
                  You cannot send message to this user as you are both FREE standard members.
		  <a href="/membership" style="text-decoration: none;" class="btn btn-success btn-block btn-lg">Upgrade Now</a>
                </div>
                <span class="bs-message-time pull-right">
                  Just Now
                </span>
              </div>
            </div>
          </div>`);
          $('#comment').val(null);
          } else if(msg == "apprvestatus") {
            //$(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
          $("#chat_messenger").append(`<div class="row bs-message-body">
            <div class="col-sm-12 bs-message-main-sender">
              <div class="bs-sender">
                <div class="bs-message-text">
			You cannot send message to this user as your account is under review.
                </div>
                <span class="bs-message-time pull-right">
                  Just Now
                </span>
              </div>
            </div>
          </div>`);
          $('#comment').val(null);
          } else {
            socket.emit('send_msg_server', { user: em, msg: msg, to: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>, toname: '<?php echo Crypt::decryptString($_COOKIE['UserFullName']); ?>', toemail: '<?php echo Crypt::decryptString($_COOKIE['UserEmail']); ?>'}); //socket

            socket.emit('new_msg', { user: em, msg: msg, to: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>, toname: '<?php echo Crypt::decryptString($_COOKIE['UserFullName']); ?>', toemail: '<?php echo Crypt::decryptString($_COOKIE['UserEmail']); ?>'});            

            //$(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
            $("#chat_messenger").append(`<div class="row bs-message-body">
            <div class="col-sm-12 bs-message-main-sender">
              <div class="bs-sender">
                <div class="bs-message-text">
                  ${message}
                </div>
                <span class="bs-message-time pull-right">
                  Just Now
                </span>
              </div>
            </div>
          </div>`);
	const main = document.querySelectorAll("#main-div")[0];
	for(var i=0; i<main.children.length; i++){
	  if(main.children[i].id == too){
	  	main.children[i].parentNode.insertBefore(main.children[i], main.children[0]);
	  }
	}
            $('#comment').val(null);
            $('.contact.active .preview').html('<span>You: </span>' + message);
          }
          
  
        });

        

        
    }
    
}

</script>
<script>
  $(function () {

    $("#dialognoprofilepic").dialog({
        autoOpen: false,
        modal: true,
        title: "No photos",
        open: function(event, ui) {
        $(".ui-dialog-titlebar-close", ui.dialog || ui).hide();
       },
        buttons: {
            Close: function () {
                $(this).dialog('close');
            }
        }
    });

    $("#dialogusernoprofile").dialog({
        autoOpen: false,
        modal: true,
        title: "No photos",
        open: function(event, ui) {
        $(".ui-dialog-titlebar-close", ui.dialog || ui).hide();
       },
        buttons: {
            Close: function () {
                $(this).dialog('close');
            }
        }
    });

    $("#suspendedalert").dialog({
        autoOpen: false,
        modal: true,
        title: "Suspended",
        open: function(event, ui) {
        $(".ui-dialog-titlebar-close", ui.dialog || ui).hide();
       },
        buttons: {
            Close: function () {
                $(this).dialog('close');
            }
        }
    });


    let _token   = $('meta[name="csrf-token"]').attr('content');
    $("#notifbell").click(function(){

      $.ajax({
        type: "POST",
        url: '/updatenotif', // This is what I have updated
        data:{
          _token: _token
            },
        }).done(function( msg ) {
           //loading users list
          
           $('#badge_notif').hide();

  
        });

  });

  $("#report-btn").click(function(){

    if($('.report_block').is(':visible')){
      $('.report_block').hide();
    }else{
      $('.report_block').show();
    }
    

});


            $("#profile-dob").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd/mm/yy',
                yearRange: '1950:2003'   //Current Year -10 to Current Year + 10.
            });


    // INITIALIZE DATEPICKER PLUGIN
    $('.datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy"
    });


    // FOR DEMO PURPOSE
    $('#reservationDate').on('change', function () {
        var pickedDate = $('input').val();
        $('#pickedDate').html(pickedDate);
    });
});
</script>
<script type="text/javascript">
    var page = 1;
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
        //if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            //console.log('bottom')
            page++;
            
                loadMoreData(page);
            
            
             //console.log(page)
        }
    });


    function loadMoreData(page){
        
      $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                beforeSend: function()
                {
                    
                         //$('.ajax-load').show();
                    
                   
                }
            })
            .done(function(data)
            {
              //console.log(data);
                  
                
                if(data.html == ""){
                    //$('.ajax-load').html("No more records found");
                    //$('.ajax-load').hide();
                   
                    return;
                }
                //$('.ajax-load').hide();
                $("#cont").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                $('.ajax-load').hide();
                  alert('server not responding...');
            });
    }
</script>

<script>
  //file transfer 

$('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });

$('#imgupload').on('change', function(e){

  $("#upload_start_gl_file").trigger('click');


});

$('#gl_file_upload').ajaxForm({

beforeSend:function(){
  //console.log("before send")
  console.log(<?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>)
$('.progress-bar').show();
$('.progress-bar').text('0%');
$('.progress-bar').css('width', '0%');
},
uploadProgress:function(event, position, total, percentComplete){
  //console.log("upload progress...")
$('.progress-bar').text(percentComplete + '0%');
$('.progress-bar').css('width', percentComplete + '0%');
},
success:function(data)
{
  var em = $("#emchat").val();
  for(var i = 0; i < data.length; i++) {
    $("#chat_messenger").append(`<div class="row message-body">
            <div class="col-sm-12 bs-message-main-sender">
              <div class="bs-sender">
                <div class="bs-message-text">
                 <img class="bs-msg-images" loading="lazy" src="${data[i]}">
				
                </div>
                <span class="bs-message-time pull-right">
                  Just Now
                </span>
              </div>
            </div>
          </div>`);
        //$("#idd_"+toid+".active .preview").html('<span> </span>' + data.msg);
        $("#chat_messenger").stop().animate({ scrollTop: $("#chat_messenger")[0].scrollHeight}, 100);

    socket.emit('send_msg_server', { user: em, msg: '', img: data[i], to: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>, toname: '<?php echo Crypt::decryptString($_COOKIE['UserFullName']); ?>', toemail: '<?php echo Crypt::decryptString($_COOKIE['UserEmail']); ?>'});

}

  }





});


</script>
 
</body>
</html>








