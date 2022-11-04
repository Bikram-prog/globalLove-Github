@include('header')

<div class="content my-3 my-md-5">
            <div class="container">
                <div class="dashboard-block mb-3">
   <!--  <h3>Spotlight</h3>
    <div id="pjax-spotlight-horizontal" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="1000"><div class="spotlight-items-horizontal d-sm-flex flex-row">
    <a href="#" class="spotlight-item spotlight-item-submit" data-toggle="modal" data-target="#spotlight-submit">
        <div class="avatar d-flex flex-column justify-content-center align-items-center" style="background-image: url('asset('images')}}/{{ $photo->first()->prfl_photo_path }}')">
            <div class="icon"><i class="fa fa-plus"></i></div>
            <div class="label d-none d-md-block">Add me</div>
        </div>
        <div class="name text-center d-none d-md-block">
           {{ Crypt::decryptString($_COOKIE['UserFullName']) }}     </div>
    </a>
    </div>
</div> --><div class="modal modal-form modal-spotlight-submit fade" id="spotlight-submit" tabindex="-1" role="dialog" aria-labelledby="spotlight-submit-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="spotlight-submit-form" action="/index.php?r=balance%2Fspotlight-submit" method="post" data-pjax-container="#pjax-spotlight-horizontal">
<input type="hidden" name="_csrf" value="0pdN46iGsv7cKrsUFUl5Gd--x1Aizuf9RxugAVcsZw3m4BuAysqFs4tGj1NbOQxtp93yOFeqs5gQdu02LUExZA==">            <div class="modal-header">
                <h5 class="modal-title" id="spotlight-submit-title">
                    Place your photo on spotlight                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="error-summary alert alert-danger" style="display:none"><ul></ul></div>                <input type="hidden" id="userid" name="userId" value="5">
                <div class="form-group form-group-picker">
                    <div class="photo-picker row w-100 mx-0">
                                                    <div class="w-100 empty-state"><div class="empty-icon">
    <i class="fas fa-image"></i>
</div>
<h5 class="empty-title">No photos</h5>
<p class="empty-subtitle">You need at least one photo</p>
    <div class="empty-action">
        <a class="btn btn-primary" href="/index.php?r=settings%2Fupload"><i class="fa fa-image mr-2"></i>Upload</a>    </div>
</div>                                            </div>
                </div>

                <div class="form-group field-message">
<label class="form-label" for="message">Message</label>
<textarea id="message" class="form-control" name="message" rows="2" placeholder="Enter your message..."></textarea>
<div class="text-small text-muted">Not required</div>
<div class="help-block"></div>
</div>
                                <div class="text-green">
                    Price: 50 credits                </div>
                            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cancel                </button>
                <button type="submit" class="btn btn-primary">
                    Place photo                </button>
            </div>
            </form>        </div>
    </div>
</div>
</div>

    <!-- <div class="mb-3"><div class="alert alert-warning">Header Ad</div></div> -->

<div class="row row-eq-height mb-7">
    
    <div class="col-12 col-md-12 col-lg-12">
        <div class="dashboard-block dashboard-block-online h-100 d-flex flex-column">
            <h3>Your Matches</h3>
            <div class="card d-flex flex-fill mb-0">
                @if($matches != '0')
                @foreach($matches as $match)
                                    <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex flex-row align-items-center">
                            <div class="photo">
                                <div class="avatar avatar-md" style="background-image: url('{{asset('images')}}/{{ $match[0]->prfl_photo_path }}')">
                                                                    </div>
                            </div>
                            <div class="info px-2">
                                <div class="first-line text-bolder">
                                    <a class="text-dark" href="/userprofile/{{ $match[0]->id }}">{{ $match[0]->name }} ({{ $match[0]->sex }})</a>                                    <span class="ml-2" rel="tooltip" title="{{ $match[0]->sex }}">
                                        <i class="fa fa-male" aria-hidden="true"></i>                                    </span>
                                                                    </div>
                                <div class="second-line">
                                    <span class="location text-muted">
                                        {{ $match[0]->country }}, {{ $match[0]->city }}                                 </span>
                                </div>
                            </div>
                            <div class="actions ml-auto">
                                <button type="button" class="btn btn-sm btn-azure btn-pill btn-new-message" data-toggle="modal" data-target="#profile-new-message" data-contact-id="6" data-title="Message to Bikram Kundu">Message</button>                            </div>
                        </li>
                                        </ul>
                        @endforeach
                        
                        @endif
                            </div>
            <!-- <a class="btn btn-block btn-link text-gray mt-2" href="/index.php?r=connections%2Flikes&amp;type=mutual">View all</a>   -->      </div>
    </div>
</div>

<div class="dashboard-block dashboard-block-newest">
    <!-- <h3>New members</h3> -->

    <div class="row row-cards row-deck">
    @foreach($newmembers as $newmember)
    	<div class="col-6 col-sm-6 col-md-4 col-lg-3 directory-item">
    <div class="card " data-user-id="7">
    <a href="/userprofile/{{ $newmember->id }}" class="user-photo" data-pjax="0">
        <div class="card-img-top-wrapper d-flex justify-content-center">
            
            <img class="card-img-top" src="{{asset('images')}}/{{ $newmember->prfl_photo_path }}" alt="{{ $newmember->name }}">
        </div>
            </a>
    <div class="card-body d-flex flex-column" style="position: relative">
        <h4 class="d-flex justify-content-start align-items-center">
            <a href="/userprofile/{{ $newmember->id }}" data-pjax="0">
                <span class="display-name">{{ $newmember->name }} {{ $newmember->age }}</span>
            </a>
                                    <div class="ml-auto">
                    <i class="online-status bg-gray" rel="tooltip" title="" data-original-title="Last online: 06:23">
    </i>
            </div>
        </h4>
        <p style="font-weight: 600;">{{ $newmember->sex }}</p>
        <div class="text-muted">{{ $newmember->country }} {{ $newmember->city }}</div>
    </div>
</div>
</div>
@endforeach






</div>
   
</div>


            </div>
        </div>

@include('footer')