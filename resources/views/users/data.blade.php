<?php
$i =1;
?>

@foreach($data as $newmember)
    
    <?php
    // premium users check
    $today = date('Y-m-d H:i:s');
    $premium_user = DB::Select("select * from payment_transactions where pt_u_id = '".$newmember->id."' and pt_end_date > '".$today."'");
    if(count($premium_user) > 0) {
        $premium = "Premium";
    } else {
        $premium = "";
    }
    ?>


	<div class="col-6 col-sm-12 col-md-4 col-lg-3 directory-item">
    <div class="card <?php echo (count($premium_user) > 0 ? 'premium' : ''); ?>">
    <a onclick="profile()" href="/userprofile/{{ $newmember->id }}" class="user-photo" data-pjax="0">
        <div class="card-img-top-wrapper d-flex justify-content-center">
           @if($newmember->prfl_approve_status == '1'  && $newmember->hide_status == '0')
            <img loading="lazy" class="card-img-top" src="{{ $newmember->prfl_photo_path }}" alt="{{ $newmember->name }}">
           @else
           <img loading="lazy" class="card-img-top" src="https://www.globallove.online/images/male-user-placeholder.png" alt="{{ $newmember->name }}">
           @endif

        </div>
            </a>
    <div class="card-body d-flex flex-column" style="position: relative">
    <h6 class="text-capitalised text-success" style="font-weight: bold;
    letter-spacing: 0.8px;
    font-size: 16px;">  {{$premium}}   </h6>
        <h4 class="d-flex justify-content-start align-items-center">
            <a onclick="profile()" href="/userprofile/{{ $newmember->id }}" data-pjax="0">
                <span class="display-name">{{ $newmember->name }} </span>

            </a>
            <?php
            if ((strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile/') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Safari/') == false) || stripos(strtolower($_SERVER['HTTP_USER_AGENT']),'android') !== false) { ?>

                          <!-- do nothing -->
        <?php } else { ?>
            <div class="ml-auto">
                   <a class="d-none d-sm-block" data-toggle="tooltip" data-placement="top" title="Start chat" onclick="loadChat('<?php echo $newmember->id; ?>', '<?php echo $newmember->name; ?>', '<?php echo $newmember->email; ?>','<?php echo $newmember->onln_status; ?>')" href="javascript:void(0)"><i class="fas fa-comment" style="font-size: 30px; color: #5C54AD"></i></a>
            </div>
        <?php } ?>
        </h4>
        <?php
            //dd(strtotime($data[0]->dob));
            // $from = new DateTime(date("Y-m-d",strtotime(str_replace('/', '-',$newmember->dob))));
            // $to   = new DateTime('today');
            //$age =  $from->diff($to)->y;
            $age = $newmember->age;


        ?>

        <p style="font-weight: 600;">{{ $newmember->sex }}, {{ $age }}</p>
        <div class="text-muted">{{ $newmember->country }} {{ $newmember->city }}</div>
        @if($newmember->match_seeking != '')
        <div class="text-muted">
        Looking for: {{ $newmember->match_seeking }}, {{ $newmember->match_min_age }} - {{ $newmember->match_max_age }}

        @if($newmember->onln_status == 'online')
        <i data-toggle="tooltip" data-placement="top" title="Online" style="float: right;" class="fas fa-circle text-success"></i>
        @else
        <i data-toggle="tooltip" data-placement="top" title="Offline" style="float: right;" class="fas fa-circle text-danger"></i>
        @endif
        </div>
        @endif
    </div>

</div>
</div>



<?php $i++; ?>
@endforeach
