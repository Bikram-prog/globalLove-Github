@include('header')

<div class="container-fluid">
    <div class="row" style="margin-top: 40px;">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h4>Delete Account</h4>
            <p>Please enter your current password to delete your account.</p>
            <p style="font-weight: 700; color: #eb4d4b;">Important: This will permanently delete your account from GlobalLove.</p>
            <form action="/deleteprofileaction" method="POST">
                {{ csrf_field() }}

                @if (Session::has('msg'))
                    <div class="alert alert-danger">{{Session::get('msg')}}</div>
                @endif


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
        <div class="col-md-4"></div>
    </div>
</div>

@include('footer')