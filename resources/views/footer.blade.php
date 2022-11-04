<div class="container-fluid text-center mt-4" style="position: sticky;
left: 0;
bottom: 0;background-color: #0d6efd !important;padding: 10px;">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
            <a href="https://thedailyplanet.app/" data-toggle="tooltip" data-placement="top" title="The Daily Planet" target="_blank"><img style="width: 50px;height: 40px;border-radius: 100%;" class="img-fluid" src="https://todosmarter.com/images/dailyplanet.png"></a>

            <a href="https://globallove.online/" style="margin-left: 20px;" data-toggle="tooltip" data-placement="top" title="Date Free (Formally GlobalLove)" target="_blank"><img style="width: 45px;height: 45px;border-radius: 100%;" class="img-fluid" src="https://todosmarter.com/images/datefreelogo1.png"></a>

            <a href="/" style="margin-left: 20px;" data-toggle="tooltip" data-placement="top" title="To Do Smarter (Project Management)"><img style="width: 45px;height: 45px;border-radius: 100%;" class="img-fluid" src="http://todosmarter.com/images/todosmarterlogo.jpg" alt="ToDoSmarter"></a>

            <a href="https://bescrow.world/" style="margin-left: 20px;" data-toggle="tooltip" data-placement="top" title="Buy & Sell (Only available in Australia & Phillipines)" target="_blank"><img style="width: 45px;height: 45px;border-radius: 100%;" class="img-fluid" src="http://todosmarter.com/images/bescrow.png"></a>

            <a href="https://globallove.online/group-chat-terms" style="margin-left: 20px;" data-toggle="tooltip" data-placement="top" title="Online group chat for over 18 years" target="_blank"><img style="width: 45px;height: 45px;border-radius: 100%;" class="img-fluid" src="http://todosmarter.com/images/groupchat.png"></a>

              <a style="text-decoration: none; color: #fff; margin-left: 20px;font-weight:700;" href="/blog">Blogs</a>
              <a style="text-decoration: none; color: #fff; margin-left: 20px;font-weight:700;" href="/terms">Terms & Conditions</a>
              <a style="text-decoration: none; color: #fff; margin-left: 20px;font-weight:700;" href="/privacy">Privacy</a>
              <a style="text-decoration: none; color: #fff; margin-left: 20px;font-weight:700;" href="/cookies">Cookies</a>
              <a style="text-decoration: none; color: #fff; margin-left: 20px;font-weight:700;" href="/contactus">Contact Us</a>

              <a href="/suggestion" style="margin-left: 20px;" data-toggle="tooltip" data-placement="top" title="Suggestion Box" target="_blank"><img style="width: 45px;height: 45px;border-radius: 100%;" class="img-fluid" src="https://globallove.online/images/suggestion-box.png"></a>
          </div>

          
      </div>
  </div>
  </div>

<?php
$today = date('Y-m-d H:i:s');
$getProfileApprove = DB::Select("select prfl_approve_status,prfl_photo_path from users where id = '".Crypt::decryptString($_COOKIE['UserIds'])."'");
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


  <div id="dialognoprofilepic" title="Alert">
  <!-- <p>GlobalLove prides itself on making this online meeting experience safer, and for that reason, we believe that every user on this site deserves to see who is contacting them, so we are respectively requesting you upload a picture  <a href="{{ url('photos') }}" style="color: #dc6b6d;
    font-weight: bold;">CLICK HERE </a>, so you can continue to message everybody in GlobalLove.</p>

</div>

<div id="dialogusernoprofile" title="Alert">
  <p>The user you are attempting to message does not have a valid and approved photo linked to their profile.</p>
</div>
<div id="suspendedalert" title="Alert">
  <p>Hi there, due to a members complaint, this account has been temporarily suspended, this maybe a miss understanding, so please contact customer service online so we can get this all fixed and get you back online again.</p> -->
</div>



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

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
  </script>


<div class="toast_notify" style="position: fixed;bottom: 160px;right: 10px; width: 96%;"></div>

<script>

</script>

<!--------------------------------------chat box ------------------------------------------->

<style>
  .wrapper {
    display: none;
}
.ui-dialog-titlebar-close {
    visibility: hidden;
}
.main {
    background-color: #eee;
    width: 320px;
    position: fixed;
    bottom: 130px;
    right: 42px;
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

<div class="wrapper">

    <div class="main">
      <div id="fist_chat" style="padding: 10px;
    background: #5eba00;
    color: #fff;
    border-radius: 4px; display: none;">
        Is this the first time you have chatted to this person?&nbsp;Don't know what to say?<br><a href="#" data-toggle="modal" data-target="#pickup_line" style="text-decoration: none;color:#2d3436;font-weight: 700;"> Click here</a>&nbsp;&nbsp;for some ideas.
      </div>



      <div class="header-chat" style="margin-bottom: 10px;">
        <p class="" style="margin-bottom: 0px;">
        <span class="header-name"></span>



        <span style="float: right;"><a onclick="hideBox()" href="javascript:void(0)"><i class="fas fa-times"></i></a></span>
        <a onclick="startVideo();" href="javascript:void(0)"><span style="float: right;"><i style="color: #4B9400; margin-right: 20px;" class="fas fa-video"></i></span></a>

        
        <span style="float: right; margin-right: 15px;">
        <a id='add_mod' onclick="add_moderator()" href="#" data-toggle="tooltip" data-placement="top" title="Click here for start moderator"><i style="font-size: 17px;color: #d63031;" class="fas fa-shield-alt"></i></a>
        <a style="display:none;" id='add_mod_circle' data-toggle="tooltip" data-placement="top" onclick="add_moderator_stop()" href="#" title="Click here for close moderator"><i class="fas fa-circle modcircle" style="color: green;"></i></a>
      </span>


        </p>
        <div class="typing" style="color:#66BB6A; font-weight: 700;"></div>
      </div>

      <input type="hidden" id="hd_t" value="">
      <input type="hidden" id="emchat" value="">

      <div style="display: none;" class="lds-roller"><div></div></div>

      <div class="px-2 scroll" id="chat_messenger">


        </div>

        <div class="progress">
        <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%; display: none;">
          0%
        </div>
        </div>
        <div id="success"></div>
        <div id="preview_gl"></div>

        <nav class="navbar bg-white navbar-expand-sm d-flex justify-content-between">


          <form method="post" id="gl_file_upload" action="/sendfile" enctype="multipart/form-data">
          @csrf
          <input type="file" name="file[]" multiple id="imgupload" style="display:none"/>
          <input type="hidden" name="to" id="hd_to_img">

          <div id="OpenImgUpload" class="icondiv d-flex justify-content-start align-content-center text-center ml-2"> <!--<i class="fa fa-paperclip icon1"></i>-->  <i class="fas fa-plus-circle" style="
          color: #512DA8 !important;
          font-size: 18px !important;
          position: relative;
          left: -12px;
          padding: 0px;
          cursor: pointer;
          "></i>
            </div>

          <input type="submit" id="upload_start_gl_file" name="upload" value="Upload" class="btn btn-success" style="display: none;" />

        </form>

        <div id="message-div-id"></div>
        <input oninput="typing_alert(this.value)" type="text" name="text" style="width: 80% !important;" class="form-control message-input" id="message-input-id" placeholder="Type a message...">

          <div class="icondiv d-flex justify-content-end align-content-center text-center ml-2" onclick="newMessage()"> <!--<i class="fa fa-paperclip icon1"></i>-->  <i class="far fa-paper-plane icon2"></i>
          </div>

        </nav>

        <!-- <div class="caution-msg"><i class="fa fa-exclamation-triangle" style="color: #cd201f;"></i> This chat is being monitored by GlobalLove, any bad language, and soliciting of any kind will result in temporary suspension</div> -->
    </div>
</div>


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

  function chatintervaltimer(){

    $.ajax({
        type: "get",
        url: '/chatinterval/'+ <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>, 
        }).done(function( msg ) {
          console.log(msg.length)
          if(msg.length > 0) {
            $("#message-input-id").hide();
            $("#message-div-id").html('<p> Wait for '+msg[0]+' min ' +msg[1]+' sec </p> <a href="/membership">Upgrade Now</a> to send unlimimited messages');
            
          } else {
            $("#message-input-id").show();
            $("#message-div-id").html();
          }
          
        });

  }

      setInterval(chatintervaltimer, 1000);
  
</script>

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






<!-----------------------------------------chat end ---------------------------------------->
<script>
var input = document.getElementById("message-input-id");
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
var socket = io('https://cschatonly.com/', {transports: ['websocket']});
socket.emit('join', {email: '<?php echo Crypt::decryptString($_COOKIE['UserEmail']); ?>', id: '<?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>'});


// signup_notify
socket.on("signup-notify-server", function(data) {
  
  $('.toast_notify').append(`<div style="cursor: pointer; opacity: 1 !important; background: #F15052;color: #fff; width: 100%;" class="toast" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header" style="color:#000;"><i class="far fa-comment"></i> &nbsp; <strong class="mr-auto">New Signup</strong><small class="text-muted"> </small><button style="background: transparent;border: none;" type="button" class="ml-2 mb-1" onclick="hidechatbox()"><i class="fas fa-times"></i></button></div><div class="toast-body">${data.data.data} has now signed up.</div></div>`);
});



// from video call request
socket.on("new_msg_call_req", function(data) {
  $("#calling_from").html(data.toname);
  $("#room").val(data.room)
  $("#videocallDiolog").modal("show");
});




//get message from server
socket.on("new_msg", function(data) {
	$(".typing").html('');
  // $('.toast').show();
  // $(".toast-body").html(data.msg);
  // $('.toast').toast('show');

  if(data.msg == 'Moderator has been closed.') {
    $("#add_mod").show();
    $("#add_mod_circle").hide();    
  }

  if(data.msg == '' && data.img == 'https://todosmarter.com//images/to_do_smarter_img/6231fcc61090d.png') {
    $("#add_mod").hide();
    $("#add_mod_circle").show(); 
  }

  if(data.msg !=''){
    $('.toast_notify').append(`<div onclick="loadChat('${data.to}','${data.toname}','${data.toemail}','')" style="cursor: pointer; opacity: 1 !important; background: #F15052;color: #fff; width: 100%;" class="toast" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header" style="color:#000;"><i class="far fa-comment"></i> &nbsp; <strong class="mr-auto">${data.toname}</strong><small class="text-muted"> </small><button style="background: transparent;border: none;" type="button" class="ml-2 mb-1" onclick="hidechatbox()"><i class="fas fa-times"></i></button></div><div class="toast-body">${data.msg}</div></div>`);
  } else {
    $('.toast_notify').append(`<div onclick="loadChat('${data.to}','${data.toname}','${data.toemail}','')" style="cursor: pointer; opacity: 1 !important; background: #F15052;color: #fff; width: 100%;" class="toast" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header" style="color:#000;"><i class="far fa-comment"></i> &nbsp; <strong class="mr-auto">${data.toname}</strong><small class="text-muted"> </small><button style="background: transparent;border: none;" type="button" class="ml-2 mb-1" onclick="hidechatbox()"><i class="fas fa-times"></i></button></div><div class="toast-body"><i class="fas fa-camera-retro"></i> Photo</div></div>`);
  }





  $("#badge_"+data.to).text('1+');
  $("#badge_notif_messages").text('1').show();
  ///console.log(data)
//	$(".preview_typing").html('');

  var toid = $("#hd_t").val();
  $("#idd_"+data.to+" .preview").html('<span> </span>' + data.msg)
    if(toid == data.to) {
      if(data.msg != '') {
        $("#chat_messenger").append('<div class="d-flex align-items-center"><div class="text-left pr-1"></div><div class="pr-2 pl-1"> <span class="name"></span><p class="msg">'+data.msg+'</p></div></div>');
        $("#idd_"+toid+".active .preview").html('<span> </span>' + data.msg);
        $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
      } else {
        $("#chat_messenger").append('<div class="d-flex align-items-center"><div class="text-left pr-1"></div><div class="pr-2 pl-1"> <span class="name"></span><p class="msg"><img loading="lazy" src="'+data.img+'"></p></div></div>');
        $("#idd_"+toid+".active .preview").html('<span> </span>' + data.msg);
        $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
      }


    }


    chat_box_top_ajax(); // load top chat bar ajax
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

var online_status = '';

function loadChat(str,name,email,$status) {
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
    $(".header-name").html('<a href="/userprofile/'+str+'">' + name + '</a>')
    $("#emchat").val(email)
    $("#hd_t").val(str)
    $("#hd_to_img").val(str)
    $(".lds-roller").show();
    $(".contact").removeClass("active");
    $("#idd_"+str).addClass("active");
    $("#chat_messenger").html("");
    $("#badge_notif_messages").hide();
    $(".toast").hide();


    $.ajax({
    type: "POST",
    url: '/chatdisplay', // This is what I have updated
    data:{
          id: str,
          _token: _token
        },
    }).done(function( msg ) {

      if(msg[2].length > 0){
        $("#add_mod").hide();
      $("#add_mod_circle").show();
      } else {
        $("#add_mod_circle").hide();
        $("#add_mod").show();
      }
      


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

      if(msg[0].length == 0) {
        $("#fist_chat").show();
      } else {
        $("#fist_chat").hide();
      }

        for(var i = 0; i<=msg[0].length; i++) {



            if(msg[0][i].chat_from_id == <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>) {



              if(msg[0][i].chat_msg == null && msg[0][i].chat_files != null) {
                $("#chat_messenger").append('<div class="d-flex align-items-center text-right justify-content-end "><div class="pr-2"> <span class="name"></span><a  data-toggle="tooltip" data-placement="top" title="" class="chat_d"  href="javascript:void(0)" data-original-title="'+moment(msg[0][i].chat_date_time).format('MMMM Do YYYY, h:mm:ss a')+'"><p class="msg_other"><img loading="lazy" src="'+msg[0][i].chat_files+'"></p></a></div><div></div></div>');
              } else {
                $("#chat_messenger").append('<div class="d-flex align-items-center text-right justify-content-end "><div class="pr-2"> <span class="name"></span><a  data-toggle="tooltip" data-placement="top" title="" class="chat_d"  href="javascript:void(0)" data-original-title="'+moment(msg[0][i].chat_date_time).format('MMMM Do YYYY, h:mm:ss a')+'"><p class="msg_other">'+msg[0][i].chat_msg+'</p></a></div><div></div></div>');
              }



            } else {

              if(msg[0][i].chat_msg == null && msg[0][i].chat_files != null) {
                $("#chat_messenger").append('<div class="d-flex align-items-center"><div class="text-left pr-1"></div><div class="pr-2 pl-1"> <span class="name"></span><a  data-toggle="tooltip" data-placement="top" title="" class="chat_d"  href="javascript:void(0)" data-original-title="'+moment(msg[0][i].chat_date_time).format('MMMM Do YYYY, h:mm:ss a')+'"><p class="msg"><img loading="lazy" src="'+msg[0][i].chat_files+'"></p></a></div></div>');
              } else {
                if(msg[0][i].chat_from_id == 0 || msg[0][i].chat_to_id == 0) {
                  $("#chat_messenger").append('<div class="d-flex align-items-center"><div class="text-left pr-1"></div><div class="pr-2 pl-1"> <span class="name"></span><a  data-toggle="tooltip" data-placement="top" title="" class="chat_d"  href="javascript:void(0)" data-original-title="'+moment(msg[0][i].chat_date_time).format('MMMM Do YYYY, h:mm:ss a')+'"><p class="msg">'+msg[0][i].chat_msg+'</p></a></div></div>');
                } else {
                  if(msg[0][i].chat_msg_trans != null && msg[0][i].chat_msg_trans != '') {
                    $trans = msg[0][i].chat_msg_trans;
                  } else {
                    $trans = msg[0][i].chat_msg;
                  }
                  $("#chat_messenger").append('<div class="d-flex align-items-center"><div class="text-left pr-1"></div><div class="pr-2 pl-1"> <span class="name"></span><a  data-toggle="tooltip" data-placement="top" title="" class="chat_d"  href="javascript:void(0)" data-original-title="'+moment(msg[0][i].chat_date_time).format('MMMM Do YYYY, h:mm:ss a')+'"><p class="msg translate">'+$trans+'</p></a></div></div>');
                }

              }




            }

            $(".lds-roller").hide();
            $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
        }


    });
}




//--------------- send message
function newMessage() {
  $(".toast").hide();
	$(".preview_typing").html('');
	$(".typing").html('');
    let _token   = $('meta[name="csrf-token"]').attr('content');
    message = $(".message-input").val();


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
        $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
        $("#chat_messenger").append('<div class="d-flex align-items-center text-right justify-content-end "><div class="pr-2"> <span class="name"></span><p class="msg_other"><i class="fa fa-exclamation-triangle" style="color: #cd201f;"></i> '+msg.msg+'</p></div><div></div></div>');
        $('.message-input').val(null);
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

            chat_box_top_ajax(); // call chat top box ajax

          if(msg == "false") {
            $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
          $("#chat_messenger").append('<div class="d-flex align-items-center text-right justify-content-end "><div class="pr-2"> <span class="name"></span><p class="msg_other">You cannot send message to this user as you are both FREE standard members.</p> <a href="/membership" style="text-decoration: none;" class="btn btn-success btn-block btn-lg">Upgrade Now</a></div><div></div></div>');
          $('.message-input').val(null);
          } else if(msg == "apprvestatus") {
            $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
          $("#chat_messenger").append('<div class="d-flex align-items-center text-right justify-content-end "><div class="pr-2"> <span class="name"></span><p style="color:#E9343F;" class="msg_other">You cannot send message to this user as your account is under review.</p></div><div></div></div>');
          $('.message-input').val(null);
          } else {
            socket.emit('send_msg_server', { user: em, msg: msg, to: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>, toname: '<?php echo Crypt::decryptString($_COOKIE['UserFullName']); ?>', toemail: '<?php echo Crypt::decryptString($_COOKIE['UserEmail']); ?>'}); //socket

            $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);
            $("#chat_messenger").append('<div class="d-flex align-items-center text-right justify-content-end "><div class="pr-2"> <span class="name"></span><p class="msg_other">'+message+'</p></div><div></div></div>');
            $('.message-input').val(null);
            $('.contact.active .preview').html('<span>You: </span>' + message);
          }


        });




    }

}



//--------------- report
function report(rptid,id) {
  let _token   = $('meta[name="csrf-token"]').attr('content');
  if(rptid != 9){

    var r = confirm("Are you sure you want to report this user?");
      if (r == true) {




            $.ajax({
                type: "POST",
                url: '/postinsert', // This is what I have updated
                data:{
                      report:"asdasdasd",
                      rptid:rptid,
                      user:id,
                      _token: _token
                    },
                }).done(function( msg ) {

                  alert("Thank you for reporting! Our team will review your concern.");
                  $('.report_block').hide();
          });

      } else {
        $('.report_block').hide();
      }

    }else{

      $('.report_block').hide();
    }




}

function typing_alert(str) {
	too = $("#hd_t").val();
    em = $("#emchat").val()
	if(str.length > 0) {
		socket.emit('typing', { user: em, msg: 'typing...', to: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>}); //socket
	} else {
		socket.emit('typing', { user: em, msg: '', to: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>}); //socket
	}

}

function hideBox() {
  $(".wrapper").hide();
}

function hidechatbox() {
  $(".toast").hide();
}

</script>




<!------------------------------------------------------ chat script end ----------------------------------------------------->




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
                dateFormat: 'yy-mm-dd'
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


<script>
$(function () {
  $('body').tooltip({selector: '[data-toggle="tooltip"]'});
})


//minimize and maximize chat list box
function minimize_chat_box() {
  $("#chat-list").slideToggle("slow");
}



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

$('#imgupload').on('change', function(){
  $("#upload_start_gl_file").trigger('click');


});



$('#gl_file_upload').ajaxForm({

beforeSend:function(){
  //console.log("before send")

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

  //console.log(data)
  // send image through socket
  var em = $("#emchat").val();
  for(var i = 0; i < data.length; i++) {
    socket.emit('send_msg_server', { user: em, msg: '', img: data[i], to: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>, toname: '<?php echo Crypt::decryptString($_COOKIE['UserFullName']); ?>', toemail: '<?php echo Crypt::decryptString($_COOKIE['UserEmail']); ?>'});

    $("#chat_messenger").append('<div class="d-flex align-items-center"><div class="text-left pr-1"></div><div class="pr-2 pl-1"> <span class="name"></span><p class="msg"><img loading="lazy" src="'+data[i]+'"></p></div></div>');
        //$("#idd_"+toid+".active .preview").html('<span> </span>' + data.msg);
        $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);

  }




$('.progress-bar').text('Uploaded');
$('.progress-bar').css('width', '100%');
$('.progress-bar').hide();

}



});

</script>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



<style type="text/css">
  #chat_messenger img {
    max-width: 200px;
    max-height: 100%;
  }
</style>



<!------- modal for customer support broadcast notification -------------->

<?php
$cus_support= DB::Select("SELECT * FROM users_chat_rooms WHERE room_from_id= '".Crypt::decryptString($_COOKIE['UserIds'])."' AND room_to_id= '0' AND room_status='1' AND room_key='gl'");
if(count($cus_support) > 0) {

  echo '<script type="text/javascript">';
  echo '$(document).ready(function(){ $("#customer_support_broadcast_notify").modal("show"); });';
  echo '</script>';

}
?>

<style>
.close:before {
  content: none !important;
}
</style>

<div class="modal fade" id="customer_support_broadcast_notify" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Customer Support</h5>
        <button style="
          background-color: #eee !important;
        " type="button" class="close" data-dismiss="modal" aria-label="Close">
          <!-- <span aria-hidden="true">&times;</span> -->
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="modal-body" style="
        font-size: 18px;
      ">
        You have a new message from the Customer Support Team.
      </div>
      <div class="modal-footer">
        <a href="customersupport/#/cs-user/{{ Crypt::decryptString($_COOKIE['UserIds']) }}/{{ Crypt::decryptString($_COOKIE['UserEmail']) }}/gl" class="btn btn-primary btn-lg btn-block">View message</a>
      </div>
    </div>
  </div>
</div>

// <button onclick="loadChat('0', 'Customer support', 'customer@support.globallove', 'offline')" type="button" class="btn btn-primary btn-lg btn-block">View message</button>


<!------------------- Video call ------------------------>

<script>
    function startVideo() {
      var em = $("#emchat").val();
      $("#videocallDiolog").modal("hide");
     window.open("/videocall?q=" + em, "_blank", "toolbar=no,scrollbars=no,resizable=no,top=0,left=0,width=600,height=600,fullscreen=yes");

    }

    function startVideoAccept() {
      $("#videocallDiolog").modal("hide");
      var room = $("#room").val();
     window.open("/videocall?room="+room, "_blank", "toolbar=no,scrollbars=no,resizable=no,top=0,left=0,width=600,height=600,fullscreen=yes");
    }

    function denyCall() {
      $("#videocallDiolog").modal("hide");

      //call socket for deny
    }

    function pause() {
        var x = document.getElementById("myAudio");
        x.pause();
    }
</script>

<script>
    function chat_box_top_ajax() {
        $.get("{{ route('chat.top.bar.ajax') }}", function(data, status){
            
            $("#chat-list-header").html(data.html);
        });
    }

    chat_box_top_ajax(); // Auto load
</script>


<div class="modal fade" id="videocallDiolog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content" style="background-color: #f1f2f6; color: #000;">
      <div class="modal-header ">
      <audio loop id="myAudio">
        <source src="{{ url('ring.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
      </audio>
        <button onclick="pause();" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span style="color: #000;" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <h2>Calling from <span id="calling_from"></span></h2>
        <input type="hidden" id="room" value="">
        <h4><a class="btn btn-success" onclick="startVideoAccept();" href="#">Accept</a> &nbsp; <a onclick="denyCall();" class="btn btn-danger" href="#">Deny</a></h4>
      </div>

    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="pickup_line" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="ullas">
      <h1 class="text-danger">Pickup Lines For Chat: </h1>
            <hr>
            <p id="text"><i class="fas fa-comment-dots mr-3"></i> <a href="javascript:void(0)" onclick="copyToClipboard('#text')" style="text-decoration: none;" title="Click to copy">Which song would you choose as the soundtrack for your life? </a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span> </p>

            <p id="text2"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text2')" style="text-decoration: none;" title="Click to copy"> Tell me two truths and a lie about you and I’ll try to guess which one’s fake.</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span> </p>

            <p id="text3"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text3')" style="text-decoration: none;" title="Click to copy"> What’s your most controversial opinion?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text4"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text4')" style="text-decoration: none;" title="Click to copy"> Tell me about your perfect Sunday…</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text5"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text5')" style="text-decoration: none;" title="Click to copy"> I want to hear your finest dad joke! Make me laugh/cringe, the cornier the better.</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text6"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text6')" style="text-decoration: none;" title="Click to copy"> You look just like [celebrity they look like]. Do you hear that all the time?</a>  <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text7"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text7')" style="text-decoration: none;" title="Click to copy"> Choose our date: A movie, boozy night out, or hiking?</a>  <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text8"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text8')" style="text-decoration: none;" title="Click to copy"> Help me choose what to make for dinner? I’ll buy you breakfast after our date in return…</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text9"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text9')" style="text-decoration: none;" title="Click to copy"> [Along with a dog/cat gif] Cat or dog person? Your response is required to determine whether we’re a match.</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text10"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text10')" style="text-decoration: none;" title="Click to copy"> Before we get chatting, I want you to know I’ll never send you unsolicited dick pics. Duck pics, though, I can’t promise anything [send picture of a duck].</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text11"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text11')" style="text-decoration: none;" title="Click to copy"> You’ve travelled loads! Where’s the best place you’ve been?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text12"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text12')" style="text-decoration: none;" title="Click to copy"> Using only emojis, tell me your life story.</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text13"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text13')" style="text-decoration: none;" title="Click to copy"> If I made you dinner, what’s a meal that’d make you fall in love with me?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text14"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text14')" style="text-decoration: none;" title="Click to copy"> How long have you lived in [city]? What’s your favourite restaurant/bar/day out here?</a>  <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text15"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text15')" style="text-decoration: none;" title="Click to copy"> [If they live in the same city as you] Hey, you’re not far from me! Have you ever tried restaurant/bar/day out?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text16"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text16')" style="text-decoration: none;" title="Click to copy"> Favourite comedian, actor, and singer? Go!</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text17"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text17')" style="text-decoration: none;" title="Click to copy"> You had me at [something in their profile that made them stand out]…</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text18"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text18')" style="text-decoration: none;" title="Click to copy"> What’s the worst opening line you’ve ever received, or is it this message?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text19"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text19')" style="text-decoration: none;" title="Click to copy"> You just won a million pounds, what’s the first thing you do?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text20"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text20')" style="text-decoration: none;" title="Click to copy"> What will we tell our grandchildren when they ask how we met?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text21"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text21')" style="text-decoration: none;" title="Click to copy"> [If they have a pet in their pictures] You have the most beautiful fur and whiskers I’ve ever seen, and your human is pretty cute too.</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text22"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text22')" style="text-decoration: none;" title="Click to copy"> What made you swipe right on me?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text23"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text23')" style="text-decoration: none;" title="Click to copy"> I’m a [star sign], does that mean we’re compatible?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text24"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text24')" style="text-decoration: none;" title="Click to copy"> I bet you a tenner we’d have a great date.</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text25"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text25')" style="text-decoration: none;" title="Click to copy"> I had a great opening line ready, but you’re so hot I’ve forgotten it.</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text26"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text26')" style="text-decoration: none;" title="Click to copy"> I’m using my last 2% battery to send you this message. If that’s not commitment, I don’t know what is.</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text27"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text27')" style="text-decoration: none;" title="Click to copy"> You’re a [film/movie/show on their profile] fan right? What do you think of the newest release?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text28"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text28')" style="text-decoration: none;" title="Click to copy"> What are your thoughts on pineapple on pizza?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text29"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text29')" style="text-decoration: none;" title="Click to copy"> I saw you also like [hobby] and couldn’t not swipe right! How did you get into it?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text30"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text30')" style="text-decoration: none;" title="Click to copy"> Who would you rather be stuck in a lift with? [List two celebs]</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text31"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text31')" style="text-decoration: none;" title="Click to copy"> I bet you a drink your personality is even better than your looks.</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text32"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text32')" style="text-decoration: none;" title="Click to copy"> The 10th picture back in your camera roll describes our relationship. What’s the prognosis?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text33"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text33')" style="text-decoration: none;" title="Click to copy"> What’s your usual McDonald’s/Greggs/KFC order?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text34"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text34')" style="text-decoration: none;" title="Click to copy">  I’m vaxxed, waxed, and ready for a date. Where are we going?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text35"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text35')" style="text-decoration: none;" title="Click to copy"> Please tell me you’re not the type of person who claps when the plane lands…</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text36"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text36')" style="text-decoration: none;" title="Click to copy"> Were Ross and Rachel really on a break?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text37"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text37')" style="text-decoration: none;" title="Click to copy"> Do you like bad boys/girls? Because I’m really bad at this.</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text38"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text38')" style="text-decoration: none;" title="Click to copy"> Your [a quality about them] really caught my eye. You’re stunning!</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text39"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text39')" style="text-decoration: none;" title="Click to copy">  I’d tell you you’re gorgeous, but I’m sure you get that all the time. How about you describe yourself with a gif instead?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>

            <p id="text40"><i class="fas fa-comment-dots mr-3"></i><a href="javascript:void(0)" onclick="copyToClipboard('#text40')" style="text-decoration: none;" title="Click to copy"> There’s not much on your bio but I’d love to get to know you. Quickfire question round?</a> <span class="text_span" style="color: #6c5ce7;padding: 4px;border-radius: 8px;margin-left: 30PX;"></span></p>
            
            <hr>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


<script>
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("#ullas").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
  $(element+" .text_span").html("Copied! Go back to chat!");
   const myTimeout = setTimeout(myStopFunction, 1200);

}






function myStopFunction() {
    $(".text_span").html("");
    $("#pickup_line").modal("hide");
}
</script>


<script>
function add_moderator() {
  var to = $("#hd_t").val();
  var em = $("#emchat").val();

  var url = "https://todosmarter.com//images/to_do_smarter_img/6231fcc61090d.png";

  var msg = "Moderator has been requested, and your chat will be recorded for safety issues. once you close the moderator by clicking on the green circle, a transcript of the chat will be sent to both parties.";

  $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);

  $("#chat_messenger").append('<div class="d-flex align-items-center text-right justify-content-end "><div class="pr-2"> <span class="name"></span><p class="msg_other"><img src="'+url+'"></p><p>'+msg+'</p></div><div></div></div>');

  $("#add_mod").hide();
      $("#add_mod_circle").show();

      socket.emit('send_msg_server', { user: em, msg: '', img: url, to: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>, toname: '<?php echo Crypt::decryptString($_COOKIE['UserFullName']); ?>', toemail: '<?php echo Crypt::decryptString($_COOKIE['UserEmail']); ?>'});

      socket.emit('send_msg_server', { user: em, msg: msg, to: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>, toname: '<?php echo Crypt::decryptString($_COOKIE['UserFullName']); ?>', toemail: '<?php echo Crypt::decryptString($_COOKIE['UserEmail']); ?>'});


  $.post("/moderatorpost",
  {
    url: url,
    msg:msg,
    to:to,
    _token: $('meta[name="csrf-token"]').attr('content')
  },
  function(data, status){
    //alert("Data: " + data + "\nStatus: " + status);
  });
  
}



function add_moderator_stop() {

  var to = $("#hd_t").val();
  var em = $("#emchat").val();

  var url = "https://todosmarter.com//images/to_do_smarter_img/6231fcc61090d.png";

  var msg = "Moderator has been requested, and your chat will be recorded for safety issues. once you close the moderator by clicking on the green circle, a transcript of the chat will be sent to both parties.";

  $(".scroll").stop().animate({ scrollTop: $(".scroll")[0].scrollHeight}, 100);

  

      

      

  $.post("/stopmoderatorpost",
  {
    url: url,
    msg:msg,
    to:to,
    _token: $('meta[name="csrf-token"]').attr('content')
  },
  function(data, status){
    if(data.success == "no"){
      alert("You don't have access to stop the moderator");
    }else{
      $("#add_mod").show();
      $("#add_mod_circle").hide();


      socket.emit('send_msg_server', { user: em, msg: "Moderator has been closed.", to: <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>, toname: '<?php echo Crypt::decryptString($_COOKIE['UserFullName']); ?>', toemail: '<?php echo Crypt::decryptString($_COOKIE['UserEmail']); ?>'});
    }
    
  });

}
</script>

<script>

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    alert ("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {

  $.ajax({
        type: "get",
        url: '/locationinsert/'+ <?php echo Crypt::decryptString($_COOKIE['UserIds']); ?> + '/'+ position.coords.latitude + '/' + position.coords.longitude, 
        }).done(function( msg ) {
          
          
          
        });

  // alert (position.coords.latitude + ' ' + position.coords.longitude)
  // x.innerHTML = "Latitude: " + position.coords.latitude +
  // "<br>Longitude: " + position.coords.longitude;
}
</script>


@if(Request::is('group-chat') == true)
<script>
  socket.emit('group_online_offline_status', {id: '<?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>', gname: 'main', status: 'online', name: '<?php echo Crypt::decryptString($_COOKIE['UserFullName']); ?>'});
</script>
@elseif(Request::is('group-chat/gf') == true)
<script>
  socket.emit('group_online_offline_status', {id: '<?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>', gname: 'Lesbian', status: 'online', name: '<?php echo Crypt::decryptString($_COOKIE['UserFullName']); ?>'});
</script>
@elseif(Request::is('group-chat/gm') == true)
<script>
  socket.emit('group_online_offline_status', {id: '<?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>', gname: 'Gay', status: 'online', name: '<?php echo Crypt::decryptString($_COOKIE['UserFullName']); ?>'});
</script>
@elseif(Request::is('group-chat/transexual') == true)
<script>
  socket.emit('group_online_offline_status', {id: '<?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>', gname: 'Transexual', status: 'online', name: '<?php echo Crypt::decryptString($_COOKIE['UserFullName']); ?>'});
</script>
@else 
<script>
  socket.emit('group_online_offline_status', {id: '<?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>', gname: 'main', status: 'offline', name: '<?php echo Crypt::decryptString($_COOKIE['UserFullName']); ?>'});
</script>
@endif




</body>
</html>
