@include('header')


@php
$arr = [];
$sql = DB::select("SELECT *
        FROM `users`
        LEFT JOIN `users_metas` ON `users_metas`.`user_id` = `users`.`id`
        LEFT JOIN `users_match` ON `users_match`.`users_match_id` = `users`.`id`
        WHERE `users`.`prfl_photo_path` != 'https://www.globallove.online/images/male-user-placeholder.png' AND users.display_status = 'show' AND `users`.`id` != '".Crypt::decryptString($_COOKIE['UserIds'])."' AND `users_metas`.`sex` = '".Crypt::decryptString($_COOKIE['LookingFor'])."'  AND `users`.`prfl_approve_status` = '1' AND `users`.`id` NOT IN ((
        SELECT b_who_id
        FROM block_users
        WHERE b_whom_id = '".Crypt::decryptString($_COOKIE['UserIds'])."'))
        ORDER BY `users`.`id` DESC");

        foreach($sql as $d) {
            $arr[] = $d->id;
        }

        shuffle($arr);
        $next = next($arr);
@endphp

<div class="container mt-4">
    <div class="row">
    <div class="col-12">
      <div class="alert alert-warning" role="alert">
        <h4>Would you like to Browse in a single? &nbsp; <a href="{{ route('tinder', [$next]) }}" class="btn btn-success btn-lg"><i class="fas fa-heart"></i> Yes</a></h4>

      </div>
    </div>
    </div>
    </div>

<style>
    .premium {
        border: 2px solid #4cd137 !important;

    }
    </style>


<div class="content my-3 my-md-5">
            <div class="container">

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


</form>

<form id="search-form" class="form-horizontal" action="/browse" method="get">
	{{ csrf_field() }}
<input type="hidden" name="r" value="directory/index">

        <div class="row">
            <div class="alert bg-red text-white w-100" style="display:none"><ul></ul></div>        </div>


        <div class="row">
            <form id="search-form" class="form-horizontal" action="/browse" method="get">
            {{ csrf_field() }}
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <div class="form-label"></div>
                        <div class="row">
                            <div class="col-3"><p  style="float: right;font-weight: 700;">Search By Name:</p></div>
                            <div class="col-3">
                                <input type="text" id="user_name" class="form-control" name="user_name" value="<?php echo isset($_GET['user_name']) ? $_GET['user_name'] : ''; ?>">                        </div>
                            <div class="col-3">
                                <button onclick="search()" type="submit" class="btn btn-primary btn-block"><i class="fas fa-search pr-2"></i>Search</button>      </div>
                                <div class="col-3"></div>
                        </div>
                    </div>
                </div>
            </form>
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

</form>
<div>    <div id="w0" class="list-view directory-list-view">

    <div class="row row-cards row-deck" id="cont">
    <div class="col-md-12">
        @if (Session::has('msg'))
           <div class="alert alert-success">{{Session::get('msg')}}</div>
        @endif



    </div>

    @include('data')






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

<p>&nbsp;</p>
</div>  <!-- end pagination-->



</div>
</div>
     </div>
       </div>


<style type="text/css">
@keyframes ldio-1lb5jgzc77d {
  0% { transform: rotate(0) }
  100% { transform: rotate(360deg) }
}
.ldio-1lb5jgzc77d div { box-sizing: border-box!important }
.ldio-1lb5jgzc77d > div {
  position: absolute;
  width: 56.42px;
  height: 56.42px;
  top: 80.28999999999999px;
  left: 80.28999999999999px;
  border-radius: 50%;
  border: 4.34px solid #000;
  border-color: #f045aa transparent #f045aa transparent;
  animation: ldio-1lb5jgzc77d 1.2048192771084336s linear infinite;
}
.ldio-1lb5jgzc77d > div:nth-child(2) { border-color: transparent }
.ldio-1lb5jgzc77d > div:nth-child(2) div {
  position: absolute;
  width: 100%;
  height: 100%;
  transform: rotate(45deg);
}
.ldio-1lb5jgzc77d > div:nth-child(2) div:before, .ldio-1lb5jgzc77d > div:nth-child(2) div:after {
  content: "";
  display: block;
  position: absolute;
  width: 4.34px;
  height: 4.34px;
  top: -4.34px;
  left: 21.7px;
  background: #f045aa;
  border-radius: 50%;
  box-shadow: 0 52.08px 0 0 #f045aa;
}
.ldio-1lb5jgzc77d > div:nth-child(2) div:after {
  left: -4.34px;
  top: 21.7px;
  box-shadow: 52.08px 0 0 0 #f045aa;
}
.loadingio-spinner-dual-ring-as0bi689od {
  width: 217px;
  height: 217px;
  display: inline-block;
  overflow: hidden;
  background: none;
}
.ldio-1lb5jgzc77d {
  width: 100%;
  height: 100%;
  position: relative;
  transform: translateZ(0) scale(1);
  backface-visibility: hidden;
  transform-origin: 0 0; /* see note above */
}
.ldio-1lb5jgzc77d div { box-sizing: content-box; }
/* generated by https://loading.io/ */
</style>

@include('footer')




