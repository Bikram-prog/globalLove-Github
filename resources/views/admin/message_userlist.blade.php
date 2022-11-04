<ul>
                @foreach($users as $user) 

                @php
                  $msg= DB::Select("SELECT room_status FROM users_chat_rooms WHERE room_from_id = '0' AND room_to_id= '".$user['user_id']."' AND room_status= '1'");
                @endphp
                <li onClick="loadChat('<?php echo $user['user_id']; ?>', '<?php echo $user['name']; ?>', '<?php echo $user['email']; ?>')" id="idd_<?php echo $user['user_id']; ?>" class="contact "> <!-- active -->
                    <div class="wrap">
                        <!-- <span class="contact-status online"></span> -->
                        <img src="{{ $user['propic'] }}" alt="" />
                        <div class="meta">
                            <p class="name">{{ $user['name'] }} <span class="badge badge-success badge-pill" style="background-color: #28A745; float: right;"><?php echo (count($msg) == 1 ? '<i class="fa fa-circle" aria-hidden="true"></i>' : ''); ?></span></p>
                            <p class="preview">{{ $user['lmsg'] }}</p>
                            <p class="preview_typing" style="font-style: italic; font-weight: 700; color: #44bd32;"></p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>