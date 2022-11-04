@include('admin_header')

<div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        
         <h1>Daily Stats</h1>
          <form action="/u/adminviewstats" method="GET">
            {{ csrf_field() }}

            <div class="form-group">
              <label>Select Date</label>
              <input type="text" id="" class="form-control datepicker" name="date" value="<?php echo $datedisplay; ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
        <div class="col-md-3"></div>
      </div>

      <div class="row" style="margin-top: 50px;">
        <div class="col-md-1"></div>
        <div class="col-md-5">
          <h4>Likes</h4><hr>
         
          @foreach($data as $da)
           @php
            $user = DB::Select('Select * from users where id = "'.$da->notifications_user_id.'"');
            if(count($user) > 0){
            $user_name= $user[0]->name;
            }

            $user_to =DB::Select('Select * from users where id = "'.$da->notifications_to_id.'"');
            
            if(count($user_to) > 0){
            $user_name_to= $user_to[0]->name;
            }
           @endphp

            @if(count($user) > 0 && count($user_to) > 0)
            <p><a href="/u/adminuserdtls/{{ $user[0]->id }}">{{ $user[0]->name }}</a> <span style="color:red;">liked</span> <a href="/u/adminuserdtls/{{ $user_to[0]->id }}">{{ $user_to[0]->name }}</a></p>
            @endif
          @endforeach
        </div>
        <div class="col-md-5">
        <h4>Conversations</h4><hr>
        @foreach($message as $da)
           @php
            $user = DB::Select('Select * from users where id = "'.$da->chat_from_id.'"');
            if(count($user) > 0){
            $user_name= $user[0]->name;
            }

            $user_to =DB::Select('Select * from users where id = "'.$da->chat_to_id.'"');
            
            if(count($user_to) > 0){
            $user_name_to= $user_to[0]->name;
            }
           @endphp

            @if(count($user) > 0 && count($user_to) > 0)
            <p><a href="/u/adminuserdtls/{{ $user[0]->id }}">{{ $user[0]->name }}</a> <span style="color:red;">messaged</span> <a href="/u/adminuserdtls/{{ $user_to[0]->id }}">{{ $user_to[0]->name }}</a></p>
            @endif
          @endforeach
        </div>
        <div class="col-md-1"></div>
      </div>
  </div>

  @include('admin_footer')


