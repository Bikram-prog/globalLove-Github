@include('header')

@php
    $notification= DB::Select("SELECT t1.*,t2.* FROM notifications t1 left join users t2 on (t1.notifications_user_id=t2.id) WHERE t1.notifications_to_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' ORDER BY t1.notifications_date_time DESC LIMIT 50");
  @endphp

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

@include('footer')