@include('header')

<style type="text/css">
	.list-group-item+.list-group-item {
		border-top-width: 1px;
	}
	.name {
		text-transform: capitalize;
	}

</style>
<div class="container mt-4">
	
	<div class="row">
		<div class="col-12">
			<div class="list-group">
			  @foreach($users as $user) 
			  @php
                  $msg= DB::Select("SELECT room_status FROM users_chat_rooms WHERE room_from_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' AND room_to_id= '".$user['user_id']."' AND room_status= '1'");
                @endphp
			  <a href="#" class="list-group-item list-group-item-action">
			  	<img style="width: 50px; height: 50px; border-radius: 8px;" src="{{ $user['propic'] }}" alt="profile-chat-image" class="mb-2">
			    <div class="d-flex w-100 justify-content-between">
			    	
			      <h5 class="mb-1 name">{{ $user['name'] }}</h5>
			      <span class="badge badge-success"><?php echo (count($msg) == 1 ? '<i class="fa fa-circle" aria-hidden="true"></i>' : ''); ?></span>
			    </div>
			    <p class="mb-1">{{ $user['lmsg'] }}</p>
			    
			    <small>3 days ago</small>
			    <p class="preview_typing" style="font-style: italic; font-weight: 700; color: #44bd32;"></p>
			  </a>
			   @endforeach
			</div>
		</div>
	</div>
</div>


<!-- <ul>
                @foreach($users as $user) 

                @php
                  $msg= DB::Select("SELECT room_status FROM users_chat_rooms WHERE room_from_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' AND room_to_id= '".$user['user_id']."' AND room_status= '1'");
                @endphp
                <li onClick="loadChat('<?php //echo $user['user_id']; ?>', '<?php //echo $user['name']; ?>', '<?php //echo $user['email']; ?>')" id="idd_<?php //echo $user['user_id']; ?>" class="contact ">
                    <div class="wrap">
                       
                        <img src="{{ $user['propic'] }}" class="img-fluid" alt="" />
                        <div class="meta">
                            <p class="name">{{ $user['name'] }} <span class="badge badge-success badge-pill" style="background-color: #28A745; float: right;"><?php //echo (count($msg) == 1 ? '<i class="fa fa-circle" aria-hidden="true"></i>' : ''); ?></span></p>
                            <p class="preview">{{ $user['lmsg'] }}</p>
                            <p class="preview_typing" style="font-style: italic; font-weight: 700; color: #44bd32;"></p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul> -->


@include('footer')