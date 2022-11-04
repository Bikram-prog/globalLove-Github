<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersMeta;
use App\Models\UserPhotos;
use App\Models\Connectionsfinal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use DateTime;
use Mail;
use Stripe;


class MembershipController extends Controller
{

    public function viewMembership(){
                
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);

        } 

        $payment= DB::Select("SELECT pt_u_id,pt_end_date,pt_start_date FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        $country_log= DB::Select("SELECT * FROM users_metas WHERE user_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        $price= DB::Select("SELECT * FROM country_price WHERE cp_name= '".$country_log[0]->country."'");


        return view('users.membership')->with(['payment'=> $payment, 'price'=> $price]);
    }

    public function paymentSuccessfull(){
                
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);

        } 

        $payment= DB::Select("SELECT pt_u_id,pt_end_date,pt_start_date FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        $country_log= DB::Select("SELECT * FROM users_metas WHERE user_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        $price= DB::Select("SELECT * FROM country_price WHERE cp_name= '".$country_log[0]->country."'");


        return view('users.payment-successfull')->with(['payment'=> $payment, 'price'=> $price]);
    }

   public function index($id,Request $request)
    {
        $country_log= DB::Select("SELECT * FROM users_metas WHERE user_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        $price= DB::Select("SELECT * FROM country_price WHERE cp_name= '".$country_log[0]->country."'");

        return view('users.paypal-payment-form')->with(['price'=> $price,'month'=> $id]);
    }


    public function stripePost(Request $request)
    {

        if ($request->input('month') == '1'){

            if($request->input('promo') != ''){
                $promo_ret = $this->promoCodePost($request->input('promo'));

                if($promo_ret) {
                    $payment= DB::Select("SELECT pt_u_id FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

                    $start_date = date('Y-m-d H:i:s');
                    $stop_date = date('Y-m-d H:i:s', strtotime($start_date . ' +30 day'));
                    if(count($payment) == 0){
                    DB::table('payment_transactions')->insert([
                        'pt_u_id' => Crypt::decryptString($_COOKIE['UserIds']), 
                        'pt_start_date' => $start_date,
                        'pt_end_date' => $stop_date,
                        'pt_ack' =>'',
                        'pt_currency' => '',
                        'pt_amount' =>'0',
                        'pt_transaction_id' => 'promo_code|' . $request->input('promo'), 
                        'pt_country' => $request->input('country'),
                        'pt_state' => $request->input('state'),
                        'pt_street' => $request->input('street'),
                        'pt_address' => $request->input('address'),
                        'pt_phn_no' => $request->input('cntct_no'),
                        'pt_city' => $request->input('city'),
                        'pt_postcode' => $request->input('postcode')
                        ]);   
                    }else{
                        DB::table('payment_transactions')->where('pt_u_id', Crypt::decryptString($_COOKIE['UserIds']) )->update([
                        'pt_start_date' => $start_date,
                        'pt_end_date' => $stop_date,
                        'pt_start_date' => $start_date,
                        'pt_end_date' => $stop_date,
                        'pt_ack' =>'',
                        'pt_currency' => '',
                        'pt_amount' =>'0',
                        'pt_transaction_id' => 'promo_code|' . $request->input('promo'),
                        'pt_country' => $request->input('country'),
                        'pt_state' => $request->input('state'),
                        'pt_street' => $request->input('street'),
                        'pt_address' => $request->input('address'),
                        'pt_phn_no' => $request->input('cntct_no'),
                        'pt_city' => $request->input('city'),
                        'pt_postcode' => $request->input('postcode')
                        ]);
                    }
                } else {
                    return redirect('/membership')->with(['succ'=> 'Sorry! You entered wrong promo code Or used promocode.']); 
                }
                
                return redirect('/membership');
            }

            

            $country_log= DB::Select("SELECT country FROM users_metas WHERE user_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        $price= DB::Select("SELECT cp_price FROM country_price WHERE cp_name= '".$country_log[0]->country."'");

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge_status = Stripe\Charge::create ([
                "amount" => $price[0]->cp_price * 100,
                "currency" => "aud",
                "source" => $request->stripeToken,
                "description" => "Globallove dating membership for 1 month" 
        ]);

        //dd($charge_status);
        if($charge_status->status == 'succeeded' && isset($charge_status->id)) {
            // update database
            setcookie('_gooDal', Crypt::encryptString(Crypt::decryptString($_COOKIE['UserIds'])), time() + (86400 * 30), "/");

            $payment= DB::Select("SELECT pt_u_id FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

            $start_date = date('Y-m-d H:i:s');
            $stop_date = date('Y-m-d H:i:s', strtotime($start_date . ' +30 day'));

            if(count($payment) == 0){

            DB::table('payment_transactions')->insert([
            'pt_u_id' => Crypt::decryptString($_COOKIE['UserIds']), 
            'pt_start_date' => $start_date,
            'pt_end_date' => $stop_date,
            'pt_ack' => $request->ack,
            'pt_currency' => $charge_status->currency,
            'pt_amount' => $charge_status->amount,
            'pt_transaction_id' => $charge_status->id,
            'pt_country' => $request->input('country'),
            'pt_state' => $request->input('state'),
            'pt_street' => $request->input('street'),
            'pt_address' => $request->input('address'),
            'pt_phn_no' => $request->input('cntct_no'),
            'pt_city' => $request->input('city'),
            'pt_postcode' => $request->input('postcode')
            ]);
            } else {
                 DB::table('payment_transactions')->where('pt_u_id', Crypt::decryptString($_COOKIE['UserIds']) )->update([
            'pt_start_date' => $start_date,
            'pt_end_date' => $stop_date,
            'pt_ack' => $request->input('ack'),
            'pt_currency' => $charge_status->currency,
            'pt_amount' => $charge_status->amount,
            'pt_transaction_id' => $charge_status->id,
            'pt_country' => $request->input('country'),
            'pt_state' => $request->input('state'),
            'pt_street' => $request->input('street'),
            'pt_address' => $request->input('address'),
            'pt_phn_no' => $request->input('cntct_no'),
            'pt_city' => $request->input('city'),
            'pt_postcode' => $request->input('postcode')
            ]);
            }

            $user_mail= DB::table('users')->where('id', Crypt::decryptString($_COOKIE['UserIds']))
                                    ->get();

              $mail = $user_mail[0]->email;
              $name = $user_mail[0]->name;

              $paymentuser= DB::Select("SELECT * FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

               Mail::send(['html'=>'email_payment_success'], ['text'=>$paymentuser,'name'=>$name,'mail'=>$mail], function($message) use ($mail)  {
                $message->to($mail,'gary@bourne.me','admin@wwwmedia.world')->subject
                   ('Payment Successfull - GlobalLove');
                $message->from('no-reply@wwwmedia.world','GlobalLove');
             });
      
            return redirect('/payment-successfull')->with(['succ'=> 'Your Payment has been successfull', 'order-id' => $charge_status->id]);
        } else {
            return redirect('/membership')->with(['succ'=> 'Sorry! Your payment failed. Please try again later.']);
        }


        } elseif ($request->input('month') == '6') {

            $country_log= DB::Select("SELECT country FROM users_metas WHERE user_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        $price= DB::Select("SELECT cp_price_six FROM country_price WHERE cp_name= '".$country_log[0]->country."'");

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge_status = Stripe\Charge::create ([
                "amount" => $price[0]->cp_price_six * 100,
                "currency" => "aud",
                "source" => $request->stripeToken,
                "description" => "Globallove dating membership for 6 months" 
        ]);

        //dd($charge_status);
        if($charge_status->status == 'succeeded' && isset($charge_status->id)) {
            // update database
            setcookie('_gooDal', Crypt::encryptString(Crypt::decryptString($_COOKIE['UserIds'])), time() + (86400 * 180), "/");

            $payment= DB::Select("SELECT pt_u_id FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

            $start_date = date('Y-m-d H:i:s');
            $stop_date = date('Y-m-d H:i:s', strtotime($start_date . ' +180 day'));

            if(count($payment) == 0){

            DB::table('payment_transactions')->insert([
            'pt_u_id' => Crypt::decryptString($_COOKIE['UserIds']), 
            'pt_start_date' => $start_date,
            'pt_end_date' => $stop_date,
            'pt_ack' => $request->ack,
            'pt_currency' => $charge_status->currency,
            'pt_amount' => $charge_status->amount,
            'pt_transaction_id' => $charge_status->id,
            'pt_country' => $request->input('country'),
            'pt_state' => $request->input('state'),
            'pt_street' => $request->input('street'),
            'pt_address' => $request->input('address'),
            'pt_phn_no' => $request->input('cntct_no'),
            'pt_city' => $request->input('city'),
            'pt_postcode' => $request->input('postcode')
            ]);
            } else {
                 DB::table('payment_transactions')->where('pt_u_id', Crypt::decryptString($_COOKIE['UserIds']) )->update([
            'pt_start_date' => $start_date,
            'pt_end_date' => $stop_date,
            'pt_ack' => $request->input('ack'),
            'pt_currency' => $charge_status->currency,
            'pt_amount' => $charge_status->amount,
            'pt_transaction_id' => $charge_status->id,
            'pt_country' => $request->input('country'),
            'pt_state' => $request->input('state'),
            'pt_street' => $request->input('street'),
            'pt_address' => $request->input('address'),
            'pt_phn_no' => $request->input('cntct_no'),
            'pt_city' => $request->input('city'),
            'pt_postcode' => $request->input('postcode')
            ]);
            }

            $user_mail= DB::table('users')->where('id', Crypt::decryptString($_COOKIE['UserIds']))
                                    ->get();

              $mail = $user_mail[0]->email;
              $name = $user_mail[0]->name;

              $paymentuser= DB::Select("SELECT * FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

               Mail::send(['html'=>'email_payment_success'], ['text'=>$paymentuser,'name'=>$name,'mail'=>$mail], function($message) use ($mail)  {
                $message->to($mail,'gary@bourne.me','admin@wwwmedia.world')->subject
                   ('Payment Successfull - GlobalLove');
                $message->from('no-reply@wwwmedia.world','GlobalLove');
             });
      
            return redirect('/payment-successfull')->with(['succ'=> 'Your Payment has been successfull', 'order-id' => $charge_status->id]);
        } else {
            return redirect('/membership')->with(['succ'=> 'Sorry! Your payment failed. Please try again later.']);
        }

        } else {

            $country_log= DB::Select("SELECT country FROM users_metas WHERE user_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        $price= DB::Select("SELECT cp_price_twelve FROM country_price WHERE cp_name= '".$country_log[0]->country."'");

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge_status = Stripe\Charge::create ([
                "amount" => $price[0]->cp_price_twelve * 100,
                "currency" => "aud",
                "source" => $request->stripeToken,
                "description" => "Globallove dating membership for 12 months" 
        ]);

        //dd($charge_status);
        if($charge_status->status == 'succeeded' && isset($charge_status->id)) {
            // update database
            setcookie('_gooDal', Crypt::encryptString(Crypt::decryptString($_COOKIE['UserIds'])), time() + (86400 * 365), "/");

            $payment= DB::Select("SELECT pt_u_id FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

            $start_date = date('Y-m-d H:i:s');
            $stop_date = date('Y-m-d H:i:s', strtotime($start_date . ' +365 day'));

            if(count($payment) == 0){

            DB::table('payment_transactions')->insert([
            'pt_u_id' => Crypt::decryptString($_COOKIE['UserIds']), 
            'pt_start_date' => $start_date,
            'pt_end_date' => $stop_date,
            'pt_ack' => $request->ack,
            'pt_currency' => $charge_status->currency,
            'pt_amount' => $charge_status->amount,
            'pt_transaction_id' => $charge_status->id,
            'pt_country' => $request->input('country'),
            'pt_state' => $request->input('state'),
            'pt_street' => $request->input('street'),
            'pt_address' => $request->input('address'),
            'pt_phn_no' => $request->input('cntct_no'),
            'pt_city' => $request->input('city'),
            'pt_postcode' => $request->input('postcode')
            ]);
            } else {
                 DB::table('payment_transactions')->where('pt_u_id', Crypt::decryptString($_COOKIE['UserIds']) )->update([
            'pt_start_date' => $start_date,
            'pt_end_date' => $stop_date,
            'pt_ack' => $request->input('ack'),
            'pt_currency' => $charge_status->currency,
            'pt_amount' => $charge_status->amount,
            'pt_transaction_id' => $charge_status->id,
            'pt_country' => $request->input('country'),
            'pt_state' => $request->input('state'),
            'pt_street' => $request->input('street'),
            'pt_address' => $request->input('address'),
            'pt_phn_no' => $request->input('cntct_no'),
            'pt_city' => $request->input('city'),
            'pt_postcode' => $request->input('postcode')
            ]);
            }

            $user_mail= DB::table('users')->where('id', Crypt::decryptString($_COOKIE['UserIds']))
                                    ->get();

              $mail = $user_mail[0]->email;
              $name = $user_mail[0]->name;

              $paymentuser= DB::Select("SELECT * FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

               Mail::send(['html'=>'email_payment_success'], ['text'=>$paymentuser,'name'=>$name,'mail'=>$mail], function($message) use ($mail)  {
                $message->to($mail,'gary@bourne.me','admin@wwwmedia.world')->subject
                   ('Payment Successfull - GlobalLove');
                $message->from('no-reply@wwwmedia.world','GlobalLove');
             });
      
            return redirect('/payment-successfull')->with(['succ'=> 'Your Payment has been successfull', 'order-id' => $charge_status->id]);
        } else {
            return redirect('/membership')->with(['succ'=> 'Sorry! Your payment failed. Please try again later.']);
        }

        }
        

        

        
    }

    public function payment(Request $request) {

        setcookie('_gooDal', Crypt::encryptString(Crypt::decryptString($_COOKIE['UserIds'])), time() + (86400 * 180), "/");

        $payment= DB::Select("SELECT pt_u_id FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        $start_date = date('Y-m-d H:i:s');
        $stop_date = date('Y-m-d H:i:s', strtotime($start_date . ' +180 day'));

        if(count($payment) == 0){

        DB::table('payment_transactions')->insert([
        'pt_u_id' => Crypt::decryptString($_COOKIE['UserIds']), 
        'pt_start_date' => $start_date,
        'pt_end_date' => $stop_date,
        'pt_ack' => $request->ack,
        'pt_currency' => $request->currency_code,
        'pt_amount' => $request->amount,
        'pt_transaction_id' => $request->tran
        ]);
        } else {
             DB::table('payment_transactions')->where('pt_u_id', Crypt::decryptString($_COOKIE['UserIds']) )->update([
        'pt_start_date' => $start_date,
        'pt_end_date' => $stop_date,
        'pt_ack' => $request->input('ack'),
        'pt_currency' => $request->input('currency_code'),
        'pt_amount' => $request->input('amount'),
        'pt_transaction_id' => $request->input('tran')
    ]);
        }
        
        return response()->json('Your Payment has been successfull.');
        //return redirect('/membership')->with(['succ'=> 'Your Payment has been successfull']);

    }

    public function payment_paypal_cc(Request $request)
    {
        $amount= $request->input('price');

        $expmonth= $request->input('exp_month');
        $expyear= $request->input('exp_year');

        $arr= array($expmonth,$expyear);
        $expdate= implode('',$arr);



        $request_params = array (
            'METHOD' => 'DoDirectPayment',
            'USER' => 'sb-atclh5122138_api1.business.example.com',
            'PWD' => 'V7VYTU86VAYJCKWX',
            'SIGNATURE' => 'AgdREuI.dPgivWuC5f9I-w4x89XrAR5umQqYsWkpHsOvgnG9ivULVyyc',
            'VERSION' => '85.0',
            'PAYMENTACTION' => 'Sale',
            'IPADDRESS' => '127.0.0.1',
            'CREDITCARDTYPE' => 'Visa',
            'ACCT' => $request->input('card_no'),
            'EXPDATE' => $expdate,
            'CVV2' => $request->input('cvv'),
            'FIRSTNAME' => 'test',
            'LASTNAME' => 'buyer',
            'STREET' => '1 Main St',
            'CITY' => 'San Jose',
            'STATE' => 'CA',
            'COUNTRYCODE' => 'AU',
            'ZIP' => '95131',
            'AMT' => $amount,
            'CURRENCYCODE' => 'AUD',
            'DESC' => 'GlobalLove Membership'
       );     
     
       $nvp_string = '';     
       foreach($request_params as $var=>$val)
       {
          $nvp_string .= '&'.$var.'='.urlencode($val);
       }
     
        $curl = curl_init();     
        curl_setopt($curl, CURLOPT_VERBOSE, 0);     
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);     
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);     
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);     
        curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');     
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);     
        curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string); 

        $result = curl_exec($curl);     
        curl_close($curl);   

        $data = $this->NVPToArray($result);
        
        if($data['ACK'] == 'Success') {

            setcookie('_gooDal', Crypt::encryptString(Crypt::decryptString($_COOKIE['UserIds'])), time() + (86400 * 180), "/");

            $payment= DB::Select("SELECT pt_u_id FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

            $start_date = date('Y-m-d H:i:s');
            $stop_date = date('Y-m-d H:i:s', strtotime($start_date . ' +180 day'));

            if(count($payment) == 0){

            DB::table('payment_transactions')->insert([
            'pt_u_id' => Crypt::decryptString($_COOKIE['UserIds']), 
            'pt_start_date' => $start_date,
            'pt_end_date' => $stop_date,
            'pt_ack' => $data['ACK'],
            'pt_currency' => $data['CURRENCYCODE'],
            'pt_amount' => $data['AMT'],
            'pt_transaction_id' => $data['TRANSACTIONID']             
            ]);
            } else {
                 DB::table('payment_transactions')->where('pt_u_id', Crypt::decryptString($_COOKIE['UserIds']) )->update([
            'pt_start_date' => $start_date,
            'pt_end_date' => $stop_date,
            'pt_ack' => $data['ACK'],
            'pt_currency' => $data['CURRENCYCODE'],
            'pt_amount' => $data['AMT'],
            'pt_transaction_id' => $data['TRANSACTIONID']      
        ]);
            }
            
            return redirect('/membership')->with(['succ'=> 'Your Payment has been successfull']);
        } if ($data['ACK'] == 'Failure') {

            setcookie("_gooDal", "", time() - 3600);
            
             return redirect('/membership')->with(['err'=> 'Your Payment failed. ' . $data['L_LONGMESSAGE0']]);
        } else {
            echo "Something went wrong please try again letter.";
        }
    }

    public function  NVPToArray($NVPString)
    {
       $proArray = array();
       while(strlen($NVPString)) {
            // key
            $keypos= strpos($NVPString,'=');
            $keyval = substr($NVPString,0,$keypos);
            //value
            $valuepos = strpos($NVPString,'&') ? strpos($NVPString,'&'): strlen($NVPString);
            $valval = substr($NVPString,$keypos+1,$valuepos-$keypos-1);

            $proArray[$keyval] = urldecode($valval);
            $NVPString = substr($NVPString,$valuepos+1,strlen($NVPString));
        }
        return $proArray;
    }

    public function isUserLoginExist() {
    

        if (!isset($_COOKIE['UserIds']) ||  !isset($_COOKIE['LookingFor']) ) {
           return false;
        }
        $usercount =   User::where('id',Crypt::decryptString($_COOKIE['UserIds']))->count();
        if($usercount <= 0){
         return false;
        }
 
        return true;
 
       }

     
       
    public function upgradeProfileAction($id) {


        $payment= DB::Select("SELECT pt_u_id FROM payment_transactions WHERE pt_u_id= '".$id."'");
        $user = User::where('id', '=', $id)->first();

        $start_date = date('Y-m-d H:i:s');
        $stop_date = date('Y-m-d H:i:s', strtotime($start_date . ' +180 day'));

        if(count($payment) == 0){

            DB::table('payment_transactions')->insert([
            'pt_u_id' => $id, 
            'pt_start_date' => $start_date,
            'pt_end_date' => $stop_date,
            'pt_ack' =>'',
            'pt_currency' => '',
            'pt_amount' =>'0',
            'pt_transaction_id' => 'admin_insert'   
            ]);

        }else {

            DB::table('payment_transactions')->where('pt_u_id', $id)->update([
                'pt_start_date' => $start_date,
                'pt_end_date' => $stop_date,
                'pt_ack' =>'',
                'pt_currency' => '',
                'pt_amount' =>'0',
                'pt_transaction_id' => 'admin_insert'      
            ]);

       }

       $dataa = "";
       $mail = $user->email;
       Mail::send(['html'=>'admin.email_upgraded_template'], ['text'=>$dataa], function($message) use ($mail, $dataa)  {
        $message->to($mail)->subject
           ('Upgraded to premium');
        $message->from('no-reply@wwwmedia.world','GlobalLove');
     });
       

       return redirect('/u/adminviewuser');

    }

    /////////////////////////////////////////////

    private function promoCodePost($promo) {

        $payment= DB::Select("SELECT pt_u_id FROM payment_transactions WHERE pt_u_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        if(count($payment) == 0){
            $promocode= DB::Select("SELECT promo_code_number FROM used_promo_code WHERE promo_code_user_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

            $start_date = date('Y-m-d H:i:s');
            $stop_date = date('Y-m-d H:i:s', strtotime($start_date . ' +30 day'));
            if(count($promocode) > 0){
                foreach($promocode as $pay){
                    if($pay->promo_code_number == $promo){
                        return redirect('/membership')->with(['succ'=> 'Sorry! You allready used this promo code.']);
                    }else{
                    $prom_o = DB::Select("SELECT * FROM promo_code WHERE promo_code= '".$promo."'");
                    if(count($prom_o) > 0){
                        // DB::table('payment_transactions')->insert([
                        //     'pt_u_id' => Crypt::decryptString($_COOKIE['UserIds']), 
                        //     'pt_start_date' => $start_date,
                        //     'pt_end_date' => $stop_date,
                        //     'pt_ack' =>'',
                        //     'pt_currency' => '',
                        //     'pt_amount' =>'0',
                        //     'pt_transaction_id' => 'promo_code|' . $promo 
                        //     ]);
                        
                        DB::table('used_promo_code')->insert([
                            'promo_code_user_id' => Crypt::decryptString($_COOKIE['UserIds']), 
                            'promo_code_number' => $promo
                            ]);
                            return true;
                    }else{
                    return false;
                    }
                    }
                }
            }else{
                $prom_o= DB::Select("SELECT * FROM promo_code WHERE promo_code= '".$promo."'");
                    if(count($prom_o) > 0){
                        // DB::table('payment_transactions')->insert([
                        //     'pt_u_id' => Crypt::decryptString($_COOKIE['UserIds']), 
                        //     'pt_start_date' => $start_date,
                        //     'pt_end_date' => $stop_date,
                        //     'pt_ack' =>'',
                        //     'pt_currency' => '',
                        //     'pt_amount' =>'0',
                        //     'pt_transaction_id' => 'promo_code|' . $promo 
                        //     ]);

                        DB::table('used_promo_code')->insert([
                            'promo_code_user_id' => Crypt::decryptString($_COOKIE['UserIds']), 
                            'promo_code_number' => $promo
                            ]);
                            return true;
                    }else{
                    return false;
                    }
            }
            
        }else{
            $promocode= DB::Select("SELECT promo_code_number FROM used_promo_code WHERE promo_code_user_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

            $start_date = date('Y-m-d H:i:s');
            $stop_date = date('Y-m-d H:i:s', strtotime($start_date . ' +30 day'));
            if(count($promocode) > 0){
                foreach($promocode as $pay){
                    if($pay->promo_code_number == $promo){
                        return redirect('/membership')->with(['succ'=> 'Sorry! You allready used this promo code.']);
                    }else{
                    $prom_o= DB::Select("SELECT * FROM promo_code WHERE promo_code= '".$promo."'");
                    if(count($prom_o) > 0){
                        // DB::table('payment_transactions')->where('pt_u_id', Crypt::decryptString($_COOKIE['UserIds']))->update([
                        //     'pt_start_date' => $start_date,
                        //     'pt_end_date' => $stop_date,
                        //     'pt_ack' =>'',
                        //     'pt_currency' => '',
                        //     'pt_amount' =>'0',
                        //     'pt_transaction_id' => 'promo_code|' . $promo      
                        // ]);

                        DB::table('used_promo_code')->insert([
                            'promo_code_user_id' => Crypt::decryptString($_COOKIE['UserIds']), 
                            'promo_code_number' => $promo
                            ]);
                            return true;
                    }else{
                        return false;
                    }
                    }
                }
            }else{
                $prom_o= DB::Select("SELECT * FROM promo_code WHERE promo_code= '".$promo."'");
                    if(count($prom_o) > 0){
                        // DB::table('payment_transactions')->where('pt_u_id', Crypt::decryptString($_COOKIE['UserIds']))->update([
                        //     'pt_start_date' => $start_date,
                        //     'pt_end_date' => $stop_date,
                        //     'pt_ack' =>'',
                        //     'pt_currency' => '',
                        //     'pt_amount' =>'0',
                        //     'pt_transaction_id' => 'promo_code|' . $promo      
                        // ]);

                        DB::table('used_promo_code')->insert([
                            'promo_code_user_id' => Crypt::decryptString($_COOKIE['UserIds']), 
                            'promo_code_number' => $promo
                            ]);
                            return true;
                    }else{
                        return false;
                    }
            }
            
        }

        //return true;
  
       //return redirect('/membership');

    }

    ////////////////////////////////////////////////////
 
       

     public function logout() {
       setcookie("UserIds", "", time() - 3600);
       setcookie("UserEmail", "", time() - 3600);
       setcookie("UserFullName", "", time() - 3600);
       setcookie("UserSex", "", time() - 3600);
       setcookie("_gooDal", "", time() - 3600);
         return redirect('/login');
     }



    
}
