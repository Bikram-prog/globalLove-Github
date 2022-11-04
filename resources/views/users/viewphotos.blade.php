@include('header')
<div class="content my-3 my-md-5">
            <div class="container">
                <div class="page-content">
    <div class="row">
        
        <div class="col-lg-12">
            <div class="card">
    <div class="card-header">
        <h3 class="card-title">Photos (Maximum 4 photos are allowed)</h3>

     
     
        @if(count($photos) < 4 && $verify[0]->email_verified_at != '')
        <div class="card-options">
            <a onclick="search()" href="/upload" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Upload            </a>
        </div>
        @elseif($verify[0]->email_verified_at == '')
        <div class="card-options">
            <p style="color: #f15052;">You have to verify your email for uploading photos.</p>
        </div>
        @endif
    </div>
    <div class="card-body">
    @if(count($photos) > 0)
        <p style="font-weight:bold">You must choose one (1) picture below as your profile picture</p>
    @endif    
                <div id="pjax-settings-photos" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="1000">                            <div id="w0" class="settings-photos row row-cards row-deck">
      
      @foreach($photos as $pic)
     <div class="photo-item col-sm-4">
    <div class="card">
        <img class="card-img-top rounded" src="{{ $pic->user_photo_path }}">
        <div class="card-body d-flex flex-column pt-2 pl-0 pr-0 pb-2">
            <div class="d-flex align-items-center mt-auto">
                                    <div>
                        <!-- <span class="text-warning bg-orange-darker rounded px-2 py-1" rel="tooltip" title="This photo must be approved by administration">
                            Not verified                        </span> -->
                    </div>
                                <div class="ml-auto">
                                    <?php $picture= str_replace('https://www.globallove.online/images/','', $pic->user_photo_path); ?>
                                    @if($pic->user_photo_path != $pic->prfl_photo_path && $pic->approve_status == '1' && $pic->private_status == '0')
                                    <a onclick="search()" class="btn btn-sm btn-success" href="/prflphoto/{{ $picture }}" rel="tooltip" >Make profile picture</a>
                                    @elseif($pic->user_photo_path == $pic->prfl_photo_path && $pic->prfl_approve_status == '0')
                                    <p style="margin-top: 5px; font-weight: 700;font-style: italic;"><i class="fas fa-user-clock"></i>Your photo was successfully uploaded and is now pending review.All photos are reviewed by our customer satisfaction team and should be processed within 24hours.</p>
                                    @elseif($pic->approve_status == '0')
                                    <p style="margin-top: 5px; font-weight: 700;font-style: italic;"><i class="fas fa-user-clock"></i>Your photo was successfully uploaded and is now pending review.All photos are reviewed by our customer satisfaction team and should be processed within 24hours.</p>
                                    @endif
                                	@if($pic->private_status == 0 && $pic->prfl_photo_path != $pic->user_photo_path)
                                                              <a class="btn btn-sm btn-success" href="/privatephoto/{{ $pic->user_photo_id }}" rel="tooltip" title="Click here for hide your image from others"><i class="fas fa-lock-open"></i></a>

                                    @elseif($pic->private_status == 1 && $pic->prfl_photo_path != $pic->user_photo_path)
                                                              <a class="btn btn-sm btn-success" href="/unlockphoto/{{ $pic->user_photo_id }}" rel="tooltip" title="Click here for unhide your image from others" ><i class="fas fa-lock"></i></a>
                                    @endif

                                    @if($pic->prfl_photo_path != $pic->user_photo_path)

                                                              <a onclick="search()" class="btn btn-sm btn-danger" href="/deletephoto/{{ $pic->user_photo_id}}/{{ $picture }}" ><i class="fas fa-trash"></i></a>  
                                    @endif              
                                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
 </div>                    </div>    </div>
</div>
        </div>
    </div>
</div>
            </div>
        </div>

@include('footer')

  