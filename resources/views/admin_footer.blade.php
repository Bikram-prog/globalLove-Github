  <!-----------------------TOAST ------------------------------->

<div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
  <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
    <div class="toast-header">
      <!-- <img src="..." class="rounded mr-2" alt="..."> -->
      <strong class="mr-auto">New Message</strong>
      <!-- <small>11 mins ago</small> -->
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body" id="msg_new_toast">
      
    </div>
  </div>
</div>


<script src="{{asset('content')}}/assets/30603563/jquery.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.1/socket.io.js" integrity="sha512-oFOCo2/3DtjrJG4N27BjSLQWoiBv171sK6a+JiWjp/7agxC2nCUP358AqzxkBUb5jX8g6CYLPdSKQTbC0weCwA==" crossorigin="anonymous"></script>
<!-- <script src="filekit.js"></script> -->
<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">

<?php if(isset($_COOKIE['UserEmail'])) { ?>
<script>

//ajax chat messages with socket------------------------------------------------------------------------
var socket = io('wss://worldwidemedia.online', {transports: ['websocket']});
//socket.emit('join', {email: '<?php //echo Crypt::decryptString($_COOKIE['UserEmail']); ?>'});

socket.on("new_msg", function(data) {
	alert(data.msg)
    $('#liveToast').toast('show')
    $("#msg_new_toast").html(data.msg);

});

</script>
<?php } ?>

<script>
  $(function () {

    $('#notifbell').click(function(){
        $("#badge_notif").hide();

        $.ajax({
        url: "/updatenotif",
        type:"POST",
        data:{_token: '{{csrf_token()}}'},
        success:function(response){
        },
       });

    });



            $("#profile-dob").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yyyy-mm-dd',
                yearRange: '1950:2003'   //Current Year -10 to Current Year + 10.
            });


    // INITIALIZE DATEPICKER PLUGIN
    $('.datepicker').datepicker({
        clearBtn: true,
        format: "yyyy-mm-dd"
    });


    // FOR DEMO PURPOSE
    $('#reservationDate').on('change', function () {
        var pickedDate = $('input').val();
        $('#pickedDate').html(pickedDate);
    });
});
</script>

<script>
    function search() {
        
        window.ReactNativeWebView.postMessage('search')
      }

    function upgrade() {
        
        window.ReactNativeWebView.postMessage('upgrade')
      }

    function login() {
      
      window.ReactNativeWebView.postMessage('loggedin')
    }

    function profile() {
      
      window.ReactNativeWebView.postMessage('profile')
    }
</script>

</body>
</html>
