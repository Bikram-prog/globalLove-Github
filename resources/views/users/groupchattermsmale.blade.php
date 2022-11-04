@include('header')

<style>
    .box {
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    .box p {
        font-size: 18px;
        color: #111;
        font-weight: 700;
    }

    .box h1 {
        font-size: 26px;
        margin-bottom: 40px !important;
    }

    .btn-danger {
        width: 120px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 box">
            <h1 class="text-danger mb-4">Welcome to Group Chat, Please be aware of the following: </h1>
            <hr>
            <p>Anything you type in this room is live, and subject to Moderation and Scrutiny.</p>
            <p>This room is not restricted and therefore is not private.</p>
            <p>Always respect your fellow members in this room.</p>
            <p>Bad Language will not be tolerated, and will be subject to a suspension.</p>
            <p>Stalking is not allowed and will be subject to a suspension.</p>
            <p>Racial Abuse is not allowed and will be subject to a suspension.</p>
            <p>This is a Gay Male Room.</p>
            <p>You can go to a private room, just click on the members on the right for Private.</p>
            <p>Have a great time, and thanks for using Global Love, Totally Free Dating online.</p>

            <hr>

            <form action="/grouptermsactionmale" method="GET">
                @csrf

                <p><input type="checkbox" required> &nbsp; &nbsp;I Agree</p>

                <div class="text-center">
                    <button type="submit" class="btn btn-danger btn-lg">Enter</button>
                </div>
                

            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

@include('footer')

