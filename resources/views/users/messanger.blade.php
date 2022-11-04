<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />


    <title>Messanger</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-C4JRKD405V"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-C4JRKD405V');
</script>

  </head>
  <body onload="">
    
    <!--------------------------------------chat box ------------------------------------------->

<style>
    .wrapper {
      
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      /*background-color: #651FFF */
  }
  
  .main {
      background-color: #eee;
      width: 100%;
      height: 100%;
      /*position: fixed;
      bottom: 0;
      right: 330px;*/
      border-radius: 8px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      /* padding: 6px 0px 0px 0px */
  }
  
  .scroll {
      overflow-y: scroll;
      scroll-behavior: smooth;
      height: 80%;
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
  
  .navbar {
      border-bottom-left-radius: 8px;
      border-bottom-right-radius: 8px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      position: fixed;
    bottom: 0px;
    width: 100%;
    height: 55px;
    border-radius: 0px;
  }
  
  .form-control {
      font-size: 16px;
      font-weight: 400;
      width: 230px;
      height: 30px;
      border: none
  }
  
  .form-control: focus {
      box-shadow: none;
      overflow: hidden;
      border: none
  }
  
  .form-control:focus {
      box-shadow: none !important
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
    
    border-bottom: 1px solid #ccc;
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
  </style>


<div class="container-fluid list-users">
    <div class="row">
      <div class="col-12" style="margin: 0; padding: 0; ">
          <?php 
          $chatUsers = DB::Select("SELECT t1.*,t2.* FROM users_chat_rooms t1 LEFT JOIN users t2 ON (t1.room_to_id=t2.id) WHERE t1.room_from_id = ".Crypt::decryptString($_COOKIE['UserIds'])." ORDER BY t1.timedate DESC");
          ?>

          <div class="header-chat" style="background-color: #F15052;">

<h5 style="color: #fff;">
  <a style="color: #fff;" href="javascript:void(0)" onclick="searchlol()"><i class="fas fa-arrow-left"></i></a> 
Chats ({{count($chatUsers)}}) 
</h5>
</div>

          <ul id="chat-list" style="margin: 0; padding: 10px;">
    <?php foreach($chatUsers as $cu) { 
      //$usersLastMsg = DB::Select("SELECT chat_msg FROM users_chat WHERE (chat_from_id = '".$cu->room_from_id."' AND chat_to_id = '".$cu->room_to_id."') OR (chat_from_id = '".$cu->room_to_id."' AND chat_to_id = '".$cu->room_from_id."') ORDER BY chat_date_time DESC LIMIT 1");
          
          if($cu->prfl_approve_status == '0'){
              $propic = 'https://www.globallove.online/images/male-user-placeholder.png';
          } else{
              $propic = $cu->prfl_photo_path;
          }


          $msg= DB::Select("SELECT room_status FROM users_chat_rooms WHERE room_from_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' AND room_to_id= '".$cu->room_to_id."' AND room_status= '1'");
          
    ?>

      <li onclick="loadChat('<?php echo $cu->room_to_id; ?>', '<?php echo $cu->name; ?>', '<?php echo $cu->email; ?>')" style="cursor: pointer; margin-bottom: 10px; list-style: none;
        padding: 4px;
        font-size: 16px;
        font-weight: 700;
        color: #000;
        border-radius: 8px;"><a style="color: #000; text-decoration: none;" href="javascript:void(0)" id="idd_<?php echo $cu->room_to_id; ?>"> <span><img style="width: 48px;
        height: 48px;
        border-radius: 25px;
        border: 1px solid #444; display: inherit;" src="{{$propic}}" /></span> {{$cu->name}}</a> <span id="badge_<?php echo $cu->room_to_id; ?>" style="float: right; margin-top: 10px;" class="badge badge-success"> {{count($msg)}} </span></li>



    <?php } ?>
    </ul>

      </div>
    </div>
</div>



  
  <div class="wrapper">
      <div class="main" style="display: none;">
        <div class="header-chat" style="margin-bottom: 10px;">
          <p class="" style="margin-bottom: 0px;"> <span class="header-name">John Doe</span> <span style="float: right; margin-top: -14px;"><a style="font-size: 32px;" onclick="hideBox()" href="javascript:void(0)"><i class="fas fa-times"></i></a></span></p>
          <div class="typing" style="color:#66BB6A; font-weight: 700;"></div>
        </div>
  
        <input type="hidden" id="hd_t" value="">
        <input type="hidden" id="emchat" value="">
  
        <div style="display: none;" class="lds-roller"><div></div></div>
  
        <div class="px-2 scroll" id="chat_messenger">
  
        
            
              
  
  
              
              
  
          </div>
          <nav class="navbar bg-white navbar-expand-sm d-flex justify-content-between"> <input oninput="typing_alert(this.value)" type="text" name="text" class="form-control message-input" id="message-input-id" placeholder="Type a message...">
               <div class="icondiv d-flex justify-content-end align-content-center text-center ml-2" onclick="newMessage()"> <!--<i class="fa fa-paperclip icon1"></i>-->  <i class="far fa-paper-plane icon2"></i>   </div>
          </nav>
      </div>
  </div>



    








  <script src="https://www.globallove.online/content/assets/30603563/jquery.js"></script>
  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.1/socket.io.js" integrity="sha512-oFOCo2/3DtjrJG4N27BjSLQWoiBv171sK6a+JiWjp/7agxC2nCUP358AqzxkBUb5jX8g6CYLPdSKQTbC0weCwA==" crossorigin="anonymous"></script>

    


<!------------------------------------------------socket start------------------------------------------------------->
<script>
var socket = io('https://worldwidemedia.online', {transports: ['websocket']});
socket.emit('join', {email: '<?php echo Crypt::decryptString($_COOKIE['UserEmail']); ?>', id: '<?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>'});


//get message from server
socket.on("new_msg", function(data) {
 
	$(".typing").html('');
  $('.toast').show();
  $(".toast-body").html(data.msg);
  $('.toast').toast('show');

  $("#badge_"+data.to).html('1+');
  console.log(data)
//	$(".preview_typing").html('');
	
  var toid = $("#hd_t").val();
  $("#idd_"+data.to+" .preview").html('<span> </span>' + data.msg)
    if(toid == data.to) {
      $("#chat_messenger").append('<div class="d-flex align-items-center"><div class="text-left pr-1"></div><div class="pr-2 pl-1"> <span class="name"></span><p class="msg">'+data.msg+'</p></div></div>');
      $("#idd_"+toid+".active .preview").html('<span> </span>' + data.msg);
      $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
    }
});

//typing from server
socket.on("typing_from_server", function(data) {
  var toid = $("#hd_t").val();
  $("#idd_"+data.to+" .preview_typing").html('<span> </span>' + data.msg)
    if(toid == data.to) {
      $(".typing").html(data.msg);
      $("#idd_"+toid+" .preview_typing").html('<span> </span>' + data.msg);
      $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
    }
});


    function loadChat(str,name,email) {
      $(".main").show();
      $(".list-users").hide();

        $(".wrapper").show();
          $(".typing").html('');
          $(".preview_typing").html('');
          $(".header-name").html(name)
          $("#emchat").val(email)
          $("#hd_t").val(str)
          $(".lds-roller").show();
          $(".contact").removeClass("active");
          $("#idd_"+str).addClass("active");
          $("#chat_messenger").html("");
          let _token   = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
          type: "POST",
          url: '/chatdisplay', // This is what I have updated
          data:{
                id: str,
                _token: _token
              },
          }).done(function( msg ) {
            console.log(msg)
            $(".lds-roller").hide();
            
            if(msg[1].length > 0) {
              if( msg[1].indexOf(Number(str)) > 0 ) {
                
                $("#msgtxt").hide();
                $("#send").hide();
                $("#attach").hide();  
                $("#block_user").show().html("<p style='text-align: center;margin-bottom: 10px;font-weight: 700; color: #444;'>You can't reply to this conversation.</p>")
              } else {
                
                $("#msgtxt").show();
                $("#send").show();
                $("#attach").show();  
                $("#block_user").hide();
              }
            }
            
      
              for(var i = 0; i<=msg[0].length; i++) {
                
                  if(msg[0][i].chat_from_id == <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>) {
                    
                    $("#chat_messenger").append('<div class="d-flex align-items-center text-right justify-content-end "><div class="pr-2"> <span class="name"></span><p class="msg_other">'+msg[0][i].chat_msg+'</p></div><div></div></div>');
      
                  } else {
      
                    $("#chat_messenger").append('<div class="d-flex align-items-center"><div class="text-left pr-1"></div><div class="pr-2 pl-1"> <span class="name"></span><p class="msg">'+msg[0][i].chat_msg+'</p></div></div>');
                    
                      
                  }
                      
                  $(".lds-roller").hide();
                  $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
              }
              
              
          });
      }


      //--------------- send message
function newMessage() {
	$(".preview_typing").html('');
	$(".typing").html('');
    let _token   = $('meta[name="csrf-token"]').attr('content');
    message = $(".message-input").val();


    too = $("#hd_t").val();
    em = $("#emchat").val()
    if(too != '') {
        socket.emit('send_msg_server', { user: em, msg: message, to: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>}); //socket

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
           //loading users list
          
          
  
        });

        $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
        //$('<li class="replies"><p>' + message + '</p></li>').appendTo($('.messages ul'));
        $("#chat_messenger").append('<div class="d-flex align-items-center text-right justify-content-end "><div class="pr-2"> <span class="name"></span><p class="msg_other">'+message+'</p></div><div></div></div>');
        $('.message-input').val(null);
        $('.contact.active .preview').html('<span>You: </span>' + message);
        //$(".messages").animate({ scrollTop: $(document).height() }, "slow");
        
    }
    
}


$('#message-input-id').focus(function() { 
  $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
});


function typing_alert(str) {
	too = $("#hd_t").val();
    em = $("#emchat").val()
	if(str.length > 0) {
		socket.emit('typing', { user: em, msg: 'typing...', to: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>}); //socket
	} else {
		socket.emit('typing', { user: em, msg: '', to: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>}); //socket
	}
	
}

var input = document.getElementById("message-input-id");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   newMessage();
   //document.getElementById("sendChat").click();
  }
});



//-------------------------------------------------------------------

function hideBox() {
  $(".list-users").show();
  $(".main").hide();
}


function searchlol() {
 window.ReactNativeWebView.postMessage('search');

}


  </script>






  </body>
</html>