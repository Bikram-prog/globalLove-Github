@include('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>


<style type="text/css">
img {
display: block;
max-width: 100%;
}
.preview {
overflow: hidden;
width: 160px; 
height: 160px;
margin: 10px;
border: 1px solid red;
}
.modal-lg{
max-width: 1000px !important;
}
</style>

<div class="content my-3 my-md-5">
            <div class="container">
                <div class="page-content">
    <div class="row">
        
        <div class="col-lg-12">
            <div class="card">
    <div class="card-header">
        <h3 class="card-title">Upload Photos</h3>
        
    </div>
    <div class="card-body">
        
        <form id="w0" action="/photouploadpost" method="post" enctype='multipart/form-data'>
            {{ csrf_field() }}
<input type="hidden" name="_csrf" value="ZSCvaDrKskuG-kTyUqL6pVoAqdkxvNcgMMgJhtbKciIiVcgYUoHCCsS9B4c_4JvQI1TY7wjL4lFypGXEoIEgDw==">
        <div class="error-summary alert alert-danger" style="display:none"><ul></ul></div>
        <div class="form-group field-uploadform-photos">

<div class="upload-kit"><input type="hidden" id="uploadform-photos" class="empty-value" name="photos"><ul class="files"></ul><div class="upload-kit-input">
<img id="target">
    <input type="file" style="" id="src" name="photos" class="image"><div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div><span data-toggle="popover" class="fas fa-alert-circly error-popover"></span><span class="fas fa-arrow-down-circle drag"></span><span id="faadd" class="fas fa-plus-circle add"></span>
    <span id="fadel" class="fas fa-trash add"></span>
</div></div>

<div class="help-block"></div>
</div>
        <!-- <div class="form-group form-actions">
            <button type="submit" class="btn btn-primary">Upload</button>        </div> -->

        </form>
        
    </div>

    
</div>
        </div>
    </div>
</div>
            </div>
        </div>
@include('footer')

<script>
function showImage(src,target) {

  var fr=new FileReader();
  // when image is loaded, set the src of the image where you want to display it
  fr.onload = function(e) { target.src = this.result; };
  src.addEventListener("change",function() {
    document.getElementById("target").style.display = "block";
    document.getElementById("faadd").style.display = "none";
    document.getElementById("fadel").style.display = "block";
    document.getElementById("src").style.height = "20px";
    
    // fill fr with image data    
    fr.readAsDataURL(src.files[0]);
  });
}

var src = document.getElementById("src");
var target = document.getElementById("target");
showImage(src,target);
</script>

<style>
    #target {
        object-fit: cover;
        width: 250px;
        height: 150px;
        display: none;
    }
    #fadel {
        display: none;
    }
</style>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<!-- <h5 class="modal-title" id="modalLabel"></h5> -->
<button onclick="search()" type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="img-container">
<div class="row">
<div class="col-md-8">
<img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
</div>
<div class="col-md-4">
<div class="preview"></div>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button onclick="search()" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
<button onclick="search()" type="button" class="btn btn-primary" id="crop">Crop</button>
</div>
</div>
</div>
</div>
<script>
var $modal = $('#modal');
var image = document.getElementById('image');
var cropper;
$("body").on("change", ".image", function(e){
var files = e.target.files;
var done = function (url) {
image.src = url;
$modal.modal('show');
};
var reader;
var file;
var url;
if (files && files.length > 0) {
file = files[0];
if (URL) {
done(URL.createObjectURL(file));
} else if (FileReader) {
reader = new FileReader();
reader.onload = function (e) {
done(reader.result);
};
reader.readAsDataURL(file);
}
}
});
$modal.on('shown.bs.modal', function () {
cropper = new Cropper(image, {
aspectRatio: 1,
viewMode: 3,
preview: '.preview'
});
}).on('hidden.bs.modal', function () {
cropper.destroy();
cropper = null;
});
$("#crop").click(function(){
canvas = cropper.getCroppedCanvas({
width: 300,
height: 300,
});
canvas.toBlob(function(blob) {
url = URL.createObjectURL(blob);
var reader = new FileReader();
reader.readAsDataURL(blob); 
reader.onloadend = function() {
var base64data = reader.result; 
$.ajax({
type: "POST",
dataType: "json",
url: "/photouploadpost",
data: {'_token': $('meta[name="csrf-token"]').attr('content'), 'image': base64data},
success: function(data){
console.log(data);
$modal.modal('hide');
alert(data.success);
window.location.href = '/photoupload';
}
});
}
});
})
</script>