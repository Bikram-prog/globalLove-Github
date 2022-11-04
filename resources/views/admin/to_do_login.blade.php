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
      
      body {
        background-color: #111;
      } 

      .flex {
        display: flex;
        flex: 1;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        height: 100vh;
      }

      .flex a {
          margin-right: 60px;
      }

     


    </style>

  </head>
  <body>
    
    
    {{-- https://www.globallove.online/images/www-media-world-logo.png --}}
    <div class="container-lg mt-4">
      <div class="row mb-2">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="margin-top:150px;">
        <h2 style="color: #fff; display: flex; align-content: center; align-items: center; align-self: center; flex-direction: column;">Login</h2>

        <form action="/u/todologpost" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
              <label style="color: #fff;">Username</label>
              <input type="text" class="form-control" name="username">
            </div>

            <div class="form-group">
              <label style="color: #fff;">Password</label>
              <input type="password" class="form-control" name="pswrd">
            </div>

            <div class="d-grid gap-2 mt-2">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            
          </form>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
      



    <script src="https://www.globallove.online/content/assets/30603563/jquery.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    

  </body>
</html>
