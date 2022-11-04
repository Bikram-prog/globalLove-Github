<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ProfilePictureAlgo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:profilephotochange';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
            ->where('prfl_photo_path', '=', 'https://www.globallove.online/images/male-user-placeholder.png')
            ->where('id', '=', 4299)
            ->select('id', 'prfl_photo_path')
            ->get();

        foreach ($users as $user)
        {
            $photo_post = DB::table('profile_post_photos')
                ->where('id', '=', $user->id)
                ->where('pro_pic_path', '!=', '')
                ->select('pro_pic_path')
                ->get();

            // update user table photo column
            if(count($photo_post) > 0)
            {
                DB::table('users')
                    ->where('user_id',$user->id)
                    ->update(array(
                        'prfl_photo_path'=>$photo_post[0]->pro_pic_path,
                        ));
            }



        }



    }
}
