@include('header')

<style>
.messages {
    background: #fff;
    padding: 20px;
    border-radius: 6px;
}

a {
    text-decoration: none !important;
}

.media > img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    object-position: center;
    border-radius: 25px;
}

.media h5 {
    color: #000000;
    font-weight: 700;
}

.media p {
    color: #666666;
    font-weight: 500;
}

.list-group-item.active {
    color: #5C54AD !important;
    font-weight: bold !important;
}
</style>

<div class="container mt-4">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h2>Messages (Inbox)</h2>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4 mb-2">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" href="/messages/inbox" role="tab" aria-controls="home"><i class="fas fa-inbox"></i> Inbox</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list"  href="/messages/sent" role="tab" aria-controls="profile"><i class="fas fa-share"></i> Sent</a>
            
          </div>
        </div>
        <div class="col-md-6">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                
                {{-- inbox --}}
                @foreach ($users as $user)
                <div class="media mb-2 messages">
                  <img loading="lazy" src="{{$user['propic']}}" class="align-self-start mr-3" alt="{{$user['name']}}">
                  <div class="media-body">
                    <h5 class="mt-0">{{$user['name']}}</h5>
                    <p>{{$user['lmsg']}}</p>
                    <div style=" 
                    display: flex;
                    flex: 1;
                    flex-direction: row;
                    flex-wrap: nowrap;
                    align-content: center;
                    justify-content: flex-end;
                    align-items: center;
                    "><button onclick="loadChat('{{$user['user_id']}}', '{{$user['name']}}', '{{$user['email']}}','offline')" style="margin-right: 5px;" class="btn btn-success btn-sm" type="button">Start Chat</button> <a class="btn btn-dark btn-sm" href="/userprofile/{{$user['user_id']}}" type="button">Profile</a></div>
                  </div>
                </div>
                @endforeach
                

            </div>
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                {{-- sent --}}

                

            </div>
            
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
</div>

@include('footer')