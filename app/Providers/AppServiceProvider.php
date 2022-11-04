<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        // cache()->remember("ui", 60*60*24, function(){
        //     return 
            
        // });
   
        // $chatUsers = DB::Select("SELECT t1.*,t2.* FROM users_chat_rooms t1 LEFT JOIN users t2 ON (t1.room_to_id=t2.id) WHERE t1.room_from_id = ".Crypt::decryptString($_COOKIE['UserIds'])." ORDER BY t1.timedate DESC");

        // View::composer(['footer', 'users.messanger'], function ($view) {
        //     $arr = [];
        //     $chatUsers = DB::Select("SELECT t1.*,t2.* FROM users_chat_rooms t1 LEFT JOIN users t2 ON (t1.room_to_id=t2.id) LEFT JOIN users_metas um ON t2.id = um.user_id WHERE t1.room_from_id = ".Crypt::decryptString($_COOKIE['UserIds']). " ORDER BY t1.timedate DESC");

        //     foreach ($chatUsers as $cu) {
        //         $msg= DB::Select("SELECT room_status FROM users_chat_rooms WHERE room_from_id = '".Crypt::decryptString($_COOKIE['UserIds'])."' AND room_to_id= '".$cu->room_to_id."' AND room_status= '1'");
        //         $arr[] = [
        //             'prfl_approve_status' => $cu->prfl_approve_status,
        //             'prfl_photo_path' => $cu->prfl_photo_path,
        //             'room_to_id' => $cu->room_to_id,
        //             'name' => $cu->name,
        //             'email' => $cu->email,
        //             'onln_status' => $cu->onln_status,
        //             'total_msg' => count($msg),
        //         ];
        //     }


        //     $view->with('chatUsers', $arr); // bind data to view
        // });
    }
}
