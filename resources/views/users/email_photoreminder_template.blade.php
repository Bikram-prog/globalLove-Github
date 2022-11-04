<!DOCTYPE html>
<html>
<body>
    <table style="width:848px;margin:auto">
        <tr>
            <td style="text-align:center"><a href="https://globallove.online/"><img src="https://globallove.online/images/logo.png"></a></td>
        </tr>
        <tr>
            @php
            $data= DB::table('no_pic_rem_text')->where('no_pic_rem_id', '1')->get();
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
            color: #FFFFFF;">Profile Photo Reminder<p>
            </td>
        </tr>
        <tr>
        
            <td style="text-align:center">
                <p style="text-align: center;
                font: normal normal normal 22px/43px Poppins;padding:30px 50px">Hi {{ $text }},<br> 
                {!! $data[0]->no_pic_rem_text !!}<br>
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
            opacity: 1;text-align:center;padding-top:20px">
                    <a href="https://www.facebook.com/globalloveonline/"><img src="https://globallove.online/images/facebook.png" style="margin-right:5px"></a>
                <a href="https://www.instagram.com/globalloveonline/"><img src="https://globallove.online/images/linkedin.png" style="margin-right:5px"></a>
                <p style="text-align:center;color:#fff">If you don't want to receive these emails from GlobalLove in the future, please <a href="https://www.globallove.online/unsubscribe/{{ $email }}" style="color: #fb6d6d;">unsubscribe</a>.</p>
            </td>
        </tr>
    </table>
</body>
</html>