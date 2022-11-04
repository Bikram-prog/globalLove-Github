@include('header')

<div class="content my-3 my-md-5">
            <div class="container">
                
<div id="pjax-directory-list-view" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="1000" data-pjax-scroll-to="body">    <div id="w0" class="list-view directory-list-view">
    
    <h1 style="font-weight: 600;"><span><?php echo count($data); ?> People Viewed Your Profile</span></h1>
    <div class="row row-cards row-deck">
    @if(count($data) > 0)

	@foreach($data as $newmember)
	<div class="col-6 col-sm-6 col-md-4 col-lg-3 directory-item">
    <div class="card " data-user-id="7">
    <a onclick="profile()" href="/userprofile/{{ $newmember->id }}" class="user-photo" data-pjax="0">
        <div class="card-img-top-wrapper d-flex justify-content-center">
           
            @if($newmember->prfl_approve_status == '1')
            <img class="card-img-top" src="{{ $newmember->prfl_photo_path }}" alt="{{ $newmember->name }}">
           @else
           <img class="card-img-top" src="https://www.globallove.online/images/male-user-placeholder.png" alt="{{ $newmember->name }}">
           @endif
        </div>
            </a>
    <div class="card-body d-flex flex-column" style="position: relative">
        <h4 class="d-flex justify-content-start align-items-center">
            <a onclick="profile()" href="/userprofile/{{ $newmember->id }}" data-pjax="0">
                <span class="display-name">{{ $newmember->name }} </span>

            </a>

                <?php
            if ((strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile/') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Safari/') == false) || stripos(strtolower($_SERVER['HTTP_USER_AGENT']),'android') !== false) { ?>
            
                          <!-- do nothing -->          
        <?php } else { ?>

            <div class="ml-auto">
                   <a href="/addnewmessage/{{ $newmember->id }}"><i class="fas fa-envelope" style="font-size: 30px; color: #222"></i></a>
            </div>
            <?php } ?>
            
                                    <!-- <div class="ml-auto">
                    <i class="online-status bg-gray" rel="tooltip" title="" data-original-title="Last online: 06:23">
    </i>
            </div> -->
        </h4>
        <p style="font-weight: 600;">{{ $newmember->sex }}, {{ $newmember->age }}</p>
        <div class="text-muted">{{ $newmember->country }} {{ $newmember->city }}</div>
        @if($newmember->onln_time != '')

            
                <P style="color: #5C54AD; font-weight:700;">Last Online:<br> {{ date('F j, Y, g:i A',strtotime($newmember->onln_time)) }}</P>
            
            @endif
    </div>
</div>
</div>
@endforeach
@else
<div><h2 class="text-center">No one viewed your profile yet.</h2></div>
@endif

</div><div class="pager"></div></div></div>
            </div>
        </div>

@include('footer')