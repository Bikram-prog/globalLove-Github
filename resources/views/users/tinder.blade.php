@include('header')

<div class="container h-100">
    <div class="row mt-4 justify-content-center align-items-center">
    
            @foreach ($query as $q)

            <?php 
            // premium users check
            $today = date('Y-m-d H:i:s');
            $premium_user = DB::Select("select * from payment_transactions where pt_u_id = '".$q->id."' and pt_end_date > '".$today."'");
            if(count($premium_user) > 0) {
                $premium = "Premium";
            } else {
                $premium = "";
            }
            ?>

            <div class="card" style="width: 18rem;">
                <img src="{{ $q->prfl_photo_path }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="text-success" style="font-weight: bold;
                    font-size: 18px;
                    margin-bottom: 4px;">{{ $premium }}</p>
                  <h5 class="card-title" style="font-size: 26px;">{{ $q->name }}</h5>
                  <p class="card-text" style="margin-top: -14px;">Looking For: <span style="font-weight: 700;">{{ $q->match_seeking }}</span></p>
                  <p style="margin-top: -14px; color: #888;">{{ $q->s_city }}, {{ $q->country }}</p>
                  <p style="margin-top: -14px; color: #888;">{{ $q->age }}, {{ $q->sex }}</p>
                  <p spellcheck="margin-top: -12px; "><a style="font-weight: bold;" class="" href="/userprofile/{{ $q->id }}">View profile</a></p>
                  
                </div>
                <div class="card-footer">
                    <a href="{{ route('tinder', [$next]) }}" class="btn btn-warning"> Skip <i class="far fa-times-circle"></i></a>
                    <a href="{{ route('tinder', [$next]) }}" class="btn btn-success float-right"> Next <i class="fas fa-step-forward"></i></a>
              </div>

        </div>
        @endforeach
    </div>
</div>
@include('footer')