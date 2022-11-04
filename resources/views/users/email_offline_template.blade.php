<!DOCTYPE html>
<html>
<body>
    <table style="width:848px;margin:auto">
        <tr>
            <td style="text-align:center"><a href="https://globallove.online/"><img src="https://globallove.online/images/logo.png"></a></td>
        </tr>
        <tr>
            @php
            $data= DB::table('offline_email_update')->where('email_id', '1')->get();
            @endphp
            @if($data[0]->email_image != '')
            <td style="background:url('http://68.183.224.218//images/{{ $data[0]->email_image }}');width: 100%;
                height: 300px;background-size: cover;">
            @else
            <td style="background:url('https://globallove.online/images/banner-welcome.png');width: 848px;
            height: 279px">
            @endif
            <p style="text-align:center;font: normal normal bold 46px/63px Poppins;
            letter-spacing: 0px;
            color: #FFFFFF;">Offline Message<p>
            </td>
        </tr>
        <tr>
            <td style="text-align:center">
                <p style="text-align: center;
                font: normal normal normal 22px/43px Poppins;padding:30px 50px"><b>{{ $from[0]->name }}</b> sent you a message. Please login to your account to respond.
                <br><b>Message: </b>{{ $msg }}
                </p>
                <center><img src="{{ $from[0]->prfl_photo_path }}" style="width:150px"></center>
                <center><a href="https://globallove.online/userprofile/{{ $from[0]->id }}"  style="pointer:cursor"><button  style="width: 278px;
                    height: 37px;
                    background: #de524f;
                    color: white;
                    border: 1px solid #fff;
                    font-size: 17px;
                    border-radius: 10px;">View Profile</button>
                    </a>    
                </center>
                <p style="text-align: center;
                font: normal normal normal 22px/43px Poppins;padding:30px 50px">
                <b>Gender:</b> {{ $from[0]->sex }}<br>
                <b>Country:</b> {{ $from[0]->country }}<br>
                <b>Birthday:</b> {{ $from[0]->dob }}<br>
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align:center">
            <p style="text-align: center;
                font: normal normal normal 22px/43px Poppins;
                letter-spacing: 0px;
                color: #000000;margin-top:20px">Thanks,<br><span style="font-weight:600">GlobalLove Team </p>
         
            </td>
        </tr>

        <tr>
            <td style="text-align:center">
               <p style="margin-bottom:50px"></p>
            </td>
        </tr>
        <tr>
            <td style="height: 77px;
            background: #1C1C1C;
            opacity: 1;text-align:center">
           <a href="https://www.facebook.com/globalloveonline/"><img src="https://globallove.online/images/facebook.png" style="margin-right:5px"></a>
                <a href="https://www.instagram.com/globalloveonline/"><img src="https://globallove.online/images/linkedin.png" style="margin-right:5px"></a>
            </td>
        </tr>
    </table>
    
</body>
</html>