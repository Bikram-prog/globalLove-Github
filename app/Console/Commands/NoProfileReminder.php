<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use \Crypt;


class NoProfileReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:noprofilereminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email user with no profile picture';

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
        $users = User::where('prfl_photo_path','https://www.globallove.online/images/male-user-placeholder.png')->where('subscribe_newsletter', 1)->get(['email','name']);

        $attachment = DB::table('no_pic_rem_text')->first();

        foreach($users as $u){
            $mail = $u->email;
            $dataa = $u->name;
            Mail::send(['html'=>'users.email_photoreminder_template'], ['email'=>Crypt::encryptString($u->email),'text'=>$dataa], function($message) use ($mail, $dataa, $attachment)  {
                $message->to($mail)->subject
                   ('Profile photo reminder');
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
