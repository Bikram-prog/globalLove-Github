@include('header')

<div class="container-fluid">
    <div class="row" style="margin-top: 40px;">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h4>Reset your password</h4>
            <p>To help keep your account secure we recommend that you routinely change your password.</p>
            <p style="font-weight: 700;">Important: For extra security ensure that your new password is NOT the same as your email password.</p>
            <form action="/changepasswordaction" method="POST">
                {{ csrf_field() }}

                @if (Session::has('updatepas'))
                <div class="alert alert-success">{{Session::get('updatepas')}}</div>
                @endif
                @if (Session::has('errpas'))
                    <div class="alert alert-danger">{{Session::get('errpas')}}</div>
                @endif

            <div class="form-group">
                <label>New Password:</label>
                <input type="password" class="form-control" name="newpswrd">
            </div>

            <div class="form-group">
                <label>Current password:</label>
                <input type="password" class="form-control" name="curretpswrd">
            </div>

            <button style=" 
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            width: 120px;
            font-size: 18px;
            letter-spacing: 2.0px;
            " onclick="search()" type="submit" class="btn btn-primary mb-4">SAVE</button>

            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

@include('footer')