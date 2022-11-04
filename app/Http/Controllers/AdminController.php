<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersMeta;
use App\Models\UsersReport;
use App\Models\Agent;
use App\Models\Testimonial;
use App\Models\UsersMetaStatus;
use App\Models\UserPhotos;
use App\Models\Connectionsfinal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use DateTime;
use Mail;


class AdminController extends Controller
{
  

    public function viewAdminLogin(){

        return view('admin.admin_login');
    }

    public function viewAccountDetails($id){
      if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

      $data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('user_photos', 'user_photos.user_id', '=', 'users.id')
                ->leftJoin('users_prsnl_qstn', 'users_prsnl_qstn.prsnl_user_id', '=', 'users.id')
                ->leftJoin('users_match', 'users_match.users_match_id', '=', 'users.id')
                ->where('users.id', '=', $id)
                ->get();

               

      $other = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('user_photos', 'user_photos.user_id', '=', 'users.id')
                ->where('users.id', '=', $id)
                ->get();

        $heading = DB::table('users_metas_status')
                ->where('users_metas_status.user_id', '=', $id)
                ->where('users_metas_status.metas_field_name', '=', 'heading')
                ->orderBy('users_metas_status.id','DESC')
                ->take(1)
                ->get();

       $about = DB::table('users_metas_status')
                ->where('users_metas_status.user_id', '=', $id)
                ->where('users_metas_status.metas_field_name', '=', 'about')
                ->orderBy('users_metas_status.id','DESC')
                ->take(1)
                ->get();    
                
        $prtnr_typ_desc = DB::table('users_metas_status')
                ->where('users_metas_status.user_id', '=', $id)
                ->where('users_metas_status.metas_field_name', '=', 'prtnr_typ_desc')
                ->orderBy('users_metas_status.id','DESC')
                ->take(1)
                ->get();           
       

               // dd($other);
        return view('admin.admin_users_details')->with(['data'=> $data, 'other'=> $other, 'heading' => $heading, 'about' => $about, 'prtnr_typ_desc' => $prtnr_typ_desc]);
    }


    public function viewReportedAccountDetails($id){
      if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

      $data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('user_photos', 'user_photos.user_id', '=', 'users.id')
                ->leftJoin('users_prsnl_qstn', 'users_prsnl_qstn.prsnl_user_id', '=', 'users.id')
                ->leftJoin('users_match', 'users_match.users_match_id', '=', 'users.id')
                ->leftJoin('report_users', 'report_users.r_who_id', '=', 'users.id')
                ->where('report_users.r_who_id', '=', $id)
                ->get();

               

      $other = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('user_photos', 'user_photos.user_id', '=', 'users.id')
                ->where('users.id', '=', $id)
                ->get();

        $heading = DB::table('users_metas_status')
                ->where('users_metas_status.user_id', '=', $id)
                ->where('users_metas_status.metas_field_name', '=', 'heading')
                ->orderBy('users_metas_status.id','DESC')
                ->take(1)
                ->get();

       $about = DB::table('users_metas_status')
                ->where('users_metas_status.user_id', '=', $id)
                ->where('users_metas_status.metas_field_name', '=', 'about')
                ->orderBy('users_metas_status.id','DESC')
                ->take(1)
                ->get();    
                
        $prtnr_typ_desc = DB::table('users_metas_status')
                ->where('users_metas_status.user_id', '=', $id)
                ->where('users_metas_status.metas_field_name', '=', 'prtnr_typ_desc')
                ->orderBy('users_metas_status.id','DESC')
                ->take(1)
                ->get();           
       

               // dd($data);
        return view('admin.admin_usersreported_details')->with(['data'=> $data, 'other'=> $other, 'heading' => $heading, 'about' => $about, 'prtnr_typ_desc' => $prtnr_typ_desc]);
    }


    public function AdminLoginPost(Request $request){
        
        $data = DB::select('select * from admin_user where ad_username  =? and ad_password =?',[$request->input('username'),$request->input('pswrd')]);
        if(count($data) == '1'){
          
          Session::put('AdminUserName', $request->input('username'));

            return redirect('/u/adminviewuser');
        }else{
       return redirect('/u/adminlogin')->with('msg','Username or password are incorrect');
      }   
}

    public function viewAdminUsers(){
       if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

        $data= DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('payment_transactions', 'payment_transactions.pt_u_id', '=', 'users.id')
                ->where('users.prfl_approve_status', '=', '0')
                ->orderBy('users.id', 'DESC')
                ->get();

        return view('admin.admin_view_users')->with(['data'=> $data,'text'=> 'For approval users']);
    }

    public function viewAdminVerifyUsers(){
      if (!Session::get('AdminUserName')){
       return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
      }

       $data= DB::table('users')
               ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
               ->where('users.verify_photo_path', '!=', '')
               ->where('users.verify_approve_status', '=', '0')
               ->orderBy('users.id', 'DESC')
               ->get();

       return view('admin.admin_view_verify_users')->with(['data'=> $data,'text'=> 'For Verify users']);
   }

   public function adminVerifyApprove($id,$email){
    if (!Session::get('AdminUserName')){
     return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
    }

    User::where('id',$id)->update(['verify_approve_status' => 1]);

    Mail::send(['html'=>'admin.email_verify_approve_users'], ['text'=>'Your Profile is Verified.'], function($message) use ($email)  {
      $message->to($email)->subject
         ('Approved Verify Profile - GlobalLove');
      $message->from('noreply@wwwmedia.world','GlobalLove');
   });

    return redirect('/u/adminverifyprofile');
 }

 public function adminverifydeny($id,$email){
  if (!Session::get('AdminUserName')){
   return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
  }

  $user_phto_img= DB::table('users')->where('id', $id)->get();
          $userstr= str_replace("https://www.globallove.online/images/verify_img/","",$user_phto_img[0]->verify_photo_path);
          unlink(public_path('images/verify_img/')  . $userstr);

  User::where('id',$id)->update(['verify_approve_status' => 0,'verify_photo_path' => '']);

  Mail::send(['html'=>'admin.email_verify_deny_users'], ['text'=>'Your Profile is Verified.'], function($message) use ($email)  {
    $message->to($email)->subject
       ('Deny Verify Profile - GlobalLove');
    $message->from('noreply@wwwmedia.world','GlobalLove');
 });
        
     return redirect('/u/adminverifyprofile');
}

    public function viewEditDetails($id){
      if (!Session::get('AdminUserName')){
         return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
        }
      
    $data = DB::table('users')
              ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
              ->where('users.id', '=', $id)
              ->orderBy('users.id', 'DESC')
              ->get();

      return view('admin.admin_edit_profile')->with(['data'=> $data]);
  }

  public function adminEditProAction(Request $request){


   //get usermeta before update
   $usersmeta = DB::table('users_metas')
   ->where('users_metas.user_id', '=', $request->input('edit_pro_id'))
   ->get();
   

   User::where('id',$request->input('edit_pro_id'))->update(['name' => $request->input('name')]);

   UsersMeta::where('user_id',$request->input('edit_pro_id'))->update(['country' => $request->input('country'), 'city' => 'All', 'state' => 'All', 'hair_color' => $request->input('hairclr'),'eye_color' => $request->input('eyeclr'), 'height' => $request->input('height'), 'weight' => $request->input('weight'), 'body_type' => $request->input('bdytyp'), 'ethnicity' => $request->input('ethnicity'), 'body_art' => $request->input('bdyart'),'appearance' => $request->input('apprnce'), 'drink' => $request->input('drink'), 'smoke' => $request->input('smoke'),'relationship' => $request->input('rltnshp'), 'occupation' => $request->input('occptn'), 'emplyment_status' => $request->input('empstatus'), 'annual_income' => $request->input('income'), 'nationality' => $request->input('ntnality'),'education' => $request->input('education'), 'language_spoke' => $request->input('langspoke'), 'eng_lang_ability' => $request->input('engablty'),'religion' => $request->input('religion'), 'religious_view' => $request->input('rlgsval'), 'star_sign' => $request->input('starsign'), 'heading' => $request->input('prflhdng'), 'about' => $request->input('about'), 'prtnr_typ_desc' => $request->input('prtnrdesc')]);

  

     //dd($usersmeta);
             
       if($usersmeta[0]->heading != $request->input('prflhdng')){


           $UsersMetaheading = UsersMetaStatus::where('user_id',$request->input('edit_pro_id'))->where('metas_field_name','heading')->first();

           if ($UsersMetaheading === null) {

               DB::table('users_metas_status')->insert([
                   'user_id' => $request->input('edit_pro_id'), 
                   'metas_field_name' => 'heading',
                   'metas_old_value' => $usersmeta[0]->heading,
                   'metas_new_value' => $request->input('prflhdng'),
                   'status' => 0]);

           
               }else{
                   UsersMetaStatus::where('user_id',$request->input('edit_pro_id'))->where('metas_field_name','heading')->update(['metas_old_value' => $usersmeta[0]->heading,'metas_new_value' => $request->input('prflhdng'),'status' => 0]);
               }

        
       }   
       
       if($usersmeta[0]->about != $request->input('about')){


           $UsersMetaabout = UsersMetaStatus::where('user_id',$request->input('edit_pro_id'))->where('metas_field_name','about')->first();

           if ($UsersMetaabout === null) {

               DB::table('users_metas_status')->insert([
                   'user_id' => $request->input('edit_pro_id'), 
                   'metas_field_name' => 'about',
                   'metas_new_value' => $request->input('about'),
                   'metas_old_value' => $usersmeta[0]->heading,
                   'status' => 0]);

           
               }else{


                   UsersMetaStatus::where('user_id',$request->input('edit_pro_id'))->where('metas_field_name','about')->update(['metas_old_value' => $usersmeta[0]->heading,'metas_new_value' => $request->input('about'),'status' => 0]);

               }
       }  
       
       
       $UsersMetaprtnr_typ_desc = UsersMetaStatus::where('user_id',$request->input('edit_pro_id'))->where('metas_field_name','prtnr_typ_desc')->first();

       if ($UsersMetaprtnr_typ_desc === null) {
           DB::table('users_metas_status')->insert([
               'user_id' => $request->input('edit_pro_id'), 
               'metas_field_name' => 'prtnr_typ_desc',
               'metas_old_value' => $usersmeta[0]->prtnr_typ_desc,
               'metas_new_value' => $request->input('prtnrdesc'),
               'status' => 0]);

       
       }else{
           if($usersmeta[0]->prtnr_typ_desc != $request->input('prtnrdesc')){
               UsersMetaStatus::where('user_id',$request->input('edit_pro_id'))->where('metas_field_name','prtnr_typ_desc')->update(['metas_old_value' => $usersmeta[0]->prtnr_typ_desc,'metas_new_value' => $request->input('prtnrdesc'),'status' => 0]);
            }   
       }

   




   User::where('id',$request->input('edit_pro_id'))->update(['prfl_approve_status'=> '0']);

       return redirect('/u/admineditprofile/' . $request->input('edit_pro_id'))->with(['msg'=> 'Data Updated successfully.']);
   }


    public function searchUser(Request $request){
       if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

        // $data= DB::table('users')
        //         ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
        //         ->leftJoin('payment_transactions', 'payment_transactions.pt_u_id', '=', 'users.id')
        //         ->where('users.prfl_approve_status', '=', '0')
        //         ->orderBy('users.id', 'DESC')
        //         ->get();

       $data = '';

        if (isset($_REQUEST['country'])){
          $data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('users_match', 'users_match.users_match_id', '=', 'users.id')
                ->leftJoin('payment_transactions', 'payment_transactions.pt_u_id', '=', 'users.id')
                ->where('users_metas.country', '=', $request->input('country'))
                ->orderBy('payment_transactions.pt_id', 'DESC')
                ->get();

                // $data->appends(['distance' => $request->input('distance'), 'fromAge' => $request->input('fromAge'), 'toAge'=> $request->input('toAge')]);


     }

     if (isset($_REQUEST['email'])){
          $data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('users_match', 'users_match.users_match_id', '=', 'users.id')
                ->leftJoin('payment_transactions', 'payment_transactions.pt_u_id', '=', 'users.id')
                ->where('users.email', '=', $request->input('email'))
                ->orwhere('users.name', 'like', '%' . $request->input('email') . '%')
                ->orderBy('payment_transactions.pt_id', 'DESC')
                ->get();

                // $data->appends(['distance' => $request->input('distance'), 'fromAge' => $request->input('fromAge'), 'toAge'=> $request->input('toAge')]);


     }

     if (isset($_REQUEST['categry']) && $_REQUEST['categry'] == 'Premium'){

          $today = date('Y-m-d H:i:s');

          $data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('users_match', 'users_match.users_match_id', '=', 'users.id')
                ->leftJoin('payment_transactions', 'payment_transactions.pt_u_id', '=', 'users.id')
                ->where('payment_transactions.pt_end_date', '>', $today)
                ->orderBy('payment_transactions.pt_id', 'DESC')
                ->get();

                // $data->appends(['distance' => $request->input('distance'), 'fromAge' => $request->input('fromAge'), 'toAge'=> $request->input('toAge')]);


     }

     if (isset($_REQUEST['categry']) && $_REQUEST['categry'] == 'Standard'){

          $today = date('Y-m-d H:i:s'); 

          $data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('users_match', 'users_match.users_match_id', '=', 'users.id')
                ->leftJoin('payment_transactions', 'payment_transactions.pt_u_id', '=', 'users.id')
                ->where('payment_transactions.pt_end_date', '<', $today)
                ->orwhereNull('payment_transactions.pt_end_date')
                ->orderBy('payment_transactions.pt_id', 'DESC')
                ->get();

                // $data->appends(['distance' => $request->input('distance'), 'fromAge' => $request->input('fromAge'), 'toAge'=> $request->input('toAge')]);
          

     }



        return view('admin.admin_search_user')->with(['data'=> $data,'text'=> 'For approval users']);
    }

    public function viewAdminApproveUsers(){
       if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

        $data= DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('payment_transactions', 'payment_transactions.pt_u_id', '=', 'users.id')
                ->where('users.prfl_approve_status', '=', '1')
                ->orderBy('users.id', 'DESC')
                ->get();

             //   dd($data);

        return view('admin.admin_view_users')->with(['data'=> $data,'text'=> 'Approved users']);
    }

    public function viewAdminDeniedUsers(){
      if (!Session::get('AdminUserName')){
       return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
      }

       $data= DB::table('users')
               ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
               ->leftJoin('payment_transactions', 'payment_transactions.pt_u_id', '=', 'users.id')
               ->where('users.prfl_approve_status', '=', '2')
               ->orderBy('users.id', 'DESC')
               ->get();

       return view('admin.admin_view_users')->with(['data'=> $data,'text'=> 'Denied users']);
   }






      
    public function reportAdminUsers(){
      if (!Session::get('AdminUserName')){
       return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
      }

      $data= DB::table('report_users')
      ->leftJoin('users', 'report_users.r_who_id', '=', 'users.id')
      ->leftJoin('users_metas', 'report_users.r_who_id', '=', 'users_metas.user_id')
      ->where('report_users.r_status', '=', '0')
      ->orderBy('users.id', 'DESC')
      ->get();



       return view('admin.admin_viewreported_users')->with(['data'=> $data,'text'=> 'For approval reported user']);
   }

   public function reportAdminApproveUsers(){
      if (!Session::get('AdminUserName')){
       return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
      }

      $data= DB::table('report_users')
      ->leftJoin('users', 'report_users.r_who_id', '=', 'users.id')
      ->leftJoin('users_metas', 'report_users.r_who_id', '=', 'users_metas.user_id')
      ->where('report_users.r_status', '=', '1')
      ->orderBy('users.id', 'DESC')
      ->get();


       return view('admin.admin_viewreported_users')->with(['data'=> $data,'text'=> 'Approved reported user']);
   }

   public function reportAdminDeniedUsers(){
     if (!Session::get('AdminUserName')){
      return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
     }
     $data= DB::table('report_users')
      ->leftJoin('users', 'report_users.r_who_id', '=', 'users.id')
      ->leftJoin('users_metas', 'report_users.r_who_id', '=', 'users_metas.user_id')
      ->where('report_users.r_status', '=', '2')
      ->orderBy('users.id', 'DESC')
      ->get();


      return view('admin.admin_viewreported_users')->with(['data'=> $data,'text'=> 'Denied reported user']);
  }








    public function viewAdminApproveText(){
      if (!Session::get('AdminUserName')){
       return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
      }

       $data= DB::table('users_metas_status')
               ->leftJoin('users', 'users.id', '=', 'users_metas_status.user_id')
               ->orderBy('users_metas_status.id', 'DESC')
               ->where('users_metas_status.status', '=', 0)
               ->select('*','users_metas_status.id as meta_id')
               ->get();

               //dd($data);

       return view('admin.admin_view_textupdate')->with(['data'=> $data]);
   }


   
   public function viewAdminTextupdateApprove($id){
    if (!Session::get('AdminUserName')){
     return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
    }

    UsersMetaStatus::where('id',$id)->update(['status' => 1]);

    $data= DB::table('users_metas_status')
    ->leftJoin('users', 'users.id', '=', 'users_metas_status.user_id')
    ->orderBy('users_metas_status.id', 'DESC')
    ->where('users_metas_status.status', '=', 0)
    ->select('*','users_metas_status.id as meta_id')
    ->get();

    //dd($data);


    return view('admin.admin_view_textupdate')->with(['data'=> $data]);
 }


 public function viewAdminAgent(){
   if (!Session::get('AdminUserName')){
    return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
   }

    $data= DB::table('agent')
            ->where('agent.status', '=', '0')
            ->orderBy('agent.id', 'DESC')
            ->get();

    return view('admin.admin_view_agent')->with(['data'=> $data,'text'=> 'For approval agents']);
}

public function viewAdminListApproveAgent(){
   if (!Session::get('AdminUserName')){
    return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
   }

    $data= DB::table('agent')
            ->where('agent.status', '=', '1')
            ->orderBy('agent.id', 'DESC')
            ->get();

    return view('admin.admin_view_agent_approve')->with(['data'=> $data,'text'=> 'Approved agents']);
}

public function viewAdminListDenyAgent(){
   if (!Session::get('AdminUserName')){
    return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
   }

    $data= DB::table('agent')
            ->where('agent.status', '=', '2')
            ->orderBy('agent.id', 'DESC')
            ->get();

    return view('admin.admin_view_agent_deny')->with(['data'=> $data,'text'=> 'Denied agents']);
}

public function viewAdminApproveAgent($id){
   if (!Session::get('AdminUserName')){
    return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
   }

   Agent::where('id',$id)->update(['status' => 1]);


   $data= DB::table('agent')
   ->where('agent.status', '=', '0')
   ->orderBy('agent.id', 'DESC')
   ->get();

   $mail = $data[0]->email;

   Mail::send(['html'=>'admin.email_approveagent_template'], ['text'=>$data], function($message) use ($mail, $data)  {
      $message->to($mail)->subject
         ('Agent Update');
      $message->from('noreply@wwwmedia.world','GlobalLove');
   });



return view('admin.admin_view_agent')->with(['data'=> $data]);
}

public function viewAdminDenyAgent($id){
   if (!Session::get('AdminUserName')){
    return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
   }

      Agent::where('id',$id)->update(['status' => 2]);

      $data= DB::table('agent')
      ->where('agent.status', '=', '0')
      ->orderBy('agent.id', 'DESC')
      ->get();

return view('admin.admin_view_agent')->with(['data'=> $data]);
}


public function viewAdminTextupdateDenyReason($id){
  if (!Session::get('AdminUserName')){
   return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
  }


  return view('admin.admin_view_textdeny_reason')->with(['id'=> $id]);
}





 
 
 public function viewAdminTextupdateDeny(Request $request){
  if (!Session::get('AdminUserName')){
   return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
  }

  $data= DB::table('users_metas_status')
  ->leftJoin('users', 'users.id', '=', 'users_metas_status.user_id')
  ->where('users_metas_status.id', '=',$request->input('id'))
  ->get();

  $reason = $request->input('denyreason');

  //dd($data);
  
  $mail = $data[0]->email;

  Mail::send(['html'=>'admin.email_deny_profileupdate_template'], ['text'=>$data,'reason'=> $reason], function($message) use ($mail, $data)  {
     $message->to($mail)->subject
        ('Deny profile update');
     $message->from('noreply@wwwmedia.world','GlobalLove');
  });
   


  $delete = UsersMetaStatus::where('id',$request->input('id'))->delete();

  $data= DB::table('users_metas_status')
  ->leftJoin('users', 'users.id', '=', 'users_metas_status.user_id')
  ->orderBy('users_metas_status.id', 'DESC')
  ->where('users_metas_status.status', '=', 0)
  ->select('*','users_metas_status.id as meta_id')
  ->get();

  //dd($data);


  return redirect('/u/adminviewapprvetext');
}

    public function viewAdminPrflPhotos(){

      if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

        $data = DB::table('users')
                ->get();

        return view('admin.adminviewprflphoto')->with(['data'=> $data]);
    }

    public function viewApprovePrflPhotos(Request $request){

      if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

       $photos= DB::table('user_photos')
       ->where('user_id', '=', $request->input('id'))
       ->where('approve_status', '=', 1)
       ->get()->toArray();

     //dd($photos);
       //set primary photo
      if(count($photos) > 0)
      {
         User::where('id',$request->input('id'))->update(['prfl_photo_path' => $photos[0]->user_photo_path]);
      }

       User::where('id',$request->input('id'))->update(['prfl_approve_status' => '1']);

       $mail = $request->input('email');

      $data = 'abc';
      Mail::send(['html'=>'admin.email_approve_profile_template'], ['text'=>$data], function($message) use ($mail, $data)  {
         $message->to($mail)->subject
            ('Approved Account.');
         $message->from('noreply@wwwmedia.world','GlobalLove');
      });
       
       return redirect('/u/adminuserdtls/'. $request->input('id'));
    }

    public function viewDenyPrflPhotos(Request $request){
       if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

      $status = implode(',',$request->input('reason_status'));

       User::where('id',$request->input('id'))->update(['reason_status' => $status]);

       User::where('id',$request->input('id'))->update(['prfl_approve_status' => '2', 'prfl_photo_path'=> 'https://www.globallove.online/images/male-user-placeholder.png']);
      // unlink(public_path('images/') . 'https://www.globallove.online/images/' . $request->input('image'));


      $data= DB::table('users')
      ->where('id', '=', $request->input('id'))
      ->get();

        $mail = $request->input('email');

      Mail::send(['html'=>'admin.email_deny_profile_template'], ['text'=>$data], function($message) use ($mail, $data)  {
         $message->to($mail)->subject
            ('Deny Account.');
         $message->from('noreply@wwwmedia.world','GlobalLove');
      });

       return redirect('/u/adminuserdtls/' . $request->input('id'));
    }


    public function approveReport(Request $request){

      if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

       UsersReport::where('r_who_id',$request->input('id'))->update(['r_status' => 1]);
       
       return redirect('/u/adminuserreporteddtls/'. $request->input('id'));
    }

    public function denyReport(Request $request){
       if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }


       UsersReport::where('r_who_id',$request->input('id'))->update(['r_status' => 2]);


       return redirect('/u/adminuserreporteddtls/' . $request->input('id'));
    }

    public function viewAdminPhotos(){

      if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

        $data = DB::table('users')
                ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
                ->leftJoin('user_photos', 'user_photos.user_id', '=', 'users.id')
                ->get();

       //UsersReport::where('r_who_id',$request->input('id'))->update(['r_status' => 1]);

        return view('admin.admin_view_photos')->with(['data'=> $data]);
    }

    public function viewApprovePhotos($id,$userid){

      if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

       UserPhotos::where('user_photo_id',$id)->update(['approve_status' => '1']);
       
       return redirect('/u/adminuserdtls/' . $userid);
    }

    public function viewDenyPhotos($id,$userid){
       if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

       $data = DB::table('users')
       ->leftJoin('users_metas', 'users_metas.user_id', '=', 'users.id')
       ->leftJoin('user_photos', 'user_photos.user_id', '=', 'users.id')
       ->where('users.id', $userid)
       ->where('user_photos.user_photo_id', $id)
       ->get();


       $mail = $data[0]->email;


       Mail::send(['html'=>'admin.email_deny_photo_template'], ['text'=>$data], 
       function($message) use ($mail, $data)  
       {
          $message->to($mail)->subject('Deny Account.');
          $message->from('noreply@wwwmedia.world','GlobalLove');
       });

       $delete = UserPhotos::where('user_photo_id',$id)->delete();
       //unlink(public_path('images/'). $name);

       return redirect('/u/adminuserdtls/' . $userid);
    }

    public function viewCountryList(){

      if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

        $data= DB::table('country_price')->get();

        return view('admin.admin_country_listing')->with(['data'=> $data]);
    }

    public function countryListingPost(Request $request){
      if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

    DB::table('country_price')->insert([
            'cp_name' => $request->input('country'),
            'cp_price' => $request->input('amount')
        ]);

        return redirect('/u/countrylisting');
    }

    public function delPricing($id){
       if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

       
            DB::table('country_price')->where('cp_id', $id)
                                    ->delete();

       return redirect('/u/countrylisting');
    }


    public function viewabusewordList(){

      if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

        $data= DB::table('abuse_word')->get();

        return view('admin.admin_abuseword_listing')->with(['data'=> $data]);
    }

    public function abusewordListingPost(Request $request){
      if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

    DB::table('abuse_word')->insert([
            'language' => $request->input('language'),
            'word' => $request->input('word')
        ]);

        return redirect('/u/abusewordlisting');
    }

    public function delabuseword($id){
       if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

       
            DB::table('abuse_word')->where('id', $id)
                                    ->delete();

       return redirect('/u/abusewordlisting');
    }


    public function viewAdminText(){

      if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

        $data= DB::table('admin_text')->get();

        return view('admin.admin_text')->with(['data'=> $data]);
    }

    public function adminTextPost(Request $request){
      if (!Session::get('AdminUserName')){
        return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
       }

    DB::table('admin_text')->where('ad_text_id', '1')->update([
            'ad_text' => $request->input('text')
        ]);

        return redirect('/u/admintext');
    }

    public function deleteProfileAction($id) {

      DB::table('block_users')->where('b_whom_id', $id)->delete();

      DB::table('connectionsfinals')->where('user_id', $id)
                                    ->orwhere('you_like', $id)
                                    ->delete();

      DB::table('notifications')->where('notifications_user_id', $id)
                                    ->orwhere('notifications_to_id', $id)
                                    ->delete();

      DB::table('payment_transactions')->where('pt_u_id', $id)->delete();

      DB::table('report_users')->where('r_who_id', $id)
                                    ->orwhere('r_user_id', $id)
                                    ->delete();

      $chat_files= DB::table('users_chat')->where('chat_from_id', $id)
                                    ->orwhere('chat_to_id', $id)
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

      DB::table('users_chat')->where('chat_from_id', $id)
                                    ->orwhere('chat_to_id', $id)
                                    ->delete();

      DB::table('users_chat_rooms')->where('room_from_id', $id)
                                    ->orwhere('room_to_id', $id)
                                    ->delete();

      DB::table('users_match')->where('users_match_id', $id)
                                    ->delete();

      DB::table('users_metas_status')->where('user_id', $id)
                                    ->delete();

      DB::table('users_prsnl_qstn')->where('prsnl_user_id', $id)
                                    ->delete();

      $user_phto_img= DB::table('user_photos')->where('user_id', $id)->get();
      if(count($user_phto_img) > 0){
        foreach ($user_phto_img as $img) {
          $userstr= str_replace("https://www.globallove.online/images/","",$img->user_photo_path);
          unlink(public_path('images/')  . $userstr);
        }
      }

      DB::table('user_photos')->where('user_id', $id)
                                    ->delete();

      DB::table('view_profile')->where('pro_user_id', $id)
                               ->orwhere('view_user_id', $id)
                                ->delete();

      DB::table('users_metas')->where('user_id', $id)
                              ->delete();

      DB::table('users')->where('id', $id)
                              ->delete();


      //   DB::table('user_photos')->where('user_id', $id)->delete();
      //   DB::table('users_metas')->where('user_id', $id)->delete();
      //   DB::table('connectionsfinals')->where('user_id', $id)->delete();
      //   DB::table('users_metas_status')->where('user_id', $id)->delete();
      //   DB::table('users')->where('id', $id)->delete();
        
        
        return Redirect::back();
    }

    public function adminLogout() {
        
        Session::flush();

        return redirect('/u/adminlogin');
    }

    public function viewAdminStats(Request $request){
      if (!Session::get('AdminUserName')){
       return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
      }
      
      if (isset($_REQUEST['date'])){
      $date = date('Y-m-d 00:00:00', strtotime($_REQUEST['date']));
      $date2 = date('Y-m-d 23:59:59', strtotime($_REQUEST['date']));
      $datedisplay= date('Y-m-d', strtotime($_REQUEST['date']));
      }else{
      $date = date("Y-m-d 00:00:00");
      $date2 = date("Y-m-d 23:59:59");
      $datedisplay= date("Y-m-d");
      }

      $data= DB::table('notifications')  
               ->where('notifications.notifications_key', '=', 'liked_me')
               ->whereBetween('notifications.notifications_date_time', [$date, $date2])
               ->orderBy('notifications.notifications_date_time', 'DESC')
               ->get();

      $message= DB::table('users_chat')  
               ->whereBetween('users_chat.chat_date_time', [$date, $date2])
               ->orderBy('users_chat.chat_date_time', 'DESC')
               ->get();

       return view('admin.admin_view_stats')->with(['data'=> $data,'message'=> $message,'datedisplay'=> $datedisplay]);
   }


    public function viewAdminTestimonial(){
      if (!Session::get('AdminUserName')){
       return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
      }
   
       $data= DB::table('testimonial')
               ->orderBy('testimonial.id', 'DESC')
               ->get();
   
       return view('admin.admin_view_testimonial')->with(['data'=> $data]);
   }

   public function viewAdminTestimonialAdd(){
      if (!Session::get('AdminUserName')){
       return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
      }
   
   
       return view('admin.admin_view_testimonial_add');
   }

   
   public function viewAdminTestimonialEdit($id){
      if (!Session::get('AdminUserName')){
       return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
      }
   

      
      $data= DB::table('testimonial')
      ->where('testimonial.id', '=', $id)
      ->get();

     //   dd($data);


   
       return view('admin.admin_view_testimonial_edit')->with(['data'=>$data]);
   }

      
   public function viewAdminTestimonialEditAction(Request $request){
      if (!Session::get('AdminUserName')){
       return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
      }
   $pics = "";
         // dd($request->file('image'));
         if ($request->hasFile('image')) {

            $file = $request->file('image');
            $file->move(public_path('images'), $file->getClientOriginalName());
            $pics  = 'https://globallove.online/images/'.$file->getClientOriginalName();
         }
           



      DB::table('testimonial')->where('id', request('id'))->update([
         'testimonial' => $request->input('testimonial'),
         'name' => $request->input('name'),
         'address' => $request->input('address'),
         'picture' => $pics
     ]);



               return redirect('/u/adminviewtestimonial');
   }


   public function viewAdminTestimonialDelete($id){

   $delete = Testimonial::where('id',$id)->delete();
 
 
   return redirect('/u/adminviewtestimonial');
 }

   public function viewAdminTestimonialAddAction(Request $request){
      if (!Session::get('AdminUserName')){
       return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
      }
      

         
    	$register_info = new Testimonial(); 
       $register_info->testimonial = request('testimonial');
       $register_info->name  = request('name');
       $register_info->address = request('address');
    
   // dd($request->file('image'));
       if ($request->hasFile('image')) {

      $file = $request->file('image');
      $file->move(public_path('images'), $file->getClientOriginalName());

     }
       $register_info->picture  = 'https://globallove.online/images/'.$file->getClientOriginalName();


      if( $register_info->save()){
         $data= DB::table('testimonial')
         ->orderBy('testimonial.id', 'DESC')
         ->get();

         return view('admin.admin_view_testimonial_add')->with(['data'=> $data]);

      }else{
         return view('admin.admin_view_testimonial_add');

      }
   
     
   }


   public function toDoHome(){
 
     return view('admin.admin_to_do_home');
 }

 public function toDoListLogin(){
  if (isset($_COOKIE['UserFullNameToDo'])) {
    return redirect('/u/to-do-list');
   }
 
  return view('admin.to_do_login');
}

public function toDoLogPost(Request $request){
     
$data = DB::select('select * from admin_to_do_list_reciepent where reciepent_email  =? and reciepent_passwrd =?',[$request->input('username'),$request->input('pswrd')]);
if(count($data) == '1'){
 
  setcookie('UserEmailToDo', Crypt::encryptString($data[0]->reciepent_email), time() + (86400 * 365), "/");
  setcookie('UserFullNameToDo', Crypt::encryptString($data[0]->reciepent_name), time() + (86400 * 365), "/");
  setcookie('UserStatusToDo', Crypt::encryptString($data[0]->reciepent_status), time() + (86400 * 365), "/");

   return redirect('/u/to-do-list');
}else{
return redirect('/u/to-do-list-login')->with('msg','Username or password are incorrect');
}   
}


   public function toDoList(){

    if (!isset($_COOKIE['UserFullNameToDo'])) {
      return redirect('/u/to-do-list-login');
     }

      $data = DB::table('admin_to_do_list_reciepent')->get();
   
       return view('admin.admin-to-do-list')->with(['data'=>$data]);
   }

   public function editToDoList($id){
    if (!isset($_COOKIE['UserFullNameToDo'])) {
      return redirect('/u/to-do-list-login');
     }

     if (Crypt::decryptString($_COOKIE['UserStatusToDo']) == '0') {
      return response()->json(['msg'=>'You are not able to edit to do list.']);
     }

      $name = [];
      $data= DB::table('admin_to_do_list')->where('to_do_list_id', $id)->get();

      
          $explode = explode(",",$data[0]->to_do_list_reciepent);
          foreach($explode as $exp){

            $name[] = $exp;

            }

   
       return view('admin.edit_to_do_list')->with(['data'=>$data,'name'=>$name]);
   }

   public function editToDoListAction(Request $request){

    if($request->image != ''){
      
    
    
    
      $imageName = uniqid().'.'.$request->image->extension();  
    
      $request->image->move(public_path('images/to_do_globallove_img'), $imageName);
    }else{
      $imageName= '';
    }

    $arr=[];
      
      $reciepent= implode(",", $arr);

      $notes= DB::table('admin_to_do_list')->where('to_do_list_id', $request->input('to_do_id'))->get();

        if($request->input('notes_todo') == $notes[0]->to_do_list_notes){

          foreach ($request->input('reciepent') as $id) {
        $data = DB::table('admin_to_do_list_reciepent')
                ->where('reciepent_id', '=', $id)
                ->get();

        $arr[] = $data[0]->reciepent_name;
        $mail= $data[0]->reciepent_email;

            Mail::send(['html'=>'admin.todolist_mail'], ['text'=>$request->input('title_todo')], function($message) use ($mail)  {
          $message->to($mail)->subject
             ('You have a new updated job - ToDoList');
          $message->from('noreply@wwwmedia.world','GlobalLove');
        });

          }

          $reciepent= implode(",", $arr);

          if($imageName != ''){
          DB::table('admin_to_do_list')->where('to_do_list_id', $request->input('to_do_id'))
          ->update([
            'to_do_list_reciepent' => $reciepent,
            'to_do_list_title' => $request->input('title_todo'),
            'to_do_list_desc' => $request->input('desc_todo'),
            'to_do_list_notes' => $request->input('notes_todo'),
            'to_do_list_notes_date_time' => $request->input('notes_date'),
            'to_do_list_datetime' => $request->input('datetime_todo'),
            'to_do_list_target_days' => $request->input('trgt_job_todo'),
            'to_do_list_image' => $imageName,
            'to_do_list_priority' => $request->input('priority')
        ]);
      } else{
        DB::table('admin_to_do_list')->where('to_do_list_id', $request->input('to_do_id'))
          ->update([
            'to_do_list_reciepent' => $reciepent,
            'to_do_list_title' => $request->input('title_todo'),
            'to_do_list_desc' => $request->input('desc_todo'),
            'to_do_list_notes' => $request->input('notes_todo'),
            'to_do_list_notes_date_time' => $request->input('notes_date'),
            'to_do_list_datetime' => $request->input('datetime_todo'),
            'to_do_list_target_days' => $request->input('trgt_job_todo'),
            'to_do_list_priority' => $request->input('priority')
          ]);
      }

        } else {

          foreach ($request->input('reciepent') as $id) {
        $data = DB::table('admin_to_do_list_reciepent')
                ->where('reciepent_id', '=', $id)
                ->get();

        $arr[] = $data[0]->reciepent_name;
        $mail= $data[0]->reciepent_email;

        Mail::send(['html'=>'admin.todolist_mail'], ['text'=>$request->input('title_todo')], function($message) use ($mail)  {
          $message->to($mail)->subject
             ('Notes added to your job - ToDoList');
          $message->from('noreply@wwwmedia.world','GlobalLove');
       });

      }

      $reciepent= implode(",", $arr);

      if($imageName != ''){
        DB::table('admin_to_do_list')->where('to_do_list_id', $request->input('to_do_id'))
        ->update([
          'to_do_list_reciepent' => $reciepent,
          'to_do_list_title' => $request->input('title_todo'),
          'to_do_list_desc' => $request->input('desc_todo'),
          'to_do_list_notes' => $request->input('notes_todo'),
          'to_do_list_notes_date_time' => $request->input('notes_date'),
          'to_do_list_datetime' => $request->input('datetime_todo'),
          'to_do_list_target_days' => $request->input('trgt_job_todo'),
          'to_do_list_image' => $imageName,
          'to_do_list_priority' => $request->input('priority')
      ]);
    } else{
      DB::table('admin_to_do_list')->where('to_do_list_id', $request->input('to_do_id'))
        ->update([
          'to_do_list_reciepent' => $reciepent,
          'to_do_list_title' => $request->input('title_todo'),
          'to_do_list_desc' => $request->input('desc_todo'),
          'to_do_list_notes' => $request->input('notes_todo'),
          'to_do_list_notes_date_time' => $request->input('notes_date'),
          'to_do_list_datetime' => $request->input('datetime_todo'),
          'to_do_list_target_days' => $request->input('trgt_job_todo'),
          'to_do_list_priority' => $request->input('priority')
        ]);
    }

        }
        

   
       return redirect('/u/to-do-list');
   }

   public function addReciepent($name,$email,$psswrd,$status){
    if (!isset($_COOKIE['UserFullNameToDo'])) {
      return redirect('/u/to-do-list-login');
     }
        
        DB::table('admin_to_do_list_reciepent')->insert([
            'reciepent_name' => $name,
            'reciepent_email' => $email,
            'reciepent_passwrd' => $psswrd,
            'reciepent_status' => $status
            
              
        ]);

        Mail::send(['html'=>'admin.admin_todo_rec_mail'], ['name'=>$name, 'email'=> $email, 'psswrd'=> $psswrd], function($message) use ($email)  {
          $message->to($email)->subject
             ('You are added as a reciepent - ToDoList');
          $message->from('noreply@wwwmedia.world','GlobalLove');
       });

       return response()->json(['msg'=>'Reciepent added successfully']);
   }

   public function allReciepent(){
    if (!isset($_COOKIE['UserFullNameToDo'])) {
      return redirect('/u/to-do-list-login');
     }
        
        $data = DB::table('admin_to_do_list_reciepent')->get();

       return response()->json($data);
   }

   public function delReciepent($id){
    if (!isset($_COOKIE['UserFullNameToDo'])) {
      return redirect('/u/to-do-list-login');
     }

     if (Crypt::decryptString($_COOKIE['UserStatusToDo']) == '0') {
      return response()->json(['msg'=>'You are not able to delete reciepent.']);
     }
        
        DB::table('admin_to_do_list_reciepent')->where('reciepent_id', $id)->delete();

       return response()->json(['msg'=>'Reciepent deleted successfully']);
   }

   public function delToDo($id){
    if (!isset($_COOKIE['UserFullNameToDo'])) {
      return redirect('/u/to-do-list-login');
     }

     if (Crypt::decryptString($_COOKIE['UserStatusToDo']) == '0') {
      return response()->json(['msg'=>'You are not able to delete to do list.']);
     }
        
        DB::table('admin_to_do_list')->where('to_do_list_id', $id)->delete();

       return response()->json(['msg'=>'Reciepent deleted successfully']);
   }

   public function inProgressToDoAction($id){
    if (!isset($_COOKIE['UserFullNameToDo'])) {
      return redirect('/u/to-do-list-login');
     }
        
      DB::table('admin_to_do_list')->where('to_do_list_id', $id )->update(['to_do_list_status' => 'In Progress']);
        

       return response()->json(['msg'=>'Reciepent deleted successfully']);
   }

   public function delayToDoAction($id){
    if (!isset($_COOKIE['UserFullNameToDo'])) {
      return redirect('/u/to-do-list-login');
     }
        
      DB::table('admin_to_do_list')->where('to_do_list_id', $id )->update(['to_do_list_status' => 'Delay']);
        

       return response()->json(['msg'=>'Reciepent deleted successfully']);
   }

   public function completeToDoAction($id){
    if (!isset($_COOKIE['UserFullNameToDo'])) {
      return redirect('/u/to-do-list-login');
     }
        
      DB::table('admin_to_do_list')->where('to_do_list_id', $id )->update(['to_do_list_status' => '1']);
        

       return response()->json(['msg'=>'Reciepent deleted successfully']);
   }

   public function addToDoListPost(Request $request){
    if (!isset($_COOKIE['UserFullNameToDo'])) {
      return redirect('/u/to-do-list-login');
     }

     if($request->image != ''){
     
    
    
    
      $imageName = uniqid().'.'.$request->image->extension();  
    
      $request->image->move(public_path('images/to_do_globallove_img'), $imageName);
    }else{
      $imageName= '';
    }

      $arr=[];
      foreach ($request->input('reciepent') as $id) {
        $data = DB::table('admin_to_do_list_reciepent')
                ->where('reciepent_id', '=', $id)
                ->get();

        $arr[] = $data[0]->reciepent_name;
        $mail= $data[0]->reciepent_email;

        Mail::send(['html'=>'admin.todolist_mail'], ['text'=>$request->input('title_todo')], function($message) use ($mail)  {
      $message->to($mail)->subject
         ('You have a new job - ToDoList');
      $message->from('noreply@wwwmedia.world','GlobalLove');
   });

      }
      $reciepent= implode(",", $arr);

        
      if($imageName != ''){
        DB::table('admin_to_do_list')->insert([
          'to_do_list_reciepent' => $reciepent,
          'to_do_list_title' => $request->input('title_todo'),
          'to_do_list_desc' => $request->input('desc_todo'),
          'to_do_list_notes' => $request->input('notes_todo'),
          'to_do_list_notes_date_time' => $request->input('datetime_todo'),
          'to_do_list_datetime' => $request->input('datetime_todo'),
          'to_do_list_target_days' => $request->input('trgt_job_todo'),
          'to_do_list_image' => $imageName,
          'to_do_list_priority' => $request->input('priority')
      ]);
       } else{
        DB::table('admin_to_do_list')->insert([
          'to_do_list_reciepent' => $reciepent,
          'to_do_list_title' => $request->input('title_todo'),
          'to_do_list_desc' => $request->input('desc_todo'),
          'to_do_list_notes' => $request->input('notes_todo'),
          'to_do_list_notes_date_time' => $request->input('datetime_todo'),
          'to_do_list_datetime' => $request->input('datetime_todo'),
          'to_do_list_target_days' => $request->input('trgt_job_todo'),
          'to_do_list_priority' => $request->input('priority')
      ]);
       }
        return redirect('/u/to-do-list');
       //return response()->json(['msg'=> 'Job uploaded successfully']);
   }

   public function openToDo(){
    if (!isset($_COOKIE['UserFullNameToDo'])) {
      return redirect('/u/to-do-list-login');
     }
        

        $data = DB::table('admin_to_do_list')->where('to_do_list_status', '=', '0')->orderBy('to_do_list_datetime', 'asc')->get();

       return response()->json($data);
   }

   public function completeToDo(){
    if (!isset($_COOKIE['UserFullNameToDo'])) {
      return redirect('/u/to-do-list-login');
     }
      
        

        $data = DB::table('admin_to_do_list')->where('to_do_list_status', '=', '1')->orderBy('to_do_list_datetime', 'desc')->get();

       return response()->json($data);
   }

   public function inProgToDo(){
    if (!isset($_COOKIE['UserFullNameToDo'])) {
      return redirect('/u/to-do-list-login');
     }
      
        

        $data = DB::table('admin_to_do_list')->where('to_do_list_status', '=', 'In Progress')->orderBy('to_do_list_datetime', 'desc')->get();

       return response()->json($data);
   }

   public function delayToDo(){
    if (!isset($_COOKIE['UserFullNameToDo'])) {
      return redirect('/u/to-do-list-login');
     }
      
        

        $data = DB::table('admin_to_do_list')->where('to_do_list_status', '=', 'Delay')->orderBy('to_do_list_datetime', 'desc')->get();

       return response()->json($data);
   }

   public function toDoLogout() {
    setcookie("UserEmailToDo", "", time() - 3600, "/");
    setcookie("UserFullNameToDo", "", time() - 3600, "/");
    setcookie("UserStatusToDo", "", time() - 3600, "/");
    
      return redirect('/u/todohome');
  }

   ///////////////////////////// To Do Bescrow ////////////////////////////////////////
   public function toDoListBesLogin(){
    if (isset($_COOKIE['UserFullNameToDoBes'])) {
      return redirect('/u/to-do-list-bes');
     }
 
     return view('admin.to_do_bes_login');
 }

 public function toDoBesLogPost(Request $request){
        
  $data = DB::select('select * from admin_to_do_list_reciepent_bes where reciepent_email  =? and reciepent_passwrd =?',[$request->input('username'),$request->input('pswrd')]);
  if(count($data) == '1'){
    
    setcookie('UserEmailToDoBes', Crypt::encryptString($data[0]->reciepent_email), time() + (86400 * 365), "/");
  setcookie('UserFullNameToDoBes', Crypt::encryptString($data[0]->reciepent_name), time() + (86400 * 365), "/");
  setcookie('UserStatusToDoBes', Crypt::encryptString($data[0]->reciepent_status), time() + (86400 * 365), "/");

      return redirect('/u/to-do-list-bes');
  }else{
 return redirect('/u/to-do-list-bes-login')->with('msg','Username or password are incorrect');
}   
}

   public function toDoListBes(){
    if (!isset($_COOKIE['UserFullNameToDoBes'])) {
      return redirect('/u/to-do-list-bes-login');
     }

    $data = DB::table('admin_to_do_list_reciepent_bes')->get();
 
     return view('admin.admin_to_do_list_bes')->with(['data'=>$data]);
 }

 public function editToDoListBes($id){
    if (!isset($_COOKIE['UserFullNameToDoBes'])) {
      return redirect('/u/to-do-list-bes-login');
     }

     if (Crypt::decryptString($_COOKIE['UserStatusToDoBes']) == '0') {
      return response()->json(['msg'=>'You are not able to edit to do list.']);
     }

    $name = [];
    $data= DB::table('admin_to_do_list_bes')->where('to_do_list_id', $id)->get();

    
        $explode = explode(",",$data[0]->to_do_list_reciepent);
        foreach($explode as $exp){

          $name[] = $exp;

          }

 
     return view('admin.edit_to_do_list_bes')->with(['data'=>$data,'name'=>$name]);
 }

 public function editToDoListActionBes(Request $request){

  if($request->image != ''){
   
  
  
  
    $imageName = uniqid().'.'.$request->image->extension();  
  
    $request->image->move(public_path('images/to_do_bescrow_img'), $imageName);
  }else{
    $imageName= '';
  }

  $arr=[];
    
    $reciepent= implode(",", $arr);

    $notes= DB::table('admin_to_do_list_bes')->where('to_do_list_id', $request->input('to_do_id'))->get();

      if($request->input('notes_todo') == $notes[0]->to_do_list_notes){

        foreach ($request->input('reciepent') as $id) {
      $data = DB::table('admin_to_do_list_reciepent_bes')
              ->where('reciepent_id', '=', $id)
              ->get();

      $arr[] = $data[0]->reciepent_name;
      $mail= $data[0]->reciepent_email;

          Mail::send(['html'=>'admin.todolist_mail'], ['text'=>$request->input('title_todo')], function($message) use ($mail)  {
        $message->to($mail)->subject
           ('You have a new updated job - ToDoList');
        $message->from('noreply@wwwmedia.world','Bescrow');
      });

        }

        $reciepent= implode(",", $arr);


        if($imageName != ''){
        DB::table('admin_to_do_list_bes')->where('to_do_list_id', $request->input('to_do_id'))
        ->update([
          'to_do_list_reciepent' => $reciepent,
          'to_do_list_title' => $request->input('title_todo'),
          'to_do_list_desc' => $request->input('desc_todo'),
          'to_do_list_notes' => $request->input('notes_todo'),
          'to_do_list_notes_date_time' => $request->input('notes_date'),
          'to_do_list_datetime' => $request->input('datetime_todo'),
          'to_do_list_target_days' => $request->input('trgt_job_todo'),
          'to_do_list_image' => $imageName,
          'to_do_list_priority' => $request->input('priority')
      ]);
    }else{
      DB::table('admin_to_do_list_bes')->where('to_do_list_id', $request->input('to_do_id'))
        ->update([
          'to_do_list_reciepent' => $reciepent,
          'to_do_list_title' => $request->input('title_todo'),
          'to_do_list_desc' => $request->input('desc_todo'),
          'to_do_list_notes' => $request->input('notes_todo'),
          'to_do_list_notes_date_time' => $request->input('notes_date'),
          'to_do_list_datetime' => $request->input('datetime_todo'),
          'to_do_list_target_days' => $request->input('trgt_job_todo'),
          'to_do_list_priority' => $request->input('priority')
      ]);
    }

      } else {

        foreach ($request->input('reciepent') as $id) {
      $data = DB::table('admin_to_do_list_reciepent_bes')
              ->where('reciepent_id', '=', $id)
              ->get();

      $arr[] = $data[0]->reciepent_name;
      $mail= $data[0]->reciepent_email;

      Mail::send(['html'=>'admin.todolist_mail'], ['text'=>$request->input('title_todo')], function($message) use ($mail)  {
        $message->to($mail)->subject
           ('Notes added to your job - ToDoList');
        $message->from('noreply@wwwmedia.world','Bescrow');
     });

    }

    $reciepent= implode(",", $arr);

    if($imageName != ''){
      DB::table('admin_to_do_list_bes')->where('to_do_list_id', $request->input('to_do_id'))
      ->update([
        'to_do_list_reciepent' => $reciepent,
        'to_do_list_title' => $request->input('title_todo'),
        'to_do_list_desc' => $request->input('desc_todo'),
        'to_do_list_notes' => $request->input('notes_todo'),
        'to_do_list_notes_date_time' => $request->input('notes_date'),
        'to_do_list_datetime' => $request->input('datetime_todo'),
        'to_do_list_target_days' => $request->input('trgt_job_todo'),
        'to_do_list_image' => $imageName,
        'to_do_list_priority' => $request->input('priority')
    ]);
  }else{
    DB::table('admin_to_do_list_bes')->where('to_do_list_id', $request->input('to_do_id'))
      ->update([
        'to_do_list_reciepent' => $reciepent,
        'to_do_list_title' => $request->input('title_todo'),
        'to_do_list_desc' => $request->input('desc_todo'),
        'to_do_list_notes' => $request->input('notes_todo'),
        'to_do_list_notes_date_time' => $request->input('notes_date'),
        'to_do_list_datetime' => $request->input('datetime_todo'),
        'to_do_list_target_days' => $request->input('trgt_job_todo'),
        'to_do_list_priority' => $request->input('priority')
    ]);
  }

      }
      

 
     return redirect('/u/to-do-list-bes');
 }

 public function addReciepentBes($name,$email,$psswrd,$status){
      
      DB::table('admin_to_do_list_reciepent_bes')->insert([
          'reciepent_name' => $name,
          'reciepent_email' => $email,
          'reciepent_passwrd' => $psswrd,
          'reciepent_status' => $status
            
      ]);

      Mail::send(['html'=>'admin.admin_todo_rec_bes_mail'], ['name'=>$name, 'email'=> $email, 'psswrd'=> $psswrd], function($message) use ($email)  {
        $message->to($email)->subject
           ('You are added as a reciepent - ToDoList');
        $message->from('noreply@wwwmedia.world','Bescrow');
     });

    

     return response()->json(['msg'=>'Reciepent added successfully']);
 }

 public function allReciepentBes(){
      
      $data = DB::table('admin_to_do_list_reciepent_bes')->get();

     return response()->json($data);
 }

 public function delReciepentBes($id){

  if (Crypt::decryptString($_COOKIE['UserStatusToDoBes']) == '0') {
    return response()->json(['msg'=>'You are not able to delete reciepent.']);
   }
      
      DB::table('admin_to_do_list_reciepent_bes')->where('reciepent_id', $id)->delete();

     return response()->json(['msg'=>'Reciepent deleted successfully']);
 }

 public function delToDoBes($id){

  if (Crypt::decryptString($_COOKIE['UserStatusToDoBes']) == '0') {
    return response()->json(['msg'=>'You are not able to delete to do list.']);
   }
      
      DB::table('admin_to_do_list_bes')->where('to_do_list_id', $id)->delete();

     return response()->json(['msg'=>'Reciepent deleted successfully']);
 }

 public function inProgressToDoActionBes($id){
      
    DB::table('admin_to_do_list_bes')->where('to_do_list_id', $id )->update(['to_do_list_status' => 'In Progress']);
      

     return response()->json(['msg'=>'Reciepent deleted successfully']);
 }

 public function delayToDoActionBes($id){
      
    DB::table('admin_to_do_list_bes')->where('to_do_list_id', $id )->update(['to_do_list_status' => 'Delay']);
      

     return response()->json(['msg'=>'Reciepent deleted successfully']);
 }

 public function completeToDoActionBes($id){
      
    DB::table('admin_to_do_list_bes')->where('to_do_list_id', $id )->update(['to_do_list_status' => '1']);
      

     return response()->json(['msg'=>'Reciepent deleted successfully']);
 }

 public function addToDoListPostBes(Request $request){

  if($request->image != ''){
    
  
  
  
    $imageName = uniqid().'.'.$request->image->extension();  
  
    $request->image->move(public_path('images/to_do_bescrow_img'), $imageName);
  }else{
    $imageName= '';
  }

  

    $arr=[];
    foreach ($request->input('reciepent') as $id) {
      $data = DB::table('admin_to_do_list_reciepent_bes')
              ->where('reciepent_id', '=', $id)
              ->get();

      $arr[] = $data[0]->reciepent_name;
      $mail= $data[0]->reciepent_email;

      Mail::send(['html'=>'admin.todolist_mail'], ['text'=>$request->input('title_todo')], function($message) use ($mail)  {
    $message->to($mail)->subject
       ('You have a new job - ToDoList');
    $message->from('noreply@wwwmedia.world','Bescrow');
 });

    }
    $reciepent= implode(",", $arr);

     if($imageName != ''){
      DB::table('admin_to_do_list_bes')->insert([
        'to_do_list_reciepent' => $reciepent,
        'to_do_list_title' => $request->input('title_todo'),
        'to_do_list_desc' => $request->input('desc_todo'),
        'to_do_list_notes' => $request->input('notes_todo'),
        'to_do_list_notes_date_time' => $request->input('datetime_todo'),
        'to_do_list_datetime' => $request->input('datetime_todo'),
        'to_do_list_target_days' => $request->input('trgt_job_todo'),
        'to_do_list_image' => $imageName,
        'to_do_list_priority' => $request->input('priority')
    ]);
     } else{
      DB::table('admin_to_do_list_bes')->insert([
        'to_do_list_reciepent' => $reciepent,
        'to_do_list_title' => $request->input('title_todo'),
        'to_do_list_desc' => $request->input('desc_todo'),
        'to_do_list_notes' => $request->input('notes_todo'),
        'to_do_list_notes_date_time' => $request->input('datetime_todo'),
        'to_do_list_datetime' => $request->input('datetime_todo'),
        'to_do_list_target_days' => $request->input('trgt_job_todo'),
        'to_do_list_priority' => $request->input('priority')
    ]);
     }
      
   
      return redirect('/u/to-do-list-bes');
    //  return response()->json(['msg'=> 'Job uploaded successfully']);
 }

 public function openToDoBes(){
      

      $data = DB::table('admin_to_do_list_bes')->where('to_do_list_status', '=', '0')->orderBy('to_do_list_datetime', 'asc')->get();

     return response()->json($data);
 }

 public function completeToDoBes(){
    
      

      $data = DB::table('admin_to_do_list_bes')->where('to_do_list_status', '=', '1')->orderBy('to_do_list_datetime', 'desc')->get();

     return response()->json($data);
 }

 public function inProgToDoBes(){
    
      

      $data = DB::table('admin_to_do_list_bes')->where('to_do_list_status', '=', 'In Progress')->orderBy('to_do_list_datetime', 'desc')->get();

     return response()->json($data);
 }

 public function delayToDoBes(){
    
      

      $data = DB::table('admin_to_do_list_bes')->where('to_do_list_status', '=', 'Delay')->orderBy('to_do_list_datetime', 'desc')->get();

     return response()->json($data);
 }

 public function toDoBesLogout() {
  setcookie("UserEmailToDoBes", "", time() - 3600, "/");
  setcookie("UserFullNameToDoBes", "", time() - 3600, "/");
  setcookie("UserStatusToDoBes", "", time() - 3600, "/");
  
    return redirect('/u/todohome');
}

   ///////////////////////////// End To Do Bescrow /////////////////////////////////////

   public function wwwMediaApp(){

    return view('admin.wwwmediaapp');
}

public function adminApp(){

  return view('admin.adminapp');
}


   public function adminBroadcast(Request $request){
      if (!Session::get('AdminUserName')){
       return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
      }

      $implode= implode(',', $request->input('chk'));

   
       return view('admin.admin-broadcast')->with(['implode'=>$implode]);
   }

   public function broadcastPost(Request $request){
      if (!Session::get('AdminUserName')){
       return redirect('/u/adminlogin')->with(['msg' => 'You have to login to view your account']);
      }

      $explode= explode(',', $request->input('users_email'));

      foreach ($explode as $mail) {
        $data = DB::select('select * from users where email  =?',[$mail]);

        $chk_duplicate = DB::Select("select room_id from users_chat_rooms where (room_from_id = '0' and room_to_id = '".$data[0]->id."') or (room_from_id = '".$data[0]->id."' and room_to_id = '0')");

        if(count($chk_duplicate) > 0) {

            DB::table('users_chat')->insert([
            'chat_from_id' => '0',
            'chat_to_id' => $data[0]->id,
            'chat_msg' => $request->input('msg')
              
            ]);

            $date= date('Y-m-d H:i:s');

            $update = DB::Select("UPDATE users_chat_rooms SET room_status= '1', timedate= '".$date."' WHERE room_to_id= '".$data[0]->id."' AND room_from_id= '0'");

            $update2 = DB::Select("UPDATE users_chat_rooms SET timedate= '".$date."' WHERE room_to_id= '0' AND room_from_id= '".$data[0]->id."'");
        } else {

            DB::table('users_chat')->insert([
            'chat_from_id' => '0',
            'chat_to_id' => $data[0]->id,
            'chat_msg' => $request->input('msg')
              
            ]);
    
            DB::table('users_chat_rooms')->insert([
                'room_from_id' => '0', 
                'room_to_id' => $data[0]->id,
                'room_status' => '1'
                  
            ]);
    
            DB::table('users_chat_rooms')->insert([
                'room_from_id' => $data[0]->id, 
                'room_to_id' => '0'
                  
            ]);

        }

      //send broadcast email to the receivers

      Mail::send(['html'=>'admin.broadcast_mail'], ['text'=> $request->input('msg')], function($message) use ($mail)  {
            $message->to($mail)->subject
               ('🛎️ Important! You have a new message from Customer Support - GlobalLove');
            $message->from('noreply@wwwmedia.world','GlobalLove');
      });

        
      }
   
       return response()->json($request->input('users_email'));
   }

   ///////////////////////// To Do Smarter /////////////////////////////

   public function toDoSmarterSignup(){
    if (isset($_COOKIE['UserFullNameToDoSmarter'])) {
      return redirect('/u/to-do-list-smarter');
     }
 
     return view('admin.to_do_smarter_signup');
 }

 public function toDoSmarterSignupPost(Request $request){

  
    $data = DB::select('select * from to_do_list_reciepent where reciepent_email  =?',[$request->input('username')]);
    
    if(count($data) == 1){
      return redirect('/u/to-do-smarter-signup')->with(['msg'=>'This email already exist.']);

    } elseif($request->input('pswrd') == $request->input('repswrd')){
        
      DB::table('to_do_list_reciepent')->insert([
        'reciepent_name' => $request->input('name'),
        'reciepent_email' => $request->input('username'),
        'reciepent_passwrd' => $request->input('pswrd'),
        'reciepent_company_name' => $request->input('comp_name'),
        'reciepent_status' => '1'
        ]);

     return redirect('/u/to-do-smarter-login')->with(['regsucmsg' => 'Please login to view your account.']);
  }else{
    return redirect('/u/to-do-smarter-signup')->with(['msg'=>'Password and Re-password should be same.']);
  }
}

   public function toDoSmarterLogin(){
    if (isset($_COOKIE['UserFullNameToDoSmarter'])) {
      return redirect('/u/to-do-list-smarter');
     }
 
     return view('admin.to_do_smarter_login');
 }

 public function toDoSmarterLogPost(Request $request){
        
  $data = DB::select('select * from to_do_list_reciepent where reciepent_email  =? and reciepent_passwrd =?',[$request->input('username'),$request->input('pswrd')]);
  if(count($data) == '1'){
  
  setcookie('UserIdToDoSmarter', Crypt::encryptString($data[0]->reciepent_id), time() + (86400 * 365), "/");
  setcookie('UserEmailToDoSmarter', Crypt::encryptString($data[0]->reciepent_email), time() + (86400 * 365), "/");
  setcookie('UserFullNameToDoSmarter', Crypt::encryptString($data[0]->reciepent_name), time() + (86400 * 365), "/");
  setcookie('UserStatusToDoSmarter', Crypt::encryptString($data[0]->reciepent_status), time() + (86400 * 365), "/");
  setcookie('UsersCompanyToDoSmarter', Crypt::encryptString($data[0]->reciepent_company_name), time() + (86400 * 365), "/");

      return redirect('/u/to-do-list-smarter');
  }else{
 return redirect('/u/to-do-smarter-login')->with('msg','Username or password are incorrect');
}   
}

   public function toDoListSmarter(){
    if (!isset($_COOKIE['UserFullNameToDoSmarter'])) {
      return redirect('/u/to-do-list-smarter');
     }

    $data = DB::table('to_do_list_reciepent')->where('reciepent_company_name', '=', Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']))->get();

    // $data = DB::table('to_do_list_reciepent')
    //             ->leftJoin('rltnshp_reciepent', 'rltnshp_reciepent.parent_id', '=', 'to_do_list_reciepent.reciepent_id')
    //             ->where('rltnshp_reciepent.child_id', '=', Crypt::decryptString($_COOKIE['UserIdToDoSmarter']))
    //             ->get();
 
     return view('admin.admin_to_do_list_smarter')->with(['data'=>$data]);
 }

 public function openToDoSmarter(){
      

  // $data = DB::table('to_do_list_new')->where('to_do_list_status', '=', '0')->orderBy('to_do_list_datetime', 'asc')->get();

  $data = DB::table('to_do_list_new')
                ->where('to_do_list_new.to_do_list_status', '=', '0')
                ->where('to_do_list_new.to_do_list_add_id', '=', Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']))
                ->orderBy('to_do_list_new.to_do_list_datetime', 'asc')
                ->get();

 return response()->json($data);
}

public function completeToDoSmarter(){

  $data = DB::table('to_do_list_new')
                ->where('to_do_list_new.to_do_list_status', '=', '1')
                ->where('to_do_list_new.to_do_list_add_id', '=', Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']))
                ->orderBy('to_do_list_new.to_do_list_datetime', 'desc')
                ->get();


 return response()->json($data);
}

public function inProgToDoSmarter(){

  $data = DB::table('to_do_list_new')
                ->where('to_do_list_new.to_do_list_status', '=', 'In Progress')
                ->where('to_do_list_new.to_do_list_add_id', '=', Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']))
                ->orderBy('to_do_list_new.to_do_list_datetime', 'desc')
                ->get();


 return response()->json($data);
}

public function delayToDoSmarter(){

  $data = DB::table('to_do_list_new')
                ->where('to_do_list_new.to_do_list_status', '=', 'Delay')
                ->where('to_do_list_new.to_do_list_add_id', '=', Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']))
                ->orderBy('to_do_list_new.to_do_list_datetime', 'desc')
                ->get();

 return response()->json($data);
}

public function delToDoSmarter($id){

  if (Crypt::decryptString($_COOKIE['UserStatusToDoBes']) == '0') {
    return response()->json(['msg'=>'You are not able to delete to do list.']);
   }
      
      DB::table('to_do_list_new')->where('to_do_list_id', $id)->delete();

     return response()->json(['msg'=>'Reciepent deleted successfully']);
 }

 public function inProgressToDoActionSmarter($id){
      
    DB::table('to_do_list_new')->where('to_do_list_id', $id )->update(['to_do_list_status' => 'In Progress']);
      

     return response()->json(['msg'=>'Reciepent deleted successfully']);
 }

 public function delayToDoActionSmarter($id){
      
    DB::table('to_do_list_new')->where('to_do_list_id', $id )->update(['to_do_list_status' => 'Delay']);
      

     return response()->json(['msg'=>'Reciepent deleted successfully']);
 }

 public function completeToDoActionSmarter($id){
      
    DB::table('to_do_list_new')->where('to_do_list_id', $id )->update(['to_do_list_status' => '1']);
      

     return response()->json(['msg'=>'Reciepent deleted successfully']);
 }

 public function allReciepentSmarter(){
      
  $data = DB::table('to_do_list_reciepent')->where('reciepent_company_name', Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']))->get();

 return response()->json($data);
}

public function addReciepentSmarter($name,$email,$psswrd,$status){
      
  DB::table('to_do_list_reciepent')->insert([
      'reciepent_name' => $name,
      'reciepent_email' => $email,
      'reciepent_passwrd' => $psswrd,
      'reciepent_company_name' => Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']),
      'reciepent_status' => $status
      ]);

  Mail::send(['html'=>'admin.admin_todo_rec_smarter_mail'], ['name'=>$name, 'email'=> $email, 'psswrd'=> $psswrd], function($message) use ($email)  {
    $message->to($email)->subject
       ('You are added as a reciepent - ToDoList');
    $message->from('noreply@wwwmedia.world','To Do Smarter');
 });



 return response()->json(['msg'=>'Reciepent added successfully']);
}

public function delReciepentSmarter($id){
  if (!isset($_COOKIE['UserFullNameToDoSmarter'])) {
    return redirect('/u/to-do-smarter-login');
   }

   if (Crypt::decryptString($_COOKIE['UserStatusToDoSmarter']) == '0') {
    return response()->json(['msg'=>'You are not able to delete reciepent.']);
   }
      
      DB::table('to_do_list_reciepent')->where('reciepent_id', $id)->delete();

     return response()->json(['msg'=>'Reciepent deleted successfully']);
 }

 public function addToDoListPostSmarter(Request $request){

  if($request->image != ''){
    
  
  
  
    $imageName = uniqid().'.'.$request->image->extension();  
  
    $request->image->move(public_path('images/to_do_bescrow_img'), $imageName);
  }else{
    $imageName= '';
  }

  

    $arr=[];
    foreach ($request->input('reciepent') as $id) {
      $data = DB::table('to_do_list_reciepent')
              ->where('reciepent_id', '=', $id)
              ->get();

      $arr[] = $data[0]->reciepent_name;
      $mail= $data[0]->reciepent_email;

      Mail::send(['html'=>'admin.todolist_smarter_mail'], ['text'=>$request->input('title_todo')], function($message) use ($mail)  {
    $message->to($mail)->subject
       ('You have a new job - ToDoList');
    $message->from('noreply@wwwmedia.world','To Do Smarter');
 });

    }
    $reciepent= implode(",", $arr);

     if($imageName != ''){
      DB::table('to_do_list_new')->insert([
        'to_do_list_reciepent' => $reciepent,
        'to_do_list_add_id' => Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']),
        'to_do_list_title' => $request->input('title_todo'),
        'to_do_list_desc' => $request->input('desc_todo'),
        'to_do_list_notes' => $request->input('notes_todo'),
        'to_do_list_notes_date_time' => $request->input('datetime_todo'),
        'to_do_list_datetime' => $request->input('datetime_todo'),
        'to_do_list_target_days' => $request->input('trgt_job_todo'),
        'to_do_list_image' => $imageName,
        'to_do_list_priority' => $request->input('priority')
    ]);
     } else{
      DB::table('to_do_list_new')->insert([
        'to_do_list_reciepent' => $reciepent,
        'to_do_list_add_id' => Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']),
        'to_do_list_title' => $request->input('title_todo'),
        'to_do_list_desc' => $request->input('desc_todo'),
        'to_do_list_notes' => $request->input('notes_todo'),
        'to_do_list_notes_date_time' => $request->input('datetime_todo'),
        'to_do_list_datetime' => $request->input('datetime_todo'),
        'to_do_list_target_days' => $request->input('trgt_job_todo'),
        'to_do_list_priority' => $request->input('priority')
    ]);
     }
      
   
      return redirect('/u/to-do-list-smarter');
    //  return response()->json(['msg'=> 'Job uploaded successfully']);
 }

 public function editToDoListSmarter($id){
  if (!isset($_COOKIE['UserFullNameToDoSmarter'])) {
    return redirect('/u/to-do-smarter-login');
   }

   if (Crypt::decryptString($_COOKIE['UserStatusToDoSmarter']) == '0') {
    return response()->json(['msg'=>'You are not able to edit to do list.']);
   }

    $name = [];
    $data= DB::table('to_do_list_new')->where('to_do_list_id', $id)->get();

    
        $explode = explode(",",$data[0]->to_do_list_reciepent);
        foreach($explode as $exp){

          $name[] = $exp;

          }

 
     return view('admin.edit_to_do_list_smarter')->with(['data'=>$data,'name'=>$name]);
 }

 public function editToDoListActionSmarter(Request $request){

  if($request->image != ''){
   
  
  
  
    $imageName = uniqid().'.'.$request->image->extension();  
  
    $request->image->move(public_path('images/to_do_bescrow_img'), $imageName);
  }else{
    $imageName= '';
  }

  $arr=[];
    
    $reciepent= implode(",", $arr);

    $notes= DB::table('to_do_list_new')->where('to_do_list_id', $request->input('to_do_id'))->get();

      if($request->input('notes_todo') == $notes[0]->to_do_list_notes){

        foreach ($request->input('reciepent') as $id) {
      $data = DB::table('to_do_list_reciepent')
              ->where('reciepent_id', '=', $id)
              ->get();

      $arr[] = $data[0]->reciepent_name;
      $mail= $data[0]->reciepent_email;

          Mail::send(['html'=>'admin.todolist_smarter_mail'], ['text'=>$request->input('title_todo')], function($message) use ($mail)  {
        $message->to($mail)->subject
           ('You have a new updated job - ToDoList');
        $message->from('noreply@wwwmedia.world','To Do Smarter');
      });

        }

        $reciepent= implode(",", $arr);


        if($imageName != ''){
        DB::table('to_do_list_new')->where('to_do_list_id', $request->input('to_do_id'))
        ->update([
          'to_do_list_reciepent' => $reciepent,
          'to_do_list_add_id' => Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']),
          'to_do_list_title' => $request->input('title_todo'),
          'to_do_list_desc' => $request->input('desc_todo'),
          'to_do_list_notes' => $request->input('notes_todo'),
          'to_do_list_notes_date_time' => $request->input('notes_date'),
          'to_do_list_datetime' => $request->input('datetime_todo'),
          'to_do_list_target_days' => $request->input('trgt_job_todo'),
          'to_do_list_image' => $imageName,
          'to_do_list_priority' => $request->input('priority')
      ]);
    }else{
      DB::table('to_do_list_new')->where('to_do_list_id', $request->input('to_do_id'))
        ->update([
          'to_do_list_reciepent' => $reciepent,
          'to_do_list_add_id' => Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']),
          'to_do_list_title' => $request->input('title_todo'),
          'to_do_list_desc' => $request->input('desc_todo'),
          'to_do_list_notes' => $request->input('notes_todo'),
          'to_do_list_notes_date_time' => $request->input('notes_date'),
          'to_do_list_datetime' => $request->input('datetime_todo'),
          'to_do_list_target_days' => $request->input('trgt_job_todo'),
          'to_do_list_priority' => $request->input('priority')
      ]);
    }

      } else {

        foreach ($request->input('reciepent') as $id) {
      $data = DB::table('to_do_list_reciepent')
              ->where('reciepent_id', '=', $id)
              ->get();

      $arr[] = $data[0]->reciepent_name;
      $mail= $data[0]->reciepent_email;

      Mail::send(['html'=>'admin.todolist_smarter_mail'], ['text'=>$request->input('title_todo')], function($message) use ($mail)  {
        $message->to($mail)->subject
           ('Notes added to your job - ToDoList');
        $message->from('noreply@wwwmedia.world','To Do Smarter');
     });

    }

    $reciepent= implode(",", $arr);

    if($imageName != ''){
      DB::table('to_do_list_new')->where('to_do_list_id', $request->input('to_do_id'))
      ->update([
        'to_do_list_reciepent' => $reciepent,
        'to_do_list_add_id' => Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']),
        'to_do_list_title' => $request->input('title_todo'),
        'to_do_list_desc' => $request->input('desc_todo'),
        'to_do_list_notes' => $request->input('notes_todo'),
        'to_do_list_notes_date_time' => $request->input('notes_date'),
        'to_do_list_datetime' => $request->input('datetime_todo'),
        'to_do_list_target_days' => $request->input('trgt_job_todo'),
        'to_do_list_image' => $imageName,
        'to_do_list_priority' => $request->input('priority')
    ]);
  }else{
    DB::table('to_do_list_new')->where('to_do_list_id', $request->input('to_do_id'))
      ->update([
        'to_do_list_reciepent' => $reciepent,
        'to_do_list_add_id' => Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']),
        'to_do_list_title' => $request->input('title_todo'),
        'to_do_list_desc' => $request->input('desc_todo'),
        'to_do_list_notes' => $request->input('notes_todo'),
        'to_do_list_notes_date_time' => $request->input('notes_date'),
        'to_do_list_datetime' => $request->input('datetime_todo'),
        'to_do_list_target_days' => $request->input('trgt_job_todo'),
        'to_do_list_priority' => $request->input('priority')
    ]);
  }

      }
      

 
     return redirect('/u/to-do-list-smarter');
 }

public function toDoSmarterLogout() {
  setcookie("UserIdToDoSmarter", "", time() - 3600, "/");
  setcookie("UserEmailToDoSmarter", "", time() - 3600, "/");
  setcookie("UserFullNameToDoSmarter", "", time() - 3600, "/");
  setcookie("UserStatusToDoSmarter", "", time() - 3600, "/");
  setcookie("UsersCompanyToDoSmarter", "", time() - 3600, "/");
  
    return redirect('/u/to-do-smarter-login');
}

 ////////////////////////////// End To Do Smarter ////////////////////////////
    
}
