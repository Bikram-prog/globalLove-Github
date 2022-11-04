<!DOCTYPE html>
<html>
<body>
    <table style="width:848px;margin:auto">
        <tr>
            <td style="text-align:center;width: 100%;
            height: 300px;background-size: cover;"><img style="width: 200px;height: 200px;object-fit: contain;" src="{{ $image }}"></td>
        </tr>
        
        <tr>
            <td style="text-align:center">
                <p style="text-align: center;
                font: normal normal normal 22px/43px Poppins;padding:30px 50px"><b>{{ $name }}</b> sent you a message from customer support.
                <center><img src="{{ $propic }}" style="width:150px"></center>
                
                <br><b>Email: </b>{{ $email }}
                <br><b>Message: </b>{{ $msg }}
                </p>
                
            </td>
        </tr>
        
    </table>
    
</body>
</html>