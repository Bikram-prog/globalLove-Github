@include('common/header') 
<style>
 @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap");
body {
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

@media only screen and (max-width: 734px) {
  .careers-title {
    margin-top: 25px  !important;
    font-size: 30px;
    line-height: 37px;
}

p.section-text.text-light{
  font-size: 26px !important;
}

.speech-bubble {
    font-size: 21PX !important;
}
}

p.section-text.text-light {
    line-height: 40px;
    padding: 25px 0px;
}
.user-list__text.bg-white {
    min-height: 65px;
    padding: 15px 20px !important;
}
.logo {
  margin-bottom: 43px;
  margin-top: 30px;
  margin-left: 20px;
}
.logo img {
  height: 200px;
  width: auto;
}
.hero {
  height: 100%;
  min-height: 100vh;
  width: 100%;

  background: url("./images/test_banner_3.jpg");
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
.hero > .hero__wrapper {
  height: 100%;
}
.hero__content {
  z-index: 1;
}
.hero-content__wrapper {
  padding: 0px 33px;
}

.hero__text_md {
  font-size: 29px;
  letter-spacing: 8.7px;
  color: white;
  margin-bottom: 30px;
  text-transform: uppercase;
}
.hero__text_lg {
  font-size: 50px;
  letter-spacing: -5.6px;
  font-weight: bold;
  color: white;
  margin-bottom: 20px;
}
.hero__text_rg {
  font-size: 18px;
  color: white;
  margin-bottom: 40px;
  line-height: 2.4;
}
.break-lg {
  display: none;
}
.hero__btn {
  padding: 19px 35.85px;
  justify-content: space-around;
  font: normal normal 600 14px/19px Poppins;
  color: #ffffff;
  text-transform: uppercase;
}
@media only screen and (min-width: 769px) {
  .break-lg {
    display: block;
  }
  .hero__banner {
    background: url("../images/banner@2x.png");
    background-size: cover;
    object-fit: cover;
    object-position: center;
    background-position: center;
  }
  .hero__text_md {
    margin-bottom: 41px;
  }
  .hero__text_lg {
    font: normal normal bold 100px/65px Poppins;
    letter-spacing: -7.4px;
    margin-bottom: 40px;
  }
  .hero__text_rg {
    margin-bottom: 50px;
  }
}
@media only screen and (min-width: 800px) {
  .logo {
    margin-bottom: 27px;
    margin-top: 40px;
    margin-left: 100px;
  }
  .logo img {
    width: 200px;
    width: auto;
  }
  .hero-content__wrapper {
    position: relative;
    padding-left: 100px;
    padding-top: 0px;
  }
  .hero__text_md {
    letter-spacing: 10.2px;
    font: normal normal 300 34px/76px Poppins;
    margin-bottom: 81px;
    color: white;
    font-weight: bold;
  }
  .hero__text_lg {
    font: normal normal bold 180px/65px Poppins;
    letter-spacing: -14.4px;
    margin-bottom: 80px;
    color: white;
  }
  .hero__text_rg {
    text-align: left;
    letter-spacing: 0px;
    font: normal normal normal 22px/43px Poppins;
    margin-bottom: 80px;
    color: white;
  }
}
@media only screen and (min-width: 800px) {
  .hero__text_lg {
    font: normal normal bold 150px/65px Poppins;
    letter-spacing: -14.4px;
    margin-bottom: 80px;
  }
}
/* Second Section */
.second-section {
  margin-bottom: 125px;
}

.second-section__text {
  /* font: normal normal bold 67px/73px Poppins; */
  font: bold 80px / 73px Poppins;
  letter-spacing: 0px;
  opacity: 1;
}
.second-section__text-secondary {
  color: #a7a7a7;
}
.second-section__text-danger {
  color: #ed2427;
}
.second-section__text-outline-secondary {
  -webkit-text-stroke-width: 1px;
  -webkit-text-stroke-color: #a7a7a7;
  color: transparent;
}
.second-section__text-outline-danger {
  -webkit-text-stroke-width: 1px;
  -webkit-text-stroke-color: red;
  color: transparent;
}
.second-section__wrapper {
  display: flex;
  justify-content: space-between;
  white-space: nowrap;
  grid-gap: 90px;
  overflow: hidden;
  height: 100px;
}
.second-section__wrapper div {
  word-wrap: normal;
}
.second-section__text:first-child {
  position: relative;
  left: -40px;
}
.second-section__text:last-child {
  position: relative;
  left: 18px;
}

/*Fifth Section */

.fifth-section {
  padding: 0px 20px;
  /* background: #eaedf2 0% 0% no-repeat padding-box; */
  opacity: 1;
}
.fifth-section__content {
  display: flex;
  /*align-items: center;*/
  flex-direction: column;
  justify-content: center;
}
.fifth-section__content p {
  /* text-align: left;
  font-size: 16px;
  color: #1c1c1c;
  opacity: 1; */
  font: normal normal normal 15px/30px Poppins;
}

.fifth-section__content-header {
  font: normal normal bold 32px/44px Poppins;
  letter-spacing: 0px;
  color: #1c1c1c;
  opacity: 1;
}
.fifth-section__wrapper {
  display: flex;
  align-items: center;
  flex-direction: column;
}
/* .fifth-section__wrapper div {
  height: 100%;
} */
.fifth-section__image {
  display: block;
  position: relative;
  padding-left: 108px;
  background-image: url("../images/rainbow-hand.png");
  width: 521px;

  border: 1px solid black;
  background-size: cover;
  object-fit: cover;
  background-repeat: no-repeat;
}

@media only screen and (min-width: 768px) {
  .fifth-section {
    padding: 60px 74px;
  }
}

/* Add */
.ads {
  padding: 70px 0px;
}

.seventh-section {
  padding: 36px 20px;
  background: #2e3136 0% 0% no-repeat padding-box;
  display: flex;
  flex-direction: column;
}
.seventh-section__wrapper {
  align-items: flex-start;
  padding: 0 80px;
}
.seventh-section__text {
  text-align: left;
  font: normal normal normal 18px/34px Poppins;
  letter-spacing: 0px;
  color: #ffffff;
  opacity: 1;
  margin-bottom: 15px;
}
.seventh-section__buttons {
}
.seventh-section__btn {
  text-decoration: none;
}
.seventh-section__btn img {
  margin-right: 10px;
  margin-bottom: 15px;
}
@media only screen and (min-width: 768px) {
  .seventh-section__btn img {
    margin-bottom: 0px;
  }
  .seventh-section__wrapper {
    align-items: center;
    padding: 0 80px;
  }

  .seventh-section__buttons {
    flex-direction: row;
    margin-left: auto;
  }
  .seventh-section__text {
    margin-bottom: 0px;
  }
  .seventh-section__btn {
    margin-right: 5px;
    margin-left: auto;
  }
  .seventh-section {
    padding: 36px 80px;
    flex-direction: row;
    align-items: center;
  }
}

.footer {
  padding: 18px 20px;
  display: flex;
  justify-content: space-between;
  background: #000000;
  color: white;
}

.footer__links {
  color: white;
  display: flex;
  margin-bottom: 20px;
}
.footer__copy-rights {
  text-align: left;
}
.footer__item {
  color: white;
  text-decoration: none;
}
.footer__item:hover {
  color: white;
}

@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) {
      /* For portrait layouts only */
	.fifth-section__wrapper{
	    flex-direction: column !important;
	}
	.fifth-section__content{
	    padding-left:0px !important;
	    align-items:center !important;
	    margin-top: 15px;
	}
}

@media only screen and (min-device-width: 595px) and (max-device-width: 767px) {
      /* For portrait layouts only */
	.user-list__item{
	    width:33.3% !important;
	}
}

@media only screen and (min-device-width: 409px) and (max-device-width: 595px) {
      /* For portrait layouts only */
	.user-list__item{
	    width:50% !important;
	}
}

@media only screen and (min-width: 768px) {
  /* Footer */
  .footer {
    padding: 18px 83px;
  }
  .footer__links {
    margin-bottom: 0px;
  }
  .footer__copy-rights {
    text-align: right;
  }
}
.free-registration__heading {
  text-align: center;
  font: normal normal bold 32px/60px Poppins;
  letter-spacing: 0px;
}
.free-registration__text {
  text-align: center;
  font: normal normal bold 21px/25px Poppins;
  letter-spacing: 0px;
  color: #1c1c1c;
}
.hero-btns {
  position: absolute;
  right: 0;
  overflow: hidden;
  top: 40px;
  height: 450px;
  width: 400px;
  z-index: 100000;
}

.hero-btn__side {
  transform: rotate(90deg);
  height: 100%;
  width: 100%;

  right: 26px;
  position: absolute;
}
.hero-btn_left {
  margin-left: auto;
  display: inline-block;
  height: auto;
  padding: 15px 20px;
  background: #ed2427 0% 0% no-repeat padding-box;
  font: normal normal medium 13px/27px Poppins;
  border-radius: 0 0 10px 10px;
  border: none;
  text-align: center;
  font: normal normal medium Poppins;
  font-size: 12px;
  letter-spacing: 0px;
  color: #ffffff;
  margin-right: 20px;
}
.hero-btn_right {
  display: inline-block;
  padding: 15px 20px;
  background: #1c1c1c 0% 0% no-repeat padding-box;
  font: normal normal medium 13px/27px Poppins;
  border-radius: 0 0 10px 10px;
  border: none;
  text-align: center;
  font: normal normal medium Poppins;
  font-size: 12px;
  letter-spacing: 0px;
  color: #ffffff;
}
.img-slider__content {
  display: grid;
  grid-template-columns: repeat(2, auto);
  grid-gap: 20px;
  margin-bottom: 30px;
}
.img-box {
  width: 100%;
  /* height: 240px; */
}
.section-content {
  margin-bottom: 60px;
  padding: 140px 10px;
}
.section-text {
  font: normal normal bold 50px/75px Poppins;
}
.bg-red {
  background: transparent linear-gradient(180deg, #e3000f 0%, #ac000b 100%) 0%
    0% no-repeat padding-box;
}
@media only screen and (min-width: 800px) {
  .free-registration__heading {
    /*font: normal normal bold 52px/60px Poppins;*/
	font: normal normal bold 45px/50px Poppins;
  }
  .fifth-section__wrapper {
    flex-direction: row;
  }
  .fifth-section__content {
    padding-left: 100px;
  }
  .section-text {
    font: normal normal bold 72px/75px Poppins;
  }
  .hero-btn_left {
    padding: 20px 40px;
    font: normal normal medium 18px/27px Poppins;
  }
  .hero-btn_right {
    padding: 20px 40px;
    font: normal normal medium 18px/27px Poppins;
  }
  .img-slider__content {
    grid-template-columns: repeat(2, 257px);
  }
  .img-box {
    width: 257px;
    /* height: 180px; */
  }
}

.hero-section {
  display: flex;
  padding-bottom: 40px;
  align-items: center;
  flex-wrap: wrap;
}
.hero-section__item {
  margin-left: 30px;
  /* margin-right: 30px; */
  margin-bottom: 20px;
}
.hero-section-item__text {
  text-align: center;
  font: normal normal normal 10px/15px Poppins;
  min-width: 143px;
  padding: 8px 20px;
  border-radius: 20px;
  position: relative;
  bottom: 10px;
}
.hero-section-item__img {
  margin: auto;
  border-radius: 50%;
  width: 135px;
  height: 135px;
  background: white;
  overflow: hidden;
  border: 4px solid white;
}

h1,h2 {
    font-size: 1.5rem;
}

.user-list {
  background: #eaedf2 0% 0% no-repeat padding-box;
  padding: 50px 30px;
}

.user-list__item {
  /* width: 200px; */
  text-align: center;
  display: block;
  box-sizing: border-box;
  margin-bottom: 25px;
}
.user-list__img {
  width: 100%;
  /* height: 215px; */
  overflow: hidden;
}
.user-list__text {
  padding: 15px 0px;
  box-sizing: border-box;
  font: normal normal normal 12px/15px Poppins;
}
@media only screen and (min-width: 800px) {

  .hero-section__item {
    margin-left: 0px;
  }
  .user-list {
    background: #eaedf2 0% 0% no-repeat padding-box;
    padding: 20px 200px;
  }
  .hero-section__item {
    margin-right: 10px;
  }
}
.speech-bubble {
  position: absolute;
    background: #ffffff;
    border-radius: .4em;
    font-size: 28px;
    font-weight: bold;
    width: 50%;
    text-align: center;
    padding: 20px 0px;
    clear:left
}

.speech-bubble:after {
	content: '';
	position: absolute;
	left: 0;
	top: 50%;
	width: 0;
	height: 0;
	border: 45px solid transparent;
	border-right-color: #ffffff;
	border-left: 0;
	border-bottom: 0;
	margin-top: -22.5px;
	margin-left: -45px;
}
</style>  
  


<!-- New Section -->
{{-- <div class="section-content bg-red">
  <div class="container mx-auto row">
    <div class="col-12 col-lg-7 pw-5">
      <p class="section-text text-light mb-5">Want to win Monthly Cash<br />and Prizes?</p>
      <a href="{{ url('signup') }}">
      <button class="btn btn-dark hero__btn rounded-0 border-rad mb-3">
        <img src="./images/Icon-gift.svg" alt="arrow" />
        <span class="ms-3">Click here to find out more</span>
      </button>
    </a>
    </div>
    <div class="col-12 col-lg-5 tex-center">
      <img src="./images/man-money-vector.svg" class="img-fluid" alt="Not Found">
    </div>
  </div>
</div> --}}
<style>
.marquee-container{
  padding:3px;
  width:100%;
  overflow:hidden;
}
.text-container{
  float:left;
  width:auto;
  
}

.marquee{
width:100%;
position:relative;
animation: marquee 5s linear infinite;
padding:3px;
}

.text-m{
width:100%;
justify-content: space-between;
    white-space: nowrap;
    grid-gap: 90px;
display:flex;
}

.marquee-txt-danger{
  font: bold 80px / 73px Poppins;
    letter-spacing: 0px;
    opacity: 1;
    color:#ed2427
}

.marquee-txt-secondary{
  font: bold 80px / 73px Poppins;
    letter-spacing: 0px;
    opacity: 1;
    color:#a7a7a7
}

.marquee-txt-danger-outline{
  font: bold 80px / 73px Poppins;
    letter-spacing: 0px;
    opacity: 1;
    -webkit-text-stroke-width: 1px;
    -webkit-text-stroke-color: red;
    color: transparent;
}

.marquee-txt-secondary-outline{
  font: bold 80px / 73px Poppins;
    letter-spacing: 0px;
    opacity: 1;
    -webkit-text-stroke-width: 1px;
    -webkit-text-stroke-color: #a7a7a7;
    color: transparent;
}

/* Make it move */
@keyframes marquee {
  from { transform: translateX(0); }
  to { transform: translateX(-50%); }
}

</style>

<!-- <h1 style="font-weight: 600;color: #dc3545!important;">What Is GlobalLove</h1> -->
<div class="fifth-section">
    
    <div class="fifth-section__wrapper m-0 items-center">
      <div class=" m-0 p-0">
        <div class="img-slider__content m-0">
          <div class="img-box">
            <img src="./images/Img01.jpg" class="img-fluid" alt="Dating Sites for Transgender Online">
          </div>
          <div class="img-box">
            <img src="./images/Img02.jpg" class="img-fluid" alt="Online Matchmaking Sites for Single">
          </div><div class="img-box">
            <img src="./images/Img03.jpg" class="img-fluid" alt="Hot Girl Dating Sites Online Free">
          </div>
          <div class="img-box">
            <img src="./images/Img04.jpg" class="img-fluid" alt="Free Online Chatting Dating Websites">
          </div>
        </div>

        <div id="cst_cont" style="padding: 30px 0 0 0;">
        <p>Establish meaningful connections of sparkling love, inspiring people to share their true feelings enthusiastically with the Best Dating Website Australia. Find the best love awakening the soul, planting the fire between two hearts that delivers peace to your minds as our site is totally free to join. We are one of the Best Dating Apps In Sydney featuring; Gay Match Maker, Lesbian Dating Apps Free, Mature Singles Dating Site helping share the real you.</p>
        <p>Get millions of people at your fingertips with the Best Australian Online Dating Site Filipino. Spark meaningful conversation with them in order to get into true relationships. Global love, one of the International Dating Sites, <a href="https://globallove.online/blog/2022/02/how-to-meet-women-online-the-best-dating-site-in-the-philippines/">Philippines</a>, is the most diverse app where adults of all kinds can make connections, memories, and perfect love. Find your soulful love here with us.</p>
        </div>

      </div>
      <div class="fifth-section__content">
      {{-- <h1>Welcome to Online Free Dating Website</h1> --}}
      <h1 class="text-left">Looking for true love online Free</h1>
        <p class="mb-4 mt-3">
          No doubt, finding true love has never been easy and everyone is seeking for a genuine partner to spend quality moments of life. If you are looking for something that can help you find and Meet New People Online for Free, then you have come to the right place. This is the <a href="https://globallove.online/blog/2022/02/welcome-to-globallove/">Best Online Dating Site</a>, where you can meet Cute Girl Online Free and single guys. It is quite easy to use this site and make the most of it. If you desperately want to dare and meet Beautiful Women Online Free, then this platform will never disappoint you. It is all about connecting you with hot girls. 

        </p>
        <h2>SPICY Lesbian Dating Site Online:</h2>
        <p class="mb-4 mt-3">
        
          It is hard for gays and lesbians to find people who love them, but now things have become quite easier. There is nothing to shy about. You can find people of same interest on this platform. You just need to spend some time to explore this wonderful <a href="https://globallove.online/blog/2022/02/best-free-dating-website-in-australia-for-singles-gay-lesbian-transgender/">Free Internet Dating Site</a> Online.

        </p>

        <h2>Dating Sites for Transgender Online:
        </h2>
        <p class="mb-4 mt-3">
        
          Everyone has right to fall in love, then why not Transgenders. This is a Quality Dating for Transgender Women Online, you can make the most of it. Whether it is about checking relevant profiles or connecting with them, you can find this site easy to use. 


        </p>

        <h2>Mature Dating for Over 40 Online:

        </h2>
        <p class="mb-4 mt-3">
        
          You can find love at any stage of life, whether you are young or old, you are allowed to love somebody. This is one of the best Dating Sites for Over 50. You can find people looking for the true love here. This is a mature site for mature people who are seriously looking for the relationship and true love. These <a href="https://globallove.online/blog/2022/02/1-global-love-leads-the-online-chat-security/">Free Online Chatting</a> Dating Websites can really be great help for such people.



        </p>




      </div>

    </div>
  </div>

    

    


    





   @include('common/footer') 

   <!-- <script>
    $("#advertisement001").modal("show");
    
    function close_modal() {
      $("#advertisement001").modal("hide");
    }
    </script> -->