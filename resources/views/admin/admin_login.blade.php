@include('admin_header')

<div class="container-fluid">
      <div class="row" style="margin-top: 150px;">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h1 class="text-center">Admin Login</h1>
          <form action="/u/adminloginpost" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="pswrd">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Submit</button>

          </form>
        </div>
        <div class="col-md-3"></div>
      </div>
  </div>


