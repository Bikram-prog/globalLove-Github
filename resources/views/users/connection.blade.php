@include('header')
<div class="content d-flex flex-column" style="flex: 1; ">
            <div class="container d-flex flex-row" style=" flex: 1;">
                
<div class="page-content w-100">
    <div class="row h-100">

        <div class="col-lg-9 d-flex flex-column">
            
<h3 class="page-title mb-5">Your favourites</h3>


<div id="w0" class="list-view directory-list-view"><div class="row row-cards row-deck">

    @foreach($youlike as $like)
    <div class="col-6 col-sm-6 col-md-4 directory-item">
    <div class="card " data-user-id="5">
    <a onclick="profile()" href="/userprofile/{{ $like->id }}" class="user-photo" data-pjax="0">
        <div class="card-img-top-wrapper d-flex justify-content-center">
            <div class="loader">
                <i class="fa fa-spin fa-spin"></i>
            </div>
            @if($like->prfl_approve_status == '1')
            <img class="card-img-top" src="{{ $like->prfl_photo_path }}" alt="{{ $like->name }}">
           @else
           <img class="card-img-top" src="https://www.globallove.online/images/male-user-placeholder.png" alt="{{ $like->name }}">
           @endif
        </div>
            </a>
    <div class="card-body d-flex flex-column" style="position: relative">
        <h4 class="d-flex justify-content-start align-items-center">
            <a onclick="profile()" href="/userprofile/{{ $like->id }}" data-pjax="0">
                <span class="display-name">{{ $like->name }}</span>
            </a>

                <?php
            if ((strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile/') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Safari/') == false) || stripos(strtolower($_SERVER['HTTP_USER_AGENT']),'android') !== false) { ?>
            
                          <!-- do nothing -->          
        <?php } else { ?>
                                   <div class="ml-auto">
                   <a href="/addnewmessage/{{ $like->id }}"><i class="fas fa-envelope" style="font-size: 30px; color: #222"></i></a>
            </div>
            <?php } ?>
        </h4>
        <p style="font-weight: 600;">{{ $like->sex }}, {{ $like->age }}</p>
        <div class="text-muted">{{ $like->country }}</div>
        @if($like->onln_time != '')

            
                <P style="color: #5C54AD; font-weight:700;">Last Online:<br> {{ date('F j, Y, g:i A',strtotime($like->onln_time)) }}</P>
            
            @endif
    </div>
</div>
</div>
@endforeach



</div><div class="pager"></div></div>
        

@include('footer')