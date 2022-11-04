@include('header')

<div class="content my-3 my-md-5">
            <div class="container">
                <div class="dashboard-block mb-3">
    <h3>Spotlight</h3>
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
</div><div class="modal modal-form modal-spotlight-submit fade" id="spotlight-submit" tabindex="-1" role="dialog" aria-labelledby="spotlight-submit-title" aria-hidden="true">
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

    <div class="mb-3"><div class="alert alert-warning">Header Ad</div></div>

<div class="row row-eq-height mb-7">
    <div class="col-12 col-md-12 col-lg-7">
        <div class="dashboard-block dashboard-block-encounters">
            <h3>Encounters</h3>
            <div class="encounters d-flex flex-fill ng-scope" ng-app="youdateEncounters" ng-controller="EncountersController as $ctrl">
    <div class="encounters-wrapper d-flex w-100 flex-column flex-fill flex-md-row">
        <div class="card">
            <div class="row align-self-center h-100 w-100 ng-hide" ng-show="!initialStateLoaded" style="min-height: 200px;">
    <div class="dimmer active w-100 d-flex justify-content-center align-items-center">
        <div class="loader"></div>
        <div class="dimmer-content mt-9">
            Loading encounters...        </div>
    </div>
</div>
            <div class="h-100" ng-show="initialStateLoaded === true &amp;&amp; !hasEncounters()">
    <div class="no-contacts d-flex h-100 p-5 justify-content-center">
        <div class="empty-state"><div class="empty-icon">
    <i class="fas fa-users"></i>
</div>
<h5 class="empty-title">Users not found</h5>
<p class="empty-subtitle">You can try to narrow your search filters</p>
</div>    </div>
</div>
            <div class="d-flex flex-fill flex-column flex-md-row align-items-stretch ng-hide mh-100" ng-show="initialStateLoaded === true &amp;&amp; hasEncounters()">
                <div class="encounters-photo flex-fill">
                    <div uib-carousel="" class="ng-isolate-scope carousel"><div class="carousel-inner" ng-transclude="">
    <!-- ngRepeat: photo in currentEncounter.photos track by photo.id -->
</div>
<a role="button" href="" class="carousel-control-prev ng-hide" ng-click="prev()" ng-class="{ disabled: isPrevDisabled() }" ng-show="slides.length > 1">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a role="button" href="" class="carousel-control-next ng-hide" ng-click="next()" ng-class="{ disabled: isNextDisabled() }" ng-show="slides.length > 1">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
<ol class="carousel-indicators ng-hide" ng-show="slides.length > 1">
  <!-- ngRepeat: slide in slides | orderBy:indexOfSlide track by $index -->
</ol>
</div>
                    <div class="encounters-controls">
                        <button class="btn btn-secondary btn-lg btn-like" ng-click="onEncounterAction('like')">
                            <i class="fa fa-heart"></i>
                        </button>
                        <button class="btn btn-secondary btn-lg btn-skip" ng-click="onEncounterAction('skip')">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                </div>
                <div class="encounters-info ml-0 ml-md-auto">
                    <div class="profile-info ng-hide" ng-show="initialStateLoaded &amp;&amp; hasEncounters()">
    <div class="profile-info-block profile-main-info">
        <div class="d-flex">
            <div class="name-location justify-content-end">
                <div class="first-line d-flex align-items-center">
                    <h3 class="display-name ng-binding">
                        
                    </h3>
                    <span class="px-1">·</span>
                    <span class="age ng-binding">
                        
                    </span>
                    <i class="online-status flex-shrink-0 bg-gray" uib-tooltip="">
                    </i>
                </div>
                <div class="second-line d-flex flex-column align-content-center">
                    <div class="user-location ng-binding">
                        
                    </div>
                    <div class="user-badges d-flex flex-row mt-2">
                        <div class="user-badge user-sex-badge sex- d-flex align-items-center justify-content-center mr-2" uib-tooltip="">
                            <i class=""></i>
                        </div>
                        <div ng-show="currentEncounter.user.isVerified" class="user-badge user-verified-badge d-flex align-items-center justify-content-center mr-2 ng-hide" rel="tooltip" title="Verified user">
                            <i class="fas fa-check"></i>
                        </div>
                        <div ng-show="currentEncounter.user.isPremium" class="user-badge user-premium-badge d-flex align-items-center justify-content-center ng-hide" rel="tooltip" title="Premium user">
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="profile-info-block">
        <div class="row mb-0 mb-sm-4">
            <div class="col-12 col-sm-6 mb-4 mb-sm-0">
                <div class="text-bold mb-2">Sex:</div>
                <div class="text-muted ng-binding">
                    
                </div>
            </div>
            <div class="col-12 col-sm-6 mb-4 mb-sm-0">
                <div class="text-bold mb-2">Status:</div>
                <div class="text-muted ng-binding">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 mb-4 mb-sm-0">
                <div class="text-bold mb-2">I am looking for:</div>
                <div class="text-muted ng-binding">
                    
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="text-bold mb-2">Aged:</div>
                <div class="text-muted ng-binding">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="profile-info-block">
        <div class="text-bold mb-2">Description:</div>
        <div class="text-muted ng-binding">
            
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
            </div>

</div>
            <!-- <a class="btn btn-block btn-link text-gray mt-2" href="/index.php?r=connections%2Fencounters">Play now</a>  -->       </div>
    </div>
    <div class="col-12 col-md-12 col-lg-5">
        <div class="dashboard-block dashboard-block-online h-100 d-flex flex-column">
            <h3>Your Matches</h3>
            <div class="card d-flex flex-fill mb-0">
                @if(count($matches) > 0)
                @foreach($matches as $match)
                                    <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex flex-row align-items-center">
                            <div class="photo">
                                <div class="avatar avatar-md" style="background-image: url('{{asset('images')}}/{{ $match->first()->prfl_photo_path }}')">
                                                                    </div>
                            </div>
                            <div class="info px-2">
                                <div class="first-line text-bolder">
                                    <a class="text-dark" href="/userprofile/{{ $match->first()->id }}">{{ $match->first()->name }}</a>                                    <span class="ml-2" rel="tooltip" title="Man">
                                        <i class="fa fa-male" aria-hidden="true"></i>                                    </span>
                                                                    </div>
                                <div class="second-line">
                                    <span class="location text-muted">
                                        {{ $match->first()->country }}                                   </span>
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
    <h3>New members</h3>

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