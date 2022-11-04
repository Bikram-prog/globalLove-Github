<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use DB;
use \Crypt;


class DailyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:dailyupdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email user with updates new user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = DB::table('users')
            ->leftJoin('users_metas', 'users.id', '=', 'users_metas.user_id')
            ->where('subscribe_newsletter', 1)
            ->get();

        $attachment = DB::table('daily_email_update')->first();

        //dd($users);        

        foreach($users as $u){

            $newreg = DB::table('users')->leftJoin('users_metas', 'users.id', '=', 'users_metas.user_id')->where('prfl_photo_path','!=','https://www.globallove.online/images/male-user-placeholder.png');
            if($u->sex =="Female") {
                $newreg->where('users_metas.sex', "Male");
            }
            if($u->sex =="Male") {
                $newreg->where('users_metas.sex', "Female");
            }
            if($u->sex =="Transgender") {
                $newreg->where(function($q) {
                    $q->where('users_metas.sex', "Female")
                      ->orWhere('users_metas.sex', "Male");
                });
            }

            $newregs = $newreg->inRandomOrder()->limit(5)->get(); // Call this at last to get the result
            //DB::enableQueryLog(); // Enable query log
            //dd(DB::getQueryLog());
          
            $mail = $u->email;
            $dataa = $u->name;
            Mail::send(['html'=>'users.email_dailyupdate_template'], ['email'=>Crypt::encryptString($u->email),'text'=>$dataa,'nwusers'=>$newregs], function($message) use ($mail, $dataa, $attachment)  {
                $message->to($mail)->subject
                   ('GlobalLove Daily Update');
                   if($attachment->email_file != ''){
                   $message->attach("http://68.183.224.218/images/".$attachment->email_file);
                   }
                $message->from('noreply@wwwmedia.world','GlobalLove');
             });
   
        }
    
    }

    /**
     * Register the closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
