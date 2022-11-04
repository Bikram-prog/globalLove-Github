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
        <div class="col-md-3">
        {{-- <h1 class="text-danger mb-4">Not everyone is the same, and for that reason, we will be offering different rooms for your different tastes.<br>  Check out the following rooms:  </h1><hr>
        <P class="text-center">Choose a room:</p> --}}
        @if (Session::has('msg'))
            <div class="alert alert-danger text-center">{{Session::get('msg')}}</div>
        @endif

        @php 
        $one = DB::table('chat_room_preferences')
                    ->where('room_pref_id', '=', '1')
                    ->get();
        $two = DB::table('chat_room_preferences')
                    ->where('room_pref_id', '=', '2')
                    ->get();
        $three = DB::table('chat_room_preferences')
                    ->where('room_pref_id', '=', '3')
                    ->get();
        $four = DB::table('chat_room_preferences')
                    ->where('room_pref_id', '=', '4')
                    ->get();
        $five = DB::table('chat_room_preferences')
                    ->where('room_pref_id', '=', '5')
                    ->get();
        @endphp
        

        {{-- <div class="row">
        <div class="col-md-8">
        <P class="text-right">Gay Male: <a class="btn btn-success btn-sm  ml-3">Coming Soon</a>
        </div>
        <div class="col-md-4"></div>
        </div> --}}

        

        {{-- <div class="row">
        <div class="col-md-8">
        <P class="text-right">Transexual: <a class="btn btn-success btn-sm ml-3">Coming Soon</a></p>
        </div>
        <div class="col-md-4"></div>
        </div> --}}

        {{-- <div class="row">
        <div class="col-md-8">
        <P class="text-right">Gay Male Curious: <a class="btn btn-success btn-sm ml-3">Coming Soon</a></p>
        </div>
        <div class="col-md-4"></div>
        </div> --}}

        {{-- <div class="row">
        <div class="col-md-8">
        <P class="text-right">Gay Female Curious: <a class="btn btn-success btn-sm ml-3">Coming Soon</a></p>
        </div>
        <div class="col-md-4"></div>
        </div>

    

         <hr>
        <h1 class="text-danger mt-4">Please show your interest by pressing one or any the above rooms.We will take it from there.<br>An amount of 20 will activate the new room.</h1> --}}
        </div>
        <div class="col-md-6 box">
            <h1 class="text-danger mb-4">Welcome to Group Chat, Please be aware of the following: </h1>
            <hr>
            <p>If you don't have a profile photo,you won't be able to send messages.</p>
            <p>Anything you type in this room is live, and subject to Moderation and Scrutiny.</p>
            <p>Posting Personal Information in this Chat room may result in temporary suspension.</p>
            <p>This room is not restricted and therefore is not private.</p>
            <p>Always respect your fellow members in this room.</p>
            <p>Bad Language will not be tolerated, and will be subject to a suspension.</p>
            <p>Stalking is not allowed and will be subject to a suspension.</p>
            <p>Racial Abuse is not allowed and will be subject to a suspension.</p>
            <p>This is a Multi Gender, Multi Everything (for now) Room.</p>
            <p>You can go to a private room, just click on the members on the left for Private.</p>
            <p>Have a great time, and thanks for using Global Love, Totally Free Dating online.</p>

            <hr>

            <form action="/grouptermsaction" method="GET">
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

