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
    <a class="btn btn-dark btn-sm btn-block" href="messages/sent"><i class="fas fa-share"></i> Sent</a>
</li>

<?php foreach($chatUsers as $cu) {

$unread_msg= DB::Select("SELECT room_status FROM users_chat_rooms WHERE room_from_id = '".$cu->id."'AND room_status= '0' AND room_to_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");




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


        
        <?php 
            if(count($unread_msg) === 0) { ?>

                <span style="font-size: 17px;
                color: #000000;
                font-weight: bold;">

                {{Str::limit ($msg_latest[0]->chat_msg, 30)}}

                </span>

           <?php  } else { ?>

            <span style="font-size: 13px;
          color: #000000;
          font-weight: 700;">
        
          {{Str::limit ($msg_latest[0]->chat_msg, 30)}}
        
        </span>

        <?php } ?>

            
    </p>

    @elseif(count($msg_latest) > 0 && count($msg) == 0 && isset($msg_latest[0]->chat_msg) && $msg_latest[0]->chat_msg != '')


    <?php 
    if(count($unread_msg) === 0) { ?>

        <span style="font-size: 17px;
        color: #000000;
        font-weight: bold;">

        {{Str::limit ($msg_latest[0]->chat_msg, 30)}}

        </span>

   <?php  } else { ?>

    <span style="font-size: 13px;
    color: #a7a5a5;
    font-weight: 400;">

  {{Str::limit ($msg_latest[0]->chat_msg, 30)}}

</span>

<?php } ?>
     
          
          
          
          </p>

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
