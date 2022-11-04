@include('header')
<div class="content d-flex flex-column" style="flex: 1; ">
            <div class="container d-flex flex-row" style=" flex: 1;">
                
<div class="page-content w-100">
    <div class="row h-100">
@include('connectionsidebar')
        <div class="col-lg-9 d-flex flex-column">
            
<h3 class="page-title mb-5">Mutual likes</h3>




<!--------------------------------->

<div id="w0" class="list-view directory-list-view"><div class="row row-cards row-deck">

    @if($mutual != '0')
    @foreach($mutual as $mut)
    <div class="col-6 col-sm-6 col-md-4 directory-item">
    <div class="card " data-user-id="5">
    <a href="/userprofile/{{ $mut[0]->id }}" class="user-photo" data-pjax="0">
        <div class="card-img-top-wrapper d-flex justify-content-center">
            <div class="loader">
                <i class="fa fa-spin fa-spin"></i>
            </div>
            <img class="card-img-top" src="{{asset('images')}}/{{ $mut[0]->prfl_photo_path }}" alt="{{ $mut[0]->name }}">
        </div>
            </a>
    <div class="card-body d-flex flex-column" style="position: relative">
        <h4 class="d-flex justify-content-start align-items-center">
            <a href="/userprofile/{{ $mut[0]->id }}" data-pjax="0">
                <span class="display-name">{{ $mut[0]->name }}, {{ $mut[0]->age }}</span>
            </a>
                                    <div class="ml-auto">
                    <i class="online-status bg-green" rel="tooltip" title="Online">
    </i>
            </div>
        </h4>
        <p style="font-weight: 600;">{{ $mut[0]->sex }}</p>
        <div class="text-muted">{{ $mut[0]->country }}</div>
    </div>
</div>
</div>
@endforeach
@endif



</div><div class="pager"></div></div>























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
                    <div class="encounters-queue d-none d-md-flex flex-row flex-sm-column ml-auto ng-hide" ng-show="initialStateLoaded &amp;&amp; hasEncounters()">
    <!-- ngRepeat: queuedEncounter in encounters | limitTo:5 -->
</div>
            </div>
    
</div>

        </div>
    </div>
</div>
            </div>
        </div>

@include('footer')