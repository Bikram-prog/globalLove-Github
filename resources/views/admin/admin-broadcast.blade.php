@include('admin_header')

<div class="container">
      <div class="row">
          
          <div class="col-md-12">
            <h1>Customer Service Broadcast</h1>
            
            <form id="broadcast_form">
              {{ csrf_field() }}
              <input class="form-control" type="text" name="users_email" id="users_email" value="{{ $implode }}">
              <textarea class="form-control" rows="4" placeholder="Write your message..." name="msg" id="msg"></textarea>

              <button type="submit" class="btn btn-primary">SEND</button>
            </form>
                
              
          </div>
          
      </div>
  </div>


  @include('admin_footer')
  <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
  <script> 
  //CKEDITOR.replace( 'msg' );
  </script>

  <!----------- broadcast ------------->
<script>
  $("#broadcast_form").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var msg = $("#msg").val()
    var to = $("#users_email").val()
    
    $.ajax({
           type: "POST",
           url: "/u/broadcastpost",
           data: $("#broadcast_form").serialize(), // serializes the form's elements.
           success: function(data)
           {
                // send notification to the socket 
                var array = to.split(',');
                array.forEach(function(email) {
                  console.log(email);
                  socket.emit('send_msg_server', { user: email, msg: msg, to: '0', toname: 'Customer Support', toemail: 'admin@gmail.com'}); 
                });
                
                alert('Message Sent Successfully.');
                window.location.href='/u/adminviewapprveuser';
           }
         });

    
});

</script>