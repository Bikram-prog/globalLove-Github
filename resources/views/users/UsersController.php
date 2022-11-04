<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agent;
use App\Models\UsersMeta;
use App\Models\UsersReport;
use App\Models\UsersMetaStatus;
use App\Models\Notifications;
use App\Models\UserPhotos;
use App\Models\Connectionsfinal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use DateTime;
use Mail;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\service\CacheClear;
use Twilio\Rest\Client;


class UsersController extends Controller
{

    public $mutual = [];

    public function home(){

        if (!isset($_COOKIE['UserIds'])) {

            $register_info = new User(); 

            $users = [
                'totalusers'  => $register_info->getTotalUser(),
                'totaluserschat'  => $register_info->getTotalUserChat(),
                'totaluserslike'  => $register_info->getTotalUserLike(),
                'men'   => $register_info->getTotalUserMen(),
                'women' => $register_info->getTotalUserWomen(),
                'gay' => $register_info->getTotalUserTrans()
            ];

           // dd($users);

          $data= DB::table('admin_text')->get();


          $testimonial= DB::table('testimonial')
          ->orderBy('testimonial.id', 'DESC')
          ->get();

          $newmembershero = DB::table('users')
          ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
          ->where('users.prfl_photo_path', '!=', 'https://www.globallove.online/images/male-user-placeholder.png')
          ->where('users_metas.sex', '=', 'Female')
          ->where('users_metas.country', '=', 'Phillipines')
          ->inRandomOrder()
          ->take(5)
          ->get();

          $newmembers = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->where('users.prfl_photo_path', '!=', 'https://www.globallove.online/images/male-user-placeholder.png')
                ->where('users_metas.sex', '=', 'Female')
                ->where('users_metas.country', '=', 'Phillipines')
                ->inRandomOrder()
                ->take(18)
                ->get();

          

          
        return view('users.home')->with(['data'=> $data,'users'=> $users,'testimonial'=> $testimonial,'newmembers'=> $newmembers,'newmembershero'=> $newmembershero]);
       }

        return redirect('/browse');
        
    }

    public function signupForFree(){

        if (!isset($_COOKIE['UserIds'])) {

          $newmembers = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->where('prfl_photo_path', '!=', 'https://www.globallove.online/images/male-user-placeholder.png')
                ->orderBy('users.id', 'DESC')
                ->take(12)
                ->get();
  
        return view('users.signup_fr_free')->with(['newmembers'=> $newmembers]);
       }

        return redirect('/browse');
        
    }

    public function viewMobileNotification(){

      if (!isset($_COOKIE['UserIds'])) {
        return redirect('/dashboard');
       }else{
        return view('users.mobnotificaton');
       }

      
    }
	
    public function agentsignup(){
   
       	return view('users.agentsignup');
	
    }

    public function agentsignupaction(Request $request){


        
    	$register_info = new Agent(); 
        $register_info->name = request('name');
        $register_info->email  = request('email');
        $register_info->street  = request('street');
        $register_info->city  = request('city');
        $register_info->state  = request('state');
        $register_info->zipcode  = request('zipcode');
        $register_info->country  = request('country');
        $register_info->payment_type  = request('payment_type');
        $register_info->account  = request('account');
        
        $saved = $register_info->save();

        if($saved){
            return redirect('/agentsignup')->with(['msg' => 'Account successfully created. Our review team will validate your info.']);
        }else{
            return redirect('/agentsignup')->with(['msg' => 'Error creating your account']);
        }
      
       
    
    }


    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function signup(){

    	if (isset($_COOKIE['UserIds'])) {
        return redirect('/browse');
       }else{
       	return view('users.signup');
       }

    	
    }

    public function signupaction(Request $request){

        $this->validate($request,[
        'name'=>'required',
        'email'=>'required|max:32|unique:users',
        'psw'=>'required|min:8|max:16|required_with:repsw|same:repsw',
        'repsw'=>'required|min:8|max:16',
        'dob'=>'before_or_equal:-18 years',
        'sex'=>'required',
        'country'=>'required',
        's_address1'=>'required',
        's_state'=>'required',
        's_city'=>'required',
        's_zip'=>'required',
        'hear_us'=>'required'
        ], 
        [
            'name.required'=> 'Fullname is required', // custom message
            'email.required'=> 'Email is required', // custom message
            'email.max'=> 'Email should be maximum of 32 characters', // custom message
            'email.unique'=> 'Email is already registered', // custom message
            'psw.required'=> 'Password is required', // custom message
            'psw.min'=> 'Password should be minimum of 8 characters', // custom message
            'psw.max'=> 'Password should be maximum of 16 characters', // custom message
            'psw.same'=> 'Password is mismatch', // custom message,
            'psw.required_with'=> 'Password is mismatch', // custom message,
            'repsw.required'=> 'Password is required', // custom message
            'repsw.min'=> 'Re-type Password should be minimum of 8 characters', // custom message
            'repsw.max'=> 'Re-type Password should be maximum of 16 characters', // custom message
            'sex.required'=> 'Sex is required', // custom message
            'dob.before_or_equal'=> 'You must be 18 years old or above', // custom message,
            'country.required'=> 'Country is required', // custom message
            's_address1.required'=> 'Address1 is required', // custom message
            's_state.required'=> 'State/Province is required', // custom message
            'S_city.required'=> 'City is required', // custom message
            's_zip.required'=> 'Postcode/Zipconde is required' // custom message

        ]);
            
        // $bday = new DateTime($request->input('dob'));
        // $today = new Datetime(date('y.m.d'));
        // $diff = $today->diff($bday);

     
        
    	$register_info = new User(); 
        $register_info->name = request('name');
        $register_info->email  = request('email');
        $register_info->password = md5(request('psw'));
        // $register_info->email_verified_at  = date('Y-m-d H:i:s');
        $register_info->agent_code = request('agent_code');
        $register_info->token_id = $this->generateRandomString(6);
        $register_info->prfl_photo_path  = 'https://www.globallove.online/images/male-user-placeholder.png';

        $data = User::where('email', '=', [request('email')])->get();
        if(count($data) == 0 && request('psw') == request('repsw')){
        $register_info->save();

        $user = User::where('email', '=', [request('email')])->first();

        $register = new UsersMeta(); 
        $register->user_id = $user->id;
        $register->sex = request('sex');
        $register->country = request('country');
        $register->looking_for = request('looking_fr');
        $register->s_address1 = request('s_address1');
        $register->s_address2 = request('s_address2');
        $register->s_state = request('s_state');
        $register->s_city = request('s_city');
        $register->s_zip = request('s_zip');

        $age = date('Y');
        $age = ($age - substr(request('dob'),-4));
        $register->age = $age;
        $register->dob = request('dob');
        $register->hear_about_us = request('hear_us');
     
        $register->save();

        // $heading = new UsersMetaStatus(); 
        // $heading->user_id = $user->id;
        // $heading->metas_field_name = 'heading';
        // $heading->status = 0;
        // $heading->save();

        // $prtnr_typ_desc = new UsersMetaStatus(); 
        // $prtnr_typ_desc->user_id = $user->id;
        // $prtnr_typ_desc->metas_field_name = 'prtnr_typ_desc';
        // $prtnr_typ_desc->status = 0;
        // $prtnr_typ_desc->save();

        // $about = new UsersMetaStatus(); 
        // $about->user_id = $user->id;
        // $about->metas_field_name = 'about';
        // $about->status = 0;
        // $about->save();

        DB::table('users_match')->insert([
            'users_match_id' => $user->id,
            'match_seeking' => request('looking_fr'),
            'match_occupation' => "All"
              
        ]);

        
    $mail= request('email');

        $dataa = "https://www.globallove.online/verifyaccount/" . $user->id;
      Mail::send(['html'=>'users.email_verification_template'], ['text'=>$dataa], function($message) use ($mail, $dataa)  {
         $message->to($mail)->subject
            ('Verify Account.');
         $message->from('noreply@wwwmedia.world','GlobalLove');
      });


    $mail2= 'newuseralert@wwwmedia.world';
    //$mail2= 'remorozadarrel@gmail.com';
      $dataa2 = "https://www.globallove.online/u/adminlogin";
      $datauser = array('name' => $register_info->name,'email' => $register_info->email,'agent_code' =>$register_info->agent_code,'sex'  =>$register->sex,'country'  =>$register->country,'looking_for'  => $register->looking_for,'dob'  => $register->dob);
      Mail::send(['html'=>'admin.admin_view_users_email_template'], ['text'=>$dataa2,'user'=>$datauser], function($message) use ($mail2, $dataa2)  {
         $message->to($mail2)->subject
            ('You have a new user.');
         $message->from('noreply@wwwmedia.world','GlobalLove');
      });

      ////////// Send Message Alert ///////////////

      $message = "You have a new User on Globallove.";
            
            // Your Account SID and Auth Token from twilio.com/console
            $sid = env('TWILIO_ACCOUNT_SID');
            $token = env('TWILIO_API_KEY_SECRET');
            $client = new Client($sid, $token);

            // Use the client to do fun stuff like send text messages!
            $client->messages->create(
                // the number you'd like to send the message to
                '+61481817663',
                [
                    // A Twilio phone number you purchased at twilio.com/console
                    'from' => '+61488852385',
                    // the body of the text message you'd like to send
                    'body' => $message
                ]
            );

    

        return redirect('/login')->with(['msg' => 'Please check your email for verify your account.']);
    }
     else{

        // if(count($data) > 0){
        //     $validator->addError('email', 'That password is incorrect.');
        // }
           
        return redirect('/signup');
        

       
    }
    }

    public function sendMail(){
        $email = DB::Select('SELECT * FROM users');

        foreach ($email as $ema) {
            $mail= $ema->email;

            $dataa = "https://www.globallove.online/verifyaccount/" . $ema->id;
      Mail::send(['html'=>'users.email_verification_template'], ['text'=>$dataa], function($message) use ($mail, $dataa)  {
         $message->to($mail)->subject
            ('Verify Account.');
         $message->from('noreply@wwwmedia.world','GlobalLove');
      });
        }

        return redirect('/login')->with(['msg' => 'Please check your email for verify your account.']);

    }



  

    public function viewVerifyAccount($id){

        $day = date('Y/m/d H:i:s');

        User::where('id', $id)->update(['email_verified_at' => $day]);
        $user = User::where('id', '=', $id)->first();

        $mail = $user->email;
        $dataa = $user;

        Mail::send(['html'=>'users.email_welcome_template'], ['text'=>$dataa], function($message) use ($mail, $dataa)  {
            $message->to($mail)->subject
               ('Welcome to GlobalLove');
            $message->from('noreply@wwwmedia.world','GlobalLove');
         });
           

        return view('users.verifyaccount');
    }

    public function viewMessages(){

    	$data = DB::select("SELECT * FROM users_chat,users WHERE (users_chat.chat_to_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' OR users_chat.chat_from_id = '".Crypt::decryptString($_COOKIE['UserIds'])."') AND users_chat.chat_from_id=users.id AND users_chat.chat_date_time IN (SELECT MAX(chat_date_time) FROM users_chat GROUP BY chat_from_id) ORDER BY users_chat.chat_date_time DESC");

    	dd($data);


                
        return view('users.message')->with(['messages'=> $data]);
    }

     public function login(){

        if (isset($_COOKIE['UserIds'])) {
            return redirect('/browse');
           }


        return view('users.login');
    }

    public function loginaction(){
        $login_info = new User();
        $login_info->email = request('mail');
        $login_info->password = request('psw');
        $data = DB::select("SELECT t1.*,t2.*,t3.* FROM users t1 LEFT JOIN users_metas t2 ON (t1.id = t2.user_id) LEFT JOIN users_match t3 ON (t1.id = t3.users_match_id) WHERE t1.email = '".request('mail')."' AND t1.password = '".md5(request('psw'))."'");

    
        if(count($data) == '1'){
            
            if($data[0]->email_verified_at == ""){
                return redirect('/login')->with('msg','Please verify your email first to be able to login.');
            }
    

                setcookie('UserEmail', Crypt::encryptString($data[0]->email), time() + (86400 * 365), "/");
                setcookie('UserFullName', Crypt::encryptString($data[0]->name), time() + (86400 * 365), "/");
                setcookie('UserIds', Crypt::encryptString($data[0]->id), time() + (86400 * 365), "/");
                setcookie('UserCountry', Crypt::encryptString($data[0]->country), time() + (86400 * 365), "/");
                setcookie('LookingFor', Crypt::encryptString($data[0]->match_seeking), time() + (86400 * 365), "/");
          
        
          echo "<script>window.ReactNativeWebView.postMessage('loggedin')</script>";
            return redirect('/profile');
        }else{
       return redirect('/login')->with('msg','E-mail or password are incorrect');
      }   
}

    public function viewAccount(){

        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 
       $data = User::where('id', '=', [Crypt::decryptString($_COOKIE['UserIds'])])->get();

        return view('users.changepassword')->with(['account'=> $data]);
    }

     public function changePasswordAction(Request $request){
            
            
        $data = User::where('id', '=', [Crypt::decryptString($_COOKIE['UserIds'])])->get();
            
            if(md5($request->input('curretpswrd')) == $data[0]->password){
                
                     User::where('id',Crypt::decryptString($_COOKIE['UserIds']))->update(['password' => md5($request->input('newpswrd'))]);
                    
                     return redirect('/account')->with(['updatepas' => 'Password updated successfully.']);
                     
                 
                     
            }
                else{
                     return redirect('/account')->with(['errpas' => 'Error! Enter Your Correct Password.']);
                 }
            
        }

    public function dashboard(){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 
	   $data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->where('users.id', '!=', Crypt::decryptString($_COOKIE['UserIds']))
                ->orderBy('users.id', 'DESC')
                ->get();

       $photo = User::where('id', '=', [Crypt::decryptString($_COOKIE['UserIds'])])->get();

       $user = DB::select("SELECT * FROM connectionsfinals WHERE user_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");
        

        foreach ($user as $use) {

          $this->mutual[] =  DB::select("SELECT t1.*,t2.*,t3.* FROM connectionsfinals t1 LEFT JOIN users_metas t2 ON (t1.user_id = t2.user_id) LEFT JOIN users t3 ON (t1.user_id = t3.id) WHERE t1.user_id = '".$use->you_like."' AND t1.you_like = '".Crypt::decryptString($_COOKIE['UserIds'])."'");
          

        }
        $filter = array_filter($this->mutual);

         if(count($filter) > 0){
            $mutual = $filter;
        } else{
            $mutual = '0';
        }





    	return view('users.dashboard')->with(['newmembers'=> $data, 'matches'=> $mutual, 'photo'=> $photo]);
    }

    public function browse(Request $request){
        
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);

        } 
 

       $totalusers= DB::select("SELECT *
FROM `users`
LEFT JOIN `users_metas` ON `users_metas`.`user_id` = `users`.`id`
LEFT JOIN `users_match` ON `users_match`.`users_match_id` = `users`.`id`
WHERE `users`.`id` != '".Crypt::decryptString($_COOKIE['UserIds'])."' AND `users_metas`.`sex` = '".Crypt::decryptString($_COOKIE['LookingFor'])."'  AND `users`.`prfl_approve_status` = '1' AND `users`.`id` NOT IN ((
SELECT b_who_id
FROM block_users
WHERE b_whom_id = '".Crypt::decryptString($_COOKIE['UserIds'])."'))
ORDER BY `users`.`id` DESC");

$totalusers= $totalusers;

       $limit = 28;
       $offset = (isset($_GET['d']) ? $_GET['d'] : 0);
       $total = $totalusers;



    //cache query
    // $chatUsers = cache()->remember("browse-page", 50, function(){
        
    // });


       // dd(Crypt::decryptString($_COOKIE['LookingFor']));
       
        $data = DB::select("SELECT *
FROM `users`
LEFT JOIN `users_metas` ON `users_metas`.`user_id` = `users`.`id`
LEFT JOIN `users_match` ON `users_match`.`users_match_id` = `users`.`id`
WHERE `users`.`id` != '".Crypt::decryptString($_COOKIE['UserIds'])."' AND `users_metas`.`sex` = '".Crypt::decryptString($_COOKIE['LookingFor'])."'  AND `users`.`prfl_approve_status` = '1' AND `users`.`id` NOT IN ((
SELECT b_who_id
FROM block_users
WHERE b_whom_id = '".Crypt::decryptString($_COOKIE['UserIds'])."'))
ORDER BY `users`.`id` DESC");

    


// 	    $data = DB::select("SELECT *
// FROM `users`
// LEFT JOIN `users_metas` ON `users_metas`.`user_id` = `users`.`id`
// LEFT JOIN `users_match` ON `users_match`.`users_match_id` = `users`.`id`
// WHERE `users`.`id` != '".Crypt::decryptString($_COOKIE['UserIds'])."' AND `users_metas`.`sex` = '".Crypt::decryptString($_COOKIE['LookingFor'])."'  AND `users`.`prfl_approve_status` = '1' AND `users`.`id` NOT IN ((
// SELECT b_who_id
// FROM block_users
// WHERE b_whom_id = '".Crypt::decryptString($_COOKIE['UserIds'])."'))
// ORDER BY `users`.`id` DESC LIMIT $offset,$limit");


	   if (isset($_REQUEST['distance'])){
			$data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('users_match', 'users_match.users_match_id', '=', 'users.id')
                ->where('users.id', '!=', Crypt::decryptString($_COOKIE['UserIds']))
                ->where('users.prfl_approve_status', '=', 1)
                ->where('users_metas.sex', '=', $request->input('distance'))
                ->whereBetween('users_metas.age', [(int)$request->input('fromAge'), (int)$request->input('toAge')])
                ->whereNotIn('users.id', DB::table('block_users')->select('b_who_id')->where('b_whom_id','=', Crypt::decryptString($_COOKIE['UserIds'])))
                ->orderBy('users.created_at', 'desc')
                ->get();
	   }
	  

    	return view('users.browse')->with(['newmembers'=> $data, 'limit'=> $limit, 'totalusers'=> $total]);
    }


    public function onlineuser(Request $request){
        
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);

        } 


       $totalusers =  DB::select("SELECT *
        FROM `users`
        LEFT JOIN `users_metas` ON `users_metas`.`user_id` = `users`.`id`
        LEFT JOIN `users_match` ON `users_match`.`users_match_id` = `users`.`id`
        WHERE `users`.`id` != '".Crypt::decryptString($_COOKIE['UserIds'])."' AND `users_metas`.`sex` = '".Crypt::decryptString($_COOKIE['LookingFor'])."' AND `users`.`prfl_approve_status` = '1' AND `users`.`onln_status` = 'online' AND `users`.`id` NOT IN (
        SELECT b_who_id
        FROM block_users
        WHERE b_whom_id = '".Crypt::decryptString($_COOKIE['UserIds'])."')");
         
         
     $data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('users_match', 'users_match.users_match_id', '=', 'users.id')
                ->where('users_metas.sex', '=', Crypt::decryptString($_COOKIE['LookingFor']))
                ->where('users.id', '!=', Crypt::decryptString($_COOKIE['UserIds']))
                ->where('users.prfl_approve_status', '=', 1)
                ->where('users.onln_status', '=', 'online')
                ->whereNotIn('users.id', DB::table('block_users')->select('b_who_id')->where('b_whom_id','=', Crypt::decryptString($_COOKIE['UserIds'])))
                ->orderBy('users.onln_status', 'desc')
                ->paginate(40);


         
      $count= count($totalusers);
      $page= ceil($count/40);

      if ($request->ajax()) {
            $view = view('data',compact('data'))->render();
            return response()->json(['html'=>$view,'count'=>$page]);
        }
    

      return view('users.onlineuser',compact('data'))->with(['totalusers'=> $totalusers]);



    	// return view('users.onlineuser')->with(['newmembers'=> $data, 'limit'=> $limit, 'totalusers'=> $total]);
    }



    public function userProfile($id){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        }

        

       DB::table('notifications')->insert([
            'notifications_user_id' => Crypt::decryptString($_COOKIE['UserIds']),
            'notifications_to_id' => $id,
            'notifications_key' => "view_profile" 
        ]);

       $data = cache()->remember("user_profile".$id, 60*60*24, function() use($id){
            return DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('user_photos', 'user_photos.user_id', '=', 'users.id')
                ->leftJoin('users_prsnl_qstn', 'users_prsnl_qstn.prsnl_user_id', '=', 'users.id')
                ->leftJoin('users_match', 'users_match.users_match_id', '=', 'users.id')
                ->where('users.id', '=', $id)
                ->whereNotIn('users.id', DB::table('block_users')->select('b_who_id')->where('b_whom_id','=', Crypt::decryptString($_COOKIE['UserIds'])))
                ->get();
            
        });

	   // $data = DB::table('users')
    //             ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
    //             ->leftJoin('user_photos', 'user_photos.user_id', '=', 'users.id')
    //             ->leftJoin('users_prsnl_qstn', 'users_prsnl_qstn.prsnl_user_id', '=', 'users.id')
    //             ->leftJoin('users_match', 'users_match.users_match_id', '=', 'users.id')
    //             ->where('users.id', '=', $id)
    //             ->whereNotIn('users.id', DB::table('block_users')->select('b_who_id')->where('b_whom_id','=', Crypt::decryptString($_COOKIE['UserIds'])))
    //             ->get();

       $heading = cache()->remember("user_profile_head".$id, 60*60*24, function() use($id){
        return DB::table('users_metas_status')
                ->where('users_metas_status.user_id', '=', $id)
                ->where('users_metas_status.metas_field_name', '=', 'heading')
                ->orderBy('users_metas_status.id','DESC')
                ->take(1)
                ->get();
       });

        // $heading = DB::table('users_metas_status')
        //         ->where('users_metas_status.user_id', '=', $id)
        //         ->where('users_metas_status.metas_field_name', '=', 'heading')
        //         ->orderBy('users_metas_status.id','DESC')
        //         ->take(1)
        //         ->get();


       $about = cache()->remember("user_profile_about".$id, 60*60*24, function() use($id){
        return DB::table('users_metas_status')
                ->where('users_metas_status.user_id', '=', $id)
                ->where('users_metas_status.metas_field_name', '=', 'about')
                ->orderBy('users_metas_status.id','DESC')
                ->take(1)
                ->get();
       });

       // $about = DB::table('users_metas_status')
       //          ->where('users_metas_status.user_id', '=', $id)
       //          ->where('users_metas_status.metas_field_name', '=', 'about')
       //          ->orderBy('users_metas_status.id','DESC')
       //          ->take(1)
       //          ->get();    
                
        $prtnr_typ_desc = cache()->remember("user_profile_desc".$id, 60*60*24, function() use($id){
            return DB::table('users_metas_status')
                ->where('users_metas_status.user_id', '=', $id)
                ->where('users_metas_status.metas_field_name', '=', 'prtnr_typ_desc')
                ->orderBy('users_metas_status.id','DESC')
                ->take(1)
                ->get();    
        });

        // $prtnr_typ_desc = DB::table('users_metas_status')
        //         ->where('users_metas_status.user_id', '=', $id)
        //         ->where('users_metas_status.metas_field_name', '=', 'prtnr_typ_desc')
        //         ->orderBy('users_metas_status.id','DESC')
        //         ->take(1)
        //         ->get();           
       


        $users = Connectionsfinal::where('user_id', '=', [Crypt::decryptString($_COOKIE['UserIds'])])
                    ->where('you_like', '=', [$id])
                    ->get();

        $view_profile= DB::select("SELECT * FROM view_profile WHERE pro_user_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' AND view_user_id = '".$id."'");
        $report_profile= DB::select("SELECT * FROM report_users WHERE r_user_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' AND r_who_id = '".$id."' and (r_status = 0 or r_status = 2) ");
        if(count($view_profile) == 0){

            DB::table('view_profile')->insert([
            'pro_user_id' => Crypt::decryptString($_COOKIE['UserIds']), ///je dekhche
            'view_user_id' => $id //jar ta dekhche
        ]);
        }

        $photopost = DB::table('profile_post_photos')
        ->where('profile_post_photos.pro_pic_user_id', '=',$id)
        ->where('profile_post_photos.pro_pic_status', '=','1')
        ->orderBy('profile_post_photos.pro_pic_id','DESC')
        ->get();   
        
        $videopost = DB::table('profile_videos')
        ->where('profile_videos.pro_vid_user_id', '=',$id)
        ->where('profile_videos.pro_vid_status', '=','1')
        ->orderBy('profile_videos.pro_vid_id','DESC')
        ->get();   
        




        if(count($data) > 0) {

        	return view('users.userprofile')->with(['data'=> $data, 'like'=> $users, 'user' => $id, 'heading' => $heading, 'about' => $about, 'prtnr_typ_desc' => $prtnr_typ_desc, 'report' => $report_profile, 'photopost' => $photopost, 'videopost' => $videopost]);
        } else {
        	dd('You have blocked this user.');
        	//return view('users.userprofile')->with(['data'=> $data, 'like'=> $users, 'user' => $id]);
        }
	   
    }

     public function profileSettings(){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 
	 $data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->where('users.id', '=', Crypt::decryptString($_COOKIE['UserIds']))
                ->get();


	   
	   return view('users.profilesettings')->with(['profile'=> $data]);
    }

    public function profilesettingspost(Request $request){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 
	  


		User::where('id',Crypt::decryptString($_COOKIE['UserIds']))->update(['onln_status' => $request->input('onlnstts'), 'display_status' => $request->input('disstts'), 'offline_message' => $request->input('offline_message'), 'subscribe_newsletter' => $request->input('subscribe_newsletter'), 'hide_status' => $request->input('hide_photos')]);

        //observer

        $cacheclear= new CacheClear;
        $cacheclear->clear();
        
        return redirect('/profilesettings');
    }

    public function viewPhotos(){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 
	    $data = DB::table('user_photos')
                ->leftJoin('users', 'users.id', '=', 'user_photos.user_id')
                ->where('user_photos.user_id', '=', Crypt::decryptString($_COOKIE['UserIds']))
                ->orderBy('user_photos.created_at', 'desc')
                ->get();

        $email= DB::Select('SELECT email_verified_at FROM users WHERE id= "'.Crypt::decryptString($_COOKIE['UserIds']).'"');


	   
	   return view('users.viewphotos')->with(['photos'=> $data, 'verify'=> $email]);
    }

    public function viewPhotoUpload(){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 

	   return view('users.uploadphotospost');
    }

    public function photoUploadPost(Request $request){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 


        $folderPath = public_path('images/');
 
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
 
        $imageFullPath = $folderPath.$imageName;
 
        file_put_contents($imageFullPath, $image_base64);

        
        DB::table('profile_post_photos')->insert([
            'pro_pic_user_id' => Crypt::decryptString($_COOKIE['UserIds']),
            'pro_pic_path' => 'https://www.globallove.online/images/' . $imageName,
            'pro_pic_status' => "0"
              
        ]);

        return response()->json(['success'=>'Your Photo Uploaded Successfully']);
 
    }

    public function deletePhotoPostAction($id){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 

	   $deletePhotos = DB::table('profile_post_photos')->where('pro_pic_id', $id)->delete();
       //unlink(public_path('images/')  . $name);

	   return redirect('/profile');
    }

    public function deleteVideoPostAction($id){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 

	   $deletePhotos = DB::table('profile_videos')->where('pro_vid_id', $id)->delete();
       //unlink(public_path('images/')  . $name);

	   return redirect('/profile');
    }

    public function viewUpload(){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 

	   return view('users.photoupload');
    }

    public function uploadPost(Request $request){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 

       $photos= DB::table('user_photos')
       ->where('user_photos.user_id', '=', Crypt::decryptString($_COOKIE['UserIds']))
       ->get();

       $email= DB::table('users')
       ->where('users.id', '=', Crypt::decryptString($_COOKIE['UserIds']))
       ->get();
                

        if(count($photos) < 4 && $email[0]->email_verified_at != ''){

        $folderPath = public_path('images/');
 
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
 
        $imageFullPath = $folderPath.$imageName;
 
        file_put_contents($imageFullPath, $image_base64);

        
            $user_photos = new UserPhotos(); 
            $user_photos->user_id  = Crypt::decryptString($_COOKIE['UserIds']);
            $user_photos->user_photo_path  = 'https://www.globallove.online/images/' . $imageName;
            $user_photos->save();

            User::where('id',Crypt::decryptString($_COOKIE['UserIds']))->update(['prfl_approve_status'=> '0']);

            return response()->json(['success'=>'Your Photo Uploaded Successfully']);
        } else {
            return response()->json(['success'=>"You Can't Add More Than 4 Photos"]);
        }

    
    
    
    }

    public function privatePhotoAction($id){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 
	   UserPhotos::where('user_photo_id',$id)->update(['private_status' => '1']);
	   
	   return redirect('/photos');
    }

    public function unlockPhotoAction($id){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 
	   UserPhotos::where('user_photo_id',$id)->update(['private_status' => '0']);
	   
	   return redirect('/photos');
    }

    public function deletePhotoAction($id,$name){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 

	   $deleteAdd = UserPhotos::where('user_photo_id',$id)->delete();
       unlink(public_path('images/')  . $name);

	   return redirect('/photos');
    }

    public function prflPhotoAction($title){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 

       User::where('id', Crypt::decryptString($_COOKIE['UserIds']))->update(['prfl_photo_path' => 'https://www.globallove.online/images/' . $title, 'prfl_approve_status'=> '1']);

       return redirect('/photos');
    }

    

      public function ajaxRequestPost(Request $request)
    {
        

       if(isset($_POST['user_id'])){ 
        $datat = DB::table('users')
        ->where('users.id', '=', $request->input('like_id'))
        ->get();

        $dataf = DB::table('users')
        ->where('users.id', '=', $request->input('user_id'))
        ->get();

        DB::table('connectionsfinals')->insert([
            'user_id' => $request->input('user_id'), //This Code coming from ajax request
            'you_like' => $request->input('like_id') //This Chief coming from ajax request
        ]);

        DB::table('notifications')->insert([
            'notifications_user_id' => $request->input('user_id'), //This Code coming from ajax request
            'notifications_to_id' => $request->input('like_id'),
            'notifications_key' => "liked_me" //This Chief coming from ajax request
        ]);

        $user_info= DB::select("SELECT * FROM users as u left join users_metas um ON u.id=um.user_id WHERE u.id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

              
        $mail = $datat[0]->email;
        $dataa = '';
      Mail::send(['html'=>'users.email_like_template'], ['text'=>$dataf[0]->name,'from'=>$user_info], function($message) use ($mail, $dataa)  {
         $message->to($mail)->subject
            ('Like Profile');
         $message->from('noreply@wwwmedia.world','GlobalLove');
        });

    

        return redirect('/userprofile/'. $request->input('like_id'));
    }

        if(isset($_POST['sdjdjsdjfs'])){ 
            DB::table('block_users')->insert([
            'b_who_id' => Crypt::decryptString($_COOKIE['UserIds']), 
            'b_whom_id' => $request->input('sdjdjsdjfs'),
            'b_status' => "0" 
        ]);

            DB::table('block_users')->insert([
            'b_who_id' => $request->input('sdjdjsdjfs'), 
            'b_whom_id' => Crypt::decryptString($_COOKIE['UserIds']),
            'b_status' => "1"
        ]);

            return redirect('/browse')->with(['msg'=> 'You have successfully blocked the user']);
        }




        if(isset($_POST['report'])){ 
            $rptid = $request->input('rptid');
            $user = $request->input('user');

        

            UsersReport::insert([
                'r_user_id' => Crypt::decryptString($_COOKIE['UserIds']), 
                'r_who_id' => $user,
                'r_status' => 0]);
      

         return response()->json(['status'=>'done']);

        }


        if(isset($_POST['checksuspended'])){ 
            $rptid = $request->input('r_who_id');


            $user =   UsersReport::where('r_user_id',Crypt::decryptString($_COOKIE['UserIds']))->where('r_status',2)->count();
            if($user > 0){
                return "suspended";
            }else{

                $reportcount =   UsersReport::where('r_who_id',$request->input('r_who_id'))->where('r_status',2)->count();
                if($reportcount > 0){
                    return "suspended";
                }else{
                    return "approve";
                }

            }


              

           

        }


        
        if(isset($_POST['abusive'])){ 
            $chat = $request->input('chat');


            $data= DB::select("SELECT * FROM abuse_word");

                
           foreach($data as $badwords){
                if (stripos($chat, $badwords->word) !== false) {
                    $chat = str_ireplace($badwords->word,substr($badwords->word, 0, 1)."****",$chat);   
          
                    return response()->json(['status'=>'true','msg'=>$chat]);
                 
                }
           }
      
           return response()->json(['status'=>'false','msg'=>'']);

        }




        if(isset($_POST['online_status'])){ 
            $to = $request->input('to_id');
            $from =  Crypt::decryptString($_COOKIE['UserIds']);
            $msg =  $request->input('msg');;

        
            $data= DB::select("SELECT * FROM users WHERE id= '".$to."'");
            $user_info= DB::select("SELECT * FROM users as u left join users_metas um ON u.id=um.user_id WHERE u.id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");
            //return response()->json(['to'=>$data,'from'=>$user_info]);
            
            //offline settings
            if($data[0]->offline_message == 1){
                              
                    //$mail = $user_info[0]->email;
                    $mail = $data[0]->email;
                    //$mail = "remorozadarrel@gmail.com";
                    $dataa = '';
                Mail::send(['html'=>'users.email_offline_template'], ['to'=>$data,'from'=>$user_info,'msg'=>$msg], function($message) use ($mail, $dataa)  {
                    $message->to($mail)->subject
                        ('Message');
                    $message->from('noreply@wwwmedia.world','GlobalLove');
                    });
            }        

         return response()->json(['status'=>'done']);

        }

        if(isset($_POST['checkprofile'])){ 
            $user = DB::select("SELECT * FROM users WHERE id= '".$request->input('id_user')."' and prfl_photo_path = 'https://www.globallove.online/images/male-user-placeholder.png' ");

            if(count($user)){
                return "no profile pic";
            }

            $id_chat_user = DB::select("SELECT * FROM users WHERE id= '".$request->input('id_chat_user')."' and prfl_photo_path = 'https://www.globallove.online/images/male-user-placeholder.png'");

            if(count($id_chat_user)){
                return "user no profile";
            }

        }




        if(isset($_POST['gyfgdydjgjksd'])){ 

            DB::table('block_users')->where('b_who_id', Crypt::decryptString($_COOKIE['UserIds']))
                                    ->where('b_whom_id', $request->input('gyfgdydjgjksd'))
                                    ->delete();


            DB::table('block_users')->where('b_whom_id', Crypt::decryptString($_COOKIE['UserIds']))
                                    ->where('b_who_id', $request->input('gyfgdydjgjksd'))
                                    ->delete();


            return redirect('/browse')->with(['msg'=> 'You have successfully unblocked the user']);
        }



      
    }

      public function ajaxRequestDel(Request $request)
    {

        Connectionsfinal::where('user_id', $request->input('user_id'))
                        ->where('you_like', $request->input('like_id'))
                        ->delete();

       return redirect('/userprofile/'. $request->input('like_id'));
    }




    public function viewBlocklist(){

        $user = DB::table('block_users')
                ->leftJoin('users', 'users.id', '=', 'block_users.b_whom_id')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->where('block_users.b_who_id', '=', Crypt::decryptString($_COOKIE['UserIds']))
                ->where('block_users.b_status', '=', '0')
                ->get();

        return view('users.blocklist')->with(['blocklist'=> $user]);
    }

     public function viewConnection(){

        $user = DB::table('connectionsfinals')
                ->leftJoin('users', 'users.id', '=', 'connectionsfinals.you_like')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->where('connectionsfinals.user_id', '=', Crypt::decryptString($_COOKIE['UserIds']))
                ->where('users.prfl_photo_path', '!=', 'https://www.globallove.online/images/male-user-placeholder.png')
                ->whereNotIn('users.id', DB::table('block_users')->select('b_who_id')->where('b_whom_id','=', Crypt::decryptString($_COOKIE['UserIds'])))
                ->orderBy('connectionsfinals.created_at', 'desc')
                ->get();

        return view('users.connection')->with(['youlike'=> $user]);
    }

    public function viewLikes(){

        $user = DB::table('connectionsfinals')
                ->leftJoin('users', 'users.id', '=', 'connectionsfinals.user_id')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->where('connectionsfinals.you_like', '=', Crypt::decryptString($_COOKIE['UserIds']))
                ->where('users.prfl_photo_path', '!=', 'https://www.globallove.online/images/male-user-placeholder.png')
                ->whereNotIn('users.id', DB::table('block_users')->select('b_who_id')->where('b_whom_id','=', Crypt::decryptString($_COOKIE['UserIds'])))
                ->orderBy('connectionsfinals.created_at', 'desc')
                ->get();

        return view('users.peoplelikesyou')->with(['likeyou'=> $user]);
    }

    public function viewMutualLikes(){

        $user = DB::select("SELECT * FROM connectionsfinals WHERE user_id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");
        

        foreach ($user as $use) {

          $this->mutual[] =  DB::select("SELECT t1.*,t2.*,t3.* FROM connectionsfinals t1 LEFT JOIN users_metas t2 ON (t1.user_id = t2.user_id) LEFT JOIN users t3 ON (t1.user_id = t3.id) WHERE t1.user_id = '".$use->you_like."' AND t1.you_like = '".Crypt::decryptString($_COOKIE['UserIds'])."'");
          

        }
        $filter = array_filter($this->mutual);

         if(count($filter) > 0){
            
            
            return view('users.mutuallikes')->with(['mutual'=> $filter]);
        } else{
            return view('users.mutuallikes')->with(['mutual'=> '0']);
        }
        

        
    }

    public function chatPostAction(Request $request)
    {

        DB::table('users_chat')->insert([
            'chat_from_id' => $request->input('from'),
            'chat_to_id' => $request->input('to'),
            'chat_msg' => $request->input('message')
        ]);



      return redirect('/userprofile/'. $request->input('to'))->with(['msg'=> 'Message send successfully']);
    }

    public function viewForgotPassword(){
        return view('users.forgotpassword');
    }

     public function forgotPasswordAction(Request $request){
     	$data= DB::select("SELECT email FROM users WHERE email= '".$request->input('email')."'");
     	if(count($data) == 1){
     	$day = date('YmdHis');
        $uniqid =  $day . uniqid();
        $mail= $request->input('email');
        $mailunq = $mail . $uniqid; 
        $uniq = hash('sha256', $mailunq);
        $remember_token = md5($uniq);


        User::where('email',$request->input('email'))->update(['remember_token' => $remember_token]);

        $dataa = "https://www.globallove.online/resetpassword/" . $remember_token . "/" . $mail;
      Mail::send(['html'=>'users.email_template'], ['text'=>$dataa], function($message) use ($mail, $dataa)  {
         $message->to($mail)->subject
            ('Reset Password.');
         $message->from('noreply@wwwmedia.world','GlobalLove');
      });
      return redirect('/forgotpassword')->with(['msg'=> 'Please check your email to change your password.']);
     	}
        return redirect('/forgotpassword');
    }

    public function viewResetPassword($token,$mail){

        return view('users.reset_password')->with(['token'=> $token, 'mail'=> $mail]);
    }

    public function resetPasswordAction(Request $request){
    	$data= DB::select("SELECT * FROM users WHERE email= '".$request->input('mail')."' AND remember_token= '".$request->input('token')."'");
    	if(count($data) == 1){
    		if($request->input('psw') == $request->input('newpsw')){
    		User::where('email',$request->input('mail'))->update(['password' => md5($request->input('newpsw'))]);	
    	return redirect('/resetpassword/' . $request->input('token') . '/' . $request->input('mail'))->with(['msg'=> 'Password changed successfully.']);	
    	} else{
    		return redirect('/resetpassword/' . $request->input('token') . '/' . $request->input('mail'))->with(['msg'=> 'Please check both passwords are same.']);
    	} 
        
    }
}


public function unsubscribe($email){
    $data= DB::select("SELECT * FROM users WHERE email= '".Crypt::decryptString($email)."'");
    if(count($data) == 1){
        User::where('email',Crypt::decryptString($email))->update(['subscribe_newsletter' => 0]);	
        return view('users.unsubscribe')->with(['msg'=> 'You have successfully unsubscribe, you will not able to recieve daily update, promotions and marketing email']);
    } else{
        return view('users.unsubscribe')->with(['msg'=> 'Error processing your request.']);
    } 
    
}


public function viewProfile(){

    
    if(!$this->isUserLoginExist()){
        $this->logout();
        return redirect('/login')->with(['msg' => 'You have to login to view your account']);

    } 
			$data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('user_photos', 'user_photos.user_id', '=', 'users.id')
                ->leftJoin('users_prsnl_qstn', 'users_prsnl_qstn.prsnl_user_id', '=', 'users.id')
                ->leftJoin('users_match', 'users_match.users_match_id', '=', 'users.id')
                ->where('users.id', '=', Crypt::decryptString($_COOKIE['UserIds']))
                ->get();

            
        $heading = DB::table('users_metas_status')
                ->where('users_metas_status.user_id', '=', Crypt::decryptString($_COOKIE['UserIds']))
                ->where('users_metas_status.metas_field_name', '=', 'heading')
                ->orderBy('users_metas_status.id','DESC')
                ->take(1)
                ->get();

       $about = DB::table('users_metas_status')
                ->where('users_metas_status.user_id', '=',Crypt::decryptString($_COOKIE['UserIds']))
                ->where('users_metas_status.metas_field_name', '=', 'about')
                ->orderBy('users_metas_status.id','DESC')
                ->take(1)
                ->get();    
                
        $prtnr_typ_desc = DB::table('users_metas_status')
                ->where('users_metas_status.user_id', '=', Crypt::decryptString($_COOKIE['UserIds']))
                ->where('users_metas_status.metas_field_name', '=', 'prtnr_typ_desc')
                ->orderBy('users_metas_status.id','DESC')
                ->take(1)
                ->get();   

        $photopost = DB::table('profile_post_photos')
        ->where('profile_post_photos.pro_pic_user_id', '=',Crypt::decryptString($_COOKIE['UserIds']))
        ->orderBy('profile_post_photos.pro_pic_id','DESC')
        ->get();   
        
        $videopost = DB::table('profile_videos')
        ->where('profile_videos.pro_vid_user_id', '=',Crypt::decryptString($_COOKIE['UserIds']))
        ->orderBy('profile_videos.pro_vid_id','DESC')
        ->get();   


        return view('users.usersprofile')->with(['data'=> $data,'heading'=> $heading,'about'=> $about,'prtnr_typ_desc'=> $prtnr_typ_desc,'photopost'=> $photopost,'videopost'=> $videopost]);
    }

    // public function viewVerifyProfile(){

    
    //     if(!$this->isUserLoginExist()){
    //         $this->logout();
    //         return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
    //     } 
    //             $data = DB::table('users')
    //                 ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
    //                 ->leftJoin('user_photos', 'user_photos.user_id', '=', 'users.id')
    //                 ->leftJoin('users_prsnl_qstn', 'users_prsnl_qstn.prsnl_user_id', '=', 'users.id')
    //                 ->leftJoin('users_match', 'users_match.users_match_id', '=', 'users.id')
    //                 ->where('users.id', '=', Crypt::decryptString($_COOKIE['UserIds']))
    //                 ->get();       
    
    //         return view('users.verifyprofile')->with(['data'=> $data]);
    //     }

    public function viewVerifyProfile(){

     if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 

            $data = DB::table('users')
                    ->where('users.id', '=', Crypt::decryptString($_COOKIE['UserIds']))
                    ->get();          

        return view('users.verifyprofile')->with(['data'=> $data]);
    }

    public function verifyProfileAction(Request $request){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = uniqid().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images/verify_img'), $imageName);

            User::where('id',Crypt::decryptString($_COOKIE['UserIds']))->update(['verify_photo_path'=> 'https://www.globallove.online/images/verify_img/' . $imageName]);

                //$mail= 'kundubikram3@gmail.com';

                $mail= 'gary@bourne.me';
                $mail2= 'admin@wwwmedia.world';

                Mail::send(['html'=>'users.email_verify_profile'], ['text'=>'Verify Request.'], function($message) use ($mail,$mail2)  {
                    $message->to($mail,$mail2)->subject
                       ('Verify Profile - GlobalLove');
                    $message->from('noreply@wwwmedia.world','GlobalLove');
                 });

        return redirect('/verifyprofile')->with(['msg'=> 'Data Updated successfully.']);
        
    }

    public function viewMobEditProfile($id){

                
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);

        } 

        $data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->where('users.id', '=', $id)
                ->orderBy('users.id', 'DESC')
                ->get();

        return view('users.mobileeditprofile')->with(['data'=> $data]);
    }

    public function editMobProfileAction(Request $request){
    
 
    User::where('id',$request->input('id'))->update(['name' => $request->input('name')]);

    UsersMeta::where('user_id',$request->input('id'))->update(['country' => $request->input('country'), 'city' => 'All', 'state' => 'All', 'hair_color' => $request->input('hairclr'),'eye_color' => $request->input('eyeclr'), 'height' => $request->input('height'), 'weight' => $request->input('weight'), 'body_type' => $request->input('bdytyp'), 'ethnicity' => $request->input('ethnicity'), 'body_art' => $request->input('bdyart'),'appearance' => $request->input('apprnce'), 'drink' => $request->input('drink'), 'smoke' => $request->input('smoke'),'relationship' => $request->input('rltnshp'), 'children' => $request->input('childrenHave'), 'num_children' => $request->input('childrenNumber'), 'old_children' => $request->input('childrenOldest'), 'young_children' => $request->input('childrenYoungest'), 'wnt_more_children' => $request->input('wntmorechild'),'pets' => $pets, 'occupation' => $request->input('occptn'), 'emplyment_status' => $request->input('empstatus'), 'annual_income' => $request->input('income'), 'living' => $request->input('lvngsttn'), 'relocate' => $request->input('relocate'), 'nationality' => $request->input('ntnality'),'education' => $request->input('education'), 'language_spoke' => $request->input('langspoke'), 'eng_lang_ability' => $request->input('engablty'),'religion' => $request->input('religion'), 'religious_view' => $request->input('rlgsval'), 'star_sign' => $request->input('starsign'), 'heading' => $request->input('prflhdng'), 'about' => $request->input('about'), 'prtnr_typ_desc' => $request->input('prtnrdesc')]);

        return redirect('/mobeditprofile/' . $request->input('id'))->with(['msg'=> 'Data Updated successfully.']);
    }


	public function viewEditProfile(){
        
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);

        } 
		$data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->where('users.id', '=', Crypt::decryptString($_COOKIE['UserIds']))
                ->orderBy('users.id', 'DESC')
                ->get();

        return view('users.editprofile')->with(['data'=> $data]);
    }

	public function editProfileAction(Request $request){


    //get usermeta before update
    $usersmeta = DB::table('users_metas')
    ->where('users_metas.user_id', '=', Crypt::decryptString($_COOKIE['UserIds']))
    ->get();
 	
 
 	User::where('id',Crypt::decryptString($_COOKIE['UserIds']))->update(['name' => $request->input('name')]);

 	UsersMeta::where('user_id',Crypt::decryptString($_COOKIE['UserIds']))->update(['country' => $request->input('country'), 'city' => 'All', 'state' => 'All', 'hair_color' => $request->input('hairclr'),'eye_color' => $request->input('eyeclr'), 'height' => $request->input('height'), 'weight' => $request->input('weight'), 'body_type' => $request->input('bdytyp'), 'ethnicity' => $request->input('ethnicity'), 'body_art' => $request->input('bdyart'),'appearance' => $request->input('apprnce'), 'drink' => $request->input('drink'), 'smoke' => $request->input('smoke'),'relationship' => $request->input('rltnshp'), 'occupation' => $request->input('occptn'), 'emplyment_status' => $request->input('empstatus'), 'annual_income' => $request->input('income'), 'nationality' => $request->input('ntnality'),'education' => $request->input('education'), 'language_spoke' => $request->input('langspoke'), 'eng_lang_ability' => $request->input('engablty'),'religion' => $request->input('religion'), 'religious_view' => $request->input('rlgsval'), 'star_sign' => $request->input('starsign'), 'heading' => $request->input('prflhdng'), 'about' => $request->input('about'), 'prtnr_typ_desc' => $request->input('prtnrdesc')]);

   

      //dd($usersmeta);
              
        if($usersmeta[0]->heading != $request->input('prflhdng')){


            $UsersMetaheading = UsersMetaStatus::where('user_id',Crypt::decryptString($_COOKIE['UserIds']))->where('metas_field_name','heading')->first();

            if ($UsersMetaheading === null) {

                DB::table('users_metas_status')->insert([
                    'user_id' => Crypt::decryptString($_COOKIE['UserIds']), 
                    'metas_field_name' => 'heading',
                    'metas_old_value' => $usersmeta[0]->heading,
                    'metas_new_value' => $request->input('prflhdng'),
                    'status' => 0]);
 
            
                }else{
                    UsersMetaStatus::where('user_id',Crypt::decryptString($_COOKIE['UserIds']))->where('metas_field_name','heading')->update(['metas_old_value' => $usersmeta[0]->heading,'metas_new_value' => $request->input('prflhdng'),'status' => 0]);
                }

         
        }   
        
        if($usersmeta[0]->about != $request->input('about')){


            $UsersMetaabout = UsersMetaStatus::where('user_id',Crypt::decryptString($_COOKIE['UserIds']))->where('metas_field_name','about')->first();

            if ($UsersMetaabout === null) {

                DB::table('users_metas_status')->insert([
                    'user_id' => Crypt::decryptString($_COOKIE['UserIds']), 
                    'metas_field_name' => 'about',
                    'metas_new_value' => $request->input('about'),
                    'metas_old_value' => $usersmeta[0]->heading,
                    'status' => 0]);
 
            
                }else{


                    UsersMetaStatus::where('user_id',Crypt::decryptString($_COOKIE['UserIds']))->where('metas_field_name','about')->update(['metas_old_value' => $usersmeta[0]->heading,'metas_new_value' => $request->input('about'),'status' => 0]);

                }
        }  
        
        
        $UsersMetaprtnr_typ_desc = UsersMetaStatus::where('user_id',Crypt::decryptString($_COOKIE['UserIds']))->where('metas_field_name','prtnr_typ_desc')->first();

        if ($UsersMetaprtnr_typ_desc === null) {
            DB::table('users_metas_status')->insert([
                'user_id' => Crypt::decryptString($_COOKIE['UserIds']), 
                'metas_field_name' => 'prtnr_typ_desc',
                'metas_old_value' => $usersmeta[0]->prtnr_typ_desc,
                'metas_new_value' => $request->input('prtnrdesc'),
                'status' => 0]);

        
        }else{
            if($usersmeta[0]->prtnr_typ_desc != $request->input('prtnrdesc')){
                UsersMetaStatus::where('user_id',Crypt::decryptString($_COOKIE['UserIds']))->where('metas_field_name','prtnr_typ_desc')->update(['metas_old_value' => $usersmeta[0]->prtnr_typ_desc,'metas_new_value' => $request->input('prtnrdesc'),'status' => 0]);
             }   
        }

    




    User::where('id',Crypt::decryptString($_COOKIE['UserIds']))->update(['prfl_approve_status'=> '0']);

        return redirect('/editprofile')->with(['msg'=> 'Data Updated successfully.']);
    }

    public function viewProfileMatch(){
     
      
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);

        } 

            $data = DB::table('users_match')
                ->where('users_match_id', '=', Crypt::decryptString($_COOKIE['UserIds']))
                ->get();

        return view('users.profilematch')->with(['data'=> $data]);
    }

    public function profileMatchAction(Request $request){



        if (!empty($request->input('bdytyp'))) {
        $arrNew = array_diff($request->input('bdytyp'), ["Any"]);
        $bdytyp = implode(",", $arrNew);
        } else {
            $bdytyp = "All";
        }
        if (!empty($request->input('ethnicity'))) {
            $arrNew = array_diff($request->input('ethnicity'), ["Any"]);
            $ethnicity = implode(",", $arrNew);
        } else {
            $ethnicity= "All";
        }
        if (!empty($request->input('bdyart'))) {
            $arrNew = array_diff($request->input('bdyart'), ["Any"]);
            $bdyart = implode(",", $arrNew);
        } else {
            $bdyart= "All";
        }
        if (!empty($request->input('apprnce'))) {
            $arrNew = array_diff($request->input('apprnce'), ["Any"]);
            $apprnce = implode(",", $arrNew);
        } else {
            $apprnce= "All";
        }
        if (!empty($request->input('drink'))) {
        $arrNew = array_diff($request->input('drink'), ["Any"]);
        $drink = implode(",", $arrNew);
        } else {
            $drink = "All";
        }
        if (!empty($request->input('smoke'))) {
            $arrNew = array_diff($request->input('smoke'), ["Any"]);
            $smoke = implode(",", $arrNew);
        } else {
            $smoke= "All";
        }
        if (!empty($request->input('rltnshp'))) {
            $arrNew = array_diff($request->input('rltnshp'), ["Any"]);
            $rltnshp = implode(",", $arrNew);
        } else {
            $rltnshp= "All";
        }
        if (!empty($request->input('occptn'))) {
            $arrNew = array_diff($request->input('occptn'), ["Any"]);
            $occptn = implode(",", $arrNew);
        } else {
            $occptn= "All";
        }
        if (!empty($request->input('empstatus'))) {
            $arrNew = array_diff($request->input('empstatus'), ["Any"]);
            $empstatus = implode(",", $arrNew);
        } else {
            $empstatus= "All";
        }
        if (!empty($request->input('education'))) {
            $arrNew = array_diff($request->input('education'), ["Any"]);
            $education = implode(",", $arrNew);
        } else {
            $education= "All";
        }
        if (!empty($request->input('engablty'))) {
            $arrNew = array_diff($request->input('engablty'), ["Any"]);
            $engablty = implode(",", $arrNew);
        } else {
            $engablty= "All";
        }
        if (!empty($request->input('rlgsval'))) {
            $arrNew = array_diff($request->input('rlgsval'), ["Any"]);
            $rlgsval = implode(",", $arrNew);
        } else {
            $rlgsval= "All";
        }
        if (!empty($request->input('starsign'))) {
            $arrNew = array_diff($request->input('starsign'), ["Any"]);
            $starsign = implode(",", $arrNew);
        } else {
            $starsign= "All";
        }

        $data= DB::select("SELECT * FROM users_match WHERE users_match_id = '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        if (count($data) == 0) {

            
            DB::table('users_match')->insert([
            'users_match_id' => Crypt::decryptString($_COOKIE['UserIds']), 
            'match_seeking' => $request->input('seeking'),
            'match_min_age' => $request->input('min_age'), 
            'match_max_age' => $request->input('max_age'), 
            'match_country' => $request->input('country'), 
            'match_state' => 'All',
            'match_city' => 'All', 
            'match_min_height' => $request->input('min_height'), 
            'match_max_height' => $request->input('max_height'), 
            'match_min_weight' => $request->input('min_weight'), 
            'match_max_weight' => $request->input('max_weight'), 
            'match_body_type' => $bdytyp,
            'match_body_art' => $bdyart, 
            'match_ethnicity' => $ethnicity,
            'match_appearance' => $apprnce,
            'match_smoke' => $smoke, 
            'match_drink' => $drink, 
            'match_marital_status' => $rltnshp, 
            'match_occupation' => $occptn, 
            'match_emp_status' => $empstatus, 
            'match_income' => $request->input('income'), 
            'match_nationality' => $request->input('ntnality'),
            'match_education' => $education, 
            'match_eng_ability' => $engablty, 
            'match_lang_spoken' => $request->input('langspoke'),
            'match_religion' => $request->input('religion'),
            'match_religious_values' => $rlgsval, 
            'match_star_sign' => $starsign    
        ]);

            

        } else {

            DB::table('users_match')->where('users_match_id', Crypt::decryptString($_COOKIE['UserIds']) )->update([
            'users_match_id' => Crypt::decryptString($_COOKIE['UserIds']), 
            'match_seeking' => $request->input('seeking'),
            'match_min_age' => $request->input('min_age'), 
            'match_max_age' => $request->input('max_age'), 
            'match_country' => $request->input('country'), 
            'match_state' => 'All',
            'match_city' => 'All', 
            'match_min_height' => $request->input('min_height'), 
            'match_max_height' => $request->input('max_height'), 
            'match_min_weight' => $request->input('min_weight'), 
            'match_max_weight' => $request->input('max_weight'), 
            'match_body_type' => $bdytyp,
            'match_body_art' => $bdyart, 
            'match_ethnicity' => $ethnicity,
            'match_appearance' => $apprnce,
            'match_smoke' => $smoke, 
            'match_drink' => $drink, 
            'match_marital_status' => $rltnshp, 
            'match_occupation' => $occptn, 
            'match_emp_status' => $empstatus, 
            'match_income' => $request->input('income'), 
            'match_nationality' => $request->input('ntnality'),
            'match_education' => $education, 
            'match_eng_ability' => $engablty, 
            'match_lang_spoken' => $request->input('langspoke'),
            'match_religion' => $request->input('religion'),
            'match_religious_values' => $rlgsval, 
            'match_star_sign' => $starsign    
        ]);

setcookie('LookingFor', Crypt::encryptString($request->input('seeking')), time() + (86400 * 365), "/");

        }

        return redirect('/match')->with(['msg'=> 'Thanks for answering.']);
    }

    public function viewProfileUsers(){

        $data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('view_profile', 'view_profile.pro_user_id', '=', 'users.id')
                ->where('view_profile.view_user_id', '=', Crypt::decryptString($_COOKIE['UserIds']))
                ->whereNotIn('users.id', DB::table('block_users')->select('b_who_id')->where('b_whom_id','=', Crypt::decryptString($_COOKIE['UserIds'])))
                ->orderBy('view_profile.created_at', 'DESC')
                ->get();

        return view('users.viewprofile')->with(['data'=> $data]);
    }

 public function viewProfileDetails(){

            
    if(!$this->isUserLoginExist()){
        $this->logout();
        return redirect('/login')->with(['msg' => 'You have to login to view your account']);

    } 

    $data = DB::table('users_metas')
                ->where('users_metas.user_id', '=', Crypt::decryptString($_COOKIE['UserIds']))
                ->get();

        return view('users.profiledtls')->with(['hobby'=> $data]);
    }

 public function profileDetailsAction(Request $request){

            
    if(!$this->isUserLoginExist()){
        $this->logout();
        return redirect('/login')->with(['msg' => 'You have to login to view your account']);

    } 
 	
 	if (!empty($request->input('entertnmnt'))) {
 		$arrNew = array_diff($request->input('entertnmnt'), ["Any"]);
 		$entertainment = implode(",", $arrNew);
 	} else {
 		$entertainment= "All";
 	}
 	if (!empty($request->input('food'))) {
 		$arrNew = array_diff($request->input('food'), ["Any"]);
 		$food = implode(",", $arrNew);
 	} else {
 		$food= "All";
 	}
 	if (!empty($request->input('music'))) {
 		$arrNew = array_diff($request->input('music'), ["Any"]);
 		$music = implode(",", $arrNew);
 	} else {
 		$music= "All";
 	}
 	if (!empty($request->input('sports'))) {
 		$arrNew = array_diff($request->input('sports'), ["Any"]);
 		$sports = implode(",", $arrNew);
 	} else {
 		$sports= "All";
 	}
 

 	UsersMeta::where('user_id',Crypt::decryptString($_COOKIE['UserIds']))->update(['entertainment' => $entertainment, 'food' => $food, 'music' => $music, 'sports' => $sports]);

        return redirect('/profiledetails')->with(['msg'=> 'Data Updated successfully.']);
    }

    public function viewPersonalityQuestion(){

                
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);

        } 
        $data= DB::select("SELECT * FROM users_prsnl_qstn WHERE prsnl_user_id = '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        return view('users.personalityquestion')->with(['data'=> $data]);
    }

    public function persnlquestnactn(Request $request){

        $data= DB::select("SELECT * FROM users_prsnl_qstn WHERE prsnl_user_id = '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        if (count($data) == 0) {
            DB::table('users_prsnl_qstn')->insert([
            'prsnl_user_id' => Crypt::decryptString($_COOKIE['UserIds']), 
            'prsnl_movie' => $request->input('movie'),
            'prsnl_book' => $request->input('book'), 
            'prsnl_food' => $request->input('food'), 
            'prsnl_music' => $request->input('music'), 
            'prsnl_hobbies' => $request->input('hobbies'), 
            'prsnl_dress' => $request->input('dressing'), 
            'prsnl_humor' => $request->input('humor'), 
            'prsnl_personality' => $request->input('personality'), 
            'prsnl_like_travel' => $request->input('travel'), 
            'prsnl_diff_cul_prtnr' => $request->input('culture'), 
            'persnl_rmntic_weeknd' => $request->input('weekend'),
            'persnl_prfct_match' => $request->input('match')  
        ]);
        } else{
            DB::table('users_prsnl_qstn')->where('prsnl_user_id', Crypt::decryptString($_COOKIE['UserIds']) )->update(['prsnl_movie' => $request->input('movie'),
            'prsnl_book' => $request->input('book'), 
            'prsnl_food' => $request->input('food'), 
            'prsnl_music' => $request->input('music'), 
            'prsnl_hobbies' => $request->input('hobbies'), 
            'prsnl_dress' => $request->input('dressing'), 
            'prsnl_humor' => $request->input('humor'), 
            'prsnl_personality' => $request->input('personality'), 
            'prsnl_like_travel' => $request->input('travel'), 
            'prsnl_diff_cul_prtnr' => $request->input('culture'), 
            'persnl_rmntic_weeknd' => $request->input('weekend'),
            'persnl_prfct_match' => $request->input('match')]);
        }

        return redirect('/personalityquestion')->with(['msg'=> 'Thanks for answering.']);
    }

    

    public function viewChangeEmail(){
              
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);

        } 

        $data= DB::select("SELECT * FROM users WHERE id = '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        return view('users.change_email')->with(['data'=> $data]);
    }

    public function changeEmailAction(Request $request){

        $data= DB::select("SELECT * FROM users WHERE email = '".$request->input('email')."'");

        if(count($data) == 0) {

            User::where('id',Crypt::decryptString($_COOKIE['UserIds']))->update(['email' => $request->input('email')]);

            return redirect('/changeemail')->with(['msg'=> 'Email updated successfully']);
        }
            return redirect('/changeemail')->with(['msg'=> 'Email allready exist']);
    }

    public function proVideoUpload(){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 

	   return view('users.videoupload');
    }

    public function proVideoUploadPost(Request $request){

        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 

       
                

        $request->validate([
            'file' => 'mimes:mp4|max:51200|required'
            ]);

            

            $fileName = uniqid().'.'.$request->file->extension();  
     
            $request->file->move(public_path('videos'), $fileName);
            

        DB::table('profile_videos')->insert([
            'pro_vid_user_id' => Crypt::decryptString($_COOKIE['UserIds']),
            'pro_vid_path' => 'https://www.globallove.online/videos/' . $fileName,
            'pro_vid_status' => "0"
              
        ]);

        return redirect('/provideoupload')->with(['success' => 'File has been uploaded.']);
        
   }

        
    public function profilePhotoAction(Request $request){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 

       $data= DB::Select('SELECT email_verified_at FROM users WHERE id = "'.Crypt::decryptString($_COOKIE['UserIds']).'"');

       if($data[0]->email_verified_at != ''){

        $folderPath = public_path('images/');
 
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
 
        $imageFullPath = $folderPath.$imageName;
 
        file_put_contents($imageFullPath, $image_base64);

        User::where('id',Crypt::decryptString($_COOKIE['UserIds']))->update(['prfl_photo_path' => 'https://www.globallove.online/images/' . $imageName, 'prfl_approve_status'=> '0']);

        return response()->json(['success'=>'Your Photo Uploaded Successfully']);
       } else {
        return response()->json(['success'=>'Your have to verify your email for uploading photos']);
       }
    }



    /////////////////////////////MOB APP //////////////////////////////////////////////////
    public function viewmobProfileMatch($id){
            $data = DB::table('users_match')
                ->where('users_match_id', '=', $id)
                ->get();

        return view('users.mobprofilematch')->with(['data'=> $data, 'id'=> $id]);
    }

    public function MobProfileMatchAction(Request $request){




        if (!empty($request->input('bdytyp'))) {
        $arrNew = array_diff($request->input('bdytyp'), ["Any"]);
        $bdytyp = implode(",", $arrNew);
        } else {
            $bdytyp = "All";
        }
        if (!empty($request->input('ethnicity'))) {
            $arrNew = array_diff($request->input('ethnicity'), ["Any"]);
            $ethnicity = implode(",", $arrNew);
        } else {
            $ethnicity= "All";
        }
        if (!empty($request->input('bdyart'))) {
            $arrNew = array_diff($request->input('bdyart'), ["Any"]);
            $bdyart = implode(",", $arrNew);
        } else {
            $bdyart= "All";
        }
        if (!empty($request->input('apprnce'))) {
            $arrNew = array_diff($request->input('apprnce'), ["Any"]);
            $apprnce = implode(",", $arrNew);
        } else {
            $apprnce= "All";
        }
        if (!empty($request->input('drink'))) {
        $arrNew = array_diff($request->input('drink'), ["Any"]);
        $drink = implode(",", $arrNew);
        } else {
            $drink = "All";
        }
        if (!empty($request->input('smoke'))) {
            $arrNew = array_diff($request->input('smoke'), ["Any"]);
            $smoke = implode(",", $arrNew);
        } else {
            $smoke= "All";
        }
        if (!empty($request->input('rltnshp'))) {
            $arrNew = array_diff($request->input('rltnshp'), ["Any"]);
            $rltnshp = implode(",", $arrNew);
        } else {
            $rltnshp= "All";
        }
        if (!empty($request->input('occptn'))) {
            $arrNew = array_diff($request->input('occptn'), ["Any"]);
            $occptn = implode(",", $arrNew);
        } else {
            $occptn= "All";
        }
        if (!empty($request->input('empstatus'))) {
            $arrNew = array_diff($request->input('empstatus'), ["Any"]);
            $empstatus = implode(",", $arrNew);
        } else {
            $empstatus= "All";
        }
        if (!empty($request->input('education'))) {
            $arrNew = array_diff($request->input('education'), ["Any"]);
            $education = implode(",", $arrNew);
        } else {
            $education= "All";
        }
        if (!empty($request->input('engablty'))) {
            $arrNew = array_diff($request->input('engablty'), ["Any"]);
            $engablty = implode(",", $arrNew);
        } else {
            $engablty= "All";
        }
        if (!empty($request->input('rlgsval'))) {
            $arrNew = array_diff($request->input('rlgsval'), ["Any"]);
            $rlgsval = implode(",", $arrNew);
        } else {
            $rlgsval= "All";
        }
        if (!empty($request->input('starsign'))) {
            $arrNew = array_diff($request->input('starsign'), ["Any"]);
            $starsign = implode(",", $arrNew);
        } else {
            $starsign= "All";
        }

        $data= DB::select("SELECT * FROM users_match WHERE users_match_id = '".$request->input('id')."'");

        if (count($data) == 0) {

            
            DB::table('users_match')->insert([
            'users_match_id' => $request->input('id'), 
            'match_seeking' => $request->input('seeking'),
            'match_min_age' => $request->input('min_age'), 
            'match_max_age' => $request->input('max_age'), 
            'match_country' => $request->input('country'), 
            'match_state' => 'All',
            'match_city' => 'All', 
            'match_min_height' => $request->input('min_height'), 
            'match_max_height' => $request->input('max_height'), 
            'match_min_weight' => $request->input('min_weight'), 
            'match_max_weight' => $request->input('max_weight'), 
            'match_body_type' => $bdytyp,
            'match_body_art' => $bdyart, 
            'match_ethnicity' => $ethnicity,
            'match_appearance' => $apprnce,
            'match_smoke' => $smoke, 
            'match_drink' => $drink, 
            'match_marital_status' => $rltnshp, 
            'match_occupation' => $occptn, 
            'match_emp_status' => $empstatus, 
            'match_income' => $request->input('income'), 
            'match_nationality' => $request->input('ntnality'),
            'match_education' => $education, 
            'match_eng_ability' => $engablty, 
            'match_lang_spoken' => $request->input('langspoke'),
            'match_religion' => $request->input('religion'),
            'match_religious_values' => $rlgsval, 
            'match_star_sign' => $starsign    
        ]);

            

        } else {

            DB::table('users_match')->where('users_match_id', $request->input('id'))->update([
            'users_match_id' => $request->input('id'), 
            'match_seeking' => $request->input('seeking'),
            'match_min_age' => $request->input('min_age'), 
            'match_max_age' => $request->input('max_age'), 
            'match_country' => $request->input('country'), 
            'match_state' => 'All',
            'match_city' => 'All', 
            'match_min_height' => $request->input('min_height'), 
            'match_max_height' => $request->input('max_height'), 
            'match_min_weight' => $request->input('min_weight'), 
            'match_max_weight' => $request->input('max_weight'), 
            'match_body_type' => $bdytyp,
            'match_body_art' => $bdyart, 
            'match_ethnicity' => $ethnicity,
            'match_appearance' => $apprnce,
            'match_smoke' => $smoke, 
            'match_drink' => $drink, 
            'match_marital_status' => $rltnshp, 
            'match_occupation' => $occptn, 
            'match_emp_status' => $empstatus, 
            'match_income' => $request->input('income'), 
            'match_nationality' => $request->input('ntnality'),
            'match_education' => $education, 
            'match_eng_ability' => $engablty, 
            'match_lang_spoken' => $request->input('langspoke'),
            'match_religion' => $request->input('religion'),
            'match_religious_values' => $rlgsval, 
            'match_star_sign' => $starsign    
        ]);



        }

        return redirect('/mobeditmatch/'. $request->input('id'))->with(['msg'=> 'Thanks for answering.']);
    }

    public function viewMobPersonalityQuestion($id){

        $data= DB::select("SELECT * FROM users_prsnl_qstn WHERE prsnl_user_id = '".$id."'");

        return view('users.mobprsnlqltyqstn')->with(['data'=> $data, 'id'=> $id]);
    }

    public function mobpersnlQuestnActn(Request $request){

        $data= DB::select("SELECT * FROM users_prsnl_qstn WHERE prsnl_user_id = '".$request->input('id')."'");

        if (count($data) == 0) {
            DB::table('users_prsnl_qstn')->insert([
            'prsnl_user_id' => $request->input('id'), 
            'prsnl_movie' => $request->input('movie'),
            'prsnl_book' => $request->input('book'), 
            'prsnl_food' => $request->input('food'), 
            'prsnl_music' => $request->input('music'), 
            'prsnl_hobbies' => $request->input('hobbies'), 
            'prsnl_dress' => $request->input('dressing'), 
            'prsnl_humor' => $request->input('humor'), 
            'prsnl_personality' => $request->input('personality'), 
            'prsnl_like_travel' => $request->input('travel'), 
            'prsnl_diff_cul_prtnr' => $request->input('culture'), 
            'persnl_rmntic_weeknd' => $request->input('weekend'),
            'persnl_prfct_match' => $request->input('match')  
        ]);
        } else{
            DB::table('users_prsnl_qstn')->where('prsnl_user_id', $request->input('id'))->update(['prsnl_movie' => $request->input('movie'),
            'prsnl_book' => $request->input('book'), 
            'prsnl_food' => $request->input('food'), 
            'prsnl_music' => $request->input('music'), 
            'prsnl_hobbies' => $request->input('hobbies'), 
            'prsnl_dress' => $request->input('dressing'), 
            'prsnl_humor' => $request->input('humor'), 
            'prsnl_personality' => $request->input('personality'), 
            'prsnl_like_travel' => $request->input('travel'), 
            'prsnl_diff_cul_prtnr' => $request->input('culture'), 
            'persnl_rmntic_weeknd' => $request->input('weekend'),
            'persnl_prfct_match' => $request->input('match')]);
        }

        return redirect('/mobpersonalityquestion/' . $request->input('id'))->with(['msg'=> 'Thanks for answering.']);
    }

    public function viewMobProfileDetails($id){
                
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);

        } 

    $data = DB::table('users_metas')
                ->where('users_metas.user_id', '=', $id)
                ->get();

        return view('users.mobprofiledetails')->with(['hobby'=> $data, 'id'=> $id]);
    }


   public function reportAction($id){
                
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
        } 

        return view('users.report')->with(['id'=> $id]);
    }

       public function savereportAction(Request $request){
                
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
        } 



        if(isset($_POST['submit'])){ 



            $reportcount =   UsersReport::where('r_who_id',$request->input('r_who_id'))->where(function($q) {
                $q->where('r_status', 2)
                  ->orWhere('r_status', 0);
            })->count();
            if($reportcount > 0){
                return view('users.report')->with(['id'=> $request->input('r_who_id'),'msg'=> 'This user is already suspended or has pending report. ']);
            }  


                $newid = UsersReport::insert([
                    'r_user_id' => Crypt::decryptString($_COOKIE['UserIds']), 
                    'r_who_id' => $request->input('r_who_id'),
                    'r_comments' => $request->input('reportcomment'),
                    'r_status' => 0]);
                
        
                    return view('users.report')->with(['id'=> $request->input('r_who_id'),'msg'=> 'Thank you for submitting the report. Our review team will validate your report. ']);
                

        }



        return view('users.report')->with(['id'=> $id]);
    }

 public function mobprofileDetailsAction(Request $request){


    
    if (!empty($request->input('entertnmnt'))) {
        $arrNew = array_diff($request->input('entertnmnt'), ["Any"]);
        $entertainment = implode(",", $arrNew);
    } else {
        $entertainment= "All";
    }
    if (!empty($request->input('food'))) {
        $arrNew = array_diff($request->input('food'), ["Any"]);
        $food = implode(",", $arrNew);
    } else {
        $food= "All";
    }
    if (!empty($request->input('music'))) {
        $arrNew = array_diff($request->input('music'), ["Any"]);
        $music = implode(",", $arrNew);
    } else {
        $music= "All";
    }
    if (!empty($request->input('sports'))) {
        $arrNew = array_diff($request->input('sports'), ["Any"]);
        $sports = implode(",", $arrNew);
    } else {
        $sports= "All";
    }
 

    UsersMeta::where('user_id',$request->input('id'))->update(['entertainment' => $entertainment, 'food' => $food, 'music' => $music, 'sports' => $sports]);

        return redirect('/mobprofiledetails/' . $request->input('id'))->with(['msg'=> 'Data Updated successfully.']);
    }


    public function ajaxNotifUpdate(){
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);
    
        } 

        //dd("xxx");
	   Notifications::where('notifications_to_id',Crypt::decryptString($_COOKIE['UserIds']))->update(['status' => '1']);
	   
	   return true;
    }


    ///////////////////////////// END MOB APP //////////////////////////////////////////////////
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


    public function logout() {
      setcookie("UserIds", "", time() - 3600);
      setcookie("UserEmail", "", time() - 3600);
      setcookie("UserFullName", "", time() - 3600);
      setcookie("UserSex", "", time() - 3600);
      setcookie("_gooDal", "", time() - 3600);
        return redirect('/login');
    }

    public function appLogout() {
      setcookie("UserIds", "", time() - 3600);
      setcookie("UserEmail", "", time() - 3600);
      setcookie("UserFullName", "", time() - 3600);
      setcookie("UserSex", "", time() - 3600);
      setcookie("_gooDal", "", time() - 3600);
        return json_encode('logout');
    }

    public function deleteALl() {
        DB::query("set foreign_key_checks = 0");
        DB::query("truncate table users");
        DB::query("truncate table users_metas");
        DB::query("truncate table user_photos");
        DB::query("truncate table users_prsnl_qstn");
        DB::query("truncate table users_match");



        
    }


    //Browse Pagination /////////////

    public function browse2(Request $request){
        
        if(!$this->isUserLoginExist()){
            $this->logout();
            return redirect('/login')->with(['msg' => 'You have to login to view your account']);

        } 
 

       $totalusers= DB::select("SELECT *
FROM `users`
LEFT JOIN `users_metas` ON `users_metas`.`user_id` = `users`.`id`
LEFT JOIN `users_match` ON `users_match`.`users_match_id` = `users`.`id`
WHERE `users`.`id` != '".Crypt::decryptString($_COOKIE['UserIds'])."' AND `users_metas`.`sex` = '".Crypt::decryptString($_COOKIE['LookingFor'])."'  AND `users`.`prfl_approve_status` = '1' AND `users`.`id` NOT IN ((
SELECT b_who_id
FROM block_users
WHERE b_whom_id = '".Crypt::decryptString($_COOKIE['UserIds'])."'))
ORDER BY `users`.`id` DESC");

$totalusers= $totalusers;

       
        $data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('users_match', 'users_match.users_match_id', '=', 'users.id')
                ->where('users_metas.sex', '=', Crypt::decryptString($_COOKIE['LookingFor']))
                ->where('users.id', '!=', Crypt::decryptString($_COOKIE['UserIds']))
                ->where('users.prfl_photo_path', '!=', 'https://www.globallove.online/images/male-user-placeholder.png')

                ->where('users.prfl_approve_status', '=', 1)
                ->whereNotIn('users.id', DB::table('block_users')->select('b_who_id')->where('b_whom_id','=', Crypt::decryptString($_COOKIE['UserIds'])))
                ->orderBy('users.name', 'desc')
                ->paginate(40);


         
      $count= count($totalusers);
      $page= ceil($count/40);

    





     if (isset($_REQUEST['distance'])){
      $data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('users_match', 'users_match.users_match_id', '=', 'users.id')
                ->where('users.id', '!=', Crypt::decryptString($_COOKIE['UserIds']))
                ->where('users.prfl_approve_status', '=', 1)
                ->where('users_metas.sex', '=', $request->input('distance'))
                ->whereBetween('users_metas.age', [(int)$request->input('fromAge'), (int)$request->input('toAge')])
                ->whereNotIn('users.id', DB::table('block_users')->select('b_who_id')->where('b_whom_id','=', Crypt::decryptString($_COOKIE['UserIds'])))
                ->orderBy('users.prfl_photo_path', 'asc')
                ->inRandomOrder()
                ->paginate(200);




     }

     if ($request->ajax()) {
            $view = view('data',compact('data'))->render();
            return response()->json(['html'=>$view,'count'=>$page]);
        }
    

      return view('users.browse2',compact('data'));
    }

    public function preferredLanguage() {

        $data= DB::table('users')->where('id', Crypt::decryptString($_COOKIE['UserIds']))
        ->get();

      return view('/users.preferred_language')->with(['data'=>$data]);
    }

    public function preferredLanguagePost(Request $request) {
    
        User::where('id', Crypt::decryptString($_COOKIE['UserIds']))->update(['users_lang' => $request->input('language')]);
      
      return redirect('/preferredlanguage');
      }
    ///////////////////// Delete Account ///////////////////////////

    public function deleteAccount() {

      
        return view('/users.delete_account');
    }

    public function deleteProfileActionUser(Request $request) {

      $data = DB::select("SELECT * FROM users WHERE id = '".Crypt::decryptString($_COOKIE['UserIds'])."' AND password = '".md5(request('curretpswrd'))."'");
        if(count($data) == '1'){
        DB::table('block_users')->where('b_whom_id', Crypt::decryptString($_COOKIE['UserIds']))->delete();

        DB::table('connectionsfinals')->where('user_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->orwhere('you_like', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->delete();

        DB::table('notifications')->where('notifications_user_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->orwhere('notifications_to_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->delete();

        DB::table('payment_transactions')->where('pt_u_id', Crypt::decryptString($_COOKIE['UserIds']))->delete();

        DB::table('report_users')->where('r_who_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->orwhere('r_user_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->delete();

        $chat_files= DB::table('users_chat')->where('chat_from_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->orwhere('chat_to_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->where('chat_files', '!=', null)
                                      ->get();

        if(count($chat_files) > 0){
          foreach ($chat_files as $chat) {
            if($chat->chat_files != null){
              $str= str_replace("https://www.globallove.online/chat_img/","",$chat->chat_files);

            unlink(public_path('chat_img/')  . $str);
            }
            
          }
        }

        DB::table('users_chat')->where('chat_from_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->orwhere('chat_to_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->delete();

        DB::table('users_chat_rooms')->where('room_from_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->orwhere('room_to_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->delete();

        DB::table('users_match')->where('users_match_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->delete();

        DB::table('users_metas_status')->where('user_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->delete();

        DB::table('users_prsnl_qstn')->where('prsnl_user_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->delete();

        $user_phto_img= DB::table('user_photos')->where('user_id', Crypt::decryptString($_COOKIE['UserIds']))->get();
        if(count($user_phto_img) > 0){
          foreach ($user_phto_img as $img) {
            $userstr= str_replace("https://www.globallove.online/images/","",$img->user_photo_path);
            unlink(public_path('images/')  . $userstr);
          }
        }

        DB::table('user_photos')->where('user_id', Crypt::decryptString($_COOKIE['UserIds']))
                                      ->delete();

        DB::table('view_profile')->where('pro_user_id', Crypt::decryptString($_COOKIE['UserIds']))
                                 ->orwhere('view_user_id', Crypt::decryptString($_COOKIE['UserIds']))
                                  ->delete();

        DB::table('users_metas')->where('user_id', Crypt::decryptString($_COOKIE['UserIds']))
                                ->delete();

        DB::table('users')->where('id', Crypt::decryptString($_COOKIE['UserIds']))
                                ->delete();


      setcookie("UserIds", "", time() - 3600);
      setcookie("UserEmail", "", time() - 3600);
      setcookie("UserFullName", "", time() - 3600);
      setcookie("UserSex", "", time() - 3600);
      setcookie("_gooDal", "", time() - 3600);

          return redirect('/login')->with('msg','Your account deleted successfully.');
        } else {
          return redirect('/delete-account')->with('msg','Please enter correct password.');
        }
    }

    public function tinder($id) {
        $arr = [];
        $sql = DB::select("select * from users where id != '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        foreach($sql as $d) {
            $arr[] = $d->id;
        }

        shuffle($arr);
        $next = next($arr);
        
        return view('users.tinder', ['next' => $next]);
    }
}
