<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta name="color-scheme" content="dark light">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <link rel="manifest" href="https://www.globallove.online/manifest.json">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>GlobalLove</title>

    <style>
      :root {
        --primary-color: #fff;
        --secondary-color: #222;
        --primary-border: rgba(0,0,0,.125);
        --primary-hover: #3742fa;
        --primary-btn-background: #5352ed;
        --primary-btn-border: #3742fa;
        --btn-color: #fff;
        --btn-close: #fff;
        --active-menu:#5352ed;
        --active-menu-border: #3742fa;
      }

      .dark-theme {
        --primary-color: #222;
        --secondary-color: #cfcfcf;
        --primary-border: rgba(90, 90, 90, 0.267);
        --primary-hover: #3f3f3f;
        --primary-btn-background: #000000;
        --primary-btn-border: #1a1a1a;
        --btn-color: #cfcfcf;
        --btn-close: #fff;
        --active-menu:#000000;
        --active-menu-border: #161616;
      }

      .light-theme {
        --primary-color: #fff;
        --secondary-color: #222;
        --primary-border: rgba(0,0,0,.125);
        --primary-hover: #3742fa;
        --primary-btn-background: #5352ed;
        --primary-btn-border: #3742fa;
        --btn-color: #fff;
        --btn-close: #fff;
        --active-menu:#5352ed;
        --active-menu-border: #3742fa;
      }

      

      body {
        background-color: var(--primary-color);
        color: var(--secondary-color);
      }

      .btn-primary {
        color: var(--btn-color) !important;
        background-color: var(--primary-btn-background) !important;
        border-color: var(--primary-btn-border) !important;
      }

      .btn-close {
        background-color: var(--btn-close) !important;
      }

      .modal-content {
        background-color: var(--primary-color);
        color: var(--secondary-color);
      }

      .form-control {
        background-color: var(--primary-color);
        color: var(--secondary-color);
      }

      .form-control:focus {
        background-color: var(--primary-color);
        color: var(--secondary-color);
      }

      

      .list-group a {
        background-color: var(--primary-color);
        color: var(--secondary-color);
      }

      .list-group-item {
        border: 1px solid var(--primary-border) !important;
      }

      h2 {
        font-size: 44px;
      }

      .todo_add {
        width: 100px;
        height: 100px;
        background: #ffa502;
        padding: 10px;
        border-radius: 50px;
        position: fixed;
        bottom: 50px;
        right: 100px;
        z-index: 1000;
      }

      .todo_add i {
        font-size: 45px;
        margin-top: 16px;
        margin-left: 20px;
        color: #fff;
      }

      .active {
        background-color: var(--active-menu) !important;
        border-color: var(--active-menu-border) !important;
        color: #fff !important;
      }

      .modal-title {
        font-size: 34px;
      }

      label {
        font-weight: 500;
        font-size: 16px;
      }

      span {
        font-weight: 600 !important;
        font-size: 13px !important;
        
      }

      .rec_all{
        font-weight: 700; 
        border: 1px solid #ccc; 
        float: right;
      }

      .completedbtn {
        border: 1px solid #ccc;
      }

      .globalA a:hover {
        background-color: var(--primary-hover) !important;
        color: #fff !important;
        transition: background-color 0.2s linear;
        border-color: var(--primary-hover);
      }

      .justify-content-between {
        display: flex;
      }

      

      @media  only screen and (min-device-width : 100px) and (max-device-width : 1200px) {

        .todo_add i {
            font-size: 35px;
            margin-top: 11px;
            margin-left: 16px;
            color: #fff;
        }

        .todo_add {
          width: 80px;
          height: 80px;
        }

        .todo_add {
          right: 5px;
          bottom: 30px;
        }

        .list-group-item {
          margin-bottom: 10px !important;
        }

        .complt {
          width: 100%;
          margin-top: 10px;
        }

        .justify-content-between {
          display: table;
        }

        small {
          font-size: 18px !important;
        }

        .rec_all {
          font-weight: 700; 
          border: 1px solid #ccc; 
          float: inherit;
          width: 100%;
          margin-top: 20px;
        }

        h2, .modal-title {
          font-size: 28px;
        }

      }
    </style>

    <!---------- loading css --------------->
    <style type="text/css">
    
@keyframes ldio-80snwug7ytt {
  0% { transform: translate(-50%,-50%) rotate(0deg); }
  100% { transform: translate(-50%,-50%) rotate(360deg); }
}
.ldio-80snwug7ytt div {
  position: absolute;
  width: 54px;
  height: 54px;
  border: 8px solid #ffa502;
  border-top-color: transparent;
  border-radius: 50%;
}
.ldio-80snwug7ytt div {
  animation: ldio-80snwug7ytt 1.3513513513513513s linear infinite;
  top: 50px;
  left: 50px
}
.loadingio-spinner-rolling-zumvkxrie8 {
  width: 44px;
  height: 44px;
  display: inline-block;
  overflow: hidden;
  background: none;
}
.ldio-80snwug7ytt {
  width: 100%;
  height: 100%;
  position: relative;
  transform: translateZ(0) scale(0.44);
  backface-visibility: hidden;
  transform-origin: 0 0; /* see note above */
}
.ldio-80snwug7ytt div { box-sizing: content-box; }
/* generated by https://loading.io/ */


    </style>

  </head>
  <body>
    
    

    <div class="container-lg mt-4 globalA">
      <div class="row mb-2">
        <div class="col-md-12">
          <h2>Todo List <a href="/u/to_do_bes_logout" class="btn btn-outline-danger btn-sm"><span style="float: right; cursor: pointer;">Logout</span></a> <span id="theme_chng" style="float: right; cursor: pointer;"><i style="font-size: 22px;" class="fas fa-moon"></i></span></h2>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-md-8">
          <a class="btn btn-light active" id="open_todo" onclick="open_todo();" style="font-weight: 700; border: 1px solid #ccc;" href="#"><i class="fas fa-clipboard-list"></i> Open</a>
          <a class="btn btn-light completedbtn" id="in_prog_todo" onclick="in_prog_todo();"  style="font-weight: 700; border: 1px solid #ccc;" href="#"><i class="fas fa-spinner"></i> In Progress</a>
          <a class="btn btn-light completedbtn" id="delay_todo" onclick="delay_todo();" style="font-weight: 700; border: 1px solid #ccc;" href="#"><i class="far fa-clock"></i> Delayed</a>
          <a class="btn btn-light completedbtn complt" id="com_todo" onclick="complete_todo();"  style="font-weight: 700; border: 1px solid #ccc;" href="#"><i class="fas fa-clipboard-check"></i> Completed</a>
        </div>
        <div class="col-md-4">
          <a class="btn btn-light rec_all" id="all_todo" onclick="all_reciepent();" href="#"><i class="fas fa-address-book"></i> All Recipients</a>
        </div>
      </div>
        <div class="row">
          <div class="col-md-12">
            <!--------- Loading ------------>
              <div id="loading_gl" style="display: none;" class="loadingio-spinner-rolling-zumvkxrie8"><div class="ldio-80snwug7ytt">
              <div></div>
              </div></div>
              <!--------- end ---------->
            <div class="list-group" id="contents">

              <!-- <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Job heading </h5>
                  <small>3 days ago</small>
                </div>
                <p class="mb-1">Some placeholder content in a paragraph.</p>
                <span class="badge bg-warning">Sumanta, Darrel</span>
              </a> -->
              
            </div>
          </div>
        </div>
    </div>

  @if(Crypt::decryptString($_COOKIE['UserStatusToDoBes']) == '1')
    <div class="todo_add"><a data-bs-toggle="modal" data-bs-target="#confirmation" href="javascript:void(0)"><i class="fas fa-plus"></i></a></div>
  @endif

    <footer class="text-left container-lg" style="font-size: 12px; font-weight: 600;">
      <p class="text-muted">&copy; 2021 WWWMEDIA.WORLD. All Rights Reserved.</p>
    </footer>


    <!-- modal for confirmation -->
    <div class="modal fade" id="confirmation" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">What you want to do?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-footer">
            <button class="btn btn-warning" data-bs-target="#contact_modal" data-bs-toggle="modal" data-bs-dismiss="modal">Add Recipient</button>
            <button class="btn btn-primary" data-bs-target="#add_list_modal" data-bs-toggle="modal" data-bs-dismiss="modal">Add Todo List</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Add todo list modal -->
<div class="modal fade" id="add_list_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Todo List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <form action="/u/addtodolistpost-bes" method="POST" id="addtodo_form2" enctype="multipart/form-data">
          {{ csrf_field() }}

        <div class="form-group mb-2">
          <label>Current Date*</label>
          <input class="form-control" type="text" name="datetime_todo" placeholder="Select date" autocomplete="off" value="<?php echo date("Y-m-d H:i:s"); ?>" readonly>
        </div>
        
        <div class="form-group mb-2">
          <label>Title*</label>
          <input class="form-control" type="text" name="title_todo" placeholder="Title" autocomplete="off">
        </div>

        <div class="form-group mb-2">
          <label>Description*</label>
          <textarea class="form-control" rows="6" name="desc_todo" placeholder="Write the description..."></textarea>
        </div>

        <div class="form-group mb-2">
          <label>Notes*</label>
          <textarea class="form-control" rows="6" name="notes_todo" placeholder="Write the notes..."></textarea>
        </div>

        <div class="form-group mb-2">
          <label>Days To Complete Job (Optional)</label>
          <input class="form-control" type="number" name="trgt_job_todo" placeholder="Days to complete job" autocomplete="off">
        </div>

        <div class="form-group mb-2">
          <label>Priority</label>
          <select class="form-control" name="priority">
            <option>Low</option>
            <option>Medium</option>
            <option>High</option>
            <option>Critical</option>
          </select>
        </div>

        <div class="form-group mb-2">
          <input type="file" class="form-control" name="image">
        </div>

        <!-- email list -->
        <p style="font-weight: 700; font-size: 16px;">Choose Recipients</p>
        @foreach($data as $da)
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="reciepent[]" value="{{ $da->reciepent_id }}">
          <label class="form-check-label" for="inlineCheckbox1">{{ $da->reciepent_name }}</label>
        </div>
        @endforeach

        <div class="alert alert-primary text-center" id="add_todo_msg" style="display: none;"></div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Post Now</button>
      </div>
    </form>
    </div>
  </div>
</div>



<!-- modal for add contacts -->
<div class="modal fade" id="contact_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Recipient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="form-group mb-2">
          <label>Name*</label>
          <input class="form-control" type="text" id="title_rec" placeholder="Full name" autocomplete="off">
        </div>

        <div class="form-group mb-2">
          <label>Email*</label>
          <input class="form-control" type="email" id="email_rec" placeholder="Email ID" autocomplete="off">
        </div>

        <div class="form-group mb-2">
          <label>Set Password*</label>
          <input class="form-control" type="text" id="psw_rec" placeholder="Set Password" autocomplete="off">
        </div>

        <div class="form-group mb-2">
          <label>Choose Option*</label>
          <select id="opt_rec" class="form-control">
          <option value="0">Without Admin Access</option>
          <option value="1">With Admin Access</option>
          </select>
          
        </div>

        
        <div class="alert alert-primary text-center" id="add_reciepent_msg" style="display: none;"></div>


      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" onclick="add_reciepent();" class="btn btn-primary">Add Recipient</button>
      </div>
    </div>
  </div>
</div>



    <script src="https://www.globallove.online/content/assets/30603563/jquery.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
      open_todo();
      

      //dark theme
      var theme = document.getElementById("theme_chng");

      theme.onclick = function () {
        document.body.classList.toggle("dark-theme");
      }

      // Use matchMedia to check the user preference
      const prefersDark = window.matchMedia('(prefers-color-scheme: dark)');

      toggleDarkTheme(prefersDark.matches);

      // Listen for changes to the prefers-color-scheme media query
      prefersDark.addListener((mediaQuery) => toggleDarkTheme(mediaQuery.matches));

      // Add or remove the "dark" class based on if the media query matches
      function toggleDarkTheme(shouldAdd) {
        document.body.classList.toggle('dark-theme', shouldAdd);
      }

      function logout(){
      
      $.get("/u/to_do_bes_logout");
    }

     // Add Reciepent

    function add_reciepent(){
      var name = $("#title_rec").val();
      var email = $("#email_rec").val();
      var psswrd = $("#psw_rec").val();
      var status = $("#opt_rec").val();
      $.get("/u/add-reciepent-bes/"+ name + "/" + email + "/" + psswrd + "/" + status, function(result){
        
         setTimeout(function(){ 
          $("#contact_modal").modal("hide");  
          }, 1000);

          
          all_reciepent();

          $("#add_reciepent_msg").show();
          $("#add_reciepent_msg").html(result.msg);

          setTimeout(function(){ 
          $("#add_reciepent_msg").hide();    
          }, 3000);
        
      });
    }

    function all_reciepent(){
      $("a").removeClass("active");
      $("#all_todo").addClass("active");
      $("#contents").html("");
      $("#loading_gl").show();
      $.get("/u/all-reciepent-bes", function(results){
        results.forEach(function(result) {
            $("#contents").append(`
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                <div class="w-100 justify-content-between">
                  <h5 class="mb-1">${result.reciepent_name} </h5>
                 <small style="font-size: 18px;"> <i onclick="delete_rec(${result.reciepent_id});" class="fas fa-trash"></i> </small>
                </div>
                <p class="mb-1">${result.reciepent_email} </p>
                
              </a>
              `).children(':last')
                .hide()
                .fadeIn(1000);
                $("#loading_gl").hide();
        });
        
          
        
      });
    }

    function delete_rec(id) {
      var conf = confirm("Are you sure?");
      if(conf) {
        $.get("/u/del-reciepent-bes/"+ id , function(result){
        
          //$(this).fadeOut("slow");
          all_reciepent();

        
      });
      } else {
        return false;
      }
      
    }


    // add todo list 
    $("#addtodo_form").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    //var url = form.attr('action');
    
    $.ajax({
           type: "POST",
           url: "/u/addtodolistpost-bes",
           data: $("#addtodo_form").serialize(), // serializes the form's elements.
           success: function(data)
           {
                setTimeout(function(){ 
                $("#add_list_modal").modal("hide");  
                }, 1000);
                
                $("#add_todo_msg").show();
                $("#add_todo_msg").html(data.msg);

                setTimeout(function(){ 
                $("#add_todo_msg").hide();    
                }, 3000);

                open_todo();
           }
         });

    
});

    function open_todo(){
      $("a").removeClass("active");
      $("#open_todo").addClass("active");
      $("#contents").html("");
      $("#loading_gl").show();
      $.get("/u/opentodo-bes", function(results){
        results.forEach(function(result) {
          if(result.to_do_list_image != null) {
                var img= "<a href='https://www.globallove.online/images/to_do_bescrow_img/"+result.to_do_list_image+"' target='_blank' style='text-decoration:none;'>View Attachment</a>"
              }else{
                var img ="";
              }

            if(result.to_do_list_notes == null && result.to_do_list_target_days != null) {
              $("#contents").append(`
                <a href="javascript::void(0)" class="list-group-item list-group-item-action" aria-current="true">
                <div class="w-100 justify-content-between">
                  <h5 class="mb-1">${result.to_do_list_title} </h5>
                  
                  
                 <small style="font-size: 20px;"> ${moment(result.to_do_list_datetime).fromNow()}&nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="In Progress" onclick="in_prog_todo_action(${result.to_do_list_id});"  class="fas fa-spinner" style="color: #ff9f1a;"></i> &nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delay" onclick="delay_prog_todo_action(${result.to_do_list_id});"  class="far fa-clock" style="color: #eb4d4b;"></i> &nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Completed" onclick="complete_todo_action(${result.to_do_list_id});"  class="far fa-check-circle" style="color: #6ab04c;"></i> &nbsp;&nbsp; 
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" onclick="edit_todo_action(${result.to_do_list_id});"  class="far fa-edit" style="color: #ff9f1a;"></i> &nbsp;&nbsp; 
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="delete_todo(${result.to_do_list_id});" class="fas fa-trash"></i></small>
                </div>
                
                <p><span class="badge bg-success" style="border-radius: 25px;">${result.to_do_list_priority}</span></p>
                
                <span class="mb-1">${result.to_do_list_desc} </span>
                <p style="color: #f53b57;font-weight: 600;text-align:center;">${img}</p>
                <p style="color: #f53b57;font-weight: 600;">Deadline: ${result.to_do_list_target_days}days.</p>
                <span class="badge bg-warning" style="border-radius: 25px;">${result.to_do_list_reciepent}</span>
                
              </a>
              `).children(':last')
                .hide()
                .fadeIn(1000);
              } else if(result.to_do_list_notes != null && result.to_do_list_target_days != null) {
              $("#contents").append(`
                <a href="javascript::void(0)" class="list-group-item list-group-item-action" aria-current="true">
                <div class="w-100 justify-content-between">
                  <h5 class="mb-1">${result.to_do_list_title} </h5>
                  
                  
                 <small style="font-size: 20px;"> ${moment(result.to_do_list_datetime).fromNow()}&nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="In Progress" onclick="in_prog_todo_action(${result.to_do_list_id});"  class="fas fa-spinner" style="color: #ff9f1a;"></i> &nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delay" onclick="delay_prog_todo_action(${result.to_do_list_id});"  class="far fa-clock" style="color: #eb4d4b;"></i> &nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Completed" onclick="complete_todo_action(${result.to_do_list_id});"  class="far fa-check-circle" style="color: #6ab04c;"></i> &nbsp;&nbsp; 
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" onclick="edit_todo_action(${result.to_do_list_id});"  class="far fa-edit" style="color: #ff9f1a;"></i> &nbsp;&nbsp; 
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="delete_todo(${result.to_do_list_id});" class="fas fa-trash"></i></small>
                </div>
                
                <p><span class="badge bg-success" style="border-radius: 25px;">${result.to_do_list_priority}</span></p>
                
                <p class="mb-1">${result.to_do_list_desc} </p>
                <p style="color: #f53b57;font-weight: 600;text-align:center;">${img}</p>
                <p style="font-weight: 700;">Notes: ${result.to_do_list_notes} <br>${moment(result.to_do_list_notes_date_time).format("Do MMM YYYY, h:mm a")}</p>
                <p style="color: #f53b57;font-weight: 600;">Deadline: ${result.to_do_list_target_days}days.</p>
                <span class="badge bg-warning" style="border-radius: 25px;">${result.to_do_list_reciepent}</span>
                
              </a>
              `).children(':last')
                .hide()
                .fadeIn(1000);
              } else if(result.to_do_list_notes != null && result.to_do_list_target_days == null) {
              $("#contents").append(`
                <a href="javascript::void(0)" class="list-group-item list-group-item-action" aria-current="true">
                <div class="w-100 justify-content-between">
                  <h5 class="mb-1">${result.to_do_list_title} </h5>
                  
                  
                 <small style="font-size: 20px;"> ${moment(result.to_do_list_datetime).fromNow()}&nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="In Progress" onclick="in_prog_todo_action(${result.to_do_list_id});"  class="fas fa-spinner" style="color: #ff9f1a;"></i> &nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delay" onclick="delay_prog_todo_action(${result.to_do_list_id});"  class="far fa-clock" style="color: #eb4d4b;"></i> &nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Completed" onclick="complete_todo_action(${result.to_do_list_id});"  class="far fa-check-circle" style="color: #6ab04c;"></i> &nbsp;&nbsp; 
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" onclick="edit_todo_action(${result.to_do_list_id});"  class="far fa-edit" style="color: #ff9f1a;"></i> &nbsp;&nbsp; 
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="delete_todo(${result.to_do_list_id});" class="fas fa-trash"></i></small>
                </div>
                
                <p><span class="badge bg-success" style="border-radius: 25px;">${result.to_do_list_priority}</span></p>
                
                <p class="mb-1">${result.to_do_list_desc} </p>
                <p style="color: #f53b57;font-weight: 600;text-align:center;">${img}</p>
                <p style="font-weight: 700;">Notes: ${result.to_do_list_notes} <br>${moment(result.to_do_list_notes_date_time).format("Do MMM YYYY, h:mm a")}</p>
                <span class="badge bg-warning" style="border-radius: 25px;">${result.to_do_list_reciepent}</span>
                
              </a>
              `).children(':last')
                .hide()
                .fadeIn(1000);
              } else if(result.to_do_list_notes == null && result.to_do_list_target_days == null) {
                $("#contents").append(`
                <a href="javascript::void(0)" class="list-group-item list-group-item-action" aria-current="true">
                <div class="w-100 justify-content-between">
                  <h5 class="mb-1">${result.to_do_list_title} </h5>
                  
                  
                 <small style="font-size: 20px;"> ${moment(result.to_do_list_datetime).fromNow()}&nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="In Progress" onclick="in_prog_todo_action(${result.to_do_list_id});"  class="fas fa-spinner" style="color: #ff9f1a;"></i> &nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delay" onclick="delay_prog_todo_action(${result.to_do_list_id});"  class="far fa-clock" style="color: #eb4d4b;"></i> &nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Completed" onclick="complete_todo_action(${result.to_do_list_id});"  class="far fa-check-circle" style="color: #6ab04c;"></i> &nbsp;&nbsp; 
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" onclick="edit_todo_action(${result.to_do_list_id});"  class="far fa-edit" style="color: #ff9f1a;"></i> &nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="delete_todo(${result.to_do_list_id});" class="fas fa-trash"></i></small>
                </div>
                <p><span class="badge bg-success" style="border-radius: 25px;">${result.to_do_list_priority}</span></p>
                <p class="mb-1">${result.to_do_list_desc} </p>
                <p style="color: #f53b57;font-weight: 600;text-align:center;">${img}</p>
                <span class="badge bg-warning" style="border-radius: 25px;">${result.to_do_list_reciepent}</span>
                
              </a>
              `).children(':last')
                .hide()
                .fadeIn(1000);
              }
                

                $("#loading_gl").hide();
        });
        
          
        
      });
    }

    ////////////////////////////

    function in_prog_todo(){
      $("a").removeClass("active");
      $("#in_prog_todo").addClass("active");
      $("#contents").html("");
      $("#loading_gl").show();
      $.get("/u/inprogtodo-bes", function(results){
        results.forEach(function(result) {
          if(result.to_do_list_image != null) {
                var img= "<a href='https://www.globallove.online/images/to_do_bescrow_img/"+result.to_do_list_image+"' target='_blank' style='text-decoration:none;'>View Attachment</a>"
              }else{
                var img ="";
              }

            if(result.to_do_list_notes == null && result.to_do_list_target_days != null) {
              $("#contents").append(`
                <a href="javascript::void(0)" class="list-group-item list-group-item-action" aria-current="true">
                <div class="w-100 justify-content-between">
                  <h5 class="mb-1">${result.to_do_list_title} </h5>
                  
                 <small style="font-size: 20px;"> ${moment(result.to_do_list_datetime).fromNow()}&nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delay" onclick="delay_prog_todo_action(${result.to_do_list_id});"  class="far fa-clock" style="color: #eb4d4b;"></i> &nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Completed" onclick="complete_todo_action(${result.to_do_list_id});"  class="far fa-check-circle" style="color: #6ab04c;"></i> &nbsp;&nbsp; 
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="delete_todo(${result.to_do_list_id});" class="fas fa-trash"></i></small>
                </div>
                
                <p><span class="badge bg-success" style="border-radius: 25px;">${result.to_do_list_priority}</span></p>
                
                <p class="mb-1">${result.to_do_list_desc} </p>
                <p style="color: #f53b57;font-weight: 600;text-align:center;">${img}</p>
                <p style="color: #f53b57;font-weight: 600;">Deadline: ${result.to_do_list_target_days}days.</p>
                <span class="badge bg-warning" style="border-radius: 25px;">${result.to_do_list_reciepent}</span>
                
              </a>
              `).children(':last')
                .hide()
                .fadeIn(1000);
              } else if(result.to_do_list_notes != null && result.to_do_list_target_days != null) {
              $("#contents").append(`
                <a href="javascript::void(0)" class="list-group-item list-group-item-action" aria-current="true">
                <div class="w-100 justify-content-between">
                  <h5 class="mb-1">${result.to_do_list_title} </h5>
                  
                 <small style="font-size: 20px;"> ${moment(result.to_do_list_datetime).fromNow()}&nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delay" onclick="delay_prog_todo_action(${result.to_do_list_id});"  class="far fa-clock" style="color: #eb4d4b;"></i> &nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Completed" onclick="complete_todo_action(${result.to_do_list_id});"  class="far fa-check-circle" style="color: #6ab04c;"></i> &nbsp;&nbsp;  
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="delete_todo(${result.to_do_list_id});" class="fas fa-trash"></i></small>
                </div>
                
                <p><span class="badge bg-success" style="border-radius: 25px;">${result.to_do_list_priority}</span></p>
                
                <p class="mb-1">${result.to_do_list_desc} </p>
                <p style="color: #f53b57;font-weight: 600;text-align:center;">${img}</p>
                <p style="font-weight: 700;">Notes: ${result.to_do_list_notes} <br>${moment(result.to_do_list_notes_date_time).format("Do MMM YYYY, h:mm a")}</p>
                <p style="color: #f53b57;font-weight: 600;">Deadline: ${result.to_do_list_target_days}days.</p>
                <span class="badge bg-warning" style="border-radius: 25px;">${result.to_do_list_reciepent}</span>
                
              </a>
              `).children(':last')
                .hide()
                .fadeIn(1000);
              } else if(result.to_do_list_notes != null && result.to_do_list_target_days == null) {
              $("#contents").append(`
                <a href="javascript::void(0)" class="list-group-item list-group-item-action" aria-current="true">
                <div class="w-100 justify-content-between">
                  <h5 class="mb-1">${result.to_do_list_title} </h5>
                  
                 <small style="font-size: 20px;"> ${moment(result.to_do_list_datetime).fromNow()}&nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delay" onclick="delay_prog_todo_action(${result.to_do_list_id});"  class="far fa-clock" style="color: #eb4d4b;"></i> &nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Completed" onclick="complete_todo_action(${result.to_do_list_id});"  class="far fa-check-circle" style="color: #6ab04c;"></i> &nbsp;&nbsp; 
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="delete_todo(${result.to_do_list_id});" class="fas fa-trash"></i></small>
                </div>
                
                <p><span class="badge bg-success" style="border-radius: 25px;">${result.to_do_list_priority}</span></p>
                
                <p class="mb-1">${result.to_do_list_desc} </p>
                <p style="color: #f53b57;font-weight: 600;text-align:center;">${img}</p>
                <p style="font-weight: 700;">Notes: ${result.to_do_list_notes} <br>${moment(result.to_do_list_notes_date_time).format("Do MMM YYYY, h:mm a")}</p>
                <span class="badge bg-warning" style="border-radius: 25px;">${result.to_do_list_reciepent}</span>
                
              </a>
              `).children(':last')
                .hide()
                .fadeIn(1000);
              } else if(result.to_do_list_notes == null && result.to_do_list_target_days == null) {
                $("#contents").append(`
                <a href="javascript::void(0)" class="list-group-item list-group-item-action" aria-current="true">
                <div class="w-100 justify-content-between">
                  <h5 class="mb-1">${result.to_do_list_title} </h5>
                  
                 <small style="font-size: 20px;"> ${moment(result.to_do_list_datetime).fromNow()}&nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delay" onclick="delay_prog_todo_action(${result.to_do_list_id});"  class="far fa-clock" style="color: #eb4d4b;"></i> &nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Completed" onclick="complete_todo_action(${result.to_do_list_id});"  class="far fa-check-circle" style="color: #6ab04c;"></i> &nbsp;&nbsp; 
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="delete_todo(${result.to_do_list_id});" class="fas fa-trash"></i></small>
                </div>
                <p><span class="badge bg-success" style="border-radius: 25px;">${result.to_do_list_priority}</span></p>
                <p class="mb-1">${result.to_do_list_desc} </p>
                <p style="color: #f53b57;font-weight: 600;text-align:center;">${img}</p>
                <span class="badge bg-warning" style="border-radius: 25px;">${result.to_do_list_reciepent}</span>
                
              </a>
              `).children(':last')
                .hide()
                .fadeIn(1000);
              }
                

                $("#loading_gl").hide();
        });
        
          
        
      });
    }


    function delay_todo(){
      $("a").removeClass("active");
      $("#delay_todo").addClass("active");
      $("#contents").html("");
      $("#loading_gl").show();
      $.get("/u/delaytodo-bes", function(results){
        results.forEach(function(result) {
          if(result.to_do_list_image != null) {
                var img= "<a href='https://www.globallove.online/images/to_do_bescrow_img/"+result.to_do_list_image+"' target='_blank' style='text-decoration:none;'>View Attachment</a>"
              }else{
                var img ="";
              }

            if(result.to_do_list_notes == null && result.to_do_list_target_days != null) {
              $("#contents").append(`
                <a href="javascript::void(0)" class="list-group-item list-group-item-action" aria-current="true">
                <div class="w-100 justify-content-between">
                  <h5 class="mb-1">${result.to_do_list_title} </h5>
                  
                 <small style="font-size: 20px;"> ${moment(result.to_do_list_datetime).fromNow()}&nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Completed" onclick="complete_todo_action(${result.to_do_list_id});"  class="far fa-check-circle" style="color: #6ab04c;"></i> &nbsp;&nbsp; 
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="delete_todo(${result.to_do_list_id});" class="fas fa-trash"></i></small>
                </div>
                
                <p><span class="badge bg-success" style="border-radius: 25px;">${result.to_do_list_priority}</span></p>
                
                <p class="mb-1">${result.to_do_list_desc} </p>
                <p style="color: #f53b57;font-weight: 600;text-align:center;">${img}</p>
                <p style="color: #f53b57;font-weight: 600;">Deadline: ${result.to_do_list_target_days}days.</p>
                <span class="badge bg-warning" style="border-radius: 25px;">${result.to_do_list_reciepent}</span>
                
              </a>
              `).children(':last')
                .hide()
                .fadeIn(1000);
              } else if(result.to_do_list_notes != null && result.to_do_list_target_days != null) {
              $("#contents").append(`
                <a href="javascript::void(0)" class="list-group-item list-group-item-action" aria-current="true">
                <div class="w-100 justify-content-between">
                  <h5 class="mb-1">${result.to_do_list_title} </h5>
                  
                 <small style="font-size: 20px;"> ${moment(result.to_do_list_datetime).fromNow()}&nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Completed" onclick="complete_todo_action(${result.to_do_list_id});"  class="far fa-check-circle" style="color: #6ab04c;"></i> &nbsp;&nbsp;  
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="delete_todo(${result.to_do_list_id});" class="fas fa-trash"></i></small>
                </div>
                
                <p><span class="badge bg-success" style="border-radius: 25px;">${result.to_do_list_priority}</span></p>
                
                <p class="mb-1">${result.to_do_list_desc} </p>
                <p style="color: #f53b57;font-weight: 600;text-align:center;">${img}</p>
                <p style="font-weight: 700;">Notes: ${result.to_do_list_notes} <br>${moment(result.to_do_list_notes_date_time).format("Do MMM YYYY, h:mm a")}</p>
                <p style="color: #f53b57;font-weight: 600;">Deadline: ${result.to_do_list_target_days}days.</p>
                <span class="badge bg-warning" style="border-radius: 25px;">${result.to_do_list_reciepent}</span>
                
              </a>
              `).children(':last')
                .hide()
                .fadeIn(1000);
              } else if(result.to_do_list_notes != null && result.to_do_list_target_days == null) {
              $("#contents").append(`
                <a href="javascript::void(0)" class="list-group-item list-group-item-action" aria-current="true">
                <div class="w-100 justify-content-between">
                  <h5 class="mb-1">${result.to_do_list_title} </h5>
                  
                 <small style="font-size: 20px;"> ${moment(result.to_do_list_datetime).fromNow()}&nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Completed" onclick="complete_todo_action(${result.to_do_list_id});"  class="far fa-check-circle" style="color: #6ab04c;"></i> &nbsp;&nbsp; 
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="delete_todo(${result.to_do_list_id});" class="fas fa-trash"></i></small>
                </div>
                
                <p><span class="badge bg-success" style="border-radius: 25px;">${result.to_do_list_priority}</span></p>
                
                <p class="mb-1">${result.to_do_list_desc} </p>
                <p style="color: #f53b57;font-weight: 600;text-align:center;">${img}</p>
                <p style="font-weight: 700;">Notes: ${result.to_do_list_notes} <br>${moment(result.to_do_list_notes_date_time).format("Do MMM YYYY, h:mm a")}</p>
                <span class="badge bg-warning" style="border-radius: 25px;">${result.to_do_list_reciepent}</span>
                
              </a>
              `).children(':last')
                .hide()
                .fadeIn(1000);
              } else if(result.to_do_list_notes == null && result.to_do_list_target_days == null) {
                $("#contents").append(`
                <a href="javascript::void(0)" class="list-group-item list-group-item-action" aria-current="true">
                <div class="w-100 justify-content-between">
                  <h5 class="mb-1">${result.to_do_list_title} </h5>
                  
                 <small style="font-size: 20px;"> ${moment(result.to_do_list_datetime).fromNow()}&nbsp;&nbsp;
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Completed" onclick="complete_todo_action(${result.to_do_list_id});"  class="far fa-check-circle" style="color: #6ab04c;"></i> &nbsp;&nbsp; 
                 <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="delete_todo(${result.to_do_list_id});" class="fas fa-trash"></i></small>
                </div>
                <p><span class="badge bg-success" style="border-radius: 25px;">${result.to_do_list_priority}</span></p>
                <p class="mb-1">${result.to_do_list_desc} </p>
                <p style="color: #f53b57;font-weight: 600;text-align:center;">${img}</p>
                <span class="badge bg-warning" style="border-radius: 25px;">${result.to_do_list_reciepent}</span>
                
              </a>
              `).children(':last')
                .hide()
                .fadeIn(1000);
              }
                

                $("#loading_gl").hide();
        });
        
          
        
      });
    }

    /////////////////////////////////

    function delete_todo(id) {
      var conf = confirm("Are you sure?");
      if(conf) {
        $.get("/u/del-todo-bes/"+ id , function(result){
        
          //$(this).fadeOut("slow");
          open_todo();

        
      });
      } else {
        return false;
      }
      
    }

    function edit_todo_action(id) {
      var conf = confirm("Are you sure?");
      if(conf) {
        window.location.href= '/u/edit-to-do-list-bes/' +id
      } else {
        return false;
      }
      
    }

    function in_prog_todo_action(id) {
      var conf = confirm("Are you sure?");
      if(conf) {
        $.get("/u/in-prog-todo-bes/"+ id , function(result){
        
          //$(this).fadeOut("slow");
          in_prog_todo();

        
      });
      } else {
        return false;
      }
      
    }

    function delay_prog_todo_action(id) {
      var conf = confirm("Are you sure?");
      if(conf) {
        $.get("/u/delay-todo-bes/"+ id , function(result){
        
          //$(this).fadeOut("slow");
          delay_todo();

        
      });
      } else {
        return false;
      }
      
    }

    function complete_todo_action(id) {
      var conf = confirm("Are you sure?");
      if(conf) {
        $.get("/u/complete-todo-bes/"+ id , function(result){
        
          //$(this).fadeOut("slow");
          complete_todo();

        
      });
      } else {
        return false;
      }
      
    }



    function complete_todo(){
      $("a").removeClass("active");
      $("#com_todo").addClass("active");
      $("#contents").html("");
      $("#loading_gl").show();
      $.get("/u/completetodo-bes", function(results){
        results.forEach(function(result) {
          if(result.to_do_list_image != null) {
                var img= "<a href='https://www.globallove.online/images/to_do_bescrow_img/"+result.to_do_list_image+"' target='_blank' style='text-decoration:none;'>View Attachment</a>"
              }else{
                var img ="";
              }

            $("#contents").append(`
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                <div class="w-100 justify-content-between">
                  <h5 class="mb-1">${result.to_do_list_title} </h5>
                 <small style="font-size: 18px;"> ${moment(result.to_do_list_datetime).fromNow()} </small>
                </div>
                <p class="mb-1">${result.to_do_list_desc} </p>
                <p style="color: #f53b57;font-weight: 600;text-align:center;">${img}</p>
                <span class="badge bg-warning">${result.to_do_list_reciepent}</span>
                
              </a>
              `).children(':last')
                .hide()
                .fadeIn(1000);
                $("#loading_gl").hide();
        });
        
          
        
      });
    }

    </script>

    <script>
      //tooltip initializer
      
        $("[data-bs-toggle=tooltip").tooltip();
    </script>

    <script>
      CKEDITOR.replace( 'desc_todo' );
    </script>

  </body>
</html>
