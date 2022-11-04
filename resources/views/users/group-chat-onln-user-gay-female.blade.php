
@foreach($onlnuser as $onln)

@if($onln->onln_status == 'online')
<a onclick="loadChat('{{ $onln->id }}', '{{ $onln->name }}', '{{ Crypt::decryptString($_COOKIE['UserIds']) }}')" href="javascript:void(0)" class="text-decoration: none;"><li class="left clearfix">
                  <span class="chat-img pull-left">
                  <img src="{{ $onln->prfl_photo_path }}" alt="User Avatar" class="img-circle">
                  </span>
                  <div class="chat-body clearfix">
                     <div class="header_sec">
                        <strong class="primary-font">{{ $onln->name }}</strong> <strong class="pull-right">
                          <i class="fas fa-circle"></i></strong>
                     </div>
                     <div class="contact_sec">
                      Private Message
                     </div>
                  </div>
               </li></a>
@endif

@endforeach

