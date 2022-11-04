<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GlobalLove Video Call</title>
</head>
<body>
  


    <!-- Video.js base CSS -->
    <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>

    body {
        position: relative;
    }
    .mainvideo > video {
        width: 100%;
        height: 100vh;
        object-fit: contain;
    }

    #room-controls {
        position: fixed;
        bottom: 10px;
        left: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 8px 2px #444;
    }

    .control {
        position: fixed;
        bottom: 20px;
        left: 50%;
        right: 40%;
        z-index: 10000;
        width: 100%;
        margin: 0 auto;
    }

    #button-join {
        background: #be2edd;
        border: none;
        width: 50px;
        height: 50px;
        color: #fff;
        font-size: 20px;
        border-radius: 25px;
    } 

    #button-leave {
        background: #eb4d4b;
        border: none;
        width: 50px;
        height: 50px;
        color: #fff;
        font-size: 20px;
        border-radius: 25px;
    } 
    </style>



    <div id="calling" style="
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        align-content: center;
        justify-content: center;
        align-items: center;
        height: 80vh;
        font-size: 42px;
        font-family: monospace;
    ">Connecting...</div>


  <div class="control">
  <!-- <button id="button-join"><i class="fas fa-video"></i></button> -->
  <button id="button-leave"><i class="fas fa-video-slash"></i></button>
  </div>
  

    <div id="room-controls">
      <video id="video" class="video-js" playsinline autoplay loop muted style="width: 80px; height: 110px; z-index: 1000; object-fit: cover; border-radius: 8px;"></video>
      
    </div>

    <input type="hidden" id="to_js" value="<?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>">
    <input type="hidden" id="name_js" value="<?php echo Crypt::decryptString($_COOKIE['UserFullName']); ?>">
    <input type="hidden" id="email_js" value="<?php echo Crypt::decryptString($_COOKIE['UserEmail']); ?>">
    <input type="hidden" id="emchat" value="<?php echo (isset($_GET['q']) && $_GET['q'] != '' ? $_GET['q'] : 'a'); ?>">

    <input type="hidden" id="room" value="<?php echo (isset($_GET['room']) && $_GET['room'] != '' ? $_GET['room'] : 'b'); ?>">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.1/socket.io.js" integrity="sha512-oFOCo2/3DtjrJG4N27BjSLQWoiBv171sK6a+JiWjp/7agxC2nCUP358AqzxkBUb5jX8g6CYLPdSKQTbC0weCwA==" crossorigin="anonymous"></script>

    <script>
    var socket = io('https://yourdeveloper.world', {transports: ['websocket']});
    socket.emit('join', {email: '<?php echo Crypt::decryptString($_COOKIE['UserEmail']); ?>', id: '<?php echo Crypt::decryptString($_COOKIE['UserIds']); ?>'});
    </script>
    <script src="//media.twiliocdn.com/sdk/js/video/releases/2.3.0/twilio-video.min.js"></script>
    <script src="https://unpkg.com/axios@0.19.0/dist/axios.min.js"></script>
    <script src="{{ url('videos-call.js') }}"></script>
    <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>

</body>
</html>