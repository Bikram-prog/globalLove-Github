@if(Request::path() != 'signup' and Request::path() != 'agentsignup' and Request::path() != 'forgotpassword' and Request::path() != 'resetpassword')


    <div class="container-fluid text-center mt-4" style="position: fixed;
    left: 0;
    bottom: 0;background-color: #0d6efd !important;padding: 10px;">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <a href="https://thedailyplanet.app/" data-toggle="tooltip" data-placement="top" title="The Daily Planet" target="_blank"><img style="width: 50px;height: 40px;border-radius: 100%;" class="img-fluid" src="{{ asset('images/dailyplanet.webp') }}" alt="Daily Planet"></a>
    
                <a href="https://globallove.online/" style="margin-left: 20px;" data-toggle="tooltip" data-placement="top" title="Date Free (Formally GlobalLove)" target="_blank"><img style="width: 45px;height: 45px;border-radius: 100%;" class="img-fluid" src="{{ asset('images/datefreelogo.webp') }}" alt="Date Free Love"></a>
    
                <a href="https://todosmarter.com/" style="margin-left: 20px;" data-toggle="tooltip" data-placement="top" title="To Do Smarter (Project Management)"><img style="width: 45px;height: 45px;border-radius: 100%;" class="img-fluid" src="{{ asset('images/todosmarterlogo.webp') }}" alt="ToDoSmarter"></a>
    
                <a href="https://bescrow.world/" style="margin-left: 20px;" data-toggle="tooltip" data-placement="top" title="Buy & Sell (Only available in Australia & Phillipines)" target="_blank"><img style="width: 45px;height: 45px;border-radius: 100%;" class="img-fluid" src="{{ asset('images/bescrow.webp') }}" alt="Bescrow"></a>
    
                <a href="https://globallove.online/group-chat-terms" style="margin-left: 20px;" data-toggle="tooltip" data-placement="top" title="Online group chat for over 18 years" target="_blank"><img style="width: 45px;height: 45px;border-radius: 100%;" class="img-fluid" src="{{ asset('images/groupchat.webp') }}" alt="Dating group chat free"></a>
    
                  <a style="text-decoration: none; color: #fff; margin-left: 20px;font-weight:700;" href="/blog">Blogs</a>
                  <a style="text-decoration: none; color: #fff; margin-left: 20px;font-weight:700;" href="/womendating">Women Dating</a>
                  <a style="text-decoration: none; color: #fff; margin-left: 20px;font-weight:700;" href="/terms">Terms & Conditions</a>
                  <a style="text-decoration: none; color: #fff; margin-left: 20px;font-weight:700;" href="/privacy">Privacy</a>
                  <a style="text-decoration: none; color: #fff; margin-left: 20px;font-weight:700;" href="/cookies">Cookies</a>
                  <a style="text-decoration: none; color: #fff; margin-left: 20px;font-weight:700;" onclick="showCntct()" href="javascript:void(0)" data-toggle="modal" data-target="#contact_modal">Contact Us</a>
    
                  <a onclick="showSg()" href="javascript:void(0)" data-toggle="modal" data-target="#suggestion_modal" style="margin-left: 20px;" data-toggle="tooltip" data-placement="top" title="Suggestion Box"><img style="width: 45px;height: 45px;border-radius: 100%;" class="img-fluid" src="{{ asset('images/suggestion-box.webp') }}" alt="Suggestion Box"></a>
              </div>
          </div>
      </div>
      </div>
@endif

    {{-- <script type="text/javascript" defer src="//code.jquery.com/jquery-1.11.0.min.js"></script> --}}
     <script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
{{-- <script type="text/javascript" defer src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> --}}
    <script type="text/javascript" defer src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


  
{{-- <script defer src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.1/socket.io.js" integrity="sha512-oFOCo2/3DtjrJG4N27BjSLQWoiBv171sK6a+JiWjp/7agxC2nCUP358AqzxkBUb5jX8g6CYLPdSKQTbC0weCwA==" crossorigin="anonymous"></script> --}}

{{-- <script defer src="{{ asset('js/jquery-bg-slideshow-min.js') }}"></script> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/csshake/1.5.3/csshake.min.css" integrity="sha512-RliK2gk03WxUELn57ddjWLhEfhUiOZ85VvWLImFy8A7FOPMkF4Z9YGQ3VKX5jpwkEerAL6I0nC+JNeCPrxWBTw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

<!-- <script src="filekit.js"></script> -->

<?php if(isset($_COOKIE['UserEmail'])) { ?>
<script>

//ajax chat messages with socket------------------------------------------------------------------------
var socket = io('https://yourdeveloper.world', {transports: ['websocket']});
//socket.emit('join', {email: '<?php //echo Crypt::decryptString($_COOKIE['UserEmail']); ?>'});

socket.on("new_msg", function(data) {
	alert(data.msg)
    $('#liveToast').toast('show')
    $("#msg_new_toast").html(data.msg);

});

</script>
<?php } ?>


<script type="text/javascript">

$(function() {
		$(".bg-slider").bgSlideShow({
			current : 1,
			randomize : false,
			images : [ "https://globallove.online/images/set-a.jpg", "https://globallove.online/images/set-b.jpg", "https://globallove.online/images/set-c.jpg", "https://globallove.online/images/set-d.jpg" ],
			initialBackground : 'https://globallove.online/images/set-a.jpg',
			transitionDelay:1500
		});
	});

  $(function(){
    $ds = $('.fadein div');

    var count = 1;

    setInterval(function(){
        if($ds.eq(0).hasClass("show")){
          $ds.eq(0).animate({opacity: 0}, 1000).removeClass("show").addClass("hide");
          $ds.eq(1).animate({opacity: 1}, 1000).removeClass("hide").addClass("show");
          $ds.eq(2).animate({opacity: 0}, 1000).removeClass("show").addClass("hide");
          return false;
        }
        if($ds.eq(1).hasClass("show")){
          $ds.eq(0).animate({opacity: 0}, 1000).removeClass("show").addClass("hide");
          $ds.eq(1).animate({opacity: 0}, 1000).removeClass("show").addClass("hide");
          $ds.eq(2).animate({opacity: 1}, 1000).removeClass("hide").addClass("show");
          return false;
        }
        if($ds.eq(2).hasClass("show")){
          $ds.eq(0).animate({opacity: 1}, 1000).removeClass("hide").addClass("show");
          $ds.eq(1).animate({opacity: 0}, 1000).removeClass("show").addClass("hide");
          $ds.eq(2).animate({opacity: 0}, 1000).removeClass("show").addClass("hide");
          return false;

        }
    }, 5000);
});

$("#profile-dob").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd/mm/yy',
                maxDate: '-18y',
                yearRange: '1950:2003'   //Current Year -10 to Current Year + 10.
            });

$('.testimonial').slick({
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 3,
  arrows: true,
  mobileFirst:true,//add this one
  prevArrow:"<img src='images/icon_arrow_left.svg' class='arrow-left'>",
  nextArrow:"<img src='images/icon_arrow_right.svg' class='arrow-right'>",
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow:3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 320,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
		</script>	

<!------------------------------------ chatbot------------------------------------------------>

<script defer src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>


<script>
    var botmanWidget = {
    aboutText: 'Powered by WWWMEDIA.WORLD',
    title: 'GlobalBot',
    introMessage: 'Hello, how are you, I am your GlobalBot friend, and I am here to assist you. I will ask you a series of questions, please respond with <span style="font-weight: bold;">1/2/3/4/5 Or 6</span>. <br /> <span style="font-size: 18px; font-weight: bold;">1</span>. Would you like to sign up, this will only take a few minutes. <br /> <span style="font-size: 18px; font-weight: bold;">2</span>. Would you like to download our app’s for your mobile? <br /> <span style="font-size: 18px; font-weight: bold;">3</span>. Would you like to know a bit more about GlobalLove? <br /><span style="font-size: 18px; font-weight: bold;">4</span>. Would you like more information on having a career with GlobalLove? <br /> <span style="font-size: 18px; font-weight: bold;">5</span>. What about Women Protection? <br /> <span style="font-size: 18px; font-weight: bold;">6</span>. Did you forget your password?',
    mainColor: '#F15052',
    bubbleAvatarUrl: '{{ asset('images/robot.png') }}',
    userId: 123
};




</script>

<style type="text/css">

.desktop-closed-message-avatar {

}

#botmanWidgetRoot > div {
  /* width: 310px !important;
  height: 500px !important; */
  min-width: 100px !important;
  min-height: 110px !important;
  z-index: 5000 !important;
  
}

  #botmanWidgetRoot > div > div > div {
    color: #fff !important;
    font-weight: 700 !important;
  }

  .desktop-closed-message-avatar {
    background-color: #F15052 !important;
    position: fixed !important;
    bottom: 120px !important;
    top: inherit !important;
  }


</style>

<script>
  function urlify() {
    console.log('hi')
    var htmll = $(".msg div p").html();
    console.log(htmll);
  var urlRegex = /(https?:\/\/[^\s]+)/g;
  return htmll.replace(urlRegex, function(url) {
    return '<a href="' + url + '">' + url + '</a>';
  })
  // or alternatively
  // return text.replace(urlRegex, '<a href="$1">$1</a>')
}

// setInterval(function(){
//     urlify()
// }, 1000)

</script>


<script>
function xyz() {
  //document.getElementsByClassName("desktop-closed-message-avatar").click();
  console.log('lol')
}

var url = window.location.href;
if(url == 'https://www.globallove.online/') {
  setTimeout(function(){
  $(".desktop-closed-message-avatar").trigger("click");
  //$(".desktop-closed-message-avatar").addClass('shake-chunk shake-constant shake-constant--hover');
},1000);
} else {
  setTimeout(function(){
  $(".desktop-closed-message-avatar").trigger("click");
  //$(".desktop-closed-message-avatar").addClass('shake-opacity shake-constant shake-constant--hover');
},1000);
}



setTimeout(function(){
  //$(".desktop-closed-message-avatar").removeClass('shake-opacity shake-constant shake-constant--hover');
  
},8000);

</script>

<!-- <div class="open_bot_txt" style="
    position: fixed;
    bottom: 170px;
    right: 0px;
    width: 140px;
    height: 60px;
    z-index: 1000;
    background: #FF9600;
    color: #fff;
    padding: 5px;
    border-radius: 10px;
    transform: rotate(3deg);
    
">
  <p>
  Please open me to help you
  </p>
</div> -->

<!-- Modal suggestion over popup-->
<div class="modal fade" id="suggestion_modal" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
      </div>
      <div class="modal-body">
        You must be signed up to use these facilities
      </div>
      <div class="modal-footer">
        <button type="button" onclick="hideModalSg();" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Contact us over popup-->
<div class="modal fade" id="contact_modal" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
      </div>
      <div class="modal-body">
        You must be signed up to use these facilities
      </div>
      <div class="modal-footer">
        <button type="button" onclick="hideModalCntct();" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>





<!-- Modal 18 years over popup-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Welcome to GlobalLove, please confirm you are over the age of 18
      </div>
      <div class="modal-footer">
        <button type="button" onclick="hideModal();" class="btn btn-secondary" data-bs-dismiss="modal">Yes</button>
        <button type="button" onclick="close_window();return false;" class="btn btn-primary">No</button>
      </div>
    </div>
  </div>
</div>


<!-- <script>
function close_window() {
  alert("Hello, So you're not 18 yet, Please close the browser or the app.")
}

var eighteen = localStorage.getItem("eighteen");
if(eighteen == '18') {
  //-do noithing
} else {
  $(window).on('load', function() {
    $('#staticBackdrop').modal('show');
  });
}


function hideModal() {
  $('#staticBackdrop').modal('hide');
  localStorage.setItem('eighteen', "18");
}

</script> -->

<script>

function showCntct() {
  $('#contact_modal').modal('show');
}

  function hideModalCntct() {
  $('#contact_modal').modal('hide');
}

function showSg() {
  $('#suggestion_modal').modal('show');
}

  function hideModalSg() {
  $('#suggestion_modal').modal('hide');
}
</script>

  </body>
</html>