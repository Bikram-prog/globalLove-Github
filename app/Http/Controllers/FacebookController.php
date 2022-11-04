<?php
  

  namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\UsersMeta;
use App\Models\UserPhotos;
use App\Models\Connectionsfinal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;
use Socialite;
use Auth;
use Exception;

class FacebookController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
       // return Socialite::driver('facebook')->redirect();
       return Socialite::driver('facebook')->fields([
        'first_name', 'last_name', 'email', 'gender', 'birthday','name'
        ])->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {


        $user = Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday','name'
        ])->stateless()->user();

        $finduser = User::where('facebook_id', $user->id)->first();

       //dd($user); 
        try {


                if($finduser){

                
        
                   // Auth::login($finduser);

                    setcookie('UserEmail', Crypt::encryptString($user->email), time() + (86400 * 365), "/");
                    setcookie('UserFullName', Crypt::encryptString($user->name), time() + (86400 * 365), "/");
                    setcookie('UserIds', Crypt::encryptString($finduser->id), time() + (86400 * 365), "/");
                    setcookie('UserCountry', Crypt::encryptString("Philippines"), time() + (86400 * 365), "/");

                    $lookingfor  = "";

                    if($user->gender = "female"){
                        $lookingfor = "Male";
                    }else{
                        $lookingfor = "Female";
                    }

                    setcookie('LookingFor', Crypt::encryptString($lookingfor), time() + (86400 * 365), "/");
        
                    return redirect('/browse');
    
                  
            }else{

                $lookingfor  = "";

                if($user->gender = "female"){
                    $lookingfor = "Male";
                }else{
                    $lookingfor = "Female";
                }

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => encrypt('123456dummy'),
                    'prfl_photo_path'=> $user->avatar_original 
                ]);
                 
                //dd($user); 

                $newUsermetas = UsersMeta::create([
                    'user_id' => $newUser->id,
                    'sex' => $user->gender,
                    'looking_for' => $lookingfor,
                    'dob' => $user->user['birthday']
                
                ]);
    
                //Auth::login($newUser);
     
                    setcookie('UserEmail', Crypt::encryptString($user->email), time() + (86400 * 365), "/");
                    setcookie('UserFullName', Crypt::encryptString($user->name), time() + (86400 * 365), "/");
                    setcookie('UserIds', Crypt::encryptString($newUser->id), time() + (86400 * 365), "/");
                    setcookie('UserCountry', Crypt::encryptString("Philippines"), time() + (86400 * 365), "/");
                    setcookie('LookingFor', Crypt::encryptString($lookingfor), time() + (86400 * 365), "/");



                    return redirect('/browse');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}