@include('admin_header')

<style type="text/css">
    .date-img {
        width: 300px;
    height: 300px;
    object-fit: cover;
    }
    td:first-child {
        font-weight: 700;
    }


@media only screen 
and (min-device-width : 320px) 
and (max-device-width : 480px) {

.approve-btn {

margin-top: 10px;
}
}
</style>
<?php
    //dd(strtotime($data[0]->dob));
    $from = new DateTime(date("Y-m-d",strtotime(str_replace('/', '-',$data[0]->dob))));      
    $to   = new DateTime('today');
    $age =  $from->diff($to)->y;


?>

<div class="container">
    <div class="row" style="margin-top: 15px;">
        
        <div class="col-md-4">
            <img class="card-img-top img-thumbnail date-img" id="main_pic" src="<?php echo $data[0]->prfl_photo_path; ?>">
            
      </div>

        <div class="col-md-6">
            <h1> {{ $data[0]->name }} </h1>
            @if(count($heading) > 0  and isset($heading) )
                @if($heading[0]->status == 1)
                    <p style="font-weight: 500;color: #444;">{{ $data[0]->heading }}</p>
                @else
                     <p style="font-weight: 500;color: #444;">Pending for approval</p>
                @endif        
            @endif    
            <p style="font-weight: 500;color: #444;">{{ $age }} • {{ $data[0]->country }}</p>
            <p style="font-weight: 500;color: #444;">{{ $data[0]->sex }} {{ $data[0]->relationship }}</p>
            @if($data[0]->match_seeking != '')
            <p style="font-weight: 500;color: #444;">Looking for: {{ $data[0]->match_seeking }} , {{ $data[0]->match_min_age }} - {{ $data[0]->match_max_age }}  </p>
            @endif
            <p style="font-weight: 500;color: #444;">Report/Comments:</p>
            <p style="font-weight: 500;color: #444;"><textarea style="width:100%;height:100px">{{ $data[0]->r_comments }} </textarea></p>

           
            <div class="row">
                <div class="col-md-6">
                    
                    </div>
                <div class="col-md-6">
                    
                </div>
            </div>

            <div class="row mt-4">
              <div class="col-md-4"></div>
              <div class="col-md-4 text-center">
                <div>
                    
                </div>
              </div>
              <div class="col-md-4"></div>
            </div>

            
        </div>
        <div class="col-md-2">
            
                         
            <div class="like-toggle align-self-center ml-auto">
                   
            </div>
        </div>
        
</div>
</div>




<div class="container">
            <div class="row" style="margin-top: 10px;">
              @if($data[0]->r_status == 0)
              <?php $picture= str_replace('https://www.globallove.online/images/','', $data[0]->prfl_photo_path); ?>
  
              <div class="col-md-6">
                <form action="/u/reporteddenyprfl" method="POST">
                    {{ csrf_field() }}

      
                <input type="hidden" name="id" value="{{ $data[0]->id }}">
                <input type="hidden" name="email" value="{{ $data[0]->email }}">
 

                <button type="submit" class="btn btn-danger btn-block">Suspend</button>
                </form>
                </div> 
                <div class="col-md-6">
                <form action="/u/reportedapproveprfl" method="POST">
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $data[0]->id }}">
                <input type="hidden" name="email" value="{{ $data[0]->email }}">
    
                <button type="submit" class="btn btn-success btn-block approve-btn">Approve</button>
                </form>
                </div>
              @elseif($data[0]->r_status == 1)
              <div class="col-md-12">
                <p style="text-align:center;font-weight: 700;color: #459952;font-size:20px; ">User is approved!</p>
              </div>
              @else
              <div class="col-lg-12">
                <p style="color: #f15052;font-size:20px; font-weight: 700;text-align:center">User is now suspended!</p>
              </div>
              <!--div class="col-md-6">
                <form action="/u/reportedapproveprfl" method="POST">
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $data[0]->id }}">
                <input type="hidden" name="email" value="{{ $data[0]->email }}">
    
                <button type="submit" class="btn btn-success btn-block approve-btn">Approve</button>
                </form>
                </div-->
              @endif
              </div>
                    
        </div>

        <p>&nbsp;</p>


        @include('admin_footer')