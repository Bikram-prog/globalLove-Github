@include('header')
<style> 
    .premium {
        border: 2px solid #4cd137 !important;
       
    }
    </style>
<div class="content my-3 my-md-5">
            <div class="container">
                
<div>    <div id="w0" class="list-view directory-list-view">
    <h4>Users on this page match the criteria you specified in your match settings.</h4>
    <p style="font-weight: 600; font-size: 24px;">Matches Found: <span><?php echo count($data_matches); ?></span></p>



    <div class="row row-cards row-deck" id="cont">
    @if(count($data_matches) > 0)

    @include('data_matches')
    
    
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2843148547180331"
     crossorigin="anonymous"></script>
<!-- in list ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2843148547180331"
     data-ad-slot="9293873845"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

	
@else
<div><h2 class="text-center">No matches found.</h2></div>
@endif
</div>



</div><div class="pager"></div></div></div>
            </div>
        </div>

@include('footer')