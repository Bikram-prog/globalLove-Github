@include('common/header') 
    <!-- HERO Section Start -->
    <div class="hero">
      <div class="hero__wrapper row m-0">
        <div class="hero__content col-12 col-lg-6 p-0 m-0">
          <div class="logo">
            <a href="#" 
              ><img
                src="{{ asset('images/global-love-logo@2x.png') }}"
                class="img-fluid"
            /></a>
          </div>

            <div class="hero-content__wrapper">
              <p class="hero__text_md">WELCOME TO</p>
              <h1 class="hero__text_lg align-self-center">
                Global<span class="text-danger">Love</span>
              </h1>
              <p class="hero__text_rg">
                The world's first and only true
                <strong>Multi Everything</strong><br />
                dating website. Be a GlobalLove member and <br>find your love.

              </p>
              <div class="hero-btn__wrapper">
                <a href="{{ url('signup-for-free') }}"><button class="btn btn-danger hero__btn rounded-0 me-2 mb-3">
                  <span class="me-3">ALL FOR FREE</span>
                  <img src="{{ asset('images/icon_arrow.svg') }}" alt="arrow" />
                </button></a>
                <a href="{{ url('login') }}"><button class="btn btn-dark hero__btn rounded-0 border-rad mb-3">
                  <span class="me-3">LOGIN </span
                  ><img src="{{ asset('images/icon_arrow.svg') }}" alt="arrow" />
                </button></a>
              </div>


              <!-- <a href="{{ url('signup') }}"><img src="{{ asset('images/google ads.png') }}" class="img-fluid mt-3 mb-3" alt="" /></a> -->
            </div>
          </div>
          <div class="bg-slider col-12 col-lg-6 p-0 m-0">
          </div>
        </div>
        
      </div>
    </div>

    <!-- HERO Section End -->

    <div class="container-fluid mb-3" style="background-color:#95afc0;">
  <div class="row " >
    <div class="col-lg-4" ></div>
    <div class="col-lg-4" >
      <p class="careers-title mt-2">Want to win cash prizes?</p>
      <hr class="border-red">
      <a href="{{ url('signup-for-free') }}" style="text-decoration:none"><p style="font-size: 23px;
    margin: 0px;
    color: #dc3545!important;"><i class="fas fa-gift" style="color: red;"></i> Click here to find out more</p></a>
    </div>
    <div class="col-lg-4 ">
    <img style="height: 400px;width: 400px;" class="img-fluid" src="{{ asset('images/career-banner-vector.svg') }}">
    </div>
  </div>
</div>
    
    <!-- 2nd Section Start -->
    <div class="second-section">
      <div class="second-section__wrapper">
        <div class="second-section__text second-section__text-danger">Multi Gender</div>
        <div class="second-section__text second-section__text-secondary">Straight</div>
        <div class="second-section__text second-section__text-danger">Gay</div>
        <div class="second-section__text second-section__text-secondary">Transgender</div>
      </div>
      <div class="second-section__wrapper">
        <div class="second-section__text second-section__text-outline-danger">Multi Gender</div>
        <div class="second-section__text second-section__text-outline-secondary">Straight</div>
        <div class="second-section__text second-section__text-outline-danger">Gay</div>
        <div class="second-section__text second-section__text-outline-secondary">Transgender</div>
      </div>
      <!-- <div class="row m-0">
        <div class="col-12 col-lg-12">
          
          <div class="row">
            @foreach($newmembers as $new)
            @php
            $name= explode(' ',$new->name)
            @endphp
            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ $new->prfl_photo_path }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">{{ $name[0] }},{{ $new->age }}</p>
              <p class="card-title" style="color: #dc3545!important;">{{ $new->country }}</p>
            </div>
            </div>
            </div>
            
            @endforeach
          </div>
        </div>
        
      </div> -->
    </div>
    <!-- 2nd Section End -->

    <!-- 3rd Section Start -->
    <div class="third-section">
      <div class="third-section__wrapper row m-0">
        <div class="third-section__image col-12 col-lg-5 mb-5">
          <img src="{{ asset('images/image_02.png') }}" class="img-fluid" alt="" />
          <!-- <div class="row mt-2">
            @foreach($newmembers as $new)
            @php
            $name= explode(' ',$new->name)
            @endphp
            <div class="col-md-4 mb-0 mr-0">
              <div class="card" style="width: 10rem;">
              <img src="{{ $new->prfl_photo_path }}" class="img-fluid" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">{{ $name[0] }},{{ $new->age }}</p>
              <p class="card-title" style="color: #dc3545!important;">{{ $new->country }}</p>
            </div>
            </div>
            </div>
            
            @endforeach
          </div> -->
        </div>
        <div class="third-section__content col-12 col-lg-7">
          <p class="mb-5">
            <strong>GlobalLove</strong> is the worlds first and only true Multi
            Gender, International dating website where you only pay one fee to
            access everything. GlobalLove represents everybody and every age,
            in every country. Whether your: Male (straight), Female (straight),
            Male (Gay), Female (Gay), Transgender (pre-op), Transgender
            (post-op) Or anything else we missed, this is for you. GlobalLove
            members need to be verified before they can interact, so we are
            secure, and want to hear from you if you have any concerns.
          </p>
          <p>
            Whether your: Male (straight), Female (straight), Male (Gay), Female
            (Gay), Transgender (pre-op), Transgender (post-op) Or anything else
            we missed, this is for you. GlobalLove members need to be verified
            before they can interact, so we are secure, and want to hear from
            you if you have any concerns.
          </p>
        </div>
      </div>
      <div class="row m-0">
        <div class="col-12 col-lg-12">
          
          <div class="row">
            
            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="https://www.globallove.online/images/606992502d402.png" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Mylene,30</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-min-an-977402.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Sammuel,22</p>
              <p class="card-title" style="color: #dc3545!important;">Australia</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-cesar-alcantar-3413137.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Jessa,23</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-ash-valiente-3533228.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Nicole,28</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-ba-phi-1116380.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Jasmine,30</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-barcelosfotos-3544804.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Rosa,22</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-ffa-2839285.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Hazel,36</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-min-an-758864.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Stephen,28</p>
              <p class="card-title" style="color: #dc3545!important;">Australia</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-wallace-chuck-2659177.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Sam,30</p>
              <p class="card-title" style="color: #dc3545!important;">Australia</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-gabb-tapique-3763944.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Gloria,22</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-tuấn-kiệt-jr-3262878.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Jennifer,29</p>
              <p class="card-title" style="color: #dc3545!important;">Australia</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-gabb-tapique-3763948.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Maria,19</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-gabriela-pereira-1844127.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Ophelia,24</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-hải-nguyễn-3616933.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Rosarrio,39</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-ralph-rabago-3336791.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Biky,26</p>
              <p class="card-title" style="color: #dc3545!important;">Australia</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-heitor-verdi-1829006.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Victoria,26</p>
              <p class="card-title" style="color: #dc3545!important;">Australia</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-is-kanda-3412801.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Divina,22</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-john-rae-cayabyab-3164105.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Noemi,40</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-pixabay-220453.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Peter,32</p>
              <p class="card-title" style="color: #dc3545!important;">Australia</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-christian-fridell-3417403.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Gary,58</p>
              <p class="card-title" style="color: #dc3545!important;">Australia</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-marcelo-chagas-3555937.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Nora,25</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-john-rae-cayabyab-3341030.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Louise,22</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-lê-minh-3054692.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Wendy,26</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-vinicius-altava-3356130.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Sofia,19</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>
            <!--  -->

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-arliane-vargas-2970109.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Sarah,24</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-bran-sodre-1852289.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Erika,29</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-gustavo-almeida-3519940.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Paula,26</p>
              <p class="card-title" style="color: #dc3545!important;">Australia</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-chloe-1043474.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">David,34</p>
              <p class="card-title" style="color: #dc3545!important;">Australia</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-gustavo-almeida-3519940.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Mica,22</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-wellington-cunha-3186506.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Lea,24</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-nothing-ahead-3053485.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Julia,32</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-chloe-1043473.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Robert,28</p>
              <p class="card-title" style="color: #dc3545!important;">Australia</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-alireza-zare-3911368.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Darrel,30</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-david-gomes-4048497.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Sammy,22</p>
              <p class="card-title" style="color: #dc3545!important;">Australia</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-john-rae-cayabyab-3341027.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Thea,26</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>

            <div class="col-md-1 mb-2">
              <div class="card" style="width: 10rem;">
              <img src="{{ asset('images/home_profile/pexels-jeremyhann-3052276.jpg') }}" class="card-img-top" style="filter: blur(8px);height: 100%;">
              <div class="card-body">
              <p class="card-title">Nathalie,19</p>
              <p class="card-title" style="color: #dc3545!important;">Phillipines</p>
            </div>
            </div>
            </div>
            
            
          </div>
        </div>
        
      </div>
    </div>
    <!-- 3rd Section End -->

    

    <!-- Card Section Start -->
    <!--div class="fourth-section">
      <div class="row m-0 p-0">
        <div class="col-12 offset-md-2 col-md-12 col-lg-4 h-100">
          <div class="fourth-section__card h-100">
            <p class="fourth-section__header">{{ $users['totalusers'] }}</p>
            <p class="fourth-section__text">Have Already<br /> Registered</p>
            <p class="fourth-section__text-sm">Free Registration!</p>
            <div class="text-end mt-auto">
              <img
                src="{{ asset('images/icon_users.svg') }}"
                alt="person image"
                className="ml-auto"
              />
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 h-100">
          <div class="fourth-section__card fourth-section__card-center h-100">
            <p class="fourth-section__header">{{ $users['totaluserschat'] }}</p>
            <p class="fourth-section__text">Messages Sent <br />Weekly</p>
            <p class="fourth-section__text-sm">Free Registration!</p>
            <div class="text-end mt-auto">
              <img
                src="{{ asset('images/icons_messages.svg') }}"
                alt="person image"
                className="ml-auto"
              />
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 h-100">
          <div class="fourth-section__card h-100">
            <p class="fourth-section__header">{{ $users['totaluserslike'] }}</p>
            <p class="fourth-section__text">Have Found <br />Love</p>
            <p class="fourth-section__text-sm">Free Registration!</p>
            <div class="text-end mt-auto">
              <img
                src="{{ asset('images/icon_heart.svg') }}"
                alt="person image"
                className="ml-auto"
              />
            </div>
          </div>
        </div>
      </div>
    </div-->

  <!-- <div class="container-fluid testimonial-wrap mb-5">
  <h1>Testimonials</h1>
  <div class="row">
    <div class="col-md-12">
      <div class="testimonial">


      @foreach($testimonial as $t)
      
      <div class="testimonial-items">{{$t->testimonial}}
      <div class="row mt-3">
              <div class="col-lg-6"> <img src="{{$t->picture}}"
                        alt="person image"
                        className="ml-auto" style="height:90px;width:90px"
                      />
                </div>   
                <div class="col-lg-6 mt-4">
                <p class="name">{{$t->name}}</p>
                <p class="address">{{$t->address}}</p>
                </div>   
            </div>    
      </div>
      @endforeach  
     

    </div>
    </div>
  </div>
</div> -->

    <!-- Card Section End -->

    <!-- 5th Section -->
    <div class="fifth-section">
      <div>
        <h2 class="fith-section__header">
          <span class="text-danger">FREE REGISTRATION</span>
          <br />
          <span class="text-dark">Full Access - No Restrictions</span>   <br />
          <a href="{{ url('signup-for-free') }}" style="text-decoration:none"><p style="font-size: 23px;
    margin: 0px;
    color: #dc3545!important;">Click here to find out more</p></a>
          <p style="font-size: 21px;
    color: #3597dc!important;
    font-style: italic;
    font-weight: 400;
">No gimmicks or catches</p>
        </h2>
        <h2 class="fith-section__header">
          <span class="text-danger">Protecting Women Online</span>
          <br />
          <a href="{{ url('secure') }}" style="text-decoration:none"><p style="font-size: 23px;
    margin: 0px;
    ">Click here to learn more</p></a>
          
        </h2>
      </div>
    
      <div class="fifth-section__wrapper row m-5">
        <div class="fifth-section__content col-12 col-md-12 col-lg-6 m-0 p-0">
          <!-- <h5 class="fifth-section__content-header mb-5">YES YOUR RIGHT</h5>
          <p class="mb-4">
          We are new, and yes, not much happening on our site right now, that’s why we need your support to make this biggest, and best site in the world.
          </p>
          <p class="mb-4">
          GlobalLove doesn’t expect you to pay the $10 a month (that’s right, only $10 a month gives you full access to every gender, and every country, no add-ons)
          </p>
          <p class="mb-4">
          So from now, GlobalLove will be giving Premium Memberships to everyone that signs up. That's right everyone.<br>(This is for a limited time, and the condition is you must upgrade with a credit card, $1 will be deducted from your card, and will be reimbursed to you on your first monthly subscription of $10 when that becomes due, don’t worry, you will receive 14 days notice when this will happen, and only of course if you agree)
          </p>
          <p class="mb-4">
            So if you serious about meeting your GlobalLove, we are serious in helping you.
          </p>
          <p class="mb-5" style="font-weight:bold">
           GLobalLove is also women's friendly site, <a href="{{ url('secure') }}" style="text-decoration:none;color: #dc3545!important;">CLICK HERE</a> to find our what further steps we take to protect you online.
          </p>

          <a href="{{ url('signup') }}"><button class="btn btn-danger hero__btn rounded-0 me-2 mb-5">
            <span class="me-3 text-capitalize">Be a premium member</span>
            <img src="{{ asset('images/icon_arrow.svg') }}" alt="arrow" />
          </button></a> -->
          <p class="mb-5">
            <strong>GlobalLove</strong> is a subsidiary of
            <a class="text-dark text-decoration-none" href="https://wwwmedia.world"
              ><strong>wwwmedia.world</strong></a
            >
          </p>
          <div class="subsidiary">
            <img
              src="{{ asset('images/global-love-logo.png') }}"
              class="mb-3 subsidiary-gl"
              alt=""
            />
            <a href="http://wwwmedia.world/" style="text-decoration: none;">
            <img src="{{ asset('images/www-media-world-logo.png') }}" alt="" class="wwwmedia-logo"/></a>
          </div>
        </div>
        <div class="col-md-12 col-lg-6 m-0 p-0 text-end">
          <!-- <img class="img-fluid" src="{{ asset('images/rainbow-hand.png') }}" /> -->
        </div>
      </div>
    </div>
    <!-- 5th Section -->
    <!-- 6th Section -->
    <!--div class="ads">
      <div class="mx-auto container text-center">
        <img src="{{ asset('images/google ads.png') }}" class="img-fluid" alt="" />
      </div>
    </div-->

   @include('common/footer') 

