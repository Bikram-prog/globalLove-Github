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
          <h2>Todo List <span id="theme_chng" style="float: right; cursor: pointer;"><i style="font-size: 22px;" class="fas fa-moon"></i></span></h2>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div>
  <div>
    <div>
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Todo List</h5>
        
      </div>
      <div class="modal-body">
        @php
          $date = date('Y-m-d H:i:s');
        @endphp

        <form action="/u/edittodolistaction-bes" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

        <div class="form-group mb-2">
          <!-- <label>Select Date*</label> -->
          <input class="form-control" type="hidden" name="datetime_todo" placeholder="Select date" autocomplete="off" value="{{ $data[0]->to_do_list_datetime }}" readonly>
        </div>
        
        <div class="form-group mb-2">
          <label>Title*</label>
          <input class="form-control" type="text" name="title_todo" placeholder="Title" value="{{ $data[0]->to_do_list_title }}" autocomplete="off">
        </div>

        <div class="form-group mb-2">
          <label>Description*</label>
          <textarea class="form-control" rows="6" name="desc_todo" placeholder="Write the description...">{{ $data[0]->to_do_list_desc }}</textarea>
        </div>

        <div class="form-group mb-2">
          <!-- <label>Select Date*</label> -->
          <input class="form-control" type="hidden" name="notes_date" value="{{ $date }}">
        </div>

        <div class="form-group mb-2">
          <label>Notes*</label>
          <textarea class="form-control" rows="6" name="notes_todo" placeholder="Write the description...">{{ $data[0]->to_do_list_notes }}</textarea>
        </div>

        <div class="form-group mb-2">
          <label>Days To Complete Job (Optional)</label>
          <input class="form-control" type="number" name="trgt_job_todo" placeholder="Days to complete job" value="{{ $data[0]->to_do_list_target_days }}" autocomplete="off">
        </div>

        <div class="form-group mb-2">
          <label>Priority</label>
          <select class="form-control" name="priority">
            <option <?php echo (isset($data[0]->to_do_list_priority) && $data[0]->to_do_list_priority == 'Low' ? 'selected' : ''); ?>>Low</option>
            <option <?php echo (isset($data[0]->to_do_list_priority) && $data[0]->to_do_list_priority == 'Medium' ? 'selected' : ''); ?>>Medium</option>
            <option <?php echo (isset($data[0]->to_do_list_priority) && $data[0]->to_do_list_priority == 'High' ? 'selected' : ''); ?>>High</option>
            <option <?php echo (isset($data[0]->to_do_list_priority) && $data[0]->to_do_list_priority == 'Critical' ? 'selected' : ''); ?>>Critical</option>
          </select>
        </div>

        <div class="form-group mb-2">
          <input type="file" class="form-control" name="image" value="{{ $data[0]->to_do_list_image }}">
        </div>
        
        @if($data[0]->to_do_list_image != '')
        <div class="form-group mb-2">
        <img style='width:200px;' src='https://globallove.online/images/to_do_bescrow_img/{{ $data[0]->to_do_list_image }}'>
        
        </div>
        @endif

        <!-- email list -->
        <p style="font-weight: 700; font-size: 16px;">Choose Recipients</p>
        @php
          $reciepent = DB::table('admin_to_do_list_reciepent_bes')->get();
         
        @endphp

        @foreach($reciepent as $da)
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="reciepent[]" value="{{ $da->reciepent_id }}" <?php echo (in_array($da->reciepent_name, $name) ? 'checked' : ''); ?>>
          <label class="form-check-label" for="inlineCheckbox1">{{ $da->reciepent_name }}</label>
        </div>
        @endforeach
        
        <input type="hidden" name="to_do_id" value="{{ $data[0]->to_do_list_id }}">

        <div class="alert alert-primary text-center" id="add_todo_msg" style="display: none;"></div>

      </div>

      <div class="text-center mt-4">
        <hr />
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
    </div>
  </div>
</div>
        </div>
        <div class="col-md-2"></div>
        
      </div>
    </div>


   


    


    
  


    <!-- Add todo list modal -->



<footer class="text-left container-lg" style="font-size: 12px; font-weight: 600;">
      <!-- <p class="text-muted">&copy; 2021 WWWMEDIA.WORLD. All Rights Reserved.</p> -->
  </footer>




    <script src="https://www.globallove.online/content/assets/30603563/jquery.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
      
      

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
