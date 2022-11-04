@include('header')

<div class="content my-3 my-md-5">
            <div class="container">
                
<div id="pjax-directory-list-view" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="1000" data-pjax-scroll-to="body">    <div id="w0" class="list-view directory-list-view">
    
    <p style="font-weight: 600;"><span>You have blocked <?php echo count($blocklist); ?> peoples.</span></p>
    <div class="row row-cards row-deck">
    @if(count($blocklist) > 0)

	@foreach($blocklist as $newmember)
	<div class="col-6 col-sm-6 col-md-4 col-lg-3 directory-item">
    <div class="card " data-user-id="7">
    <a href="" class="user-photo" data-pjax="0">

        <div class="card-img-top-wrapper d-flex justify-content-center">
           
            @if($newmember->prfl_approve_status == '1')
            <img class="card-img-top" src="{{asset('images')}}/{{ $newmember->prfl_photo_path }}" alt="{{ $newmember->name }}">
           @else
           <img class="card-img-top" src="{{asset('images')}}/male-user-placeholder.png" alt="{{ $newmember->name }}">
           @endif
        </div>
            </a>
    <div class="card-body d-flex flex-column" style="position: relative">
        <h4 class="d-flex justify-content-start align-items-center">
            <a href="/userprofile/{{ $newmember->id }}" data-pjax="0">
                <span class="display-name">{{ $newmember->name }} {{ $newmember->age }}</span>


            </a>
            
                                    <!-- <div class="ml-auto">
                    <i class="online-status bg-gray" rel="tooltip" title="" data-original-title="Last online: 06:23">
    </i>
            </div> -->
        </h4>
        <p style="font-weight: 600;">{{ $newmember->sex }}</p>
        <div class="text-muted">{{ $newmember->country }} {{ $newmember->city }}</div>

        <div>
                <form action="/postinsert" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="gyfgdydjgjksd" value="<?php echo $newmember->id; ?>">
                    <button type="submit" class="btn btn-link" style="margin-top: -10px;"><i class="fas fa-user-lock"></i> Unblock this user</button>
                </form>

            </div>
        
    </div>
</div>
</div>
@endforeach
@else
<div><h2 class="text-center">No Results Found.</h2></div>
@endif

</div><div class="pager"></div></div></div>
            </div>
        </div>

@include('footer')