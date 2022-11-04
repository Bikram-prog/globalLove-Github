@include('header')

<style>

.toast_notify{
  width: 30% !important;
  margin-bottom: 110px !important;
  right: 10px !important;
}
     #custom-search-input {
  background: #e8e6e7 none repeat scroll 0 0;
  margin: 0;
  padding: 10px;
}
   #custom-search-input .search-query {
   background: #fff none repeat scroll 0 0 !important;
   border-radius: 4px;
   height: 33px;
   margin-bottom: 0;
   padding-left: 7px;
   padding-right: 7px;
   }
   #custom-search-input button {
   background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
   border: 0 none;
   border-radius: 3px;
   color: #666666;
   left: auto;
   margin-bottom: 0;
   margin-top: 7px;
   padding: 2px 5px;
   position: absolute;
   right: 0;
   z-index: 9999;
   }
   .search-query:focus + button {
   z-index: 3;   
   }
   .all_conversation button {
   background: #f5f3f3 none repeat scroll 0 0;
   border: 1px solid #dddddd;
   height: 38px;
   text-align: left;
   width: 100%;
   }
   .all_conversation i {
   background: #e9e7e8 none repeat scroll 0 0;
   border-radius: 100px;
   color: #636363;
   font-size: 17px;
   height: 30px;
   line-height: 30px;
   text-align: center;
   width: 30px;
   }
   .all_conversation .caret {
   bottom: 0;
   margin: auto;
   position: absolute;
   right: 15px;
   top: 0;
   }
   .all_conversation .dropdown-menu {
   background: #f5f3f3 none repeat scroll 0 0;
   border-radius: 0;
   margin-top: 0;
   padding: 0;
   width: 100%;
   }
   .all_conversation ul li {
   border-bottom: 1px solid #dddddd;
   line-height: normal;
   width: 100%;
   }
   .all_conversation ul li a:hover {
   background: #dddddd none repeat scroll 0 0;
   color:#333;
   }
   .all_conversation ul li a {
  color: #333;
  line-height: 30px;
  padding: 3px 20px;
}
   .member_list .chat-body {
   margin-left: 47px;
   margin-top: 0;
   }
   .top_nav {
   overflow: visible;
   }
   .member_list .contact_sec {
   margin-top: 3px;
   }
   .member_list li {
   padding: 6px;
   }
   .member_list ul {
   border: 1px solid #dddddd;
   }
   .chat-img img {
   height: 34px;
   width: 34px;
   }
   .member_list li {
   border-bottom: 1px solid #dddddd;
   padding: 6px;
   }
   .member_list li:last-child {
   border-bottom:none;
   }
   .member_list {
   height: 888px;
   overflow-x: hidden;
   overflow-y: auto;
   }
   .sub_menu_ {
  background: #e8e6e7 none repeat scroll 0 0;
  left: 100%;
  max-width: 233px;
  position: absolute;
  width: 100%;
}
.sub_menu_ {
  background: #f5f3f3 none repeat scroll 0 0;
  border: 1px solid rgba(0, 0, 0, 0.15);
  display: none;
  left: 100%;
  margin-left: 0;
  max-width: 233px;
  position: absolute;
  top: 0;
  width: 100%;
}
.all_conversation ul li:hover .sub_menu_ {
  display: block;
}
.new_message_head button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
}
.new_message_head {
  background: #f5f3f3 none repeat scroll 0 0;
  float: left;
  font-size: 13px;
  font-weight: 600;
  padding: 18px 10px;
  width: 100%;
}
.message_section {
  border: 1px solid #dddddd;
}
.chat_area {
  float: left;
  height: 600px;
  overflow-x: hidden;
  overflow-y: auto;
  width: 100%;
}
.chat_area li {
  padding: 14px 14px 0;
}
.chat_area li .chat-img1 img {
  height: 40px;
  width: 40px;
}
.chat_area .chat-body1 {
  margin-left: 50px;
}
.chat-body1 p {
  background: #fbf9fa none repeat scroll 0 0;
  padding: 10px;
}
.chat_area .admin_chat .chat-body1 {
  margin-left: 0;
  margin-right: 50px;
}
.chat_area li:last-child {
  padding-bottom: 10px;
}
.message_write {
  background: #f5f3f3 none repeat scroll 0 0;
  float: left;
  padding: 15px;
  width: 100%;
}

.message_write textarea.form-control {
  height: 70px;
  padding: 10px;
}
.chat_bottom {
  float: left;
  margin-top: 13px;
  width: 100%;
}
.upload_btn {
  color: #777777;
}
.sub_menu_ > li a, .sub_menu_ > li {
  float: left;
  width:100%;
}
.member_list li:hover {
  background: #428bca none repeat scroll 0 0;
  color: #fff;
  cursor:pointer;
}

.fa-circle{
  color:rgb(47, 230, 47);
  font-size: 12px;
}
</style>

<script src="https://use.fontawesome.com/45e03a14ce.js"></script>
<div class="main_section mt-4">
   <div class="container">
      <div class="chat_container row">


        
        <div class="col-md-3 order-2">
          <div class="member_list">
            <ul class="list-unstyled" id="group_online_user">
               



               </ul>
               </div>
        </div>
         <!--chat_sidebar-->
		 
         <div class="col-md-9 message_section">
      <div class="row">
        <div class="col-md-12 mt-2">
          @php
            $alert=  DB::Select("SELECT * FROM admin_alert");
          @endphp
          <div class="alert alert-primary" style="font-size: 20px;">{!! $alert[0]->text_alert !!}</div>
        </div>
      </div>
		 <div class="row">
		 <div class="new_message_head">
		 <div class="pull-left"><button>Messages</button>
    
    </div><div class="pull-right"></div>
		 </div><!--new_message_head-->
		 
		 <div class="chat_area" id="scroll">
		 <ul id="socket_html" class="list-unstyled">
       @foreach($publicroom as $public)
		 <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                      @if($public->prfl_photo_path != 'https://www.globallove.online/images/male-user-placeholder.png')
                      <a href="/userprofile/{{ $public->public_user_id }}"><img src="{{ $public->prfl_photo_path }}" alt="User Avatar" class="img-circle"></a>
                     @else
                     <a href="/userprofile/{{ $public->public_user_id }}"><img src="https://www.globallove.online/images/male-user-placeholder.png" alt="User Avatar" class="img-circle"></a>
                     @endif
                     </span>
                     <div class="chat-body1 clearfix">
                       <h4 style="font-weight: 600;font-size: 15px;"><a href="/userprofile/{{ $public->public_user_id }}">{{ $public->public_user_name }}</a></h4>
                       <p> <span style="color:#888;">{{ $public->age }}</span> <span style="color:#888;">{{ $public->country }}</span></p>
                        <p>{{ $public->public_message }}</p>
						<div class="chat_time pull-right"><?php echo date('d/m/Y h:i A', strtotime($public->public_date_time)); ?></div>
                     </div>
                  </li>
        @endforeach
				   
                     
				  
                  
				  
				
		 
		 
		 </ul>
     
        
		 </div><!--chat_area-->

     
     @php
     $userapprove = DB::Select("SELECT prfl_photo_path,group_chat_status FROM users WHERE id = '".Crypt::decryptString($_COOKIE['UserIds'])."'");

     $onlnusermale = DB::table('users')
                    ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                    ->where('users.id', '=', Crypt::decryptString($_COOKIE['UserIds']))
                    ->get();
  @endphp

  @if($userapprove[0]->group_chat_status == '1' && $onlnusermale[0]->sex == 'Male' || $onlnusermale[0]->sex == 'Female')

  <p><span style= "font-weight: 700;font-size: 17px;margin-left: 200px;">You are banned for joining group chat.Please contact to our Customer Support Team.</span></p>

  @elseif($userapprove[0]->prfl_photo_path == 'https://www.globallove.online/images/male-user-placeholder.png' || str_contains($userapprove[0]->prfl_photo_path, 'google') || str_contains($userapprove[0]->prfl_photo_path, 'facebook'))
   

   
   
       <p><span style= "font-weight: 700;font-size: 17px;margin-left: 70px;">You have to upload profile picture for join group chat.Please &nbsp;<a href="/upload">Click Here</a> &nbsp;for upload a profile picture and join group chat.</span></p>
   

   
   
       <p><span style= "font-weight: 700;margin-left: 300px;font-size: 17px;">You have to upload profile picture for join group chat</span></p>
   

      @elseif($onlnusermale[0]->sex == 'Male' || $onlnusermale[0]->sex == 'Female')

      <form id="public_room" class="message_write">
       @csrf
      <div class="">
        <textarea class="form-control" placeholder="type a message" name="message" id="message"></textarea>
      <div class="clearfix"></div>
      <div class="chat_bottom">
        <button type="submit" class="pull-right btn btn-success btn btn-lg">Send</button>
      </div>
      </div>
     </form>

      @else

      <p><span style= "font-weight: 700;margin-left: 300px;font-size: 17px;">Only Gay(Male) & Female Can Sent Message On This Chat Room</span></p>

     @endif
     
          
		 </div>
         </div> <!--message_section-->
      </div>
   </div>
</div>

<!-- <div class="container">
    <div class="row">
        <div class="col-md-12 box">
        <h1 class="text-danger mb-4">Not everyone is the same, and for that reason, we will be offering different rooms for your different tastes.<br>  Check out the following rooms:  </h1><hr>
        <P class="text-center">Choose a room:</p>
        <P class="text-center">Main room: <a href="/group-chat" class="btn btn-success ml-3">Open Now</a></p>
        <P class="text-center">Gay Male: <a href="" class="btn btn-danger btn-sm  ml-3">Press For Interest</a></p>
        <P class="text-center">Gay Female: <a href="" class="btn btn-danger btn-sm ml-3">Press For Interest</a></p>
        <P class="text-center">Transexual: <a href="" class="btn btn-danger btn-sm ml-3">Press For Interest</a></p>
        <P class="text-center">Gay Male Curious: <a href="" class="btn btn-danger btn-sm ml-3">Press For Interest</a></p>
        <P class="text-center">Gay Female Curious: <a href="" class="btn btn-danger btn-sm ml-3">Press For Interest</a></p> <hr>
        <h1 class="text-danger mt-4">Please show your interest,by pressing one or any the above rooms,and we will take it from there. </h1>
        </div> -->

@include('footer')

@php

$roomsocket = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->where('users.id', '=', Crypt::decryptString($_COOKIE['UserIds']))
                ->get();

@endphp

<script>

function hide_toast() {
  $(".toast_notify").hide();
}

window.addEventListener('beforeunload', function(e) {
  e.preventDefault();

  
  socket.emit('group_offline', {
          
          'name': '<?php echo $roomsocket[0]->name; ?>',
          'userid': '<?php echo $roomsocket[0]->id; ?>',
          'profilepic': '<?php echo ($roomsocket[0]->prfl_photo_path == 'https://www.globallove.online/images/male-user-placeholder.png' ? 'https://www.globallove.online/images/male-user-placeholder.png' : $roomsocket[0]->prfl_photo_path); ?>',
          
        });
  
});



  // Socket online users 

  socket.emit('group_online', {
          
           'name': '<?php echo $roomsocket[0]->name; ?>',
           'userid': '<?php echo $roomsocket[0]->id; ?>',
           'sex': '<?php echo $roomsocket[0]->sex; ?>',
           'profilepic': '<?php echo ($roomsocket[0]->prfl_photo_path == 'https://www.globallove.online/images/male-user-placeholder.png' ? 'https://www.globallove.online/images/male-user-placeholder.png' : $roomsocket[0]->prfl_photo_path); ?>',
           
         });

         socket.on("group_online_server", function(data) {
           console.log('online');

            
            if(data.sex == 'Male' || data.sex == 'Female') {
              $('.toast_notify').show();
              $('.toast_notify').html(`<div style="cursor: pointer; opacity: 1 !important; background: #F15052;color: #fff; width: 100%;" class="toast" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header" style="color:#000;"><i class="far fa-comment"></i> &nbsp; <strong class="mr-auto">${data.name}</strong><small class="text-muted"> </small><button style="background: transparent;border: none;" type="button" class="ml-2 mb-1" onclick="hidechatbox()"><i class="fas fa-times"></i></button></div><div class="toast-body">Online</div></div>`);
              const myTimeout = setTimeout(hide_toast, 5000);
            }
            




          // console.log(data); 
          //var xyz= [...new Set(data.users_arr['name'])];  
          const map= new Map(
            data.users_arr.map(obj=>[obj.name,obj])
          );
          var deduparr=[];
           deduparr= [...map.values()];
          // console.log(deduparr);
         // $("#group_online_user").html('');
          deduparr.forEach(e => {
          // $("#group_online_user").prepend(`<a onclick="loadChat('${e.userid}', '${e.name}', '${e.id}>')" href="javascript:void(0)" class="text-decoration: none;"><li class="left clearfix">
          //         <span class="chat-img pull-left">
          //         <img src="${e.profilepic}" alt="User Avatar" class="img-circle">
          //         </span>
          //         <div class="chat-body clearfix">
          //            <div class="header_sec">
          //               <strong class="primary-font">${e.name}</strong> <strong class="pull-right">
          //                 <i class="fas fa-circle"></i></strong>
          //            </div>
          //            <div class="contact_sec">
          //             Private Message
          //            </div>
          //         </div>
          //      </li></a>`);

         });
        });

  // Socket

  socket.on("public_room_server", function(data) {
	//alert(data.msg)
    
    $("#socket_html").prepend(`<li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     
                      <a href="/userprofile/${data}"><img src="${data.profilepic}" alt="User Avatar" class="img-circle"></a>
                     
                    
                     
                     </span>
                     <div class="chat-body1 clearfix">
                       <h4 style="font-weight: 600;font-size: 15px;"><a href="/userprofile/${data.userid}">${data.name}</a></h4>
                       <p> <span style="color:#888;">${data.age}</span> <span style="color:#888;">${data.country}</span></p>
                        <p>${data.msg}</p>
						<div class="chat_time pull-right">${data.datetime}</div>
                     </div>
                  </li>`);

                  // $("html, body").animate({ scrollTop: $("#scroll").height() }, 1000);

});





// $("html, body").animate({ scrollTop: $("#scroll").height() }, 1000);
  /* Attach a submit handler to the form */
$("#public_room").submit(function(event) {
    var ajaxRequest;

    /* Stop form from submitting normally */
    event.preventDefault();

    /* Clear result div*/
    $("#result").html('');

    /* Get from elements values */
    var values = $(this).serialize();
    // console.log($('#message').val())

    /* Send the data using post and put the results in a div. */
    /* I am not aborting the previous request, because it's an
       asynchronous request, meaning once it's sent it's out
       there. But in case you want to abort it you can do it
       by abort(). jQuery Ajax methods return an XMLHttpRequest
       object, so you can just use abort(). */
       ajaxRequest= $.ajax({
            url: "/groupChatGayLesbianAction",
            type: "post",
            data: values
        });

    /*  Request can be aborted by ajaxRequest.abort() */

    ajaxRequest.done(function (response, textStatus, jqXHR){

         // Show successfully for submit message
         socket.emit('public_room', {
           'msg': $('#message').val(),
           'name': '<?php echo $roomsocket[0]->name; ?>',
           'userid': '<?php echo $roomsocket[0]->id; ?>',
           'profilepic': '<?php echo ($roomsocket[0]->prfl_photo_path == 'https://www.globallove.online/images/male-user-placeholder.png' ? 'https://www.globallove.online/images/male-user-placeholder.png' : $roomsocket[0]->prfl_photo_path); ?>',
           'age': '<?php echo $roomsocket[0]->age; ?>',
           'country': '<?php echo $roomsocket[0]->country; ?>',
           'datetime': '<?php echo date('d/m/Y h:i A'); ?>',
         });
        //  $("html, body").animate({ scrollTop: $("#scroll").height() }, 1000);
         $("#message").val("");
         
    });

    /* On failure of request this function will be called  */
    ajaxRequest.fail(function (){

        // Show error
        alert('error');
    });
});

setInterval(function(){
  $.ajax({
                    url: '/group-chat-online-gayfemale', 
                    datatype: 'json',
                    success: function(data) {
                     // console.log(data);
                      $("#group_online_user").html(data.html);


                        
                    },

                    cache: false    
                    });

}, 5000); 






</script>