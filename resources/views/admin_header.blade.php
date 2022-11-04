<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>GlobalLove</title>
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="app.min.css">
<!--   <link rel="stylesheet" href="angular-csp.css">
  <link rel="stylesheet" href="messenger.css">
  <link rel="stylesheet" href="messenger-theme-flat.css">

<link rel="stylesheet" href="authchoice.css"> -->


<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style type="text/css">
    .dropdown-item-notify {
            border-bottom: 1px solid #ccc !important;
            color: #222 !important;
    }
</style>

</head>
<body class="ltr body-default">




  <div class="header py-4">
  <div class="container">
      <div class="d-flex">
          <a class="header-brand" href="/u/adminviewuser" style="color: #FFFFFF;">
             <!--  <img class="header-brand-img" src="" alt="YouDate">    -->    GlobalLove Admin     </a>
          <div class="d-flex align-items-center order-lg-2 ml-auto">
                                  
                      <div class="nav-item d-none d-sm-block">
      <!-- <a href="/index.php?r=balance%2Fservices" class="btn btn-outline-primary btn-sm" data-pjax="0" title="Balance" rel="tooltip">
        <i class="fas fa-wallet mr-2"></i><span class="user-balance">0</span>
      </a> -->
  </div>

  @if(Session::get('AdminUserName'))

  <a style="float-right;color: #FFFFFF;margin-left: 10px;" href="/u/searchuser"><i class="fas fa-search"></i> Search Users</a>

  <a style="float-right;color: #FFFFFF;margin-left: 10px;" href="/u/todohome" target="_blank">To Do List</a>

  <a style="float-right;color: #FFFFFF;margin-left: 10px;" href="/u/adminlogout">Logout</a>


  @endif
</div>
</div>
</div>
</div>
@if(Session::get('AdminUserName'))
<div class="header d-lg-block p-0" id="header-navigation">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-lg order-lg-first">
              <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
<!-- <li class="nav-item active"><a class="nav-link active" href="/dashboard"><i class="fas fa-home"></i>Dashboard </a></li> -->
<!--li class="nav-item"><a class="nav-link " href="/u/adminviewuser"><i class="fas fa-users"></i>Users </a></li-->


<li class="nav-item dropdown">
@php

    $countuser= DB::Select("SELECT count(*) as cnt FROM users where prfl_approve_status = 0 ");


 
  @endphp
  <!-- badge -->
  @if(isset($countuser))
    @if($countuser[0]->cnt  > 0)
    <div style="height: 30px;
    width: 30px;
    background-color: #8d9b2c;
    position: absolute;
    padding: 5px;
    color: #fff;
    font-weight: bold;
    border-radius: 37px;
    left: 61px;
    top: -4px;
    text-align: center;
    ">
    {{  $countuser[0]->cnt }}
    </div>
    @endif
 @endif
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-users"></i>  Users
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/u/adminviewuser">For approval</a>
            <a class="dropdown-item" href="/u/adminviewapprveuser">Approved</a>
            <a class="dropdown-item" href="/u/adminviewdenieduser">Denied</a>
        </div>

</li>


<li class="nav-item"><a class="nav-link " href="/u/adminreportviewuser">
@php

$countuser= DB::Select("SELECT count(*) as cnt FROM report_users where r_status = 0 ");

 
  @endphp
  <!-- badge -->
  @if(isset($countuser))
    @if($countuser[0]->cnt  > 0)

    <div style="height: 30px;
    width: 30px;
    background-color: #8d9b2c;
    position: absolute;
    padding: 5px;
    color: #fff;
    font-weight: bold;
    border-radius: 37px;
    left: 119px;
    top: -4px;
    text-align: center;
    ">
    {{  $countuser[0]->cnt }}

</div>
@endif
 @endif
 <i class="fas fa-flag"></i>  Reported User </a></li>

 <li class="nav-item"><a class="nav-link " href="/u/adminverifyprofile">
@php

$countuser= DB::Select("SELECT count(*) as cnt FROM users where verify_photo_path != '' AND verify_approve_status = '0' ");

 
  @endphp
  <!-- badge -->
  @if(isset($countuser))
    @if($countuser[0]->cnt  > 0)

    <div style="height: 30px;
    width: 30px;
    background-color: #8d9b2c;
    position: absolute;
    padding: 5px;
    color: #fff;
    font-weight: bold;
    border-radius: 37px;
    left: 105px;
    top: -4px;
    text-align: center;
    ">
    {{  $countuser[0]->cnt }}

</div>
@endif
 @endif
 <i class="fas fa-check-circle"></i>  Verify Profile </a></li>




<li class="nav-item"><a class="nav-link " href="/u/adminviewapprvetext">
@php

    $countprof= DB::Select("SELECT count(*) as cnt FROM users_metas_status  where status = 0 ");

 
  @endphp
  <!-- badge -->
  @if(isset($countprof))
    @if($countprof[0]->cnt  > 0)

<div style="height: 30px;
    width: 30px;
    background-color: #8d9b2c;
    position: absolute;
    padding: 5px;
    color: #fff;
    font-weight: bold;
    border-radius: 37px;
    left: 119px;
    top: -4px;
    text-align: center;
    ">
    {{  $countprof[0]->cnt }}

</div>
@endif
 @endif
<i class="fas fa-users"></i>Profile Update </a></li>

<li class="nav-item"><a class="nav-link " href="/u/countrylisting"><i class="fas fa-search-dollar"></i>Country Pricing </a></li>
@php

    $countphoto= DB::Select("SELECT count(*) as cnt FROM user_photos  where approve_status = 0 ");

 
  @endphp
  <!-- badge -->
  <li class="nav-item dropdown">
  @if(isset($countphoto))
    @if($countphoto[0]->cnt  > 0)


   
        <div style="height: 30px;
    width: 30px;
    background-color: #8d9b2c;
    position: absolute;
    padding: 5px;
    color: #fff;
    font-weight: bold;
    border-radius: 37px;
    left: 61px;
    top: -4px;
    text-align: center;
    ">
 {{  $countphoto[0]->cnt }}
</div>
@endif
@endif


        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-camera"></i>  Photos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/u/adminviewphotos">Approve Other Photos</a>
        </div>

        </li>

        <li class="nav-item dropdown">
        @php

$countagent= DB::Select("SELECT count(*) as cnt FROM agent  where status = 0 ");


@endphp
<!-- badge -->
@if(isset($countagent))
@if($countagent[0]->cnt  > 0)

        <div style="height: 30px;
    width: 30px;
    background-color: #8d9b2c;
    position: absolute;
    padding: 5px;
    color: #fff;
    font-weight: bold;
    border-radius: 37px;
    left: 61px;
    top: -4px;
    text-align: center;
    ">
 {{  $countagent[0]->cnt }}
</div>
@endif
@endif
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-user-plus"></i>   Agent
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/u/adminviewagent">For approval</a>
            <a class="dropdown-item" href="/u/adminlistapproveagent">Approved</a>
            <a class="dropdown-item" href="/u/adminlistdenyagent">Denied</a>
        </div>

        </li>
        <li class="nav-item"><a class="nav-link " href="/u/adminviewstats"><i class="fas fa-file-alt"></i>Daily Stats</a></li>
        <li class="nav-item"><a class="nav-link " href="/u/adminviewtestimonial"><i class="fa fa-quote-left "></i>Testimonials</a></li>
        <li class="nav-item"><a class="nav-link " href="/u/messages"><i class="fa fa-comments"></i>Customer Service</a></li>
        <li class="nav-item"><a class="nav-link " href="/u/abusewordlisting"><i class="fa fa-comments"></i>Chat Abusive Words</a></li>

        @php
          $alluser= DB::Select("SELECT count(*) as cnt FROM users");
        @endphp
        <span style="
             font-size: 28px;
    color: #fff;
    text-align: right;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-content: center;
    justify-content: center;
    align-items: center;
    background: #222;
    width: 100px;
    border-radius: 100px;
    height: 100px;
    position: fixed;
    z-index: 1000;
    right: 5px;
        "> {{ $alluser[0]->cnt }}</span>

</ul>           
 </div>
      

      </div>
  </div>
</div>
@endif

