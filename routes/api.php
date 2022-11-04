<?php
namespace anyname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\UsersMeta;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\DB;
use Mail;
use DateTime;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


///////////////////////////// Start Tds App Api /////////////////////////////////////////

Route::get('/', function () {
    return abort('403');
});

Route::get('/tds/all/jobs/{id}/{comp}', function ($id=null,$comp) {
    $open = DB::table('to_do_list_new')->where('to_do_list_new.to_do_list_status', '0')->where('to_do_list_new.to_do_list_add_id', '=', $comp)->where('to_do_list_new.to_do_list_job_status', '=', '1')->orderBy('to_do_list_datetime', 'desc')->get();

  $progress = DB::table('to_do_list_new')->where('to_do_list_new.to_do_list_status', 'In Progress')->where('to_do_list_new.to_do_list_add_id', '=', $comp)->where('to_do_list_new.to_do_list_job_status', '=', '1')->orderBy('to_do_list_datetime', 'desc')->get();

  $delay = DB::table('to_do_list_new')->where('to_do_list_new.to_do_list_status', 'Delay')->where('to_do_list_new.to_do_list_add_id', '=', $comp)->where('to_do_list_new.to_do_list_job_status', '=', '1')->orderBy('to_do_list_datetime', 'desc')->get();

  $completed = DB::table('to_do_list_new')->where('to_do_list_new.to_do_list_status', '1')->where('to_do_list_new.to_do_list_add_id', '=', $comp)->where('to_do_list_new.to_do_list_job_status', '=', '1')->orderBy('to_do_list_datetime', 'desc')->get();

  if ($id == 'open'){
    $data = DB::table('to_do_list_new')->where('to_do_list_new.to_do_list_status', '0')->where('to_do_list_new.to_do_list_add_id', '=', $comp)->where('to_do_list_new.to_do_list_job_status', '=', '1')->orderBy('to_do_list_datetime', 'desc')->paginate(15);
  }elseif ($id == 'in-progress'){
    $data = DB::table('to_do_list_new')->where('to_do_list_new.to_do_list_status', 'In Progress')->where('to_do_list_new.to_do_list_add_id', '=', $comp)->orderBy('to_do_list_datetime', 'desc')->paginate(15);
  }elseif ($id == 'delay'){
    $data = DB::table('to_do_list_new')->where('to_do_list_new.to_do_list_status', 'Delay')->where('to_do_list_new.to_do_list_add_id', '=', $comp)->where('to_do_list_new.to_do_list_job_status', '=', '1')->orderBy('to_do_list_datetime', 'desc')->paginate(15);
  }elseif ($id == 'completed'){
    $data = DB::table('to_do_list_new')->where('to_do_list_new.to_do_list_status', '1')->where('to_do_list_new.to_do_list_add_id', '=', $comp)->where('to_do_list_new.to_do_list_job_status', '=', '1')->orderBy('to_do_list_datetime', 'desc')->paginate(15);
  }elseif($id=="All"){
    $data = DB::table('to_do_list_new')->where('to_do_list_new.to_do_list_status', '!=', '1')->where('to_do_list_new.to_do_list_add_id', '=', $comp)->where('to_do_list_new.to_do_list_job_status', '=', '1')->orderBy('to_do_list_datetime', 'desc')->get();
  }

  $arr = [];
  foreach($data as $d) {

    if($d->to_do_list_status == "0") {
        // $status = "warning";
        $status = "Open";
    } elseif($d->to_do_list_status == "1") {
        // $status = "success";
        $status = "Completed";
    } elseif($d->to_do_list_status == "Delay") {
        // $status = "danger";
        $status = "Delay";
    } elseif($d->to_do_list_status == "In Progress") {
        // $status = "tertiary";
        $status = "In Progress";
    }

    // receipents 
    $exp = explode("|", $d->to_do_list_reciepent);
    $exp_id = explode(",", $exp[1]);
    $user_arr = [];
    foreach($exp_id as $id) {
        $user = DB::table('to_do_list_reciepent')->where('reciepent_id', '=', $id)->select("reciepent_name", "reciepent_id", "reciepent_pro_pic_path")->first();
        $user_arr[] = array(
            'name' => $user->reciepent_name,
            'photo' => $user->reciepent_pro_pic_path,
            'id' => $user->reciepent_id
        );
    }

    

      $arr[] = array(
        'job_id' => $d->to_do_list_id,
        'title' => $d->to_do_list_title,
        'start_date' => $d->to_do_list_datetime,
        'end_date' => $d->to_do_list_target_days,
        'priority' => $d->to_do_list_priority,
        'status' => $status,
        'receipents' => $user_arr
      );

  }

  

    return response()->json($arr);
});

Route::post('/tds/app/signup', function(Request $request){

  $data = DB::select('select * from to_do_list_reciepent where reciepent_email  =?',[$request->input('username')]);

    if(count($data) == 1){
      return response()->json(array('msg' => 'This email already exist.'));

    } elseif($request->input('pswrd') == $request->input('repswrd')){

      DB::table('to_do_list_reciepent')->insert([
        'reciepent_name' => $request->input('name'),
        'reciepent_email' => $request->input('username'),
        'reciepent_passwrd' => $request->input('pswrd'),
        // 'reciepent_company_name' => $request->input('comp_name'),
        'reciepent_status' => '1',
        'reciepent_company_name' => $request->input('comp_name'),
        'reciepent_company_email' => $request->input('comp_email'),
        'reciepent_company_cntct_no' => $request->input('comp_numbr'),
        'reciepent_company_address' => $request->input('comp_addrs')
        // 'reciepent_company_logo' => ''
        ]);

        $last= DB::getPdo()->lastInsertId();

        $mail= $request->input('username');

        $dataa = "https://todosmarter.com/verifyaccount/" . $last;
      Mail::send(['html'=>'admin.email_verification_template'], ['text'=>$dataa], function($message) use ($mail, $dataa)  {
         $message->to($mail)->subject
            ('Verify Account.');
         $message->from('no-reply@wwwmedia.world','ToDoSmarter');
      });


    return response()->json(array('msg' => 'Please Verify Your E-mail For Login.'));
  }else{
    return response()->json(array('msg' => 'Password and Re-password should be same.'));
  }

});


Route::post('/tds/app/login', function(Request $request){

  $data = DB::select('select * from to_do_list_reciepent where reciepent_email  =? and reciepent_passwrd =?',[$request->input('username'),$request->input('pswrd')]);


  if(count($data) == '1'){

      if($data[0]->email_verified_at == ""){
        return response()->json(array('log_info' => 'Please verify your email first to be able to login.'));
      }


  $arr = [];

  $arr = [
    'UserIdToDoSmarter' => $data[0]->reciepent_id,
    'UserEmailToDoSmarter' => $data[0]->reciepent_email,
    'UserFullNameToDoSmarter' => $data[0]->reciepent_name,
    'UserStatusToDoSmarter' => $data[0]->reciepent_status,
    'UsersCompanyToDoSmarter' => $data[0]->reciepent_company_name,
    'UsersCompanyEmailToDoSmarter' => $data[0]->reciepent_company_email,
    'UsersCompanyContactToDoSmarter' => $data[0]->reciepent_company_cntct_no,
    'UsersCompanyAddressToDoSmarter' => $data[0]->reciepent_company_address,
    'UsersCompanyLogoToDoSmarter' => $data[0]->reciepent_company_logo,
  ];

  return response()->json(array('log_info' => $arr));

}else{

  return response()->json(array('log_info_err' => 'Please check your email or password.'));

}

});

Route::get('/tds/all/recipient/{comp}', function($comp){

  $data = DB::table('to_do_list_reciepent')->where('reciepent_company_name', '=', $comp)->get();
  
  
  return response()->json(array('data' => $data));
  
  });

Route::post('/tds/add/recipient', function(Request $request){

  DB::table('to_do_list_reciepent')->insert([
    'reciepent_name' => $request->input('title'),
    'reciepent_email' => $request->input('email'),
    'reciepent_passwrd' => $request->input('password'),
    'reciepent_company_name' => $request->input('UsersCompanyToDoSmarter'),
    'reciepent_status' => $request->input('opt_rec'),
    'reciepent_company_email' => $request->input('UsersCompanyEmailToDoSmarter'),
    'reciepent_company_cntct_no' => $request->input('UsersCompanyContactToDoSmarter'),
    'reciepent_company_address' => $request->input('UsersCompanyAddressToDoSmarter'),
    'reciepent_company_logo' => $request->input('UsersCompanyLogoToDoSmarter'),
    'reciepent_gender' => $request->input('rec_gender'),
    'reciepent_position' => $request->input('pstn_title'),
    'reciepent_department' => $request->input('deprtment'),
    'reciepent_dob' => $request->input('dob'),
    'reciepent_address' => $request->input('address'),
    'reciepent_suburb' => $request->input('suburb'),
    'reciepent_state' => $request->input('state'),
    'reciepent_postcode' => $request->input('pst_code'),
    'reciepent_home_phone' => $request->input('home_num'),
    'reciepent_mob_number' => $request->input('mob_num'),
    'reciepent_prsnl_com_email' => $request->input('email_company'),
    'reciepent_prsnl_email' => $request->input('email_prsnl')
    ]);

$email= $request->input('email');

$last= DB::getPdo()->lastInsertId();

$dataa = "https://todosmarter.com/verifyaccount/" . $last;

Mail::send(['html'=>'admin.admin_todo_rec_smarter_mail'], ['name'=>$request->input('title'), 'email'=> $request->input('email'), 'psswrd'=> $request->input('password'),'text'=>$dataa], function($message) use ($email)  {
  $message->to($email)->subject
     ('You are added as a recipient - ToDoList');
  $message->from('no-reply@wwwmedia.world','To Do Smarter');
});
  
  
return response()->json(array('success' => 'Recipient Added Successfully.'));
  
  });


Route::get('/tds/job/details/{id}/{userid}/{compname}', function($id,$userid,$compname){

  $d = DB::table('to_do_list_new')->where('to_do_list_id', '=', $id)->first();

  DB::table('to_do_list_new_seen')->where('user_id', $userid)->where('job_id', $id )->update(['status' => '1']);


    $job_rating_progress = DB::table("job_rating")
        ->where("job_id", "=", $id)
        ->where("reipent_id", "=", $userid)
        ->where("status", "=", 0)
        ->first();

    $job_rating_completed = DB::table("job_rating")
        ->where("job_id", "=", $id)
        ->where("reipent_id", "=", $userid)
        ->where("status", "=", 1)
        ->first();

    $company_settings = DB::table("job_rating_settings")
        ->where("company_id", "=", $compname)
        ->first();

    $arr = [];

    if($d->to_do_list_status == "0") {
        // $status = "warning";
        $status = "Open";
    } elseif($d->to_do_list_status == "1") {
        // $status = "success";
        $status = "Completed";
    } elseif($d->to_do_list_status == "Delay") {
        // $status = "danger";
        $status = "Delay";
    } elseif($d->to_do_list_status == "In Progress") {
        // $status = "tertiary";
        $status = "In Progress";
    }

    // receipents 
    $exp = explode("|", $d->to_do_list_reciepent);
    $exp_id = explode(",", $exp[1]);
    $user_arr = [];
    foreach($exp_id as $id) {
        $user = DB::table('to_do_list_reciepent')->where('reciepent_id', '=', $id)->select("reciepent_name", "reciepent_id", "reciepent_pro_pic_path")->first();
        $user_arr[] = array(
            'name' => $user->reciepent_name,
            'photo' => $user->reciepent_pro_pic_path,
            'id' => $user->reciepent_id
        );
    }

    

      $arr[] = array(
        'job_id' => $d->to_do_list_id,
        'title' => $d->to_do_list_title,
        'description' => $d->to_do_list_desc,
        'start_date' => $d->to_do_list_datetime,
        'end_date' => $d->to_do_list_target_days,
        'priority' => $d->to_do_list_priority,
        'status' => $status,
        'receipents' => $user_arr
      );

        // return response()->json(array('data' => $arr));

if($job_rating_completed !== null) {
  return response()->json(array('data' => $arr,'rate' => '1', 'company_settings' => $company_settings, 'job_rating_progress' => $job_rating_progress, 'job_rating_completed' => $job_rating_completed));

  // 'date_range' => $this->date_range($job_rating_progress->datetime, $job_rating_completed->datetime)
} else {
  return response()->json(array('data' => $arr,'rate' => '0'));
}

});


Route::get('/tds/edit/recipient/form/{id}', function($id){

  $data= DB::table('to_do_list_reciepent')->where('reciepent_id', $id)->get();
  
  
  return response()->json(array('data' => $data));
  
  });


Route::post('/tds/edit/recipient/post', function(Request $request){

  DB::table('to_do_list_reciepent')->where('reciepent_id', $request->input('rec_id') )->update([
    'reciepent_name' => $request->input('title_rec'),
    'reciepent_email' => $request->input('email_rec'),
    'reciepent_passwrd' => $request->input('psw_rec'),
    'reciepent_status' => $request->input('opt_rec'),
    'reciepent_gender' => $request->input('rec_gender'),
    'reciepent_position' => $request->input('pstn_title'),
    'reciepent_department' => $request->input('deprtment'),
    'reciepent_dob' => $request->input('dob'),
    'reciepent_address' => $request->input('address'),
    'reciepent_suburb' => $request->input('suburb'),
    'reciepent_state' => $request->input('state'),
    'reciepent_postcode' => $request->input('pst_code'),
    'reciepent_home_phone' => $request->input('home_num'),
    'reciepent_mob_number' => $request->input('mob_num'),
    'reciepent_prsnl_com_email' => $request->input('email_company'),
    'reciepent_prsnl_email' => $request->input('email_prsnl')
    ]);

    $email= $request->input('email_rec');

    Mail::send(['html'=>'admin.admin_todo_rec_smarter_mail'], ['name'=>$request->input('title_rec'), 'email'=> $request->input('email_rec'), 'psswrd'=> $request->input('psw_rec')], function($message) use ($email)  {
      $message->to($email)->subject
         ('You are updated as a recipient - ToDoList');
      $message->from('no-reply@wwwmedia.world','To Do Smarter');
    });
  
  
return response()->json(array('success' => 'Recipient Edited Successfully.'));
  
  });


Route::get('/tds/make/admin/{id}', function($id){

  DB::table('to_do_list_reciepent')->where('reciepent_id', $id)->update(['reciepent_status' => '1']);
  
  return response()->json(array('success' => 'Admin Set Successfully.'));
  
  });


Route::get('/tds/delete/recipient/{userid}/{username}/{adminid}/{compname}', function($userid,$username,$adminid,$compname){

  $data=DB::table('to_do_list_new')->where('to_do_list_add_id', $compname)->get();

   $dataname=DB::table('to_do_list_reciepent')->where('reciepent_id', $userid)->get();


foreach($data as $da){

  $exp= explode('|',$da->to_do_list_reciepent);
 
  $expname= explode(',',$exp[0]);
  $expId= explode(',',$exp[1]);

  $arr=[];
foreach($expname as $exn){

  if($exn == $dataname[0]->reciepent_name){
    foreach (array_keys($expname, $dataname[0]->reciepent_name) as $key) {
      unset($expname[$key]);
      
    }
    
  }else{
    
    $arr[]= $exn;
  }
}
$impname= implode(',', $arr);

if($impname == ''){
  $impname= $username;
}
 

$arrid= [];
foreach($expId as $exi){
  if($exi == $userid){
    foreach (array_keys($expId, $userid) as $key) {
      unset($expId[$key]);
    
    }
    
  }else{
    
    $arrid[]= $exi;
  }
}
$impid= implode(',', $arrid);

if($impid == ''){
  $impid= $userid;

  DB::table('to_do_list_new_seen')->insert([
    'job_id' => $da->to_do_list_id,
    'user_id' => $impid
  ]);
}
    
  DB::table('to_do_list_new')->where('to_do_list_id', $da->to_do_list_id)->update(['to_do_list_reciepent' => $impname.'|'.$impid]);

}

      DB::table('to_do_list_new_seen')->where('user_id', $userid)->delete();
      DB::table('to_do_list_reciepent')->where('reciepent_id', $userid)->delete();
  
  return response()->json(array('success' => 'Recipient Deleted Successfully.'));
  
  });


Route::get('/tds/delete/company/{id}', function($id){

  DB::table('to_do_list_new')->where('to_do_list_add_id', $id)->delete();
  DB::table('to_do_list_reciepent')->where('reciepent_company_name', $id)->delete();
  
  return response()->json(array('success' => 'Company Deleted Successfully.'));
  
  });


Route::get('/tds/monthly/breakdown/{compname}', function($compname){

  $arr = [];

    $months = DB::table("todo_job_months")->orderBy("m_month", "desc")->groupBy("m_month")->get();

       foreach($months as $m) {
            $data = DB::table("to_do_list_new")->where("todo_month", "=", $m->m_month)->where("to_do_list_status", "!=", "1")->where('to_do_list_job_status', '=', '1')->where('to_do_list_add_id', '=', $compname)->orderBy("to_do_list_id", "desc")->get();



                    $arr[] = [
                        'month' => $m->m_month,
                        'year' => $m->m_year,
                        'jobs' => $data

                    ];


       }

       
  
  return response()->json($arr);
  
  });


  Route::post('/tds/add/jobs/post', function(Request $request){

    if(isset($request->image) && count($request->image) > 5){
      return back()->with(['msg'=> 'You can upload maximum 5 images.']);
     }
   
     if(isset($request->image) && count($request->image) > 0){
   
     foreach($request->image as $img) {
   
   
       $imageName = uniqid().'.'.$img->extension();
   
       $img->move(public_path('images/to_do_smarter_img'), $imageName);
   
       $imgName[] = $imageName;
     }
   
   
   
     }else{
       $imgName = [];
     }
   
   
   
       $arr=[];
       foreach ($request->input('reciepent') as $id) {
         $data = DB::table('to_do_list_reciepent')
                 ->where('reciepent_id', '=', $id)
                 ->get();
   
         $arr[] = $data[0]->reciepent_name;
         $arrid[] = $data[0]->reciepent_id;
         $mail= $data[0]->reciepent_email;
   
   
       }
       $today= date('m');
       $reciepent= implode(",", $arr);
       $reciepentId= implode(",", $arrid);
   
       // get total projects count
        $total_projects = DB::table("to_do_list_new")->get();
        $total_projects = (count($total_projects) + 1);
   
        if(count($imgName) > 0){
         DB::table('to_do_list_new')->insert([
           'to_do_list_reciepent' => $reciepent. '|' . $reciepentId,
           'to_do_list_add_id' => Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']),
           'to_do_list_title' => $request->input('title_todo'),
           'to_do_list_desc' => $request->input('desc_todo'),
           'to_do_list_notes' => $request->input('notes_todo'),
           'to_do_list_notes_date_time' => $request->input('datetime_todo'),
           'to_do_list_datetime' => $request->input('datetime_todo'),
           'to_do_list_target_days' => $request->input('trgt_job_todo'),
           'to_do_list_image' => implode(',', $imgName),
           'todo_month' => $today,
           'to_do_list_priority' => $request->input('priority'),
             'proj_number' => date('Y') . '/' . date('m') . '/' . $total_projects
       ]);
        } else{
         DB::table('to_do_list_new')->insert([
           'to_do_list_reciepent' => $reciepent. '|' . $reciepentId,
           'to_do_list_add_id' => Crypt::decryptString($_COOKIE['UsersCompanyToDoSmarter']),
           'to_do_list_title' => $request->input('title_todo'),
           'to_do_list_desc' => $request->input('desc_todo'),
           'to_do_list_notes' => $request->input('notes_todo'),
           'to_do_list_notes_date_time' => $request->input('datetime_todo'),
           'to_do_list_datetime' => $request->input('datetime_todo'),
           'to_do_list_target_days' => $request->input('trgt_job_todo'),
           'todo_month' => $today,
           'to_do_list_priority' => $request->input('priority'),
             'proj_number' => date('Y') . '/' . date('m') . '/' . $total_projects
       ]);
        }
   
        $last= DB::getPdo()->lastInsertId();
   
        DB::table('todo_job_months')->insert([
         'm_job_id' => $last,
         'm_year' => date('Y'),
         'm_month' => $today
       ]);
   
        foreach ($request->input('reciepent') as $id) {
        DB::table('to_do_list_new_seen')->insert([
         'job_id' => $last,
         'user_id' => $id
     ]);
   }

   return response()->json($last);

  });

  Route::post('/tds/add/attachment/post', function(Request $request){

    $jobattach = DB::table('to_do_list_new_attachment')->where('attach_job_id', '=', $request->input('job_id'))->get();


    $attachCount= count($jobattach);
  
  if($attachCount < 5){
  $jobid = $request->input('job_id');
  
  $image = $request->file('file');
  
    $imageName = time().'.'.$image->extension();
    $this->extn = $image->extension();
    $image->move(public_path('images/to_do_smarter_img'),$imageName);
  
    DB::table('to_do_list_new_attachment')->insert([
      'attach_job_id' => $jobid,
      'attach_ext' => $this->extn,
      'attach_path' => $imageName]);
  
  return response()->json(['success'=>'Your Photo Uploaded Successfully']);
  }else{
  return response()->json(['error'=>'Maximum 5 images are allowed.']);
  }

  });

  Route::get('/tds/edit/job/form/{id}', function($id){

    $name = [];
    $data= DB::table('to_do_list_new')->where('to_do_list_id', $id)->get();

        $explodefst = explode("|",$data[0]->to_do_list_reciepent);
        $explode = explode(",",$explodefst[0]);

        foreach($explode as $exp){

          $name[] = $exp;

          }
    
    
    return response()->json(array('data' => $data,'name'=>$name));
    
    });


Route::post('/tds/edit/jobs/post', function(Request $request){

  if($request->image != ''){

    $imageName = uniqid().'.'.$request->image->extension();

    $request->image->move(public_path('images/to_do_smarter_img'), $imageName);
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
      $arrid[] = $data[0]->reciepent_id;
      $mail= $data[0]->reciepent_email;

        }

        $reciepent= implode(",", $arr);
        $reciepentId= implode(",", $arrid);


        if($imageName != ''){
        DB::table('to_do_list_new')->where('to_do_list_id', $request->input('to_do_id'))
        ->update([
          'to_do_list_reciepent' => $reciepent. '|' .$reciepentId,
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
          'to_do_list_reciepent' => $reciepent. '|' .$reciepentId,
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
      $arrid[] = $data[0]->reciepent_id;
      $mail= $data[0]->reciepent_email;

    }

    $reciepent= implode(",", $arr);
    $reciepentId= implode(",", $arrid);

    if($imageName != ''){
      DB::table('to_do_list_new')->where('to_do_list_id', $request->input('to_do_id'))
      ->update([
        'to_do_list_reciepent' => $reciepent. '|' .$reciepentId,
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
        'to_do_list_reciepent' => $reciepent. '|' .$reciepentId,
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


      DB::table('to_do_list_new_seen')->where('job_id', $request->input('to_do_id'))->delete();

      foreach ($request->input('reciepent') as $id) {
        DB::table('to_do_list_new_seen')->insert([
         'job_id' => $request->input('to_do_id'),
         'user_id' => $id
     ]);
    }

    return response()->json($request->input('to_do_id'));


});



  ///////////////////////////// End Tds App Api /////////////////////////////////////////


Route::get('/tdp/signup/{name}/{email}/{pswrd}/{repswrd}', function ($name,$email,$psswrd,$repswrd) {
  
  $users_cont= new UsersController;

        $country= "Australia";

        $register_info = new User();
        $register_info->name = $name;
        $register_info->email  = $email;
        $register_info->password = md5($psswrd);
        $register_info->token_id = $users_cont->generateRandomString(6);
        $register_info->prfl_photo_path  = 'https://www.globallove.online/images/male-user-placeholder.png';

        $data = User::where('email', '=', [$email])->get();
        if(count($data) == 0 && $psswrd == $repswrd){
        $register_info->save();

        $user = User::where('email', '=', [$email])->first();

        $register = new UsersMeta();
        $register->user_id = $user->id;
        $register->country = $country;
        $register->save();

        }

        $mail= $email;

        $dataa = "https://www.globallove.online/verifyaccount/" . $user->id;
      Mail::send(['html'=>'users.email_verification_template'], ['text'=>$dataa], function($message) use ($mail, $dataa)  {
         $message->to($mail)->subject
            ('Verify Account.');
         $message->from('no-reply@wwwmedia.world','GlobalLove');
      });

        return response()->json([$register->user_id,$name,$email]);
});

Route::post('/tdp/login', function () {

  $login_info = new User();
        $login_info->email = request('mail');
        $login_info->password = request('psw');
        $data = DB::select("SELECT t1.*,t2.*,t3.* FROM users t1 LEFT JOIN users_metas t2 ON (t1.id = t2.user_id) LEFT JOIN users_match t3 ON (t1.id = t3.users_match_id) WHERE t1.email = '".request('mail')."' AND t1.password = '".md5(request('psw'))."'");


  if(count($data) == '1'){
    
  $day = date('Y/m/d H:i:s');

  User::where('id', $data[0]->id)->update(['login_date_time' => $day]);

  return response()->json(['id'=>$data[0]->id,'name'=>$data[0]->name,'email'=>$data[0]->email]);
  }else{
  return response()->json(['id'=>0]);
  }
});

Route::get('/tdp/whatson/your/mind', function(){

  $news= DB::table('tdp_news')->join('users', 'tdp_news.news_author_id', '=', 'users.id')->where('tdp_news_status','=','1')->orderBy('news_id', 'desc')->get();

  $arr= [];
  foreach($news as $new){
    $comments = DB::select("SELECT t1.*,t2.* FROM tdp_news_comment t1 LEFT JOIN users t2 ON (t1.user_id = t2.id) WHERE t1.tdpnews_id='".$new->news_id."'");
    // $comments= DB::table('tdp_news_comment')->where('tdpnews_id','=',$new->news_id)->get();

    $comm= [];
    foreach($comments as $cmnts){

      $comm[] = [
        'user_id'=> $cmnts->user_id,
        'comment'=> $cmnts->comment,
        'created_at'=> $cmnts->created_at,
        'name'=> $cmnts->name,
        'prfl_pic'=> $cmnts->prfl_photo_path,
      ];
    }

    $arr[] = [
      'news_id'=> $new->news_id,
      'author_id'=> $new->news_author_id,
      'author_name'=> $new->news_author,
      'author_photo' => $new->prfl_photo_path,
      'news_title'=> $new->news_title,
      'news_desc'=> $new->news_desc,
      'news_img_path'=> $new->news_img_path == '' ? '' : 'https://globallove.online/images/'.$new->news_img_path,
      'news_date_time' => $new->news_date_time,
      'comments'=> $comm
    ];

    
  }

  return response()->json(['data'=> $arr]);
});

Route::post('/tdp/news/insert', function (Request $request) {
  $filename = '';
  $uniq = uniqid();
  $authorName = DB::table("users")->where("id", "=", request('id'))->first();

  if (request('image')) {
    $folderPath = '/var/www/globallove/public_html/public/images/';
    
    // $base64Image = explode(";base64,", $request->image);
    // $explodeImage = explode("data:image/", $base64Image[0]);
    $imageType = 'jpeg';
    $image_base64 = base64_decode(request('image'));
    $file = $folderPath . $uniq . '.'.$imageType;
    $filename = $uniq . '.'.$imageType;
    
    $upl = file_put_contents('/var/www/globallove/public_html/public/images/' . $uniq . '.jpeg', $image_base64);

    if($upl != false) {
      DB::table('tdp_news')->insert([
        'news_author' => $authorName->name,
        'news_author_id' => request('id'),
        'news_title' => request('news_title'),
        'news_img_path' => ($filename != '' ? $filename : '' ),
        'tdp_news_status' => '1',
        'news_desc' => request('news_desc')
    
    ]);
    }
    
} else {
  DB::table('tdp_news')->insert([
    'news_author' => $authorName->name,
    'news_author_id' => request('id'),
    'news_title' => request('news_title'),
    'news_img_path' => ($filename != '' ? $filename : '' ),
    'tdp_news_status' => '1',
    'news_desc' => request('news_desc')

]);
}

return response()->json(['success'=>'success']);
});

Route::post('/tdp/news/comment/insert', function (Request $request) {

  $authorName = DB::table("users")->where("id", "=", request('id'))->first();

  DB::table('tdp_news_comment')->insert([
    'tdpnews_id' => request('newsID'),
    'user_id' => request('userID'),
    'comment' => request('comment'),
    'created_at' => date('Y-m-d H:i:s')
]);

return response()->json(['success'=>'success']);
 
});


Route::get('/tdp/whatson/your/mind/details/{id}', function($id){

  //$new= DB::table('tdp_news')->where('news_id','=',$id)->first();
  $new= DB::table('tdp_news')->join('users', 'tdp_news.news_author_id', '=', 'users.id')->where('news_id','=',$id)->first();

  $arr= [];
  
    $comments = DB::select("SELECT t1.*,t2.* FROM tdp_news_comment t1 LEFT JOIN users t2 ON (t1.user_id = t2.id) WHERE t1.tdpnews_id='".$new->news_id."'");
    // $comments= DB::table('tdp_news_comment')->where('tdpnews_id','=',$new->news_id)->get();

    $comm= [];
    foreach($comments as $cmnts){

      $comm[] = [
        'user_id'=> $cmnts->user_id,
        'comment'=> $cmnts->comment,
        'created_at'=> $cmnts->created_at,
        'name'=> $cmnts->name,
        'prfl_pic'=> $cmnts->prfl_photo_path,
      ];
    }

    $arr[] = [
      'news_id'=> $new->news_id,
      'author_id'=> $new->news_author_id,
      'author_name'=> $new->news_author,
      'author_photo' => $new->prfl_photo_path,
      'news_title'=> $new->news_title,
      'news_desc'=> $new->news_desc,
      'news_img_path'=> $new->news_img_path == '' ? '' : 'https://globallove.online/images/'.$new->news_img_path,
      'comments'=> $comm
    ];

    
  

  return response()->json($arr);
});



Route::get('/tdp/profile/{id}', function($id){

  $arr= [];

  $data = DB::select("SELECT t1.*,t2.* FROM users t1 LEFT JOIN users_metas t2 ON (t1.id = t2.user_id) WHERE t1.id = '".$id."'");

  $news= DB::table('tdp_news')->where('news_author_id','=',$data[0]->id)->where('tdp_news_status','=','1')->get();

  $newss= [];

  foreach($news as $new){

    

    $comments = DB::select("SELECT t1.*,t2.* FROM tdp_news_comment t1 LEFT JOIN users t2 ON (t1.user_id = t2.id) WHERE t1.tdpnews_id='".$new->news_id."'");
    
    $comm= [];

    foreach($comments as $cmnts){
      $comm[] = [
        'user_id'=> $cmnts->user_id,
        'comment'=> $cmnts->comment,
        'created_at'=> $cmnts->created_at,
        'name'=> $cmnts->name,
        'prfl_pic'=> $cmnts->prfl_photo_path,
      ];
    }

    $newss[] = [
      'news_id'=> $new->news_id,
      'author_id'=> $new->news_author_id,
      'author_name'=> $new->news_author,
      'author_prfl_pic'=> $data[0]->prfl_photo_path,
      'news_title'=> $new->news_title,
      'news_desc'=> $new->news_desc,
      'news_img_path'=> $new->news_img_path == '' ? '' : 'https://globallove.online/images/'.$new->news_img_path,
      'comments'=> $comm
    ];

  }

  $arr[] = [
    'id'=> $data[0]->id,
    'name'=> $data[0]->name,
    'email'=> $data[0]->email,
    'sex'=> $data[0]->sex,
    'country'=> $data[0]->country,
    'pro_pic'=> $data[0]->prfl_photo_path,
    'news'=> $newss
  ];

    
  

  return response()->json(['data'=>$arr]);
});








// Globallove App API-------------------

Route::get('/gl/app/conversations/{toid}/{fromid}', function($toid, $fromid){
  // if($request->id == '0') {
  //           //for admin
  //           $date= date('Y-m-d H:i:s');
  //           DB::Select("UPDATE users_chat_rooms SET room_status= '0', timedate= '".$date."' WHERE room_to_id= '".Crypt::decryptString($_COOKIE['UserIds'])."' AND room_from_id= '0'");
  //       }
        
  //for all users

  $update=DB::Select("UPDATE users_chat_rooms SET room_status= '0' WHERE room_to_id= '".$toid."' AND room_from_id= '".$fromid."'");

  $msgs = DB::Select("SELECT * FROM users_chat WHERE (chat_from_id = ".$fromid." AND chat_to_id = ".$toid.") OR (chat_from_id = ".$toid." AND chat_to_id = ".$fromid.") ORDER BY chat_date_time ASC");

  $block = DB::Select("SELECT b_who_id from block_users where b_whom_id = '".$fromid."' OR b_whom_id = '".$toid."'");

  if(count($block) > 0) {
    foreach($block as $b) {
        $blockIDs[] = $b->b_who_id;
    }
  } else {
    $blockIDs[] = array('');
  }

  $moderator= DB::Select("SELECT * FROM chat_mod WHERE (mod_from_id= '".$fromid."' AND mod_to_id='".$toid."' AND mod_status='0') OR (mod_to_id='".$fromid."' AND mod_from_id='".$toid."' AND mod_status='0')");

    $arr = [];

    foreach($msgs as $msg) {
      $arr[] = array(
        'to' => $msg->chat_to_id,
        'msg' => $msg->chat_msg,
        'datetime' => $msg->chat_date_time,
      );
    }
  
  
  
  return response()->json([$arr, $blockIDs,$moderator]);
});






Route::get('/gl/app/chat/list/{fromid}', function($fromid){

$chatUsers = DB::Select("SELECT t1.*,t2.* FROM users_chat_rooms t1 LEFT JOIN users t2 ON (t1.room_to_id=t2.id) WHERE t1.room_from_id = '".$fromid."' ORDER BY t1.timedate DESC");
        foreach($chatUsers as $cu) {
            $usersLastMsg = DB::Select("SELECT chat_msg FROM users_chat WHERE (chat_from_id = '".$cu->room_from_id."' AND chat_to_id = '".$cu->room_to_id."') OR (chat_from_id = '".$cu->room_to_id."' AND chat_to_id = '".$cu->room_from_id."') ORDER BY chat_date_time DESC LIMIT 1");



if($cu->prfl_approve_status == '0' || $cu->prfl_photo_path == '' || $cu->prfl_photo_path == null){
    $propic = 'https://www.globallove.online/images/male-user-placeholder.png';
} else {
    $propic = $cu->prfl_photo_path;
}

$this->contacts[] = array(
    'propic' => $propic,
    'name' => $cu->name,
    'email' => $cu->email,
    'lmsg' => $usersLastMsg[0]->chat_msg,
    'user_id' => $cu->room_to_id,
    
);

}

return response()->json( array('users' => $this->contacts) );

});


// meet 

Route::get('/gl/app/meet/{sex}', function($sex){

$users = DB::table('users')
        ->join('users_metas', 'users.id','=','users_metas.user_id')
        ->where('users.display_status', 'show')
        ->where('users.prfl_approve_status', '1')
        ->where('users.display_status', 'show')
        ->where('users_metas.sex', $sex)
        ->where('users.prfl_photo_path', '!=', 'https://www.globallove.online/images/male-user-placeholder.png')
        ->select('users.id','users.name','users.email','users_metas.sex', 'users_metas.looking_for', 'users.prfl_photo_path','users_metas.age')
        ->orderBy('users.email_verified_at', 'desc')
        ->paginate(100);


return response()->json(array('users' => $users));

});

//online members

Route::get('/gl/app/online', function(){

$users = DB::table('users')
        ->where('onln_status', 'online')
        ->select('id','name','email','prfl_photo_path')
        ->paginate(50);


return response()->json(array('users' => $users));

});


// notifications

Route::get('/gl/app/notify/{id}', function($id){

$notifications = DB::Select("SELECT t1.*,t2.* FROM notifications t1 left join users t2 on (t1.notifications_user_id=t2.id) WHERE t1.notifications_to_id = '".$id."' ORDER BY t1.notifications_date_time DESC LIMIT 50");

$arr = [];

// foreach($notification as $notify) {
//   if($notify->notifications_key == "view_profile") {
//     $arr['msg'][] = $notify->name . ' viewed your profile.';
//   } elseif($notify->notifications_key == "liked_me") {
//     $arr['msg'][] = $notify->name . ' liked you.';
//   }
// }


return response()->json(array('notifications' => $notifications));

});

Route::get('/gl/app/profile/{id}', function($id){

$data = DB::table('users')
        ->leftJoin('users_metas', 'users.id', '=', 'users_metas.user_id')
        ->where('users.id', $id)
        ->first();

$arr = [];

$arr = [
  'name' => $data->name,
  'email' => $data->email,
  'country' => $data->country,
  'photo' => $data->prfl_photo_path,
  'age' => $data->age,
  'sex' => $data->sex,
  'looking_for' => $data->looking_for,
  'height' => $data->height,
  'weight' => $data->weight,
  'ethnicity' => $data->ethnicity,
  'drink' => $data->drink,
  'smoke' => $data->smoke,
  'ocupation' => $data->occupation,
  'religion' => $data->religion,
  'about' => $data->about,
  'partner_desc' => $data->prtnr_typ_desc,
  'heading' => $data->heading,
  'relationship' => $data->relationship,
];


$photos = DB::table('profile_post_photos')
          ->where('pro_pic_user_id', $id)
          ->where('pro_pic_status', '1')
          ->where('pro_pic_hide_status', '0')
          ->select('pro_pic_path')
          ->get();




return response()->json(array('me' => $arr, 'photos' => $photos));

});


Route::post('/gl/app/login', function(Request $request){

        $login_info = new User();
        $login_info->email = request('mail');
        $login_info->password = request('psw');
        $data = DB::select("SELECT t1.*,t2.*,t3.* FROM users t1 LEFT JOIN users_metas t2 ON (t1.id = t2.user_id) LEFT JOIN users_match t3 ON (t1.id = t3.users_match_id) WHERE t1.email = '".request('mail')."' AND t1.password = '".md5(request('psw'))."'");


        if(count($data) == '1'){

            if($data[0]->email_verified_at == ""){
              return response()->json(array('log_info' => 'Please verify your email first to be able to login.'));
            }

        $day = date('Y/m/d H:i:s');

        User::where('id', $data[0]->id)->update(['login_date_time' => $day]);

        $arr = [];

        $arr = [
          'UserEmail' => $data[0]->email,
          'UserFullName' => $data[0]->name,
          'UserIds' => $data[0]->id,
          'UserCountry' => $data[0]->country,
          'LookingFor' => $data[0]->match_seeking,
        ];

        return response()->json(array('log_info' => $arr));

      }else{

        return response()->json(array('log_info_err' => 'Please check your email or password.'));

      }
  
});



Route::post('/gl/app/signup', function(Request $request){

  $register_info = new User();
        $register_info->name = request('name');
        $register_info->email  = request('email');
        $register_info->password = md5(request('psw'));
        // $register_info->email_verified_at  = date('Y-m-d H:i:s');
        //$register_info->agent_code = request('agent_code');
        $register_info->token_id = request('token');
        $register_info->prfl_photo_path  = 'https://www.globallove.online/images/male-user-placeholder.png';

        $data = User::where('email', '=', [request('email')])->get();
        if(count($data) == 0 && request('psw') == request('repsw')){
        $register_info->save();

        $user = User::where('email', '=', [request('email')])->first();

        $register = new UsersMeta();
        $register->user_id = $user->id;
        $register->country = request('country');
        $register->save();

        $arr = [];

        $arr = [
          'UserEmail' => request('email'),
          'UserFullName' => request('name'),
          'UserIds' => $user->id,
          'UserCountry' => request('country'),
        ];

        return response()->json(array('sign_info' => $arr));
      }else{
        return response()->json(array('sign_info' => 'Password and re-password should be same.'));
      }

});


Route::post('/gl/app/finish', function(Request $request){

  $age = date('Y');
    $age = ($age - substr(request('dob'),-4));
    // email_verified_at  = date('Y-m-d H:i:s')
    User::where('id', request('id'))->update(['prfl_approve_status' => '1']);

    UsersMeta::where('user_id', request('id'))->update(['sex' => request('sex'),'looking_for' => request('looking_fr'),'age'=> $age,'dob'=> request('dob'),'hear_about_us'=> request('hear_us')]);

    

    $payment= DB::table('payment_transactions')
            ->where('pt_u_id', '=', request('id'))
            ->get();

    if (count($payment) == 0){

    $start_date = date('Y-m-d H:i:s');
    $stop_date = date('Y-m-d H:i:s', strtotime($start_date . ' +365 day'));

    DB::table('payment_transactions')->insert([
        'pt_u_id' => request('id'),
        'pt_start_date' => $start_date,
        'pt_end_date' => $stop_date,
        'pt_ack' =>'',
        'pt_currency' => '',
        'pt_amount' =>'0',
        'pt_transaction_id' => 'admin_insert'
        ]);



    DB::table('users_match')->insert([
        'users_match_id' => request('id'),
        'match_seeking' => request('looking_fr'),
        'match_occupation' => "All"

    ]);

    $data = User::where('id', '=', [request('id')])->get();



    $datac = UsersMeta::where('user_id', '=', [request('id')])->get();

    if($data[0]->email_verified_at == ''){
         $mail= $data[0]->email;

        $dataa = "https://www.globallove.online/verifyaccount/" . $data[0]->id;
      Mail::send(['html'=>'users.email_verification_template'], ['text'=>$dataa], function($message) use ($mail, $dataa)  {
         $message->to($mail)->subject
            ('Verify Account.');
         $message->from('no-reply@wwwmedia.world','GlobalLove');
      });

    }

    $mail2= 'newuseralert@wwwmedia.world';
    //$mail2= 'remorozadarrel@gmail.com';
        $dataa2 = "https://www.globallove.online/u/adminlogin";
        $datauser = array('name' => $data[0]->name,'email' => $data[0]->email,'country'  =>$datac[0]->country);
        Mail::send(['html'=>'admin.admin_view_users_email_template'], ['text'=>$dataa2,'user'=>$datauser], function($message) use ($mail2, $dataa2)  {
            $message->to($mail2)->subject
            ('You have a new user.');
            $message->from('no-reply@wwwmedia.world','GlobalLove');
        });

        return response()->json(array('finish_info' => 'Success'));
  }else{
        return response()->json(array('finish_info' => 'Failed'));
  }

});


Route::get('/map/view/mob', function () {

    $location= DB::select('SELECT * FROM users WHERE users_lattitude != "" AND users_longitude != ""');

    $arr= [];

    foreach ($location as $loc){
        $arr[]= array(
            'id' => $loc->id,
            'lat' => $loc->users_lattitude,
            'long' => $loc->users_longitude,
            'img' => $loc->prfl_photo_path
        );
    }

    

    return response()->json($arr);

});

Route::get('/map/view/mob/{id}', function ($id) {

    $location= DB::select('SELECT * FROM users WHERE users_lattitude != "" AND users_longitude != "" AND id = "'.$id.'"');

    $arr= [];

    foreach ($location as $loc){
        $arr[]= array(
            'id' => $loc->id,
            'lat' => $loc->users_lattitude,
            'long' => $loc->users_longitude,
            'img' => $loc->prfl_photo_path
        );
    }

    

    return response()->json($arr);

});


















