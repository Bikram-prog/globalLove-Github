<!DOCTYPE html>
<html>
<body>
    <table style="width:848px;margin:auto">
        <tr>
            <td style="text-align:center"><a href="https://globallove.online/"><img src="https://globallove.online/images/logo.png"></a></td>
        </tr>
        <tr>
            <td style="background:url('https://globallove.online/images/banner-welcome.png');width: 848px;
            height: 279px">
            <p style="text-align:center;font: normal normal bold 46px/63px Poppins;
            letter-spacing: 0px;
            color: #FFFFFF;">Subscription Confirmation<p>
            </td>
        </tr>
        <tr>
            <td style="text-align:left">
                <p style="text-align: center;
                font: normal normal normal 18px/35px Poppins;">Hi there {{ $name }},<br>
                Congratulations, you have been upgraded to the Premium Access, this gives you Unlimited everything and everywhere.<br>As GlobalLove is very new, and is expanding rapidly (a new user signs up every 10 minutes), we are relying on you to let us know about our service…….. is it ok, are you having issues?
                <br>e.g. Browsing and messaging other members online is very important, so we want to know if there are any problems at all, if you are, below is a link to Customer Service, would would love to hear from you.<br>
                <a href="https://globallove.online/" style="opacity: 1;
                width: 150px;
                height: 40px;
                background: #ED2427 0% 0% no-repeat padding-box;
                color:#fff;    
                border: 0px;
                text-transform: uppercase;text-decoration:none;padding:10px">Customer Service</a><br>
                Your GlobalLove maybe only one message away.</p>
                <table style="margin:auto" border="1" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="padding:5px">E-mail Address: </td>
                        <td>{{ $mail }}</td>
                    </tr>
                    <tr>
                        <td style="padding:5px">Name: </td>
                        <td>{{ $name }}</td>
                    </tr>
                    <tr>
                        <td style="padding:5px">Address 1: </td>
                        <td>{{ $text[0]->pt_address }}</td>
                    </tr>
                    <tr>
                        <td style="padding:5px">Address 2: </td>
                        <td>{{ $text[0]->pt_street }}</td>
                    </tr>
                    <tr>
                        <td style="padding:5px">Country: </td>
                        <td>{{ $text[0]->pt_country }}</td>
                    </tr>
                    <tr>
                        <td style="padding:5px">State: </td>
                        <td>{{ $text[0]->pt_state }}</td>
                    </tr>
                    <tr>
                        <td style="padding:5px">City: </td>
                        <td>{{ $text[0]->pt_city }}</td>
                    </tr>
                    <tr>
                        <td style="padding:5px">Postcode: </td>
                        <td>{{ $text[0]->pt_postcode }}</td>
                    </tr>
                    <tr>
                        <td style="padding:5px">Premium Access Price: </td>
                        <td>${{ $text[0]->pt_amount/100 }}     (inc’ GST)</td>
                    </tr>
                </table>
                <p style="text-align: center;
                font: normal normal normal 18px/30px Poppins;">This is not a recurring payment, you will receive a 7 day reminder when the subscription is due.</p>
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
               <p style="margin-bottom:10px"></p>
            </td>
        </tr>
        <tr>
            <td style="height: 77px;
            background: #1C1C1C;
            opacity: 1;text-align:center;padding-top:20px">
                    <a href="https://www.facebook.com/globalloveonline/"><img src="https://globallove.online/images/facebook.png" style="margin-right:5px"></a>
                <a href="https://www.instagram.com/globalloveonline/"><img src="https://globallove.online/images/linkedin.png" style="margin-right:5px"></a>
      
            </td>
        </tr>

    </table>
</body>
</html>


