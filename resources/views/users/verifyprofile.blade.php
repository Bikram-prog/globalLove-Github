@include('header')
<div class="container-fluid" style="background-color: #5eba00; padding: 20px; color: #fff;">
  <div class="container">
    <div class="row text-center">
    <div class="col-12">
      <h2>Verify Your Profile</h2>
      <div class="row">
        <div class="col-4">
          <p><i class="fas fa-check-circle"></i> Get more attention from singles</p>
        </div>
        <div class="col-4">
          <p><i class="fas fa-check-circle"></i> Help improve member safety</p>
        </div>
        <div class="col-4">
          <p><i class="fas fa-check-circle"></i> Become a trusted dater</p>
        </div>
        
      </div>
    </div>
  </div>
  </div>
  
</div>
<div class="container">
  @if($data[0]->verify_photo_path == '')
  <div class="row" style="margin-top: 40px;">
    <div class="col-md-12">
      <h4>Profile Verification</h4><hr>
      <h4>Upload a color copy or photo of your identification!</h4>
    </div>
  </div>
  <div class="row" style="margin-top: 40px;">
    <div class="col-md-5">
      <p>Upload Verification Document Image</p>
      <form action="/verifyprofileaction" method="POST" enctype="multipart/form-data">
       {{ csrf_field() }}
        <div class="custom-file" style="margin-bottom: 20px;">
          <input type="file" class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
      </form>
    </div>
    <div class="col-md-2">
      
    </div>
    <div class="col-md-5">
      <p><i class="fas fa-check-circle"></i> Upload Verification Document Image</p>
      <p><i class="fas fa-check-circle"></i> Passport</p>
      <p><i class="fas fa-check-circle"></i> Driver's Licence</p>
      <p><i class="fas fa-check-circle"></i> National ID Card</p>
    </div>
  </div>
  @elseif($data[0]->verify_photo_path != '' && $data[0]->verify_approve_status == '0')
  <div class="row" style="margin-top: 40px;">
  <div class="col-md-4"></div>
    <div class="col-md-4">
      <h4 style="line-height:25px;text-align:center;">Your photo copy was successfully uploaded and is now pending for review.All photo copies are reviewed by our customer satisfaction team and should be processed within 24hours.</h4>
    </div>
	<div class="col-md-4"></div>
  </div>
  @elseif($data[0]->verify_photo_path != '' && $data[0]->verify_approve_status == '1')
  <div class="row" style="margin-top: 40px;">
  <div class="col-md-4"></div>
    <div class="col-md-4">
      <h4 style="text-align:center;">Your profile is verified <i style="color:blue;" class="fa fa-check-circle"></i></h4>
    </div>
	<div class="col-md-4"></div>
  </div>
  @endif
  <div class="row" style="margin-top: 40px;">
    <div class="col-md-12">
      <p style="text-align:center;"><i class="fas fa-lock"></i> The information you provide is only used for profile verification and is not shared with other members or third parties.</p>
    </div>
  </div>

</div>













@include('footer')