@include('header')

<style> 
    .premium {
        border: 2px solid #4cd137 !important;
       
    }
    </style>


<div class="content my-3 my-md-5">
<div class="container">   



    @if (count($totalusers) > 0)
    <p style="font-size:23px">Online members: {{count($totalusers)}}</p>
    @endif  
    @if (count($totalusers) <= 0)
    <div><h2 class="text-center">No members online.</h2></div>
    @endif


<div>    
    <div id="w0" class="list-view directory-list-view">

    <div class="row row-cards row-deck" id="cont">

	
@include('data') 


</div>





</div>
</div>
     </div>
       </div>




@include('footer')




