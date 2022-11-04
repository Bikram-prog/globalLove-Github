@include('header')

<style> 
    .premium {
        border: 2px solid #4cd137 !important;
       
    }
    </style>


<div class="content my-3 my-md-5">
            <div class="container-fluid">
                
<form id="search-form" class="form-horizontal" action="/browse" method="get">
	{{ csrf_field() }}
<input type="hidden" name="r" value="directory/index">
<div class="card directory-search-form">
    <div class="card-body pt-3 pb-1">
        <div class="row">
            <div class="alert bg-red text-white w-100" style="display:none"><ul></ul></div>        </div>
        <div class="row">
            <div class="col-sex col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <div class="form-label">I'm looking for</div>
                    <div class="selectgroup selectgroup-pills">
                                                    <div id="distance"  class="selectgroup selectgroup-pills" role="radiogroup" aria-invalid="false">
<label  class="selectgroup-item"><input  type="radio" class="selectgroup-input" name="distance" value="Male"> 
	<span <?php echo (isset($_GET['distance']) && $_GET['distance'] == 'Male' ? 'style="border: 1px solid #467fcf;"' : ''); ?>  class="selectgroup-button selectgroup-button-icon" rel="tooltip" title="" data-original-title="Male"><i class="fas fa-male"></i> Male</span></label>
<label class="selectgroup-item"><input type="radio" class="selectgroup-input" name="distance" value="Female"> <span <?php echo (isset($_GET['distance']) && $_GET['distance'] == 'Female' ? 'style="border: 1px solid #467fcf;"' : ''); ?> class="selectgroup-button selectgroup-button-icon" rel="tooltip" title="" data-original-title="Female"><i class="fas fa-female"></i> Female</span></label>
<label class="selectgroup-item"><input type="radio" class="selectgroup-input" name="distance" value="Transgender"> <span <?php echo (isset($_GET['distance']) && $_GET['distance'] == 'Transgender' ? 'style="border: 1px solid #467fcf;"' : ''); ?> class="selectgroup-button selectgroup-button-icon" rel="tooltip" title="" data-original-title="Transgender"><i class="fas fa-transgender"></i> Transgender</span></label>


</div>
                                            </div>
                </div>
            </div>
            <div class="col-age col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <div class="form-label">Aged</div>
                    <div class="row">
                        <div class="col-6">
                            <input type="number" id="fromage" class="form-control" name="fromAge" value="<?php echo (isset($_GET['fromAge']) ? $_GET['fromAge'] : '18'); ?>" min="18" step="1">                        </div>
                        <div class="col-6">
                            <input type="number" id="toage" class="form-control" name="toAge" value="<?php echo (isset($_GET['toAge']) ? $_GET['toAge'] : '100'); ?>" min="18" max="100" step="1">                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-location col-sm-12 col-md-12 col-lg-6">
                <div class="custom-controls-stacked">
                    <div class="form-label">Located</div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 ">
                                                            <label class="custom-control custom-radio" style="margin-bottom: 0">
                                    <input type="radio" class="custom-control-input" name="locationType" value="near" checked="">                                    <div class="custom-control-label">Near me</div>
                                </label>
                                                            
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-2 mt-lg-0 location-type location-address hidden">
                                <select id="country" class="country-selector selectized" name="country" tabindex="-1" style="display: none;"><option value="AU" selected="selected">Australia</option></select><div class="selectize-control country-selector single"><div class="selectize-input items full has-options has-items"><div class="item" data-value="AU">Australia</div><input type="text" autocomplete="new-password" tabindex="" id="country-selectized" style="width: 4px;"></div><div class="selectize-dropdown single country-selector" style="display: none; width: 0px; top: 0px; left: 0px;"><div class="selectize-dropdown-content"></div></div></div>                            </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-2 mt-lg-0 location-type location-address hidden">
                            <select id="city" class="city-selector selectized" name="city" style="height: 38px; display: none;" tabindex="-1"><option value="" selected="selected"></option></select><div class="selectize-control city-selector single"><div class="selectize-input items not-full"><input type="text" autocomplete="new-password" tabindex="" id="city-selectized" style="width: 4px;"></div><div class="selectize-dropdown single city-selector" style="display: none;"><div class="selectize-dropdown-content"></div></div></div>                        </div>
                        <div class="col-12 col-sm-8 col-lg-8 mt-2 mt-lg-0 location-type location-near ">
                            <div class="field-distance has-success">

<div id="distance" class="selectgroup selectgroup-pills" role="radiogroup" aria-invalid="false"><label class="selectgroup-item"><input type="radio" class="selectgroup-input" name="distance" value="10"> <span class="selectgroup-button selectgroup-button-icon" rel="tooltip" title="" data-original-title="10">10 km</span></label>
<label class="selectgroup-item"><input type="radio" class="selectgroup-input" name="distance" value="50" checked=""> <span class="selectgroup-button selectgroup-button-icon" rel="tooltip" title="" data-original-title="50">50 km</span></label>

<label class="selectgroup-item"><input type="radio" class="selectgroup-input" name="distance" value="0"> <span class="selectgroup-button selectgroup-button-icon" rel="tooltip" title="" data-original-title="Everywhere"><i class="fa fa-globe"></i></span></label></div>

<div class="help-block"></div>
</div>                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-search-actions col-12 col-sm-12 col-md-12 col-lg-2">
                <div class="form-group">
                    <div class="form-label">&nbsp;</div>
                    <div class="btn-group w-100">
                        <button onclick="search()" type="submit" class="btn btn-primary btn-block"><i class="fas fa-search pr-2"></i>Search</button>                        <!-- <button class="btn btn-primary" type="button" data-toggle-visibility-cookie="directory-search-more-visible" data-toggle-visibility-target=".directory-search-more">
                            <i class="fa fa-cog"></i>
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- <div id="directory-search-more" class="directory-search-more d-flex flex-column flex-sm-row justify-content-start align-items-start align-items-sm-center hidden">
            <div class="form-group field-online">

            
            <label class="custom-control custom-checkbox">
                <input type="checkbox" id="online" class="custom-control-input" name="online" value="1">
                <span class="custom-control-label">Online</span>
            </label>
</div>            <div class="form-group field-verified">

            
            <label class="custom-control custom-checkbox">
                <input type="checkbox" id="verified" class="custom-control-input" name="verified" value="1">
                <span class="custom-control-label">Verified users</span>
            </label>
</div>            <div class="form-group field-withphoto">

            <input type="hidden" name="withPhoto" value="0">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" id="withphoto" class="custom-control-input" name="withPhoto" value="1">
                <span class="custom-control-label">With photo</span>
            </label>
</div>        </div> -->
    </div>
</div>

</form><div>    <div id="w0" class="list-view directory-list-view">

    <div class="row row-cards row-deck">
    <div class="col-md-12">
        @if (Session::has('msg'))
                                    <div class="alert alert-success">{{Session::get('msg')}}</div>
                                @endif
    </div>
	@foreach($newmembers as $newmember)
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
           @if($newmember->prfl_approve_status == '1')
            <img class="card-img-top" src="{{ $newmember->prfl_photo_path }}" alt="{{ $newmember->name }}">
           @else
           <img class="card-img-top" src="https://www.globallove.online/images/male-user-placeholder.png" alt="{{ $newmember->name }}">
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
@endforeach



</div>

<!-- pagination-->
<div class="pager" style="margin-bottom: 30px;">
<style type="text/css">
	.loadmore {
	width: 90px;
    height: 90px;
    margin-bottom: 40px;
    border-radius: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
    background: #888;
    border-color: #eee;
	}
</style>
<?php 
if(isset($_GET['d'])) {
if($totalusers > $_GET['d'] ) { 
?>
<div class="text-center"><a onclick="search()" href="/browse?d=<?php echo $_GET['d'] + $limit; ?>" class="btn btn-primary loadmore"><span>Load More</span></a></div>
<?php } } else { ?>
<!--div class="text-center"><a onclick="search()" href="/browse?d=<?php echo $limit; ?>" class="btn btn-primary loadmore"><span>Load More</span></a></div-->
<?php } ?>
<p>&nbsp;</p>
</div>  <!-- end pagination-->



</div>
</div>
     </div>
       </div>




@include('footer')




